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

		$container->setParameter('ovh.key', (array_key_exists('ovh_key', $config )) ? $config['ovh_key'] : '');
		$container->setParameter('ovh.secret', (array_key_exists('ovh_secret', $config )) ? $config['ovh_secret'] : '');
		$container->setParameter('ovh.endpoint', (array_key_exists('ovh_endpointe', $config )) ? $config['ovh_endpointe'] : '');
		$container->setParameter('ovh.ckey', (array_key_exists('ovh_ckey', $config )) ? $config['ovh_ckey'] : '');

		$loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
		$loader->load('services.yml');
	}
}