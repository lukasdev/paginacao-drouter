<?php
    namespace DownsMaster\Models;

    class Model
    {
        protected $db;

        public function __construct(\PDO $db){
            $this->db = $db;
        }
    }