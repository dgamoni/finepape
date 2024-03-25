<?php
global $avia_config, $post_loop_count;

$post_loop_count= 1;
$post_class 	= "post-entry-".avia_get_the_id();



// check if we got posts to display:
if (have_posts()) :

	while (have_posts()) : the_post();
?>

		<article class='post-entry post-entry-type-page <?php echo $post_class; ?>' <?php avia_markup_helper(array('context' => 'entry')); ?>>

			<div class="entry-content-wrapper clearfix">
				<?php
                echo '<header class="entry-content-header">';
                $imagem_slider = get_field('imagem_slider',get_the_ID());
				$thumb = get_the_post_thumbnail(get_the_ID(), $avia_config['size']);

				// if($thumb) echo "<div class='page-thumb'>{$thumb}</div>";
				if($imagem_slider) echo "<div class='page-thumb'><img src='".$imagem_slider['url']."'></div>";
                echo '</header>';

				//display the actual post content
				echo "<div class='container container_porto'>";
					// echo '<div class="entry-content" '.avia_markup_helper(array('context' => 'entry_content','echo'=>false)).'>';
					//     the_content(__('Read more','avia_framework').'<span class="more-link-arrow"></span>');
					// echo '</div>';
?>
				<div class="flex_column av_two_third  flex_column_div av-zero-column-padding first  avia-builder-el-2  el_before_av_one_third  avia-builder-el-first  " style="border-radius:0px; ">
					<section class="av_textblock_section " itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " itemprop="text">
							<p>
								<?php the_content(__('Read more','avia_framework').'<span class="more-link-arrow"></span>'); ?>
								<?php //echo get_the_excerpt( get_the_ID() ); ?>	
							</p>
						</div>
					</section>
					<section class="av_textblock_section " itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
						<div class="avia_textblock  " style="font-size:14px; " itemprop="text">
							<p>
								<span style="color: #808080;">
									<?php			
									if(has_tag() && is_single())
									{
										the_tags('',' | ');
									} ?>
								</span>
							</p>
						</div>
					</section>
				</div>
				
				<?php
				$area = get_field('area', get_the_ID());
				$tecnologia = get_field('tecnologia', get_the_ID());
				$design = get_field('design', get_the_ID());
				$eventos = get_field('eventos', get_the_ID());
				$servicos = get_field('servicos', get_the_ID());
				$materiais = get_field('materiais', get_the_ID());
				//var_dump($area);
	                
	                echo '<footer class="entry-footer flex_column av_one_third">';
	                
		                if($area) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Area: </span>
			                	<?php foreach ($area as $key => $areas) {
			                		echo '<span class="porto-fileds-value">'.$areas.'</span>';
			                	} ?>
		                	</p>
		                <?php endif;
						
						if($tecnologia) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Tecnologia: </span>
			                	<?php foreach ($tecnologia as $key => $tecnologias) {
			                		echo '<span class="porto-fileds-value">'.$tecnologias.'</span>';
			                	} ?>
		                	</p>
		                <?php endif;
						
						if($design) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Design: </span>
			                	<?php foreach ($design as $key => $designs) {
			                		echo '<span class="porto-fileds-value">'.$designs.'</span>';
			                	} ?>
		                	</p>
		                <?php endif;

						
						if($eventos) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Eventos: </span>
			                	<?php foreach ($eventos as $key => $eventoss) {
			                		echo '<span class="porto-fileds-value">'.$eventoss.'</span>';
			                	} ?>
		                	</p>
		                <?php endif;
						
						if($servicos) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Servicos: </span>
			                	<?php foreach ($servicos as $key => $servicoss) {
			                		echo '<span class="porto-fileds-value">'.$servicoss.'</span>';
			                	} ?>
		                	</p>
		                <?php endif;
						
						if($materiais) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Materiais: </span>
			                	<?php foreach ($materiais as $key => $materiaiss) {
			                		echo '<span class="porto-fileds-value">'.$materiaiss.'</span>';
			                	} ?>
		                	</p>
		                <?php endif;


	                echo '</footer>';



	            echo '</div>';
				?>

				<?php 
//$images = get_field('porto_gallery',get_the_ID());
//var_dump($images);

if( $images ): ?>


    <div id="carousel" class="flexslider">
        <ul class="slides avia-slideshow">
            <?php foreach( $images as $image ): ?>
            	
	                <li>
	                    <img src="<?php echo  $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class=" " />
	                </li>
	            
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>				
				


			</div>
			
			<?php do_action('ava_after_content', get_the_ID(), 'single-portfolio'); ?>
			
		</article><!--end post-entry-->


<?php
	$post_loop_count++;
	endwhile;
	else:
?>

    <article class="entry">
        <header class="entry-content-header">
            <h1 class='post-title entry-title'><?php _e('Nothing Found', 'avia_framework'); ?></h1>
        </header>

        <?php get_template_part('includes/error404'); ?>

        <footer class="entry-footer"></footer>
    </article>

<?php

	endif;
?>
