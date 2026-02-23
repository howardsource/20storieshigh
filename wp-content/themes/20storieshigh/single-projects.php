<?php

get_header();

get_template_part('banner');
?>

<main id="main-content" class="site-main" role="main" tabindex="-1">
	<?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			get_template_part('title-banner');
			?>

			<div class="outer project-single white">
				<div class="inner">
					<div class="project-single-text">
						<?php if (get_field('main_content')) : ?>
							<div class="project-body">
								<?php the_field('main_content'); ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="project-single-details">
						<p class="project-single-dates">
							Show Dates:<br>
							February 2026
						</p>
					</div>
				</div>
			</div>
			<?php
		endwhile;
	endif;
	?>
<?php get_template_part('modules'); ?>
</main>
<?php
get_footer();
?>
