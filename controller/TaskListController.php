<?php

namespace App\Controller;

use App\http\Response;
use App\models\TaskList;
use Exception;

class TaskListController {
    public function list() {
        try {
            return TaskList::list();
        } catch (Exception $e) {
            return Response::json([
                'success' => false,
                'message' => "Server Error, Contact with out administrator",
                'error' => $e->getMessage(),
                'line_error' => $e->getLine(),
            ], 500);
        }
    }
    public function show(string $query) {
        try {
            echo $query;
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
            return TaskList::create($body['id_task'], $body['description']);
        } catch (Exception $e) {
            return Response::json([
                'success' => false,
                'message' => "Server Error, Contact with out administrator",
                'error' => $e->getMessage(),
                'line_error' => $e->getLine(),
            ], 500);
        }
    }
    public function deleteIdlist($body) {
        try {
            $id = $body['id'];
            return TaskList::delete($id);
        } catch (Exception $e) {
            return Response::json([
                'success' => false,
                'message' => "Server Error, Contact with out administrator",
                'error' => $e->getMessage(),
                'line_error' => $e->getLine(),
            ], 500);
        }
    }
    public function showListTask($data) {
        $info = $this->list();
        return Response::view(__DIR__ . "/../views/showListTask.php", $info);
    }

}