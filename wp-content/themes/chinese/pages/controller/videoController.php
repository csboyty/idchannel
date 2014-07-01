<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ty
 * Date: 14-6-25
 * Time: 下午2:33
 * To change this template use File | Settings | File Templates.
 */

include("qiNiu.php");
class videoController {
    private $videoTable="wp_videos";
    private $perLoad=10;


    /**
     * 获取视频管理列表
     * @param $offset
     * @return mixed
     */
    public function getVideos($offset){
        global $wpdb;
        $query="SELECT id, name,m3u8Url,url,type,status FROM $this->videoTable ORDER BY id DESC LIMIT $this->perLoad OFFSET $offset";
        return $wpdb->get_results($query,OBJECT);
    }

    public function deleteVideo($videoId){
        global $wpdb;
        return $wpdb->delete($this->videoTable,array("id"=>$videoId));
    }

    /**
     * 获取视频总数
     * @return mixed
     */
    public function getVideosCount(){
        global $wpdb;
        $query="SELECT COUNT(*) FROM $this->videoTable";
        return $wpdb->get_var($query);
    }

    /**
     * 添加视频
     */
    public function addVideo(){
        global $wpdb;
        $qiNiu=new qiNiu();

        //return false when error
        $result=$wpdb->insert($this->videoTable,array(
            "name"=>$_POST["name"],
            "key_name"=>$_POST["key_name"],
            "url"=>$_POST["url"],
            "m3u8Url"=>isset($_POST["m3u8Url"])?isset($_POST["m3u8Url"]):"",
            "type"=>$_POST["type"],
            "status"=>$_POST["status"]
        ),array("%s","%s","%s","%s","%d","%d"));

        if(!$result){
            die(json_encode(array("success"=>false)));
        }else{
            if($_POST["type"]==1){
                $result=$qiNiu->sendHttpThree($_POST["key_name"]);
                if($result&&$wpdb->update($this->videoTable,array("m3u8Url"=>$result),array("id"=>$wpdb->insert_id))!==false){

                    die(json_encode(array("success"=>true)));
                }else{
                    die(json_encode(array("success"=>false)));
                }
            }else{
                die(json_encode(array("success"=>true)));
            }
        }

    }

    /**
     *添加自定义表格
     */
    public function addTable(){
        global $wpdb,$jal_db_version;

        $jal_db_version="1.0";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        //判断是否存在表格，如果不存在创建表格
        if($wpdb->get_var("SHOW TABLES LIKE '$this->videoTable'")!=$this->videoTable){
            $sql="CREATE TABLE ".$this->videoTable." (
              id bigint(20) NOT NULL AUTO_INCREMENT,
              name varchar(64) NOT NULL,
              key_name char(128) NOT NULL,
              url varchar(256) NOT NULL,
              m3u8Url varchar(256),
              type smallint(2) NOT NULL,
              status smallint(2) NOT NULL,
              PRIMARY KEY (id)
            ) DEFAULT CHARSET=utf8;";
            //type 1:video 2:flash
            //status 状态码，0（成功），1（等待处理），2（正在处理流媒体），3（处理流媒体失败），4（通知提交失败）。
            dbDelta( $sql );

            add_option( "jal_db_version", $jal_db_version );
        }
    }

    public function createUploadToken(){
        $qiNiu=new qiNiu();
        die(json_encode($qiNiu->createUploadToken()));
    }

    /**
     *触发切片后，七牛的回调地址处理函数
     */
    public function receiveM3u8Url(){
        global $wpdb;
        $qiNiu=new qiNiu();
        $key=$_REQUEST["key"];
        $persistentId=$_REQUEST["id"];
        $code=$_REQUEST["code"];

        $m3u8Url=$qiNiu->bucket.".".$qiNiu->qiNiuDomain."/".$key;

        if($code==0){
            //成功
            $wpdb->update($this->videoTable,array("m3u8Url"=>$m3u8Url,"status"=>$code),array("m3u8Url"=>$persistentId));
        }else{
            $wpdb->update($this->videoTable,array("status"=>$code),array("m3u8Url"=>$persistentId));
        }
    }
}