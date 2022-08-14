<?php
session_start();
$conn=mysqli_connect('localhost','ragaranjini','phpmyadmin@raji13','todo');
$show = array('title' => '', 'desc' => '' , 'deadline'=> '' );
if(isset($_POST['add'])){
	$title = $_POST['title'];
    $description = $_POST['descriptionn'];
    $deadline = $_POST['deadline'];
	if(empty($_POST['title'])){
		$show['title'] = '* Title is required *';
	}else if(empty($_POST['descriptionn'])){
        $show['desc'] = '* Description is required *';
    }else if(empty($_POST['deadline'])){
        $show['deadline'] = '*Deadline is required *';
    }else{
        function function_alert($message) {
      
            // Display the alert box 
            echo "<script>alert('$message');</script>";
        }
        $query = "SELECT * FROM todolist WHERE title='$title' ";
        $query_run = mysqli_query($conn,$query);
        if (mysqli_num_rows($query_run)==1) 
{
    function_alert("This ToDo already exists !");
}else{
    $sql = "INSERT INTO todolist(title,descriptionn,deadline) VALUES ('$title','$description','$deadline')";
        if(mysqli_query($conn,$sql)){
            function_alert("New ToDo added !");
        }else{
            function_alert("*error interupt* --check DB connection ! ");
        }
}
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adding ToDo</title>
        <link href="css/app.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="add.css" type="text/css" />
    </head>
    <body style="background-color: black;">
        <div class="card bg-shadow rounded" style="background-color: black;">
        <form action="#" method="POST">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="title for your ToDo">
            <p class="red-text" ><?php echo $show['title']; ?></p>
            <br>
            <label for="description">Description</label>
            <textarea name="descriptionn" id="description"></textarea>
            <p class="red-text" ><?php echo $show['desc'] ?></p>
            <br>
            <label for="priority">priority</label>
            <input type="text" name="deadline" id="priority" placeholder="priority of this task">
            <p class="red-text" ><?php echo $show['deadline'] ?></p>
            <br>
            <input class="btn btn-dark" type="submit" id="btn" name="add">
        </form>
        </div>
        <br>
        <br>
        
        <button class="btn btn-primary" ><a href="index.php">Go Back</a></button>
    </body>
</html>