<?php

namespace Hpatoio\BitlyBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Reference;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class HpatoioBitlyExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        
        $container->setParameter( 'hpatoio_bitly.access_token', $config['access_token'] );
        
        if (isset($config['file_log_format'])) {
            
            $logFormat = $config['file_log_format'];
            if (in_array($logFormat, array('default', 'debug', 'short'))) {
                $logFormat = constant(sprintf('Guzzle\Log\MessageFormatter::%s_FORMAT', strtoupper($logFormat)));
            }
            
            $container->setParameter( 'hpatoio_bitly.log.format', $logFormat );
        
            $loader->load('monolog_service.yml');
            
            $serviceDefinition = $container->findDefinition('hpatoio_bitly.client');
            $serviceDefinition->addMethodCall('addSubscriber', array(new Reference('hpatoio_bitly.log.monolog')));
        
        }
        
        if (isset($config['profiler'])) {
            $loader->load('profiler_service.yml');
            $serviceDefinition = $container->findDefinition('hpatoio_bitly.client');
            $serviceDefinition->addMethodCall('addSubscriber', array(new Reference('hpatoio_bitly.log.array')));
        }
        
    }
}
