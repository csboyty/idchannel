<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ty
 * Date: 14-6-26
 * Time: 下午4:16
 * To change this template use File | Settings | File Templates.
 */

class qiNiu {
    public $bucket = 'id-channel-1';
    public $accessKey = 'Q-DeiayZfPqA0WDSOGSf-ekk345VrzuZa_6oBrX_';
    public $secretKey = 'fIiGiRr3pFmHOmBDR2Md1hTCqpMMBcE_gvZYMzwD';

    public $qiNiuDn="qiniudn.com";
    public $qiNiuApiHost="api.qiniu.com";
    public $qiNiuHandlerUrl="http://api.qiniu.com/pfop/";
    public $qiNiuHandlerPath="/pfop/";

    public function URLSafeBase64Encode($str) // URLSafeBase64Encode
    {
        $find = array('+', '/');
        $replace = array('-', '_');
        return str_replace($find, $replace, base64_encode($str));
    }

    public function URLSafeBase64Decode($str)
    {
        $find = array('-', '_');
        $replace = array('+', '/');
        return base64_decode(str_replace($find, $replace, $str));
    }

    public function createAccessToken($key){
        $urlEncodeBucket=urlencode($this->bucket);
        $keyEncodeKey=urlencode($key);
        $time=time();
        $rand=rand(1,100);
        $saveName=$time."-".$rand;
        $encodeSaveAs=$this->URLSafeBase64Encode($this->bucket.":".$saveName.".m3u8");
        //$fPos=urlencode("avthumb/m3u8/segtime/10/preset/video_640k|saveas/$encodeSaveAs");
        $fPos=urlencode("avthumb/m3u8/segtime/10/ab/128k/ar/44100/acodec/libfaac/r/30/vb/1000k/
        vcodec/libx264/stripmeta/0|saveas/$encodeSaveAs");
        $callBackUrl=urlencode(admin_url("admin-ajax.php?action=receiveM3u8Url"));

        $query="?bucket=".$urlEncodeBucket."&key=".$keyEncodeKey."&fops=".$fPos."&notifyURL=".$callBackUrl;

        $signingStr=$this->qiNiuHandlerPath.$query."\n";

        //$sign=mhash(MHASH_SHA1,$signingStr, $this->secretKey);
        $sign=hash_hmac('sha1', $signingStr, $this->secretKey, true);

        $encodedSign=$this->URLSafeBase64Encode($sign);

        $accessToken = $this->accessKey.":".$encodedSign;

        $createM3u8Url=$this->qiNiuHandlerUrl.$query;

        return array("accessToken"=>$accessToken,"createM3u8Url"=>$createM3u8Url);
    }

    /**
     * 创建uploadToken时需要返回的值
     * @return mixed|string|void
     */
    public function createReturnBody(){
        $returnBody=array("scope"=>$this->bucket,"deadline"=>24*60*60+time());

        return json_encode($returnBody);
    }

    public function createUploadToken(){

        $encodedPutPolicy = $this->URLSafeBase64Encode($this->createReturnBody());

        //hmac_sha1这个函数没有，用其他函数实现
        //$sign=mhash(MHASH_SHA1,$encodedPutPolicy, $this->secretKey);
        $sign=hash_hmac('sha1', $encodedPutPolicy, $this->secretKey, true);

        $encodedSign =$this->URLSafeBase64Encode($sign);

        $uploadToken=$this->accessKey.":".$encodedSign.":".$encodedPutPolicy;

        return array("uptoken"=>$uploadToken);
    }

    public function sendHttp($param){
        $response = wp_remote_post( $param["createM3u8Url"], array(
                'timeout' => 30,
                'redirection' => 5,
                'httpversion' => '1.1',
                'blocking' => true,
                'headers' => array("Host"=>$this->qiNiuApiHost,
                    "Authorization"=>"QBox ".$param["accessToken"],
                    "Content-Type"=>"application/x-www-form-urlencoded"),
                'body' => array(),
                'cookies' => array()
            )
        );

        //获取结果
        //$response_code = wp_remote_retrieve_response_code( $response );
        //$response_message = wp_remote_retrieve_response_message( $response );
        $response_body=wp_remote_retrieve_body($response);

        //error_log(date("[Y-m-d H:i:s]").$response_body,3,get_template_directory()."/log.log");

        return $response_body;
    }

    public function sendHttpThree($key){
        $param=$this->createAccessToken($key);

        //return $this->sendHttp($param);
        for($i=0;$i<3;$i++){
            $returnString=$this->sendHttp($param);
            if(strpos($returnString,"persistentId")){
                $return=json_decode($returnString);

                return $return->persistentId;
            }
        }

        return false;
    }
}
