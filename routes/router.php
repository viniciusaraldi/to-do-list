<?php

return [
    'get' => [
        '/' => 'TaskController@viewList',
        '/list' => 'TaskController@list',
        '/show' => 'TaskController@show',
        '/views-create' => 'TaskController@viewCreate',
        '/views-create-list' => 'TaskListController@showListTask',
        '/views-show-list' => 'TaskController@showTask',
    ],
    'post' => [
        '/new-task' => 'TaskController@create',
        '/new-task-list' => 'TaskListController@create',
    ],
    'delete' => [
        '/delete' => 'TaskController@delete',
        '/task-list' => 'TaskListController@deleteIdlist',
    ]
];