<?php 

class PersonObject_Model {

    // Properties 

    private $id;

    private $user_email;

    private $user_password;

    private $user_name;

    private $user_lastname;

    private $user_age;

    // Access methods

    public function getUserEmail() {

        return $this->user_email;
    } 

    
    public function setUserEmail($user_email) {

        $this->user_email = $user_email;
    }
    
    
    public function getUserPassword() {

        return $this->user_password;
    }

    
    public function setUserPassword($user_password) {

        $this->user_password = $user_password;
    }

    
    public function getUserName() {

        return $this->user_name;
    }

    
    public function setUserName($user_name) {

        $this->user_name = $user_name;
    }

    
    public function getUserLastname() {

        return $this->user_lastname;
    }

    
    public function setUserLastname($user_lastname) {

        $this->user_lastname = $user_lastname;
    }

    
    public function getUserAge() {

        return $this->user_age;
    }

    
    public function setUserAge($user_age) {

        $this->user_age = $user_age;
    }

    
    public function getUserId() {

        return $this->user_id;
    }

    
    public function setUserId($user_id) {

        $this->user_id = $user_id;
    }
}


?>