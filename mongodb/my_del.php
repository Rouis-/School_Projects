<?php
// my_del.php for  in /home/elgoha_r/no
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Wed Jan  7 16:19:44 2015 EL GOHARY Rouis
// Last update Fri Jan  9 18:27:29 2015 EL GOHARY Rouis
//

function	del_student($login)
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
      echo "\nEtes-vous sur de vouloir supprimer l'utilisateur ".$login." ?\n";
      $cmdline = fopen("php://stdin", "r");
      echo "> ";
      $ent = fgets($cmdline);
      preg_match("/^.*$/", $ent, $rep);
      if ($rep[0] == "oui")
	{
	  $collection->remove(array("login" => $login));
	  echo "L'utilisateur ".$login." a ete supprime !\n\n";
	  return (0);
	}
      else if ($rep[0] == "non")
	{
	  echo "L'utilisateur ".$login." n'as pas ete supprime !\n\n";
	  return (0);
	}
      else if ($rep[0] == "exit" || $rep[0] == "quit")
	{
	  echo "Bye !\n\n";
	  return (0);
	}
      else
	{
	  echo "'oui' ou 'non' ?\n";
	  del_student($login);
	}
    }
}