<?php
/**
 * Created by PhpStorm.
 * User: kar
 * Date: 7/23/18
 * Time: 11:22 AM
 */

namespace App\Repository;


use App\Contract\TasksContract;
use App\Task;

class TasksRepository implements TasksContract
{
    private $task;

    public function __construct()
    {
        $this->task = new Task();
    }

    public function store($data)
    {
        return $this->task->create($data);
    }

    public function done($id,$object)
    {
        return $object->update($id);
    }

    public function getAllTasks()
    {
        return $this->task->all();
    }

    public function getById($id)
    {
        return $this->task->where('id',$id)->first();
    }

    public function destroy($id)
    {
        return $this->task->where('id',$id)->delete();
    }
}