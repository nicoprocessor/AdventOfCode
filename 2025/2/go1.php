<?php

$x = explode(',', file('input')[0]);

$r = 0;

foreach($x as $n) {
    $p = explode('-', $n);
    $l = $p[0];
    $r = $p[1];
}

function start($input, $max)
{
    $l = strlen($input);

    if ($l % 2 !== 0){
        $input = str_pad(
          substr($input, 0, 1),
          $l + 1,
          '0'
        );
    }

    $x = strlen($input) / 2;

    $l = substr($input, 0, $x);

    $r = substr($input, $x, $x * 2);

    if ($l === $r && (int) $input < (int) $max) {
        return $input;
    };

    if((int) $l < (int) $r) {
        $f = (int) substr($l,  $x - 1, 1) + 1;

        $w = substr($l, 0, $x - 1) . $f;

        $r = $w . $w;
    } else {
        $r =  $l . $l;
    }

    return $r < $max ? $r : null;
}

print_r( start('12', '23'));