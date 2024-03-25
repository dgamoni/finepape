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
                        <?php echo single_term_title('', 0); ?>
                    </span>
                    <div class="filter">
                        &nbsp;
                        <?php //echo do_shortcode( '[searchandfilter id="105"]'); ?>
                    </div>

                    <div id="port-wrap" class="port-wrap">
                        <?php
                            //echo do_shortcode('[searchandfilter id="105" show="results"]');   
                            get_template_part( 'includes/loop', 'portfolio-tag' );
                        ?>
                    </div>
                </main>

            </div><!--end container-->

        </div><!-- close default .container_wrap element -->




<?php get_footer(); ?>
