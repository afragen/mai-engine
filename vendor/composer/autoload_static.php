<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb109c82834b5632899cf4c449109f709
{
    public static $files = array (
        '689b08b7620712b04324ecd7ed167c6b' => __DIR__ . '/..' . '/yahnis-elsts/plugin-update-checker/load-v4p10.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'ProteusThemes\\WPContentImporter2\\' => 33,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ProteusThemes\\WPContentImporter2\\' => 
        array (
            0 => __DIR__ . '/..' . '/proteusthemes/wp-content-importer-v2/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb109c82834b5632899cf4c449109f709::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb109c82834b5632899cf4c449109f709::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
