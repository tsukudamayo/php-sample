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
?>
