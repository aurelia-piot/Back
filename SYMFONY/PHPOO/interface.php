<?php
//Interface.php
Interface Mouvement
{
    public function start();
    public function turnRight();  
    public function turnLeft();
}

//Peter
class Avion extends Vehicule implements Mouvement
{
    // public function demarrer(){}
    // public function tourneDroite(){}  
    // public function tourneGauche(){}  
    public function start(){};
    public function turnRight(){}  
    public function turnLeft(){}  
}



//Iuliia
class Bateau extends Vehicule implements Mouvement
{
    public function start(){}
    public function turnRight(){}  
    public function turnLeft(){}  
}



//erreure la class vehicule n'existe pas