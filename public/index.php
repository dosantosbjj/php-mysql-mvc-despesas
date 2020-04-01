<?php

require __DIR__ . '/../bootstrap.php';


// Pega o que será utilizado na URL
$url = substr($_SERVER['REQUEST_URI'],1);

// Separa a URL em array utilizando as / como delimitador
$url = explode('/',$url);


/* Exemplo de funcionamento do tratamento de URL:

www.site.com/products/show/1
new ProductsController()->show(1);
Controller: ProductsController
Action: show
Parâmetro: 1

*/
// Tratamento da url
$controller = isset($url[0]) && $url[0] ? $url[0] : 'home';
$action     = isset($url[1]) && $url[1] ? $url[1] : 'index';
$param      = isset($url[2]) && $url[2] ? $url[2] : null;

// Redireciona para página de erro se não existir a página da URL
if(!class_exists($controller = "Code\Controller\\" . ucfirst($controller) . 'Controller')){
    print (new \Code\View\View('404.phtml'))->render(); 
    die();   
}

// Verifica se existe a ação no controller
if(!method_exists($controller, $action)){
    $action = 'index';
    $param  = $url[1];
}

// Executa método do controller com parâmetros (se houver)
$response = call_user_func_array([new $controller, $action], [$param]);

print $response;