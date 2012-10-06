<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Travel Console',
    // application components
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'components' => array(
        'db' => require_once('db.php'),
    // uncomment the following to use a MySQL database
    /*
      'db'=>array(
      'connectionString' => 'mysql:host=localhost;dbname=testdrive',
      'emulatePrepare' => true,
      'username' => 'root',
      'password' => '',
      'charset' => 'utf8',
      ),
     */
    ),
);