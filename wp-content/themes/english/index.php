<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <title><?php wp_title("|",true,"right"); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/frontend/app/favicon.png"
          mce_href="<?php echo get_template_directory_uri(); ?>/images/frontend/app/favicon.png" type="image/x-png">
    <link href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/main.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h1 class="logo">
        <a>idchannel视频网站</a>
    </h1>
    <ul class="langMenu">
        <li><a href="<?php
            $mainBlog=get_blog_details(2);
            echo $mainBlog->siteurl;
            ?>" id="chinese">汉字</a></li>

        <li><a href="<?php
            $mainBlog=get_blog_details(3);
            echo $mainBlog->siteurl;
            ?>" id="english">西文</a></li>
    </ul>
</body>
</html>