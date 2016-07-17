<?php
    namespace DownsMaster\Controllers;
    use DownsMaster\Controllers\Controller;
    use DownsMaster\Models\PostsModel as Posts;
    use DownsMaster\Helpers\Paginator;

    class HomeController extends Controller
    {
        public function index(){
           $posts = new Posts($this->db);
           $total = count($posts->getAll());
           $link = $this->container->router->pathFor('home');
           $limit = 2;

           $paginator = new Paginator($total, $link, $limit);
           $registros = $posts->getAll([
                'start' => $paginator->offset(),
                'limit' => $limit
            ]);

           $this->container->render->load('home.php', [
                'registros' => $registros,
                'links' => $paginator->links()
            ]);
        }
    }