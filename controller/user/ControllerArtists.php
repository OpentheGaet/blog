<?php

use app\Router\Controller;
use app\Model\Query;
use model\Artist;

class ControllerArtists extends Controller
{
    private $artists;

    public function __construct()
    {
        $this->artists = new Artist();
    }

    private function fetchArtists()
    {
        $artists = $this->artists->getArtists();
        $result = new Query($artists, null);
        $fetch = $result->fetchData();
        return $fetch;
    }

    function Artists()
    {
        $artists = $this->fetchArtists();
        $this->loadComponents('views/user/components-artists/html/component-artists', $artists, null);
    }
}

