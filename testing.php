<?php
error_reporting(E_ERROR | E_PARSE);

class Book{
    public $name;
    public $price;
}

$b1 = new Book();
$b1->name="B1";
$b1->price=100;

$b2 = new Book();
$b2->name="B2";
$b2->price=2000;

$b3 = new Book();
$b3->name="B3";
$b3->price=200;

$books = array();

array_push($books,$b1);
array_push($books,$b2);
array_push($books,$b3);
$start=0;
$end=count($books)-1 ;   //2

for($i=$start;$i<=$end;$i++){
    if($books[$i]->price>500){
        echo($books[$i]->name);
    }
}
echo("End");


?>