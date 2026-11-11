<?php

if (!function_exists('numberToRupiah')) {
    function numberToRupiah($angka): string {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('rupiahToNumber')) {
    function rupiahToNumber(string $rp): int {
        return (int) preg_replace('/\D/', '', $rp);
    }
}
