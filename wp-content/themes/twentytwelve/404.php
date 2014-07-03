<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="refresh" content="3; url=<?php echo home_url(); ?>" />
    <title><?php wp_title("|",true,"right"); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/frontend/app/favicon.png"
          mce_href="<?php echo get_template_directory_uri(); ?>/images/frontend/app/favicon.png" type="image/x-png">
    <link href="<?php echo get_template_directory_uri(); ?>/css/frontend/src/main.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="_404Container">
        <span class="_404Icon">404图标</span>
        <p class="_404Content">您访问的页面不存在，将跳转到<a href="<?php echo home_url(); ?>">首页</a></p>
    </div>
</body>
</html>