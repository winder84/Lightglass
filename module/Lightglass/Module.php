<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rustam
 * Date: 19.03.13
 * Time: 13:38
 * To change this template use File | Settings | File Templates.
 */
namespace Lightglass;
use Lightglass\Model\Lightglass;
use Lightglass\Model\LightglassTable;
use Zend\Db\ResultSet\ResultSet;

class Module
{
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\ClassMapAutoloader' => array(
				__DIR__ . '/autoload_classmap.php',
			),
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}

	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

    public function getServiceConfig()
    {
        return array(
	        'factories' => array(
		        'LightglassModelLightglassTable' =>  function($sm) {
			        $dbAdapter = $sm->get('ZendDbAdapterAdapter');
			        $table = new LightglassTable($dbAdapter);
			        return $table;
		        },
	        ),
        );
    }
}