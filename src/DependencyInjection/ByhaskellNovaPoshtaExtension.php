<?php
namespace byhaskell\NovaPoshtaBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class ByhaskellNovaPoshtaExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('byhaskell_novaposhta.api_key', $config['api_key']);
        $container->setParameter('byhaskell_novaposhta.base_url', $config['base_url'] ?? 'https://api.novaposhta.ua/v2.0/json/');

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        if (file_exists(__DIR__.'/../../config/services.yaml')) {
            $loader->load('services.yaml');
        }
    }
}
