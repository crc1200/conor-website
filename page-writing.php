<?php
/* Template Name: Writing Grid */
get_header(); ?>

<main class="container">
    <header class="page-header">
        <h1>Writing</h1>
        <p>Essays, notes, and deep dives hosted across the web.</p>
    </header>

    <section class="writing-bento">
        <?php
        $writing_query = new WP_Query( array(
            'post_type'      => 'post',
            'category_name'  => 'writing',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ) );

        if ( $writing_query->have_posts() ) :
            while ( $writing_query->have_posts() ) : $writing_query->the_post();
                $external_url = get_field( 'external_url' );
                $featured     = get_field( 'featured_article' );
                $card_class   = $featured ? 'writing-card wide' : 'writing-card';
                $categories   = get_the_category();
                $tag_label    = ! empty( $categories ) ? esc_html( $categories[0]->name ) : '';
        ?>
            <a href="<?php echo esc_url( $external_url ); ?>" target="_blank" class="<?php echo $card_class; ?>">
                <div class="card-content">
                    <?php if ( $tag_label ) : ?>
                        <span class="tag"><?php echo $tag_label; ?></span>
                    <?php endif; ?>
                    <h2><?php the_title(); ?></h2>
                    <?php if ( has_excerpt() ) : ?>
                        <p><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                    <span class="date"><?php echo get_the_date( 'M Y' ); ?></span>
                </div>
            </a>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <p>No articles yet.</p>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
