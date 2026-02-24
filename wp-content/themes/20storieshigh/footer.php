<div
	id="mobile-menu-modal"
	class="mobile-menu-modal"
	role="dialog"
	aria-modal="true"
	aria-labelledby="mobile-menu-title"
	hidden
>
	<div class="mobile-menu-inner">
		<button type="button" class="mobile-menu-close" data-mobile-menu-close="true" aria-label="Close menu">
			<span>Close</span>
		</button>
		<h2 id="mobile-menu-title" class="screen-reader-text">Site navigation</h2>
		<nav class="mobile-menu-nav" aria-label="Mobile Navigation">
			<div class="mobile-menu-columns">
				<?php foreach(get_field('footer_menu_columns', 'options') as $item) : ?>
					<div class="footer-menu-column">
						<h3><a href="<?= $item['column_title_link']; ?>"><?= $item['column_title']; ?></a></h3>
						<?php if($item['submenu']) : ?>
							<ul>
								<?php foreach($item['submenu'] as $link) : ?>
									<li><a href="<?= $link['link']; ?>"><?= $link['title']; ?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</nav>
	</div>
</div>

<footer id="footer" class="outer black">
	<div id="footer-navigation" class="inner">
		<div class="footer-logo">
			<img src="<?php echo get_template_directory_uri(); ?>/images/site-logo-white.png" alt="20 Stories High" width="113" height="100" />
		</div>
		<div id="footer-menu">
			<?php foreach(get_field('footer_menu_columns', 'options') as $item) : ?>
				<div class="footer-menu-column">
					<h3><a href="<?= $item['column_title_link']; ?>"><?= $item['column_title']; ?></a></h3>
					<?php if($item['submenu']) : ?>
						<ul>
							<?php foreach($item['submenu'] as $link) : ?>
								<li><a href="<?= $link['link']; ?>"><?= $link['title']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
		<div id="footer-socials">
			<ul>
				<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/social-instagram.svg" alt="Instagram" width="36" height="24" /></a></li>	
				<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/social-facebook.svg" alt="Facebook" width="33" height="33" /></a></li>
				<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/social-youtube.svg" alt="YouTube" width="36" height="36" /></a></li>
				<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/social-bluesky.svg" alt="Bluesky" width="36" height="28" /></a></li>	
				<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/social-pinterest.svg" alt="Pinterest" width="36" height="36" /></a></li>
				<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/social-spotify.svg" alt="Spotify" width="36" height="36" /></a></li>				
				
			</ul>
		</div>
	</div>
	<div class="footer-partners inner">
		<h3>Partners</h3>
		<p class="small">[logos to go here]</p>
	</div>
	<div class="footer-legal inner">
		<p><a href="#">Privacy Policy</a> / <a href="#">Terms & Conditions</a> / <a href="#">Accessibility</a></p>
	</div>
</footer>

<button
	id="accessibility-toggle"
	class="accessibility-button"
	type="button"
	aria-haspopup="dialog"
	aria-controls="accessibility-modal"
	aria-expanded="false"
	aria-label="Accessibility settings"
	aria-label="Accessibility settings"
