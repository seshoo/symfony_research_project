<?php

namespace App\PageType\Twig;

use App\PageType\Attribute\PageMeta;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PageTypeExtension extends AbstractExtension
{
    public const DEFAULT_TYPE = 'undefined';

    public function __construct(
        private readonly RequestStack $requestStack
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('pageType', [$this, 'pageTypeHandler']),
            new TwigFunction('pageTitle', [$this, 'pageTitleHandler']),
        ];
    }

    private function getPageMeta(): ?PageMeta
    {
        $pageType = $this->requestStack->getCurrentRequest()->attributes->get('_pageType');
        if ($pageType instanceof PageMeta) {
            return $pageType;
        }

        return null;
    }

    public function pageTypeHandler(): string
    {
        return $this->getPageMeta()?->type ?: static::DEFAULT_TYPE;
    }

    public function pageTitleHandler(): string
    {
        return $this->getPageMeta()?->title ?: '!';
    }
}