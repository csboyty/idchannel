<?php
/**
 * Template Name: 关于页面
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

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
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/config.js"></script>

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
<div class="main">
    <ul class="aboutItemList">
        <li class="aboutItem">
            <h4 class="title">愿景</h4>
            <p class="content">
                dadddddddddddddddassssssssddd
            </p>
        </li>
        <li class="aboutItem">
            <h4 class="title">联系我们</h4>
            <p class="content">
                dadddddddddddddddassssssssddd
            </p>
        </li>


    </ul>
</div>

<?php get_footer(); ?>