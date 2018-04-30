<?php

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($container) {
    $settings = $container->get('settings');
    $view = new \Slim\Views\Twig(
        $settings['view']['template_path'],
        $settings['view']['twig']
    );

    // add extensions
    $view->addExtension(new Slim\Views\TwigExtension(
       $container->router,
       $container->request->getUri()
    ));
    $view->addExtension(new Twig_extension_Debug());

    return $view;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// Databae With Eloquent
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

// Flash Messsages
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};


// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------
# Error 404
$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $container->get('view')
            ->render(
                $response->withStatus(404), '/404/404.twig'
            );
    };
};
