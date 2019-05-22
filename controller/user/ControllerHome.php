<?php

use app\Router\Controller;
use app\Model\Query;
use model\Album;
use model\Style;
use model\Artist;

class ControllerHome extends Controller
{
    private $albums;
    private $styles;
    private $artists;

    public function __construct()
    {
        $this->albums = new Album();
        $this->styles = new Style();
        $this->artists = new Artist();
    }

    public function readAlbums()
    {
        $albums = $this->albums->getAlbums();
        $result = new Query($albums, null);
        $ajax = $result->fetchData();
        return $ajax;
    }

    public function readStyles() 
    {
        $styles = $this->styles->getStyle();
        $result = new Query($styles, null);
        $ajax = $result->fetchData();
        return $ajax;
    }

    public function readArtists() 
    {
        $artists = $this->artists->getArtists();
        $result = new Query($artists, null);
        $ajax = $result->fetchData();
        return $ajax;
    }

    public function Home()
    {
        $this->loadComponents('views/user/components-home/html/component-slider', null);
        $this->loadComponents('views/user/components-home/html/component-musicians', null);
    }
}
