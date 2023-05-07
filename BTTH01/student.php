<?php
    class Student {
        // Các thuộc tính
        public $id;
        public $name;
        public $age;
    
        // Phương thức khởi tạo
        public function __construct($id, $name, $age) {
            $this->id = $id;
            $this->name = $name;
            $this->age = $age;
        }
    
        // Phương thức getter
        public function getId() {
            return $this->id;
        }
    
        public function getName() {
            return $this->name;
        }
    
        public function getAge() {
            return $this->age;
        }
    
        // Phương thức setter
        public function setId($name) {
            $this->name = $name;
        }
    
        public function setName($name) {
            $this->name = $name;
        }
    
        public function setAge($age) {
            $this->age = $age;
        }
    
        // // Phương thức khác
        // public function displayInfo() {
        //     echo "Student Information:<br>";
        //     echo "Id: " . $this->id . "<br>";
        //     echo "Name: " . $this->name . "<br>";
        //     echo "Age: " . $this->age . "<br>";
        // }
    }
    
    // // Sử dụng lớp Sinh viên
    // $student = new Student("1", "Trần Bảo Khánh", 22);
    // $student->displayInfo();
    
    // // Cập nhật thông tin sinh viên
    // $student->setId("2");
    // $student->setName("Khánh Trần");
    // $student->setAge(23);
    // $student->displayInfo();
?>