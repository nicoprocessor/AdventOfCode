<?php

$tic = microtime(true);

$f = file('input');

$r = 0;

$c = 50;

foreach ($f as $l) {
    $s = $l[0];
    $i = (int) substr($l, 1);

    $p = $c;

    if ($i > 100) {
        $r += intdiv($i, 100);
        $i = $i % 100;
    }

    if ($s === 'R') {
        $c = ($c + $i + 100) % 100;

        if ($c < $p && $p !== 0 || $c === 0) {
            $r++;
        }
    } else {
        $c = ($c - $i + 100) % 100;

        if ($c > $p && $p !== 0 || $c === 0) {
            $r++;
        }
    }
}

$toc = microtime(true);

echo $r."\n";

echo "Time: ".($toc - $tic) * 1000 ."ms\n";