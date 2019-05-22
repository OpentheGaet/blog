<?php

namespace model;

class Style {

    public function getStyle() 
    {
        $sql = 'SELECT gen_id,
                       gen_nom
                FROM T_GENRE
                ORDER BY gen_id ASC';
        return $sql;
    }

    public function getStyleById($id_gen) {
        $sql = 'SELECT gen_id,
                       gen_nom
                FROM T_GENRE
                WHERE gen_id = ?';
        return $sql;
    }

}