<?php get_header(); ?>

<?php get_template_part("menu"); ?>

    <div class="main">
        <div class="headLineListContainer">
            <ul class="headLineList" id="headLineList">
                <?php
                $headLineId=12;
                $headLinePosts=get_posts(array(
                    "tag_id"=>$headLineId
                ));
                foreach($headLinePosts as $post){
                ?>

                    <li class="headLineItem">
                        <a href="<?php echo get_permalink($post->ID); ?>">
                            <div class="cover"></div>
                            <?php $fullSrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
                            <img class="videoPoster" src="<?php echo $fullSrc[0]; ?>">
                        </a>
                    </li>

                <?php
                }
                ?>

            </ul>
        </div>
    </div>

<?php get_footer(); ?>