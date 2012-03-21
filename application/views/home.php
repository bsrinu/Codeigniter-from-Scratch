<!DOCTYPE html>
<head>
	<title>CI Series</title>
	<meta charset="utf-8">
</head>
<body>
	<div id="container">
		<p>My view has been loaded</p>
		
		<?php foreach($rows as $r): ?>
		<h1><?php echo $r->title; ?></h1>
		<p><em><?php echo $r->author; ?></em></p>
		<div><?php echo $r->contents; ?></div>
		<?php endforeach; ?>
		

	</div>
</body>
</html>