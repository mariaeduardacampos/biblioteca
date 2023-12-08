<?php

// Carregar o Composer
require './vendor/autoload.php';
require_once 'src/db.php';

// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf();

$stmt = $pdo->query('SELECT * FROM reserva');
$stmt->execute();
$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Construir uma string HTML com os resultados do SELECT
$html = '<table>';
foreach ($reservas as $reserva) {
    $html .= '<tr>';
    foreach ($reserva as $campo => $valor) {
        $html .= '<td>' . $valor . '</td>';
    }
    $html .= '</tr>';
}
$html .= '</table>';

// Instanciar o método loadHtml e enviar o conteúdo do PDF
$dompdf->loadHtml($html);

// Configurar o tamanho e a orientação do papel
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF e abrir no navegador
$dompdf->stream();