<div class="page-header">
	<h1>Postranní sekce</h1>
</div>

<div class="jumbotron">
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="form-horizontal" role="form">
		
		<?php
		$con_filename = "content.ini";

		if ($submitContent) {
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
                'pavelkozisek' => array(
                    'headline' => $_POST['pavHeadline'],
                    'header' => $_POST['pavHeader'],
                    'slider1' => $_POST['pavSlider1'],
                    'slider2' => $_POST['pavSlider2'],
                    'slider3' => $_POST['pavSlider3'],
                    'footer' => $_POST['pavFooter']
                ),
                'divadlokouzel' => array(
                    'headline' => $_POST['divHeadline'],
                    'rightBox' => $_POST['divRightBox'],
                    'footer' => $_POST['divFooter'],
                ),
                'umeleckaagentura' => array(
                    'headline' => $_POST['umeHeadline'],
                    'rightBox' => $_POST['umeRightBox'],
                    'footer' => $_POST['umeFooter'],
                ),
                'kouzelnickytabor' => array(
                    'headline' => $_POST['kouHeadline'],
                    'headline2' => $_POST['kouHeadline2'],
                    'navbar' => $_POST['kouNavbar'],
                    'header' => $_POST['kouHeader'],
                    'footer' => $_POST['kouFooter'],
                ),
                'flat' => array(
                    'headline' => $_POST['flatHeadline'],
                    'header' => $_POST['flatHeader'],
                    'footer' => $_POST['flatFooter'],
                ));

			write_ini_file($newData, $source_path.$con_filename, true);
			echo '<div class="alert alert-success"><strong>Úspěšně uloženo.</strong></div>';
		}

		$con_array = parse_ini_file($source_path.$con_filename, true);
		$pav_array = $con_array['pavelkozisek'];
		$div_array = $con_array['divadlokouzel'];
		$ume_array = $con_array['umeleckaagentura'];
		$kou_array = $con_array['kouzelnickytabor'];
		$flat_array = $con_array['flat'];
		?>

		<div class="col-md-12">

			<div class="form-content"<?php if($set_array['theme'] == 'pavelkozisek') { echo ' style="display:block;"'; } ?>>
				<div class="form-heading"><p><strong>Vzhled:</strong> <span>Pavel Kožíšek</span></p></div>

				<div class="form-group">
					<label for="colHeadline">Nadpis [H1]</label>
					<input type="text" class="form-control" id="pavHeadline" name="pavHeadline" value="<?php echo $pav_array['headline']; ?>">
				</div>
				<div class="form-group">
					<label for="colHeader">Text v hlavičce stránek</label>
					<textarea class="form-control" id="pavHeader" name="pavHeader" rows="4"><?php echo $pav_array['header']; ?></textarea>
				</div>
				<div class="form-group">
					<div class="col-md-4">
						<label for="colSlider1">Text ve slideru [1]</label>
						<textarea class="form-control" id="pavSlider1" name="pavSlider1" rows="3"><?php echo $pav_array['slider1']; ?></textarea>
					</div>
					<div class="col-md-4">
						<label for="colSlider2">Text ve slideru [2]</label>
						<textarea class="form-control" id="pavSlider2" name="pavSlider2" rows="3"><?php echo $pav_array['slider2']; ?></textarea>
					</div>
					<div class="col-md-4">
						<label for="colSlider3">Text ve slideru [3]</label>
						<textarea class="form-control" id="pavSlider3" name="pavSlider3" rows="3"><?php echo $pav_array['slider3']; ?></textarea>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<label for="colFooter">Patička</label>
					<textarea class="form-control" id="pavFooter" name="pavFooter" rows="2"><?php echo $pav_array['footer']; ?></textarea>
				</div>
			</div>

			<div class="form-content"<?php if($set_array['theme'] == 'divadlokouzel') { echo ' style="display:block;"'; } ?>>
				<div class="form-heading"><p><strong>Vzhled:</strong> <span>Divadlo Kouzel</span></p></div>

				<div class="form-group">
					<label for="colHeadline">Nadpis [H1]</label>
					<input type="text" class="form-control" id="divHeadline" name="divHeadline" value="<?php echo $div_array['headline']; ?>">
				</div>
				<div class="form-group">
					<label for="colHeader">Pravý sloupek</label>
					<textarea class="form-control tinymce" id="divRightBox" name="divRightBox" rows="8"><?php echo $div_array['rightBox']; ?></textarea>
				</div>
					<div class="form-group">
					<label for="colFooter">Patička</label>
					<textarea class="form-control" id="divFooter" name="divFooter" rows="2"><?php echo $div_array['footer']; ?></textarea>
				</div>
			</div>

			<div class="form-content"<?php if($set_array['theme'] == 'umeleckaagentura') { echo ' style="display:block;"'; } ?>>
				<div class="form-heading"><p><strong>Vzhled:</strong> <span>Umělecká agentura</span></p></div>

				<div class="form-group">
					<label for="colHeadline">Nadpis [H1]</label>
					<input type="text" class="form-control" id="umeHeadline" name="umeHeadline" value="<?php echo $ume_array['headline']; ?>">
				</div>
				<div class="form-group">
					<label for="colHeader">Pravý sloupek</label>
					<textarea class="form-control tinymce" id="umeRightBox" name="umeRightBox" rows="8"><?php echo $ume_array['rightBox']; ?></textarea>
				</div>
					<div class="form-group">
					<label for="colFooter">Patička</label>
					<textarea class="form-control" id="umeFooter" name="umeFooter" rows="2"><?php echo $ume_array['footer']; ?></textarea>
				</div>
			</div>

			<div class="form-content"<?php if($set_array['theme'] == 'kouzelnickytabor') { echo ' style="display:block;"'; } ?>>
				<div class="form-heading"><p><strong>Vzhled:</strong> <span>Kouzelnický tábor</span></p></div>

				<div class="form-group">
					<label for="colHeadline">Nadpis [H1]</label>
					<input type="text" class="form-control" id="kouHeadline" name="kouHeadline" value="<?php echo $kou_array['headline']; ?>">
				</div>
				<div class="form-group">
					<label for="colHeadline">Nadpis [H2]</label>
					<input type="text" class="form-control" id="kouHeadline2" name="kouHeadline2" value="<?php echo $kou_array['headline2']; ?>">
				</div>
				<div class="form-group">
					<label for="colHeadline">Text v černé navigační liště</label>
					<input type="text" class="form-control" id="kouNavbar" name="kouNavbar" value="<?php echo $kou_array['navbar']; ?>">
				</div>
				<div class="form-group">
					<label for="colHeader">Text v headeru</label>
					<textarea class="form-control tinymce" id="kouHeader" name="kouHeader" rows="8"><?php echo $kou_array['header']; ?></textarea>
				</div>
					<div class="form-group">
					<label for="colFooter">Patička</label>
					<textarea class="form-control" id="kouFooter" name="kouFooter" rows="2"><?php echo $kou_array['footer']; ?></textarea>
				</div>
			</div>

			<div class="form-content"<?php if(substr($set_array['theme'], 0, 4) == 'flat') { echo ' style="display:block;"'; } ?>>
				<div class="form-heading"><p><strong>Vzhled:</strong> 
					<span>
						<?php
							if (substr($set_array['theme'], 5) == 'white') {
								echo 'Barva - bílá';
							} elseif (substr($set_array['theme'], 5) == 'grey') {
								echo 'Barva - šedá';
							} elseif (substr($set_array['theme'], 5) == 'blue') {
								echo 'Barva - modrá';
							} elseif (substr($set_array['theme'], 5) == 'green') {
								echo 'Barva - zelená';
							} elseif (substr($set_array['theme'], 5) == 'brown') {
								echo 'Barva - hnědá';
							} elseif (substr($set_array['theme'], 5) == 'black') {
								echo 'Barva - černá';
							} elseif (substr($set_array['theme'], 5) == 'wine') {
								echo 'Barva - vínová';
							}
						?>
					</span></p></div>

				<div class="form-group">
					<label for="colHeadline">Nadpis [H1]</label>
					<input type="text" class="form-control" id="flatHeadline" name="flatHeadline" value="<?php echo $flat_array['headline']; ?>">
				</div>
				<div class="form-group">
					<label for="colHeader">Text v headeru</label>
					<textarea class="form-control tinymce" id="flatHeader" name="flatHeader" rows="8"><?php echo $flat_array['header']; ?></textarea>
				</div>
					<div class="form-group">
					<label for="colFooter">Patička</label>
					<textarea class="form-control" id="flatFooter" name="flatFooter" rows="2"><?php echo $flat_array['footer']; ?></textarea>
				</div>
			</div>

			<div class="form-content"<?php if($set_array['theme'] != 'pavelkozisek' && $set_array['theme'] != 'divadlokouzel' && $set_array['theme'] != 'umeleckaagentura' && $set_array['theme'] != 'kouzelnickytabor' && substr($set_array['theme'], 0, 4) != 'flat') { $err = true; echo ' style="display:block;"'; } ?>>
				<div class="form-group">
					<div class="alert alert-danger">
						<strong>Chyba!</strong><br>Zkontrolujte, zda v nastavení máte vybranou šablonu stránek.
					</div>
				</div>
			</div>

		</div>

		<input type="submit" name="submitContent" class="btn btn-lg btn-primary" <?php if($err == true) { echo 'disabled="disabled"'; } ?> value="Uložit">
	</form>
</div>