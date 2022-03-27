<?php
  session_start();
  
  class connexionDB {
    private $host    = '127.0.0.1';  // nom de l'host  
    private $name    = 'petsitter';    // nom de la base de donnée
    private $user    = 'usrpetsiter';       // utilisateur 
    private $pass    = 'petpassword';       // mot de passe 
    private $connexion;
    
    function __construct($host = null, $name = null, $user = null, $pass = null){
      if($host != null){
        $this->host = $host;           
        $this->name = $name;           
        $this->user = $user;          
        $this->pass = $pass;
      }
      try{
        $this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name,
          $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8', 
          PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
      }catch (PDOException $e){
        echo 'Erreur : Impossible de se connecter  à la BDD !';
        die();
      }
    }
    public function DB(){
        return $this->connexion;
    }
  }

  $DBB = new connexionDB();
  $DB = $DBB->DB();
?>