<?php
require_once('public/pdf/TCPDF-main/tcpdf.php');

class MonPDF extends TCPDF
{

    public function setVars($assessment,$notes,$participations)
    {
        $this->assessment = $assessment;
        $this->notes = $notes;
        $this->participations = $participations;

        $this->performance = $this->getPerformance($participations);
        $this->swot = $this->getSwot($participations);
        $this->axe = $this->getAxe($participations);
    }

    function getPerformance($participations)
    {
        $sum = 0;
        
        foreach ($participations as $participation) {
            $sum = $sum + $participation->performance;
        }

        $ret = (sizeof($participations) == 0) ? 0 : round($sum/sizeof($participations));
        return $ret;
    }

    function writePerfomance($performance,$min,$max)
    {
        if ($performance>=$min && $performance<$max)
            return "X";
        return "";
    }

    function getSwot($participations)
    {
        $sum = "";
        
        foreach ($participations as $participation) {
            $sum = $sum . $participation->swot . ";\n\n ";
        }

        return $sum;
    }

    function getAxe($participations)
    {
        $sum = "";
        
        foreach ($participations as $participation) {
            $sum = $sum . $participation->amelioration . ";\n\n ";
        }

        return $sum;
    }

    function getNote($notes,$i)
    {
        $sum = 0;
        $j=0;
        foreach ($notes as $note) {
            if($note->id_question == $i){
                $sum = $sum + $note->note;
                $j++;
            }
        }

        if($j== 0 )
            return 0;
            
        return round($sum/$j);
    }

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
        $provider_name = "";
        $project_name = "";
        $project_code = "";
        $provider_id = "";

