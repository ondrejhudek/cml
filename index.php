<?php
$source_path = "source/";

$set_filename = "settings.ini";
$set_array = parse_ini_file($source_path.$set_filename);

$con_filename = "content.ini";
$con_array = parse_ini_file($source_path.$con_filename, true);

$dir = "theme/";
$theme = $set_array['theme'];
$path = $dir.$theme."/";

if (!file_exists($path) || empty($theme)){
	$path = $dir."default/";
} else {
	if (substr($theme, 0, 4) == "flat") {
		$content = $con_array["flat"];
	} else {
		$content = $con_array[$theme];
	}

	$fn = "source/main.txt";
	if (isset($_POST['content'])) {
		$content = stripslashes($_POST['content']);
		$fp = fopen($fn,"w") or die ("Error opening file in write mode!");
		fputs($fp,$content);
		fclose($fp) or die ("Error closing file!");
	}
}
?>
<!DOCTYPE html>
<html lang="cs">
	<?php
	include($path.'index.php');
	?>

</html>