<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>"><br><br>

        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>"><br><br>

        <label for="age">Tuổi:</label>
        <input type="text" id="age" name="age" value="<?php echo isset($_GET['age']) ? $_GET['age'] : ''; ?>"><br><br>

        <input type="submit" value="Lưu">
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Tuổi</th>
        </tr>
        <?php
        $file = fopen("students.txt", "r");

        if ($file) {
            while (($line = fgets($file)) !== false) {
                $info = explode(",", $line);
                $students[] =array("id"=>$info[0],"name"=>$info[1],"age"=>$info[2]);
                echo "<tr>";
                echo "<td>" . $info[0] . "</td>";
                echo "<td>" . $info[1] . "</td>";
                echo "<td>" . $info[2] . "</td>";
                echo "</tr>";
            }
            fclose($file);
        }

        ?>
    </table>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    $found = false;
    foreach ($students as $student) {
        if ($student['id'] == $id) {
            $found = true;
            break;
        }
    }

    if (!$found) {
        $file = fopen("students.txt", "a");
        fwrite($file, "$id, $name, $age\n");
        fclose($file);
    }

    header("Location: index.php");
    exit();
}
?>