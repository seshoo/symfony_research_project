<?php

namespace App\PageType\Attribute;

#[\Attribute(\Attribute::TARGET_METHOD)]
class PageMeta
{

    public function __construct(
        public ?string $type = null,
        public ?string $title = null,
    ) {
    }
}