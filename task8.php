<?php
$sentence = "All for one and one for all";

function getLastLetters($string)
{
    $new_string = explode(' ', $string);
    $tmp_string = "";
    for ($x = 0; $x < count($new_string); $x++) {
        $tmp_string .= substr($new_string[$x], -1);
    }
    return $tmp_string;
}

function getFirstLetters($string)
{
    $new_string = explode(' ', $string);
    $tmp_string = "";
    for ($x = 0; $x < count($new_string); $x++) {
        $tmp_string .= substr($new_string[$x], 0, 1);
    }
    return $tmp_string;
}


?>

<html>
<body>
<?php include 'menu.inc';?>

<main>
    <h1>Task 8</h1>

    <label>Input Sentence :</label>
    <span><?php echo $sentence; ?></span>
    <br>

    <label>Length :</label>
    <span><?php echo strlen($sentence); ?></span>
    <br>

    <label>Reverse :</label>
    <span><?php echo strrev($sentence); ?></span>
    <br>

    <label>Number of Words :</label>
    <span><?php echo str_word_count($sentence); ?></span>
    <br>

    <label>Colon Separated:</label>
    <span><?php echo str_replace(" ", ":", $sentence); ?></span>
    <br>

    <label>A and a replaced by * :</label>
    <span><?php echo str_ireplace("a", "*", $sentence); ?></span>
    <br>

    <label>Last letters in lowercase:</label>
    <span><?php echo strtolower(getLastLetters($sentence)); ?></span>
    <br>

    <label>Uppercase words:</label>
    <span><?php echo ucwords($sentence); ?></span>
    <br>

    <label>Uppercase words without spaces:</label>
    <span><?php echo str_ireplace(" ", "", ucwords($sentence)); ?></span>
    <br>

    <label>First letters in uppercase:</label>
    <span><?php echo strtoupper(getFirstLetters($sentence)); ?></span>
    <br>
    <br>
    <br>

    <iframe src="task8.txt" height="500" width="1500">
        Your browser does not support iframes. </iframe>
</main>

</body>
</html>

<!--<iframe src="task1.txt" height="400" width="1200">-->
<!--    Your browser does not support iframes. </iframe>-->