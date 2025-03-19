<?php
include('header.php');
include('db.php');

$sql = "SELECT * FROM autos";
$result = $conn->query($sql);

echo '<h2 class="mt-4">Lista de Autos</h2>';
echo '<table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['marca'] . '</td>
                <td>' . $row['modelo'] . '</td>
                <td>' . $row['anio'] . '</td>
                <td>' . $row['precio'] . '</td>
                <td>
                    <a href="edit.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>';
    }
    echo '</tbody></table>';
} else {
    echo '<tr><td colspan="5">No hay autos disponibles.</td></tr>';
}

$conn->close();
include('footer.php');
?>
