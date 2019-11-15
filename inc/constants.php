<?php
    if ($_SERVER['SERVER_NAME']==='localhost'){
        define('completeDirectory',"http://localhost/wms/dist/");
    } elseif ($_SERVER['SERVER_NAME']==='b09ba4a9.ngrok.io') {
            define('completeDirectory',"https://b09ba4a9.ngrok.io/wms/dist/");
    }
?>
