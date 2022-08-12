<?php


$servername = "localhost";
$username = "root";
//$username = "root";
$password = "";
//$password = "";
$conn = new PDO("mysql:host=$servername;dbname=ass3task5", $username, $password);
//$conn = new PDO("mysql:host=$servername;dbname=ass3task4", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$has_error = false;
$error_msg = "";

$actors = array();
$role_types = array();
$film_titles = array();
$film_actor_roles = array();


function fetchAll()
{
    try {

        $GLOBALS['actors'] = $GLOBALS['conn']->query("SELECT * FROM ass3task5.actors");


        $GLOBALS['role_types'] = $GLOBALS['conn']->query("SELECT * FROM ass3task5.roletypes");


        $GLOBALS['film_titles'] = $GLOBALS['conn']->query("SELECT * FROM ass3task5.filmtitles");
        $GLOBALS['film_actor_roles'] = $GLOBALS['conn']->query("SELECT far.FilmTitleID,
                                                                        ft.FilmTitle,
                                                                        ft.FilmDuration,
                                                                        ft.FilmStory,
                                                                        far.ActorID,
                                                                        a.ActorFullName,
                                                                        far.RoleTypeID, 
                                                                        rt.RoleType,                                                                        
                                                                        far.CharacterName, 
                                                                        far.CharacterDescription 
                                                                FROM ass3task5.filmactorroles far 
                                                                LEFT JOIN ass3task5.filmtitles ft on far.FilmTitleID = ft.FilmTitleID
                                                                LEFT JOIN ass3task5.roletypes rt on far.RoleTypeID = rt.RoleTypeID
                                                                LEFT JOIN ass3task5.actors a on far.ActorID = a.ActorID
                                                                ");

    } catch (PDOException $e) {
        $GLOBALS['has_error'] = true;
        $GLOBALS['error_msg'] = "Connection failed: " . $e->getMessage();
    }
}

fetchAll();


?>


<html lang="en">
<style>

    * {
        box-sizing: border-box;
    }

    .row {
        margin-left:-5px;
        margin-right:-5px;
    }

    .column {
        float: left;
        width: 50%;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th, td {
        text-align: left;
        padding: 5px;
        border: 1px solid #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

</style>
<body>
<?php include 'menu.inc'; ?>
<main>
    <h1>Task 5</h1>


    <?php if ($has_error): ?>
        <p><?php echo $error_msg ?></p>
    <?php else: ?>

        <?php ?>
        <div class="row">
            <div class="column">
                <h2>Actors</h2>
                <table id="dataTables">
                    <thead>
                    <tr>
                        <th style="text-align: left">ActorID</th>
                        <th style="text-align: left">ActorFullName</th>
                        <th style="text-align: left">ActorNotes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($actors as $actor) { ?>
                        <tr>
                            <td><?php echo $actor['ActorID']; ?></td>
                            <td><?php echo $actor['ActorFullName'] ?></td>
                            <td><?php echo $actor['ActorNotes']; ?></td>
                        </tr>

                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="column">
                <h2>Role Types</h2>
                <table id="dataTables">
                    <thead>
                    <tr>
                        <th style="text-align: left">RoleTypeID</th>
                        <th style="text-align: left">RoleType</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($role_types as $role_type) { ?>
                        <tr>
                            <td><?php echo $role_type['RoleTypeID']; ?></td>
                            <td><?php echo $role_type['RoleType'] ?></td>

                        </tr>

                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="column">
                <h2>FilmTitles</h2>
                <table id="dataTables">
                    <thead>
                    <tr>
                        <th style="text-align: left">FilmTitleID</th>
                        <th style="text-align: left">FilmTitle</th>
                        <th style="text-align: left">FilmDuration</th>
                        <th style="text-align: left">FilmStory</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($film_titles as $film_title) { ?>
                        <tr>
                            <td><?php echo $film_title['FilmTitleID']; ?></td>
                            <td><?php echo $film_title['FilmTitle'] ?></td>
                            <td><?php echo $film_title['FilmDuration']; ?></td>
                            <td><?php echo $film_title['FilmStory']; ?></td>
                        </tr>

                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>

    <?php endif; ?>

    <!--    <form action="--><?php //echo $_SERVER['PHP_SELF']; ?><!--" method="POST">-->
    <!--        <div id="data">-->
    <!--            <div>-->
    <!--                <label for="method">Method</label>-->
    <!--                <select name="method" id="method">-->
    <!--                    <option value="add">Add</option>-->
    <!--                    <option value="update">Update</option>-->
    <!--                    <option value="delete">Delete</option>-->
    <!--                </select>-->
    <!--            </div>-->
    <!--            <div>-->
    <!--                <label for="practicenumber">Practice Number</label>-->
    <!--                <input type="number" id="practicenumber" name="practicenumber">-->
    <!---->
    <!--                <label for="name">Name</label>-->
    <!--                <input type="text" id="name" name="name">-->
    <!---->
    <!--                <label for="specialty">Specialty</label>-->
    <!--                <select id="specialty" name="specialty">-->
    <!--                    <option value="GP">GP</option>-->
    <!--                    <option value="Oncologist">Oncologist</option>-->
    <!--                    <option value="Surgeon">Surgeon</option>-->
    <!--                </select>-->
    <!--                <label for="fee">Fee</label>-->
    <!--                <input type="number" step=".01" id="fee" name="fee">-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <br>-->
    <!--        <br>-->
    <!--        <div id="buttons">-->
    <!--            <label>&nbsp;</label>-->
    <!--            <input type="submit" value="Submit"><br>-->
    <!--        </div>-->
    <!--    </form>-->

    <iframe src="task5.txt" height="500" width="1500">
        Your browser does not support iframes.
    </iframe>
</main>

</body>
</html>