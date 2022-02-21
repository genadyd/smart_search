<?php
//use Bramus\Router\Router;
use App\Controllers\ApiSearchController;
use App\Controllers\SearchFormController;


$router = new Bramus\Router\Router();

$router->get('/', function (){
    $controller = new SearchFormController();
    return $controller->index();
});
$router->post('/search', function (){
   $controller = new ApiSearchController();
   echo ($controller->dataProcessor());
});
$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo 'aaaaaa!!!!';
});
$router->run();
