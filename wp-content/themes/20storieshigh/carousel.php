<section id="carousel">
	<div id="carousel-swiper" class="swiper">
		<div id="carousel-slides" class="swiper-wrapper">
			<?php 
			$panels = get_field('panels');
			if ($panels) :
				foreach ($panels as $slide) : 
					$image = $slide['image'] ?? null;
					$title = $slide['title'] ?? '';
					$overview = $slide['overview_text'] ?? '';
					$dates = $slide['dates'] ?? '';
					$link = $slide['link'] ?? null;
					$link_url = $link['url'] ?? '';
					$link_title = !empty($link['title']) ? $link['title'] : 'See More';

					$background_url = '';
					if (is_array($image)) {
						if (!empty($image['sizes']['carousel'])) {
							$background_url = $image['sizes']['carousel'];
						} elseif (!empty($image['url'])) {
							$background_url = $image['url'];
						}
					}
			?>
			<div class="swiper-slide outer">
				<?php if ($background_url) : ?>
					<div class="image" style="background-image: url(<?= esc_url($background_url); ?>)"></div>
				<?php endif; ?>
				<div class="carousel-slide-content">
					<?php if ($title) : ?>
						<h2><span><?= esc_html($title); ?></span></h2>
					<?php endif; ?>

					<?php if ($overview || $dates || $link_url) : ?>
						<div class="carousel-slide-panel">
							<?php if ($overview) : ?>
								<p class="overview"><?= esc_html($overview); ?></p>
							<?php endif; ?>

							<?php if ($dates || $link_url) : ?>
								<div class="carousel-slide-footer">
									<?php if ($dates) : ?>
										<p class="dates"><?= esc_html($dates); ?></p>
									<?php endif; ?>

									<?php if ($link_url) : ?>
										<p class="large-button-link">
											<a href="<?= esc_url($link_url); ?>">
												<?= esc_html($link_title); ?>
											</a>
										</p>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php 
				endforeach; 
			endif;
			?>
		</div>
	</div>
</section>
<script>
	var swiper = new Swiper('#carousel-swiper', {
		effect: 'fade',
		  fadeEffect: { crossFade: true },
		  speed: 1200,
		autoplay: {
			delay: 5000,
		},
	});
</script>
