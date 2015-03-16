<?php
// tri_rapide.php for  in /home/elgoha_r/j03/defi12
// 
// Made by EL GOHARY Rouis
// Login   <elgoha_r@etna-alternance.net>
// 
// Started on  Wed Oct 22 20:11:08 2014 EL GOHARY Rouis
// Last update Mon Nov 10 15:50:04 2014 EL GOHARY Rouis
//

function	tri_rapide($tab)
{
  if (count($tab) < 2)
    return $tab;
  $left = $right = array();
  reset($tab);
  $p_key = key($tab);
  $pivot = array_shift($tab);
  foreach( $tab as $key => $value )
    {
      if( $value < $pivot )
	$left[$key] = $value;
      else
	$right[$key] = $value;
    }
  return array_merge(tri_rapide($left), array($p_key => $pivot), tri_rapide($right));
}