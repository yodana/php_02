<?php 
    class Text{
        public $tab;

        public function __construct($tab=[]){
            try{
                if (gettype($tab) != "array"){
                    throw new Exception("The parameter is not a array");
                } else
                    $this->tab = $tab;
            }
            catch (Exception $e){
                echo $e;
            }
        }
        
        public function addString($add){
            $this->tab[] = $add;
        }
        
        public function showHtml(){
            $r = "";
            foreach($this->tab as $t){
                $r = $r .  "<p>" . $t . "</p>" . PHP_EOL;
                print_r("<p>" . $t . "</p>" . PHP_EOL);
            }
            return $r;
        }
    }