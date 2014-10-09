<div class="page-header">
	<h1>Nastavení</h1>
</div>

<div class="jumbotron">
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="form-horizontal" role="form">

		<?php
		if ($submitSettings) {
			function write_ini_file($assoc_arr, $path, $has_sections=FALSE) { 
			    $content = ""; 
			    if ($has_sections) { 
			        foreach ($assoc_arr as $key=>$elem) { 
			            $content .= "[".$key."]\n"; 
			            foreach ($elem as $key2=>$elem2) { 
			                if(is_array($elem2)) 
			                { 
			                    for($i=0;$i<count($elem2);$i++) 
			                    { 
			                        $content .= $key2."[] = \"".$elem2[$i]."\"\n"; 
			                    } 
			                } 
			                else if($elem2=="") $content .= $key2." = \n"; 
			                else $content .= $key2." = \"".$elem2."\"\n"; 
			            } 
			        } 
			    } 
			    else { 
			        foreach ($assoc_arr as $key=>$elem) { 
			            if(is_array($elem)) 
			            { 
			                for($i=0;$i<count($elem);$i++) 
			                { 
			                    $content .= $key2."[] = \"".$elem[$i]."\"\n"; 
			                } 
			            } 
			            else if($elem=="") $content .= $key2." = \n"; 
			            else $content .= $key2." = \"".$elem."\"\n"; 
			        } 
			    } 

			    if (!$handle = fopen($path, 'w')) { 
			        return false; 
			    } 
			    if (!fwrite($handle, $content)) { 
			        return false; 
			    } 
			    fclose($handle); 
			    return true; 
			}

			$newData = array(
                'global' => array(
                    'title' => $_POST['pageTitle'],
                    'description' => $_POST['pageDescription'],
                    'keywords' => $_POST['pageKeywords'],
                    'theme' => $_POST['pageTheme']
                ));

			write_ini_file($newData, $source_path.$set_filename, true);
			echo '<div class="alert alert-success"><strong>Úspěšně uloženo.</strong></div>';
		}

		$set_array = parse_ini_file($source_path.$set_filename);
		?>

		<div class="col-md-8">
			<div class="form-group">
				<label for="pageTitle">Titulek stránek</label>
				<input type="text" class="form-control" id="pageTitle" name="pageTitle" value="<?php echo $set_array['title']; ?>">
			</div>

			<div class="form-group">
				<label for="pageDescription">Popis stránek</label>
				<textarea class="form-control" id="pageDescription" name="pageDescription" rows="3"><?php echo $set_array['description']; ?></textarea>
			</div>

			<div class="form-group">
				<label for="pageKeywords">Klíčová slova</label>
				<textarea class="form-control" id="pageKeywords" name="pageKeywords" rows="3"><?php echo $set_array['keywords']; ?></textarea>
			</div>
		</div>

		<div class="col-md-4">
			<div class="col-theme">
				<p><strong>Vzhled stránek</strong></p>
				<ul>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-1" value="pavelkozisek" <?php if($set_array['theme'] == 'pavelkozisek'){echo 'checked="checked"';} ?>> Pavel Kožíšek</label> <img src="img/ico_question.png" class="ico_question" id="info-theme-1" alt=""></li>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-2" value="divadlokouzel" <?php if($set_array['theme'] == 'divadlokouzel'){echo 'checked="checked"';} ?>> Divadlo Kouzel</label> <img src="img/ico_question.png" class="ico_question" id="info-theme-2" alt=""></li>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-3" value="umeleckaagentura" <?php if($set_array['theme'] == 'umeleckaagentura'){echo 'checked="checked"';} ?>> Umělecká agentura</label> <img src="img/ico_question.png" class="ico_question" id="info-theme-3" alt=""></li>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-4" value="kouzelnickytabor" <?php if($set_array['theme'] == 'kouzelnickytabor'){echo 'checked="checked"';} ?>> Kouzelnický tábor</label> <img src="img/ico_question.png" class="ico_question" id="info-theme-4" alt=""></li>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-5" value="flat_white" <?php if($set_array['theme'] == 'flat_white'){echo 'checked="checked"';} ?>> Barva - bílá</li>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-6" value="flat_grey" <?php if($set_array['theme'] == 'flat_grey'){echo 'checked="checked"';} ?>> Barva - šedá</li>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-7" value="flat_blue" <?php if($set_array['theme'] == 'flat_blue'){echo 'checked="checked"';} ?>> Barva - modrá</li>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-8" value="flat_green" <?php if($set_array['theme'] == 'flat_green'){echo 'checked="checked"';} ?>> Barva - zelená</li>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-9" value="flat_brown" <?php if($set_array['theme'] == 'flat_brown'){echo 'checked="checked"';} ?>> Barva - hnedá</li>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-10" value="flat_black" <?php if($set_array['theme'] == 'flat_black'){echo 'checked="checked"';} ?>> Barva - černá</li>
					<li class="radio"><label><input type="radio" name="pageTheme" id="theme-11" value="flat_wine" <?php if($set_array['theme'] == 'flat_wine'){echo 'checked="checked"';} ?>> Barva - vínová</li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>

		<input type="submit" name="submitSettings" class="btn btn-lg btn-primary" value="Uložit">
	</form>
</div>