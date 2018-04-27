<?php

namespace Bot;

class Di {
    
    protected static $_instance;
    
    private function __construct() {}
    private function __clone() {}
    
    private static $_bindings = [];
    private static $_callbacks = [];
    
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public static function get($name)
    {
        if (isset(self::$_callbacks[$name])) {
            return self::$_callbacks[$name];
        }
        // Closure
        $obj = self::new($name);
        self::$_callbacks[$name] = $obj;
        return $obj;
    }
    
    public static function new($name)
    {
        $callback = self::$_bindings[$name];
        $obj = call_user_func($callback);
        return $obj;
    }
    
    public static function has($name)
    {
        return isset(self::$_bindings[$name]) or isset(self::$_callbacks[$name]);
    }
    
    public static function remove($name)
    {
        unset(self::$_bindings[$name], self::$_callbacks[$name]);
    }
    
    public static function set($name, $callback)
    {
        if(self::has($name)) self::remove($name);
        if($callback instanceof \Closure) {
            self::$_bindings[$name] = $callback;
        } else {
            self::$_callbacks[$name] = $callback;
        }
    }
    
}