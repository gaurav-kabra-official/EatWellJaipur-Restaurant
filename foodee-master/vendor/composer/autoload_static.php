<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit42a9ba7aaadadc4852d75bcb68c562a2
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit42a9ba7aaadadc4852d75bcb68c562a2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit42a9ba7aaadadc4852d75bcb68c562a2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
