<?php
// check_func.php for  in /home/elgoha_r/project/nox
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Mon Nov 10 13:58:49 2014 EL GOHARY Rouis
// Last update Mon Nov 10 14:04:55 2014 EL GOHARY Rouis
//

function	is_valid_param($tab)
{
  if (!file_exists($tab))
    {
      echo "\033[91m./nox.php: $tab: File doesn't exists!\033[0m\n\n";
      return (1);
    }
  else if (!is_readable($tab))
    {
      echo "\033[91m./nox.php: $tab: Permission denied!\033[0m\n\n";
      return (1);
    }
  else if (is_dir($tab))
    {
      echo "\033[91m./nox.php: $tab: Is a directory!\033[0m\n\n";
      return (1);
    }
}

function	usage($argc)
{
  if ($argc < 3)
    {
      echo "\033[91mUsage: ./nox.php message(.txt) [message(.txt)] dico(.txt)\033[0m\n";
      exit;
    }
}