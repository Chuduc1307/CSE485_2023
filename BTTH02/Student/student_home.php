<?php

try {
  $conn = new PDO("mysql:host=localhost;dbname=btth02", 'root', '2409');

  $sql = "SELECT * FROM khoahoc";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Khóa Học</title>
  </head>
  <body>
   <div class="container">
    <h1>Danh Sách Khóa Học</h1>
   <table class="table">
   <thead class="table-dark">
   <?php if (!empty($row)): ?>
      <tr>
        <th>Mã Khoá Học</th>
        <th>Tiêu Đề</th>
        <th>Mô Tả</th>
        <th>Thao Tác</th>    
      </tr>
    </thead>
    <?php foreach ($row as $row): ?>
      <tr>
        <td><?php echo $row['MaKhoahoc'];?></td>
        <td><?php echo $row['TieuDe'];?></td>
        <td><?php echo $row['MoTa'];?></td>
        <td><a href="attendance_student.php?id=<?php echo $row['ID_KhoaHoc'];?>" class="btn btn-info">Điểm Danh</a></td>
      </tr>
      <?php endforeach; ?>
</table>
<?php else: ?>
        <p>Không có sinh viên nào.</p>
    <?php endif; ?>
   </div>
  </body>
</html>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"
></script>