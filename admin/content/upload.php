<div class="page-header">
	<h1>Nahrání souboru</h1>
</div>

<div class="jumbotron">

	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="form-upload" enctype="multipart/form-data">
		<fieldset>
		    <input type="file" id="uploadFile" name="uploadFile" title="Vybrat soubor"><br>

			<?php
			if ($submitUpload) {
				$warsize=500000; 	//doporučená velikost souboru
				$maxsize=1000000; 	//maximální velikost souboru
				$ms=$maxsize/1000;
				$ws=$warsize/1000;
				$ok=1;
				$adresar="../upload/";
				if($uploadFile) {
					if ((($uploadFile_type == "image/gif") || ($uploadFile_type == "image/jpeg") || ($uploadFile_type == "image/jpg") || ($uploadFile_type == "image/pjpeg") || ($uploadFile_type == "image/x-png") || ($uploadFile_type == "image/png"))) {
						$s=$adresar.$uploadFile_name; 
						if($uploadFile_size>$maxsize) {
							printf("<div class=\"alert alert-danger\">Soubor <strong>$uploadFile_name</strong> má větší velikost než stanovená maximální velikost souboru, která činí $ms kB.</div>");
							$ok=0; 
						} else if($uploadFile_size>$warsize) {
							printf("<div class=\"alert alert-warning\">UPOZORNĚNÍ: Soubor <strong>$uploadFile_name</strong> má větší než doporučenou velikost. Doporučená velikost je $ws kB.</div>");
						}
						clearstatcache();
						if($ok&&file_exists($s)) { 
							printf("<div class=\"alert alert-danger\">Soubor <strong>$uploadFile_name</strong> již existuje, proto nemohl být znovu nahrán.</div>");
							$ok=0;
						}
						if ($ok) { 
							if(!(copy($uploadFile,$s))) 
								printf("<div class=\"alert alert-danger\">CHYBA: Soubor <strong>$uploadFile_name</strong> nemohl být zkopírován. Kontaktujte správce.</div>");
							else { 
								chmod($s,0644); 
								printf("<div class=\"alert alert-success\">Soubor <strong>$uploadFile_name</strong> byl úspěšně uložen.</div>");
							} 
						} 
					} else {
						printf("<div class=\"alert alert-danger\">Špatný formát souboru. Lze nahrát pouze <strong>obrázky</strong> (.jpg, .png, .gif).</div>");
					}
				} else {
					printf("<div class=\"alert alert-danger\">Soubor nebyl vybrán.</div>");
				}
			} 
			?> 

			<input type="submit" name="submitUpload" class="btn btn-lg btn-primary" value="Nahrát">
		</fieldset>
	</form>

</div>

<div class="list-images">
	<?php
	echo '<form action="'. $_SERVER['REQUEST_URI'] .'" method="post">';
	echo "\n";
	?>
	<div class="list-images-heading">
		<h2 class="pull-left">Seznam souborů</h2>

		<div class="pull-right">
			<span class="btn btn-default" onclick="checkAll();"><span class="glyphicon glyphicon-check"></span> Označit všechny</span>
			<span class="btn btn-default" onclick="uncheckAll()"><span class="glyphicon glyphicon-unchecked"></span> Zrušit označení</span>
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<span class="glyphicon glyphicon-cog"></span> Nastavení  <span class="caret"></span>
				</button>

				<div class="dropdown-menu pull-right" role="menu">
				    <?php
					echo '<input type="button" name="delete-selected" class="file-delete" value="Smazat vybrané">';
				  	echo "\n";
					echo '<input type="submit" name="deleteselected" class="hidden" value="Submit">';
				  	echo "\n";
					echo '<input type="button" name="delete-all" class="file-delete" value="Smazat všechny">';
				  	echo "\n";
					echo '<input type="submit" name="deleteall" class="hidden" value="Submit">';
				  	echo "\n";
					?>
				</div>

			</div>
		</div>
		<div class="clearfix"></div>
	</div>

	<?php
	if ($deleteselected) {
		$selectedFiles = $_POST['fileimage'];
		if (count($selectedFiles) > 0) {
			foreach ($selectedFiles as $key => $value) {
				$fileToDelete = "../upload/" . $value;
				if (is_file($fileToDelete)) {
					unlink($fileToDelete);
					echo '<div class="alert alert-success">Soubor <strong>'.$value.'</strong> byl úspěšně smazán.</div>';
				}
			}
		}
	}

    if ($deleteall) {
		$allFiles = glob('../upload/*');
		if (count($allFiles) > 0) {
			foreach($allFiles as $file) {
				if (is_file($file)) {
					unlink($file);
					echo '<div class="alert alert-success">Soubor <strong>'.substr($file, 10).'</strong> byl úspěšně smazán.</div>';
				}
			}
		}
	}

	$files = directoryToArray("../upload", false);

	if (count($files) == 0) {
		echo '<div class="alert alert-dismissable">- Žádné soubory -</div>';
	} else {
		foreach ($files as $file) {
			echo '<div class="item-image img-thumbnail"><a href="#" title="' . $file . '"><img src="../upload/' . $file . '" class="thumb" alt="' . $file . '"></a><br><input type="checkbox" name="fileimage[]" value="' . $file . '"></div>';
			echo "\n";
		}
		echo '<div class="clearfix"></div>';
		echo "\n";
	}

	echo "</form>";
	echo "\n";
	?>

</div>

<div id="photoModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3 class="modal-title">Heading</h3>
	</div>
	<div class="modal-body">
		
	</div>
	<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal">Zavřít</button>
	</div>
   </div>
  </div>
</div>

<div id="askModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3 class="modal-title">Pokračovat?</h3>
	</div>
	<div class="modal-body">
		<span class="glyphicon glyphicon-info-sign"></span> Opravdu chcete soubory odstranit?
	</div>
		<div class="modal-footer">
		<button class="btn btn-primary" id="delete-yes">Ano</button>
		<button class="btn btn-default" data-dismiss="modal">Ne</button>
	</div>
   </div>
  </div>
</div>