<?php 
namespace App\Core;

class Router {
    public static function route($routes) {
        $url = $_GET['url'] ?? ''; // URL parametresini al
        if ($url === '') {
            $url = 'home'; // Varsayılan route
        }

        // Route kontrolü
        if (array_key_exists($url, $routes)) {
            $action = $routes[$url];
            [$controllerClass, $method] = $action;

            // Parametreleri belirle
            $params = array_diff_key($_GET, ['url' => '']); // "url" parametresini çıkar

            // Kontrol ve metot çağır
            if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
                $controller = new $controllerClass();
                call_user_func_array([$controller, $method], [$params]);
            } else {
                echo "Hata: $controllerClass::$method bulunamadı.";
            }
        } else {
            // Route bulunamadı
            echo "Sayfa bulunamadı: " . htmlspecialchars($url);
            echo "Mevcut route'lar: <pre>" . print_r(array_keys($routes), true) . "</pre>";
        }
    }
}
