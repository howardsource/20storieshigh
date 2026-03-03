<?php
get_header();
?>

<?php get_template_part('banner'); ?>

<main id="main-content" class="site-main" role="main" aria-labelledby="news-archive-title" tabindex="-1">

<div id="title-banner" class="outer no-image">
	<div class="inner">
		<h2 id="news-archive-title"><span><?php post_type_archive_title(); ?></span></h2>
	</div>
</div>


    <div id="news-archive-content" class="outer module tiles">
        <div class="inner tile-group image-overview">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="tile">
                        <div class="image-outer">
                            <div class="image" style="background-image: url('<?= get_field('thumbnail')['sizes']['tiles']; ?>')"></div>
                        </div>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p><?= get_the_excerpt(); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php _e('No news found.', '20storieshigh'); ?></p>
            <?php endif; ?>
        </div>
    </div>
    
    <div id="news-archive-pagination" class="outer">
        <div class="inner">
            <?php
            the_posts_pagination(
                [
                    'mid_size'           => 2,
                    'prev_text'          => __('Previous', '20storieshigh'),
                    'next_text'          => __('Next', '20storieshigh'),
                    'screen_reader_text' => __('News navigation', '20storieshigh'),
                ]
            );
            ?>
        </div>
    </div>

    </div></main>
