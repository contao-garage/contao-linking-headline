<?php

declare(strict_types=1);

/*
 * This file is part of contao-garage/contao-linking-headline.
 *
 * @author    Martin Schumann <martin.schumann@ontao-garage.de>
 * @license   MIT
 * @copyright Contao Garage 2026
 */

namespace ContaoGarage\LinkingHeadline\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class LinkingHeadlineExtension extends Extension
{
    /**
     * @param array<ConfigurationInterface> $configs
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../../config'),
        );

        try {
            $loader->load('controller.yaml');
        } catch (\Exception $exception) {
            echo $exception->getMessage();

            exit(1);
        }
    }
}
