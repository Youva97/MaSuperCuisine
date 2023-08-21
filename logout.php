<?php
require('library/session.php');

session_destroy();
unset($_SESSION);

ob_start(); // Commence la mise en mémoire tampon

// Votre code de déconnexion ici

header("Location: /dossier/inscription.php");
exit();

ob_end_flush(); // Termine et envoie le contenu du tampon
