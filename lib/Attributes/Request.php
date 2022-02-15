<?php

namespace Framework\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Request
{
    public string $method;
    public array $path;
}