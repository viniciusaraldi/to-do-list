<?php

namespace App\models;

use App\config\Config;
use App\http\Response;
use PDOException;

class TaskList {
    protected $sessionDb;
    public static function list(int $id = null) {
        try {
            if (!isset($_SESSION['db'])) {
                $_SESSION['db'] = [
                    'task' => [],
                    'task_list' => []
                ];
            } else {
                return Response::json([
                    'success' => true,
                    'message' => "Founded Task",
                    'data' => Config::getDb(),
                ]);
            }
        } catch (PDOException $e) {
            return Response::json([
                'success' => false,
                'error' => "We have a problem in the consult the database",
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public static function create($idTask, $description) {
        try {
            $dataTaskList = Config::getDb()['task_list'];
            $id = '';
            foreach ($dataTaskList as $idTaskList) {
                $id = $idTaskList['id'] + 1;
            }
            $taskData = [
                'id' => $id,
                'id_task' => $idTask,
                'description' => $description,
            ];           
            Config::addTaskList($taskData);
            return Response::json([
                'success' => true,
                'message' => "Task create with success!",
                'data' => Config::getdb(),
            ]);
        } catch (PDOException $e) {
            return Response::json([
                'success' => false,
                'error' => "We have a problem in the consult the database",
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public static function delete($id) {
        try {          
            Config::deleteIdTask($id);
            return Response::json([
                'success' => true,
                'message' => "Task delete with success!",
            ]);
        } catch (PDOException $e) {
            return Response::json([
                'success' => false,
                'error' => "We have a problem in the consult the database",
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}