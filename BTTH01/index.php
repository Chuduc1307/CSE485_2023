<?php
// Import các lớp Student và StudentDAO đã được định nghĩa trước đó
require_once('Student.php');
require_once('StudentDAO.php');

// Khởi tạo đối tượng StudentDAO và đọc dữ liệu từ file students.csv
$studentDAO = new StudentDAO();
$studentDAO->readFromFile('danh_sach_sinh_vien.csv');

// Kiểm tra nếu có dữ liệu POST từ form nhập liệu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form và tạo đối tượng Student mới
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $newStudent = new Student($id, $name, $age, $grade);

    // Kiểm tra nếu sinh viên có ID đã tồn tại trong danh sách
    if ($studentDAO->isExist($id)) {
        echo '<p style="color: red;">Sinh viên với ID đã tồn tại!</p>';
    } else {
        // Nếu không có sinh viên nào có ID trùng, thêm sinh viên mới vào danh sách
        $studentDAO->add($newStudent);
        $studentDAO->writeToFile('danh_sach_sinh_vien.csv');
    }
}

// Lấy danh sách sinh viên từ database
$students = $studentDAO->getAll();

// Hiển thị danh sách sinh viên và form nhập liệu
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
    <meta charset="UTF-8">
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Grade</th>
        </tr>
        <?php if (is_array($students) && !empty($students)): ?>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student->getId() ?></td>
            <td><?= $student->getName() ?></td>
            <td><?= $student->getAge() ?></td>
            <td><?= $student->getGrade() ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Không có dữ liệu</td>
        </tr>
    <?php endif; ?>
    </table>
    <h1>Thêm sinh viên mới</h1>
    <form method="POST">
        <p>ID: <input type="text" name="id"></p>
        <p>Name: <input type="text" name="name"></p>
        <p>Age: <input type="text" name="age"></p>
        <p>Grade: <input type="text" name="grade"></p>
        <p><input type="submit" value="Thêm"></p>
    </form>
</body>
</html>
