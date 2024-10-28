<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite6e2d94e159c23b66bfc1f566ef54b99
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInite6e2d94e159c23b66bfc1f566ef54b99', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite6e2d94e159c23b66bfc1f566ef54b99', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite6e2d94e159c23b66bfc1f566ef54b99::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}