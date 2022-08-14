<?php
session_start();
$conn=mysqli_connect('localhost','ragaranjini','phpmyadmin@raji13','todo');
$show = array('title' => '');
if(isset($_POST['del'])){
	$title = $_POST['del_title'];
	if(empty($_POST['del_title'])){
		$show['title'] = '* Title is required *';
	}else{
        function function_alert($message) {
      
            // Display the alert box 
            echo "<script>alert('$message');</script>";
        }
        $query = "SELECT * FROM todolist WHERE title='$title' ";
        $query_run = mysqli_query($conn,$query);
        if (mysqli_num_rows($query_run)==1) 
{
    $sql = "DELETE FROM todolist WHERE title= '$title'";
        if(mysqli_query($conn,$sql)){
            function_alert("Deletion completed !");
        }else{
            function_alert("*error interupt* --check DB connection ! ");
        }
}else{
    function_alert("No such ToDo exist to delete --check again !");; 
}
        
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>deleting-task</title>
        <link href="css/app.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="delete.css" type="text/css" />
    </head>
    <body style="background-color: black;">
        <form action="#" method="POST">
            <label for="title">title</label>
            <input type="text" placeholder="enter the title of the ToDo to delete" name="del_title">
            <p class="red-text" ><?php echo $show['title']; ?></p>
            <br>
            <br>
            <input class="btn btn-dark" type="submit" id="btn" name="del">
        </form>
        <br>
        <br>
        <button class="btn btn-primary" ><a href="index.php">Go Back</a></button>
    </body>
</html>