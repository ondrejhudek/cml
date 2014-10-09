<div class="page-header">
	<h1>Hlavní obsah</h1>
</div>

<?php
$fn = "../source/main.txt";

if (isset($_POST['mainContent'])) {
	$content = stripslashes($_POST['mainContent']);
	$fp = fopen($fn,"w") or die ("Error opening file in write mode!");
	fputs($fp,$content);
	fclose($fp) or die ("Error closing file!");

	echo '<div class="alert alert-success"><strong>Úspěšně uloženo.</strong></div>';
}
?>

<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
	<textarea rows="25" cols="40" name="mainContent" id="mainContent" class="tinymce"><?php readfile($fn); ?></textarea>
	<p><input type="submit" class="btn btn-lg btn-primary" value="Uložit"></p>
</form>