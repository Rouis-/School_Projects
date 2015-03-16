<?php
// my_update.php for  in /home/elgoha_r/no
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Wed Jan  7 16:23:09 2015 EL GOHARY Rouis
// Last update Fri Jan  9 18:39:52 2015 EL GOHARY Rouis
//

function	update_student($login)
{
  $c = new MongoClient();
  $db = $c->mydb;
  $collection = $c->mydb->selectCollection('student');
  $user = $collection->findOne(array("login" => $login));
  if (!isset($user))
    {
      echo "\nL'utilisateur ".$login." n'existe pas dans la base de donnees !\n\n";
      return (0);
    }
  else
    {
      echo "\nQue voulez-vous modifier comme donnee pour l'utilisateur ".$login." ?\n";
      $cmdline = fopen("php://stdin", "r");
      echo "> ";
      $ent = fgets($cmdline);
      preg_match("/^.*$/", $ent, $rep);
      if ($rep[0] == "nom")
	{
	  echo "\nNouveau nom pour l'utilisateur ".$login." ?\n";
	  $new_nom = fopen("php://stdin", "r");
	  echo "> ";
	  $cmd_new_nom = fgets($new_nom);
	  preg_match("/^.*$/", $cmd_new_nom, $nom);
	  $c = new MongoClient();
	  $db = $c->mydb;
	  $collection = $c->mydb->selectCollection('student');
	  $n_nom = array('$set' => array('nom'  => $nom[0]));
	  $collection->update(array("login" => $login), $n_nom);
	  echo "\nLe nom de l'utilisateur ".$login." a ete modifie !\n";
	}
      else if ($rep[0] == "promo")
	{
	  echo "\nNouvelle promo pour l'utilisateur ".$login." ?\n";
	  $new_promo = fopen("php://stdin", "r");
	  echo "> ";
	  $cmd_new_promo = fgets($new_promo);
	  preg_match("/^.*$/", $cmd_new_promo, $promo);
	  $c = new MongoClient();
	  $db = $c->mydb;
	  $collection = $c->mydb->selectCollection('student');
	  $n_promo = array('$set' => array('promo'  => $promo[0]));
	  $collection->update(array("login" => $login), $n_promo);
	  echo "\nLa promo de l'utilisateur ".$login." a ete modifie !\n";
	}
      else if ($rep[0] == "email")
	{
	  echo "\nNouveau email pour l'utilisateur ".$login." ?\n";
	  $new_email = fopen("php://stdin", "r");
	  echo "> ";
	  $cmd_new_email = fgets($new_email);
	  preg_match("/^.*$/", $cmd_new_email, $email);
	  $c = new MongoClient();
	  $db = $c->mydb;
	  $collection = $c->mydb->selectCollection('student');
	  $n_email = array('$set' => array('email'  => $email[0]));
	  $collection->update(array("login" => $login), $n_email);
	  echo "L'email de l'utilisateur ".$login." a ete modifie !\n";
	}
      else if ($rep[0] == "telephone")
	{
	  echo "\nNouveau telephone pour l'utilisateur ".$login." ?\n";
	  $new_telephone = fopen("php://stdin", "r");
	  echo "> ";
	  $cmd_new_telephone = fgets($new_telephone);
	  preg_match("/^.*$/", $cmd_new_telephone, $telephone);
	  $c = new MongoClient();
	  $db = $c->mydb;
	  $collection = $c->mydb->selectCollection('student');
	  $n_telephone = array('$set' => array('telephone'  => $telephone[0]));
	  $collection->update(array("login" => $login), $n_telephone);
	  echo "\nLe telephone de l'utilisateur ".$login." a ete modifie !\n";
	}
      else if ($rep[0] == "exit" || $rep[0] == "quit")
	{
	  echo "Bye !\n";
	  return (0);
	}
      else
	{
	  echo "\n".$rep[0]." ne fait pas parti des donnees modifiables.\n";
	  echo "\nLes donnees modifiables sont :\n";
	  echo "\t- nom\n";
	  echo "\t- promo\n";
	  echo "\t- email\n";
	  echo "\t- telephone\n";
	  update_student($login);
	}
    }
}