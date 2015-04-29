<?php

require('config/main.php');

App::loadConfig($config);

try{
    App::run();
} catch (RouteException $e){
    (new View())->render('/error/404');
}
