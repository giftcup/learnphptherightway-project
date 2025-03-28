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

    // var_dump($files);
    return $files;
}

function get_transaction(string $filename, ?callable $transactionHandler = null): array{
    if (! file_exists($filename)) {
        trigger_error("File $filename does not exist", E_USER_ERROR);
    }

    $file = fopen($filename, 'r');

    fgetcsv($file);

    $transactions = [];

    while(($transaction = fgetcsv($file)) !== false) {
        if($transactionHandler !== null) {
            $transaction = $transactionHandler($transaction);
        }

        $transactions[] = $transaction;
    }

    return $transactions;
}

function parseTransaction (array $transactionRow): array {

    [$date, $checkNumber, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount
    ];
}

function calculateTotals(array $transactions): array {
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if($transaction['amount'] >= 0) {
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }
    
    return $totals;
}