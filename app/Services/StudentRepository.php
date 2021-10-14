<?php

namespace App\Services;

use App\Models\Student;

class StudentRepository {
    
    protected $student;

    public function __construct(Student $student) {
        $this->student = $student;
    }

    public function validateData($data) {
        $validated = $data->validate([
            "name" => 'required|max:50',
            "contact" => 'required|digits:10',
            "class" => 'required|max:50',
            "course" => 'required|max:50',
        ]);

        return $validated;
    }

    public function insertStudent($data) {

        $validated = $this->validateData($data);
        $this->student->name = $validated['name'];
        $this->student->contact = $validated['contact'];
        $this->student->class = $validated['class'];
        $this->student->course = $validated['course'];
        $this->student->save();
    }

    public function showStudents() {
        $records = $this->student->paginate(3);
        return $records;
    }

    public function showStudent($id) {
        $records = $this->student->find($id);
        return $records;
    }

    public function updateStudent($request, $id) {
        $validated = $this->validateData($request);
        $this->student->where('id', '=', $id)->update($validated);
    }

    public function deleteStudent($id) {
        $this->student->find($id)->delete();
    }

    public function showAll() {
        $records = $this->student->all();
        return $records;
    }
}