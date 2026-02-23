<?php 
$background = $module['background_colour'] ?? 'black';
$configuration = $module['configuration'] ?? 'image-text';
$title = $module['title'] ?? '';
$title_words = preg_split('/\s+/', trim($title));
?>

<section class="module call-to-action <?= esc_attr($background); ?> <?= esc_attr($configuration); ?>">
	<div class="inner">
		<div class="image" style="background-image: url(<?= $module['image']['sizes']['half-width']; ?>)"></div>
		<div class="text">
			<h3>
				<?php if (!empty($title_words)) : ?>
					<?php foreach ($title_words as $word) : ?>
						<span><?= esc_html($word); ?></span>
					<?php endforeach; ?>
				<?php endif; ?>
			</h3>
			<?= $module['text']; ?>
			<p class="large-button-link"><a href="<?= $module['link']; ?>"><?= $module['link_text']; ?></a></p>
		</div>
	</div>
</section>
