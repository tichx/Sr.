
<!DOCTYPE html>
<html>
	<head>
		<title>Sr. - A Minimalistic Word Puzzle Solver</title>
		<!-- Animation CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<!-- Main CSS -->
		<link rel="stylesheet" href="http://word.tichx.com/css/wordsite.css">
		<!-- Font Family -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
		<!-- Javascript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="http://word.tichx.com/js/style.js"></script>
		<!-- Icons -->
		<link rel="apple-touch-icon" sizes="180x180" href="http://word.tichx.com/img/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="http://word.tichx.com/img/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="http://word.tichx.com/img/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="http://word.tichx.com/img/manifest.json">
		<link rel="mask-icon" href="http://word.tichx.com/img/safari-pinned-tab.svg" color="#8c8c8c">
		<link rel="shortcut icon" href="http://word.tichx.com/img/favicon.ico">
		<meta name="apple-mobile-web-app-title" content="Sr.">
		<meta name="application-name" content="Sr.">
		<meta name="msapplication-config" content="http://word.tichx.com/img/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		<!-- End of Icons -->

		<!-- Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-90856938-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<!-- End of Google Analytics -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta charset="utf-8" /> 
	</head>
	<body>
		<h2>Sr.</h2>
		<?php
			$input = $_POST['text'];
			$result = exec("python wordsite.py " . $input);
			$results_array = json_decode($result);
			$num_result = count($results_array);
			if ($num_result == 1)
			{
				echo "<h3 class=\"animated fadeInUp\">I found one word matches.<br />It is \"" . $results_array[0] . ".\"</h3>";
			}
			elseif ($num_result == 2)
			{
				echo "<h3 class=\"animated fadeInUp\">I found two words match.<br /> They are ";
				echo $results_array[0]." and ".$results_array[1].".";
			}
			elseif ($num_result > 2)
			{
				echo "<h3 class=\"animated fadeInUp\">I found " . $num_result . " words match.<br /> They are ";
				for ($i=0; $i < $num_result-1 ; $i++) { 
					echo $results_array[$i].", ";

				}
				echo "and ".$results_array[$num_result-1].".</h3>";
			}
			else
			{
				echo "<h3 class=\"animated fadeInUp\">Sorry, I can't help you with that.</h3>";
			}
		?>
		<div>
			<form method="POST" class="animated fadeInUp">
			  <input type="text" name="text" placeholder="type in here..... " class="underlined" >
			  <!--<button class="astext" target="_blank">Voilà!</button>-->
			</form>
		</div>
	</body>
	
</html>
