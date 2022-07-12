<?php
    class Tea extends HotBeverage{
        private $description = "Miam Delicieux";
        private $comment = "Non enfaite c'est degueu";
        public function __constructor(){
            $this->name = "Thé";
            $this->price = 10;
            $this->resistence = "Strong";
        }

        public function getDescription(){
            return $this->description;
        }
        public function getComment(){
            return $this->comment;
        }
    }
