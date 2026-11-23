/**
 * NYDLA WordPress — chrome + home carousel.
 */
(function () {
	'use strict';

	/* Mobile nav */
	var toggle = document.querySelector('[data-nydla-nav-toggle]');
	var nav = document.querySelector('[data-nydla-nav]');

	if (toggle && nav) {
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
	}

	/* Home hero carousel */
	var root = document.querySelector('[data-nydla-carousel]');
	if (!root) {
		return;
	}

	var track = root.querySelector('[data-nydla-carousel-track]');
	var slides = root.querySelectorAll('[data-nydla-carousel-slide]');
	var dotsWrap = root.querySelector('[data-nydla-carousel-dots]');
	var prevBtn = root.querySelector('[data-nydla-carousel-prev]');
	var nextBtn = root.querySelector('[data-nydla-carousel-next]');
	var total = slides.length;
	var index = 0;
	var timer = null;
	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (!track || total < 2) {
		return;
	}

	function goTo(i) {
		index = (i + total) % total;
		track.style.transform = 'translateX(' + index * -100 + '%)';
		if (dotsWrap) {
			dotsWrap.querySelectorAll('[data-nydla-carousel-dot]').forEach(function (dot, di) {
				dot.classList.toggle('is-active', di === index);
				dot.setAttribute('aria-selected', di === index ? 'true' : 'false');
			});
		}
		slides.forEach(function (slide, si) {
			slide.setAttribute('aria-hidden', si === index ? 'false' : 'true');
		});
	}

	function next() {
		goTo(index + 1);
	}

	function prev() {
		goTo(index - 1);
	}

	function start() {
		if (reduceMotion) {
			return;
		}
		stop();
		timer = window.setInterval(next, 6500);
	}

	function stop() {
		if (timer) {
			window.clearInterval(timer);
			timer = null;
		}
	}

	if (dotsWrap) {
		for (var d = 0; d < total; d++) {
			var btn = document.createElement('button');
			btn.type = 'button';
			btn.className = 'nydla-carousel__dot' + (d === 0 ? ' is-active' : '');
			btn.setAttribute('data-nydla-carousel-dot', '');
			btn.setAttribute('aria-label', 'Go to slide ' + (d + 1));
			btn.setAttribute('aria-selected', d === 0 ? 'true' : 'false');
			(function (di) {
				btn.addEventListener('click', function () {
					goTo(di);
					start();
				});
			})(d);
			dotsWrap.appendChild(btn);
		}
	}

	if (prevBtn) {
		prevBtn.addEventListener('click', function () {
			prev();
			start();
		});
	}
	if (nextBtn) {
		nextBtn.addEventListener('click', function () {
			next();
			start();
		});
	}

	root.addEventListener('mouseenter', stop);
	root.addEventListener('mouseleave', start);
	root.addEventListener('focusin', stop);
	root.addEventListener('focusout', start);

	goTo(0);
	start();
})();
