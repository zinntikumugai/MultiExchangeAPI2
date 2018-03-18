<?php
namespace MEAPI2;
class AutoLoader {
    
    public static function ClassLoader($class) {
        $dirs = [
            'Module',
            'Model'
        ];

        $class = explode('\\', $class);
        array_shift($class);
        $class = implode('\\', $class);
        
        $file = __DIR__ .'/' .$class .'.php';
        if(is_file($file)) {
            require_once $file;
            return true;
        }
   
    }
}
spl_autoload_register(['MEAPI2\\AutoLoader', 'ClassLoader']);