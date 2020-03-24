<?php
    namespace App\Core;

    use App\Config\Database;

    class ResourceModel implements ResourceModelInterface{
        private $table;
        private $id;
        private $model;

        public function _init($table, $id, $model)
        {
            $this->table = $table;
            $this->id = $id;
            $this->model = $model;
        }

        public function save($model)
        {

        }

        public function add($model)
        {
            $modelStr = "";
            $valueStr = "";
            foreach ($model as $key => $value){
                $modelStr .=  $key . ", ";
                $valueStr .= "\"" . $value . "\", ";
            }
            $sql = "INSERT INTO " .$this->table. " ( ". $modelStr . "  created_at, updated_at) VALUES (" . $valueStr . "  :created_at, :updated_at)";
            var_dump($sql);
            $req = Database::getBdd()->prepare($sql);
            return $req->execute([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        public function showTask($id)
        {
            $sql = "SELECT * FROM" . $this->table . " WHERE id =" . $id;
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetch();
        }

        public function showAllTasks()
        {
            $sql = "SELECT * FROM " . $this->table;
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            return $req->fetchAll();
        }

        public function edit($id, $model)
        {
            $update = "";
            foreach ($model as $key => $value){
                $update .=  $key . "= \"" . $value . "\", ";
            }
            $sql = "UPDATE " .  $this->table."  SET ". $update ." updated_at = :updated_at WHERE id = :id";

            $req = Database::getBdd()->prepare($sql);

            return $req->execute([
                'id' => $id,
                'updated_at' => date('Y-m-d H:i:s')

            ]);
        }

        public function delete($id)
        {
            $sql = "DELETE FROM " . $this->table . " WHERE id =" . $id;
            $req = Database::getBdd()->prepare($sql);
            return $req->execute([$id]);
        }
    }
?>