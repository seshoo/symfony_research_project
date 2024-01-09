<?php

namespace App\PageType\Attribute;

#[\Attribute(\Attribute::TARGET_METHOD)]
class PageType
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}