<?php



function errorHandler($errorNo, $errorMasage, $errorFile, $errorLine)
{
    require 'hatayonetimi.php';
}

function fatalErrorHandler()
{
    $error = error_get_last();
    if($error !== null &&
        isset($error['type'], $error['message'], $error['file'], $error['line'])){
        errorHandler($error['type'], $error['message'], $error['file'], $error['line']);
    }

}
set_error_handler('errorHandler');
register_shutdown_function('fatalErrorHandler');

