<!DOCTYPE <!DOCTYPE html>

<?php
    //Connect to the database
    include('database/connect.php');
    
    //Get the search terms as an array
    $terms = explode(" ", $_GET['q']);
    
    $query = 'SELECT * FROM tblPages WHERE tags LIKE $1';
    $terms[0] = "%".$terms[0]."%";
    for($i = 1; $i < count($terms); $i++) {
        $terms[$i] = "%".$terms[$i]."%"; //Add the wildcard characters
        $query = $query.' OR tags LIKE $'.($i + 1);
    }
    
    $result = pg_query_params($query, $terms);
?>

<html>
    <head>
        <title>About Us - Beat It</title>
             <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="js/cookie.js"></script>
        <script src="js/login.js"></script>
        <script src="js/navigation.js"></script>
    </head>
    <body>
        <?php include 'header.php' ?>
        
        <section>
            <div class="content">
                <h1>SEARCH</h1>
                <article>
                    <h3>Search results for "<?php echo $_GET['q'] ?>"</h3>
                    <ul>
                        <?php
                            if (pg_num_rows($result) > 0) {
                                //List all the pages
                                foreach (pg_fetch_all($result) as $page) {
                                    echo "<li>";
                                    echo "<a href=".$page["path"].">".$page["name"]."</a>";
                                    echo "</li>";
                                }
                            }
                            else {
                                //There were no results
                                echo "<li>Your search returned no results.</li>";
                            }
                        ?>
                    </ul>
                </article>
            </div>
        </section>

        <?php include 'footer.php' ?>
    </body>
</html>