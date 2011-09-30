<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'My Web Application',
    'defaultController'=>'post',
    'language'=>'zh_cn',
    'theme'=>'classic',
    
    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
    ),
    
    // application components
    'components'=>array(
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
            ),
        ),
        'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'/opt/local/bin'),
        ),
        'email'=>array(
            'class'=>'application.extensions.email.Email',
            'delivery'=>'php',
        ),
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            // force 401 HTTP error if authentication needed
            'loginUrl'=>null,
        ),
        'db'=>array(
            'connectionString'=>'mysql:host=localhost;dbname=blog',
            'username'=>'root',
            'password'=>'casacasa',
            'charset'=>'UTF8',
        ),
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>require(dirname(__FILE__).'/urlrules.php')
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>require(dirname(__FILE__).'/params.php'),
);
