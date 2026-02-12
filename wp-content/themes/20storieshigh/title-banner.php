<div<?php if(get_field('banner_image')!='') : ?> style="background-image: url(<?= get_field('banner_image')['sizes']['carousel']; ?>)";<?php endif; ?> id="title-banner" class="py-8 w-full<?php echo get_field('narrow_banner')==true ? ' narrow' : ''; if(get_field('banner_image')!='') : echo ' banner-with-image'; else : echo ' no-image'; endif; ?>">
	<?php if(is_singular('news')) : ?>
	<div class="max-w-[135.2rem] mx-auto px-8 inner back-to-news"><p><a href="<?= site_url('news'); ?>">Back to News</a></p></div>
	<?php endif; ?>
	<div class="max-w-[135.2rem] mx-auto px-8 inner"><h2><?php 
		if(get_field('banner_title')!='') :
			echo get_field('banner_title');
		else :
			the_title();
		endif; ?></h2>
	<?php if(is_singular('work') && get_field('media_credit')!='') : ?>
		<h4><?= get_field('media_credit'); ?></h4>
	<?php endif; ?>
	<?php if(is_singular('news')) : ?>
		<h4><?= get_the_date('j M Y'); ?></h4>
		<?php
			$share_url        = rawurlencode(get_permalink());
			$share_title_mail = rawurlencode(get_the_title());
		?>
		<ul class="flex gap-4 list-none p-0 news-socials">
		
			<li class="linkedin">
				<a
					href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $share_url; ?>"
					target="_blank"
					rel="noopener"
					aria-label="Share on LinkedIn (opens in a new tab)"
				>
					LinkedIn
				</a>
			</li>
		
			<li class="email">
				<a href="mailto:?subject=20 Stories High News: <?= $share_title_mail; ?>&body=<?= $share_url; ?>" aria-label="Share via Email">
					Email
				</a>
			</li>
		
			<li class="share">
				<button
					type="button"
					class="native-share cursor-pointer bg-transparent border-none p-0 underline"
					data-title="<?= esc_attr(get_the_title()); ?>"
					data-url="<?= esc_url(get_permalink()); ?>"
					aria-label="Share this post"
				>
					Share
				</button>
			</li>
		
		</ul>
<script>
		document.addEventListener('click', function (e) {
			const btn = e.target.closest('.native-share');
			if (!btn) return;
		
			e.preventDefault();
		
			if (navigator.share) {
				navigator.share({
					title: btn.dataset.title,
					url: btn.dataset.url
				});
			} else {
				// Fallback: copy link
				navigator.clipboard.writeText(btn.dataset.url);
				alert('Link copied to clipboard');
			}
		});
		</script>
	<?php endif; ?>
	</div>
</div>
