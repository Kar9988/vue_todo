<?php

namespace App\Http\Controllers;

use App\Repository\TasksRepository;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class AxiosController extends Controller
{
    protected $tasksRepo;

    public function __construct(TasksRepository $tasksRepo)
    {
        $this->tasksRepo = $tasksRepo;
    }

    public function index()
    {
        $users = User::all();

        return response($users);
    }

    public function setTask(Request $request)
    {
        $data['name'] = $request->data;
        $this->tasksRepo->store($data);
        $allTasks = $this->tasksRepo->getAllTasks();
        return response($this->tasksRepo->getAllTasks());

    }

    public function doneTask(Request $request)
    {
//        dd($request->all());
        $data = $request->all();

        $byId = $this->tasksRepo->getById($data['id']);
        $object = $byId->all();
        if (!$byId->status){

            $byId->status = 1;

        }else{
            $byId->status = 0;
        };
        $byId->save();
        return response($this->tasksRepo->getAllTasks());

    }

    public function allTasks()
    {
        $allTasks = $this->tasksRepo->getAllTasks();
        return response($allTasks);
    }

    public function destroy($id)
    {

        $this->tasksRepo->destroy($id);
        return response($this->tasksRepo->getAllTasks());
    }

}
