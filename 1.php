<?php

class Human{

    const hairColor= "Black";
    
    private $adhar="1234";

    public function setAdahar($newAdharNumber){
        $this->adhar=$newAdharNumber;
    }

    public function getAdhar(){
       return $this->adhar;
    }

    public function getHairColor(){
        return self::hairColor
    }

}


$nisarg = new Human();
$nisarg->setAdahar("abcd");
echo($nisarg->getAdhar());

echo(Human::hairColor);


?>