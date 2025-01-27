<?php

class EtatMapper {

    public static function mapToObject(array $data): Etat {

        $id = $data["id"];
        $etat = $data["etat"];

        $etat = new Etat($id, $etat);

    
        return $etat;
    }


}