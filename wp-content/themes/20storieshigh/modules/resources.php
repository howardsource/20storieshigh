<article class="module resources outer <?=  $module['background_colour']; ?>">
    <div class="inner">
        <h3><?= $module['resources_title'] ?: 'Resources'; ?></h3>
        <div class="resource-group">
        <?php foreach($module['resources'] as $resource) : ?>
        <div class="resource">
            <?php $download = get_field('download', $resource->ID); ?>
            <h4><?= !empty(get_field('short_display_title', $resource->ID)) ? get_field('short_display_title', $resource->ID) : $resource->post_title; ?></h4>
            <p><?= get_field('overview', $resource->ID); ?></p>
            <?php if (!empty($download['url'])) : ?>
            <p class="large-button-link"><a href="<?= $download['url']; ?>">Download (PDF)</a></p>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
</article>
