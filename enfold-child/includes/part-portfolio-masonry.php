<?php
$images = get_field('porto_gallery',get_the_ID());
//var_dump($images);

if( $images ): ?>

	<div class="container slideer_wrap">
		<div class="grid">
		  <div class="grid-sizer"></div>

		    <?php foreach( $images as $image ): ?>

			  <div class="grid-item">
			    <a rel='lightbox' href="<?php echo  $image['url']; ?>"><img src="<?php echo  $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
			  </div>

			<?php endforeach; ?>

		</div>
	</div>

<?php endif; ?>	 

<script>
	jQuery(document).ready(function($) {
		
		// init Masonry
		var $grid = $('.slideer_wrap .grid').masonry({
		  itemSelector: '.slideer_wrap .grid-item',
		  percentPosition: true,
		  columnWidth: '.slideer_wrap .grid-sizer'
		});
		// layout Masonry after each image loads
		$grid.imagesLoaded().progress( function() {
		  $grid.masonry();
		});

	});

</script>

<style>

.avia_transform .slideer_wrap a:hover .image-overlay {
    opacity: 0 !important;
    display: none !important;
}
	/* clear fix */
	.slideer_wrap .grid:after {
	  content: '';
	  display: block;
	  clear: both;
	}

	/* ---- .grid-item ---- */

	.slideer_wrap .grid-sizer,
	.slideer_wrap .grid-item {
	  width: 33.333%;
	}

	.slideer_wrap .grid-item {
	  float: left;
	}

	.slideer_wrap .grid-item img {
	  display: block;
	  max-width: 100%;
	}

</style>