<?php

class Validate
{
//    public static $user_name_expression = '/^(?=[a-z]){4,4}/';
    public static $user_name_expression = '/^[a-z]{4,4}$/';
    public static $password_expression = '/^[0-9]{6,8}$/';

    public function checkUsername($username)
    {

        $valid = preg_match(self::$user_name_expression, $username);

        return $valid ? "Username is OK" : "Username is not valid!";
    }

    public function checkPassword($password)
    {
        $valid = preg_match(self::$password_expression, $password);

        return $valid ? "Password is OK" : "Password is not valid!";
    }
}

$validate = new Validate();


?>


<html lang="en">
<body>
<?php include 'menu.inc'; ?>
<main>
    <h1>Task 4</h1>
    <h3>TASK a</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div id="data" style="justify-content: space-between">
            <div style="display: flex">
            <label>Username:
                <input name="username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : "" ?>">

                <?php if (isset($_POST["username"])): ?>
                    <?php echo $validate->checkUsername($_POST["username"]) ?>
                <?php endif; ?>
            </Label>
            </div>
            <div style="display: flex">
            <label>Password:
                <input type="password" name="password">

                <?php if (isset($_POST["password"])): ?>
                    <?php echo $validate->checkPassword($_POST["password"]) ?>
                <?php endif; ?>
            </Label>
            </div>
        </div>
        <input type="submit" value="Submit"><br>
    </form>

    <h3>TASK b</h3>
    <ul>
        <li>asd: <?php echo preg_match("/^[01]?\d\/[0-3]\d\/\d{4}$/", "asd") ? "Matches" : "Does not match"?></li>
        <li>12/23/5545: <?php echo preg_match("/^[01]?\d\/[0-3]\d\/\d{4}$/", "12/23/5545") ? "Matches" : "Does not match"?></li>
    </ul>

    <iframe src="task4.txt" height="500" width="1500">
        Your browser does not support iframes.
    </iframe>
</main>

</body>
</html>