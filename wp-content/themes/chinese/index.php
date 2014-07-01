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
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/index.js"></script>
    <script type="text/javascript">
        var flashUrl="<?php echo get_template_directory_uri(); ?>/js/frontend/lib/baiduPlayer/player/cyberplayer.flash.swf";
    </script>
</head>
<body>
    <h1 class="logo">
        <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo("name"); ?></a>
    </h1>
    <div class="menuContainer">
        <ul class="menu">
            <li class="menu-item">
                <a href="#" id="topVideoLinkTitle">推荐视频</a>
                <ul class="sub-menu" id="topVideoLinks">
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
        <div class="topVideosListContainer">
            <ul class="topVideosList" id="topVideosList">
                <li class="videoItem">
                    <a href="http://id-channel-1.qiniudn.com/11233482897040-08_02_1.mp4.m3u8">
                        <img class="videoPoster" src="<?php echo get_template_directory_uri(); ?>/images/frontend/data/1.jpg">
                    </a>
                </li>
                <li class="videoItem">
                    <a href="http://id-channel-1.qiniudn.com/11233482897040-08_02_1.mp4.m3u8">
                        <img class="videoPoster" src="<?php echo get_template_directory_uri(); ?>/images/frontend/data/2.jpg">
                    </a>
                </li>
                <li class="videoItem">
                    <a href="http://id-channel-1.qiniudn.com/11233482897040-08_02_1.mp4.m3u8">
                        <img class="videoPoster" src="<?php echo get_template_directory_uri(); ?>/images/frontend/data/3.jpg">
                    </a>
                </li>
                <li class="videoItem">
                    <a href="http://id-channel-1.qiniudn.com/11233482897040-08_02_1.mp4.m3u8">
                        <img class="videoPoster" src="<?php echo get_template_directory_uri(); ?>/images/frontend/data/4.jpg">
                    </a>
                </li>
                <li class="videoItem">
                    <a href="http://id-channel-1.qiniudn.com/11233482897040-08_02_1.mp4.m3u8">
                        <img class="videoPoster" src="<?php echo get_template_directory_uri(); ?>/images/frontend/data/5.jpg">
                    </a>
                </li>
            </ul>
        </div>
    </div>

<?php get_footer(); ?>