<?php

namespace Framework\DI;

use Framework\Attributes\Request;
use Framework\Finders\ClassFinder;

class DiContainer
{
    private static ?DiContainer $instance = null;
    public static function instance(
        string $ctrlNamespace = "App\\Controllers"
    ): DiContainer
    {
        self::$instance = self::$instance != null ? self::$instance : new DiContainer($ctrlNamespace);
        return self::$instance;
    }

    private string $ctrlNamespace;
    private array $controllers = [];

    private function __construct(string $ctrlNamespace) {
        $this->ctrlNamespace = $ctrlNamespace;
        if (count($this->controllers) == 0) {
            $this->__hydrateControllers();
        }
    }

    public function controller(string $method, string $path) {
        if (!key_exists($method, $this->controllers)) {
            return null;
        }
        if (!key_exists($path, $this->controllers[$method])) {
            return null;
        }

        return $this->controllers[$method][$path];
    }

    private function __hydrateControllers() {
        $classes = ClassFinder::getClassInNamespace($this->ctrlNamespace);
        foreach ($classes as $class) {
            $reflection = new \ReflectionClass($class);
            $attributeControllers = $reflection->getAttributes(\Framework\Attributes\Controller::class);

            foreach ($attributeControllers as $attribute) {
                $prefix = $attribute->getArguments()["prefix"];
                $rMethods = $reflection->getMethods(); //Je récupère l'ensemble des methodes de mon controller
                $rCtrlArgs = [];
//        $rCtrlConstructor = $reflection->getConstructor(); //Je récupère le constructeur de mon controller
//        $rCtrlConstructorParams = $rCtrlConstructor->getParameters(); //Je récupère les paramètres de mon constructeur

                $controller = $reflection->newInstance();

                foreach ($rMethods as $method) {
                    $methodName = $method->getName();
                    $aMethods = $method->getAttributes(Request::class);
                    foreach ($aMethods as $route) {
                        $arguments = $route->getArguments();
                        $method = $arguments["method"];
                        $paths = $arguments["path"];

                        foreach ($paths as $path) {
                            $this->controllers[$method][$prefix. $path] = ["ctrl" => $controller, "action" => $methodName];
                        }
                    }
                }
            }
        }
    }

}