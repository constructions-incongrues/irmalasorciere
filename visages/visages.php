<?php
$school = filter_var($_GET['school']);
$imagesTop = array();
foreach (glob(sprintf('%s/%s/1/*.jpg', dirname(__FILE__), $school)) as $path) {
	$imagesTop[] = basename($path);
}
$imagesMiddle = array();
foreach (glob(sprintf('%s/%s/2/*.jpg', dirname(__FILE__), $school)) as $path) {
	$imagesMiddle[] = basename($path);
}
$imagesBottom = array();
foreach (glob(sprintf('%s/%s/3/*.jpg', dirname(__FILE__), $school)) as $path) {
	$imagesBottom[] = basename($path);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Insert title here</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.js"></script>
		<script src="http://cdn.jquerytools.org/1.2.5/all/jquery.tools.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/standalone.css" />
		<link rel="stylesheet" type="text/css" href="css/scrollable-horizontal.css" />
		<link rel="stylesheet" type="text/css" href="css/scrollable-buttons.css" />
		
		<script type="text/javascript">
		$(document).ready(function() {
			$('.scrollable').scrollable({touch: false});
			$('a#random').click(function() {
				// get access to the API
				$("#top").data("scrollable").seekTo(Math.floor(Math.random() * <?php echo count($imagesTop) ?>));
				$("#middle").data("scrollable").seekTo(Math.floor(Math.random() * <?php echo count($imagesTop) ?>));
				$("#bottom").data("scrollable").seekTo(Math.floor(Math.random() * <?php echo count($imagesTop) ?>));
			});
		});
		</script>
		
	</head>

	<body>

		<a id="random" href="#">RAND</a>

		<div class="scrollable" id="top">
			<div class=items>
<?php foreach ($imagesTop as $image): ?>	
				<div>
					<img src="<?php echo sprintf('%s/1/%s', $school, $image) ?>" />
				</div>
<?php endforeach; ?>
			</div>
		</div>
		
		<div class="scrollable" id="middle">
			<div class=items>
<?php foreach ($imagesMiddle as $image): ?>	
				<div>
					<img src="<?php echo sprintf('%s/2/%s', $school, $image) ?>" />
				</div>
<?php endforeach; ?>
			</div>
		</div>
			
		<div class="scrollable" id="bottom">
			<div class=items>
<?php foreach ($imagesBottom as $image): ?>	
				<div>
					<img src="<?php echo sprintf('%s/3/%s', $school, $image) ?>" />
				</div>
<?php endforeach; ?>
			</div>
		</div>
	</body>

</html>