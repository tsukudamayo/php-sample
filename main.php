<?php
session_start();

echo "hello, world!\n";

// 現在の日付と時刻を表示
echo "current date and time: " . date("y-m-d h:i:s") . "\n";

// 訪問回数をカウント
if (!isset($_session['visit_count'])) {
    $_session['visit_count'] = 1;
} else {
    $_session['visit_count']++;
}
echo "you have visited this page " . $_session['visit_count'] . " times.\n";

// ランダムな名言を表示
$quotes = [
    "the only limit to our realization of tomorrow is our doubts of today. - franklin d. roosevelt",
    "life is 10% what happens to us and 90% how we react to it. - charles r. swindoll",
    "success is not final, failure is not fatal: it is the courage to continue that counts. - winston churchill",
    "do what you can, with what you have, where you are. - theodore roosevelt",
    "believe you can and you're halfway there. - theodore roosevelt"
];

$random_quote = $quotes[array_rand($quotes)];
echo "quote of the moment: \"$random_quote\"\n";

// シンプルな電卓機能
if (isset($_get['num1']) && isset($_get['num2']) && isset($_get['operation'])) {
    $num1 = floatval($_get['num1']);
    $num2 = floatval($_get['num2']);
    $operation = $_get['operation'];
    $result = null;

    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "error: division by zero!";
            }
            break;
        default:
            $result = "error: invalid operation!";
    }

    echo "calculation result: $result\n";
} else {
    echo "to use the calculator, add ?num1=5&num2=3&operation=add to the url.\n";
    echo "operations: add, subtract, multiply, divide.\n";
}
?>
