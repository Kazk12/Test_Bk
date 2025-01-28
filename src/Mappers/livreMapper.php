<?php

class livreMapper {

    public static function mapToObject(array $data, array $genres = []): livre {

        $id = $data["id"];
        $id_seller = $data["id_seller"];
        $etat = $data["etat"];
        $url_image = $data["image"];
        $titre = $data["titre"];
        $description_courte = $data["description_courte"];
        $description_longue = $data["description_longue"];
        $prix = $data["prix"];


        $livre = new livre( $id_seller,  $etat, $url_image, $titre, $description_courte, $description_longue, $prix, $id);

    
        return $livre;
    }


    public static function mapToArray(livre $livre): array
    {
        return [
            'id_seller' => $livre->getId_seller()->getId(),
            'etat' => $livre->getEtat()->getId(),
            'url_image' => $livre->getUrl_image(),
            'titre' => $livre->getTitre(),
            'description_courte' => $livre->getDescription_courte(),
            'description_longue' => $livre->getDescription_longue(),
            'prix' => $livre->getPrix(),
        ];
    }





   



}