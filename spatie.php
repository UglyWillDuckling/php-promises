<?php

require __DIR__ . '/vendor/autoload.php';

use Spatie\Async\Pool;

$pool = Pool::create();

$counter = 0;

foreach (range(1, 10021) as $i) {
    $pool[] = async(function () {
        usleep(random_int(10, 1000));

        return 2;
    })->then(function (int $output) use (&$counter) {
        $counter += $output;
    });
}

await($pool);

echo 'counter: ' . $counter . PHP_EOL;

