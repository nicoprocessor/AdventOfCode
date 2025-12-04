<?php

$tic = microtime(true);

$f = file('input');

$r = 0;

$c = 50;

foreach ($f as $l) {
    $s = $l[0];
    $i = (int) substr($l, 1);

    if ($s === 'R') {
        $c += $i;
    } else {
        $c -= $i;
    }

    $c %= 100;

    if ($c === 0) {
        $r++;
    }
}

$toc = microtime(true);

echo $r."\n";

echo "Time: ".($toc - $tic)."\n";