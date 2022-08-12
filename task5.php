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
$radio_query = array();


function fetchAll()
{
    try {

        $GLOBALS['actors'] = $GLOBALS['conn']->query("SELECT * FROM ass3task5.actors ORDER BY ActorID");


        $GLOBALS['role_types'] = $GLOBALS['conn']->query("SELECT * FROM ass3task5.roletypes ORDER BY RoleTypeID");


        $GLOBALS['film_titles'] = $GLOBALS['conn']->query("SELECT * FROM ass3task5.filmtitles ORDER BY FilmTitleID");

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
                                                                ORDER BY far.FilmTitleID");

        if (isset($_POST['query'])) {
            $query_choice = $_POST['query'];
            if ($query_choice == "select_1") {
                $GLOBALS['radio_query'] = $GLOBALS['conn']->query("SELECT far.FilmTitleID,
                                                                        far.ActorID,
                                                                        far.RoleTypeID,                                                                        
                                                                        far.CharacterName, 
                                                                        far.CharacterDescription 
                                                                FROM ass3task5.filmactorroles far 
                                                                ORDER BY CharacterName");
            }
            if ($query_choice == "select_2") {
                $GLOBALS['radio_query'] = $GLOBALS['conn']->query("SELECT far.FilmTitleID,
                                                                        far.ActorID,
                                                                        far.RoleTypeID,                                                                        
                                                                        far.CharacterName, 
                                                                        far.CharacterDescription 
                                                                FROM ass3task5.filmactorroles far 
                                                                WHERE far.CharacterName LIKE '%ac%' ");
            }
            if ($query_choice == "select_3") {
                $GLOBALS['radio_query'] = $GLOBALS['conn']->query("SELECT far.FilmTitleID,
                                                                        far.ActorID,
                                                                        far.RoleTypeID,                                                                        
                                                                        far.CharacterName, 
                                                                        far.CharacterDescription,
                                                                        rt.RoleType
                                                                FROM ass3task5.filmactorroles far 
                                                                INNER JOIN ass3task5.roletypes rt ON rt.RoleTypeID = far.RoleTypeID");
            }
            if ($query_choice == "select_4") {
                $GLOBALS['radio_query'] = $GLOBALS['conn']->query("SELECT far.FilmTitleID,
                                                                        far.ActorID,
                                                                        far.RoleTypeID,                                                                        
                                                                        far.CharacterName, 
                                                                        far.CharacterDescription
                                                                FROM ass3task5.filmactorroles far 
                                                                WHERE far.RoleTypeID = 3 OR far.RoleTypeID = 5");
            }
            if ($query_choice == "select_5") {
                $GLOBALS['radio_query'] = $GLOBALS['conn']->query("SELECT MAX(ft.FilmDuration) AS FilmDuration FROM ass3task5.filmtitles ft ");
            }
        }

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
        margin-left: -5px;
        margin-right: -5px;
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
                <table>
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
                <table>
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
                <table>
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
        <div>
            <h2>FilmActorRoles (With JOINED values)</h2>
            <table>
                <thead>
                <tr>
                    <th style="text-align: left">FilmTitleID</th>
                    <th style="text-align: left">FilmTitle</th>
                    <th style="text-align: left">FilmDuration</th>
                    <th style="text-align: left">FilmStory</th>
                    <th style="text-align: left">ActorID</th>
                    <th style="text-align: left">ActorFullName</th>
                    <th style="text-align: left">RoleTypeID</th>
                    <th style="text-align: left">RoleType</th>
                    <th style="text-align: left">CharacterName</th>
                    <th style="text-align: left">CharacterDescription</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($film_actor_roles as $film_actor_role) { ?>
                    <tr>
                        <td><?php echo $film_actor_role['FilmTitleID']; ?></td>
                        <td><?php echo $film_actor_role['FilmTitle'] ?></td>
                        <td><?php echo $film_actor_role['FilmDuration']; ?></td>
                        <td><?php echo $film_actor_role['FilmStory']; ?></td>
                        <td><?php echo $film_actor_role['ActorID']; ?></td>
                        <td><?php echo $film_actor_role['ActorFullName']; ?></td>
                        <td><?php echo $film_actor_role['RoleTypeID']; ?></td>
                        <td><?php echo $film_actor_role['RoleType']; ?></td>
                        <td><?php echo $film_actor_role['CharacterName']; ?></td>
                        <td><?php echo $film_actor_role['CharacterDescription']; ?></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
        <div>
            <h2>Radio Button Queries</h2>
            <?php if (isset($_POST['query'])): ?>
                <?php if ($_POST['query'] == "select_1"): ?>
                    <h4>Displaying Query 1</h4>
                    <table>
                        <thead>
                        <tr>
                            <th style="text-align: left">FilmTitleID</th>
                            <th style="text-align: left">ActorID</th>
                            <th style="text-align: left">RoleTypeID</th>
                            <th style="text-align: left">CharacterName</th>
                            <th style="text-align: left">CharacterDescription</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($radio_query as $row) { ?>
                            <tr>
                                <td><?php echo $row['FilmTitleID']; ?></td>
                                <td><?php echo $row['ActorID']; ?></td>
                                <td><?php echo $row['RoleTypeID']; ?></td>
                                <td><?php echo $row['CharacterName']; ?></td>
                                <td><?php echo $row['CharacterDescription']; ?></td>
                            </tr>

                        <?php } ?>

                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if ($_POST['query'] == "select_2"): ?>
                    <h4>Displaying Query 2</h4>
                    <table>
                        <thead>
                        <tr>
                            <th style="text-align: left">FilmTitleID</th>
                            <th style="text-align: left">ActorID</th>
                            <th style="text-align: left">RoleTypeID</th>
                            <th style="text-align: left">CharacterName</th>
                            <th style="text-align: left">CharacterDescription</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($radio_query as $row) { ?>
                            <tr>
                                <td><?php echo $row['FilmTitleID']; ?></td>
                                <td><?php echo $row['ActorID']; ?></td>
                                <td><?php echo $row['RoleTypeID']; ?></td>
                                <td><?php echo $row['CharacterName']; ?></td>
                                <td><?php echo $row['CharacterDescription']; ?></td>
                            </tr>

                        <?php } ?>

                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if ($_POST['query'] == "select_3"): ?>
                    <h4>Displaying Query 3</h4>
                    <table>
                        <thead>
                        <tr>
                            <th style="text-align: left">FilmTitleID</th>
                            <th style="text-align: left">ActorID</th>
                            <th style="text-align: left">RoleTypeID</th>
                            <th style="text-align: left">CharacterName</th>
                            <th style="text-align: left">CharacterDescription</th>
                            <th style="text-align: left">RoleType</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($radio_query as $row) { ?>
                            <tr>
                                <td><?php echo $row['FilmTitleID']; ?></td>
                                <td><?php echo $row['ActorID']; ?></td>
                                <td><?php echo $row['RoleTypeID']; ?></td>
                                <td><?php echo $row['CharacterName']; ?></td>
                                <td><?php echo $row['CharacterDescription']; ?></td>
                                <td><?php echo $row['RoleType']; ?></td>
                            </tr>

                        <?php } ?>

                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if ($_POST['query'] == "select_4"): ?>
                    <h4>Displaying Query 4</h4>
                    <table>
                        <thead>
                        <tr>
                            <th style="text-align: left">FilmTitleID</th>
                            <th style="text-align: left">ActorID</th>
                            <th style="text-align: left">RoleTypeID</th>
                            <th style="text-align: left">CharacterName</th>
                            <th style="text-align: left">CharacterDescription</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($radio_query as $row) { ?>
                            <tr>
                                <td><?php echo $row['FilmTitleID']; ?></td>
                                <td><?php echo $row['ActorID']; ?></td>
                                <td><?php echo $row['RoleTypeID']; ?></td>
                                <td><?php echo $row['CharacterName']; ?></td>
                                <td><?php echo $row['CharacterDescription']; ?></td>
                            </tr>

                        <?php } ?>

                        </tbody>
                    </table>
                <?php endif; ?>
                <?php if ($_POST['query'] == "select_5"): ?>
                    <h4>Displaying Query 5</h4>
                    <table>
                        <thead>
                        <tr>
                            <th style="text-align: left">FilmDuration</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($radio_query as $row) { ?>
                            <tr>
                                <td><?php echo $row['FilmDuration']; ?></td>
                            </tr>

                        <?php } ?>

                        </tbody>
                    </table>
                <?php endif; ?>
            <?php endif; ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div>
                    <label for="select_1">
                        <input type="radio" name="query" id="select_1" value="select_1"/>
                        ORDER BY CharacterName
                    </label>
                    <br>
                    <label for="select_2">
                        <input type="radio" name="query" id="select_2" value="select_2"/>
                        CharacterName LIKE '%ac%'
                    </label>
                    <br>
                    <label for="select_3">
                        <input type="radio" name="query" id="select_3" value="select_3"/>
                        INNER JOIN RoleType
                    </label>
                    <br>
                    <label for="select_4">
                        <input type="radio" name="query" id="select_4" value="select_4"/>
                        WHERE RoleTypeID = 3 OR RoleTypeID = 5
                    </label>
                    <br>
                    <label for="select_5">
                        <input type="radio" name="query" id="select_5" value="select_5"/>
                        SELECT MAX(FilmDuration)
                    </label>
                </div>

                <input type="submit" value="Submit"><br>
            </form>
        </div>

    <?php endif; ?>


    <iframe src="task5.txt" height="500" width="1500">
        Your browser does not support iframes.
    </iframe>
</main>

</body>
</html>