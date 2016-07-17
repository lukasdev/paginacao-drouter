<?php
    namespace DownsMaster\Controllers;

    class Controller
    {
        protected $container;
        protected $db;

        public function __construct(\DRouter\Container $container)
        {
            $this->container = $container;
            $this->db = new \PDO('mysql:host=localhost;dbname=downsmaster', 'root', 'downs');
        }
    }