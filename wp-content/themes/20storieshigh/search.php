<?php
get_header();
$search_query = trim((string) get_search_query());
?>

<?php get_template_part('banner'); ?>

<main id="main-content" class="site-main search-results-page" role="main" aria-labelledby="search-results-title" tabindex="-1">

	<div id="title-banner" class="outer no-image">
		<div class="inner">
			<h2 id="search-results-title"><span><?= esc_html__('Search Results', '20storieshigh'); ?></span></h2>
		</div>
	</div>

	<?php if (function_exists('yoast_breadcrumb')) : ?>
	<div id="breadcrumb-bar" class="outer navy">
		<div class="inner breadcrumbs">
			<?php yoast_breadcrumb(); ?>
		</div>
	</div>
	<?php endif; ?>

	<div class="outer search-results-shell <?php echo esc_attr($search_query !== '' ? 'has-query lilac' : 'pink'); ?>">
		<div class="inner">
			<form role="search" method="get" class="search-results-form" action="<?= esc_url(home_url('/')); ?>">
				<label for="search-results-input" class="screen-reader-text">Search</label>
				<input
					type="search"
					id="search-results-input"
					name="s"
					value="<?= esc_attr($search_query); ?>"
					placeholder="Search shows, projects, news, resources…"
					autocomplete="off"
					required
				/>
				<button type="submit" class="search-results-submit">Search</button>
			</form>

			<?php if ($search_query !== '' && have_posts()) : ?>
				<?php
				global $wp_query;
				$paged      = max(1, (int) get_query_var('paged', 1));
				$posts_per  = (int) get_query_var('posts_per_page', 10);
				$start_num  = ($paged - 1) * $posts_per;
				?>
				<p class="search-results-count">
					<?= sprintf(
						esc_html(_n('%d result found', '%d results found', (int) $wp_query->found_posts, '20storieshigh')),
						(int) $wp_query->found_posts
					); ?>
				</p>
				<ol class="search-results-list">
					<?php while (have_posts()) : the_post(); $start_num++; ?>
						<li class="search-result-item" value="<?= esc_attr($start_num); ?>">
							<a href="<?= esc_url(get_permalink()); ?>"><?= esc_html(get_the_title()); ?></a>
						</li>
					<?php endwhile; ?>
				</ol>

				<div class="pagination">
					<?php
					the_posts_pagination(
						[
							'mid_size'           => 2,
							'prev_text'          => __('Previous', '20storieshigh'),
							'next_text'          => __('Next', '20storieshigh'),
							'screen_reader_text' => __('Search results navigation', '20storieshigh'),
						]
					);
					?>
				</div>
			<?php elseif ($search_query !== '') : ?>
				<p class="search-results-none">
					<?= sprintf(esc_html__('No results found for “%s”. Try a different search.', '20storieshigh'), esc_html($search_query)); ?>
				</p>
			<?php else : ?>
				<p class="search-results-none">
					<?= esc_html__('Enter a keyword to search shows, projects, news, resources and pages.', '20storieshigh'); ?>
				</p>
			<?php endif; ?>
		</div>
	</div>



<?php get_footer(); ?>
