<?php

class User{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $tel;
    private string $description;
    private int $role;
    private string $password;


    public function __construct(string $nom , string $prenom , string $email, string $tel, string $description, int $role, string $password, int $id = 0)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->tel = $tel; 
        $this->description = $description; 
        $this->role = $role;        
        $this->password = $password;        
    }

    public function getId() : int
    {
        return $this->id;
    }


    public function getNom() : string
    {
        return $this->nom;
    }

    
   

    public function getPrenom() : string
    {
        return $this->prenom;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getTel() : string
    {
        return $this->tel;
    }

    public function getRole() : int
    {
        return $this->role;
    }

    public function getPassword() : string
    {
        return $this->password;
    }




    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom(string $nom) : self
    {
        $this->nom = $nom;

        return $this;
    }

      /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom(string $prenom) : self
    {
        $this->prenom = $prenom;

        return $this;
    }

        /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail(string $email) : self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setRole(int $role)
    {
        $this->role = $role;

        return $this;
    }

  

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }
}