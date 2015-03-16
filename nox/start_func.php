<?php
// start_func.php for  in /home/elgoha_r/project/nox
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Mon Nov 10 14:00:23 2014 EL GOHARY Rouis
// Last update Mon Nov 10 17:59:41 2014 SASEESKUMAR Tharushan
//
function	all($argv, $argc)
{
  if (usage($argc))
    return (0);
  $login = aff_welcome();
  $i = 1;
  while (($i < $argc - 1) && isset($argv[$i]))
    {
      if(is_valid_param($argv[$i], $argc) == 0 && is_valid_param($argv[$argc - 1], $argc) == 0)
	{
	  echo "\033[92mYour \033[91m{$argv[$i]} \033[92mcontains:\n\033[0m";
	  $research = start($argv[$i], $argv,  $argc);
	  $research = number_format($research, 8);
	  print_r($login);
	  echo "\033[92m\nThank you for waiting Agent!\n\033[0m";
	  echo "\033[92mResearch process took \033[94m{$research}\033[92m seconds!\n\n\033[0m";
	}
      $i++;
    }
  aff_goodbye($login);
}

function	start($tab, $argv, $argc)
{
  $mes = file_get_contents($tab);
  preg_match_all("#\S+#", $mes, $message);
  $dico = file_get_contents($argv[$argc - 1]);
  preg_match_all("#\S+#", $dico, $wesh);
  $nbmes = count($message[0]) - 1;
  $nbdico = count($wesh[0]) - 1;
  $wesh[0] = tri_rapide($wesh[0]);
  $start = microtime(true);
  $i = 0;
  while ($i <= $nbmes)
    {
      $search = dichotomique($message[0][$i],$wesh[0],$nbdico);
      if    ($search >= 0)
	echo $message[0][$i]."\n";
      $i++;
    }
   $end = microtime(true);
  $time = $end - $start;
  return ($time);
}