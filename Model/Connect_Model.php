<?php

    class Connect {

        // In this file we create the Class to connect to the database USERSBBDD


        public static function connection() {

            try {

                $connection = new PDO('mysql:host=localhost; dbname=usersbbdd', 'root', '');

                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $connection->exec("SET CHARACTER SET utf8");

            }catch (Exception $e) {

                // In case tne connection can't be set, we would get the Error message and line

                die("Error: " . $e->getMessage() . " in line: " . $e->getLine());

            }

            return $connection;

        }


    }


?>