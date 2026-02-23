<section class="module outer accordion">
	<?php if($module['display_title']) : ?>
	<div class="inner title title-<?= $module['cols_type']; ?><?php if($module['centred_title']) : ?> centred-title<?php endif; ?>"><h3><?= $module['title']; ?></h3></div>
	<?php endif; ?>
	<div class="inner accordion-columns">
		<div class="column">
			<?php foreach($module['accordion_left_column'] as $accItem) : ?>
			<div class="accordion-section">
				<h4>
					<span class="accordion-title"><?= $accItem['title']; ?></span>
					<span class="accordion-toggle-icon" aria-hidden="true"></span>
				</h4>
				<div class="text accordion-text"><?= $accItem['content']; ?></div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="column">
			<?php foreach($module['accordion_right_column'] as $accItem) : ?>
			<div class="accordion-section">
				<h4>
					<span class="accordion-title"><?= $accItem['title']; ?></span>
					<span class="accordion-toggle-icon" aria-hidden="true"></span>
				</h4>
				<div class="text accordion-text"><?= $accItem['content']; ?></div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
