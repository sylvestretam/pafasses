<?php
require_once('public/pdf/TCPDF-main/tcpdf.php');

class MonPDF extends TCPDF
{

    function Header()
    {
        // $image_file = 'public/dist/img/eneo_logo.jpg';
        // $this->Image($image_file, 10, 5, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }

    public function Footer()
    {
        // Pied de page
    }

    public function MonContenu()
    {

        // Chemin vers l'image
        $imageFile = 'public/dist/img/eneo_logo.jpg';

        $fontreg = TCPDF_FONTS::addTTFfont('public/pdf/sansation/Sansation-Regular.ttf', 'TrueTypeUnicode', '', 96);
        $fontbold = TCPDF_FONTS::addTTFfont('public/pdf/sansation/Sansation-Bold.ttf', 'TrueTypeUnicode', '', 96);

        $pageWidth = $this->getPageWidth();
        $leftMargin = $this->getMargins()['left'];
        $rightMargin = $this->getMargins()['right'];
        $cellWidth = ($pageWidth - $leftMargin - $rightMargin);

        $lineheight = 15;

        $this->SetFont($fontbold, 'B', 16);
        // Définir la couleur du texte (rouge par exemple)
        $this->SetTextColor(0, 0, 255);
        $this->MultiCell($cellWidth - 30, $lineheight, 'EVALUATION DES PERFORMANCES DES PARTENAIRES D’AFFAIRES ENEO', 1, 'C', 0, 0, '', '', true);

        // Insérer l'image dans une cellule
        $this->Image($imageFile, '', '', 0, 15, '', '', '', false, 300, '', false, false, 1, false, false, false);

        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, $lineheight, '', 0, 'C');
        $this->ln(2);

        $lineheight = 10;
        //Premier tableau
        $this->SetFont($fontreg, 'B', 8);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Nom/Raison sociale partenaire :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 2, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Date de l’évaluation :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 8);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Activité/spécialité évaluée :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 2, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Unité évaluatrice :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 8);
        $this->MultiCell($cellWidth / 4, $lineheight, 'Période concernée :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 4, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 4, $lineheight, 'Lieu de l’activité :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 4, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        // $this->Cell($cellWidth / 4, $lineheight, 'Nom/Raison sociale partenaire :', 1, 0, 'L');
        // $this->Cell($cellWidth / 2, $lineheight, '', 1, 0, 'L');
        // $this->Cell($cellWidth / 4, $lineheight, 'Date de l’évaluation :', 1, 0, 'L');
        // $this->Cell($cellWidth / 8, $lineheight, '', 1, 1, 'L');

        // $this->Cell($cellWidth / 4, $lineheight, 'Activité/spécialité évaluée :', 1, 0, 'L');
        // $this->Cell($cellWidth / 2, $lineheight, '', 1, 0, 'L');
        // $this->Cell($cellWidth / 4, $lineheight, 'Unité évaluatrice :', 1, 0, 'L');
        // $this->Cell($cellWidth / 4, $lineheight, '', 1, 1, 'L');

        // $this->Cell($cellWidth / 4, $lineheight, 'Période concernée :', 1, 0, 'L');
        // $this->Cell($cellWidth / 2, $lineheight, '', 1, 0, 'L');
        // $this->Cell($cellWidth / 4, $lineheight, 'Lieu de l’activité :', 1, 0, 'L');
        // $this->Cell($cellWidth / 4, $lineheight, '', 1, 1, 'L');

        $this->ln(4);

        //Premier tableau
        $this->SetFont($fontreg, '', 9);
        $this->Cell($cellWidth / 2, $lineheight, 'Critère D’évaluation', 1, 0, 'C');
        $this->Cell($cellWidth / 10, $lineheight, 'Médiocre', 1, '0', 'C');
        $this->Cell($cellWidth / 10, $lineheight, 'Insuffisant', 1, '0', 'C');
        $this->Cell($cellWidth / 10, $lineheight, 'Passable', 1, '0', 'C');
        $this->Cell($cellWidth / 10, $lineheight, 'Bien', 1, '0', 'C');
        $this->Cell($cellWidth / 10, $lineheight, 'Excellent', 1, '1', 'C');

        $lineheight = 4;
        $this->Cell($cellWidth / 2, $lineheight, '', 1, 0, 'C');
        $this->Cell($cellWidth / 10, $lineheight, '', 1, '0', 'C');
        $this->Cell($cellWidth / 10, $lineheight, '', 1, '0', 'C');
        $this->Cell($cellWidth / 10, $lineheight, '', 1, '0', 'C');
        $this->Cell($cellWidth / 10, $lineheight, '', 1, '0', 'C');
        $this->Cell($cellWidth / 10, $lineheight, '', 1, '1', 'C');

        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(0, $lineheight, '1) TECHNIQUE (Qualité de la prestation/ travaux/matériel) (30%)', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, '', 9);
        $lineheight = 9;
        $this->MultiCell($cellWidth / 2, $lineheight, '• Conformité des travaux/prestations/matériel avec les normes en vigueur', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Respect du cahier de charges', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Efficacité des travaux sur la durée (fourniture régulière des prestations/matériel de qualité)', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 9);
        $lineheight = 0;
        $this->MultiCell(0, $lineheight, '2) HSE (20%)', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, '', 9);
        $lineheight = 0;
        $this->MultiCell($cellWidth / 2, $lineheight, '• Equipement personnel en EPI', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Respect des procédures sécurité et exigences Eneo', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Reporting des évènements HSE', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 9);
        $lineheight = 0;
        $this->MultiCell(0, $lineheight, '3) FINANCE (20%)', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, '', 9);
        $lineheight = 0;
        $this->MultiCell($cellWidth / 2, $lineheight, '• Acceptation des conditions de paiement Eneo', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Préfinancement des travaux', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Clarté dans la structure des prix/cout', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 9);
        $lineheight = 0;
        $this->MultiCell(0, $lineheight, '4) DELAIS (20%)', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, '', 9);
        $lineheight = 0;
        $this->MultiCell($cellWidth / 2, $lineheight, '• Respect planning', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Disponibilité/Temps de réaction en cas de sollicitation Eneo', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Délais de restitution des documents après travaux /prestations', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);


        $this->SetFont($fontreg, 'B', 9);
        $lineheight = 0;
        $this->MultiCell(0, $lineheight, '5) ETHIQUE/VALEURS (10%)', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, '', 9);
        $lineheight = 0;
        $this->MultiCell($cellWidth / 2, $lineheight, '• Respect des Valeurs Eneo', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Responsabilité sociale', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 11);
        $lineheight = 20;
        $this->MultiCell(0, $lineheight, 'Analyse SWOT :', 1, 'l', 0, 1, '', '', true);
        $lineheight = 20;
        $this->MultiCell(0, $lineheight, 'Axes d’amélioration : (ou toute autre observation sur le PAF) :', 1, 'l', 0, 1, '', '', true);

        $this->ln(1);
        $this->SetFont($fontreg, 'B', 7);
        $lineheight = 0;
        $this->setCellPadding(1);
        $this->MultiCell($cellWidth / 4, $lineheight, 'Performance (Cocher la case) :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 5, $lineheight, 'MEDIOCRE (<65)', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 20, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 5, $lineheight, 'SATISFAISANT (>65, <80)', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 20, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 5, $lineheight, 'EXCELLENT (>80)', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 20, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->ln(1);
        $this->SetFont($fontreg, 'B', 7);
        $lineheight = 0;
        $this->setCellPadding(3);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Responsable :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Fonction :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Signature : ', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->ln(1);
        $this->SetFont($fontreg, 'B', 7);
        $lineheight = 0;
        $this->setCellPadding(3);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Participant :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Fonction :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Signature : ', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 7);
        $lineheight = 0;
        $this->setCellPadding(3);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Participant :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Fonction :', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Signature : ', 1, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'l', 0, 1, '', '', true);

        $this->ln(1);
        $this->SetFont($fontreg, 'B', 7);
        $lineheight = 4;
        $this->SetTextColor(205, 0, 10);

        $this->setCellPadding(0);
        $this->MultiCell(0, 0, '', 'B', 'L', 0, 1, '', '', true);
        $this->setCellPadding(2);
        $this->MultiCell(($cellWidth) - 3, $lineheight, '*******************RESERVE*********************', 'L', 'C', 0, 0, '', '', true);
        $this->MultiCell(3, 0, '', 'R', 'R', 0, 1, '', '', true);

        $lineheight = 5;
        $this->SetTextColor(0, 0, 0);
        $this->MultiCell($cellWidth / 3, $lineheight, 'Responsable Pole Fournisseurs:', 'L', 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 3, $lineheight, '', 0, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Signature / Date : ', 0, 'l', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 'R', 'l', 0, 1, '', '', true);

        $this->MultiCell(($cellWidth) - 3, $lineheight, 'Remarques :', 'L', 'L', 0, 0, '', '', true);
        $this->MultiCell(3, $lineheight, '', 'R', 'R', 0, 1, '', '', true);
        $this->setCellPadding(0);
        $this->MultiCell(0, 0, '', 'B', 'L', 0, 0, '', '', true);
    }
}

// Créez une instance de la classe MonPDF
// $pdf = new MonPDF();
$pdf = new MonPDF('P', 'mm', 'A4', true, 'UTF-8', false);
// set margins
$pdf->setMargins('10', '10', '10');
$pdf->setHeaderMargin('5');
$pdf->setFooterMargin('10');

$pdf->AddPage();
$pdf->MonContenu();
$pdf->Output('exemple.pdf', 'I');