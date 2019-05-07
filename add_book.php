<?php
session_start();
if(!$_SESSION['user']){
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
  <link rel="stylesheet" href="../styles/style.css"/>
</head>
<body>
	<nav class="navbar navbar-default">
  			<div class="container-fluid">
   				 <div class="navbar-header">
    				  <a class="navbar-brand" href="#">Library</a>
    			 </div>
				    <ul class="nav navbar-nav">
				      <li class="active"><a href="home.php">Home</a></li>
				      <li><a href="add_book.php">Add Book</a></li>
				      <li><a href="delete_book.php">Delete Book</a></li>
				      <li><a href="update_book.php">Update Book</a></li>
				      <li><a href="add_member.php">Add Member</a></li>
				      <li><a href="delete_member.php">Delete Member</a></li>
				      <li><a href="update_member.php">Update Member</a></li>
				      <li><a href="book_store.php">Book Details</a></li>
				      <li><a href="members.php">Member Details</a></li>    
				    </ul>	
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="row">
	<div class="col-md-12">
<img class="banner img-responsive" src="http://www.bu.edu/library/files/2011/07/banner_bookshelf.jpg"/>
	</div>
</div>
	<h1>Add A Book</h1>
<form action="add_book.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
			<label>Enter Book Name:</label>
			<input class="form-control" name="name" type="text"/>
			</div>
			<div class="form-group">
			<label>Enter Book ISBN :</label>
			<input class="form-control" name="isbn" type="text"/>
			</div>
			<div class="form-group">
			<label>Enter Book Category :</label>
			<input class="form-control" name="cat" type="text"/>
			</div>
			<div class="form-group">
			<label>Enter Book image :</label>
			<input class="form-control" name="image" type="file" value="Enter an image"/>
			</div>

			<input type="submit" name="sub" class="btn btn-danger"/>
		</form>
		<?php
			if(isset($_POST['sub'])){
				$bookname = $_POST['name'];
				$isbn = $_POST['isbn'];
				$cat = $_POST['cat'];
				$image = $_FILES['image']['name'];
				$temp = $_FILES['image']['tmp_name'];
				move_uploaded_file($temp, "product_images/$image");

				$con = mysqli_connect('localhost','root','','library');
				$query="insert into book_store(book_name,book_image,book_isbn,category) values('$bookname','$image','$isbn','$cat')";
				$result = mysqli_query($con,$query);
				if($result == true){
					echo "
						<script>
						alert('Book has been entered');
						</script>
					";
				}
				else{
					echo "
						<script>
						alert('Something went wrong!');
						</script>
					";	
					echo "something went wrong";
				}
				
			}
			else echo "Something went wrong";
		?>
</body>
</html>