        $fontreg = TCPDF_FONTS::addTTFfont('public/pdf/sansation/Sansation-Regular.ttf', 'TrueTypeUnicode', '', 96);
        $fontbold = TCPDF_FONTS::addTTFfont('public/pdf/sansation/Sansation-Bold.ttf', 'TrueTypeUnicode', '', 96);
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
        $this->MultiCell(100, $lineheight, 'DA CR', 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Nom/Raison sociale partenaire:', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, $this->assessment->nom_paf, 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Nombre de spécialités :', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, "40", 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Activité/spécialité évaluée : ( Libélé du lot/projet)', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, $this->assessment->designation, 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Lieu d’évaluation (ville où se déroule le projet) :', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, $this->assessment->lieu, 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Période concernée :', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, $this->assessment->periode, 1, 'C');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(90, $lineheight, 'Date de fin de l’évaluation :', 1, 0, 'R');
        $this->SetFont($fontreg, 'B', 9);
        $this->MultiCell(100, $lineheight, date('d M Y'), 1, 'C');
        $this->ln(2);

        //Deuxième tableau
        $this->SetFont($fontreg, 'B', 9);
        $this->Cell(55, $lineheight, 'Commission d\'évalution', 1, 0, 'C');
        $this->MultiCell(135, $lineheight, '', 1, 'L');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(55, $lineheight, 'Responsable', 1, 0, 'L');
        $this->SetFont($fontreg, 'B', 9);
        $this->Cell(50, $lineheight, $this->assessment->name_user, 1, 0, 'L');
        $this->SetFont($fontreg, '', 9);
        $this->Cell(30, $lineheight, ' Fonction', 1, 0, 'L');
        $this->MultiCell(55, $lineheight, $this->assessment->job_user, 1, 'L');

        foreach ($this->participations as $participation) {
         
            $this->SetFont($fontreg, '', 9);
            $this->Cell(55, $lineheight, "Evaluateur", 1, 0, 'L');
            $this->SetFont($fontreg, 'B', 9);
            $this->Cell(50, $lineheight, $participation->name_user, 1, 0, 'L');
            $this->SetFont($fontreg, '', 9);
            $this->Cell(30, $lineheight, ' Fonction', 1, 0, 'L');
            $this->MultiCell(55, $lineheight, $participation->job_user, 1, 'L');
            
        }
        
        // $this->SetFont($fontreg, '', 9);
        // $this->Cell(55, $lineheight, 'PMO', 1, 0, 'L');
        // $this->SetFont($fontreg, 'B', 9);
        // $this->Cell(50, $lineheight, "", 1, 0, 'L');
        // $this->SetFont($fontreg, '', 9);
        // $this->Cell(30, $lineheight, ' Fonction', 1, 0, 'L');
        // $this->MultiCell(55, $lineheight, '', 1, 'L');
        // $this->SetFont($fontreg, '', 9);
        // $this->Cell(55, $lineheight, 'QHSE', 1, 0, 'L');
        // $this->SetFont($fontreg, 'B', 9);
        // $this->Cell(50, $lineheight, "", 1, 0, 'L');
        // $this->SetFont($fontreg, '', 9);
        // $this->Cell(30, $lineheight, ' Fonction', 1, 0, 'L');
        // $this->MultiCell(55, $lineheight, '', 1, 'L');
        $this->ln(2);

        //Troisième tableau
        $this->SetFont($fontreg, 'B', 9);
        $this->Cell(20, $lineheight, 'N°Critères', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'Désignation', 1, 0, 'C');
        $this->Cell(30, $lineheight, 'Note', 1, 0, 'C');
        $this->Cell(70, $lineheight, 'Observations', 1, 1, 'L');

        $this->SetFont($fontreg, '', 9);

        $this->Cell(20, $lineheight, '1.', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'TECHNIQUE (Qualité de la prestation/ travaux/matériel) (30%)', 1, 0, 'C');
        $this->Cell(30, $lineheight, $n1 = round( ($this->getNote($this->notes,1)+$this->getNote($this->notes,2)+$this->getNote($this->notes,3))/3 ) , 1, 0, 'C');
        $this->MultiCell(70, $lineheight, '', 1, 'L');

        $this->Cell(20, $lineheight, '2.', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'HSE (20%)', 1, 0, 'C');
        $this->Cell(30, $lineheight, $n2 = round( ($this->getNote($this->notes,4)+$this->getNote($this->notes,5)+$this->getNote($this->notes,6))/3 ), 1, 0, 'C');
        $this->MultiCell(70, $lineheight, '', 1, 'L');

        $this->Cell(20, $lineheight, '3.', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'FINANCE (20%)', 1, 0, 'C');
        $this->Cell(30, $lineheight, $n3 = round( ($this->getNote($this->notes,7)+$this->getNote($this->notes,8)+$this->getNote($this->notes,9))/3 ), 1, 0, 'C');
        $this->MultiCell(70, $lineheight, '', 1, 'L');

        $this->Cell(20, $lineheight, '4.', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'DELAIS (20%)', 1, 0, 'C');
        $this->Cell(30, $lineheight, $n4 = round( ($this->getNote($this->notes,10)+$this->getNote($this->notes,11)+$this->getNote($this->notes,12))/3 ), 1, 0, 'C');
        $this->MultiCell(70, $lineheight, '', 1, 'L');

        $this->Cell(20, $lineheight, '5.', 1, 0, 'R');
        $this->Cell(70, $lineheight, 'ETHIQUE/VALEURS (10%)', 1, 0, 'C');
        $this->Cell(30, $lineheight, $n5 = round( ($this->getNote($this->notes,13)+$this->getNote($this->notes,14))/2 ), 1, 0, 'C');
        $this->MultiCell(70, $lineheight, '', 1, 'L');

        $lineheight = 12;
        $this->SetFont($fontreg, '', 11);
        $this->Cell(90, $lineheight, 'TOTAL', 1, 0, 'C');
        $this->Cell(30, $lineheight, round( ($n1*30 + $n2*20+ $n3*20+ $n4*20 +$n5*10 )/100 ), 1, 0, 'C');
        $this->Cell(70, $lineheight, ' / 20', 1, 1, 'L');
        $this->ln(2);

        $lineheight = 15;
        $this->SetFont($fontbold, 'B', 12);
        $this->Cell(60, $lineheight, 'Resultat Global / 20', 1, 0, 'C');
        $this->Cell(70, $lineheight, round( ($n1*30 + $n2*20+ $n3*20+ $n4*20 +$n5*10 )/100 ).' / 20 ', 1, 0, 'C');
        $this->Cell(60, $lineheight, '', 1, 'L');
        $this->ln(2);

        $lineheight = 10;
        $this->Cell(38, $lineheight, 'Chef de Projet', 1, 0, 'C');
        $this->Cell(38, $lineheight, 'PMO', 1, 0, 'C');
        $this->Cell(38, $lineheight, 'QHSE', 1, 0, 'C');
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

$pdf = new MonPDF('P', 'mm', 'A4', true, 'UTF-8', false);
// set margins
$pdf->setMargins('10', '27', '15');
$pdf->setHeaderMargin('5');
$pdf->setFooterMargin('10');

$pdf->setVars($assessment,$notes,$participations);

$pdf->AddPage();
$pdf->MonContenu();
$pdf->Output('rapport.pdf', 'I');