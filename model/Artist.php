<?php

namespace model;

class Artist {

    public function getArtists() 
    {
        $sql = 'SELECT AR.art_id,
                       AR.art_nom,
                       AB.alb_id,
                       AB.alb_nom, 
                       AB.alb_image,
                       G.gen_id,
                       G.gen_nom 
                FROM T_ARTISTE AS AR
                INNER JOIN T_ALBUM AS AB
                ON AB.alb_id = AR.art_id
                INNER JOIN T_GENRE AS G
                ON G.gen_id = AB.Gen_id';
        return $sql;
    }

    public function getArtistById($id_art) 
    {
        $sql = 'SELECT AR.art_id,
                       AR.art_nom,
                       AB.alb_id,
                       AB.alb_nom, 
                       AB.alb_image,
                       G.gen_id,
                       G.gen_nom 
                FROM T_ARTISTE AS AR
                INNER JOIN T_ALBUM AS AB
                ON AB.alb_id = AR.art_id
                INNER JOIN T_GENRE AS G
                ON G.gen_id = AB.gen_id
                WHERE AR.art_id = ?';
        return $sql;
    }
}