<?php

declare(strict_types=1);

/*
 * This file is part of contao-garage/contao-linking-headline.
 *
 * @author    Martin Schumann <martin.schumann@ontao-garage.de>
 * @license   MIT
 * @copyright Contao Garage 2026
 */

namespace ContaoGarage\LinkingHeadline\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use ContaoGarage\LinkingHeadline\LinkingHeadlineBundle;

/**
 * @internal
 */
class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(LinkingHeadlineBundle::class)->setLoadAfter([
                ContaoCoreBundle::class,
            ]),
        ];
    }
}
