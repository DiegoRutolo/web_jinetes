#!/usr/bin/env bash

file=$1
pausa=14
contador=0
lim=$2

while read line; do
	if [[ $contador -le $lim ]]; then
		echo "Saltada línea $contador ($line)"
		((contador++))
	else
		firefox -new-tab "https://www.wordreference.com/es/translation.asp?tranword=$line" &
		sleep $pausa
	fi
done < $file

