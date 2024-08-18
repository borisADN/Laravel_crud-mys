<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
//$fillable : Contient les attributs que vous souhaitez rendre mass-assignables.
    //ici, nous voulons que le titre, l'image et le corps de chaque post soient mass-assignables.
/*La mass-assignment (ou assignation de masse) est une fonctionnalité d'Eloquent 
dans Laravel qui permet de définir plusieurs attributs d'un modèle en une seule fois, 
en passant un tableau d'attributs à une méthode. Plutôt que de définir chaque attribut
 individuellement, vous pouvez les assigner en masse.*/
 //$fillable : Liste des attributs qui sont autorisés à être mass-assignés.
 //ici, nous utilisons le tableau ['title', 'image', 'body'] pour déclarer que 'title', 'image' et 'body' sont des attributs mass-assignables.
 //Les autres attributs seront automatiquement ignorés lors de l'assignation de masse.
 //Vous pouvez aussi utiliser le trait HasFactory pour générer automatiquement des champs de clé étrangère.
 //Si vous avez besoin de spécifier des champs de clé étrangère ou des champs de clé unique, vous pouvez utiliser des traits personnalisés.
    //Voir la documentation Laravel pour plus de détails sur ces traits.
    //$guarded : Liste des attributs qui ne peuvent pas être mass-assignés. C'est l'inverse de $fillable.

    protected $fillable = [
        'title',
        'image',
        'body'
    ];
}
/*Bonjour ! Je suis un développeur web et mobile passionné, avec une solide expérience dans 
la création de solutions numériques innovantes. Mon expertise englobe le développement 
front-end et back-end, ainsi que la conception d'applications mobiles performantes et intuitives.

Je maîtrise les technologies clés telles que HTML, CSS, JavaScript, et divers frameworks 
comme React, Vue.js, ainsi que des langages de programmation mobile tels que Swift et 
Kotlin. Ma capacité à résoudre des problèmes complexes et à collaborer efficacement avec des 
équipes pluridisciplinaires m'a permis de mener à bien des projets ambitieux.

Actuellement à la recherche d'un stage pour approfondir mes compétences et relever de nouveaux
 défis, je suis motivé par l'opportunité de contribuer à des projets innovants et de participer 
 activement à l'évolution du secteur technologique.

Je suis toujours en quête de nouvelles connaissances et d'opportunités pour mettre en 
pratique mes compétences tout en apprenant des meilleurs. Si vous recherchez un développeur 
dynamique, curieux et prêt à s'investir pleinement dans des projets passionnants, n'hésitez 
pas à me contacter.*/ 