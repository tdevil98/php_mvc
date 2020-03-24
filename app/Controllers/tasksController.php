<?php

namespace App\Controllers;

require "../vendor/autoload.php";

use App\Core\Controller;
use App\Models\Task\TaskRepository;

class TasksController extends Controller
{
    private $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    function index()
    {
        $task = $this->taskRepository->getAll();
        $d['tasks'] = $task;
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            if ($this->taskRepository->add($_POST))
            {
                header("Location: " . WEBROOT . "/tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {

        $d["task"] = $this->taskRepository->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($this->taskRepository->update($id, $_POST))
            {
                header("Location: " . WEBROOT . "/tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {

        if ($this->taskRepository->delete($id))
        {
            header("Location: " . WEBROOT . "/tasks/index");
        }
    }
}
?>