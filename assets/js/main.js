/**
 * NYDLA WordPress — minimal chrome interactions.
 */
(function () {
	'use strict';

	var toggle = document.querySelector('[data-nydla-nav-toggle]');
	var nav = document.querySelector('[data-nydla-nav]');

	if (!toggle || !nav) {
		return;
	}

	function setOpen(open) {
		toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		nav.classList.toggle('is-open', open);
	}

	toggle.addEventListener('click', function () {
		setOpen(toggle.getAttribute('aria-expanded') !== 'true');
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape') {
			setOpen(false);
		}
	});

	nav.addEventListener('click', function (event) {
		if (event.target.closest('a') && window.matchMedia('(max-width: 860px)').matches) {
			setOpen(false);
		}
	});
})();
