<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Dog-friendly beaches map</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery-3.1.0.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>
        <?php
        include 'header.php';
        ?>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Dog-friendly beaches map</h2>
						<p>This map will show all the dog-friendly beaches in Victoria, as well as your current location. Feel free to click on the beach you would like to explore.</p>
					</header>
                                   

                                    <table width="100%" border="1px">
                                    <tr>
                                            <th>No.</th>  
                                            <th>Name</th>
                                            <th>Zone</th>
                                            <th>Address</th>
                                            <th>Description</th>
                                    </tr>
                                        <?php
                                                require_once 'databaseConnect.php';
                                                $sql = "SELECT no, name, address, zone, desc FROM beachinfo";
                                                $result = mysqli_query($dbc, $sql);
				while($row = mysqli_fetch_array($result))
				{
					Print "<tr>";
                                                Print "<td>";
                                                Print "<a href = 'desc.php?no=".$row['no']."' >" . $row["no"]."</a>";
                                                Print "</td>";
						Print '<td align="center">'. $row['name'] . "</td>";
						Print '<td align="center">'. $row['zone'] . "</td>";
						Print '<td align="center">'. $row['address']."</td>";
						Print '<td align="center">'. $row['desc']. "</td>";
					Print "</tr>";
				}
                                        ?>
<!--                                <form>

                                </form>-->
			</section>
                <?php
                include 'footer.php';
                ?>
	</body>
</html>