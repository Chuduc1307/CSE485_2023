<?php
class StudentDAO {
    private $students = array();

    public function create(Student $student) {
        $this->students[] = $student;
    }

    public function read($id) {
        foreach ($this->students as $student) {
            if ($student->getId() == $id) {
                return $student;
            }
        }
        return null;
    }

    public function update(Student $student) {
        foreach ($this->students as $key => $s) {
            if ($s->getId() == $student->getId()) {
                $this->students[$key] = $student;
                return true;
            }
        }
        return false;
    }

    public function delete($id) {
        foreach ($this->students as $key => $student) {
            if ($student->getId() == $id) {
                unset($this->students[$key]);
                return true;
            }
        }
        return false;
    }

    public function getAll() {
        return $this->students;
    }
}
  
?>