<?php
<<<<<<< HEAD
session_start()
?>
    <h1>Bienvenue  <?= $_SESSION['firstname']?></h1>
    </main>
=======
include_once '../admin/header-main.php';
include_once '../connexion.php';
?>

<h1>Bon retour parmis nous, <?= $_SESSION['id-user'] ?></h1>

</main>
>>>>>>> aed8d9b79a64b4790ee4e83e316769815b5f7d13
</body>

</html>