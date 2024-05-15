<?php
namespace Simplimmo\Controllers;

use Simplimmo\Repositories\StudentRepository;

class StudentController {
    use \Services\Response;

    public function index() {
        zlog(__CLASS__ . " / " . __FUNCTION__);
        $studentRepository = new StudentRepository();
        $students = $studentRepository->getAll();

        $viewData = [
            'students' => $students,
						'title' => "Hello"
        ];

        $this->render('StudentListTemplate', $viewData);
    }
}
