<?php

    // Manejo_Objetos.php

    require_once('Blog_Model.php');

    require_once('Connect_Model.php');


    class BlogObject_Model {

        private $Id_user;

        private $db;

        private $matrix;

        private $counter;


        public function __construct()
        {
            $this->db=Connect::connection();
        }

        public function getContentsByDate() {

            $this->matrix = array();

            $this->counter = 0;

            $sql = ("SELECT * FROM BLOG ORDER BY DATE");

            $query_retrieve_images = $this->db->query($sql);
            

            while($registry=$query_retrieve_images->fetch(PDO::FETCH_ASSOC)) {

                $blog = new Blog_Model();

                $blog->setId($registry["ID"]);

                $blog->setName($registry["NAME"]);

                $blog->setDate($registry["DATE"]);

                $blog->setComment($registry["COMMENT"]);

                $blog->setImage($registry["IMAGE"]);

                $this->matrix[$this->counter] = $blog;

                $this->counter++;

            }

            return $this->matrix;

        }

        public function insertContent(Blog_Model $blog) {

            session_start();

            $user = $_SESSION["user"];

            $sql_id = "SELECT ID FROM USERS WHERE EMAIL = '$user'";

            $query_retrieve_images = $this->db->query($sql_id);


            while($id_registry=$query_retrieve_images->fetch(PDO::FETCH_ASSOC)) {

                $this->Id_user = $id_registry["ID"];


            }
                
            $sql = "INSERT INTO BLOG (NAME, DATE, COMMENT, IMAGE, ID) VALUES ('" . $blog->getName() . "','" . $blog->getDate() . "','" . $blog->getComment() . "', '" . $blog->getImage() . "', '$this->Id_user')";

            $this->db->query($sql);

            echo "Registries introduced properly";


        }


    }


?>