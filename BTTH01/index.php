<!-- <?php
    $content = file_get_contents("danhsachsinhvien.txt");


    echo nl2br($content);
?> -->

<!-- <?php
    $lines = file("danhsachsinhvien.txt");

    // Hiển thị từng phần tử trong mảng
    foreach ($lines as $line) {
        echo $line;
        echo "<br>";
    }
?> -->
<!-- <?php
$file = fopen("danhsachsinhvien.txt", "r");

// Đọc từng dòng dữ liệu trong file
while (!feof($file)) {
    $line = fgets($file);
    echo $line;
    echo "<br>";
}

// Đóng file
fclose($file);
?> -->
<?php
// Đọc dữ liệu từ file students.txt và lưu vào mảng $students
$students = array();
$file = fopen("danhsachsinhvien.txt", "r");

while(!feof($file)) {
  $line = fgets($file);
  $data = explode(',', $line);
  if (count($data) == 4) {
    $id = trim($data[0]);
    $name = trim($data[1]);
    $age = trim($data[2]);
    $mail = trim($data[3]);
    $students[] = array('id' => $id, 'name' => $name, 'age' => $age, 'mail' => $mail);
  }
}

fclose($file);

// Hiển thị danh sách sinh viên lên trang web
foreach ($students as $student) {
  echo '<div>';
  echo '<p>ID: ' . $student['id'] . '</p>';
  echo '<p>Name: ' . $student['name'] . '</p>';
  echo '<p>Age: ' . $student['age'] . '</p>';
  echo '<p>mail: ' . $student['mail'] . '</p>';
  echo '</div>';
}
?>