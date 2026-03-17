<?php

declare(strict_types=1);

/*
 * This file is part of contao-garage/contao-linking-headline.
 *
 * @author    Martin Schumann <martin.schumann@ontao-garage.de>
 * @license   MIT
 * @copyright Contao Garage 2026
 */

namespace ContaoGarage\LinkingHeadline\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\InsertTag\InsertTagParser;
use Contao\CoreBundle\String\HtmlAttributes;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\Validator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LinkingHeadlineController extends AbstractContentElementController
{
    public function __construct(
        private readonly InsertTagParser $insertTagParser,
    ) {
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        // Link with attributes
        $href = $this->insertTagParser->replaceInline($model->url ?? '');

        if (Validator::isRelativeUrl($href)) {
            $href = $request->getBasePath() . '/' . $href;
        }

        $linkAttributes = (new HtmlAttributes())
            ->set('href', $href)
            ->setIfExists('title', $model->titleText ?? '')
        ;

        if ($model->target) {
            $linkAttributes
                ->set('target', '_blank')
                ->set('rel', 'noreferrer noopener')
            ;
        }

        $template->set('href', $href);
        $template->set('link_attributes', $linkAttributes);

        return $template->getResponse();
    }
}
