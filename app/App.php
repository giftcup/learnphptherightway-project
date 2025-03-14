<?php

declare(strict_types = 1);

function get_transaction_files(string $dir_path): array {
    $files = [];

    foreach(scandir($dir_path) as $file) {
        if(is_dir($file)) {
            continue;
        }
        array_push($files, $dir_path . $file);
    }

    var_dump($files);
    return $files;
}

function get_transaction(string $filename): array{
    if (! file_exists($filename)) {
        trigger_error("File $filename does not exist", E_USER_ERROR);
    }

    $file = fopen($filename, 'r');

    $transactions = [];

    while(($transaction = fgetcsv($file)) !== false) {
        $transactions[] = $transaction;
    }

    print_r($transactions);

    return $transactions;
}