<?php
$images = get_field('porto_gallery',get_the_ID());
//var_dump($images);

if( $images ): ?>


    <!-- <div id="carousel" class="flexslider"> -->
    <div class="container slideer_wrap">
        <ul class="slides">
            <?php foreach( $images as $image ): ?>
            	
	                <li>
	                    <!-- <a rel='lightbox' href="<?php echo  $image['url']; ?>"><img src="<?php echo  $image['sizes']['featured']; ?>" alt="<?php echo $image['alt']; ?>" /></a> -->
	                    <a rel='lightbox' href="<?php echo  $image['url']; ?>"><img src="<?php echo  $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></a>
	                </li>
	            
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>	 