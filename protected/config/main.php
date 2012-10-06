<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Quintessentially Travel',
    // preloading 'log' component
    'preload' => array('log'),
    'defaultController' => 'main/index',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'generatorPaths' => array('application.gii'),
            'password' => 'google',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('192.168.21.75', '::1'),
        ),
        'admin' => array(
            'defaultController' => 'press'
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'CURL' => array(
            'class' => 'ext.Curl'
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                'admin' => 'admin/default',
                
                'admin/<controller:\w+>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',
                
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'contact' => 'main/contact',
                'destinations' => 'main/destinations',
                '<page:about\-us>' => 'main/redirect',
                '<page:301\-latin\-america>' => 'main/redirect',
                '<region:\d+>-<name:[\w\-]+>' => 'main/countries',
                'be-inspired/<id:\d+>-<name:[\w\-]+>' => 'main/itinerary',
                'country/<country:\d+>-<name:[\w\-]+>' => 'main/hotels',
                'city/<city:\d+>-<name:[\w\-]+>' => 'main/hotels',
                'holiday/<id:\d+>-<name:[\w\-]+>' => 'main/holiday',
                'hotels' => 'main/hotels',
                'hotel/<id:\d+>-<name:[\w\-]+>' => 'main/hotel',
                'offers-<code:[\w\-]+>' => 'main/offers',
                '<page:offers>' => 'main/index',
                '<page:adventure-holidays>' => 'main/index',
                '<page:spa-holidays>' => 'main/index',
                '<page:press>' => 'main/index',
                '<page:contact>' => 'main/index',
                '<page:team>' => 'main/index',
                '<page:holiday>' => 'main/index',
                '<page:[\w\-]+>' => 'main/index',
            //'<page:[\w\-]+>' => 'main/index',
            ),
            'showScriptName' => false
        ),
        /**
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
          // uncomment the following to use a MySQL database
         */
        'db' => require_once('db.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'main/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'info@quintessentiallytravel.com',
        'thumbSize' => array('312'),
        'list' => array(
            'AS' => array('id' => 502,'name' => 'Q Travel - Asia Pacific'),
            'EU' => array('id' => 462,'name' => 'Q Travel - Europe'),
            'IN' => array('id' => 482,'name' => 'Q Travel - India'),
            'ME' => array('id' => 472,'name' => 'Q Travel - Middle East & Africa'),
            'NA' => array('id' => 512,'name' => 'Q Travel - The Americas')
        )
    ),
);