<?php

    require_once("Connect_Model.php");

    require_once("PersonObject_Model.php");


    Class Person_Model {

        private $db;

        private $users;

        public function __construct()
        {
            
            $this->db=Connect::connection();

            $this->users=array();

        }


        public function setUsers(PersonObject_Model $user_set) {

            
            $sql = "INSERT INTO `USERS` (`NAME`, `LASTNAME`, `EMAIL`, `PASSWORD`, `AGE`) VALUES (?, ?, ?, ?, ?)";
            
            $this->stmt = $this->db->prepare($sql);

            $this->stmt->execute([$user_set->getUserName(), $user_set->getUserLastname(), $user_set->getUserEmail(), $user_set->getUserPassword(), $user_set->getUserAge()]);
            
            //'" . $user_set->getUserName() . "','" . $user_set->getUserLastname() . "','" . $user_set->getUserEmail() . "','" . $user_set->getUserPassword() . "','" . $user_set->getUserAge() . "'
            //$sql = "INSERT INTO `USERS` (`NAME`, `LASTNAME`, `EMAIL`, `PASSWORD`, `AGE`) VALUES ('" . $user_set->getUserName() . "','" . $user_set->getUserLastname() . "','" . $user_set->getUserEmail() . "','" . $user_set->getUserPassword() . "','" . $user_set->getUserAge() . "')";
        
            //$this->db->exec($sql);

            //header("location:../index.php");
        }

        
        public function checkUsers(PersonObject_Model $user_check) {

            // First we get the Email from the object set as a parameter and query to the database
            
            $user_email_introduced = $user_check->getUserEmail();

            $sql = "SELECT EMAIL, PASSWORD FROM USERS WHERE EMAIL= '" . $user_email_introduced . "'";

            //'" . $user_email_introduced . "'
            //$sql = "SELECT `EMAIL`, `PASSWORD` FROM `USERS` WHERE `EMAIL`='" . $user_email_introduced . "'"; 

            $user_check_db = $this->db->query($sql);

            // Once we have our query made, we get the values, which will be only in one register since
            // two users cannot get an account with the same Email 

            while ($row=$user_check_db->fetch(PDO::FETCH_ASSOC)) {

                $this->users[] = $row;
                
            }

            // Now we check if this Email exists in our database, in case it doesn't, we'll give to the user
            // the option to register themselves by redirecting them to the registration webpage

            if (empty($this->users)) {
                    
                header("location: ../View/Error_View.php");

                //header("location: ../index.php");

            } else {
                //echo $this->users;
                return $this->users;
            }



        }

    }

?>