<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitefbd7cb8bb7c4f9c3abaae3f6d4a1f5b
{
    public static $prefixesPsr0 = array (
        'E' => 
        array (
            'Endroid' => 
            array (
                0 => __DIR__ . '/..' . '/endroid/qr-code/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitefbd7cb8bb7c4f9c3abaae3f6d4a1f5b::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}