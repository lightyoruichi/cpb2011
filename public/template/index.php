<?php

use Hybrid\Html;

$title   = isset($title) ? $title : '';
$content = isset($content) ? $content : ''; ?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php 
	echo Html::title($title);
	echo Asset::css(array('style.css', 'prettify.css', 'cpb2011.css'));
	echo Asset::css(array('print.css'), array('media' => 'print', 'charset' => 'utf-8'));
	echo Asset::js('prettify.js'); ?>
</head>

<body onload="prettyPrint()">
	
	<div id="wrapper"><!-- Begin wrapping -->
		
		<div id="header"><!-- Begin header -->
			
			<div id="masthead" class="left">
				<h1>CPB2011</h1>
			</div>
			
			<hr />
			
			<div id="count" class="right">
			  <div>20 signatories</div>
			</div>
			
			<div class="clear"></div>
			
			<hr />
			
		</div><!-- End header -->
		
		<div id="content"><!-- Begin content -->
			
			<?php echo $content; ?>
						
		</div><!-- End content -->
		
		<hr />
		
		<div id="footer"><!-- Begin footer -->
			
			<p class="left">&copy; 2011 CPB2011 Petition. This site is developed by uncertified web developer!</p>
			<p class="right">Sponsored by <a href="http://mentariworks.com/">MentariWorks</a>.</p>
			
			<div class="clear"></div>
			
		</div><!-- End footer -->
		
	</div><!-- End wrapping -->
	
</body>
</html>