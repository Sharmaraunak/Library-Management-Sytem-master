<?php
session_start();
if(!$_SESSION['public_user']){
	echo "
		<script>
		window.location.href='login.php';
		</script>
	";
}
?>

<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./styles/style.css"/>
</head>
<body>
	<nav class="navbar navbar-default">
  			<div class="container-fluid">
   				 <div class="navbar-header">
    				  <a class="navbar-brand" href="#">Library</a>
    			 </div>
				    <ul class="nav navbar-nav">
				      <li class="active"><a href="#">Home</a></li>
				      <li><a href="issue.php">Issue Book</a></li>
				      <li><a href="reserve.php">Reserve Book</a></li>
				     
				      
				    </ul>	
    <ul class="nav navbar-nav navbar-right">
     <li>
						<form action="search.php" method="GET" style="margin-top:10px">
					    	<input type="text" name="search" placeholder="Enter Search Query"/>
					    	<input type="submit" name="submit"/>
						</form>
						
				       </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<!--banner-->
<div class="row">
	<div class="col-md-12">
<img class="banner img-responsive" src="1.jpg"/>
	</div>
</div>
<!---->
<div class="row">
	<div class="col-md-12">
		<h1>Please select a book</h1>
	</div>
</div>
<div class="row">
	<?php
		$con = mysqli_connect('localhost','root','','library');
		$query = "select * from book_store";
		$result = mysqli_query($con,$query);
		foreach ($result as $value) {
			$img = $value['book_image'];
			$id = $value['book_id'];
			echo "
				<div class='col-md-4 img responsive'>
					<img src='./images/$img' class='book img-responsive'/>
					<button class='btn btn-primary'><a href='issue.php?id=$id'> Issue Book </a></button>
					<button class='btn btn-primary'><a href='reserve.php?id=$id'> Reserve Book</a></button>
				</div>
			";
		}
	?>
</div>

<div class="footer">
	<div class="row">
		<div class="col-md-12">
			<h2 class="footer-head">&copy; 2017 Library Mangement System</h2>
		</div>
	</div>
</div>
</body>
</html>