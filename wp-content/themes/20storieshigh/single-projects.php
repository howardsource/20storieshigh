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
						<?php $main_content = get_field('main_content'); ?>
						<?php if ($main_content) : ?>
							<div class="project-body">
								<?= apply_filters('the_content', $main_content); ?>
							</div>
						<?php endif; ?>
					</div>
					<?php $performance_details = get_field('performance_dates'); ?>
					<?php if ($performance_details) : ?>
					<div class="project-single-details">
						<p class="project-single-dates">
							<?php
							$performance_details_title = get_field('performance_details_title');
							echo $performance_details_title ? $performance_details_title : 'Show Dates';
							?>:<br>
							<?= $performance_details; ?>
						</p>
					</div>
					<?php endif; ?>
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
