<?php

namespace App\models;

use App\config\Config;
use App\http\Response;
use PDOException;
use ReturnTypeWillChange;

class Task {
    protected $sessionDb;
    public static function list() {
        try {
            $db = Config::getDb();
            if (!isset($_SESSION['db'])) {
                $_SESSION['db'] = [
                    'task' => [],
                    'task_list' => []
                ];
            } else {
                return Response::json([
                    'success' => true,
                    'message' => "Task Founded",
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
    public static function show(string $id) {
        try {
            $responseTask = [];
            $repsonseTaskList = [];
            if ($id !== null) {
                $info = Config::getdb();
                foreach ($info['task'] as $value) {
                    if ($value['id'] == $id) {
                        $responseTask[] = $value;
                    }
                }
                foreach ($info['task_list'] as $value) {
                    if ($value['id_task'] == $id) {
                        $repsonseTaskList[] = [
                            'message' => $value,
                        ];
                    }
                }
                return Response::json([
                    'success' => true,
                    'message' => [
                        $responseTask,
                        $repsonseTaskList,
                    ],
                ], 200);
            } else {
                return Response::json([
                    'success' => false,
                    'error' => "Id not founded",
                ], 404);
            }
        } catch (PDOException $e) {
            return Response::json([
                'success' => false,
                'error' => "We have a problem in the consult the database",
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public static function create($name, $description) {
        try {
            $taskData = [
                'id' => count(Config::getDb()['task']) + 1,
                'name' => $name,
                'description' => $description,
            ];           
            Config::addTask($taskData);
            return Response::json([
                'success' => true,
                'message' => "Tast create with success!",
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

    public static function delete($task) {
        try {
            return Response::json([
                'success' => true,
                'message' => "Task delete with success!",
                'data' => Config::deleteTask($task['id']),
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