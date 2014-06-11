<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

    }

public function getViewHelperConfig() {
        return array(
            'factories' => array(   
                'mainMenu' => function($sm) {
                    $locator = $sm->getServiceLocator();
                    $nav = $sm->get('Zend\View\Helper\Navigation')->menu('navigation');
                    $acl = $locator->get('BjyAuthorize\Service\Authorize')->getAcl();
                    $role = $locator->get('BjyAuthorize\Service\Authorize')->getIdentity();
                    $nav->setAcl($acl);
                    $nav->setRole($role);
                    $nav->setUseAcl();                
                    return $nav->setUlClass('nav navbar-nav navbar-right')->setTranslatorTextDomain(__NAMESPACE__);
                }
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
