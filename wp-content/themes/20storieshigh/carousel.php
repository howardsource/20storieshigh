<section id="carousel">
	<div id="carousel-swiper" class="swiper">
		<div id="carousel-slides" class="swiper-wrapper">
			<?php 
			$panels = get_field('panels');
			if($panels):
				$n=1; foreach($panels as $slide ) : ?>
			<div class="swiper-slide outer" role="img" aria-label="<?= esc_attr($slide['image']['alt']); ?>">
				<div class="image" style="background-image: url(<?= $slide['image']['sizes']['carousel']; ?>);"></div>
			</div>				
			<?php $n++; endforeach; 
			endif; ?>
		</div>
	</div>
	<div id="carousel-message">We shape stories, shift perceptions and build trusted reputations.</div>
</section>
<script>
	var swiper = new Swiper('#carousel-swiper', {
		effect: 'fade',
		  fadeEffect: { crossFade: true },
		  speed: 1200,
		autoplay: {
			delay: 5000,
		}
	});
</script>
<div id="carousel-spacer"></div>
<div id="mobile-intro" class="outer pink reveal permanent">
	<div class="inner">
		<div class="text"><h2>Informing the public conversation</h2>
				<p>We’re an award-winning strategic communications agency, working in the sweet spot where regeneration, arts & culture and civic transformation meet. We give clarity and purpose to your communications, informing the public conversation and making a meaningful difference.
	</p>
	<p><a class="link-button" href="<?= site_url('about'); ?>">What we're all about</a></p></div>
</div>
</div>