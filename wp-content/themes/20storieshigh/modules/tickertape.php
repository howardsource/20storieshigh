<?php 
$text = $module['text'] ?? '';
?>

<?php if ($text) : ?>
<section class="module module-tickertape">
	<div class="inner">
		<div class="tickertape-track" aria-hidden="true">
			<div class="tickertape-sequence">
				<span class="tickertape-text"><?= esc_html($text); ?></span>
				<span class="tickertape-text"><?= esc_html($text); ?></span>
				<span class="tickertape-text"><?= esc_html($text); ?></span>
				<span class="tickertape-text"><?= esc_html($text); ?></span>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
