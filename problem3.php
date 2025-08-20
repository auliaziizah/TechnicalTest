<?php
function highestPalindrome($s, $k) {
    $chars = str_split($s);
    $n = count($chars);

    [$chars, $k, $changed] = makePalindrome($chars, 0, $n-1, $k, []);

    if ($chars === -1 || $k < 0) return "-1";

    $chars = maximizePalindrome($chars, 0, $n-1, $k, $changed);

    return implode("", $chars);
}

function makePalindrome($chars, $l, $r, $k, $changed) {
    if ($l >= $r) return [$chars, $k, $changed];

    if ($chars[$l] != $chars[$r]) {
        $max = max($chars[$l], $chars[$r]);
        $chars[$l] = $chars[$r] = $max;
        $changed[$l] = true;
        $changed[$r] = true;
        $k--;
        if ($k < 0) return [-1, -1, []];
    }

    return makePalindrome($chars, $l+1, $r-1, $k, $changed);
}

function maximizePalindrome($chars, $l, $r, $k, $changed) {
    if ($l > $r) return $chars;

    if ($l == $r && $k > 0) {
        $chars[$l] = '9';
        return $chars;
    }

    if ($chars[$l] != '9') {
        $need = (isset($changed[$l]) || isset($changed[$r])) ? 1 : 2;
        if ($k >= $need) {
            $chars[$l] = $chars[$r] = '9';
            $k -= $need;
        }
    }

    return maximizePalindrome($chars, $l+1, $r-1, $k, $changed);
}

echo "Masukkan string angka: ";
$s = trim(fgets(STDIN));

echo "Masukkan nilai k: ";
$k = intval(trim(fgets(STDIN)));

$result = highestPalindrome($s, $k);

echo "Highest Palindrome: " . $result . PHP_EOL;
