/**
 * Created with JetBrains PhpStorm.
 * User: ty
 * Date: 14-7-1
 * Time: 上午9:48
 * To change this template use File | Settings | File Templates.
 */
var config={
    flashUrl:"http://localhost/idchannel/chinese/wp-content/themes/chinese/js/frontend/lib/baiduPlayer/player/cyberplayer.flash.swf",
    createPlayer:function(id,src){
        var me=this;
        var player = cyberplayer(id).setup({
            flashplayer:me.flashUrl,
            width : "100%",
            height : "100%",
            //file : "http://id-channel-1.qiniudn.com/So2IXkSxEUhw0cjsA0hCJ8o5wVs=/lkzJqbAMvEERMcJPt4OjMUddTnHt",
            file:src,
            //image : "data/backImg.jpg",
            autoStart : false,
            repeat : "always",
            volume : 100,
            controlbar : "over",
            // ak 和 sk（只需前 16 位）参数值需要开发者进行申请
            ak:"93DSyi9sH4BQjjRtOGzA6Csp",
            sk:"T7iAt3i0BN9xzGXwO8ND2T8cUViuznVD"
        });

        return player;
    }
};
$(document).ready(function(){
    $("#topVideoLinkTitle").click(function(){
        $("#topVideoLinks").toggle();
        return false;
    });
});