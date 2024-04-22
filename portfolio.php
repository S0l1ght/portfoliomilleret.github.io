<!DOCTYPE html>
<html>
<head>
    <title>Mon portfolio</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    
<!--debut header-->
<header class="header" role="banner">
    <a href="/portfolio/admin/login.php" id="login-link" class="rubrique">K.MILLERET</a>

    <nav class="navbar" aria-label="Menu principal">
        <a href="#home" role="link"><!--<?=$control_data['home_section']?>-->Menu</a>
        <a href="#about" role="link"><!--<?=$control_data['about_section']?>--> About</a>
        <a href="#reel" role="link"><!--<?=$control_data['portfolio_section']?>-->Realisation</a>
        <a href="#comp"  role="link"><!--<?=$control_data['comp_section']?>-->Compétences</a>
        <a href="#contact" role="link"><!--<?=$control_data['contact_section']?>--> Contact</a>
    </nav>
</header>
<!--fin header-->

<section class="home" id="home"></section>
<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "test";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Récupérer les informations de la base de données
$resultat = $connexion->query("SELECT * FROM portfolio_info");

if ($resultat->num_rows > 0) {
    while ($row = $resultat->fetch_assoc()) {
        echo "<h1>" . $row['titre'] . "</h1>";
        echo "<img src='" . $row['image'] . "'>";
        echo "<p>" . $row['nom'] . "</p>";
    }
} else {
    echo "Aucune information trouvée.";
}

$connexion->close();
?>

</br>
</section>

<section class="about" id="about"></section> <!--section pour diviser les pages en plusieurs parties, voit ça comme des voitures (le capot, le toit, portière, etc) afin de mieux reconnaitre les 'pieces' meilleur structuration, class et about pour que le header href reconnais ton lien-->
<div>
<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "test";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Récupérer les informations de la table "about"
$resultat = $connexion->query("SELECT * FROM about");

if ($resultat->num_rows > 0) {
    while ($row = $resultat->fetch_assoc()) {
        echo "<h3>A propos de moi.</h3>";
        echo "<p><span> Je m'appelle " . $row['nom'] . ", j'ai " . $row['age'] . " ans et je suis étudiant en " . $row['etudes'] . ".</br>";
        echo "Je suis une personne " . $row['personnalite'] . ", qui a du mal à faire plusieurs projets à la fois, j'ai besoin de me concentrer sur un projet en particulier pour faire du bon travail.</br>";
        echo "Mon parcours scolaire n'est pas incroyable mais j'ai un " . $row['parcours'] . ", option audio-visuelle.</br>";
        echo "Mes passe-temps sont " . $row['hobbies'] . ".</br>";
        echo "Mon objectif est de " . $row['objectif'] . " à long terme.</span></p>";
    }
} else {
    echo "Aucune information trouvée.";
}

$connexion->close();
?>

</br>
</section>

<section class="reel" id="reel"></section>
<h3>Mes projet réaliser en MMI</h3>
<ul>
    <li>- J'ai fabriqué une affiche de A à Z pour Altaleghje qui voulait faire la pub du festival 2023, qui était La Tête Dans Les étoiles.</li>
    <li>- Avec une équipe, dans laquelle j'étais ingénieur son, on fait un court-métrage en rapport avec Le Septième Sceau.</li>
    <li>- J'ai monter une bande d'annonce de taille courte pour le court-métrage.</li>
</ul>
</br>
</br>
</section>

<section class="comp" id="comp">
<h3>Mes compétences</h3>
<ul class="skills">
    <li class="skill">
        <img src="photoshop.png" alt="Photo 1">
        <div class="bars">
            <div class="bar" style="width: 50%;"></div> <!-- Barre remplie à 60% -->
            <div class="bar empty" style="flex: 1;"></div> <!-- Barre vide à 40% -->
        </div>
    </li>
    <li class="skill">
        <img src="davinci.png" alt="Photo 2">
        <div class="bars">
            <div class="bar" style="width: 70%;"></div> <!-- Barre remplie à 80% -->
            <div class="bar empty" style="flex: 1;"></div> <!-- Barre vide à 20% -->
        </div>
    </li>
    <li class="skill">
        <img src="php.png" alt="Photo 3">
        <div class="bars">
            <div class="bar" style="width: 20%;"></div> <!-- Barre remplie à 40% -->
            <div class="bar empty" style="flex: 1;"></div> <!-- Barre vide à 60% -->
        </div>
    </li>
</ul>
</br>
</section>

<section class="contact" id="contact">
<h3>Contacter Moi</h3>
<form action="portfolio.php" method="POST" class="contact-form">
  <label for="nom" class="form-label">Nom :</label>
  <input type="text" id="nom" name="nom" class="form-input" required><br><br>
  
  <label for="email" class="form-label">Email :</label>
  <input type="email" id="email" name="email" class="form-input" required><br><br>
  
  <label for="message" class="form-label">Message :</label>
  <textarea id="message" name="message" class="form-textarea" required></textarea><br><br>
  
  <input type="submit" href="portfolio.php" value="Envoyer" class="form-submit">
</form>
</section>

<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $base_de_donnees = "test";

    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Échec de la connexion : " . $connexion->connect_error);
    }

    // Préparer et exécuter la requête d'insertion
    $requete = $connexion->prepare("INSERT INTO informations_contact (nom, email, message) VALUES (?, ?, ?)");
    $requete->bind_param("sss", $nom, $email, $message);
    $requete->execute();

    // Fermer la connexion à la base de données
    $connexion->close();

    echo "Informations enregistrées avec succès.";
}
?>

</body>
</html>