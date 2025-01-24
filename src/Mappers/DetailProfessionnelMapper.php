<?php

class DetailProfessionnelMapper {

    public static function mapToObject(array $data): DetailProfessionnel {

        $id = $data["id"];
        $adresseEntreprise = $data["adresse_entreprise"];
        $nomEntreprise = $data["nom_entreprise"];

        $detailProfessionnel = new DetailProfessionnel( $adresseEntreprise, $nomEntreprise, $id);

    
        return $detailProfessionnel;
    }


    public static function mapToArray(DetailProfessionnel $detailProfessionnel): array
    {
        return [
            'adresse_entreprise' => $detailProfessionnel->getAdresseEntreprise(),
            'nom_entreprise' => $detailProfessionnel->getNomEntreprise(),
        ];
    }
}