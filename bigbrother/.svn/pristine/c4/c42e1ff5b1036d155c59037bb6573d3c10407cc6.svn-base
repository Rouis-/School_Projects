<?php
// my_show.php for  in /home/elgoha_r/no
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Wed Jan  7 16:20:22 2015 EL GOHARY Rouis
// Last update Fri Jan  9 18:40:44 2015 EL GOHARY Rouis
//

function	show_student($login)
{
  $c = new MongoClient();
  $db = $c->mydb;
  $collection = $c->mydb->selectCollection('student');
  $user = $collection->findOne(array("login" => $login));

  if ($user == NULL)
    {
      echo "L'utilisateur ".$login." n'est pas dans la base de donnee !\n";
      echo "\nVoulez-vous le creer maintenant ? ('oui' ou 'non')\n";
      $ent = fopen("php://stdin", "r");
      echo "> ";
      $cmd_ent = fgets($ent);
      preg_match("/^.*$/", $cmd_ent, $rep);
      if ($rep[0] == "exit" || $rep[0] == "quit" || $rep[0] == "non")
	{
	  echo "Bye !\n";
	  return (0);
	}
      else if ($rep[0] == "oui")
	{
	  add_student($login);
	  show_student($login);
	  return (0);
	}
      else
	show_student($login);
    }
  else
    {
      echo "\nLogin\t\t: ".$user["login"]."\n";
      echo "Nom\t\t: ".$user["nom"]."\n";
      echo "Promo\t\t: ".$user["promo"]."\n";
      echo "Email\t\t: ".$user["email"]."\n";
      echo "Telephone\t: ".$user["telephone"]."\n";
      if (isset($user['commentaire']))
	echo "Commentaires :\n\t".$user['commentaire']."\n";
      echo "\nInformations de l'utilisateur ".$login." !\n\n";
    }
}