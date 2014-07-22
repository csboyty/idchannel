<?php get_header(); ?>

<?php get_template_part("menu"); ?>

<div class="description categoryDescription">
    <h2 class="title"><?php single_cat_title(); ?></h2>
    <p class="excerpt">
        <?php $currentCategory = get_queried_object();
        echo $currentCategory->description; ?>
    </p>
</div>
<div class="main">
    <div class="centerContainer">
        <h2 class="singleTitle singleTitleOne"><?php single_cat_title(); ?></h2>

        <ul class="itemList" id="itemList">
            <?php
            $categories = get_categories(array(
                "parent"=>$currentCategory->term_id,
                "hide_empty"=>0
            ));

            foreach($categories as $category){
                ?>
                <li class="item">
                    <a href="<?php echo get_category_link($category->term_id); ?>">
                        <h4 class="title"><?php echo $category->name; ?></h4>
                        <div class="detail">
                            <div class="cover"></div>
                            <img class="thumb" src="<?php echo z_taxonomy_image_url($category->term_id); ?>">

                            <div class="abstract">
                                <h4 class="about">关于<?php echo $category->name; ?></h4>
                                <p class="excerpt"><?php echo $category->category_description; ?></p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>

    </div>
</div>

<?php get_footer(); ?>