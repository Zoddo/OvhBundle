<?php

namespace Zoddo\OvhBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * {@inheritdoc}
 */
class Configuration implements ConfigurationInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('zoddo_ovh.api');
		$rootNode
			->children()
			->scalarNode('key')->isRequired()->cannotBeEmpty()->end()
			->scalarNode('secret')->isRequired()->cannotBeEmpty()->end()
			->scalarNode('endpoint')->defaultValue('ovh-eu')->cannotBeEmpty()->end()
			->scalarNode('consumer_key')->defaultNull()->cannotBeEmpty()->end()
			->end();

		return $treeBuilder;
	}
}