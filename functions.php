
<?php


function enqueue_custom_script()
{
    wp_enqueue_script('jquery');
    // Register the script
    wp_register_script('ajax-load-more-script', get_template_directory_uri() . '/script.js', array('jquery'), '1.0', true);
    
    // Enqueue the script
    wp_enqueue_script('ajax-load-more-script');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');

function weichie_load_more()
{
    $ajaxposts = new WP_Query([
      'post_type' => 'post',
      'posts_per_page' => 2,
      'orderby' => 'date',
      'order' => 'DESC',
      'paged' => $_POST['paged'],
    ]);
  
    $response = '';
  
    if ($ajaxposts->have_posts()) {
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part('template-parts/card-post');
        endwhile;
    } else {
        $response = '';
    }
    echo $response;
    exit;
}
add_action('wp_ajax_weichie_load_more', 'weichie_load_more');
add_action('wp_ajax_nopriv_weichie_load_more', 'weichie_load_more');
