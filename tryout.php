<?php

require 'vendor/autoload.php';

function computeAwesomeResultAsynchronously(callable $callback) {
  $client = new GuzzleHttp\Client();
  $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
  $promise = $client->sendAsync($request)
    ->then(function ($response) use ($callback) { $callback($response->getBody(), null); });
}

function getAwesomeResultPromise()
{
    $deferred = new React\Promise\Deferred();

    computeAwesomeResultAsynchronously(function ($result, ?\Throwable $error) use ($deferred) {
        if ($error) {
            $deferred->reject($error);
        } else {
            $deferred->resolve($result);
        }
    });

    return $deferred->promise();
}

$result = getAwesomeResultPromise()
    ->then(
        function ($value) { echo $value; }
    );

echo 'first call: ' . "\n";

