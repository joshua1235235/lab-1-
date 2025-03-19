<?php
include('header.php');
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO autos (marca, modelo, anio, precio) VALUES ('$marca', '$modelo', '$anio', '$precio')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success mt-3'>Auto agregado exitosamente.</div>";
        header("Location: index.php");
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
    }
}

$conn->close();
?>

<h2 class="mt-4">Nuevo Auto</h2>
<form method="POST">
    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" required>
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" required>
    </div>
    <div class="mb-3">
        <label for="anio" class="form-label">Año</label>
        <input type="number" class="form-control" id="anio" name="anio" required>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<?php include('footer.php'); ?>
