<?php
    namespace DownsMaster\Helpers;

    class Paginator
    {
        protected $total;
        protected $quantity;
        protected $link;
        protected $getPage;

        protected $pg;

        public function __construct($total, $link, $quantity, $getPage = 'page'){
            $this->total = $total;
            $this->link = $link;
            $this->quantity = $quantity;
            $this->getPage = $getPage;

            $this->pg = (isset($_GET[$this->getPage])) ? $_GET[$this->getPage] : 1;
        }

        public function offset(){
            $page = $this->pg;
            $offset = (--$page) * $this->quantity;

            return $offset;
        }

        public function links(){
            $links = '';
            $paginas = ceil($this->total/$this->quantity);
            $link = $this->link.'?'.$this->getPage.'=';
            $maxlinks = 4;

            if ($this->total > $this->quantity) {
                $links .= '<ul class="pagination">';
                $links .= '<li><a href="'.$link.'1">Primeira Página</a></li>';
                for($i = $this->pg - $maxlinks; $i<= $this->pg-1; $i++){
                    if($i >= 1){
                        $links .= '<li><a href="'.$link.$i.'">'.$i.'</a></li>';
                    }
                }
                $links .= '<li><a href="#"><b>'.$this->pg.'</b></a></li>';
                for($i = $this->pg+1; $i<=$this->pg+$maxlinks; $i++){
                    if($i <= $paginas){
                        $links .= '<li><a href="'.$link.$i.'">'.$i.'</a></li>';
                    }
                }
                $links .= '<li><a href="'.$link.$paginas.'">Última Página</a></li>';
                $links .= '</ul>';
            }

            return $links;
        }
    }