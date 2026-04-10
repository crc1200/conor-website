<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<main class="container project-single">
    <a href="<?php echo esc_url( home_url( '/portfolio' ) ); ?>" class="back-link">&larr; All Projects</a>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="project-hero" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>')"></div>
    <?php endif; ?>

    <div class="project-body">
        <h1><?php the_title(); ?></h1>
        <?php
        $tagline = get_field( 'project_tagline' );
        if ( $tagline ) : ?>
            <p class="project-tagline"><?php echo esc_html( $tagline ); ?></p>
        <?php endif; ?>

        <div class="project-content">
            <?php the_content(); ?>
        </div>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>
