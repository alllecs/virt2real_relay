#!/bin/bash

if [ "$1" != "0" -a "$1" != "1" ]; then
	echo "Ошибка ввода"
	exit 1
fi

echo "set gpio 35 output $1" > /dev/v2r_gpio
echo "set gpio 25 output $1" > /dev/v2r_gpio
