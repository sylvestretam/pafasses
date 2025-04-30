<?php
require_once('import/TCPDF-main/tcpdf.php');

class MonPDF extends TCPDF
{

    function Header()
    {
        // Logo
        $image_file = 'public/dist/img/eneo_logo.jpg';
        $this->Image($image_file, 10, 5, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }

    public function Footer()
    {
        // Pied de page
    }

    public function MonContenu()
    {
        $provider_name = "PAF NAME";
        $activity_name = "ACTIVITY NAME";
        $activity_code = "ACTIVITY CODE";
        $provider_id = "PROVIDER ID";

        $RSOP = "TAM Sylvestre";
        $RPLAN = "TAM Sylvestre";

        $fontreg = TCPDF_FONTS::addTTFfont('./import/sansation/Sansation-Regular.ttf', 'TrueTypeUnicode', '', 96);
        $fontbold = ""; //TCPDF_FONTS::addTTFfont('import/sansation/Sansation-Bold.ttf', 'TrueTypeUnicode', '', 96);
        $lineheight = 6;

        //titre
        $this->SetFont($fontbold, 'B', 16);
        $this->Cell(0, $lineheight, 'Rapport Synthétique - Evaluation technique par les unités', 0, 1, 'C');
        $this->ln(2);

        //Premier tableau
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Process-Owner:', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, 'DAL', 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Unite d evaluation:', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, 'SYSTEME ET MAINTENANCE', 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Nom/Raison sociale partenaire:', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, $provider_name, 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Nombre de spécialités :', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, 10, 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Activité/spécialité évaluée : ( Libélé du lot/projet)', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, $activity_name, 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Lieu d’évaluation (ville où se déroule le projet) :', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, 'DOUALA', 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Période concernée :', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, "01 jan. 2023" . " à " . date('d M Y'), 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Date de fin de l’évaluation :', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, date('d M Y'), 1, 'C');
        $this->ln(2);

        $lineheight = 10;
        //Deuxième tableau
        $this->SetFont($fontreg, 'B', 9);
        $this->Cell(55, $lineheight, 'Commission d\'évalution', 1, 0, 'C');
        $this->MultiCell(135, $lineheight, '', 1, 'L');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(55, $lineheight, 'Responsable', 1, 0, 'L');
        $this->SetFont($fontreg, 'B', 9);
        $this->Cell(50, $lineheight, 'EBOUMBOU MARTIAL', 1, 0, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(30, $lineheight, ' Fonction', 1, 0, 'L');
        $this->MultiCell(55, $lineheight, '', 1, 'L');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(55, $lineheight, 'EVALUATEUR', 1, 0, 'L');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(50, $lineheight, "TAM Sylvestre", 1, 'C', 0, 0, '', '', true, 0, false, true, 20, 'T');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(30, $lineheight, ' Fonction', 1, 0, 'L');
        $this->MultiCell(55, $lineheight, '', 1, 'L');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(55, $lineheight, 'Responsable Support Aux Operation', 1, 0, 'L');
        $this->SetFont($fontreg, 'B', 9);
        $this->Cell(50, $lineheight, "RSOP NAME", 1, 0, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(30, $lineheight, ' Fonction', 1, 0, 'L');
        $this->MultiCell(55, $lineheight, '', 1, 'L');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(55, $lineheight, 'Responsable Planification', 1, 0, 'L');
        $this->SetFont($fontreg, 'B', 9);
        $this->Cell(50, $lineheight, "", 1, 0, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(30, $lineheight, ' Fonction', 1, 0, 'L');
        $this->MultiCell(55, $lineheight, "", 1, 'L');
        $this->ln(2);

        $lineheight = 6;
        //Troisième tableau
        $this->SetFont($fontreg, 'B', 9);
        $this->Cell(20, $lineheight, 'N°Critères', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'Désignation', 1, 0, 'C');
        $this->Cell(30, $lineheight, 'Note', 1, 0, 'C');
        $this->Cell(70, $lineheight, 'Observations', 1, 1, 'L');

        $this->SetFont($fontreg, '', 9);

        $this->Cell(20, $lineheight, '1.', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'Respect des délais', 1, 0, 'C');
        $this->Cell(30, $lineheight, number_format($note1 = 10, 2), 1, 0, 'C');
        $this->MultiCell(70, $lineheight, '', 1, 'L');

        $this->Cell(20, $lineheight, '2.', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'Conformité du besoin', 1, 0, 'C');
        $this->Cell(30, $lineheight, number_format($note2 = 10, 2), 1, 0, 'C');
        $this->MultiCell(70, $lineheight, '', 1, 'L');

        $this->Cell(20, $lineheight, '3.', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'Respect des coûts', 1, 0, 'C');
        $this->Cell(30, $lineheight, number_format($note3 = 10, 2), 1, 0, 'C');
        $this->MultiCell(70, $lineheight, '', 1, 'L');

        $this->Cell(20, $lineheight, '4.', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'Performances HS', 1, 0, 'C');
        $this->Cell(30, $lineheight, number_format($note4 = 10, 2), 1, 0, 'C');
        $this->MultiCell(70, $lineheight, '', 1, 'L');

        $this->Cell(20, $lineheight, '5.', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'Conformité reglementaire', 1, 0, 'C');
        $this->Cell(30, $lineheight, number_format($note5 = 10, 2), 1, 0, 'C');
        $this->MultiCell(70, $lineheight, '', 1, 'L');

        $lineheight = 12;
        $this->SetFont($fontreg, '', 11);
        $this->Cell(90, $lineheight, 'TOTAL', 1, 0, 'C');
        $this->Cell(30, $lineheight, number_format($note1 + $note2 + $note3 + $note4 + $note5, 2), 1, 0, 'C');
        $this->Cell(70, $lineheight, ' / 20', 1, 1, 'L');
        $this->ln(2);

        $lineheight = 15;
        $this->SetFont($fontbold, 'B', 12);
        $this->Cell(60, $lineheight, 'Resultat Global / 20', 1, 0, 'C');
        $this->Cell(70, $lineheight, number_format($note1 + $note2 + $note3 + $note4 + $note5, 2) . ' / 20 ', 1, 0, 'C');
        $this->Cell(60, $lineheight, '', 1, 'L');
        $this->ln(2);

        $lineheight = 10;
        $this->Cell(38, $lineheight, 'EVALUATEUR(S)', 1, 0, 'C');
        $this->Cell(38, $lineheight, 'RSOP', 1, 0, 'C');
        $this->Cell(38, $lineheight, 'RSPP', 1, 0, 'C');
        $this->Cell(38, $lineheight, 'Resp EVAL ', 1, 0, 'C');
        $this->Cell(38, $lineheight, 'Validation', 1, 1, 'C');

        $lineheight = 40;

        $this->Cell(38, $lineheight, '', 1, 0, 'L');
        $this->Cell(38, $lineheight, '', 1, 0, 'L');
        $this->Cell(38, $lineheight, '', 1, 0, 'L');
        $this->Cell(38, $lineheight, '', 1, 0, 'L');
        $this->Cell(38, $lineheight, '', 1, 1, 'L');
    }
}

// Créez une instance de la classe MonPDF
// $pdf = new MonPDF();
$pdf = new MonPDF('P', 'mm', 'A4', true, 'UTF-8', false);
// set margins
$pdf->setMargins('10', '27', '15');
$pdf->setHeaderMargin('5');
$pdf->setFooterMargin('10');

$pdf->AddPage();
$pdf->MonContenu();
$pdf->Output('exemple.pdf', 'I');