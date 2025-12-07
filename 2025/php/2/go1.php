<?php

$x = explode(',', file('input')[0]);

$res = 0;

foreach ($x as $n) {
    $p = explode('-', $n);
    $l = $p[0];
    $r = $p[1];

    $res += solve($l, $r);
}

print($res . PHP_EOL);

function solve($lower, $upper): int
{
    // Ensure lower bound has even length by padding if necessary
    if (strlen($lower) % 2 !== 0) {
        $lower = '1'.str_repeat('0', strlen($lower));
    }

    $half = strlen($lower) / 2;

    $left = substr($lower, 0, $half);
    $right = substr($lower, $half, $half * 2);

    // Find the first symmetric candidate >= lower
    if ($left === $right && (int) $lower < (int) $upper) {
        $start = $lower;
    }  else if ((int) $left < (int) $right) {
        // Increment left half to get next symmetric number
        $f = (int) substr($left, $half - 1, 1) + 1;
        $w = substr($left, 0, $half - 1).$f;
        $start = $w.$w;
    } else {
        $start = $left.$left;
    }

    // If start is above upper bound, no valid symmetric numbers
    if($start > $upper) {
        return 0;
    }

    $sum = 0;

    // Loop over symmetric candidates until exceeding upper bound
    $left = substr($start, 0, strlen($start) / 2);

    while(true) {
        $candidate = $left . $left;

        if((int) $candidate <= (int) $upper) {
            $sum += (int) $candidate;
            $left = $left + 1; // Move to next symmetric number
        } else {
            break;
        }
    }

    return $sum;
}