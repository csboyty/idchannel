<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit">
        <title><?php wp_title("|",true,"right"); ?></title>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/frontend/app/favicon.png"
              mce_href="<?php echo get_template_directory_uri(); ?>/images/frontend/app/favicon.png" type="image/x-png">
        <link href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/main.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/jquery.nicescroll.min.js"></script>

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/main.js"></script>

    </head>
<body>

<?php get_template_part("menu"); ?>

<div class="main">
    <div class="centerContainer">
        <h2 class="singleTitle singleTitleOne">搜索：<?php echo get_search_query(); ?></h2>

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