<?php get_header(); ?>

<div class="fix-wrapper">
    <div class="container-fluid page-cases">
        <div class="container">

            <?php 
                wp_nav_menu( array(
                    'menu'  => 'casesmenu',
                    'container'       => false,
                    'menu_class'      => 'navbar-nav',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu'
                ));
            ?>

            <?php
                $my_posts = get_posts( array(
                    'numberposts' => 4,
                    'category'    => 9,
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'include'     => array(),
                    'exclude'     => array(),
                    'meta_key'    => '',
                    'meta_value'  =>'',
                    'post_type'   => 'post',
                    'suppress_filters' => true,
                ) );

                foreach( $my_posts as $post ){
                    setup_postdata( $post ); ?>
                        
                        <div class="main-cases-block">

                            <?php edit_post_link(null, '<span class="dashicons dashicons-edit-large">', '</span>'); ?>
                            <a href="<?php the_permalink(); ?>">
                                <figure class="mb-2">
                                    <?php the_post_thumbnail(); ?>
                                </figure>
                                <h4 class= mb-1>
                                    <?php the_title(); ?>
                                </h4>
                                <p class="main-cases-descr">
                                    <?php the_field('main_descr'); ?>
                                </p>
                            </a>
                        </div>
                    
                    <?php
                }

                wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>