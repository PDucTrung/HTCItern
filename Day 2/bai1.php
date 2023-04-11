<?php
$string = "Chung toi toi HTC hoc Magento";
$breakPoint = 15;

function splitString(string $string, int $breakPoint)
{
    $count = 0;
    if ($string[$breakPoint - 1] != " ") {
        for ($i = $breakPoint; $i < strlen($string); $i++) {
            if ($string[$i] == " ") {
                for ($j = 0; $j < $i; $j++) {
                    $count++;
                    echo $string[$j];
                }
                break;
            }
        }
    } else {
        for ($i = 0; $i < $breakPoint; $i++) {
            $count++;
            echo $string[$i];
        }
    }

    echo "\n";
    for ($i = $count; $i < strlen($string); $i++) {
        echo $string[$i];
    }
}

echo splitString($string, $breakPoint);
