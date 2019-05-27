<?php 
include("inc/init.inc.php");

$delete = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_STRING);
$idMembre = $_SESSION["idMembres"];

if (!empty($delete)) {

    $pdo->query("DELETE FROM `membres` WHERE idMembre = $idMembre");
    session_destroy();
    exit(header("Location: index.php"));
}
?>