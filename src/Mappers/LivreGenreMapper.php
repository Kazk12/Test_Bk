<?php

class LivreGenreMapper {

    public static function mapToObject(array $data): LivreGenre {

        $id = $data["id"];
        $idLivre = $data["id_livre"];
        $idGenre = $data["id_genre"];

        $livreGenreData = new LivreGenre($id, $idLivre, $idGenre);

    
        return $livreGenreData;
    }

    public static function mapToArray(LivreGenre $LivreGenre): array
    {
        return [
            'id_livre' => $LivreGenre->getIdLivre(),
            'id_genre' => $LivreGenre->getIdGenre(),
        ];
    }


}