<?php

declare(strict_types=1);

/*
 * This file is part of contao-garage/contao-linking-headline.
 *
 * @author    Martin Schumann <martin.schumann@ontao-garage.de>
 * @license   MIT
 * @copyright Contao Garage 2026
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['linking_headline'] = '{type_legend},type,headline;'
    . '{link_legend},url,target,titleText;'
    . '{template_legend:hide},customTpl;'
    . '{protected_legend:hide},protected;'
    . '{expert_legend:hide},cssID;'
    . '{invisible_legend:hide},invisible,start,stop';
