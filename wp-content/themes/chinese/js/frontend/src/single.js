/**
 * Created with JetBrains PhpStorm.
 * User: ty
 * Date: 14-7-1
 * Time: 上午9:54
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function(){
    var currentPlayer=config.createPlayer("playerContainer",$("#singleVideo").data("video-url"));
    currentPlayer.onPause(function(){
        $("#posterContainer").removeClass("hidden");
    });
    currentPlayer.onComplete(function(){
        $("#posterContainer").removeClass("hidden");
    });

    $("#videoPlayIcon").click(function(){
         currentPlayer.play();
         $("#posterContainer").addClass("hidden");
    });
});