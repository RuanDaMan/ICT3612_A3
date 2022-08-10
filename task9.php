<?php


function getDateObject($birthday)
{
    $birthday = $birthday->setTime(0, 0, 0, 0);
    $dateObj = new stdClass;
    $dateObj->formattedDate = $birthday->format("d/m/Y");
    $dateObj->age = ($birthday->diff(new DateTime()))->y;
    $dateObj->birthdayMessage = getBirthdayMessage($birthday);
    return $dateObj;
}

function getBirthdayMessage($birthday)
{
    $sameYearDate = new DateTime();
    $sameYearDate->setDate($birthday->format("Y"), $sameYearDate->format("m"), $sameYearDate->format("d"))->setTime(0, 0, 0, 0);
    if ($birthday > $sameYearDate) {
        return "Your birthday is yet to come this year";
    } elseif ($birthday == $sameYearDate) {
        return "Its your birthday today";
    } elseif ($birthday < $sameYearDate) {
        return "Your Birthday has already passed";
    }
    return "N/A";
}

?>

<html>
<body>
<?php include 'menu.inc'; ?>

<main>
    <h1>Task 9</h1>

    <table>
        <tr>
            <td style="border: solid 1px" colspan="2">
                Date: 1980-03-29
            </td>
        </tr>
        <?php
        $dateObj = getDateObject(new DateTime("1980-03-29"));
        echo "<tr>
                <td style=\"border: solid 1px\">
                    Format:
                </td>
                <td style=\"border: solid 1px\">
                    {$dateObj->formattedDate}
                </td>

              </tr>";

        echo "<tr>
                <td style=\"border: solid 1px\">
                    Age:
                </td>
                <td style=\"border: solid 1px\">
                    {$dateObj->age}
                </td>

              </tr>";

        echo "<tr>
                <td style=\"border: solid 1px\">
                    Birthday Message:
                </td>
                <td style=\"border: solid 1px\">
                    {$dateObj->birthdayMessage}
                </td>

              </tr>"


        ?>
    </table>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td style="border: solid 1px" colspan="2">
                Date: <?php $current = new DateTime(); echo $current->format("Y-m-d")?>
            </td>
        </tr>
        <?php
        $dateObj = getDateObject(new DateTime());
        echo "<tr>
                <td style=\"border: solid 1px\">
                    Format:
                </td>
                <td style=\"border: solid 1px\">
                    {$dateObj->formattedDate}
                </td>

              </tr>";

        echo "<tr>
                <td style=\"border: solid 1px\">
                    Age:
                </td>
                <td style=\"border: solid 1px\">
                    {$dateObj->age}
                </td>

              </tr>";

        echo "<tr>
                <td style=\"border: solid 1px\">
                    Birthday Message:
                </td>
                <td style=\"border: solid 1px\">
                    {$dateObj->birthdayMessage}
                </td>

              </tr>"


        ?>
    </table>
<br>
<br>
<br>
    <table>
        <tr>
            <td style="border: solid 1px" colspan="2">
                Date: 1996-12-31
            </td>
        </tr>
        <?php
        $dateObj = getDateObject(new DateTime("1996-12-31"));
        echo "<tr>
                <td style=\"border: solid 1px\">
                    Format:
                </td>
                <td style=\"border: solid 1px\">
                    {$dateObj->formattedDate}
                </td>

              </tr>";

        echo "<tr>
                <td style=\"border: solid 1px\">
                    Age:
                </td>
                <td style=\"border: solid 1px\">
                    {$dateObj->age}
                </td>

              </tr>";

        echo "<tr>
                <td style=\"border: solid 1px\">
                    Birthday Message:
                </td>
                <td style=\"border: solid 1px\">
                    {$dateObj->birthdayMessage}
                </td>

              </tr>"


        ?>
    </table>

    <br>
    <br>
    <br>
    <br>

    <iframe src="task9.txt" height="500" width="1500">
        Your browser does not support iframes. </iframe>
</main>

</body>
</html>

<!--<iframe src="task1.txt" height="400" width="1200">-->
<!--    Your browser does not support iframes. </iframe>-->