<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitff0232f5d698a12f921ce90e0b64e80b
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Houdunwang\\Wechat\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Houdunwang\\Wechat\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitff0232f5d698a12f921ce90e0b64e80b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitff0232f5d698a12f921ce90e0b64e80b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitff0232f5d698a12f921ce90e0b64e80b::$classMap;

        }, null, ClassLoader::class);
    }
}