<?php

//sub task a
function boolToText($condition, $type = null)
{
    if ($condition != 0 and $condition != 1) {
        return "Invalid Condition Argument";
    }
    switch ($type) {
        case 1:
            return ($condition == 0) ? "False" : "True";
        case 2:
            return ($condition == 0) ? "No" : "Yes";
        case 3:
            return ($condition == 0) ? "Negative" : "Positive";
        default:
            return $condition;
    }
}

//sub task b

function argumentChecker() {
    $argsCount = func_num_args();
    $arg_list = func_get_args();
    $numericArgs = 0;
    foreach ($arg_list AS &$arg) {
        $numericArgs += is_numeric($arg) ? 1 : 0;
    }
    return "Total number of arguments: $argsCount, total number of numerals in these arguments: $numericArgs";
}


?>

<html lang="en">
<body>
<?php include 'menu.inc'; ?>

<main>
    <h1>Task 1</h1>
    <span>Task a: </span>
    <ul>

        <li>boolToText(1) = <?php echo boolToText(1); ?></li>
        <li>boolToText(0, 2) = <?php echo boolToText(0, 2); ?></li>
        <li>boolToText(1, 3) = <?php echo boolToText(1, 3); ?></li>
        <li>boolToText(0, 5) = <?php echo boolToText(0, 5); ?></li>
    </ul>

    <span>Task b: </span>
    <ul>

        <li>"Thando", 23, "Busi", 40 = <?php echo argumentChecker("Thando", 23, "Busi", 40); ?></li>
        <li>"Mutsa" = <?php echo argumentChecker("Mutsa"); ?></li>
    </ul>

    <iframe src="task1.txt" height="400" width="1200">
        Your browser does not support iframes.
    </iframe>
</main>

</body>
</html>


