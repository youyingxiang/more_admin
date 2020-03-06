<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2020/3/6
 * Time: 8:45 AM
 */
interface Log {
    public function wirteLog();
}
// 文件
class File implements Log {
    public function wirteLog() {
        // TODO: Implement wirteLog() method.
        echo "文件写入日志";
    }
}
// redis
class Redis1 implements Log {
    public function wirteLog() {
        // TODO: Implement wirteLog() method.
        echo "redis写入日志";
    }
}

//class User {
//    public $log;
//
//    public function __construct(Log $log) {
//        $this->log = $log;
//    }
//    public function login()
//    {
//        $this->log->wirteLog();
//    }
//}
//// 这样想用任何方式记录操作日志都不需要去修改 User 类了，
//// 只需要通过构造函数参数传递就可以实现，其实这就是 “控制反转”。
//// 不需要自己内容修改，改成由外部传递。这种由外部负责其依赖需求的行为，我们可以称其为 “控制反转
//$user = new User(new File());
//$user->login();


// 依赖注入的原理
class UserTest {
    public $log;

    public function __construct(File $log) {
        $this->log = $log;
    }
    public function login()
    {
        $this->log->wirteLog();
    }
}

function make($concrete) {
    $reflector = new ReflectionClass($concrete);
    $constructor = $reflector->getConstructor();
    if(is_null($constructor)) {
        return $reflector->newInstance();
    }else {
        // 构造函数依赖的参数
        $dependencies = $constructor->getParameters();
        // 根据参数返回实例，如FileLog
        $instances = getDependencies($dependencies);
        return $reflector->newInstanceArgs($instances);
    }

}
function getDependencies($paramters) {
    $dependencies = [];
    foreach ($paramters as $paramter) {
        $dependencies[] = make($paramter->getClass()->name);
    }
    return $dependencies;
}


$user  = make('UserTest');
print_r($user->login());exit;
