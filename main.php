<?php
session_start();

echo "Hello, World!\n";

// 現在の日付と時刻を表示
echo "Current date and time: " . date("Y-m-d H:i:s") . "\n";

// 訪問回数をカウント
if (!isset($_SESSION['visit_count'])) {
    $_SESSION['visit_count'] = 1;
} else {
    $_SESSION['visit_count']++;
}

echo "You have visited this page " . $_SESSION['visit_count'] . " times.\n";

// ランダムな名言を表示
$quotes = [
    "The only limit to our realization of tomorrow is our doubts of today. - Franklin D. Roosevelt",
    "Life is 10% what happens to us and 90% how we react to it. - Charles R. Swindoll",
    "Success is not final, failure is not fatal: it is the courage to continue that counts. - Winston Churchill",
    "Do what you can, with what you have, where you are. - Theodore Roosevelt",
    "Believe you can and you're halfway there. - Theodore Roosevelt"
];

$random_quote = $quotes[array_rand($quotes)];
echo "Quote of the moment: \"$random_quote\"\n";
?>
