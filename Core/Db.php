<?php
/**
 * Created by PhpStorm.
 * User: zhaoye
 * Date: 16/7/16
 * Time: 下午2:52
 */


namespace ZPHP\Core;

use ZPHP\Coroutine\Memcached\MemcachedAsynPool;
use ZPHP\Coroutine\Mongo\MongoAsynPool;
use ZPHP\Coroutine\Redis\RedisAsynPool;
use ZPHP\Coroutine\Task\TaskAsynPool;
use ZPHP\Memcached\Memcached;
use ZPHP\Model\Model;
use ZPHP\Coroutine\Mysql\MysqlAsynPool;
use ZPHP\Mongo\Mongo;
use ZPHP\Redis\Redis;
use ZPHP\Task\Task;

class Db {
    /**
     * @var MysqlAsynPool
     */
    public $mysqlPool;

    /**
     * @var RedisAsynPool
     */
    public $redisPool;


    /**
     * @var MongoAsynPool
     */
    public $mongoPool;
    /**
     * @var MemcachedAsynPool
     */
    public $memcachedPool;
    /**
     * @var RedisAsynPool
     */
    public $sessionRedisPool;

    /**
     * @var TaskAsynPool $taskPool
     */
    public $taskPool;

    private static $server;
    private static $instance=null;
    private static $db;
    private static $_tables;
    private static $_redis;
    private static $_mongo;
    private static $_memcached;
    private static $_sessionRedis;
    private static $_task;
    private static $_collection;
    private static $lastSql;
    private static $workId;
    private static $_swooleModule;

    private function __construct(){
    }

    /**
     * @return Db
     */
    public static function getInstance(){

        return new Db();
    }

    public static function getServer(){
        return self::$server;
    }

    /**
     * @return workId
     */
    public static function getWorkId(){
        return self::$workId;
    }


    /**
     * DB类初始化
     * @param $server
     * @param $workerId
     * @throws \Exception
     */
    static public function init($server, $workerId){

    }

    /**
     * @param $config
     */
    public static function initSwooleModule($config){

    }

    /**
     * @param $name
     * @return mixed
     */
    public static function getSwooleModule($name){
        return self::$_swooleModule[$name];
    }


    /**
     * @param $workId
     * 初始化mysql连接池
     */
    public static function initMysqlPool($workId, $config){

    }

    /**
     * @param $workId
     */
    public static function initRedisPool($workId, $config){

    }


    /**
     * 初始化
     * @param $workId
     * @throws \Exception
     */
    public static function initSessionRedisPool($workId, $config){

    }


    /**
     * init mongoPool
     * @param $workId
     */
    public static function initMongoPool($workId, $server, $config){

    }

    /**
     * 初始化memcached连接池
     * @param $workId
     * @param $server
     * @param $config
     */
    public static function initMemcachedPool($workId, $server, $config){

    }

    /**
     * 普通task连接池
     * @param $workId
     * @param $server
     * @param $config
     */
    public static function initTaskPool($workId, $server, $config){

    }


    /**
     * @param string $tableName
     * @param string $db_key
     * @return Model
     */
    public static function table($tableName=''){
        return new Model($tableName, self::$instance->mysqlPool);

    }


    /**
     * @param $collection
     * @return Mongo
     */
    public static function collection($collection=''){
         return new Mongo($collection,self::$instance->mongoPool);
    }



    /**
     * @return Redis
     */
    public static function redis(){
        return new Redis(self::$instance->redisPool);
    }


    public static function memcached(){
        return new Memcached(self::$instance->memcachedPool);
    }

    public static function task(){
        return new Task(self::$instance->taskPool);
    }

    /**
     * 用于session的redis连接池
     * @return Redis
     */
    public static function sessionRedis(){
        return new Redis(self::$instance->sessionRedisPool);
    }


    /**
     * 释放mysql连接池
     */
    public static function freeMysqlPool(){
    }

    /**
     * free redis pool
     */
    public static function freeRedisPool(){

    }

    /**
     * pdo 查询获取pdo(同步)
     * @param string $db_key
     * @return mixed
     * @throws \Exception
     */
    public function getDb($db_key= 'master'){

        return new \PDO($config['dsn'], $config['user'], $config['password']);
    }

    public static function setSql($sql){
        
    }

    public static function getLastSql(){
        return self::$lastSql;
    }




}