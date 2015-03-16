#!/bin/bash
## plusoumoins.sh for  in /home/elgoha_r/project/morl
## 
## Made by EL GOHARY Rouis
## Login   <elgoha_r@etna-alternance.net>
## 
## Started on  Wed Nov  5 10:56:07 2014 EL GOHARY Rouis
## Last update Wed Nov  5 16:49:29 2014 EL GOHARY Rouis
##
source ./aff_func.sh
source ./game_func.sh

aff_welcome
aff_rules
echo -e "\nEntrez votre nom de joueur :\n"
read -p "\"nom\" > " name
echo -e ""
aff_mode
get_game_mode