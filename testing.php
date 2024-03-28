<?php
error_reporting(E_ERROR | E_PARSE);

class Book{
    public $name;
    public $price;

    //speicla function , execute - one time when onject is being created
    function __construct($rname,$rprice) {
        $this->name = $rname;
        $this->price=$rprice;

    }

    function checkMyPrice(){
        if($this->price>500){
            echo($this->name);
        }
    }
}

$b1 = new Book("bookname1",1100);
$b2 = new Book("bookname2",200);
$b3 = new Book("bookname3",3000)



;
$b4 = new Book("bookname4",400);

$array = array($b1,$b2,$b3,$b4);



foreach ($array as $book) {
  
   $book->checkMyPrice();

}
?>