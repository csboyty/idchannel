/**
 * Created with JetBrains PhpStorm.
 * User: ty
 * Date: 14-6-30
 * Time: 下午5:39
 * To change this template use File | Settings | File Templates.
 */
var main=(function(){
    var interVal=null;//记录setInterval的返回值
    var currentPlayer=null;

    return {
        roll:function(){
            interVal=setInterval(function(){
                /*if(currentNumber>topVideoCount){
                    currentNumber=1;
                }*/
                var headLineList=$("#headLineList");
                headLineList.animate({
                    "left":"-75%"
                },800,function(){
                    //var videoItem=$(".videoItem:eq("+(currentNumber-1)+")");
                    //me.currentPlayer.remove();

                    /*me.currentPlayer=config.createPlayer(videoItem.find(".playerContainer").attr("id"),
                        videoItem.data("video-url"));*/

                    headLineList.append($(".headLineItem:eq(0)"));
                    //$(".headLineItem:eq(0)").remove();
                    headLineList.css("left","0");

                    //currentNumber++;
                })
            },5000);
        },
        createPlayer:function(id,src){
            var player = cyberplayer(id).setup({
                flashplayer:templateUrl+"/js/frontend/lib/baiduPlayer/player/cyberplayer.flash.swf",
                width : "100%",
                height : "100%",
                //file : "http://id-channel-1.qiniudn.com/So2IXkSxEUhw0cjsA0hCJ8o5wVs=/lkzJqbAMvEERMcJPt4OjMUddTnHt",
                file:src,
                //image : "data/backImg.jpg",
                autoStart : false,
                repeat : "always",
                volume : 100,
                controlbar : "over",
                skin:templateUrl+"/js/frontend/lib/baiduPlayer/images/skins/skin.xml",
                // ak 和 sk（只需前 16 位）参数值需要开发者进行申请
                ak:"93DSyi9sH4BQjjRtOGzA6Csp",
                sk:"T7iAt3i0BN9xzGXwO8ND2T8cUViuznVD"
            });

            return player;
        },
        createScroll:function(targetEl){
            targetEl.niceScroll({
                cursorcolor:"#9DCB3B",
                autohidemode:false,
                background:"#87878E",
                cursorborder:"none"
            });
        },
        init:function(){
            this.roll();

            //百度播放
            var posterContainer=$("#posterContainer");
            if($("#bdPlayerContainer").length!=0){
                currentPlayer=this.createPlayer("bdPlayerContainer",$("#singleVideo").data("video-url"));
                currentPlayer.onPause(function(){
                    posterContainer.removeClass("hidden");
                });
                currentPlayer.onComplete(function(){
                    posterContainer.removeClass("hidden");
                });
            }

            //播放按钮
            if(posterContainer.length!=0){
                posterContainer.click(function(){
                    if(currentPlayer!=null){
                        currentPlayer.play();
                    }else{
                        //flash视频
                    }
                    posterContainer.addClass("hidden");
                });
            }

            //显示推荐子菜单
            $("#headLineLinkTitle").click(function(){
                $("#headLineLinks").toggle();
            });

            //新闻、项目资源分类滚动条
            if($("#itemList").length!=0){
                this.createScroll($("#itemList"))
            }
            if($("#singleContent").length!=0){
                this.createScroll($("#singleContent"))
            }
        }
    }
})();
$(document).ready(function(){
    main.init();
});