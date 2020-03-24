<?php
namespace App\Models\Task;

use App\Models\Task\TaskModel;
use App\Core\ResourceModel;

class TaskResourceModel extends ResourceModel {

    private $resourceModel;
    public function __construct()
    {
        $task = new TaskModel();
        $this->_init('tasks', 'id', $task);
    }
}
?>