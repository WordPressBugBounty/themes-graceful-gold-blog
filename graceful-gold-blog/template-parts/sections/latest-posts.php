<?php
/**
 * Template part for Post Ticker
 *
 * @package Graceful Gold Blog
 */
if (graceful_options('basic_slider_width') === 'wrapped') {
    $graceful_slider_width = 'wrapped-content';
} else {
    $graceful_slider_width = '';
}
?>

<div class="graceful-latest <?php echo esc_attr( $graceful_slider_width ); ?>">
    
    <div id="graceful-latest-posts-ticker" class="graceful-latest-posts-ticker owl-carousel owl-theme">
        <?php
        // WP_Query to retrieve latest posts based on comment count.
        $graceful_latest_posts = new WP_Query( array(
            'posts_per_page' => 5,
            'order'          => 'DESC',
            'post_status'    => 'publish',
        ) );

        if ( $graceful_latest_posts->have_posts() ) :
            while ( $graceful_latest_posts->have_posts() ) : $graceful_latest_posts->the_post();
                // Calculate read time (approximately 200 words per minute)
                $content = get_the_content();
                $word_count = str_word_count( wp_strip_all_tags( $content ) );
                $read_time = ceil($word_count / 200);
                $read_time = max(1, $read_time); // Minimum 1 minute read time
            ?>
                <div class="item">
                    <div class="post-card">
                        <div class="post-image">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <div class="no-thumbnail"></div>
                            <?php endif; ?>
                        </div>
                        <div class="post-content">
                            <div class="post-author">
                                <?php 
                                $author_id = get_the_author_meta('ID');
                                $author_avatar = get_avatar_url($author_id, ['size' => 40]);
                                ?>
                                <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr(get_the_author()); ?>">
                                <span class="author-name"><?php echo esc_html(get_the_author()); ?></span>
                                <span class="post-date"><?php echo esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ); ?> ago</span>
                            </div>
                            <h3 class="post-title">
                                <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
                            </h3>
                            <div class="post-meta">
                                <span><?php echo esc_html( get_comments_number_text('0 Comments', '1 Comment', '% Comments') ); ?></span>
                                <span class="separator">•</span>
                                <span><?php echo esc_html($read_time); ?> Min Read</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>

</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.graceful-latest-posts-ticker').owlCarousel({
            items: 1,
            loop: true,
            margin: 24,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    });
</script>