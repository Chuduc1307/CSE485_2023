<?php
class Student {
    private $id;
    private $name;
    private $age;
    
    public function __construct($id, $name, $age) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getAge() {
        return $this->age;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setAge($age) {
        $this->age = $age;
    }
}
class StudentDAO {
    private $students = array();
    private $filename = 'danhsachsinhvien.txt';
    
    public function __construct() {
        $this->readFromFile();
    }
    
    public function readFromFile() {
        $lines = file($this->filename);
        
        foreach ($lines as $line) {
            $data = explode(',', $line);
            
            $id = trim($data[0]);
            $name = trim($data[1]);
            $age = trim($data[2]);
            
            $student = new Student($id, $name, $age);
            
            $this->students[] = $student;
        }
    }
    
    public function saveToFile($student) {
        $data = $student->getId() . ',' . $student->getName() . ',' . $student->getAge() . PHP_EOL;
        file_put_contents($this->filename, $data, FILE_APPEND);
    }
    
    public function getAll() {
        return $this->students;
    }
}

// Xử lý dữ liệu POST từ form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    
    $student = new Student($id, $name, $age);
    
    $dao = new StudentDAO();
    $dao->saveToFile($student);
}

// Hiển thị danh sách sinh viên trên trang web
$dao = new StudentDAO();
$students = $dao->getAll();

// Xử lý khi người dùng nhấn nút "Thêm sinh viên"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Kiểm tra xem sinh viên đã tồn tại trong danh sách hay chưa
    $existingStudent = $studentDAO->getById($id);
    if ($existingStudent !== null) {
        echo 'Sinh viên đã tồn tại trong danh sách';
    } else {
        // Thêm sinh viên mới vào danh sách và lưu vào file TXT
        $student = new Student($id, $name, $age);
        $studentDAO->add($student);
        $studentDAO->saveToTXT('danhsachsinhvien.txt');
    }
}

// Hiển thị danh sách sinh viên sau khi thêm sinh viên mới
$students = $dao->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
</head>
<body>
    <style>
        table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th, td {
			padding: 5px;
			text-align: center;
		}
	</style>
    
</body>
<h1>Danh sách sinh viên</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Họ và tên</th>
			<th>Tuổi</th>
		</tr>
		<?php
			// Mở file danhsachsinhvien.txt
			$file = fopen("danhsachsinhvien.txt", "r");

			// Đọc dữ liệu từ file và hiển thị lên trang web
			if ($file) {
			    while (($line = fgets($file)) !== false) {
			        $info = explode(",", $line);
			        echo "<tr>";
			        echo "<td>".$info[0]."</td>";
			        echo "<td>".$info[1]."</td>";
			        echo "<td>".$info[2]."</td>";
			        echo "</tr>";
			    }
			    fclose($file);
			}
		?>
	</table>
	<br>
	<h1>Nhập thông tin sinh viên mới</h1>
	<form action="duplicatecheck.php" method="post">
		<label for="id">ID:</label>
		<input type="text" id="id" name="id"><br><br>
		<label for="name">Họ và tên:</label>
		<input type="text" id="name" name="name"><br><br>
		<label for="age">Tuổi:</label>
		<input type="text" id="age" name="age"><br><br>
		<input type="submit" value="Lưu">
	</form>
</body>
</html>