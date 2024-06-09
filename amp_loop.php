<?php
    require 'vendor/autoload.php';

    $loop = Amp\ReactAdapter\ReactAdapter::get();

    $loop->addtimer(1, function() {
        $output = file_get_contents('http://www.example.com/');
        echo " After Reading File ". "<br>". " ";
        echo $output;
    });
 
    echo " After Loop Time". "<br>". " ";
    $loop->run();

