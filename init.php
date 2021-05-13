<?php

spl_autoload_register(function ($class) {
        $classFile = $class.'.php';

        if(file_exists($classFile) and !class_exists($class))
            require_once $classFile;
    }
);
