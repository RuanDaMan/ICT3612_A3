<?php

$randArray = array();

for ($i = 0; $i < 15; $i++) {
    array_push($randArray, rand(1, 5));
}

$airlineCodes = array("AR" => "Aerolineas Argentinas", "VW" => "Aeromar", "BP" => "Air Botswana", "SM" => "Air Cairo", "AC" => "Air Canada");


?>

<html>
<body>
<?php include 'menu.inc'; ?>

<main>
    <h1>Task 10</h1>

    <span>(a)</span>
    <label>Array:</label>
    <span><?php echo implode(", ", $randArray); ?></span>
    <br>
    <label>Index:</label>
    <span><?php echo implode(", ", array_keys($randArray)); ?></span>
    <br>
    <label>Array Sum:</label>
    <span><?php echo array_sum($randArray); ?></span>
    <br>
    <label>Array Count Values:</label>
    <span><?php echo implode(", ", array_count_values($randArray)); ?></span>
    <br>
    <br>
    <br>
    <span>(b)</span>
    <label>Values:</label>
    <span><?php echo implode(", ", $airlineCodes); ?></span>
    <br>
    <label>Keys:</label>
    <span><?php echo implode(", ", array_keys($airlineCodes)); ?></span>
    <br>
    <label>Keys Ascending:</label>
    <span><?php ksort($airlineCodes); echo implode(", ", array_keys($airlineCodes)); ?></span>
    <br>
    <label>Values Descending:</label>
    <span><?php arsort($airlineCodes); echo implode(", ", $airlineCodes); ?></span>
    <br>
    <br>
    <br>
    <br>

    <iframe src="task10.txt" height="500" width="1500">
        Your browser does not support iframes. </iframe>
</main>

</body>
</html>

<!--<iframe src="task1.txt" height="400" width="1200">-->
<!--    Your browser does not support iframes. </iframe>-->