<?php

/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 *
 */
/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */
/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */
CakePlugin::load(array('BoostCake', 'DebugKit','ExcelReader', 'Usermgmt' => array('routes' => true, 'bootstrap' => true)));
/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 * 		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 * 		'MyCacheFilter' => array('prefix' => 'my_cache_'), //  will use MyCacheFilter class from the Routing/Filter package in your app with settings array.
 * 		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 * 		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 * 		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
    'engine' => 'File',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));
CakeLog::config('error', array(
    'engine' => 'File',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));
if (!defined('SUB_DIR')) {
    define('SUB_DIR', '/knm');
}

if (!defined('SANG_START')) {
    define('SANG_START', '07:00:00');
}
if (!defined('SANG_END')) {
    define('SANG_END', '11:00:00');
}
if (!defined('CHIEU_START')) {
    define('CHIEU_START', '13:00:00');
}
if (!defined('CHIEU_END')) {
    define('CHIEU_END', '17:00:00');
}
if (!defined('TOI_START')) {
    define('TOI_START', '18:30:00');
}
if (!defined('TOI_END')) {
    define('TOI_END', '21:30:00');
}

if (!defined('TOI_END')) {
    define('TOI_END', '21:30:00');
}

if (!defined('COURSE_ENROLLING')) {
    define('COURSE_ENROLLING', 1);
}

if (!defined('COURSE_OPENABLE')) {
    define('COURSE_OPENABLE', 2);
}

if (!defined('COURSE_OPEN')) {
    define('COURSE_OPEN', 3);
}

if (!defined('COURSE_WAIT_CANCEL')) {
    define('COURSE_WAIT_CANCEL', 4);
}

if (!defined('COURSE_CANCELLED')) {
    define('COURSE_CANCELLED', 5);
}

if (!defined('SI_SO_MO_LOP')) {
    define('SI_SO_MO_LOP', 15);
}
/*
  set true if you want to check permissions for admin also
 */
if (!defined("ADMIN_PERMISSIONS")) {
    define("ADMIN_PERMISSIONS", false);
}

/*
  set default group id here for registration
 */
if (!defined("DEFAULT_GROUP_ID")) {
    define("DEFAULT_GROUP_ID", 2);
}

/*
  set Admin group id here
 */
if (!defined("ADMIN_GROUP_ID")) {
    define("ADMIN_GROUP_ID", 1);
}

if (!defined("TEACHER_GROUP_ID")) {
    define("TEACHER_GROUP_ID", 4);
}

if (!defined("MANAGER_GROUP_ID")) {
    define("MANAGER_GROUP_ID", 5);
}
/*
  set Guest group id here
 */
if (!defined("GUEST_GROUP_ID")) {
    define("GUEST_GROUP_ID", 3);
}

/* Ä�á»‹nh nghÄ©a háº¡n Ä‘Äƒng kÃ½ cá»§a lá»›p */
if (!defined('HAN_DANG_KY')) {
    define('HAN_DANG_KY', 14);
}
/* Ä�á»‹nh nghÄ©a sá»‘ lÆ°á»£ng sinh viÃªn tá»‘i thiá»ƒu Ä‘á»ƒ má»Ÿ lá»›p */
if (!defined('SO_SINH_VIEN_TOI_THIEU')) {
    define('SO_SINH_VIEN_TOI_THIEU', 15);
}

/* Tá»± Ä‘á»™ng má»Ÿ lá»›p khi Ä‘á»§ sá»‘ lÆ°á»£ng sinh viÃªn */
if (!defined('TU_DONG_MO_LOP')) {
    define('TU_DONG_MO_LOP', 1);
}

/* Tá»± Ä‘á»™ng má»Ÿ lá»›p khi Ä‘á»§ sá»‘ lÆ°á»£ng sinh viÃªn */
if (!defined('KY_NANG_TU_CHON')) {
    define('KY_NANG_TU_CHON', 1);
}

if (!defined('KY_NANG_BAT_BUOC')) {
    define('KY_NANG_BAT_BUOC', 2);
}

if (!defined('KY_NANG_KHONG_TO_CHUC_HOC')) {
    define('KY_NANG_KHONG_TO_CHUC_HOC', 3);
}

if (!defined('APP_NAME')) {
    define('APP_NAME', 'TLC - Trang Há»— trá»£ cÃ´ng tÃ¡c Dáº¡y vÃ  Há»�c Ká»¹ nÄƒng má»�m sinh viÃªn');
}
Configure::write('CakePdf', array(
    'engine' => 'CakePdf.WkHtmlToPdf',
    'options' => array(
        'print-media-type' => false,
        'outline' => true,
        'dpi' => 96
    ),
    'margin' => array(
        'bottom' => 15,
        'left' => 50,
        'right' => 30,
        'top' => 45
    ),
    'orientation' => 'landscape',
    'download' => true
));