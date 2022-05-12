<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/produtos/listagem', 'Produto::listagem');
$routes->get('/produtos/cadastro', 'Produto::mostraCadastro');
$routes->post('/produtos/cadastro', 'Produto::cadastra');

$routes->get('/categorias/listagem', 'CategoriaProduto::listagem');
$routes->get('/categorias/cadastro', 'CategoriaProduto::mostraCadastro');
$routes->post('/categorias/cadastro', 'CategoriaProduto::cadastra');
$routes->get('/categorias/deletar/(:num)', 'CategoriaProduto::deleta/$1');

$routes->get('/vendas/listagem', 'Venda::listagem');
$routes->get('/vendas/cadastro', 'Venda::mostraCadastro');
$routes->post('/vendas/cadastro', 'Venda::cadastra');

$routes->get('/clientes/listagem', 'Cliente::listagem');
$routes->get('/clientes/cadastro', 'Cliente::mostraCadastro');
$routes->post('/clientes/cadastro', 'Cliente::cadastra');

$routes->get('/insights/listagem', 'Insights::listagem');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
