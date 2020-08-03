<?php
get_header();
?>

	<main id="primary" class="site-main">

		<?php
      $number = 0;
			if ( have_posts() ) :
					while ( have_posts() ) :
					 the_post();


           $videoLink = str_replace('watch?v=', 'embed/', get_field('video_link'));


			?>


			<section class="post-body video-post-body">
        <h3><a href="<?php echo get_field('video_link'); ?>"><?php the_title(); ?></a></h3>
        <div class="video-link video-<?php echo $number; $number = $number + 1; ?>">
            <iframe class="video-player" src="<?php echo $videoLink; ?>" frameborder="0" seamless></iframe>
        </div>
			</section>

		<?php
	  endwhile;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php

get_footer();
