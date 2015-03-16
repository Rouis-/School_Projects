<?php
// pass_func.php for  in /home/elgoha_r/project/nox
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Mon Nov 10 10:07:42 2014 EL GOHARY Rouis
// Last update Mon Nov 10 13:45:47 2014 EL GOHARY Rouis
//
function	get_log()
{
  echo "\033[92mPlease enter your Agent login or 'quit':\n\033[0m";
  echo "\033[92m> \033[0m";
  $login = read_line();
  is_exit($login);
  if ($login == 'asset')
    get_pass($login);
  else
    {
      echo "\033[91mUnknown login, Access denied!\n\n\033[0m";
      get_log();
    }
}

function	get_pass($login)
{
  echo "\033[92m\nPlease enter your Agent password or 'quit':\n\033[0m";
  echo "\033[92m> \033[0m";
  shell_exec('stty -echo');
  $pass = read_line();
  shell_exec('stty echo');
  is_exit($pass);
  if ($pass == 'nox')
    {
      system("clear");
      echo "\033[92mWelcome Agent ".$login." !\n\n\033[0m";
      return($login);
    }
  else
    {
      echo "\033[91mWrong password, access denied!\n\n\033[0m";
      get_pass($login);
    }
}

function	is_exit($str)
{
  $chex = strtolower($str);
  if ($chex == 'exit' || $chex == 'quit')
    {
      echo "\n";
      timer();
      system("clear");
      echo "\033[91mBe careful!\n\033[0m";
      echo "\033[92mGoodluck and goodbye Agent!\n\033[0m";
      exit;
    }
  else
    return($str);
}