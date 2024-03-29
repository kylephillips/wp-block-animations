<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitece8aee0278d81ad39264f7039b4e389
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'BlockAnimations\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'BlockAnimations\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitece8aee0278d81ad39264f7039b4e389::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitece8aee0278d81ad39264f7039b4e389::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitece8aee0278d81ad39264f7039b4e389::$classMap;

        }, null, ClassLoader::class);
    }
}
