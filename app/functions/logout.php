<?php
    session_start ();
    // On démarre la session

    // On détruit les variables de notre session
    // On détruit notre session
    session_unset ();
    if(isset($_SESSION)) {
        session_destroy ();
    }

    // On redirige le visiteur vers la page d'accueil
    header ('location:index.php');