>
	<span class="accessibility-button__icon" aria-hidden="true">
		<svg class="accessibility-button__icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" role="img" aria-hidden="true" focusable="false">
			<defs>
				<style>
					.st0 { fill: #fff; }
				</style>
			</defs>
			<path class="st0" d="M30,19.6c-2.2,0-4-1.8-4-4s1.8-4,4-4,4,1.8,4,4c0,2.2-1.8,4-4,4Z"/>
			<path class="st0" d="M42.7,19.7h0s0,0,0,0c0,0-.1,0-.2,0-1.3.4-7.9,2.2-12.4,2.2s-10.2-1.6-12.1-2.1c-.2,0-.4-.1-.6-.2-1.4-.4-2.3,1-2.3,2.3s1.1,1.9,2.3,2.3h0s6.9,2.2,6.9,2.2c.7.3.9.5,1,.8.3.8,0,2.3,0,2.8l-.4,3.2-2.3,12.7s0,0,0,.1h0c-.2,1.3.7,2.4,2.3,2.4s2-1,2.3-2.3h0s2-11.4,3-11.4,3.1,11.4,3.1,11.4h0c.3,1.3.9,2.3,2.3,2.3s2.5-1.1,2.3-2.3c0,0,0-.2,0-.3l-2.4-12.6-.4-3.2c-.3-1.9,0-2.5,0-2.7,0,0,0,0,0,0,0-.1.4-.5,1.3-.8l6.4-2.3s0,0,.1,0c1.2-.4,2.3-1,2.3-2.3s-.9-2.7-2.3-2.3Z"/>
		</svg>
	</span>
</button>

<div
	id="accessibility-modal"
	class="accessibility-modal"
	role="dialog"
	aria-modal="true"
	aria-labelledby="accessibility-modal-title"
	hidden
>
	<div class="accessibility-modal__dialog">
		<button type="button" class="accessibility-modal__close" data-accessibility-close="true">
			Close
		</button>
		<h2 id="accessibility-modal-title">Accessibility settings</h2>

		<div class="accessibility-modal__section">
			<h3>Text size</h3>
			<div class="accessibility-modal__options">
				<label>
					<input type="radio" name="accessibility-font-size" value="default">
					Default
				</label>
				<label>
					<input type="radio" name="accessibility-font-size" value="large">
					Large
				</label>
				<label>
					<input type="radio" name="accessibility-font-size" value="xlarge">
					Extra large
				</label>
			</div>
		</div>

		<div class="accessibility-modal__section">
			<h3>Contrast</h3>
			<div class="accessibility-modal__options">
				<label>
					<input type="radio" name="accessibility-contrast" value="default">
					Default
				</label>
				<label>
					<input type="radio" name="accessibility-contrast" value="high">
					High contrast
				</label>
			</div>
		</div>
	</div>
</div>

<script>

document.addEventListener('DOMContentLoaded', () => {
  const o = new IntersectionObserver(es =>
    es.forEach(e => e.target.classList.toggle('in-view', e.isIntersecting)),
    { rootMargin: '0px 0px -25% 0px' }
  );
  document.querySelectorAll('.reveal').forEach(el => o.observe(el));
});

(function () {
	var toggle = document.getElementById('accessibility-toggle');
	var modal = document.getElementById('accessibility-modal');
	if (!toggle || !modal) return;

	var closeButton = modal.querySelector('[data-accessibility-close]');
	var fontInputs = modal.querySelectorAll('input[name="accessibility-font-size"]');
	var contrastInputs = modal.querySelectorAll('input[name="accessibility-contrast"]');
	var previousFocus = null;

	function openModal() {
		previousFocus = document.activeElement;
		modal.removeAttribute('hidden');
		toggle.setAttribute('aria-expanded', 'true');
		var firstFocusable = modal.querySelector('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
		if (firstFocusable && firstFocusable.focus) {
			firstFocusable.focus();
		}
	}

	function closeModal() {
		modal.setAttribute('hidden', 'true');
		toggle.setAttribute('aria-expanded', 'false');
		if (previousFocus && previousFocus.focus) {
			previousFocus.focus();
		}
	}

	toggle.addEventListener('click', function () {
		if (modal.hasAttribute('hidden')) {
			openModal();
		} else {
			closeModal();
		}
	});

	if (closeButton) {
		closeButton.addEventListener('click', function () {
			closeModal();
		});
	}

	modal.addEventListener('click', function (event) {
		if (event.target === modal) {
			closeModal();
		}
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && !modal.hasAttribute('hidden')) {
			closeModal();
		}
	});

	function applyFontSize(value) {
		var root = document.documentElement;
		root.classList.remove('font-size-large', 'font-size-xlarge');
		if (value === 'large') {
			root.classList.add('font-size-large');
		}
		if (value === 'xlarge') {
			root.classList.add('font-size-xlarge');
		}
		try {
			localStorage.setItem('accessibility_font_size', value);
		} catch (e) {}
	}

	function applyContrast(value) {
		var body = document.body;
		body.classList.remove('high-contrast');
		if (value === 'high') {
			body.classList.add('high-contrast');
		}
		try {
			localStorage.setItem('accessibility_contrast', value);
		} catch (e) {}
	}

	fontInputs.forEach(function (input) {
		input.addEventListener('change', function () {
			applyFontSize(this.value);
		});
	});

	contrastInputs.forEach(function (input) {
		input.addEventListener('change', function () {
			applyContrast(this.value);
		});
	});

	var savedFont = null;
	var savedContrast = null;
	try {
		savedFont = localStorage.getItem('accessibility_font_size');
		savedContrast = localStorage.getItem('accessibility_contrast');
	} catch (e) {}

	if (savedFont) {
		applyFontSize(savedFont);
		var savedFontInput = modal.querySelector('input[name="accessibility-font-size"][value="' + savedFont + '"]');
		if (savedFontInput) {
			savedFontInput.checked = true;
		}
	} else {
		var defaultFontInput = modal.querySelector('input[name="accessibility-font-size"][value="default"]');
		if (defaultFontInput) {
			defaultFontInput.checked = true;
		}
	}

	if (savedContrast) {
		applyContrast(savedContrast);
		var savedContrastInput = modal.querySelector('input[name="accessibility-contrast"][value="' + savedContrast + '"]');
		if (savedContrastInput) {
			savedContrastInput.checked = true;
		}
	} else {
		var defaultContrastInput = modal.querySelector('input[name="accessibility-contrast"][value="default"]');
		if (defaultContrastInput) {
			defaultContrastInput.checked = true;
		}
	}

	modal.addEventListener('keydown', function (event) {
		if (event.key !== 'Tab') {
			return;
		}
		var focusable = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
		var focusableArray = Array.prototype.slice.call(focusable).filter(function (element) {
			return !element.hasAttribute('disabled');
		});
		if (!focusableArray.length) {
			return;
		}
		var first = focusableArray[0];
		var last = focusableArray[focusableArray.length - 1];
		if (event.shiftKey) {
			if (document.activeElement === first) {
				last.focus();
				event.preventDefault();
			}
		} else {
			if (document.activeElement === last) {
				first.focus();
				event.preventDefault();
			}
		}
	});
})();
</script>

<script>
(function () {
	var members = document.querySelectorAll('#main-content .module.team .team-member');
	var accordions = document.querySelectorAll('#main-content .module.accordion .accordion-section');
	var burger = document.querySelector('.burger-menu');
	var mobileMenu = document.getElementById('mobile-menu-modal');
	var mobileMenuClose = mobileMenu ? mobileMenu.querySelector('[data-mobile-menu-close]') : null;
	var previousFocus = null;

	function setupToggle(elements, openClass) {
		elements.forEach(function (element) {
			element.setAttribute('tabindex', '0');

			function toggle() {
				element.classList.toggle(openClass);
			}

			element.addEventListener('click', function (event) {
				if (event.target.closest('a')) return;
				toggle();
			});

			element.addEventListener('keydown', function (event) {
				if (event.key === 'Enter' || event.key === ' ') {
					event.preventDefault();
					toggle();
				}
			});
		});
	}

	if (members.length) {
		setupToggle(members, 'is-open');
	}

	if (accordions.length) {
		setupToggle(accordions, 'is-open');
	}

	function openMobileMenu() {
		if (!mobileMenu) return;
		previousFocus = document.activeElement;
		mobileMenu.removeAttribute('hidden');
		mobileMenu.classList.add('is-open');
		if (burger) {
			burger.setAttribute('aria-expanded', 'true');
		}
		var firstFocusable = mobileMenu.querySelector('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
		if (firstFocusable && firstFocusable.focus) {
			firstFocusable.focus();
		}
	}

	function closeMobileMenu() {
		if (!mobileMenu) return;
		mobileMenu.classList.remove('is-open');
		mobileMenu.setAttribute('hidden', 'true');
		if (burger) {
			burger.setAttribute('aria-expanded', 'false');
		}
		if (previousFocus && previousFocus.focus) {
			previousFocus.focus();
		}
	}

	if (burger && mobileMenu) {
		burger.addEventListener('click', function () {
			if (mobileMenu.classList.contains('is-open')) {
				closeMobileMenu();
			} else {
				openMobileMenu();
			}
		});
	}

	if (mobileMenu && mobileMenuClose) {
		mobileMenuClose.addEventListener('click', function () {
			closeMobileMenu();
		});

		mobileMenu.addEventListener('click', function (event) {
			if (event.target === mobileMenu) {
				closeMobileMenu();
			}
		});
	}

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('is-open')) {
			closeMobileMenu();
		}
	});
})();
</script>
