<?php $signup_text = get_field('signup_text'); ?>

<section class="module newsletter call-to-action image-text">
	<div class="inner">
		<div class="image">
			<video autoplay muted loop playsinline preload="auto">
				<source src="<?= esc_url(get_template_directory_uri() . '/images/2TS-Email-Newsletter-Animation.mp4'); ?>" type="video/mp4">
				Your browser does not support the video tag.
			</video>
		</div>
		<div class="text">
			<?php if ($signup_text) : ?>
				<?= $signup_text; ?>
			<?php else : ?>
				<h3>Be Part Of The Story</h3>
				<p>Sign up to hear about new shows, creative projects, workshops, opportunities, events and all the good stuff happening across the 20 Stories High community.</p>
				<p>Whether you&rsquo;ve seen a show, joined a project, worked with us, or you&rsquo;re just curious.</p>
			<?php endif; ?>
			<form class="newsletter-form">
				<label class="screen-reader-text" for="newsletter-email">Email address</label>
				<input id="newsletter-email" type="email" name="email" placeholder="Email address" required>
				<button type="submit">Sign Up</button>
			</form>
		</div>	
	</div>
</section>
