<?php
// my_add.php for  in /home/elgoha_r/no
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Wed Jan  7 16:17:42 2015 EL GOHARY Rouis
// Last update Fri Jan  9 18:29:51 2015 EL GOHARY Rouis
//

function	add_student($login)
{
  $c = new MongoClient();
  $db = $c->mydb;
  $collection = $c->mydb->selectCollection('student');
  $user = $collection->findOne(array("login" => $login));
  if (isset($user))
    {
      echo "\nL'utilisateur ".$login." existe deja dans la base de donnees !\n\n";
      return (0);
    }
  else
    {
      echo "\nNom ?\n";
      $no = fopen("php://stdin", "r");
      echo "> ";
      $cmd_nom = fgets($no);
      preg_match("/^.*$/", $cmd_nom, $nom);
      echo "Promo ?\n";
      $pr = fopen("php://stdin", "r");
      echo "> ";
      $cmd_promo = fgets($pr);
      preg_match("/^.*$/", $cmd_promo, $promo);
      echo "Email ?\n";
      $em = fopen("php://stdin", "r");
      echo "> ";
      $cmd_email = fgets($em);
      preg_match("/^.*$/", $cmd_email, $email);
      echo "Telephone ?\n";
      $te = fopen("php://stdin", "r");
      echo "> ";
      $cmd_telephone = fgets($te);
      preg_match("/^.*$/", $cmd_telephone, $telephone);
       $info = array(
		    "login" => $login,
		    "nom" => $nom[0],
		    "promo" => $promo[0],
		    "email" => $email[0],
		    "telephone" => $telephone[0]
		    );
      $collection->insert($info);
      echo "\nL'utilisateur ".$login." a ete ajoute !\n\n";
      return (0);
    }
}