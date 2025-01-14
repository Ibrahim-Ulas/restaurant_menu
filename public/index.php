<?php

require_once __DIR__ . '/../vendor/autoload.php';



use App\Core\Router;
use App\Controllers\CategoryController; // Controller'ı doğru namespace ile çağırın
use App\Controllers\ItemController;
use App\Controllers\HomeController;


$routes = [
    "home" => [App\Controllers\HomeController::class, "index"], // Ana sayfa
    "Category/index" => [CategoryController::class, "index"],
    "Category/edit" => [CategoryController::class, "edit"],
    'Category/delete' => [CategoryController::class, 'delete'],
    'Category/destroy' => [CategoryController::class, 'destroy'],
    'Category/add' => [CategoryController::class, 'add'],
    'Category/store' => [CategoryController::class, 'store'],
    'Items/index' => [ItemController::class, 'index'], // Örnek olarak 1 geçiyoruz.,
    'Items/edit' => [ItemController::class, 'edit'],
    'Items/delete' => [ItemController::class, 'delete'],
    'Items/add' => [ItemController::class, 'add'],
    'Items/store' => [ItemController::class, 'store'],
    'Items/destroy' => [ItemController::class, 'destroy'],

    
];

Router::route($routes);