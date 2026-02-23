<?php
$embed    = $module['embed_url'];
if ($embed) :
	if (preg_match('/src="([^"]+)"/', $embed, $matches)) :
		$src = $matches[1];
		if (strpos($src, 'youtube.com') !== false || strpos($src, 'youtu.be') !== false) :
			$params = [];
			if (!empty($params)) :
				$src   = add_query_arg($params, $src);
				$embed = preg_replace('/src="[^"]+"/', 'src="' . esc_url($src) . '"', $embed);
			endif;
		endif;
	endif;
endif;
?>
<div class="module embed outer">
	<div class="inner">
	<div class="oembed-container"><?php echo $embed; ?></div>
	</div>
</div>