<?php get_header(); ?>

<?php get_template_part("menu"); ?>

<div class="description categoryDescription">
    <h2 class="title"><?php single_cat_title(); ?></h2>
    <p class="excerpt">
        <?php $category = get_queried_object();
        echo $category->description; ?>
    </p>
</div>
<div class="main">
    <div class="centerContainer">
        <h2 class="singleTitle singleTitleOne"><?php single_cat_title(); ?></h2>

        <?php
        function get_own_link($link){
            $sPos=strpos($link,"href=");
            $ePos=strpos($link,">");

            return substr($link,$sPos+6,$ePos-$sPos-8);
        }

        if($prev=get_previous_posts_link()){
            ?>
            <a class="prevPage pageItem" href="<?php echo get_own_link($prev); ?>"></a>
        <?php
        }
        ?>

        <ul class="itemList" id="itemList">

            <?php while ( have_posts() ) : the_post();?>

                <li class="item">
                    <a href="<?php the_permalink(); ?>">
                        <h4 class="title"><?php echo get_the_date(); ?>|<?php the_title(); ?></h4>
                        <div class="detail">
                            <div class="cover"></div>
                            <?php $mediumSrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium'); ?>
                            <img class="thumb" src="<?php echo $mediumSrc[0]; ?>">

                            <div class="abstract">
                                <h4 class="about"><?php the_title(); ?></h4>
                                <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
                            </div>

                        </div>
                    </a>
                </li>

            <?php endwhile; // end of the loop. ?>
        </ul>

        <?php
        if($next=get_next_posts_link()){
            ?>
            <a class="nextPage pageItem" href="<?php echo get_own_link($next);?>"></a>
        <?php
        }
        ?>

    </div>
</div>

<?php get_footer(); ?>