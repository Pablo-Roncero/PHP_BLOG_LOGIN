<?php


    // Objeto_Blog 
    
    class Blog_Model {

        // Properties


        private $Id;

        private $Name;

        private $Date;

        private $Comment;

        private $Image;


        // Access Methods

        public function getId() {
            return $this->Id;
        }

        public function setId($Id) {
            $this->Id = $Id;
        }

        public function getName() {
            return $this->Name;
        }

        public function setName($Name) {
            $this->Name = $Name;
        }

        public function getDate() {
            return $this->Date;
        }

        public function setDate($Date) {
            $this->Date = $Date;
        }

        public function getComment() {
            return $this->Comment;
        }

        public function setComment($Comment) {
            $this->Comment = $Comment;
        }

        public function getImage() {
            return $this->Image;
        }

        public function setImage($Image) {
            $this->Image = $Image;
        }

    }

?>