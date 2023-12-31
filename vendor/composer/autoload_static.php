<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0e25625edfbc99f5d80141cdafc8c74
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/scripts',
            1 => __DIR__ . '/../..' . '/scripts/system',
            2 => __DIR__ . '/../..' . '/scripts/db',
            3 => __DIR__ . '/../..' . '/scripts/repositories',
            4 => __DIR__ . '/../..' . '/scripts/common',
            5 => __DIR__ . '/../..' . '/scripts/routes',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite0e25625edfbc99f5d80141cdafc8c74::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite0e25625edfbc99f5d80141cdafc8c74::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite0e25625edfbc99f5d80141cdafc8c74::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite0e25625edfbc99f5d80141cdafc8c74::$classMap;

        }, null, ClassLoader::class);
    }
}
