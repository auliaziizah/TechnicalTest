<?php
function denseRanking($scores, $gitsScores) {
    $uniqueScores = array_values(array_unique($scores));

    $result = [];
    $n = count($uniqueScores);

    foreach ($gitsScores as $score) {
        $rank = 1;
        while ($rank <= $n && $score < $uniqueScores[$rank-1]) {
            $rank++;
        }
        $result[] = $rank;
    }
    return $result;
}

echo "Masukkan jumlah pemain: ";
$n = intval(trim(fgets(STDIN)));

echo "Masukkan skor setiap pemain: ";
$scores = array_map('intval', explode(" ", trim(fgets(STDIN))));

echo "Masukkan jumlah pemain GITS: ";
$m = intval(trim(fgets(STDIN)));

echo "Masukkan skor setiap pemain GITS: ";
$gitsScores = array_map('intval', explode(" ", trim(fgets(STDIN))));

$output = denseRanking($scores, $gitsScores);

echo implode(" ", $output) . PHP_EOL;