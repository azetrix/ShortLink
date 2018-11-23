<?php

namespace ShortLink;

use ShortLink\Tiny;

class Core
{

    private $database;
    public $user_agent = "Undefined: User Agent";

    public function __construct(Database $database) {
        $this->database = $database; // allow this class to access the database
    }

    public function create_shortlink(string $url, string $custom_shortlink = '') { // this method decides what kind of request is made
        if ($custom_shortlink === '') {
            $shortlink = $this->create_standard_shortlink($url); // standard request
        } else {
            $shortlink = $this->create_custom_shortlink($url, $custom_shortlink); // customized request
        }
        return $shortlink;
    }

    private function create_standard_shortlink(string $url) { // standard request
        $database = $this->database;
        $long_url_col = $database->fetch(['long_url', 'custom_code'], [$url, 0]);
        if (empty($long_url_col)) { // if long_url already exists in the database display it. otherwise, create new database entry
            return $database->insert([
                        'long_url' => $url,
                        'short_code' => Tiny::encode(intval($database->get_table_attribute('Auto_increment'))),
                        'custom_code' => 0,
                        'user_agent' => $this->user_agent
                    ])[0];
        } else {
            return $long_url_col[0];
        }
    }

    private function create_custom_shortlink(string $url, string $custom_shortlink) {
        $database = $this->database;
        $short_code_col = $database->fetch(['short_code', 'custom_code'], [$custom_shortlink, 1]);
        $duplicate_check = $database->fetch(['long_url', 'short_code'], [$url, $custom_shortlink]);
        $is_valid_sc = $this->is_valid_custom_shortlink($custom_shortlink);
        if (empty($short_code_col)) { // if short_code is available, create new entry.
            if ($is_valid_sc === true) {
                return $database->insert([
                            'long_url' => $url,
                            'short_code' => $custom_shortlink,
                            'custom_code' => 1,
                            'user_agent' => $this->user_agent
                        ])[0];
            } else {
                return false;
            }
        } else if (!empty($duplicate_check)) { //  otherwise, check if the current short_code and long_url matches the request.
            return $duplicate_check[0];
        } else { // else, hard fail
            //throw new \Exception("ShortLink is not available.");
            trigger_error("ShortLink is not available.");
            return false;
        }
    }

    public function fetch_shortlink(string $shortlink, bool $custom = false) {
        $database = $this->database;
        if ($custom === true) { // if custom shortlink code
            $data = $database->fetch(['short_code', 'custom_code'], [$shortlink, 1]); // fetch custom shortlink row
        } else { // if standard shortlink code
            $data = $database->fetch(['short_code', 'custom_code'], [$shortlink, 0]); // fetch custom shortlink row
        }
        if (empty($data)) {
            //throw new \Exception("ShortLink does not exist.");
            trigger_error("ShortLink does not exist.");
            return false;
        }
        $access_counter = intval($data[0]['counter']) + 1;
        $data_created = $data[0]['date_created'];
        $sql = "UPDATE `".$database->table."`
                SET `counter` = '".$access_counter."'
                WHERE `short_links`.`id` = ".$data[0]['id'];
        $database->query($sql);
        return $data[0];
    }

    private function is_valid_custom_shortlink(string $shortlink, bool $check_database = false) {
        $is_valid = preg_match('/^[a-z0-9_\-]+$/i', $shortlink);
        if ($is_valid) {
            if ($check_database) {
                $database_match = $this->database->fetch(['short_code', 'custom_code'], [$shortlink, 1]);
                if (empty($database_match)) {
                    return true;
                } else {
                    //throw new \Exception("Shortlink already exists in database.");
                    trigger_error("Shortlink already exists in database.");
                    return false;
                }
            } else {
                return true;
            }
        } else {
            //throw new \Exception("Shortlink contains illegal characters.");
            trigger_error("Shortlink contains illegal characters.");
            return false;
        }
    }

    private function is_valid_url() {

    }

}