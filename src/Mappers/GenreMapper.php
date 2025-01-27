<?php

class GenreMapper {

    public static function mapToObject(array $data): Genre {

        $id = $data["id"];
        $genre = $data["genre"];

        $genreData = new Genre($id, $genre);

    
        return $genreData;
    }


}