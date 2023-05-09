<?php
// Định nghĩa lớp Student với ba thuộc tính
class Student {
    public $id;
    public $name;
    public $age;

    // Phương thức khởi tạo
    public function __construct($id, $name, $age) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    // Các phương thức getters và setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }
}

// Tạo một danh sách các đối tượng Student
$students = array(
    new Student(1, "Alice", 20),
    new Student(2, "Bob", 21),
    new Student(3, "Charlie", 22),
    new Student(4,'Emily Davis',12),
    new Student(5,'James Rodri',14)
);
?>


