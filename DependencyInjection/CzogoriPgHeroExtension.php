<?php

namespace Czogori\PgHeroBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class CzogoriPgHeroExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $definition = new Definition('Czogori\PgHeroBundle\PgHero',
          [$config['dsn'], $config['username'], $config['password']]);
        $container->setDefinition('pg_hero', $definition);

        $definition = new Definition('Czogori\PgHeroBundle\PgHeroDataCollector',
            [new Reference('request_stack'), new Reference('pg_hero')]);
        $definition->addTag('data_collector', ["template" => "CzogoriPgHeroBundle::pg_hero.html.twig", "id" => "pg_hero"]);
        $container->setDefinition('data_collector.pg_hero', $definition);
    }
}
