<?php
// Đọc dữ liệu từ file students.txt và lưu vào mảng $students
$students = array();
$file = fopen("Danhsachsinhvien.txt", "r");

while(!feof($file)) {
  $line = fgets($file);
  $data = explode(',', $line);
  if (count($data) == 4) {
    $id = trim($data[0]);
    $name = trim($data[1]);
    $age = trim($data[2]);
    $class = trim($data[3]);
    $students[] = array('id' => $id, 'name' => $name, 'age' => $age, 'class' => $class);
  }
}

fclose($file);

// Hiển thị danh sách sinh viên lên trang web
foreach ($students as $student) {
  echo '<div>';
  echo '<p>id: ' . $student['id'] . '</p>';
  echo '<p>name: ' . $student['name'] . '</p>';
  echo '<p>age: ' . $student['age'] . '</p>';
  echo '<p>class: ' . $student['class'] . '</p>';
  echo '</div>';
}
?>

