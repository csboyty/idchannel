<!DOCTYPE html>
<!--[if IE 8]> <html class="IE8"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <title><?php wp_title("|",true,"right"); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/frontend/app/favicon.png"
          mce_href="<?php echo get_template_directory_uri(); ?>/images/frontend/app/favicon.png" type="image/x-png">
    <link href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/frontend/src/baiduAnalytics.js"></script>
</head>
<body>
<div class="centerContent">
    <h1 class="logo">
        <a><?php echo get_bloginfo("name"); ?></a>
    </h1>
    <ul class="langMenu">
        <li><a href="<?php
            $mainBlog=get_blog_details(2);
            echo $mainBlog->siteurl;
            ?>" id="chinese">中文</a></li>

        <li><a href="<?php
            $mainBlog=get_blog_details(3);
            echo $mainBlog->siteurl;
            ?>" id="english">English</a></li>
    </ul>
</div>
</body>
</html>