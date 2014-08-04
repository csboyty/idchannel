<h1 class="logo">
    <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo("name"); ?></a>
</h1>
<div class="menuContainer">
    <ul class="menu">

        <li class="menu-item">
            <a href="#" id="headLineLinkTitle">推荐视频</a>
            <ul class="sub-menu" id="headLineLinks">
                <?php
                $headLineId=12;
                $headLinePosts=get_posts(array(
                    "tag_id"=>$headLineId
                ));
                //print_r($headLinePosts);
                foreach($headLinePosts as $post){
                    ?>

                    <li class="menu-item"><a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title; ?>">
                            <?php echo $post->post_title; ?>
                        </a></li>

                <?php
                }
                ?>
            </ul>
        </li>
    </ul>
    <?php wp_nav_menu(); ?>
</div>
<form role="search" method="get" class="search" action="<?php echo home_url(); ?>">
    <input type="text" name="s" class="searchInput" placeholder="搜索...">
</form>