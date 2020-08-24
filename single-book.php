<?php
get_header();
?>

	<main id="primary" class="site-main">

<section class="post-body page-body">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

  </header><!-- .entry-header -->

    <?php while ( have_posts() ) : the_post(); ?>

  <div class="post-thumbnail">
    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="book-post-thumbnail"/>
    <div id="buy">ORDER<br>
    <?php if(get_field('amazon_link')) : ?>
      <a href="<?php echo get_field('amazon_link'); ?>">AMAZON</a><br>
    <?php endif; ?>
    <?php if(get_field('thriftbooks_link')) : ?>
      <a href="<?php echo get_field('thriftbooks_link'); ?>" target="_blank">THRIFTBOOKS</a><br>
    <?php endif; ?>
    </div>
  </div>

  <div class="entry-content">

      <?php the_content(); ?>


  <?php endwhile; ?>

  <!-- Slideshow container -->
  <div class="slideshow-container">

  <?php $slides = 0; ?>

  <!-- Full-width slides/quotes -->
  <?php $quote1 = get_field('quote');
   if ($quote1['text']) :
  ?>
  <div class="mySlides">
    <q><?php echo $quote1['text']; ?></q>
    <p class="author"><?php echo $quote1['author']; ?></p>
  </div>
  <?php
  $slides++;
  endif; ?>

  <?php $quote2 = get_field('quote_2');
  if ($quote2['text']) :
  ?>
  <div class="mySlides">
  <q><?php echo $quote2['text']; ?></q>
  <p class="author"><?php echo $quote2['author']; ?></p>
  </div>
  <?php
  $slides++;
  endif; ?>

  <?php $quote3 = get_field('quote_3');
  if ($quote3['text']) :
  ?>
  <div class="mySlides">
  <q><?php echo $quote3['text']; ?></q>
  <p class="author"><?php echo $quote3['author']; ?></p>
  </div>
  <?php
  $slides++;
  endif;

  if($slides > 1) :?>

  <!-- Next/prev buttons -->
  <a class="prev">&#10094;</a>
  <a class="next">&#10095;</a>
  </div>

  <!-- Dots/bullets/indicators -->
  <div class="dot-container">
  <?php
    for ($i = 0; $i < $slides; $i++) { ?>
  <span class="dot"></span>
  <?php }; ?>
  </div>
  <?php endif; ?>
  </div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
</section>

</main><!-- #main -->

<?php

get_footer();
