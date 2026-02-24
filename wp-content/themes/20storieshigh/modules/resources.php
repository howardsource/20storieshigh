<article class="module resources outer <?=  $module['background_colour']; ?>">
    <div class="inner">
        <h3>Resources</h3>
        <div class="resource-group">
        <?php foreach($module['resources'] as $resource) : ?>
        <div class="resource">
            <h4><?= $resource->post_title; ?></h4>
            <p><?= get_field('overview', $resource->ID); ?></p>
            <p class="large-button-link"><a href="<?= get_field('download', $resource->ID)['url']; ?>">Download (PDF)</a></p>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
</article>