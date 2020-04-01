<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d240b4a74c8ae3c90448d2bb2deca7c
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Code\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Code\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d240b4a74c8ae3c90448d2bb2deca7c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d240b4a74c8ae3c90448d2bb2deca7c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}