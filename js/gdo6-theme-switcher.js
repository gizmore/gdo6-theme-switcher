"use strict";
/**
 * Onchange the switcher calls the switch method and redirect back.
 * @returns
 */
var nodes = document.querySelectorAll('.gdo-theme-switcher select');
var len = nodes.length;
for (var i = 0; i < len; i++) {
	nodes[i].addEventListener('change', function(e){
		var url = GDO_WEB_ROOT + 'index.php?mo=ThemeSwitcher&me=Set&theme=' + this.value + "&ref=" + encodeURIComponent(window.location.href);
		window.location.href = url;
	}); 
}
