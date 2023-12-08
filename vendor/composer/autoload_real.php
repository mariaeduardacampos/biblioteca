<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite2a931ed7ed1cbbc00769242d0d61f4c
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

        spl_autoload_register(array('ComposerAutoloaderInite2a931ed7ed1cbbc00769242d0d61f4c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite2a931ed7ed1cbbc00769242d0d61f4c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite2a931ed7ed1cbbc00769242d0d61f4c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}