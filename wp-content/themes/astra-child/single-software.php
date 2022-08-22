<?php get_header(); ?>

        <div class="wpr-post">
                <?php
                echo '<h1 class="wpr-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h1>';
                ?>
            <div class="wpr-desc">
                <div class="wpr-bio">
                    <p>Description: <?php echo the_content(); ?></p>
                    <p>License validity: <?php echo get_field('license_validity'); ?> Days</p>
                    <p><?php echo get_field('price'); ?> EUR</p>
<p> <?php
    $engineers = new WP_Query(array(
            'post_type'   => 'engineers',
            'post_status' => 'publish', 
            'meta_query'  => array(
            array(
                'key'   => 'software', 
                'value' => '"' . get_the_ID() .'"', 
                'compare' => 'LIKE',
            ), 
            array(
                'key' => 'date_of_birth',
                'value' => date("Ymd", strtotime('- 25 years')),
                'compare' => '<=',
                )
            )
            
        ));
        if ($engineers->have_posts()) {
            ?>
            <ul>
            <?php
                while ($engineers->have_posts()) {
                    $engineers->the_post();
                    ?>
                <li><?php the_title(); ?></li>
                <?php 
                }
                ?>
            </ul>
        <?php
        }
        ?>
<?php   
wp_reset_postdata();
?>
</p>
                </div>
            </div>
        </div>   

<?php get_footer(); ?>