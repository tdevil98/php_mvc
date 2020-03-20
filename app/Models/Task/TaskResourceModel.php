<?php
namespace App\Models\Task;

use App\Models\Task\TaskModel;
use App\Core\ResourceModel;

class TaskResourceModel extends ResourceModel {
    public function __construct()
    {
        $task = new ResourceModel();
        $this->_init('tasks', 'id', $task);
    }
}
?>