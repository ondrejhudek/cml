<?php session_start();
//check logged in or not!
if(!isset($_SESSION['login_user'])){
	header('Location:login.php?pagename='.basename($_SERVER['PHP_SELF'], ".php"));
}

$source_path = "../source/";
$set_filename = "settings.ini";
$set_array = parse_ini_file($source_path.$set_filename);

$files = directoryToArray("../upload", false);

function directoryToArray($directory, $recursive) {
  $array_items = array();
  if ($handle = opendir($directory)) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        if (is_dir($directory. "/" . $file)) {
          if($recursive) {
            $array_items = array_merge($array_items, directoryToArray($directory. "/" . $file, $recursive));
          }
        } else {
          $array_items[] = preg_replace("/\/\//si", "/", $file);
        }
      }
    }
    closedir($handle);
  }
  return $array_items;
}
?>
<!DOCTYPE html>
<html lang="cs">
  <head>
      <title>CML</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="keywords" content="<?php echo $set_array['keywords'] ?>">
      <meta name="description" content="<?php echo $set_array['description'] ?>">
      <meta name="generator" content="CML">

      <link rel="shortcut icon" href="img/favicon.ico">
      
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/bootstrap-navbar.css" rel="stylesheet">
      <link href="css/bootstrap-lightbox.css" rel="stylesheet">
      <link href="css/bootstrap-edit.css" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet">

      <script language="javascript" type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
      <script language="javascript" type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
      <script language="javascript" type="text/javascript" src="js/bootstrap.js"></script>
      <script language="javascript" type="text/javascript" src="js/bootstrap-fileinput.js"></script>
      <script language="javascript" type="text/javascript" src="js/bootstrap-lightbox.js"></script>
      <script language="javascript" type="text/javascript" src="js/functions.js"></script>

      <script type="text/javascript">
        $(document).ready(function(){
          var selector = "textarea[class~='tinymce']";
          var height;
          if ($(selector).attr("name") == "mainContent") {
            height = 400;
          } else {
            height = 150;
          }
        
          tinymce.init({
            selector: selector,
            language : 'cs',
            height : height,
            plugins: [
               "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
               "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
               "save table contextmenu directionality emoticons template paste textcolor"
              ],
            image_advtab: true,
            toolbar: "insertfile undo redo | styleselect fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media fullpage | forecolor backcolor emoticons",
            image_list: [
                <?php
                if (count($files) > 0) {
                  foreach ($files as $file) {
                      echo "{title: '" . $file . "', value: '../upload/". $file . "'}";
                      if($file != $files[count($files)-1]) {
                        echo ",\n";
                      } else {
                        echo "\n";
                      }
                  }
                }
                ?>
              ]
          });
        });
      </script>
  </head>

  <body>
  	<!-- navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand"><div class="cml-title">CML <small>- <?php echo $_SERVER['HTTP_HOST'] ?></small></div></div>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <?php
            if (!empty($_SERVER['QUERY_STRING'])) {
              echo '<li><a href="index.php"><button type="button" class="btn btn-default navbar-btn">&larr; zpět do Administrace</button></a></li>';
            }
            ?>
            <li><a href="../index.php"><button type="button" class="btn btn-info navbar-btn"><span class="glyphicon glyphicon-eye-open"></span> Náhled webu</button></a></li>
            <li><a href="login.php?ch=logout"><button type="button" class="btn btn-danger navbar-btn"><span class="glyphicon glyphicon-user"></span> Odhlasit se</button></a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- end of navbar -->

    <!-- container -->
    <div class="container">

      <?php
      $str = $_GET['p'];
      $dir = 'content/';
      $uvodni = 'home.php';
      if ($str) {
        if (file_exists($dir.$str.'.php')) {
          include($dir.$str.'.php');
        } else {
          include($dir.'404.php');
         }
      } else {
        include($dir.$uvodni);
      }
      ?>

      <div class="footer">
        <p class="pull-left">© 2013 - CML v1.0 beta</p>
        <p class="pull-right">developed by <a href="http://www.tarole.cz/design">Tarole Design</a></p>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- end of container -->
  </body>
</html>