<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rustam
 * Date: 19.03.13
 * Time: 13:47
 * To change this template use File | Settings | File Templates.
 */

return array(
	'controllers' => array(
		'invokables' => array(
			'Lightglass\Controller\Lightglass' => 'Lightglass\Controller\LightglassController',
		),
	),
	'router' => array(
		'routes' => array(
			'lightglass' => array(
				'type'    => 'segment',
				'options' => array(
					'route'    => '/lightglass[/:action][/:id]',
					'constraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id'     => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'Lightglass\Controller\Lightglass',
						'action'     => 'index',
					),
				),
			),
		),
	),
	'view_manager' => array(
		'template_path_stack' => array(
			'album' => __DIR__ . '/../view',
		),
	),
);