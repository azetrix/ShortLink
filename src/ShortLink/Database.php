<?php

/*
 * GNU Affero General Public License
 *
 * Copyright (c) 2018 Phoenix Peca
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace ShortLink;

class Database
{

    public $database_session;
    public $table;

    public function connect(string $host, string $user, string $password, string $database, int $port = 3306, string $table = null) {
        $db = new \mysqli($host, $user, $password, $database, $port); // connect to the database
        if ($db->connect_errno) { // terminate if database connection cannot be established
            throw new \Exception("Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error);
            return false;
        }
        $this->database_session = $db; // create a database session
        $table = ($table !== null ? $table : $this->table);
        if (!empty($table)) {
            $this->query(
                "CREATE TABLE IF NOT EXISTS `".$table."` (
                    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
                    `long_url` VARCHAR(5000) NOT NULL,
                    `short_code` VARCHAR(500) NOT NULL,
                    `date_created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    `counter` INTEGER UNSIGNED NOT NULL DEFAULT '0',
                    `custom_code` BOOLEAN NOT NULL DEFAULT FALSE,
                    `user_agent` VARCHAR(10000) NOT NULL,
    
                    PRIMARY KEY (id),
                    KEY short_code (short_code)
                )"
            ); // create database table if it does not exist
            return true;
        } else {
            throw new \Exception("Database table must be declared.");
            return false;
        }
    }

    public function query(string $sql) {
        $session = $this->database_session; // access the database session
        return $session->query($sql); // send a mysql query to the database
    }

    public function fetch($column, $value, string $select_column = null, string $table = null) {
        $select_column = ($select_column !== null ? $select_column : '*'); // initialize defined columns for selection
        $table = ($table !== null ? $table : $this->table);
        if (is_array($column) && is_array($value)) {
            $specifics = array_combine($column, $value);
            foreach ($specifics as $col => $val) { // parse array arguments
                $val = $this->database_session->real_escape_string($val); // sql injection protected value
                $specifics_req[] = "`$col` = '$val'";
            }
            $specifics = implode(' AND ', $specifics_req);
        } else if (is_string($column) && (is_string($value) || is_int($value))) {
            $value = $this->database_session->real_escape_string($value); // sql injection protected value
            $specifics = "`$column` = '$value'";
        } else {
            throw new \Exception("Database fetch request is not in a supported type.");
            return false;
        }
        $sql = "SELECT $select_column from `".$table."` WHERE BINARY $specifics";
        $data = $this->query($sql)->fetch_all(); // select row(s) from database
        $keys = ($select_column !== '*' ? explode(',', $select_column) : $this->get_column_names());
        foreach ($data as $cols) {
            $result[] = array_combine($keys, $cols);
        }
        return (!empty($result) ? $result : false );
    }

    public function insert(array $row_data, string $table = null) {
        foreach ($row_data as $column => $value) { // prepares the row data for insertion
            $columns[] = '`'.$column.'`';
            $values[] = '\''.$this->database_session->real_escape_string($value).'\''; // sql injection protected value
        }
        $table = ($table !== null ? $table : $this->table);
        $sql = "INSERT INTO `".$table."` " .
               "(".implode(", ", $columns).") " .
               "VALUES (".implode(", ", $values).")";
        if ($this->query($sql)) { // row insertion
            $task_id = $this->database_session->insert_id; // get id of the last inserted row
            return $this->fetch('id', $task_id); // fetch the inserted row and return as an array
        }
        throw new \Exception("Database insertion failed.");
        return false;
    }

    public function get_table_attribute(string $attribute = null, string $table = null) { // this this fetches some useful attriutes from the database table 
        $table = ($table !== null ? $table : $this->table);
        $sql = "SHOW TABLE STATUS LIKE '".$table."'";
        if ($attribute !== null) {
            return $this->query($sql)->fetch_assoc()[$attribute]; // fetch specific value from attribute
        } else {
            return $this->query($sql)->fetch_assoc(); // fetch all attributes and return as array
        }
    }

    public function get_column_names(string $table = null) {
        $database = $this->database_session;
        $table = ($table !== null ? $table : $this->table);
        $query = $database->query("SHOW columns FROM $table");
        while($fields = $query->fetch_array()){ // fetch columns and return as array
            $columns[] = $fields['Field'];
        }
        return (!empty($columns) ? $columns : false);
    }

}