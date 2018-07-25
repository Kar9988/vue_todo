<?php
/**
 * Created by PhpStorm.
 * User: kar
 * Date: 7/23/18
 * Time: 11:22 AM
 */

namespace App\Contract;


interface TasksContract
{
    public function store($data);

    public function done($id,$object);

    public function getById($id);

    public function getAllTasks();

    public function destroy($id);

}