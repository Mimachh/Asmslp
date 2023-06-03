
Réfléchir a mettre une clé de licence




<!-- Shortcode pour les singles
<?php echo do_shortcode('[asmslp_shortcode]'); ?> -->


pour intégrer une image
href="https://twitter.com/intent/tweet?text=coucou&url=LienVersVotrePage&hashtags=HashtagsSéparésParDesVirgules&media=LienVersVotreImage"


Version gratuite :

- RS :
    - fcb
    - twitter
    - mail
    - Copy
    - Digg
    - Reddit
Ils sont bien désactivés mais on peux toujours passer outre, tant pis on peux les entrer en bdd mais dans le createHTML on les désactive



- Localisation
- Titre

- Options :
    - Articles et options 

Style : 
    - Taille
    - Forme

    - Animations :
        - Translate
        - Fade out
        - Scale
        - Pulse

Shortcode :
    - Article


VERSION PAYANTE :
Le reste


Organisation :
- Isoler les éléments gratuits et les éléments payants autour d'une fonction false.
- Mettre un disabled en fonction de la vérification
- Ajouter une nouvelle vérification sur les fonctions du type ifwrap, sur les boutons submit du custom par exemple et sur les éléments de formulaire et mettre des champs qui n'ont pas de value ni rien.
- Gérer pour quelqu'un qui passerait de payant à gratuit pour supprimer les champs.
- Les shortcode doivent être wrapé pour controler la version et donc il faut désactiver les shortcode pages si version gratuite, et rendre le single avec verification du type is_single.
- Les custom post type deviennent 0.