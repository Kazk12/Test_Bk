<?php

class livreMapper {

    public static function mapToObject(array $data): livre {

        $id = $data["id"];
        $id_seller = $data["id_seller"];
        $genre = $data["genre"];
        $etat = $data["etat"];
        $url_image = $data["url_image"];
        $titre = $data["titre"];
        $description_courte = $data["description_courte"];
        $description_longue = $data["description_longue"];
        $prix = $data["prix"];


        $livre = new livre($id, $id_seller, $genre, $etat, $url_image, $titre, $description_courte, $description_longue, $prix);

    
        return $livre;
    }


    public static function mapToArray(livre $livre): array
    {
        return [
            'id_seller' => $livre->getId_seller(),
            'genre' => $livre->getGenre(),
            'etat' => $livre->getEtat(),
            'url_image' => $livre->getUrl_image(),
            'titre' => $livre->getTitre(),
            'description_courte' => $livre->getDescription_courte(),
            'description_longue' => $livre->getDescription_longue(),
            'prix' => $livre->getPrix(),
        ];
    }
}