<section class="module latest-projects outer">
	<div class="latest-projects-header">
		<h2>Projects</h2>
		<p class="large-button-link all-shows-link">
			<a href="<?php echo get_post_type_archive_link( 'projects' ); ?>">All Shows</a>
		</p>
	</div>
	<?php
	$latest_projects = new WP_Query(
		array(
			'post_type'      => 'projects',
			'posts_per_page' => 5,
			'post_status'    => 'publish',
		)
	);

	if ( $latest_projects->have_posts() ) :
		?>
		<div class="projects-list latest-projects-list">
			<?php
			while ( $latest_projects->have_posts() ) :
				$latest_projects->the_post();
				?>
				<article <?php post_class( 'project-item ' ); ?>>
					<a href="<?php the_permalink(); ?>" class="project-link">
						<?php if(get_field('show_status')=='current')	: ?>
						<div class="project-status current-show">Current Show</div>
						<?php else : ?>
						<div class="project-status past-show">Past Show</div>
						<?php endif; ?>
						<div class="project-image">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'half-width' ); ?>
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
			<?php endwhile; ?>
		</div>
		<?php
	endif;

	wp_reset_postdata();
	?>
</section>
