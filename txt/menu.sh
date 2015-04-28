#!/bin/bash

function power {
clear
echo "Управление питанием"
options=("Включить питание" "Выключить питание" "Выход")
select on in "${options[@]}"
do
        case $on in
                "Включить питание")
                        /root/relay.sh 1
                        ;;
                "Выключить питание")
			/root/relay.sh 0
                        ;;
                "Выход")
                        break
                        ;;
                *) echo "Нужно выбрать раздел";;
        esac
done
}

function menu {
clear
echo 
echo -e "\t\tУтройство управления розеткой\n"
echo -e "\t1. Управление питанием"
echo -e "\t2. Информация об устройстве"
echo -e "\t0. Выход"
echo -en "\t\tВведите номер раздела:"
read -n 1 option
}

while [ $? -ne 1 ]
do
	menu
	case $option in
0)
	break
	;;
1)
	power
	;;
2)
	clear
	echo "web address http://192.168.3.1/admin/index2.html"
	echo "Дата: "
	date
	ifconfig usb0

	;;
*)
	clear
	echo "Нужно выбрать раздел"
	;;
esac
echo -en "\n\n\tНажмите любую клавишу для продолжения"
read -n 1 line
done
clear
