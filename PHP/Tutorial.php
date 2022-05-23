<?php

    require 'Binary.php';

    $name = '11010001';

    $res = LowLevel::reversed($name);
    echo('res now: ' . $res . '<br>');

    $lowLevel = LowLevel::NumberSystem_init();
    $res2 = $lowLevel->decimalToBinary('252');
    echo('res2: ' . $res2 . '<br>');

    $binary = new Binary();
    $res3 = $binary->modulus('11010','11');
    echo('res06: ' . $res3 . '<br>');

?>