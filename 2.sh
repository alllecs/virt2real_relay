#!/bin/bash

val="$1"

case "$val" in

first) echo "value = "
	echo "<html> шапка ....."
	echo "Опрос пинов"
	echo "<html>Вывод пинов</html>"
	echo "Создать название кнопки (\$val будущего запуска) в зависимости от пинов"
	echo "<html>Создать кнопку</html>"
	echo "<html> хвост ....."
	;;
on) echo "value = вкл"
	echo "Опрос пинов"
	echo "Сравнение пинов с 0"
	echo "Если пины оба в 0"
		echo "установить пины в 1"
		echo "задержка 50 ms"
		echo "Опрос пинов"

		echo "Если пины оба в 1"
		        echo "Вывод пинов"
			echo "Создать название кнопки - выкл"
			echo "Создать кнопку"
		echo "Если пины хотя бы один в 0"
			echo "Ошибка не могу включить"
	echo "Если пины в 1"
		echo "Ошибка уже включено"
	;;
off) echo "value = выкл"
	echo "Опрос пинов"
	echo "Сравнение пинов с 1"
	echo "Если пины оба в 1"
		echo "установить пины в 0"
		echo "задержка 50 ms"
		echo "Опрос пинов"

		echo "Если пины оба в 0"
		        echo "Вывод пинов"
			echo "Создать название кнопки - вкл"
			echo "Создать кнопку"
		echo "Если пины хотя бы один в 1"
			echo "Ошибка не могу выключить"
	echo "Если пины в 0"
		echo "Ошибка уже выключено"
	;;
esac