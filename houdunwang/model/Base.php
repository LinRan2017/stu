<?php

// 命名空间的名字要和文件所在的目录的路径一样，防止多个类名重复
namespace houdunwang\model;
//私有全局的PDO类，链接数据库
use PDO;
//使用全局PDOException类，捕捉异常错误
use PDOException;
//创建一个类，操作数据库
class Base{
    //定义一个私有的静态属性，存储数据库的数据，先赋值null
    private static $pdo=NULL;
    //定义存储表名的属性
    private $table;
    //定义存储条件的属性
    private $where;
    //只要一实例化对象就会触发此方法
    public function __construct($table){
        //把传入的表名赋值给当前对象的表名，这样就可以操作这张表里面的数据
        $this->table=$table;
        //调用对象里面的链接数据库的方法
        $this->connect();
    }
    //创建一个私有的方法，链接数据库
    private function connect(){
        //第一次调用静态属性$pdo,$pdo为null，就链接数据库，因为$pdo是静态属性，在一次刷新以内可以存储值
        //,所以第二次，三次……调用此方法时，$pdo已经有了值，就不需要再连接数据库了
        if(is_null(self::$pdo)){
                //创建一个变量，调用c函数获得数据库的主机名;数据库名,以后要链接别的数据库名，就直接更改数据库的配置文件
                $dsn='mysql:host='.c('database.db_host').';dbname='.c('database.db_name');
                //使用PDO链接数据库，如果有异常错误，就会被catch捕捉到，调用c函数获取数据库用户名，数据库密码
                $pdo=new PDO($dsn,c('database.db_user'),c('database.db_password'));
                //设置错误属性为异常错误，因为要被catch捕捉到
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //设置数据库的编码，调用c函数获取数据库的编码
                $pdo->exec('SET NAMES ' .c('database.db_charset'));
                //把POD对象放入到静态属性$pdo中
                self::$pdo=$pdo;
                //捕捉异常错误
        }
    }

    //创建一个公共的方法，获得数据库里的数据
    public function get(){
        //如果有条件
        if(is_null($this->where)){
            //就表里的查询符合条件的所有数据
            $sql='SELECT * FROM '.$this->table;
            //没有条件
        }else{
            //就查询表里的所有数据
            $sql="SELECT * FROM {$this->table} WHERE {$this->where}";
        }

        //执行$sql操作
        //query执行有结果集的操作
        //调用PDO对象里的query的方法并且赋值给变量$result
        $result=self::$pdo->query($sql);
        //获得数据库中的数据，并且是关联数组。赋值给$data变量
        $data=$result->fetchAll(PDO::FETCH_ASSOC);
        //有一句    了看`见了看见快快结核杆菌国家机关就fgg个人个人通过通过格格不入个个人g
        //
        //个好                                               返回数据库里的数据
        return $data;
    }

    //创建获得一条数据的方法
    public function find($id){
        //调用当前对象里面的getPireKey方法，获得表里的主键
        $pireKey=$this->getPireKey();
        //查询需要主键所对应这一条数据
        $sql="SELECT * FROM {$this->table} WHERE {$pireKey}={$id}";
        //执行有结果集的方法
        $data=self::q($sql);
        //获得数组的键值，把二维数组变为一维数组
        //array(['title'=>'是的'],['click'=>'234'])
        //转为['title'=>'是的'],['click'=>'234']
        return current($data);
    }

