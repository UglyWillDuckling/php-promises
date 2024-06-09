    <?php 
      
    require 'vendor/autoload.php'; 
    $loop = Amp\ReactAdapter\ReactAdapter::get(); 
  
    $loop ->addtimer(1, function(){ 
        $file = fopen("amar.txt", "r"); 
            while(!feof($file)) { 
                echo fgets($file). "<br>". " "; 
            } 
        echo " After Reading File ". "<br>". " "; 
    }); 
  
    echo " After Loop Time". "<br>". " "; 
    $loop->run(); 
    ?> 
