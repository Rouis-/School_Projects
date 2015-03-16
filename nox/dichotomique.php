<?php
// dichotomique.php for  in /home/sasees_t/projets/nox/elgoha_r/nox
// 
// Made by SASEESKUMAR Tharushan
// Login   <sasees_t@etna-alternance.net>
// 
// Started on  Mon Nov 10 11:48:58 2014 SASEESKUMAR Tharushan
// Last update Mon Nov 10 12:28:08 2014 EL GOHARY Rouis
//

function dichotomique($to_find,$tab,$end)
{
  $start=0;
  while (1)
    {
      if($start > $end)
	{
	  return (-1);
	}
      if($to_find == $tab[$start])
	{
	  return $start;
	}
      $mid = floor(($start + $end ) / 2);
      if($to_find < $tab[$mid])
	$end = $mid - 1;
      elseif ($to_find > $tab[$mid])
	$start = $mid + 1;
      else
        return $mid;
    }
}