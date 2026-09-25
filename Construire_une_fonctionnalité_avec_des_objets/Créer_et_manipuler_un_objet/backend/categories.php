<?php

class categories{

 //properties
    public $id ;
    public $nom ;
    public $couleur;
    public $incon;

// methods

public function __construct($id , $nom , $couleur , $incon){
   $this->id = $id;
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->incon = $incon;  

}

 public function afficher() {
    echo $this->nom . " - " . $this->couleur . " - " . $this->incon . "<br>";
    
    }


}


















?>