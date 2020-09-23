<?php

    // Manejo_Objetos.php

    require_once('Blog_Model.php');

    require_once('Connect_Model.php');

    class BlogObject_Model {


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

            $sql = ("SELECT * FROM CONTENIDO ORDER BY FECHA");

            $query_retrieve_images = $this->db->query($sql);
            

            while($registry=$query_retrieve_images->fetch(PDO::FETCH_ASSOC)) {

                $blog = new Blog_Model();

                $blog->setId($registry["Id"]);

                $blog->setName($registry["Name"]);

                $blog->setDate($registry["Date"]);

                $blog->setComment($registry["Comment"]);

                $blog->setImage($registry["Image"]);

                $this->matrix[$this->counter] = $blog;

                $this->counter++;

            }

            return $this->matrix;

        }

        public function insertContent(Blog_Model $blog) {


            $sql = "INSERT INTO BLOG (NAME, DATE, COMMENT, IMAGE) VALUES ('" . $blog->getName() . "','" . $blog->getDate() . "','" . $blog->getComment() . "', '" . $blog->getImage() . "')";

            $this->db->query($sql);

            echo "Registries introduced properly";

        }


    }


?>