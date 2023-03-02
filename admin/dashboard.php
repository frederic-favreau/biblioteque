<?php 
include_once '../admin/header-main.php';
        include_once '../connexion.php';
        //$id = $_GET['id_user'];
        $req = $db->prepare("SELECT `firstname` FROM `user`");
        $req->bindParam('id_user', $id, PDO::PARAM_INT);
        $req->execute();
        while($name = $req->fetch(PDO::FETCH_ASSOC)){
?>
    <h1>Bienvenue <?= $_SESSION['firstname']?></h1>
    <?php } ?>
    </main>
</body>
</html>