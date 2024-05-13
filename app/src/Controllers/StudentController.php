<?php
namespace Controllers;

use Repositories\StudentRepository;

//use \Response;
//require_once __DIR__ . '/../Services/Response.php';

class StudentController {
    use \Services\Response;

    public function index() {
        $studentRepository = new StudentRepository();
        $students = $studentRepository->getAll();

        $viewData = [
            'students' => $students,
						'title' => "Hello"
        ];

        $this->render('StudentListTemplate', $viewData);
    }
}
