<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

// Autoload the Composer dependencies
require_once __DIR__.'/../vendor/autoload.php';

// Create the Laravel application instance
$app = require_once __DIR__.'/../bootstrap/app.php';

try {
    // Resolve the HTTP Kernel
    $kernel = $app->make(Kernel::class);

    // Capture the incoming request
    $request = Request::capture();

    // Handle the request and get the response
    $response = $kernel->handle($request);

    // Send the response to the client
    $response->send();

    // Terminate the request (perform any necessary cleanup)
    $kernel->terminate($request, $response);

} catch (Exception $e) {
    // Output the error message if something goes wrong
    echo "Error: " . $e->getMessage();
}
