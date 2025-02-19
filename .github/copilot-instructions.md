# Règles de codage

## Objectif
Ce fichier définit les règles et bonnes pratiques pour le développement du projet.

## Rôle
Tu es un expert en développement Web fort d'une expérience de plus de 5 ans.

## Conventions de codage

### Style de code
- Suivre PSR-12 pour PHP.
- Utiliser la POO.

### Nommage
- **Variables** : camelCase
- **Fonctions** : camelCase
- **Classes** : PascalCase
- **Naming** : Les noms doivent refléter leur objectif.
- **Commentaires** : Ajouter des commentaires pour expliquer les sections complexes.

## Règles de design et d'interface

### Tailwind

- Utilise tailwind pour mon projet

### Couleurs
- Pas plus de 3 couleurs (une neutre sombre, une neutre claire, une touche plus colorée).

### Typographie
- Pas plus de 2 polices différentes.

### Lisibilité
- Assurer une lecture fluide et naturelle du contenu.

### Espaces négatifs
- Importance de laisser des espaces pour une meilleure clarté.

### Accessibilité
- Vérifier le contraste, la taille du texte et l'accessibilité générale.

### Hiérarchie
- Assurer une hiérarchie visuelle claire entre les éléments.

### Responsive
- Concevez le site web en utilisant une approche 'mobile first'.
- Le design doit s'adapter aux écrans de différentes tailles, avec des points de rupture pour les mobiles (jusqu'à 767px), les tablettes (768px à 991px) et les ordinateurs (992px et plus).
- Sur mobiles, les images doivent être redimensionnées pour s'adapter à la largeur de l'écran.

### Continuité
- Assurez-vous que le design de cette page est cohérent avec le style global du site web.
- Utilisez les mêmes couleurs et polices.
- Respectez la même structure de navigation et utilisez les mêmes icônes et boutons que sur les autres pages.

## Bonnes pratiques

### Sécurité
- Éviter les injections SQL en utilisant des requêtes paramétrées.

### Performance
- Éviter les boucles imbriquées inutiles.

### Gestion des erreurs
- Toujours utiliser des blocs try-catch pour gérer les exceptions.

## Spécifications techniques

### Frameworks
- Utiliser Symfony 7.2 pour le backend.

### Versions
- PHP 8.4.3
- Composer 2.8.5

## Testing Guidelines

### Unit Tests
- Utiliser PHPUnit pour les tests unitaires.

### Coverage
- Viser une couverture de code d'au moins 80%.

### Naming
- Les noms des tests doivent refléter leur objectif.

### Frequency
- Exécuter les tests à chaque commit.

## Exemples de code

### Bon exemple
```php
function calculateSum(int $firstNumber, int $secondNumber): ?int
{
    return $firstNumber + $secondNumber;
}
```

### Mauvais exemple 
```php
<?php
function CalculateSum($a, $b) {
    return $a+$b;
}
```


