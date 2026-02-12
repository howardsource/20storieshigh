<section class="module outer accordion <?= $module['background_colour']; ?>">
	<?php if($module['display_title']) : ?>
	<div class="inner title title-<?= $module['cols_type']; ?><?php if($module['centred_title']) : ?> centred-title<?php endif; ?>"><h3><?= $module['title']; ?></h3></div>
	<?php endif; ?>
	<div class="inner accordion-columns">
		<div class="column">
			<?php $accCount = 0; foreach($module['accordion_left_column'] as $accItem) : $accCount++; ?>
			<div class="accordion-section">
				<h4>
					<button class="accordion-trigger" aria-expanded="false" aria-controls="accordion-content-left-<?= $modN; ?>-<?= $accCount; ?>">
						<?= $accItem['title']; ?>
					</button>
				</h4>
				<div id="accordion-content-left-<?= $modN; ?>-<?= $accCount; ?>" class="text">
					<?= $accItem['content']; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="column">
			<?php $accCount = 0; foreach($module['accordion_right_column'] as $accItem) : $accCount++; ?>
			<div class="accordion-section">
				<h4>
					<button class="accordion-trigger" aria-expanded="false" aria-controls="accordion-content-right-<?= $modN; ?>-<?= $accCount; ?>">
						<?= $accItem['title']; ?>
					</button>
				</h4>
				<div id="accordion-content-right-<?= $modN; ?>-<?= $accCount; ?>" class="text">
					<?= $accItem['content']; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>