<?php
error_reporting(E_ALL);
$errorTypes =[
    '1' => 'E_ERROR'  ,
    '2' =>   'E_WARNING'  ,
    '4' =>   'E_PARSE'  ,
    '8'=> 'E_NOTICE'  ,
    '16' => 'E_CORE_ERROR' ,
    '32' => 'E_CORE_WARNING' ,
    '64' => 'E_COMPILE_ERROR' ,
    '128' => 'E_COMPILE_WARNING' ,
    '256' => 'E_USER_ERROR' ,
    '512' => 'E_USER_WARNING' ,
    '1024' => 'E_USER_NOTICE' ,
    '2048' => 'E_STRICT'  ,
    '4096' => 'E_RECOVERABLE_ERROR' ,
    '8192' => 'E_DEPRECATED' ,
    '16384' => 'E_USER_DEPRECATED' ,
]; ?>

<style>
    .error-box {
        background: #1e1e2f;
        color: #f8f8f2;
        border-left: 6px solid #ff5555;
        padding: 20px;
        margin: 20px;
        font-family: 'Courier New', monospace;
        box-shadow: 0 0 10px rgba(255, 85, 85, 0.2);
        border-radius: 8px;
    }

    .error-box h2 {
        margin: 0;
        color: #ff5555;
        font-size: 20px;
    }

    .error-box p {
        margin: 5px 0;
    }

    .error-code-block {
        background: #2e2e3e;
        color: #f1f1f1;
        padding: 10px;
        border-radius: 6px;
        margin-top: 10px;
        overflow-x: auto;
        font-size: 14px;
    }

    .highlight {
        background: #ff5555;
        color: #fff;
        padding: 2px 4px;
        border-radius: 4px;
    }
</style>

<div class="error-box">

    <strong><?= array_key_exists($errorNo,$errorTypes) ? $errorTypes[$errorNo]:$errorNo ;?></strong>
    <p>Hata Mesajı : <?= $errorMasage ?></p>
    <p>Dosya : <?= $errorFile ?></p>
    <p>Hatalı Satır : <?= $errorLine ?></p>

</div>

<div>

    <?php
    $file = fopen($errorFile, "r");
    $satir = fgets($file);
    $count = 1;
    while($satir =fgets($file)){
        if(++$count == $errorLine) echo '<p class="error-box"> <strong >Hata : '.$satir . '</strong> </p> <hr>';
    }
    fclose($file);
    ?>

</div>



