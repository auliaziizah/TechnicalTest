<?php
function a000124_of_sloanes_oeis($n) {
  $result = [];
  for ($i = 0; $i <= $n; $i++) {
    $result[] = $i * ($i + 1)/2 + 1;
  }
  return $result;
}

echo "Masukkan input: ";
$n = intval(trim(fgets(STDIN)));

if ($n > 0) {
  echo implode("-", a000124_of_sloanes_oeis($n)) . PHP_EOL;
} else {
  echo "n harus bilangan bulat positif\n";
}