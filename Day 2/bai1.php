<?php
$string = "Chung toi toi HTC hoc Magento";
$breakPoint = 15;

function splitString($str, $bp)
{
    $start = 0;
    $Child = 1;
    while ($start < strlen($str) - 1) {
        if ($start + $bp >= strlen($str)) {
            echo ("Child " . $Child . ":");
            for ($i = $start; $i < strlen($str); $i++) {
                echo ($str[$i]);
            }
            echo "\n";
            $start = strlen($str) - 1;
        } else if ($str[$start + $bp] == " ") {
            echo ("Child " . $Child . ":");
            for ($i = $start; $i < $start + $bp; $i++) {
                echo ($str[$i]);
            }
            echo "\n";
            $start += $bp + 1;
            $Child++;
        } else if ($str[$start + $bp] != " ") {
            for ($j = $start + $bp; $j < strlen($str); $j++) {
                if ($str[$j] == " " || $j == strlen($str) - 1) {
                    echo ("Child " . $Child . ":");
                    for ($i = $start; $i < $j; $i++) {
                        echo ($str[$i]);
                    }
                    echo "\n";
                    $start = $j + 1;
                    $Child++;
                    break;
                }
            }
        }
    }
}

echo splitString($string, $breakPoint);
