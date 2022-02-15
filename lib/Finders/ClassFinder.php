<?php

namespace Framework\Finders;

class ClassFinder
{
    const appRoot = __DIR__. "/../../";

    public static function getClassInNamespace($namespace) {
        $files = scandir(self::getDirectoryFromNamespace($namespace));

        $classes = array_map(fn($file) => $namespace. "\\". str_replace('.php', '', $file), $files);

        return array_filter($classes, fn($possibleClass) => class_exists($possibleClass));
    }

    private static function getDefinedNamespaces()
    {
        $composerJsonPath = self::appRoot . 'composer.json';
        $composerConfig = json_decode(file_get_contents($composerJsonPath));

        $psr4 = "psr-4";
        return (array) $composerConfig->autoload->$psr4;
    }

    private static function getDirectoryFromNamespace($namespace) {
        $composerNamespaces = self::getDefinedNamespaces();

        $namespaceFragments = explode('\\', $namespace);
        $undefinedNamespaceFragments = [];

        while($namespaceFragments) {
            $possibleNamespace = implode('\\', $namespaceFragments) . '\\';

            if(array_key_exists($possibleNamespace, $composerNamespaces)){
                return realpath(self::appRoot . $composerNamespaces[$possibleNamespace] . implode('/', $undefinedNamespaceFragments));
            }

            array_unshift($undefinedNamespaceFragments, array_pop($namespaceFragments));
        }

        return false;
    }
}