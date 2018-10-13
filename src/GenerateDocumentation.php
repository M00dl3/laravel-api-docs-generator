<?php
namespace Jurrid\Documentor;

use File;
use Route AS Routes;
use ReflectionClass;
use ReflectionMethod;
use ValidationTransformer;
use Illuminate\Routing\Route;
use Illuminate\Console\Command;
use phpDocumentor\Reflection\DocBlockFactory;

class GenerateDocumentation extends Command
{
    protected $signature = 'docs:generate';

    protected $description = 'Generate API documentation.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $routes = $this->getRoutes();

        $this->store($routes);

        $this->info('Documentation generated.');
    }

    protected function getRoutes(): array
    {
        $routes = array();
        foreach(Routes::getRoutes() as $route){
            if(substr($this->getUri($route), 0, 4) == 'api/') {
                list($namespace, $class, $method) = $this->getObjectInfo($route->getActionName());
                if (strtolower($namespace) != 'closure') {

                    $callTypes = implode(', ',
                        $this->getRouteMethods($route)
                    );
                    $routes[hash('sha256', $namespace)]['controller'] = $class;
                    $routes[hash('sha256', $namespace)]['routes'][]   = [
                        'http'       => $callTypes,
                        'name'       => $route->getName(),
                        'method'    => $method,
                        'namespace'  => $namespace,
                        'uri'        => $this->getUri($route),
                        'middleware' => $route->middleware(),
                        'summary'    => $this->getSummary($namespace, $method),
                        'validation' => $this->getValidation($namespace, $method),
                    ];
                }
            }
        }

        return $routes;
    }

    protected function store(array $routes)
    {
        $directory = storage_path('documentor');
        if (File::exists($directory) == false) {
            File::makeDirectory($directory);
        }
        File::put("$directory/data.ser", serialize($routes));
    }

    protected function getObjectInfo(string $actionName): array
    {
        $namespace = array_first(explode('@', $actionName));
        $class  = array_last(explode('\\', $namespace));
        $method = array_last(explode('@', $actionName));

        return [
            $namespace,
            $class,
            $method,
        ];
    }

    public function getUri(Route $route): string
    {
        if (version_compare(app()->version(), '5.4', '<')) {
            return $route->getUri();
        }
        return $route->uri();
    }

    protected function getRouteMethods(Route $route): array
    {
        if (version_compare(app()->version(), '5.4', '<')) {
            $methods = $route->getMethods();
        } else {
            $methods = $route->methods();
        }
        return array_diff($methods, ['HEAD']);
    }

    protected function getSummary(string $namespace, string $method): string
    {
        $reflection = new ReflectionClass($namespace);

        if(method_exists($namespace, $method)){
            $reflectionMethod = $reflection->getMethod($method);
            $comment = $reflectionMethod->getDocComment();

            if(is_string($comment)){
                try{
                    $factory  = DocBlockFactory::createInstance();
                    $docBlock = $factory->create($comment);
                    return $docBlock->getSummary();

                }catch(\InvalidArgumentException $e){
                    return "";
                }
            }
        }

        return "";
    }

    public function getValidation(string $namespace, string $method): array
    {
        if(method_exists($namespace, $method)){
            $reflection = new ReflectionMethod($namespace, $method);
            foreach ($reflection->getParameters() as $param) {
                $class = $param->getType()->getName();

                if(method_exists($class,'rules')){
                    return (new $class)->rules();
                }
            }
        }
        return [];
    }
}