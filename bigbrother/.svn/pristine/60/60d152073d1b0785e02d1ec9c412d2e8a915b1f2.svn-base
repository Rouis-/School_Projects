<?php
// my_start.php for  in /home/elgoha_r/no
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Mon Jan  5 16:15:00 2015 EL GOHARY Rouis
// Last update Wed Jan  7 16:22:39 2015 EL GOHARY Rouis
//

require "my_del.php";
require "my_add.php";
require "my_update.php";
require "my_show.php";
require "my_comment.php";
require "my_help.php";

function	my_start($argc, $argv)
{
  if ($argc == 3)
    {
      if(function_exists($argv[1]))
	$argv[1]($argv[2]);
      else
      {
	echo "bigbrother.php: $argv[1]: command not found\n";
	echo "Type 'help' to see command list\n";
	}
    }
  else if (($argc == 2) && ($argv[1] == "help"))
    help();
  else
    {
      echo "Usage: php bigbrother.php \"command\" \"login\"\n";
      echo "Type 'help' to see command list\n";
    }
}