<section id="carousel">
	<div id="carousel-swiper" class="swiper">
		<div id="carousel-slides" class="swiper-wrapper">
			<?php $n=1; foreach(get_field('panels') as $slide ) : ?>
			<div class="swiper-slide outer">
				<div class="image" style="background-image: url(<?= $slide['image']['sizes']['carousel']; ?>);"></div>
			</div>				
			<?php $n++; endforeach; ?>
		</div>
	</div>
	<div id="carousel-message">We shape stories, shift perceptions and build trusted reputations.</div>
	<?php /* <div class="circle-wrapper">
		<svg class="semi-circle" viewBox="0 0 96 48" xmlns="http://www.w3.org/2000/svg">
		  <path d="M0,48 A48,48 0 0,1 96,48 L96,48 L0,48 Z"/>
		</svg>
		<div class="circle-text">
			<h2>Informing the public conversation</h2>
			<p>We’re an award-winning strategic communications agency, working in the sweet spot where regeneration, arts & culture and civic transformation meet. We give clarity and purpose to your communications, informing the public conversation and making a meaningful difference.
</p>
<p><a class="link-button" href="<?= site_url('about'); ?>">What we're all about</a></p>
		</div>
	  </div> */ ?>
	  
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