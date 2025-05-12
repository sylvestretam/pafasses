<?php
require_once('public/pdf/TCPDF-main/tcpdf.php');

class MonPDF extends TCPDF
{

    // $assessment = [];
    // $notes = [];
    // $partcipations = [];

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
            $sum = $sum . $participation->swot . "; ";
        }

        return $sum;
    }

    function getAxe($participations)
    {
        $sum = "";
        
        foreach ($participations as $participation) {
            $sum = $sum . $participation->amelioration . "; ";
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

        $this->SetFont($fontbold, 'B', 14);
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
        $this->MultiCell($cellWidth / 6, $lineheight, 'Nom/Raison sociale partenaire :', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 2, $lineheight,  $this->assessment->nom_paf, 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Date de l’évaluation :', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, Date("d-M-Y"), 1, 'L', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 8);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Activité/spécialité évaluée :', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 2, $lineheight, $this->assessment->designation, 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Unité évaluatrice :', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'L', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 8);
        $this->MultiCell($cellWidth / 4, $lineheight, 'Période concernée :', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 4, $lineheight, $this->assessment->periode, 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 4, $lineheight, 'Lieu de l’activité :', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 4, $lineheight, $this->assessment->lieu, 1, 'L', 0, 1, '', '', true);
        $this->ln(4);

        //Premier tableau
        $lineheight = 6;
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
        $this->MultiCell(0, $lineheight, '1) TECHNIQUE (Qualité de la prestation/ travaux/matériel) (30%)', 1, 'L', 0, 1, '', '', true);

        $this->SetFont($fontreg, '', 9);
        $lineheight = 9;
        $this->MultiCell($cellWidth / 2, $lineheight, '• Conformité des travaux/prestations/matériel avec les normes en vigueur', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,1),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,1),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,1),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,1),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,1),15,20), 1, 'C', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Respect du cahier de charges', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,2),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,2),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,2),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,2),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,2),15,20), 1, 'C', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Efficacité des travaux sur la durée (fourniture régulière des prestations/matériel de qualité)', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,3),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,3),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,3),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,3),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,3),15,20), 1, 'C', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 9);
        $lineheight = 0;
        $this->MultiCell(0, $lineheight, '2) HSE (20%)', 1, 'L', 0, 1, '', '', true);

        $this->SetFont($fontreg, '', 9);
        $lineheight = 0;
        $this->MultiCell($cellWidth / 2, $lineheight, '• Equipement personnel en EPI', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,4),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,4),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,4),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,4),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,4),15,20), 1, 'C', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Respect des procédures sécurité et exigences Eneo', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,5),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,5),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,5),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,5),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,5),15,20), 1, 'C', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Reporting des évènements HSE', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,6),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,6),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,6),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,6),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,6),15,20), 1, 'C', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 9);
        $lineheight = 0;
        $this->MultiCell(0, $lineheight, '3) FINANCE (20%)', 1, 'L', 0, 1, '', '', true);

        $this->SetFont($fontreg, '', 9);
        $lineheight = 0;
        $this->MultiCell($cellWidth / 2, $lineheight, '• Acceptation des conditions de paiement Eneo', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,7),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,7),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,7),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,7),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,7),15,20), 1, 'C', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Préfinancement des travaux', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,8),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,8),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,8),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,8),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,8),15,20), 1, 'C', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Clarté dans la structure des prix/cout', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,9),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,9),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,9),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,9),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,9),15,20), 1, 'C', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 9);
        $lineheight = 0;
        $this->MultiCell(0, $lineheight, '4) DELAIS (20%)', 1, 'L', 0, 1, '', '', true);

        $this->SetFont($fontreg, '', 9);
        $lineheight = 0;
        $this->MultiCell($cellWidth / 2, $lineheight, '• Respect planning', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,10),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,10),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,10),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,10),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,10),15,20), 1, 'C', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Disponibilité/Temps de réaction en cas de sollicitation Eneo', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,11),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,11),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,11),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,11),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,11),15,20), 1, 'C', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Délais de restitution des documents après travaux /prestations', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,12),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,12),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,12),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,12),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,12),15,20), 1, 'C', 0, 1, '', '', true);


        $this->SetFont($fontreg, 'B', 9);
        $lineheight = 0;
        $this->MultiCell(0, $lineheight, '5) ETHIQUE/VALEURS (10%)', 1, 'L', 0, 1, '', '', true);

        $this->SetFont($fontreg, '', 9);
        $lineheight = 0;
        $this->MultiCell($cellWidth / 2, $lineheight, '• Respect des Valeurs Eneo', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,13),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,13),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,13),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,13),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,13),15,20), 1, 'C', 0, 1, '', '', true);

        $this->MultiCell($cellWidth / 2, $lineheight, '• Responsabilité sociale', 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,14),0,5), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,14),5,10), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,14),10,13), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,14),13,15), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 10, $lineheight, $this->writePerfomance($this->getNote($this->notes,14),15,20), 1, 'C', 0, 1, '', '', true);

        $this->SetFont($fontreg, 'B', 11);
        $lineheight = 20;
        $this->MultiCell(0, $lineheight, 'Analyse SWOT :'. $this->swot, 1, 'L', 0, 1, '', '', true);
        $lineheight = 20;
        $this->MultiCell(0, $lineheight, 'Axes d’amélioration : (ou toute autre observation sur le PAF) :'.$this->axe, 1, 'L', 0, 1, '', '', true);

        $this->ln(1);
        $this->SetFont($fontreg, 'B', 7);
        $lineheight = 0;
        $this->setCellPadding(1);
        $this->MultiCell($cellWidth / 4, $lineheight, 'Performance (Cocher la case) :', 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 5, $lineheight, 'MEDIOCRE (<65)', 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 20, $lineheight, $this->writePerfomance($this->performance,0,65), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 5, $lineheight, 'SATISFAISANT (>65, <80)', 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 20, $lineheight, $this->writePerfomance($this->performance,65,80), 1, 'C', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 5, $lineheight, 'EXCELLENT (>80)', 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 20, $lineheight, $this->writePerfomance($this->performance,80,100), 1, 'C', 0, 1, '', '', true);

        $this->ln(1);
        $this->SetFont($fontreg, 'B', 7);
        $lineheight = 0;
        $this->setCellPadding(3);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Responsable :', 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, $this->assessment->name_user, 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Fonction :', 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, 'Signature : ', 1, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'L', 0, 1, '', '', true);

        foreach ($this->participations as $participation) {
         
            $this->ln(1);
            $this->SetFont($fontreg, 'B', 7);
            $lineheight = 0;
            $this->setCellPadding(3);
            $this->MultiCell($cellWidth / 6, $lineheight, 'Participant :', 1, 'L', 0, 0, '', '', true);
            $this->MultiCell($cellWidth / 6, $lineheight, $participation->name_user, 1, 'L', 0, 0, '', '', true);
            $this->MultiCell($cellWidth / 6, $lineheight, 'Fonction :', 1, 'L', 0, 0, '', '', true);
            $this->MultiCell($cellWidth / 6, $lineheight, $participation->job_user, 1, 'L', 0, 0, '', '', true);
            $this->MultiCell($cellWidth / 6, $lineheight, 'Signature : ', 1, 'L', 0, 0, '', '', true);
            $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'L', 0, 1, '', '', true);   

        }

        // $this->SetFont($fontreg, 'B', 7);
        // $lineheight = 0;
        // $this->setCellPadding(3);
        // $this->MultiCell($cellWidth / 6, $lineheight, 'Participant :', 1, 'L', 0, 0, '', '', true);
        // $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'L', 0, 0, '', '', true);
        // $this->MultiCell($cellWidth / 6, $lineheight, 'Fonction :', 1, 'L', 0, 0, '', '', true);
        // $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'L', 0, 0, '', '', true);
        // $this->MultiCell($cellWidth / 6, $lineheight, 'Signature : ', 1, 'L', 0, 0, '', '', true);
        // $this->MultiCell($cellWidth / 6, $lineheight, '', 1, 'L', 0, 1, '', '', true);

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
        $this->MultiCell($cellWidth / 6, $lineheight, 'Signature / Date : ', 0, 'L', 0, 0, '', '', true);
        $this->MultiCell($cellWidth / 6, $lineheight, '', 'R', 'L', 0, 1, '', '', true);

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

$pdf->setVars($assessment,$notes,$participations);

$pdf->AddPage();
$pdf->MonContenu();
$pdf->Output('rapport.pdf', 'I');