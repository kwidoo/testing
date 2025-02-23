<?php

namespace App\Http\Controllers;

use App\Http\Resources\DefaultTableResource;
use Illuminate\Http\Request;

class DefaultTableController extends Controller
{
    public function index()
    {
        return  new DefaultTableResource(
            [
                ['id' => 1, 'title' => 'Task 1', 'status' => 'Pending', 'notes' => 'Notes for task 1'],
                ['id' => 2, 'title' => 'Task 2', 'status' => 'Completed', 'notes' => 'Notes for task 2'],
                ['id' => 3, 'title' => 'Task 3', 'status' => 'In Progress', 'notes' => 'Notes for task 3'],
                ['id' => 4, 'title' => 'Task 4', 'status' => 'Pending', 'notes' => 'Notes for task 4'],
                ['id' => 5, 'title' => 'Task 5', 'status' => 'Completed', 'notes' => 'Notes for task 5'],
                ['id' => 6, 'title' => 'Task 6', 'status' => 'In Progress', 'notes' => 'Notes for task 6'],
                ['id' => 7, 'title' => 'Task 7', 'status' => 'Pending', 'notes' => 'Notes for task 7'],
                ['id' => 8, 'title' => 'Task 8', 'status' => 'Completed', 'notes' => 'Notes for task 8'],
                ['id' => 9, 'title' => 'Task 9', 'status' => 'In Progress', 'notes' => 'Notes for task 9'],
                ['id' => 10, 'title' => 'Task 10', 'status' => 'Pending', 'notes' => 'Notes for task 10'],
                ['id' => 11, 'title' => 'Task 11', 'status' => 'Completed', 'notes' => 'Notes for task 11'],
                ['id' => 12, 'title' => 'Task 12', 'status' => 'In Progress', 'notes' => 'Notes for task 12'],
                ['id' => 13, 'title' => 'Task 13', 'status' => 'Pending', 'notes' => 'Notes for task 13'],
                ['id' => 14, 'title' => 'Task 14', 'status' => 'Completed', 'notes' => 'Notes for task 14'],
                ['id' => 15, 'title' => 'Task 15', 'status' => 'In Progress', 'notes' => 'Notes for task 15'],
                ['id' => 16, 'title' => 'Task 16', 'status' => 'Pending', 'notes' => 'Notes for task 16'],
                ['id' => 17, 'title' => 'Task 17', 'status' => 'Completed', 'notes' => 'Notes for task 17'],
                ['id' => 18, 'title' => 'Task 18', 'status' => 'In Progress', 'notes' => 'Notes for task 18'],
                ['id' => 19, 'title' => 'Task 19', 'status' => 'Pending', 'notes' => 'Notes for task 19'],
                ['id' => 20, 'title' => 'Task 20', 'status' => 'Completed', 'notes' => 'Notes for task 20'],
            ]
        );
    }
}
