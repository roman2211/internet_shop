<?php


namespace simpleengine\core;

trait Singleton {
    static private $instance = null;

    private function __construct() { }  // Защищаем от создания через new Singleton
    private function __clone() { }  // Защищаем от создания через клонирование
    private function __wakeup() { }  // Защищаем от создания через unserialize

    /**
     * @return self
     */
    static public function instance() {
        return
            self::$instance===null
                ? self::$instance = new static()//new self()
                : self::$instance;
    }
}