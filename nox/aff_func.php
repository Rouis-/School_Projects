<?php
// aff_func.php for  in /home/elgoha_r/project/nox
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Fri Nov  7 11:56:10 2014 EL GOHARY Rouis
// Last update Mon Nov 10 13:42:15 2014 EL GOHARY Rouis
//
function	aff_welcome()
{
  system("clear");
  echo "\033[92mWelcome to the wesh detector program!\n\n\033[0m";
  get_log();
}

function	aff_goodbye($login)
{
  echo "\033[96mType 'exit' or 'quit' to quit the program.\n\033[0m";
  echo "\033[96m> \033[0m";
  $exit = read_line();
  is_exit($exit);
  aff_goodbye($login);
}

function	timer()
{
  $sec=10;
  while ($sec >= 0)
    {
      echo "\033[5;91mThis program will be destroyed in $sec sec!\033[0K\033[0m\r";
      sleep(1);
      $sec--;
    }
}

function	read_line()
{
  $cmdline = fopen("php://stdin", "r");
  $cmd = fgets($cmdline);
  $line = trim($cmd);
  return ($line);
}