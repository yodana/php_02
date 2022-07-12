<?php
    class Coffee extends HotBeverage{
        public function __construct(){
            $this->name = "Café";
            $this->price = 1;
            $this->resistence = "Very strong";
        }

        private $description = "Un italiano";
        private $comment = "Meilleur boisson ever";

        public function getDescription(){
            return $this->description;
        }
        public function getComment(){
            return $this->comment;
        }
    }
