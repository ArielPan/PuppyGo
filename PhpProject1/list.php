<!DOCTYPE html>
<html lang="en">
<title>Dog-friendly Beaches List</title>
    <?php
        include 'header.php';
    ?>
<body>
                    <!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Dog-friendly beaches list</h2>
						<p>This list shows all the dog-friendly beaches in Victoria. Feel free to click on the beach you would like to explore.</p>
					</header>    
                                    <form>
                                        <?php
                                        // set up database connection
                                                require_once 'databaseConnect.php';
                                                // select all odd number beaches
                                                $sql = "SELECT * FROM beachinfo where no%2=1";
                                                // select all even number beaches
                                                $sql1 = "select * from beachinfo where no%2=0";
                                                $result = mysqli_query($dbc, $sql);
                                                $result1 = mysqli_query($dbc, $sql1);
                                                //retrive data from database and show all the data in a table
                                           while(($row = mysqli_fetch_array($result)) &&  ($row1 = mysqli_fetch_array($result1)))
                                            {
                                               
                                                echo "<table>";
                                                echo "<tr>";
                                                echo "<td>";
                                                echo '<a href = "description.php?no='.$row['no'].'"> ';
                                                echo ' <img style="width: 470px; height: 200px"; src="'.$row['img_url'].'" width="1600" height="60" />';
                                                echo '<head><b><a href = "description.php?no='.$row['no'].'" > '.$row['name'].'</a></b></head>';
                                                echo '<p><i>'.$row['address'].'</i></p>';
                                                echo "</td>";
                                                echo "<td >";
                                                echo '<a href = "description.php?no='.$row1['no'].'"> ';
                                                echo ' <img style="width: 470px; height: 200px"; src="'.$row1['img_url'].'" width="1600" height="60" />';
                                                echo '<head><b><a href = "description.php?no='.$row1['no'].'" > '.$row1['name'].'</a></b></head>';
                                                echo '<p><i>'.$row1['address'].'</i></p>';
                                                echo "</td>";
                                                echo "</tr>";
                                               
                                                echo "</table>";
                                            }
                                        ?>
                                    </form>   
                                </div>
			</section>
        <?php
        include 'footer.php';
    ?>        
	</body>
</html>