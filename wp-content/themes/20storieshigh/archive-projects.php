<?php
get_header();
?>

<?php get_template_part('banner'); ?>

<main id="main-content" class="site-main" role="main" aria-labelledby="projects-archive-title" tabindex="-1">

<div id="title-banner" class="outer no-image">
	<div class="inner">
		<h2 id="projects-archive-title"><span><?php post_type_archive_title(); ?></span></h2>
	</div>
</div>

<?php if (function_exists('yoast_breadcrumb')) : ?>
<div id="breadcrumb-bar" class="outer navy">
	<div class="inner breadcrumbs">
		<?php yoast_breadcrumb(); ?>
	</div>
</div>
<?php endif; ?>

<?php
$current_show_post = null;
$current_show_id   = 0;

if (!is_paged() && have_posts()) {
	global $wp_query;

	if (!empty($wp_query->posts[0]) && $wp_query->posts[0] instanceof WP_Post) {
		$current_show_post = $wp_query->posts[0];
		$current_show_id   = $current_show_post->ID;
	}
}
?>

<?php if ($current_show_post) : ?>
<div class="outer current-show green">
	<div class="inner">
		<?php setup_postdata($current_show_post); ?>
		<div class="current-show-panel">
			<div class="project-text current-show-text">
				<p class="current-show-label">
					<span>Current</span>
					<span>Show</span>
				</p>
				<h3><?php the_title(); ?></h3>
				<?php if (get_field('excerpt', $current_show_id)) : ?>
					<div class="project-excerpt">
						<?php the_field('excerpt', $current_show_id); ?>
					</div>
				<?php endif; ?>
				<?php if (get_field('performance_dates', $current_show_id)) : ?>
					<div class="project-date">
						<?php the_field('performance_dates', $current_show_id); ?>
					</div>
				<?php endif; ?>
				<p class="large-button-link">
					<a href="<?php the_permalink(); ?>">View Show</a>
				</p>
			</div>
			<div class="project-image current-show-image">
				<a href="<?php the_permalink(); ?>">
					<?php if (has_post_thumbnail($current_show_id)) : ?>
						<?php echo get_the_post_thumbnail($current_show_id, 'half-width'); ?>
					<?php endif; ?>
				</a>
			</div>
		</div>
		<?php wp_reset_postdata(); ?>
	</div>
</div>
<?php endif; ?>

<div class="outer archive archive-projects purple">
	<div class="archive-heading-outer">
		<h3 class="archive-heading">Past Shows</h3>
	</div>
	<div class="inner">
		<?php if (have_posts()) : ?>
			<div class="projects-list">
				<?php while (have_posts()) : the_post(); ?>
					<?php
					if (!is_paged() && $current_show_id && get_the_ID() === $current_show_id) {
						continue;
					}
					?>
					<article <?php post_class('project-item'); ?>>
						<a href="<?php the_permalink(); ?>" class="project-link">
						<?php if(get_field('show_status')=='current')	: ?>
						<div class="project-status">Current Show</div>
						<?php else : ?>
						<div class="project-status">Past Show</div>
						<?php endif; ?>
						<div class="project-image">
								<?php if (has_post_thumbnail()) : ?>
									<?php the_post_thumbnail('half-width'); ?>
								<?php endif; ?>
							</div>
							<div class="project-text">
								<h3><?php the_title(); ?></h3>
								<?php if (get_field('excerpt')) : ?>
									<div class="project-excerpt">
										<?php the_field('excerpt'); ?>
									</div>
								<?php endif; ?>
								<?php if (get_field('performance_dates')) : ?>
									<div class="project-date">
										<?php the_field('performance_dates'); ?>
									</div>
								<?php endif; ?>
								<p class="archive-more-link">
									<span>MORE</span>
								</p>
							</div>
						</a>
					</article>
				<?php endwhile; ?>
			</div>

			<div class="pagination">
				<?php
				the_posts_pagination(
					[
						'mid_size'           => 2,
						'prev_text'          => __('Previous', '20storieshigh'),
						'next_text'          => __('Next', '20storieshigh'),
						'screen_reader_text' => __('Projects navigation', '20storieshigh'),
					]
				);
				?>
			</div>
		<?php else : ?>
			<p><?php _e('No projects found.', '20storieshigh'); ?></p>
		<?php endif; ?>
	</div>
</div>
<div id="modules">
	<?php 
	$modules = get_field('modules', 'option');
	$modN = 1;
	$carouselN = 1;
	if($modules!=false) :
	foreach($modules as $module):
		include(locate_template('modules/'.$module['acf_fc_layout'].'.php')); 
		$modN++;
		if($module['acf_fc_layout']=='carousel' || $module['acf_fc_layout']=='panel_slider'|| $module['acf_fc_layout']=='latest_news') :
			$carouselN++;
		endif;
	endforeach; 
	endif;
	?>
</div>
</main>

<?php
get_footer();
?>
