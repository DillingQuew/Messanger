<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2f85ab84b65a2e413d711ada25623ac1
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
        'C' => 
        array (
            'Chat\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Chat\\' => 
        array (
            0 => __DIR__ . '/../..' . '/socket/chat',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2f85ab84b65a2e413d711ada25623ac1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2f85ab84b65a2e413d711ada25623ac1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2f85ab84b65a2e413d711ada25623ac1::$classMap;

        }, null, ClassLoader::class);
    }
}
