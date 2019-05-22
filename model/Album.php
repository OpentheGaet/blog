<?php

namespace model;

class Album {

    public function getAlbums() 
    {
        $sql = 'SELECT alb_id,
                       alb_nom, 
                       alb_image 
                FROM T_ALBUM
                ORDER BY alb_id ASC';
        return $sql;
    }

    public function getAlbumById() {

        $sql = 'SELECT alb_id, 
                       alb_nom, 
                       alb_image,
                       alb_prix,
                       alb_date,
                       A.gen_id,
                       G.gen_id,
                       gen_nom,
                       AR.art_id,
                       AR.art_nom
                FROM T_ALBUM AS A 
                INNER JOIN T_GENRE AS G
                ON G.gen_id = A.gen_id
                INNER JOIN T_ARTISTE AS AR
                ON AR.art_id = A.art_id
                WHERE alb_id = ?';
        return $sql;      
    }    
}