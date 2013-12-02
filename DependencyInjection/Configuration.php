<?php

namespace Hpatoio\BitlyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('hpatoio_bitly');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        
        // No custom configuration as suggested here: http://symfony.com/doc/current/cookbook/bundles/best_practices.html#configuration

        $rootNode
            ->children()
                ->scalarNode('access_token')
                    ->info('Your Bitly access token. Get it here https://bitly.com/a/oauth_apps')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->end()
                ->scalarNode('file_log_format')
                    ->defaultValue('default')
                    ->info('Format for file logging. You can user default/debug/short or custom MessageFormatter string.')
                    ->end()
                ->scalarNode('profiler')
                    ->defaultValue('default')
                    ->info('Enable Symfony profiler panel')
                    ->end()
                ->end();
        
        return $treeBuilder;
    }
}
