<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<META HTTP-EQUIV="refresh" CONTENT="60" />
		<title>test</title>
	</head>

	<body>
		<?php

		if (isset($_GET['action'])) {
			$g = $_GET['action'];
		} else {
			$g = '';
		}
#		system("echo action=$g > /tmp/hz");
		if ($g == "on") {
			system("/root/relay.sh 1");
		} else  if ($g == "off") {
                        system("/root/relay.sh 0");
		}
		?>
        </body>
</html>
