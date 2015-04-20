<?php
// my_comment.php for  in /home/elgoha_r/no
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Wed Jan  7 16:18:23 2015 EL GOHARY Rouis
// Last update Fri Jan  9 18:36:28 2015 EL GOHARY Rouis
//

function	get_comment($commentaire)
{
  $com = fopen("php://stdin", "r");
  echo "> ";
  $cmd_com = fgets($com);

  $new_com = $commentaire.$cmd_com;

  preg_match("/.*([\"])$/", $new_com, $end_comment);
  if (isset($end_comment[1]))
    {
      return ($new_com);
    }
  else
    get_comment($new_com);
}

function	add_comment($login)
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
      echo "\nCommentaire :\n";
      $com = "";
      $com = get_comment($com);
      if (!isset($com))
	{
	  echo "Pour ajouter un commentaire il faut qu'il soit de la forme \"[texte]\" !\n";
	  add_comment($login);
	}
      else if (isset($com))
	{
	  if (isset($user['commentaire']))
	    $old_comment = $user['commentaire'];
	  if (isset($old_comment))
	    {
	      date_default_timezone_set('Europe/Paris');
	      setlocale(LC_TIME, "fr_FR");
	      $date = strftime("%e %B %Y");
	      $commentaire = array('$set' => array('commentaire' => $old_comment."\n\n\t"."~~~~~~~~~~~~\n\n\t".$date." :\n\t".$com."\n"));
	    }
	  else
	    {
	      date_default_timezone_set('Europe/Paris');
	      setlocale(LC_TIME, "fr_FR");
	      $date = strftime("%e %B %Y");
	      $commentaire = array('$set' => array('commentaire' => "\n\t".$date." :\n\t".$com));
	    }
	  $collection->update(array("login" => $login), $commentaire);
	  echo "Commentaire pour l'utilisateur ".$login." ajoute !\n\n";
	}
    }
}