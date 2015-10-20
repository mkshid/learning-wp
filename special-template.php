<?php
/*
Template Name: Special Template
*/

get_header();

  if (have_posts()):
    while (have_posts()): the_post(); ?>
    <article class="post page">
      <h2><?php the_title(); ?></h2>
      <div class="info-box">
        <h4>Disclaimer Title</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti a
        utem, eveniet cumque? Tempora dolor accusantium odit beatae dignissimos
         velit atque? Eligendi quas facere earum aspernatur sapiente voluptatum
         vel, eveniet sint.
         </p>
      </div>

      <?php the_content(); ?>
    </article>
  <?php
    endwhile;


  else:
    echo '<p>No content found</p>';

  endif;

get_footer();
?>
