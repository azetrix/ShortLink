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

class ErrorHandler
{

    public $error_dump;

    public function error_out(string $message) { // all errors attributed to this method should not be critical or fatal
        trigger_error($message); // this thing logs the error into the webserver's error log 
        $this->error_dump[] = $message; // dumps the error for the user to evaluate
    }

}