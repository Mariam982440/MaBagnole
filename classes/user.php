<?php
class User 
{
    protected int $id;
    protected string $nom;
    protected string $email;
    protected string $motDePasse;
    protected string $role;

    public function __construct($id, $nom, $email, $motDePasse, $role = 'client'){
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $emil ;
        $this->motDePasse = $motDePasse;
        $this->role = $role;
    }

    public function seConnecter($email, $motDePasse ){
        return sAuthentifer($email, $motDePasse );
    }

    protected function sAuthentifer($email, $motDePasse ){

    }
}