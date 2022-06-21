<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit74b6f1b14087568cc7938b240d9804f3
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit74b6f1b14087568cc7938b240d9804f3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit74b6f1b14087568cc7938b240d9804f3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit74b6f1b14087568cc7938b240d9804f3::$classMap;

        }, null, ClassLoader::class);
    }
}
