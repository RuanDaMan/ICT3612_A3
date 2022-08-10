<?php
function getRatingCode($percentage)
{
    if ($percentage > 100 || $percentage < 0) {
        return -1;
    }
    if (100 >= $percentage && $percentage >= 80) {
        return 7;
    } elseif (79 >= $percentage && $percentage >= 70) {
        return 6;
    } elseif (69 >= $percentage && $percentage >= 60) {
        return 5;
    } elseif (59 >= $percentage && $percentage >= 50) {
        return 4;
    } elseif (49 >= $percentage && $percentage >= 40) {
        return 3;
    } elseif (39 >= $percentage && $percentage >= 30) {
        return 2;
    } elseif (29 >= $percentage && $percentage >= 0) {
        return 1;
    }
}

function getRatingDescription($code)
{
    switch ($code) {
        case 1:
            return "Not Achieved";
        case 2:
            return "Elementary";
        case 3:
            return "Moderate";
        case 4:
            return "Adequate";
        case 5:
            return "Substantial";
        case 6:
            return "Meritorious";
        case 7:
            return "Outstanding";
        default:
            return "Invalid Code";
    }
}

?>

<html>
<body>
<?php include 'menu.inc'; ?>

<main>
    <h1>Task 7</h1>
    <span>(a)</span>
    <span>
        <?php
        $num = 1;
        for ($i = 0; $i < 20; $i++) {
            echo $num % 2 == 0 ? "[{$num}] &nbsp;" : "{$num} &nbsp;";
            $num += $i;
        }
        ?>
    </span>
    <br>
    <br>
    <br>
    <span>(b)</span>
    <span>
        <?php
        $num = 1;
        $i = 0;
        while ($i < 20) {
            echo $num % 2 == 0 ? "{$num} &nbsp;" : "{{$num}} &nbsp;";
            $num += $i;
            $i++;
        }
        ?>
    </span>
    <br>
    <br>
    <br>

    <table>
        <thead>
        <tr>
            <th>Percentage</th>
            <th>Code</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>5</td>
            <td><?php echo getRatingCode(5) ?></td>
        </tr>
        <tr>
            <td>40</td>
            <td><?php echo getRatingCode(40) ?></td>
        </tr>
        <tr>
            <td>101</td>
            <td><?php echo getRatingCode(101) ?></td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr>
            <th>Code</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td><?php echo getRatingDescription(1) ?></td>
        </tr>
        <tr>
            <td>7</td>
            <td><?php echo getRatingDescription(7) ?></td>
        </tr>
        <tr>
            <td>-1</td>
            <td><?php echo getRatingDescription(-1) ?></td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <iframe src="task7.txt" height="500" width="1500">
        Your browser does not support iframes. </iframe>
</main>

</body>
</html>

<!--<iframe src="task1.txt" height="400" width="1200">-->
<!--    Your browser does not support iframes. </iframe>-->