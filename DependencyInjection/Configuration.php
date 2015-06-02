<?php

namespace Czogori\PgHeroBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('czogori_pg_hero');

        $rootNode
            ->children()
                ->scalarNode('dsn')
                    ->defaultValue('pgsql:dbname=pghero;host=localhost;port=5432')
                ->end()
                ->scalarNode('username')
                    ->defaultValue('postgres')
                ->end()
                ->scalarNode('password')
                    ->defaultValue('')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
