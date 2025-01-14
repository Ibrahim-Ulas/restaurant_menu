<?php

namespace App\Controllers;

class HomeController {
    public function index() {
        global $routes; // Rotaları kullanmak için global olarak tanımlayın

        echo "<h1>Hoş Geldiniz</h1>";
        echo "<ul>";
        foreach ($routes as $key => $value) {
            if ($key !== 'home') { // Ana sayfa rotasını menüden hariç tutun
                echo "<li><a href='$key'>$key</a></li>";
            }
        }
        echo "</ul>";
    }
}
