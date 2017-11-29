<?php
use Illuminate\Database\Capsule\Manager; 
use Illuminate\Support\Fluent;
//use Illuminate\Container\Container;

require __DIR__.'/../vendor/autoload.php';

$app = new Illuminate\Container\Container;
Illuminate\Container\Container::setInstance($app);

with(new Illuminate\Events\EventServiceProvider($app))->register();

with(new Illuminate\Routing\RoutingServiceProvider($app))->register();

require __DIR__.'/env.php';

$manager = new Manager();
$manager->addConnection(require '../config/database.php');
$manager->bootEloquent();
$app->instance('config', new Fluent);
$app['config']['view.compiled'] ="/home/cht/web/lara/storage/framework/views/";
$app['config']['view.paths'] =["/home/cht/web/lara/resources/views/"] ;
$app->instance('path.storage',  "/home/cht/web/lara/storage/framework");
$app->instance('path.resources', "/home/cht/web/lara/resources");
with(new Illuminate\View\ViewServiceProvider($app))->register();
with(new Illuminate\Filesystem\FilesystemServiceProvider($app))->register();

require __DIR__.'/../app/Http/routes.php';
  
$request = Illuminate\Http\Request::createFromGlobals();

$response = $app['router']->dispatch($request);

$response->send();