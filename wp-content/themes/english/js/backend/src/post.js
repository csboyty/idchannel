/**
 * Created with JetBrains PhpStorm.
 * User: ty
 * Date: 14-7-4
 * Time: 上午11:18
 * To change this template use File | Settings | File Templates.
 */
jQuery(document).ready(function($){
    $("#publish").click(function(){

        //判断缩略图
        var insideP=$("#postimagediv .inside .hide-if-no-js");
        if(insideP.length<=1){
            alert("没有设置缩略图！");
            return false;
        }
    });
});
