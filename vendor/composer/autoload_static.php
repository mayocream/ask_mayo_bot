<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4b9fa5059f5e1f52c754826f1d621962
{
    public static $files = array (
        '547f39254e5312c66b30c9b6a7d3570f' => __DIR__ . '/..' . '/eleirbag89/telegrambotphp/Telegram.php',
        '221a7c0887f892e44dd08191321d3815' => __DIR__ . '/..' . '/eleirbag89/telegrambotphp/TelegramErrorLogger.php',
    );

    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'phpFastCache\\' => 13,
        ),
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Cache\\' => 10,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
        'B' => 
        array (
            'Bot\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'phpFastCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpfastcache/phpfastcache/src/phpFastCache',
        ),
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'Bot\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4b9fa5059f5e1f52c754826f1d621962::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4b9fa5059f5e1f52c754826f1d621962::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
