<?php
    $flashId=8;
?>
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
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/baiduPlayer/js/cyberplayer.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/config.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/single.js"></script>

</head>
<body>
<h1 class="logo">
    <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo("name"); ?></a>
</h1>
<div class="menuContainer">
    <ul class="menu">
        <li class="menu-item">
            <a href="#" id="topVideoLinkTitle">推荐视频</a>
            <ul class="sub-menu hidden" id="topVideoLinks">
                <li class="menu-item"><a href="#">视频1</a></li>
                <li class="menu-item"><a href="#">视频1</a></li>
                <li class="menu-item"><a href="#">视频1</a></li>
                <li class="menu-item"><a href="#">视频1</a></li>
                <li class="menu-item"><a href="#">视频1</a></li>
            </ul>
        </li>
    </ul>
    <?php wp_nav_menu(); ?>
</div>

<form role="search" method="get" class="search" action="<?php echo home_url(); ?>">
    <input type="text" name="s" class="searchInput" placeholder="搜索...">
</form>
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
    <?php
        if($category->term_id==$flashId){
            ?>
            <embed src="<?php echo get_the_content(); ?>" type="application/x-shockwave-flash"></embed>
        <?php
        }else{
            ?>
            <div class="singleVideo" id="singleVideo" data-video-url="<?php echo get_the_content(); ?>">
                <div class="posterContainer" id="posterContainer">
                    <img class="videoPoster" src="<?php echo get_template_directory_uri(); ?>/images/frontend/data/1.jpg">
                    <span class="videoPlayIcon" id="videoPlayIcon">播放按钮</span>
                </div>
                <div id="playerContainer" class="playerContainer"></div>
            </div>
            <?php
        }
    ?>

</div>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>