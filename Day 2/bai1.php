<?php
$string = "Chung toi den HTC hoc Magento";
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

// function splitString($str, $bp)
// {
//     $start = 0;
//     $Child = 1;
//     while ($start < strlen($str) - 1) {
//         if ($start + $bp >= strlen($str)) {
//             echo ("Child" . $Child . " = ");
//             for ($i = $start; $i < strlen($str); $i++) {
//                 echo ($str[$i]);
//             }
//             echo "\n";
//             $start = strlen($str) - 1;
//         } else if ($str[$start + $bp] == " ") {
//             echo ("Child" . $Child . " = ");
//             for ($i = $start; $i < $start + $bp; $i++) {
//                 echo ($str[$i]);
//             }
//             echo "\n";
//             $start += $bp + 1;
//             $Child++;
//         } else if ($str[$start + $bp] != " ") {
//             for ($j = $start + $bp; $j < strlen($str); $j++) {
//                 if ($str[$j] == " " || $j == strlen($str) - 1) {
//                     echo ("Child" . $Child . " = ");
//                     for ($i = $start; $i < $j; $i++) {
//                         echo ($str[$i]);
//                     }
//                     echo "\n";
//                     $start = $j + 1;
//                     $Child++;
//                     break;
//                 }
//             }
//         }
//     }
// }

// echo splitString($string, $breakPoint);