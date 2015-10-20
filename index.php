<?php

get_header();

  if (have_posts()):
    while (have_posts()): the_post(); ?>
    <article class="post">
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
      <?php the_post_thumbnail(); ?>

    <?php

      if ($post->post_excerpt) {
        ?>
        <p>
         <?php echo get_the_excerpt(); ?>
         <a href="<?php the_permalink(); ?>">Read more&raquo</a>
        </p>
        <?php
      } else {
         the_content();
      }

    ?>


    </article>

  <?php
    endwhile;

  else:
    echo '<p>No content found</p>';

  endif;

get_footer();

?>
