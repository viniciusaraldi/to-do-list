<?php

namespace App\Controller;

use App\http\Response;
use App\models\Task;
use Exception;

class TaskController {
    public function list() {
        try {
            return Task::list();
        } catch (Exception $e) {
            return Response::json([
                'success' => false,
                'message' => "Server Error, Contact with out administrator",
                'error' => $e->getMessage(),
                'line_error' => $e->getLine(),
            ], 500);
        }
    }
    public function create($body) {
        try {
            return Task::create($body['name'], $body['description']);
        } catch (Exception $e) {
            return [
                'status' => 500,
                'response' => "Server Error, Contact with out administrator",
                'error' => $e->getMessage(),
                'line_error' => $e->getLine(),
            ];
        }
    }
    public function show($query) {
        try {
            // id=1, separa para 0 -> id, 1 -> 1.
            return Task::show(explode("=", $query)[1]);
        } catch (Exception $e) {
            return [
                'status' => 500,
                'response' => "Server Error, Contact with out administrator",
                'error' => $e->getMessage(),
                'line_error' => $e->getLine(),
            ];
        }
    }
    public function delete($data) {
        $task = json_decode(Task::show($data['id']),true);
        $dataTask = $task['message'][0][0];
        return Task::delete($dataTask);
    }

    public function viewList($data) {
        $info = $this->list();
        return Response::view(__DIR__ . "/../views/to-do.php", $info);
    }

    public function viewCreate() {
        return Response::view(__DIR__ . "/../views/createTask.php");
    }
}