<?php

namespace Framework\Attributes;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Controller
{
    public string $prefix = "/";
}