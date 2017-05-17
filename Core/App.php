<?php
/**
 * Created by PhpStorm.
 * User: zhaoye
 * Date: 2016/11/28
 * Time: 下午2:03
 */


namespace ZPHP\Core;

use ZPHP\Common\Dir;
use ZPHP\ZPHP;

abstract class App{
    static protected $compenontType = ['controller','service','model','middleware'];
    /**
     * @var DI $_id;
     */
    static protected $_di;


    /**
     * 初始化App的容器服务
     */
    static public function init($di)
    {

    }


    /**
     * 默认的初始化
     * @param $type
     * @throws \Exception
     */
    static public function initDefaultList($type, &$allList){

    }

    /**
     * 配置文件的服务初始化
     * @param $type
     * @throws \Exception
     */
    static public function initConfigList($type, &$allList){

    }


    /**
     * 获取容器组件
     * @param $name - service、model、controller
     * @param $arguments
     * @return mixed
     * @throws \Exception
     */
    static public function __callStatic($name, $arguments)
    {

    }


    static protected function getComponentName($name){
        return $name;
    }

    /**
     * get相关的依赖class
     * @param $name
     * @param $type
     */
    static public function get($name, $type, $argu=[]){

        return $class;
    }


    static public function service( $ClassName = "App#Service" ){
        return $obj;
    }
    static public function model( $ClassName  = "App#model" ){
        return $obj;
    }


}