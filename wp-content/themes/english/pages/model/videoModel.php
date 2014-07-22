<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ty
 * Date: 14-6-25
 * Time: 下午2:33
 * To change this template use File | Settings | File Templates.
 */

class videoModel {
    private $id;
    private $name;
    private $key_name;
    private $url;
    private $type;

    public  function __construct($name,$key_name,$url,$type){
        $this->name=$name;
        $this->key_name=$key_name;
        $this->url=$url;
        $this->type=$type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $key_name
     */
    public function setKeyName($key_name)
    {
        $this->key_name = $key_name;
    }

    /**
     * @return mixed
     */
    public function getKeyName()
    {
        return $this->key_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }


}