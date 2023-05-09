<?php
    require "Student.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

    <table class="table">
  <thead>
    <h1 class="display-3">Student Lits</h1>
  <a class="btn btn-primary" href="add.php" >Add Student</a>

    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  
  <tbody>
  <?php
        foreach ($students as $student) {
         ?>   
            <tr>
                <th scope="row">
                <?php echo $student->getId(); ?></th>
                <td><?php echo  $student->getName(); ?></td>
                <td><?php echo $student->getAge(); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $student->getId();?>"><i class="bi bi-pencil-square"></i></a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $student->getId();?>"><i class="bi bi-trash3-fill"></i></a>
                </td>
            </tr>
            
    <?php
        }
    ?>
        
  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>