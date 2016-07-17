<?php
    namespace DownsMaster\Models;
    use DownsMaster\Models\Model;

    class PostsModel extends Model
    {
        public function getAll(){
            $args = func_get_args();

            if(count($args) == 0){
                $sql = $this->db->prepare("SELECT * FROM `posts` ORDER BY `id` DESC");
                $sql->execute();

                return $sql->fetchAll();
            } elseif(count($args) == 1 && is_array($args[0])) {
                $offset = $args[0]['start'];
                $maximo = $args[0]['limit'];

                $sql = $this->db->prepare("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT $offset, $maximo");
                $sql->execute();
                return $sql->fetchAll();
            }
        }
    }