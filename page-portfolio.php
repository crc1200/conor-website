<?php
/* Template Name: Portfolio Grid */
get_header(); ?>

<main class="container">
    <header class="page-header">
        <h1>Portfolio</h1>
        <p>A selection of projects I've worked on.</p>
    </header>

    <section class="portfolio-grid">
        <?php
        $project_query = new WP_Query( array(
            'post_type'      => 'project',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ) );

        if ( $project_query->have_posts() ) :
            while ( $project_query->have_posts() ) : $project_query->the_post();
                $tagline = get_field( 'project_tagline' );
                $thumb   = get_the_post_thumbnail_url( get_the_ID(), 'large' );
        ?>
            <a href="<?php the_permalink(); ?>" class="project-card">
                <div class="project-image" style="<?php echo $thumb ? 'background-image: url(' . esc_url( $thumb ) . ')' : ''; ?>">
                    <div class="project-overlay">
                        <h2><?php the_title(); ?></h2>
                        <?php if ( $tagline ) : ?>
                            <p><?php echo esc_html( $tagline ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <p>No projects yet.</p>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
