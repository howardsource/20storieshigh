<?php $donate_url = site_url('donate'); ?>

<div
	id="donate-modal"
	class="donate-modal"
	role="dialog"
	aria-modal="true"
	aria-labelledby="donate-modal-title"
	hidden
>
	<div class="donate-modal-panel">
		<button type="button" class="donate-modal-close" data-donate-modal-close="true" aria-label="Close donate window">
			<span>Close</span>
		</button>
		<div class="donate-modal-content">
			<p class="donate-modal-eyebrow">Support 20 Stories High</p>
			<h2 id="donate-modal-title">Donate</h2>
			<?= get_field('donate_text', 'options'); ?>
		</div>
	</div>
</div>

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
		<?php $partner_logos = get_field('partner_logos', 'options'); ?>
		<?php if (!empty($partner_logos)) : ?>
			<ul class="partner-logos">
				<?php foreach ($partner_logos as $partner) : ?>
					<?php if (empty($partner['logo'])) continue; ?>
					<li class="partner-logo">
						<?php if (!empty($partner['link']['url'])) : ?>
							<a href="<?= esc_url($partner['link']['url']); ?>" target="<?= !empty($partner['link']['target']) ? esc_attr($partner['link']['target']) : '_self'; ?>" rel="noopener">
								<img src="<?= esc_url($partner['logo']['url']); ?>" alt="<?= esc_attr(!empty($partner['link']['title']) ? $partner['link']['title'] : $partner['logo']['alt']); ?>" width="<?= esc_attr($partner['logo']['width']); ?>" height="<?= esc_attr($partner['logo']['height']); ?>" loading="lazy" />
							</a>
						<?php else : ?>
							<img src="<?= esc_url($partner['logo']['url']); ?>" alt="<?= esc_attr($partner['logo']['alt']); ?>" width="<?= esc_attr($partner['logo']['width']); ?>" height="<?= esc_attr($partner['logo']['height']); ?>" loading="lazy" />
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
	<div class="footer-legal inner">
		<p><a href="#">Privacy Policy</a> / <a href="#">Terms & Conditions</a> / <a href="#">Accessibility</a></p>
	</div>
</footer>
<?php wp_footer(); ?>
<script>

document.addEventListener('DOMContentLoaded', () => {
  const o = new IntersectionObserver(es =>
    es.forEach(e => e.target.classList.toggle('in-view', e.isIntersecting)),
    { rootMargin: '0px 0px -25% 0px' }
  );
  document.querySelectorAll('.reveal').forEach(el => o.observe(el));
});
</script>

<script>
(function () {
	var members = document.querySelectorAll('#main-content .module.team .team-member');
	var accordions = document.querySelectorAll('#main-content .module.accordion .accordion-section');
	var burger = document.querySelector('.burger-menu');
	var donateTrigger = document.querySelector('[data-donate-modal-trigger]');
	var donateModal = document.getElementById('donate-modal');
	var donateModalClose = donateModal ? donateModal.querySelector('[data-donate-modal-close]') : null;
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

	function openDonateModal() {
		if (!donateModal) return;
		previousFocus = document.activeElement;
		donateModal.removeAttribute('hidden');
		donateModal.classList.add('is-open');
		if (donateTrigger) {
			donateTrigger.setAttribute('aria-expanded', 'true');
		}
		var firstFocusable = donateModal.querySelector('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
		if (firstFocusable && firstFocusable.focus) {
			firstFocusable.focus();
		}
	}

	function closeDonateModal() {
		if (!donateModal) return;
		donateModal.classList.remove('is-open');
		donateModal.setAttribute('hidden', 'true');
		if (donateTrigger) {
			donateTrigger.setAttribute('aria-expanded', 'false');
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

	if (donateTrigger && donateModal) {
		donateTrigger.addEventListener('click', function () {
			if (donateModal.classList.contains('is-open')) {
				closeDonateModal();
			} else {
				openDonateModal();
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

	if (donateModal && donateModalClose) {
		donateModalClose.addEventListener('click', function () {
			closeDonateModal();
		});

		donateModal.addEventListener('click', function (event) {
			if (event.target === donateModal) {
				closeDonateModal();
			}
		});
	}

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('is-open')) {
			closeMobileMenu();
		}
		if (event.key === 'Escape' && donateModal && donateModal.classList.contains('is-open')) {
			closeDonateModal();
		}
	});
})();
</script>
</body>
</html>
