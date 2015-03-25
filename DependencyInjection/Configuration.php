<?php

namespace Itkg\ApiDocBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Itkg\ConsumerBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('itkg_api_doc');

        $rootNode->children()
            ->arrayNode('resources')
            ->children()
                ->scalarNode('root_path')->defaultValue('%kernel.root_dir%/Resources/doc')->end()
            ->end();

        return $treeBuilder;
    }
}