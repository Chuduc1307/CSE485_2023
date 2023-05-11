<?php
require_once('Student.php');
class StudentDAO {
    private static $students = array();
    public function __construct() {
        self::loadFromFile("danh_sach_sinh_vien.csv");
    }

    public function add(Student $student) {
        self::$students[$student->getId()] = $student;
        if (!self::isExist($student->getId())) {
            self::$students[$student->getId()] = $student;
        } else {
            throw new Exception("ID Sinh viên đẫ tồn tại");
        }
    }

    public function read($id) {
        return self::$students[$id];
    }

    public function update(Student $student) {
        self::$students[$student->getId()] = $student;
    }

    public function delete($id) {
        unset(self::$students[$id]);
    }

    public function getAll() {
        return self::$students;
    }

    public function readFromFile($filename) {
        $json = file_get_contents($filename);
        $data = json_decode($json, true);
        if (!empty($data)) {
            foreach ($data as $student) {
                $this->create(new Student($student['id'], $student['name'], $student['age'], $student['grade']));
            }
        }
    }

    public function writeToFile($filename) {
        $file = fopen($filename, 'w');
        foreach (self::$students as $student) {
            $line = $student->getId() . ',' . $student->getName() . ',' . $student->getAge() . ',' . $student->getGrade() . PHP_EOL;
            fwrite($file, $line);
        }
        fclose($file);
    }

    public static function loadFromFile($filename) {
        $file = fopen($filename, "r");

        if ($file) {
            while (($line = fgets($file)) !== false) {
                $data = explode(",", $line);

                $id = trim($data[0]);
                $name = trim($data[1]);
                $age = trim($data[2]);
                $grade = trim($data[3]);

                $student = new Student($id, $name, $age, $grade);
                self::$students[] = $student;
            }

            fclose($file);
        }
    }
    public function isExist($studentId) {
        foreach (self::$students as $student) {
            if ($student->getId() == $studentId) {
                return true;
            }
        }
        return false;
    }
    
}
?>
