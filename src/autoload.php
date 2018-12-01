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

spl_autoload_register(
    function ($class_name) {
        $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
        $file = __DIR__ . DIRECTORY_SEPARATOR . $class_name.".php";
        if (is_readable($file)) {
            require_once $file;
        } else {
            //echo "Undefined Class: \"$class_name\".";
            throw new \Exception("Undefined Class: \"$class_name\".");
        }
    }
);