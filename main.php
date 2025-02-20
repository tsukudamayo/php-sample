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

// シンプルな電卓機能
if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operation'])) {
    $num1 = floatval($_GET['num1']);
    $num2 = floatval($_GET['num2']);
    $operation = $_GET['operation'];
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
                $result = "Error: Division by zero!";
            }
            break;
        default:
            $result = "Error: Invalid operation!";
    }

    echo "Calculation Result: $result\n";
} else {
    echo "To use the calculator, add ?num1=5&num2=3&operation=add to the URL.\n";
    echo "Operations: add, subtract, multiply, divide.\n";
}

// 簡易お問い合わせフォーム
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['message'])) {
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);

    if (!isset($_SESSION['messages'])) {
        $_SESSION['messages'] = [];
    }

    $_SESSION['messages'][] = ["name" => $name, "message" => $message];
}

// メッセージ表示
echo "<h2>Contact Form</h2>";
echo "<form method='POST'>";
echo "Name: <input type='text' name='name' required><br>";
echo "Message: <input type='text' name='message' required><br>";
echo "<input type='submit' value='Send'>";
echo "</form>";

if (isset($_SESSION['messages']) && count($_SESSION['messages']) > 0) {
    echo "<h3>Message History</h3>";
    foreach ($_SESSION['messages'] as $msg) {
        echo "<p><strong>{$msg['name']}:</strong> {$msg['message']}</p>";
    }
}
?>
