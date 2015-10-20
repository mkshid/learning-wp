<?php

get_header();

  if (have_posts()):
    ?>

      <h2>Search result for: <?php the_search_query(); ?></h2>

    <?php

    while (have_posts()): the_post(); ?>
    <article class="post <?php if (has_post_thumbnail()) {?>
      has-thumbnail
      <?php } ?> ">

      <!-- post-thumbnail -->
      <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('small-thumbnail'); ?>
        </a>
      </div>
      <!-- post-thumbnail -->

     <a href="<?php the_permalink(); ?>"> <h2><?php the_title(); ?></h2></a>
     <p class="post-info"><?php the_time('F jS, Y g:i a'); ?> |
     by
     <a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>">
      <?php the_author(); ?>
     </a> |
     Posted in

      <?php
        $categories = get_the_category();
        $separtor = ", ";
        $output = '';

        if ($categories){
          foreach ($categories as $category) {
            $output .= '<a href="'. get_category_link($category -> term_id) .'">'. $category->cat_name .'</a>' . $separtor;
          }

          echo trim($output, $separtor);
        }

       ?>

     </p>
    <?php the_excerpt(); ?>


    </article>

  <?php
    endwhile;

  else:
    echo '<p>No content found</p>';

  endif;

get_footer();

?>
