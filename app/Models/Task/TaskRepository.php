<?php
    namespace App\Models\Task;

    use App\Models\Task\TaskResourceModel;

    class TaskRepository{

        public $resourceModel;

        public function _construct()
        {
            $this->resourceModel = new TaskResourceModel();
        }

        public function add($model) {
            return $this->resourceModel->add($model);
        }

        public function showTask($id) {
            return $this->resourceModel->showTask($id);
        }

        public function getAll() {
            return $this->resourceModel->getAll();
        }

        public function get($id) {
            return $this->resourceModel->get($id);
        }

        public function update($model, $id) {
            return $this->resourceModel->update($model, $id);
        }

        public function delete($id) {
            return $this->resourceModel->delete($id);
        }
    }
?>