<?php

namespace App\PageType\Twig;

use App\PageType\Attribute\PageType;
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
        ];
    }

    public function pageTypeHandler(): string
    {
        $pageType = $this->requestStack->getCurrentRequest()->attributes->get('_pageType');
        if ($pageType instanceof PageType) {
            return $pageType->name;
        }

        return static::DEFAULT_TYPE;
    }
}