<?php
$day = 0;

$payPerHour = 0;

function getPayPerHour($day)
{
    return $day == 1 ? 19.20 : ($day == 7 ? 14.75 : 10.00);
}

function qualifyForPromotion($age, $monthlyIncome)
{
    return $age < 46 && $monthlyIncome >= 10000 ? true : ($age > 45 && $monthlyIncome >= 20000);
}

?>

<html>
<body>
<?php include 'menu.inc'; ?>

<main>
    <h1>Task 6</h1>
    <table>
        <thead>
        <tr>
            <th style="border-right: solid black 0.8px">Day</th>
            <th style="border-right: solid black 0.8px">Pay Per Hour</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="border-right: solid black 0.8px">-1</td>
            <td style="border-right: solid black 0.8px"><?php echo getPayPerHour(-1) ?></td>
        </tr>
        <tr>
            <td style="border-right: solid black 0.8px">1</td>
            <td style="border-right: solid black 0.8px"><?php echo getPayPerHour(1) ?></td>
        </tr>
        <tr>
            <td style="border-right: solid black 0.8px">7</td>
            <td style="border-right: solid black 0.8px"><?php echo getPayPerHour(7) ?></td>
        </tr>
        <tr>
            <td style="border-right: solid black 0.8px">5</td>
            <td style="border-right: solid black 0.8px"><?php echo getPayPerHour(5) ?></td>
        </tr>
        </tbody>
    </table>


    <br>
    <br>
    <table>
        <thead>
        <tr>
            <th style="border-right: solid black 0.8px">Person</th>
            <th style="border-right: solid black 0.8px">Age</th>
            <th style="border-right: solid black 0.8px">Income</th>
            <th style="border-right: solid black 0.8px">Qualify</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="border-right: solid black 0.8px">1</td>
            <td style="border-right: solid black 0.8px">45</td>
            <td style="border-right: solid black 0.8px">11000</td>
            <td style="border-right: solid black 0.8px"><?php echo qualifyForPromotion(45, 11000) ? "Qualified" : "Not Qualified" ?></td>
        </tr>
        <tr>
            <td style="border-right: solid black 0.8px">2</td>
            <td style="border-right: solid black 0.8px">46</td>
            <td style="border-right: solid black 0.8px">10000</td>
            <td style="border-right: solid black 0.8px"><?php echo qualifyForPromotion(46, 10000) ? "Qualified" : "Not Qualified" ?></td>
        </tr>
        <tr>
            <td style="border-right: solid black 0.8px">3</td>
            <td style="border-right: solid black 0.8px">25</td>
            <td style="border-right: solid black 0.8px">15000</td>
            <td style="border-right: solid black 0.8px"><?php echo qualifyForPromotion(25, 15000) ? "Qualified" : "Not Qualified" ?></td>
        </tr>
        <tr>
            <td style="border-right: solid black 0.8px">4</td>
            <td style="border-right: solid black 0.8px">65</td>
            <td style="border-right: solid black 0.8px">17000</td>
            <td style="border-right: solid black 0.8px"><?php echo qualifyForPromotion(65, 17000) ? "Qualified" : "Not Qualified" ?></td>
        </tr>
        <tr>
            <td style="border-right: solid black 0.8px">5</td>
            <td style="border-right: solid black 0.8px">25</td>
            <td style="border-right: solid black 0.8px">7500</td>
            <td style="border-right: solid black 0.8px"><?php echo qualifyForPromotion(25, 7500) ? "Qualified" : "Not Qualified" ?></td>
        </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <iframe src="task6.txt" height="500" width="1500">
        Your browser does not support iframes. </iframe>
</main>

</body>
</html>

<!--<iframe src="task1.txt" height="400" width="1200">-->
<!--    Your browser does not support iframes. </iframe>-->