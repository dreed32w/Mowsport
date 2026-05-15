<?php
session_start();

require('fpdf/fpdf.php');

$first_name = htmlspecialchars($_SESSION['prenom']);
$last_name  = htmlspecialchars($_SESSION['nom']);
$phone      = htmlspecialchars($_SESSION['phone']);
$cin        = htmlspecialchars($_SESSION['cin']);
$date_op    = htmlspecialchars($_SESSION['date_op']);
$temp_op    = htmlspecialchars($_SESSION['temp_op']);
$terrain    = htmlspecialchars($_SESSION['terrain_name']);
$players    = htmlspecialchars($_SESSION['nb_players']);
$dure       = htmlspecialchars($_SESSION['dure']);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);

$pdf->Image('images/logo-modified.png', 15, 10, 35);

$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0, 15, 'MOWSPORT', 0, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 8, 'Confirmation officielle de reservation', 0, 1, 'C');

$pdf->Ln(10);

$pdf->SetDrawColor(120, 120, 120);
$pdf->Line(10, 40, 200, 40);

$pdf->Ln(8);

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(0, 10, 'Informations du client', 0, 1);

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(60, 10, 'Nom complet :', 0, 0);
$pdf->Cell(0, 10, $first_name . ' ' . $last_name, 0, 1);


$pdf->Cell(60, 10, 'Telephone :', 0, 0);
$pdf->Cell(0, 10, $phone, 0, 1);

$pdf->Cell(60, 10, 'CIN :', 0, 0);
$pdf->Cell(0, 10, $cin, 0, 1);


$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(0, 10, 'Details de reservation', 0, 1);

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(60, 10, 'Terrain :', 0, 0);
$pdf->Cell(0, 10, $terrain, 0, 1);

$pdf->Cell(60, 10, 'Nombre de joueurs :', 0, 0);
$pdf->Cell(0, 10, $players, 0, 1);

$pdf->Cell(60, 10, 'Duree :', 0, 0);
$pdf->Cell(0, 10, $dure . ' minutes', 0, 1);

$pdf->Cell(60, 10, 'Date :', 0, 0);
$pdf->Cell(0, 10, $date_op, 0, 1);

$pdf->Cell(60, 10, 'Heure :', 0, 0);
$pdf->Cell(0, 10, $temp_op, 0, 1);

$pdf->Cell(60, 10, 'Montant total :', 0, 0);


$pdf->Ln(8);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Informations importantes', 0, 1);

$pdf->SetFont('Arial', '', 11);

$pdf->MultiCell(
    0,
    8,
    "- Merci pour votre reservation chez MOWSPORT.\n" .
    "- Veuillez arriver 15 minutes avant l'heure reservee.\n" .
    "- Ce document sert comme preuve officielle de reservation.\n" .
    "- Merci de presenter ce ticket a l'entree.\n" .
    "- En cas de probleme contactez-nous : mowsport@gmail.com"
);

$pdf->Ln(10);

$pdf->Cell(120, 10, '', 0, 0);
$pdf->Cell(0, 10, 'mohamed ilkhadry', 0, 1, 'C');



$pdf->SetY(262);
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(
    0,
    8,
    'MOWSPORT © 2026 - Tous droits reserves',
    0,
    1,
    'C'
);

$pdf->Output('I', 'Mowsport.pdf');
exit;
?>

