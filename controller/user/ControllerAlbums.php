<?php

use app\Router\Controller;
use app\Model\Query;
use model\Album;

class ControllerAlbums extends Controller
{
    private $albums;
    private $queryTable;

    public function __construct()
    {
        $this->albums = new Album();
    }

    private function fetchAlbums() 
    {
        $albums = $this->albums->getAlbums();
        $result = new Query($albums, null);
        $fetch = $result->fetchData();
        return $fetch;
    }

    public function Albums()
    {
        $albums = $this->fetchAlbums();
        $this->loadComponents('views/user/components-albums/html/component-albums', $albums, null);
    }
}

