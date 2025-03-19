<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM autos WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Auto eliminado exitosamente.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar: " . $conn->error . "</div>";
    }
    header("Location: index.php");
}

$conn->close();
?>