    //创建一个保存添加数据的方法，传递提交的数据
    public function save($post){
        //获得表信息
        $tableInfo=$this->q("DESC {$this->table}");
        //定义一个存储表字段的数组，先赋值为空数组
        $tableFields=[];
        //p($tableInfo);exit;
        //循环表信息
        foreach ($tableInfo as $v){
            //把表字段追加到表字段数组里
            $tableFields[]=$v['Field'];
        }
        //定义存储过滤后提交数据的数组，先赋值为空数组
        $filterData=[];
        //循环用户提交的数据
        foreach ($post as $f=>$v){
            //如果提交数组的键名在字段数组中
            if(in_array($f,$tableFields)){
                //就添加到过滤后的数组
                $filterData[$f]=$v;
            }
        }
        //insert into arc (title,click) values ('上大学','346');
        //获得过滤后的数据数组的键名，也就是表里的字段
        $field=array_keys($filterData);
        //组合字符串,比如“title,click”
        $field=implode($field,',');
        //获得过滤后的数据数组的键值，也就是提交的数据
        $values=array_values($filterData);
        //因为提交的数据是数组,需要组合成字符串，所以要把数组组合为字符串
        //比如['在人间','400']变为字符串’"在人间","400"‘
        $values = '"' . implode('","',$values)  . '"';
        //把提交的数据存入到数据库里
        $sql = "INSERT INTO {$this->table} ({$field}) VALUES ({$values})";
        //返回无结果的操作
        return $this->e($sql);
    }
    //创建更新数据的公共方法，传递提交的参数
    public function update($post){
        //如果没有条件，就提示，并且终止程序
        if(!$this->where){
            exit('update必须有where条件');
        }
        //查询表的结构，执行有结果集的操作
        $tableInfo=$this->q("DESC {$this->table}");
        //定义一个存储字段的数组，先赋值为空
        $tableFields=[];
        //循环表结构里面的信息
        foreach ($tableInfo as $v){
            //依次把表结构里面的字段名存储到字段数组里
            $tableFields[]=$v['Field'];
        }
        //定义一个存储提交数据的字段名的数组，先赋值为空
        $filterData=[];
        //循环提交数据的数组
        foreach ($post as $f=>$v){
            //如果提交数据的字段在表结构字段数组里
            if(in_array($f,$tableFields)){
                //就把提交的数据依次添加到提交数据字段名的数组里
                $filterData[$f]=$v;
            }
        }
        //array(['title'=>'在人间'],['click'=>'345'])
        //定义一个更新数据库数据的字符串
        //update arc set title='在人间',click='345' where aid=5;
        $set='';
        //循环提交数据的字段
        foreach ($filterData as $field=>$values){
            //组合字符串 ，title='在人间',click='345',
            $set.="{$field}='{$values}',";
        }
        //去除字符串后面最后一个’,‘，就得到这样的字符串“title='在人间',click='345'”
        $set=rtrim($set,',');
        //组合字符串，调用当前对象的where方法，作为条件，更新数据库里面的数据
        //update arc set title='在人间',click='345' where aid=5;
        $sql = "UPDATE {$this->table} SET {$set} WHERE {$this->where}";
        //返回无结果集的操作
        return $this->e($sql);
    }

    //创建一个销毁数据的公共方法
    public function destory(){
        //如果没有条件就提示，并且终止后面的代码
        if(!$this->where){
            exit("destory必须要where条件");
        }
        //删除数据库里用户所指定的数据
        $sql="DELETE FROM {$this->table} WHERE {$this->where}";
        //返回无结果集的操作
        return $this->e($sql);
    }

    //创建一个执行条件的公共方法
    public function where($where){
        //把传递的条件变量赋值给当前对象的存储条件的属性
        $this->where=$where;
        //返回当前对象，因为后面的链式操作，第一个一定需要返回当前对象
        return $this;
    }

    //创建获得主键的私有方法
    private function getPireKey(){
//        $sql='DESC'.$this->table;
        //获得表结构
        $sql = "DESC {$this->table}";
        //执行有结果集的操作，把获得表结构的数组，赋值给变量
      $data=self::q($sql);
//        p($data);
        //定义一个变量，存储主键
        $primaryKey='';
        //循环表结构数组
        foreach ($data as $v){
            //如果表结构里面的’key‘是主键
            if($v['Key']=='PRI'){
                //就把这个字段的字段名赋值给主键变量
                $primaryKey=$v['Field'];
                //就跳出循环
                break;
            }
        }
        //返回主键变量
        return $primaryKey;
    }
    //创建公共方法，执行有结果集的操作
    public function q($sql){

            //调用静态属性中执行有结果集的方法，并且赋值给变量
            $result=self::$pdo->query($sql);
            //获得数据，而且是关联数组，赋值给变量
            $data=$result->fetchAll(PDO::FETCH_ASSOC);
           // p($data);exit;
            //返回数据库中的数据
            return $data;
            //如果有PDO异常错误，就会被捕捉，$e是异常对象

    }

    //创建公共方法，执行没有结果集的操作
    public function e($sql){
            //调用静态属性中执行无结果集的方法，并且赋值给变量
            $afRows=self::$pdo->exec($sql);
            //返回结果
            return $afRows;
            //如果有PDO异常错误，就会被捕捉，$e是异常对象

    }
}
?>