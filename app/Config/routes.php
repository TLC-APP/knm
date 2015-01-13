<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'dashboards', 'action' => 'home'));
Router::connect('/thong-bao', array('controller' => 'messages', 'action' => 'index'));
Router::connect('/lop-ky-nang-dang-dang-ky', array('controller' => 'courses', 'action' => 'index'));
Router::connect('/phong-hoc', array('controller' => 'rooms', 'action' => 'index'));
Router::connect('/lien-he', array('controller' => 'dashboards', 'action' => 'contact'));
Router::connect('/huong-dan', array('controller' => 'dashboards', 'action' => 'help'));
Router::connect('/sinh-vien', array('plugin'=>'usermgmt','manager'=>true,'controller' => 'users', 'action' => 'student_index'));
Router::connect('/giang-vien', array('plugin'=>'usermgmt','manager'=>true,'controller' => 'users', 'action' => 'teacher_index'));
Router::connect('/them-sinh-vien', array('plugin'=>'usermgmt','manager'=>true,'controller' => 'users', 'action' => 'add_student'));
Router::connect('/them-giang-vien', array('plugin'=>'usermgmt','manager'=>true,'controller' => 'users', 'action' => 'add_teacher'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
Router::mapResources(array('Course'));
Router::parseExtensions('json');
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
