<?php

$x = file('input');

$res = 0;

foreach ($x as $line) {
    $res += solve(str_split(trim($line)));
}

print($res . PHP_EOL);

function solve(array $n)
{
    $len = count($n);

    // Suffix maximum: max digit strictly to the right for each index
    $maxRight = array_fill(0, $len, 0);

    for ($i = $len - 2; $i >= 0; $i--) {
        $maxRight[$i] = max($n[$i + 1], $maxRight[$i + 1]);
    }

    // Evaluate the best two-digit number
    $best = 0;
    for ($i = 0; $i < $len - 1; $i++) {
        $best = max($best, 10 * $n[$i] + $maxRight[$i]);
    }

    return $best;
}