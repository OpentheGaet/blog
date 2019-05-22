<?php

use app\Router\Controller;
use app\Model\Query;
use app\Helper\Filter;
use model\Album;

class ControllerAlbum extends Controller
{
    private $album;

    public function __construct()
    {
        $this->album = new Album();
    }

    private function fetchAlbum()
    {
        if (isset($_GET['param'])) {
            $id = Filter::setParam($_GET['param']);
            if ($id == 0) {
                return $id;
            }
            $data = $this->album->getAlbumById();
            $result = new Query($data, $id);
            $fetch = $result->fetchData();
            return $fetch;
        }
    }

    public function Album()
    {
        $album = $this->fetchAlbum();       
        $this->loadComponents('views/user/components-album/html/component-album', $album, null);
    }
}
