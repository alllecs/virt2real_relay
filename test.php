<html>
        <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<META HTTP-EQUIV="refresh" CONTENT="60" />
                <title>PHP test</title>
        </head>

	<body link="#0000FF" alink="red" vlink="blue">
		<center><H1>Устройство управления розеткой</H1>
		<br />
	<!-- header end -->
               
		 <?php
		system ("date");
		$x = file_get_contents("/proc/v2r_gpio/35");
		$y = file_get_contents("/proc/v2r_gpio/25");
		echo "<H3><center><br />gpio 35 = $x<br /></center></H3>";
		echo "<H3><center>gpio 25 = $y<br /></center></H3>";
		$a = "Вкл";
		$b = "Выкл";
		$correct = true;
		if ($x == "0" && $y == "0") {
			$c = $a;
			$d = $b;
			if ($_POST['press'] == $a ) {
				$arg = 1;
			}
		} else if ($x == 1 && $y == 1) {
			$c = $b;
			$d = $a;
			if ($_POST['press'] == $b ) {
				$arg = 0;
			}
		} else {
			$correct = false;	
		}	


		if (! $correct)  {
			echo "Неверно установлены пины!";
		} else {
			system("/root/relay.sh $arg");
			echo "<center>Состояние - $d<br /></center>";
		}
		?>
		
		<form method="POST">
		<input type="submit" name="press" value="<?php echo $c;?>" /></center>
		</form>

	<!-- footer begin -->
	<font size="+2"><A href="http://192.168.3.1/admin/shema_ystr.php">Схема устройства</a><br /></font>
	<font size="+2"><A href="http://192.168.3.1/admin/shema_vkl.php">Схема включения</a></font>

        </body>
</html>
