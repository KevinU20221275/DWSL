<?php
require_once('conf.php');
require_once('dompdf/autoload.inc.php');


$filename = "reporte_productos_rango_" . date("Ymd_His") . "pdf";
$minPrice = isset($_POST['minPrice']) ? $_POST['minPrice'] : 0;
$maxPrice = isset($_POST['maxPrice']) ? $_POST['maxPrice'] : 1000;
$query  = "SELECT producto, precio, existencias, bodegas FROM tbl_invesproduct 
        WHERE CAST(REPLACE(precio, '$', '') AS DECIMAL(10, 2)) BETWEEN $minPrice and $maxPrice 
        ORDER BY CAST(REPLACE(precio, '$', '') AS DECIMAL(10, 2));";
$result = mysqli_query($conn, $query);
$html = "
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    h2 {
        text-align: center;
    }
</style>
        <h2>Reporte de Productos con Precio entre $$minPrice - $$maxPrice Dolares</h2>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                        <th>Bodegas</th>
                    </tr>
                </thead>
                <tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<tr>
                    <td>" . $row['producto'] . "</td>
                    <td>" . $row['precio'] . "</td>
                    <td>" . $row['existencias'] . "</td>
                    <td>" . $row['bodegas'] . "</td>
                </tr>";
}
$html .= "</tbody></table>";



// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename);
