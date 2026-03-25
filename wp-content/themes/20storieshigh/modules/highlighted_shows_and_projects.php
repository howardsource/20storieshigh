<section class="module latest-projects outer">
	<div class="latest-projects-header">
		<h2><?=  $module['title']; ?></h2>
		<p class="large-button-link all-shows-link">
			<a href="<?php echo get_post_type_archive_link( 'projects' ); ?>">All Projects</a>
			<a href="<?php echo get_post_type_archive_link( 'show' ); ?>">All Shows</a>
		</p>
	</div>
	<?php
	$highlighted_posts_field = $module['highlighted_posts'] ?? [];
	$highlighted_posts = [];

	if (is_array($highlighted_posts_field) && !empty($highlighted_posts_field)) {
		$first_item = $highlighted_posts_field[0] ?? null;

		if ($first_item instanceof WP_Post) {
			$highlighted_posts = $highlighted_posts_field;
		} else {
			$highlighted_post_ids = array_values(
				array_filter(
					array_map(
						static fn($item) => is_numeric($item) ? (int) $item : 0,
						$highlighted_posts_field
					)
				)
			);

			if (!empty($highlighted_post_ids)) {
				$highlighted_posts = get_posts(
					[
						'post_type'   => ['projects', 'show'],
						'post_status' => 'publish',
						'orderby'     => 'post__in',
						'post__in'    => $highlighted_post_ids,
						'numberposts' => count($highlighted_post_ids),
					]
				);
			}
		}
	}

	if ( !empty($highlighted_posts) ) :
		?>
		<div class="projects-list latest-projects-list">
			<?php
			foreach ($highlighted_posts as $post) :
				setup_postdata($post);
				$post_type = get_post_type();
				$is_show = $post_type === 'show';
				$status = $is_show ? get_field('show_status') : (get_field('project_status') ?: get_field('show_status'));
				$is_current = $status === 'current';
				$status_label = $is_show ? ($is_current ? 'Current Show' : 'Past Show') : ($is_current ? 'Current Project' : 'Past Project');
				$status_class = $is_show ? ($is_current ? 'current-show' : 'past-show') : ($is_current ? 'current-project' : 'past-project');
				?>
				<article <?php post_class( 'project-item ' ); ?>>
					<a href="<?php the_permalink(); ?>" class="project-link">
						<div class="project-status <?= esc_attr($status_class); ?>"><?= esc_html($status_label); ?></div>
						<div class="project-image">
							<?php 
							$thumb = get_field('thumbnail');
							if ($thumb && !empty($thumb['sizes']['half-width'])) : ?>
								<img src="<?= esc_url($thumb['sizes']['half-width']); ?>" alt="<?= esc_attr(get_the_title()); ?>">
							<?php endif; ?>
						</div>
						<div class="project-text">
							<h3><?php the_title(); ?></h3>
							<?php if ( get_field( 'excerpt' ) ) : ?>
								<div class="project-excerpt">
									<?php the_field( 'excerpt' ); ?>
								</div>
							<?php endif; ?>
							<?php if ( get_field( 'performance_dates' ) ) : ?>
								<div class="project-date">
									<?php the_field( 'performance_dates' ); ?>
								</div>
							<?php endif; ?>
							<p class="archive-more-link">
								<span>MORE</span>
							</p>
						</div>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
		<?php
	endif;

	wp_reset_postdata();
	?>
</section>
