<?php

namespace afRedirectAfterLogin;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin afRedirectAfterLogin.
 */
class afRedirectAfterLogin extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('af_redirect_after_login.plugin_dir', $this->getPath());
        parent::build($container);
		}
		public static function getSubscribedEvents(){
			return [
				'sAdmin::sLogin::after' => 'onLogin',
			];
		}

		public function onLogin(\Enlight_Hook_HookArgs $args)
		{
			$config = $this->container->get('shopware.plugin.cached_config_reader')->getByPluginName($this->getName());
			$afRedirectAfterLoginDomain = $config['afRedirectAfterLoginDomain'];
			header("Location:". $afRedirectAfterLoginDomain);
			$this->forward(
				[
					'controller' => '',
					'action' => ''
				]
			);
		}
}
