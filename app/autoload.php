<?php

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'                          => __DIR__.'/../vendor/symfony/src',
    'Cordova'                          => __DIR__.'/../src',
    'FOS'                              => __DIR__.'/../vendor/bundles',
    //'Knplabs'                          => __DIR__.'/../src',
    //'Sonata'                           => __DIR__.'/../src',
    'Doctrine\\Common'                 => __DIR__.'/../vendor/doctrine-common/lib',
    'Doctrine\\Common\\DataFixtures'   => __DIR__.'/../vendor/doctrine-data-fixtures/lib',
    'Doctrine\\DBAL\\Migrations'       => __DIR__.'/../vendor/doctrine-migrations/lib',
    'Doctrine\\DBAL'                   => __DIR__.'/../vendor/doctrine-dbal/lib',
    'Doctrine'                         => __DIR__.'/../vendor/doctrine/lib',
    'Assetic'                          => __DIR__.'/../vendor/assetic/src',
    'Monolog'         		       => __DIR__.'/../vendor/monolog/src',
    // there was a zend line here got removed
));
$loader->registerPrefixes(array(
    'Twig_Extensions_'   => __DIR__.'/../vendor/twig-extensions/lib',
    'Twig_'              => __DIR__.'/../vendor/twig/lib',
    'Swift_'             => __DIR__.'/../vendor/swiftmailer/lib/classes',
));
$loader->register();
