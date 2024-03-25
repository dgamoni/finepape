<?php
global $avia_config, $post_loop_count, $off_set;

//$post_loop_count= 1;
$post_class     = "post-entry-".avia_get_the_id();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $q_event = new WP_Query( array(
        'post_type'      => 'portfolio',
        //'posts_per_page' => 4,
        'post_status'    => 'publish',
        'order'          => 'ASC',
        'orderby'        => 'menu_order',
        'search_filter_id'=> 105,
        //'paged' => 2
        'offset'    => $off_set
    ) );

//echo "<pre>", print_r($q_event, 1), "</pre>";

// check if we got posts to display:
if ($q_event->have_posts()) :

    $first = true;

    $counterclass = "";
    $post_loop_count = 1;
    $loop_counter = 1;
    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if($page > 1) $post_loop_count = ((int) ($page - 1) * (int) get_query_var('posts_per_page')) +1;
    

    while ($q_event->have_posts()) : $q_event->the_post();
    $event_id = $q_event->post->ID;
    $total  = $post_loop_count % 2 ? "odd" : "even";
    if($loop_counter>4 || $loop_counter==1)
        {
              $extra = 'first';
              $loop_counter =1;
        } else {
            $extra = '';
        }
        $loop_counter++;
    //var_dump($total);
?>
    
        <article class='flex_column av_one_fourth post-entry port-item post-entry-type-page slide-parity-<?php echo $total; ?> <?php echo $post_class; echo ' '.$extra; ?>' <?php avia_markup_helper(array('context' => 'entry')); ?>>

            <a href="<?php echo get_the_permalink( $event_id); ?>">
                <div class="entry-content-wrapper clearfix">


                    <?php
                    echo '<header class="entry-content-header">';
                    $thumb = get_the_post_thumbnail(get_the_ID(), $avia_config['size']);

                    if($thumb) echo "<div class='page-thumb'>{$thumb}</div>";
                    echo '</header>';

                    echo get_the_title( $event_id );
                    
                
                    do_action('ava_after_content', $event_id, 'page');
                    ?>
                </div>
            </a>

        </article><!--end post-entry-->
    

    <?php
    $first = false;
    $post_loop_count++;
    if($post_loop_count >= 100) $counterclass = "nowidth";
    endwhile;

else:
?>

    <article class="entry">
        <header class="entry-content-header">
            <!-- <h1 class='post-title entry-title'> -->
                <?php //_e('Nothing Found', 'avia_framework'); ?>
            <!-- </h1> -->
        </header>

        <?php //get_template_part('includes/error404'); ?>

        <footer class="entry-footer"></footer>
    </article>

<?php

endif;
//echo avia_pagination('', 'nav');
?>
