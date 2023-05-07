<?php
// Kiểm tra xem form đã được gửi đi hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Kiểm tra xem các trường dữ liệu đã được nhập đầy đủ hay chưa
    if (empty($id) || empty($name) || empty($age)) {
        echo 'Vui lòng nhập đầy đủ thông tin sinh viên';
    } else {
        // Kiểm tra xem sinh viên đã tồn tại trong danh sách hay chưa
        $studentExists = false;

        // Đọc dữ liệu từ file "danhsachsinhvien.txt"
        $file = fopen("danhsachsinhvien.txt", "r");
        if ($file) {
            while (($line = fgets($file)) !== false) {
                $info = explode(",", $line);
                if ($info[0] == $id) {
                    $studentExists = true;
                    break;
                }
            }
            fclose($file);
        }

        if ($studentExists) {
            echo 'Sinh viên đã tồn tại trong danh sách';
        } else {
            // Lưu dữ liệu sinh viên mới vào file "danhsachsinhvien.txt"
            $newStudent = $id . ',' . $name . ',' . $age . "\n";
            file_put_contents("danhsachsinhvien.txt", $newStudent, FILE_APPEND);
            echo 'Thêm sinh viên thành công';

            // Chuyển hướng về form thêm sinh viên với dữ liệu đã thêm
            header("Location: StudentDAO.php?id=$id&name=$name&age=$age");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kiểm tra trùng lặp</title>
</head>
<body>
    <h1>Thêm sinh viên</h1>

    <form method="POST">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>"><br><br>

        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>"><br><br>

        <label for="age">Tuổi:</label>
        <input type="text" id="age" name="age" value="<?php echo isset($_GET['age']) ? $_GET['age'] : ''; ?>"><br><br>

        <input type="submit" value="Lưu">
    </form>
</body>
</html>
