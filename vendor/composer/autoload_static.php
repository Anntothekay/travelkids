<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc8e380a5f148982e5684ec6c27475993
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Debug\\' => 24,
            'Symfony\\Component\\Console\\' => 26,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'D' => 
        array (
            'Doctrine\\Instantiator\\' => 22,
            'Doctrine\\Common\\Inflector\\' => 26,
            'Doctrine\\Common\\Cache\\' => 22,
            'Doctrine\\Common\\Annotations\\' => 28,
            'Doctrine\\Common\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/debug',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Doctrine\\Instantiator\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/instantiator/src/Doctrine/Instantiator',
        ),
        'Doctrine\\Common\\Inflector\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Common/Inflector',
        ),
        'Doctrine\\Common\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/cache/lib/Doctrine/Common/Cache',
        ),
        'Doctrine\\Common\\Annotations\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/annotations/lib/Doctrine/Common/Annotations',
        ),
        'Doctrine\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/common/lib/Doctrine/Common',
        ),
    );

    public static $prefixesPsr0 = array (
        'W' => 
        array (
            'Webmasters' => 
            array (
                0 => __DIR__ . '/..' . '/webmasters/doctrine-extensions/lib',
            ),
        ),
        'V' => 
        array (
            'Validators' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
        'T' => 
        array (
            'Traits' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
        'R' => 
        array (
            'Repositories' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
        'G' => 
        array (
            'Gedmo\\' => 
            array (
                0 => __DIR__ . '/..' . '/gedmo/doctrine-extensions/lib',
            ),
        ),
        'E' => 
        array (
            'Entities' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
        'D' => 
        array (
            'Doctrine\\ORM\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/orm/lib',
            ),
            'Doctrine\\DBAL\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/dbal/lib',
            ),
            'Doctrine\\Common\\Lexer\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/lexer/lib',
            ),
            'Doctrine\\Common\\Collections\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/collections/lib',
            ),
        ),
        'C' => 
        array (
            'Controllers' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
        'B' => 
        array (
            'Behat\\Transliterator' => 
            array (
                0 => __DIR__ . '/..' . '/behat/transliterator/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc8e380a5f148982e5684ec6c27475993::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc8e380a5f148982e5684ec6c27475993::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitc8e380a5f148982e5684ec6c27475993::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
