<?php

abstract class Joueur 
{
    public function seConnecter(){return $this->EtreMajeur();}
    abstract public function EtreMajeur();
     abstract public function Devise();

}








?>