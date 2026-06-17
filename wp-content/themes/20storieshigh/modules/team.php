<section class="outer module team white">
	<div class="inner team-group">
		<?php foreach($module['team'] as $tile) : ?>
		<?php
		$name  = !empty($tile['name']) ? $tile['name'] : 'Name coming soon';
		$role  = !empty($tile['role']) ? $tile['role'] : 'Role to be confirmed';
		$bio   = !empty($tile['bio']) ? $tile['bio'] : 'Bio coming soon.';
		$mobile = !empty($tile['mobile']) ? $tile['mobile'] : '';
		$email = !empty($tile['email']) ? $tile['email'] : '';
		?>
		<div class="team-member reveal">
			<div class="image-outer">
				<div class="image" style="background-image: url(<?= $tile['thumbnail']['sizes']['square']; ?>)"></div>
			</div>
			<div class="text-outer">
				<div class="team-header">
					<span class="team-name"><?= $name; ?></span>
					<span class="team-toggle-icon" aria-hidden="true"></span>
				</div>
				<h5><?= $role; ?></h5>
				<div class="contact">
					<?php if ($mobile) : ?>
						<?= $mobile; ?>
					<?php endif; ?>
					<?php if ($email) : ?>
						<a href="mailto:<?= $email; ?>"><?= $email; ?></a>
					<?php endif; ?>
				</div>
				<div class="bio"><?= $bio; ?></div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</section>
