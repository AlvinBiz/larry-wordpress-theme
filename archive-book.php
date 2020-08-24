<?php
get_header();
?>

	<main id="primary" class="site-main">
   <section class="post-body video-post-body">
     <table width="800" border="0" cellspacing="0" cellpadding="0">
       <tbody>

		<?php


			if ( have_posts() ) :

        $number = 0;

					while ( have_posts() ) :
					 the_post();

           if ( $number == 0 ) {
             echo "<tr>";
           };

           $number = $number + 1;
			?>


        <td class="book-link book-<?php echo $number; ?>">
					<a href="<?php echo get_permalink(); ?>">
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
          <div class="overlay">
            <p><?php echo strtoupper(get_the_title()); ?></p>
          </div>
									</a>
        </td>

		<?php

    if ($number == 3) {
      echo "</tr>";
      echo "<tr class='spacer'></tr>";
      $number = 0;
    }

	  endwhile;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
        </tbody>
      </table>
     </section>
	</main><!-- #main -->

<?php

get_footer();
