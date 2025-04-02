<?php

namespace App\config;

class Config {
    public static function getdb() {
        if (!isset($_SESSION['db'])) {
            $_SESSION['db'] = [
                'task' => [],
                'task_list' => []
            ];
        }

        return $_SESSION['db'];
    }

    public static function saveDb($db) {
        $_SESSION['db'] = $db;
    }

    public static function addTask($taskData) {
        $db = self::getDb();
        $db['task'][] = $taskData;
        self::saveDb($db);
    }

    public static function addTaskList($taskData) {
        $db = self::getDb();
        $db['task_list'][] = $taskData;
        self::saveDb($db);
    }

    public static function deleteTask($idTask) {
        $db = self::getdb();

        $taskDB = $db['task'];
        $taskListDB = $db['task_list'];

        foreach ($taskDB as $key => $value) {
            if ($value['id'] == $idTask) {
                unset($db['task'][$key]);
            }
        }

        foreach ($taskListDB as $key => $value) {
            if ($value['id_task'] == $idTask) {
                unset($db['task_list'][$key]);
            }
        }

        $db['task'] = array_values($db['task']);
        $db['task_list'] = array_values($db['task_list']);

        self::saveDb($db);
    }
    public static function deleteIdTask($id) {
        $db = self::getdb();

        $taskList = $db['task_list'];

        foreach ($taskList as $key => $value) {
            if ($value['id'] == $id) {
                unset($db['task_list'][$key]);
            }
        }

        $db['task_list'] = array_values($db['task_list']);

        self::saveDb($db);
    }
}
