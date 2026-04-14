<?php
// Array Function
// is_array()
// count()
// sort()
// shuffle()

$arrLagu = ['Hype Boy', 'Ditto', 'OMG', 'Super Shy'];

// cek apakah variabel array
if (is_array($arrLagu)) {
    echo "Ini adalah array\n\n";
}

// menghitung jumlah elemen array
$panjangArr = count($arrLagu);
echo "Jumlah lagu: $panjangArr\n\n";

// tampil sebelum diurutkan
echo "Sebelum sort:\n";
print_r($arrLagu);
echo "\n";

// mengurutkan array (A-Z)
sort($arrLagu);
echo "Setelah sort (A-Z):\n";
print_r($arrLagu);
echo "\n";

// mengacak urutan array
shuffle($arrLagu);
echo "Setelah shuffle (acak):\n";
print_r($arrLagu);
echo "\n";

// STRING
$namaLagu = $arrLagu[0];
$sub = substr($namaLagu, 0, 3);

echo "Lagu terpilih: $namaLagu\n";
echo "Substring 3 huruf pertama: $sub\n";
?>