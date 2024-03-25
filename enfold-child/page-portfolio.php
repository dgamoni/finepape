<?php
	if ( !defined('ABSPATH') ){ die(); }
	
	global $avia_config, $more;


	 get_header();
	
	?>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container template-blog '>

				<main class='content <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'portfolio'));?>>
					
					<span style="font-size:20px;font-family: DINPro;">
						<?php //echo 'PORTFOLIO'; ?>
						<?php _e( 'PORTFOLIO', 'finepaper' ); ?>		
					</span>
					<div class="filter">
						<?php echo do_shortcode( '[searchandfilter id="105"]'); ?>
					</div>

					<div id="port-wrap" class="port-wrap">
						<?php
							//echo do_shortcode('[searchandfilter id="105" show="results"]');   
							get_template_part( 'includes/loop', 'portfolio' );
		                ?>
		            </div>
		            <div class="port-wrap-more">
		            	<?php //echo do_shortcode('[ajax_load_more id="porto_listing" container_type="div" post_type="portfolio" posts_per_page="4"]'); ?>
		            
		            	<a data-offset="4" class="porto_more" href=""><?php _e( 'Ver mais', 'finepaper' ); ?></a>
		            </div>
				</main>

			</div><!--end container-->

		</div><!-- close default .container_wrap element -->




<?php get_footer(); ?>
  