<?php

$form_valid = true;
$weight = "";
$weight_error = "";

$weight_unit = "";
$weight_unit_error = "";

if (isset($_POST["weight"])) {
    if (is_numeric($_POST["weight"]) && $_POST["weight"] != 0) {
        $weight = $_POST["weight"];
        if (empty($_POST["weight_unit"])) {
            $form_valid = false;
            $weight_unit_error = "Please select a weight unit.";
        } else {
            $weight_unit = $_POST["weight_unit"];
        }
    } else {
        $form_valid = false;
        $weight_error = "Please enter a valid weight.";
    }
}


$height = 0;
$height_error = "";

$height_unit = "";
$height_unit_error = "";

if (isset($_POST["height"])) {
    if (is_numeric($_POST["height"]) && $_POST["height"] > 0) {
        $height = $_POST["height"];
        if (empty($_POST["height_unit"])) {
            $form_valid = false;
            $height_unit_error = "Please select a height unit.";
        } else {
            $height_unit = $_POST["height_unit"];
        }
    } else {
        $form_valid = false;
        $height_error = "Please enter a valid height.";
    }
}

$bmi = 0;
$bmi_display = "";

if ($form_valid && isset($_POST["height"]) && isset($_POST["weight"])) {
    if ($weight_unit == "lb") {
        $weight = $weight * 0.453;
    }
    if ($height_unit == "inch") {
        $height = $height * 0.025;
    }

    $bmi = round($weight / ($height * $height), 2);

    if ($bmi < 18.5) {
        $bmi_display = "Underweight";
    }

    if (18.5 <= $bmi && $bmi <= 29.9) {
        $bmi_display = "Healthy Weight";
    }

    if (25 <= $bmi && $bmi <= 29.9) {
        $bmi_display = "Overweight";
    }

    if ($bmi > 30) {
        $bmi_display = "Obese";
    }
}


?>


<html>
<body>
<?php include 'menu.inc'; ?>

<main>
    <h1>Task 3</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div id="data">

            <label>Weight:
                <input type="number" name="weight" step=".01">

                <input type="radio"
                       name="weight_unit" <?php if (isset($weight_unit) && $weight_unit == "Kg") echo "checked"; ?>
                       value="Kg">Kilograms
                <input type="radio"
                       name="weight_unit" <?php if (isset($weight_unit) && $weight_unit == "lb") echo "checked"; ?>
                       value="lb">Pounds<br>
                <span style="font-weight: bold"><?php echo $weight_error == "" ? "" : "* {$weight_error}"; ?></span>
                <span style="font-weight: bold"><?php echo $weight_unit_error == "" ? "" : "* {$weight_unit_error}"; ?></span>

            </Label>
            <br>
            <br>

            <label>Height:
                <input type="number" name="height" step=".01">

                <input type="radio"
                       name="height_unit" <?php if (isset($height_unit) && $height_unit == "M") echo "checked"; ?>
                       value="M">Meters
                <input type="radio"
                       name="height_unit" <?php if (isset($height_unit) && $height_unit == "inch") echo "checked"; ?>
                       value="inch">Inches<br>
                <span style="font-weight: bold"><?php echo $height_error == "" ? "" : "* {$height_error}"; ?></span>
                <span style="font-weight: bold"><?php echo $height_unit_error == "" ? "" : "* {$height_unit_error}"; ?></span>
            </Label>

        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Submit"><br>
        </div>

    </form>
    <div>
         <span><?php echo $form_valid && isset($_POST["height"]) && isset($_POST["weight"]) ? "Your BMI is {$bmi} and you are {$bmi_display}" : ""; ?></span>

    </div>

    <iframe src="task3.txt" height="500" width="1500">
        Your browser does not support iframes. </iframe>
</main>

</body>
</html>