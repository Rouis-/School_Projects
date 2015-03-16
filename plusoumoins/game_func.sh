#!/bin/bash
## game_func.sh for  in /home/elgoha_r/project/morl
## 
## Made by EL GOHARY Rouis
## Login   <elgoha_r@etna-alternance.net>
## 
## Started on  Wed Nov  5 13:12:06 2014 EL GOHARY Rouis
## Last update Wed Nov  5 18:10:04 2014 EL GOHARY Rouis
##
get_game_mode()
{
    echo -e "Choisissez un mode de jeu:\n"
    read -p "1 ou 2 > " rep
    echo -e ""
    if [ "$rep" == "1" ]
    then game
    elif [ "$rep" == "2" ]
    then game_timer
    else
	get_game_mode
    fi
}

game()
{
    timer
    echo -e "\n"
    num=$((RANDOM %= 101))
    if [ $i ]
    then i=10
    else
	i=10
    fi
    while (($i > 0))
    do
	echo -e "\033[1;4;32mDevinez combien:\n\033[0m"
	read -p "$name > " number
	echo -e ""
	if [ "$number" == "exit" ]; then echo -e "\033[1;5;35m\nMerci d'avoir joue et a bientot !\033[0m"; exit; fi
	if [ "$number" == "help" ]; then aff_help; fi
	i=`expr $i - 1`
	if (($i == 0))
	then echo -e "C'est fini. Vous avez perdu. C'est pas grave. Tout le monde ne peut pas etre intelligent..\n"
	    replay
	fi
	if [ "$(echo $number | grep "^[[:digit:]]*$")" ] && [ "$number" != "exit" ] && [ "$number" != "help" ]
	then
	    if (("$number" > 100)) || (("$number" < 0))
	    then
		echo -e "Vous cherchez un nombre entre 0 et 100 et vous venez de perdre un tour a cause de ce test! Vous avez encore $i chances !\n"
	    elif (("$number" > "$num"))
	    then
		echo -e "C'est moins ! Vous avez encore $i chances !\n"
	    elif (("$number" < "$num"))
	    then
		echo -e "C'est plus ! Vous avez encore $i chances !\n"
	    elif (("$number" == "$num"))
	    then echo -e "BRAVO ! Vous avez gagne, vous pouvez venir chercher votre cadeau au bureau de la pedago le 30 Fevrier prochain!\n"
		replay
	    fi
	elif [ "$number" != "exit" ] && [ "$number" != "help" ] && (($i > 0))
	then
	    if [ "${number:0:1}" == "-" ]
	    then echo -e "Vous cherchez un nombre entre 0 et 100 et vous venez de perdre un tour a cause de ce test! Vous avez encore $i chances !\n"
	    else
		i=`expr $i + 1`
		echo -e "Je ne comprends pas, reessayez !\n"
	    fi
	fi
    done
}

game_timer()
{
    echo -e "\033[1;31mBientot disponible!\033[0m"
    get_game_mode
}

replay()
{
    echo -e "\033[1;7;33mPour rejouer tapez 'oui' sinon pour quitter tapez 'non'.\n\033[0m"
    read -p "oui ou non > " rep
    echo -e ""
    if [ "$rep" == "oui" ]
    then get_game_mode
    elif [ "$rep" == "non" ]
    then
	echo -e "\033[1;5;35mMerci d'avoir joue et a bientot !\033[0m"; exit;
    else
	replay
    fi
}

timer()
{
    sec=3
    while [ $sec -ge 0 ]
    do
        echo -ne "Preparez vous le jeu commence dans $sec sec!\033[0K\r"
        sleep 1
        : $((sec--))
    done
}