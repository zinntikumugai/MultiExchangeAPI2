<?php

namespace MEAPI2;
use \MEAPI2\Model;
class MEAPI2 {
    private $models = null;

    public function __construct() {
        $this->models = [];
        self::ModuleLoad();
        self::ModelLoad();

    }

    private function ModuleLoad() {
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator( __DIR__ .'/Module/'));

        foreach( $it as $fileinfo) {
            if($fileinfo->isFile()) {
                require_once $fileinfo->getPathname();
            }
        }
    }

    private function ModelLoad() {
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator( __DIR__ .'/Model/'));
        
        foreach( $it as $fileinfo) {
            if($fileinfo->isFile()) {
                require_once $fileinfo->getPathname();

                var_dump(get_declared_classes());
                $file = rtrim($fileinfo->getFilename(), '.' .$fileinfo->getExtension());
                //$c = new \MEAPI2\Model\$file();
                var_dump($file, $c);

            }
        }
    }

}