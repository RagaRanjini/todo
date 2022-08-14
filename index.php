<?php
session_start();
$conn=mysqli_connect('localhost','ragaranjini','phpmyadmin@raji13','todo');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My ToDos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            img{
                width: 80%;
                height: 850px;
                margin-left: 0px;
            }
            .card{
                width:500px;
                height:auto;
                margin:150px 70px 100px 100px;
                border-width:7px;
            }
            button{
                border-width:4px;
            }
            button a{
                text-decoration:none;
            }
            button a:hover{
                color:black;
            }
            button a b{
                font-family: Sans-serif;
                font-size: 12pt;
            }
            h4 a{
                text-decoration: none;
                color: black;
            }
            .desc{
                display: none;
            }
            .title:hover + .desc{
                display: block;
                color: red;

            }
        </style>
    </head>
    <body style="background-color: black;">
        <div class="row">
            <div class="col">
                <img src="todopic.jpg" alt="todo_image">
            </div>
            <div class="col" style="background-color: black;">
                <div class="card border-secondary">
                    <div class="card-header border-secondary bg-secondary text-white">
                        <div class="row">
                            <div class="col-8">
                            <h2>< Things to do ></h2>
                            </div>
                            <div class="col" style=" margin-top : 10px;">
                                <a href="add.php" class="rounded border-black bg-dark text-white" style="padding:10px;margin-left: 60px;text-decoration: none;"><b> New </b><i class="fa fa-plus" style="font-size: 15px;"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5><b>TASK</b></h5>
                            </div>
                            <div class="col">
                                <h5><b>PRIORITY</b></h5>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT title,deadline,descriptionn FROM todolist ";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <div class="row">
                                        <div class="col">
                                        <div class="title" style="cursor: pointer"><h4><?php echo $row['title'];?></h4></div>
                                        <div class="desc"><p><?php echo $row['descriptionn'];?></p></div>
                                        </div>
                                        <div class="col">
                                        <div class="deadline" style="cursor: pointer"><h4><?php echo $row['deadline'];?></h4></div>
                                        </div>
                                </div>
                                <?php
                            }
                        }?>
                    </div>
                </div>
                <div class="row" style="margin-left: 500px;">
                <a href="delete.php"><b>Delete ?</b></a>
                </div>
            </div>
        </div>

    </body>
</html>