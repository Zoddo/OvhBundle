<?php

namespace Zoddo\OvhBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * {@inheritdoc}
 */
class OvhExtension extends Extension
{
	/**
	 * {@inheritdoc}
	 */
	public function load(array $configs, ContainerBuilder $container)
	{
		$configuration = new Configuration();
		$config = $this->processConfiguration($configuration, $configs);

		$container->setParameter('zoddo_ovh.key', $config['ovh_key']);
		$container->setParameter('zoddo_ovh.secret', $config['ovh_secret']);
		$container->setParameter('zoddo_ovh.endpoint', $config['ovh_endpointe']);
		$container->setParameter('zoddo_ovh.ckey', $config['ovh_ckey']);

		$loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
		$loader->load('services.yml');
	}
}