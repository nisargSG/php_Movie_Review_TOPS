<?php

include 'dbConfig.php';

class Movie{

    private $id,$title,$description,$releaseDate,$img,$isDelete;

    function __construct($id,$title,$description,$releaseDate,$img,$isDelete){
        $this->id=$id;
        $this->title=$title;
        $this->description=$description;
        $this->releaseDate=$releaseDate;
        $this->img=$img;
        $this->isDelete=$isDelete;
    }



    public function insert(){
        global $dbConn;
        $dbConn->query("INSERT INTO movies values( '$this->id','$this->title','$this->description','$this->releaseDate','$this->img','$this->isDelete')");
    }
    

}



$m1= new Movie('113','test','d1','2000-02-02','1.png','false');
$m1->insert();


?>