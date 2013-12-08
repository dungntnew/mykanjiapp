<html>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<h1><?php echo $heading;?></h1>

<h3>Word List</h3>

<ul>
<?php foreach ($words as $word):?>

<li>
	<?php echo $word->id;?> : 
	<?php echo $word->kanji;?>
</li>

<?php endforeach;?>
</ul>

</body>
</html>