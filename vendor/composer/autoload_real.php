<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit77a964b57bdb0d0d804efbdaa6058c4a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit77a964b57bdb0d0d804efbdaa6058c4a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit77a964b57bdb0d0d804efbdaa6058c4a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit77a964b57bdb0d0d804efbdaa6058c4a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}