<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<META HTTP-EQUIV="refresh" CONTENT="60" />
		<title>PHP test</title>
	</head>

	<body>
		<center><H1>Устройство управления розеткой</H1></center>
		<br />
	<!-- header end -->

		<?php
		system("sleep 1");
		system ("date");

		function get()
		{
			$x = file_get_contents("/proc/v2r_gpio/35");
			$y = file_get_contents("/proc/v2r_gpio/25");
			echo "<br /> get returns $x$y<br />";
			return "$x$y";
		}

		$vkl = "Вкл";
		$vykl = "Выкл";
		$correct = true;

		function show($xy) {
			#$a = "<H3><center><br />gpio 35 = $x<br /></center></H3>";
			#$a = "<H3><center>gpio 25 = $y<br /></center></H3>";
			#$a = "<center>Состояние - $j<br /></center>";

			$j = "undef";

			if ("$xy" == "00") {
				$j = "выключено";
			}

			if ("$xy" == "11") {
				$j = "включено";
			}

			echo "<H3><center>gpios = $xy<br /></center></H3>";
			echo "<center>Состояние - $j<br /></center>";
			
		}

		function n2m($n) {
			if ($n == "0")
				return "1";
			return "0";
		}

		function status($text, $text2, $xy, $arg, $n) {
                        show($xy);
			if ($xy == "$n$n") {
	                        in($arg);
                                $xy = get();

				# $m --- new right state
				$m = n2m($n);
                                if ($xy != "$m$m") {
                                        echo "Ошибка не могу $text";
                                }
                        } else {
                                echo "Ошибка уже $text2";
                        }
		}

		function in($arg) {
			system("/root/relay.sh $arg");
		}

		if (isset($_GET['press'])) {
			$get_press = $_GET['press'];
		} else {
			$get_press = '';
		}

		$xy = get();
		if ($get_press == $vykl) {
			$j = $vykl;

			$n = "1"; # right current pin state
			$arg = 0; # relay
			status("выключить", "включено", $xy, $arg, $n);
		} else if ($get_press == $vkl) {
			$j = $vkl;

			$n = "0"; # right current pin state
			$arg = 1; # relay
			status("включить", "выключено", $xy, $arg, $n);
		} else {

			if ($xy == "11") {
				$j = $vykl;
				show($xy);
			} else if ($xy == "00") {
				$j = $vkl;
				show($xy);
			} else  {
				echo "Not normal";
			}
		}

		?>

		<form method="GET">
                <input type="submit" name="press" value="<?php echo $j;?>" /></center>
                </form>
<!-- footer begin -->
        <font size="+2"><A href="http://192.168.3.1/admin/shema_ystr.php">Схема устройства</a><br /></font>
        <font size="+2"><A href="http://192.168.3.1/admin/shema_vkl.php">Схема включения</a></font>

        </body>
</html>
