<?php
namespace byhaskell\NovaPoshtaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $tb = new TreeBuilder('byhaskell_novaposhta');
        $root = $tb->getRootNode();

        $root
            ->children()
                ->scalarNode('api_key')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('base_url')->defaultValue('https://api.novaposhta.ua/v2.0/json/')->end()
            ->end();

        return $tb;
    }
}