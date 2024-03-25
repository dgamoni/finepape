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
							<p class="porto_tags_wrap">
								<span style="color: #808080;">
									<?php			
									if(has_tag() && is_single())
									{
										the_tags('',' | ');
									} ?>
								</span>
							</p>
							<br /><p>
								<?php echo do_shortcode( '[ssba-buttons]' ); ?>
							</p>
						</div>
					</section>
				</div>
				
				<?php
				$cliente_desc = get_field('cliente_desc', get_the_ID());
				$data_desc = get_field('data_desc', get_the_ID());
				$design_desc = get_field('design_desc', get_the_ID());
				$area_desc = get_field('area_desc', get_the_ID());
				$materiais_desc = get_field('materiais_desc', get_the_ID());

                
	                echo '<footer class="entry-footer flex_column av_one_third">';
	                
		                if($cliente_desc) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Cliente: </span>
			                	<?php 
			                	    echo '<span class="porto-fileds-value">'.$cliente_desc.'</span>';
			                	?>
		                	</p>
		                <?php endif;
	                
		                if($data_desc) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Data: </span>
			                	<?php 
			                	    echo '<span class="porto-fileds-value">'.$data_desc.'</span>';
			                	?>
		                	</p>
		                <?php endif;

	                
		                if($design_desc) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Design: </span>
			                	<?php 
			                	    echo '<span class="porto-fileds-value">'.$design_desc.'</span>';
			                	?>
		                	</p>
		                <?php endif;
	                
		                if($area_desc) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Pre-press: </span>
			                	<?php 
			                	    echo '<span class="porto-fileds-value">'.$area_desc.'</span>';
			                	?>
		                	</p>
		                <?php endif;
	                
		                if($materiais_desc) : ?>
		                	<p class="porto-fileds">
		                		<span class="porto-fileds-title">Print Management: </span>
			                	<?php 
			                	    echo '<span class="porto-fileds-value">'.$materiais_desc.'</span>';
			                	?>
		                	</p>
		                <?php endif;
		                
	                echo '</footer>';		                
	            echo '</div>';
				?>

			<?php //get_template_part( 'includes/part', 'portfolio-gallery' ); ?>	
			<?php get_template_part( 'includes/part', 'portfolio-masonry' ); ?>		

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
