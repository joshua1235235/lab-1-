<?php
include('header.php');
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM autos WHERE id=$id";
    $result = $conn->query($sql);
    $auto = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];
    $precio = $_POST['precio'];

    $sql = "UPDATE autos SET marca='$marca', modelo='$modelo', anio='$anio', precio='$precio' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success mt-3'>Auto actualizado exitosamente.</div>";
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
    }
}

$conn->close();
?>

<h2 class="mt-4">Editar Auto</h2>
<form method="POST">
    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $auto['marca']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $auto['modelo']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="anio" class="form-label">Año</label>
        <input type="number" class="form-control" id="anio" name="anio" value="<?php echo $auto['anio']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $auto['precio']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

<?php include('footer.php'); ?>
