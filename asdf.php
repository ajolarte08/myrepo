<?php

function total_price(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        return $total += $item['price'];
    }
}

function string_mod(string $string): string {
    return strtolower(str_replace(' ', '', $string));
}


function check_odd_even(int $number): string {
    if ($number % 2 == 0) {
        return "The number $number is even.";
    } else {
        return "The number $number is odd.";
    }
}

?>
