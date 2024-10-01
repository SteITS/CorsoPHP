<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5d52aa3d494e4554baa44a9afa8b1360
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Yt\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Yt\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5d52aa3d494e4554baa44a9afa8b1360::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5d52aa3d494e4554baa44a9afa8b1360::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5d52aa3d494e4554baa44a9afa8b1360::$classMap;

        }, null, ClassLoader::class);
    }
}