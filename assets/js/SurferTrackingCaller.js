!function(){function t(t){r={},t?r.dataLayer=t:r.dataLayer=this.parseDataLayer(),r.status=r.dataLayer.page?r.dataLayer.page.status:null,r.event=r.dataLayer.page?r.dataLayer.page.event:null,r.id=r.dataLayer.page?r.dataLayer.page.id:null,r.protokoll="https:",r.url="/wtr/surfertracking",r.active=r.dataLayer.steuerung&&r.dataLayer.steuerung.surferTrack}function e(t,e,r){for(var a=e.split(" "),n=0,o=a.length;o>n;n++)t.addEventListener(a[n],r,!1)}var r,a="data-dataLayer";t.prototype.getLocationHostRegEx=function(){return"^((www|kunde)).*.comdirect?.de"},t.prototype.getComdirectHost=function(t){var e=document.querySelector("meta[name=stage]"),r=e?e.getAttribute("content"):"";return null===t.match(this.getLocationHostRegEx())?"www"+r+".comdirect.de":t},t.prototype.parseDataLayer=function(){var t={},e=document.querySelector("["+a+"]");if(e){var r=decodeURIComponent(e.getAttribute(a));r&&(t=JSON.parse(r))}return t},t.prototype.getParameter=function(t){for(var e=void 0,r=[],a=location.search.substr(1).split("&"),n=0;n<a.length;n++)if(a[n]){var r=a[n].split("=");r[0]===t&&(e=decodeURIComponent(r[1]))}return e},t.prototype.getIFrameUrl=function(){return r.protokoll+"//"+this.getComdirectHost(location.hostname)+r.url},t.prototype.appendIFrame=function(t){if(this.consentManagementEnabled){var e=document.createElement("iframe");e.setAttribute("src",this.getIFrameUrl()+"?"+t),e.setAttribute("width","1"),e.setAttribute("height","1"),e.setAttribute("sandbox","allow-scripts allow-same-origin"),e.setAttribute("style","position: absolute;left: -9999px;top: -9999px"),document.body.appendChild(e)}},t.prototype.executeOn=function(){return!/((kunde|nutzer)\.(.*\.)?comdirect\.de\/)/gi.test(location.href)||/(kunde\.(.*\.)?comdirect\.de\/lp\/wt\/)/gi.test(location.href)},t.prototype.objectToQueryString=function(t){return Object.keys(t).filter(function(e){return t.hasOwnProperty(e)}).filter(function(e){return""!==t[e]}).map(function(e){return e+"="+("object"==typeof t[e]?encodeURIComponent(JSON.stringify(t[e])):encodeURIComponent(t[e]))}).join("&")},t.prototype.getQueryParam=function(t){var e={};t.page.id&&(e.pageId=t.page.id),t.page.cDes&&(e.cDes=t.page.cDes),t.page.kwhk&&(e.kwhk=t.page.kwhk);var r=location.href,a=r.indexOf("?"),n=this.getParameter("gclid"),o=this.getParameter("ci");a>-1&&(r=r.substr(0,a)),void 0!==n&&(r+="?gclid="+n),void 0!==o&&(r+=r.indexOf("?")>-1?"&ci="+o:"?"+o),e.url=r,t.page.pI&&(e.pi=t.page.pI),t.page.tI&&(e.ti=t.page.tI),t.surfertracking&&""!==t.surfertracking.sv1&&(e.kwz=t.surfertracking.sv1);var i=this.getParameter("wref");return i&&(e.wref=i),e},t.prototype.consentManagementEnabled=function(t){return"undefined"!=typeof window.cmp&&("undefined"!=typeof t||window.cmp.consentGiven())},t.prototype.getConsentParams=function(){var t="undefined"!=typeof window.cmp&&window.cmp.consentGiven();return[t?"1":"0",t?"1":"0"]},t.prototype.doSurferTrackingAuto=function(){r.dataLayer.steuerung&&!r.dataLayer.steuerung.disableAutoSurferTrack&&this.doSurferTracking()},t.prototype.doSurferTracking=function(t){var a=this.executeOn();if(r.active&&a&&r.status&&void 0!==r.status&&this.consentManagementEnabled(t)){var n=this,o=document.querySelectorAll('a[data-plugin*="SurferTracking"],a[data-plugin*="surfertracking"]')||"",i=this.getQueryParam(r.dataLayer);i.cmp="undefined"!=typeof t?t:this.getConsentParams();var c=this.objectToQueryString(i);if(0!==o.length)for(var s=0;s<o.length;s++)e(o[s],"click touchstart",function(t){n.appendIFrame(c)});(""===r.event||void 0===r.event)&&this.appendIFrame(c)}},window.cdb=window.cdb||{},window.cdb.tracking=window.cdb.tracking||{},window.cdb.tracking.SurferTrackingCaller=t;var n=new t;n.doSurferTrackingAuto(),window.addEventListener("onConsentStatusChange",function(t){if(t&&t.data&&t.data.event&&"category_status_changed"===t.data.event&&t.data.status===!1){var e=(t.data.category.toLowerCase(),t.data.slug.toLowerCase());constentsExplizit(!1,!1)&&isCategoryChanged(usercentrics.cd_category.personalisierung.slug)&&e===usercentrics.cd_category.personalisierung.slug.toLowerCase()&&n.doSurferTracking(["0","2"])}if(t&&t.data&&t.data.event&&"category_status_changed"===t.data.event&&t.data.status===!0){var e=(t.data.category.toLowerCase(),t.data.slug.toLowerCase());constentsExplizit(!0,!0)&&e===usercentrics.cd_category.personalisierung.slug.toLowerCase()&&n.doSurferTracking()}})}();