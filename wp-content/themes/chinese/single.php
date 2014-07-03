<?php
    $flashId=8;
    $newsId=6;
    get_header();
?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/baiduPlayer/js/cyberplayer.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/main.js"></script>
    <script type="text/javascript">
        var templateUrl="<?php echo get_template_directory_uri(); ?>";
    </script>
</head>
<body>

<?php get_template_part("menu"); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="description">
    <h2 class="title"><?php the_title(); ?></h2>
    <p class="excerpt"><?php echo get_the_excerpt(); ?></p>
    <p class="category">
        <?php $categories = get_the_category();
            $category=$categories[0];
            echo $category->cat_name; ?>
    </p>
</div>
<div class="main">
    <?php if($category->term_id==$newsId){
        ?>
        <div class="centerContainer">
            <h2 class="singleTitle singleTitleOne"><?php the_title(); ?></h2>
            <div class="singleContent" id="singleContent">
                <?php the_content(); ?>
            </div>
        </div>
        <?php
    }else{
        ?>
        <div class="singleVideo" id="singleVideo" data-video-url="<?php echo get_the_content(); ?>">
            <div class="posterContainer" id="posterContainer">
                <?php $fullSrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
                <img class="videoPoster" src="<?php echo $fullSrc[0]; ?>">
                <span class="videoPlayIcon" id="videoPlayIcon">播放按钮</span>
            </div>

            <?php if($category->term_id==$flashId){?>

                <embed src="<?php echo get_the_content(); ?>" type="application/x-shockwave-flash" class="playerContainer"></embed>

            <?php
            }else{
                ?>

                <div id="bdPlayerContainer" class="playerContainer"></div>

            <?php
            }
            ?>

        </div>
        <?php
    }
    ?>

</div>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>