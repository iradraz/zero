<?php

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Irad Raz');
$pdf->SetTitle($test_id);
$pdf->SetSubject($test_id . ' Mixed Test');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
// Set some content to print

$html = '<div class="questions">';
$html .='<h1>Question of the test - mixed test</h1>';
$html .='<br>';
$this->load->module('test');
$sequence = $this->test->mix_test_questions($test_id);
foreach ($sequence as $x => $x_value) {
    $html.= '<h2>' . ($x + 1) . '. ' . $x_value['question_asked'] . '</h2>';
    $html.= '<ol>';
    foreach ($x_value['answers'] as $answer_key => $answer_array) {
        $html.= '<li>' . $answer_array['answer'] . '</li>';
    }
    $html.= '</ol>';
}
$html .='<br>';
$html .='</div>';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->AddPage();
$pdf->setPage($pdf->getPage());

$html = '<style>
        th{
            background-color: #4CAF50;
            padding-top: 3px;
            padding-bottom: 3px;
            padding-left: 6px;
            padding-right: 6px;
            border: 1px solid black;
        }
         td {
            border: 1px solid black;
          
            text-align: center;
        }
        table{
            border: 1px solid black;
            text-align: center;
            width: 20%; 
        }

    </style>

    <h2>Answer key table:</h2>

    <table>
        <tr>
            <th>#</th>
            <th>Answer</th>
        </tr>';
foreach ($sequence as $x => $x_value) {
    $html.='<tr>';
    $html.= '<td>' . ($x + 1) . '</td>';
    $counter = 1;
    foreach ($x_value['answers'] as $answer_key => $answer_array) {

        if ($answer_array['answer_correct'] == 1) {
            $html.= '<td>' . $counter . '</td>';
            $counter = 1;
        }
        $counter++;
    }
    $html.='</tr>';
}
$html.='</table>';




$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output($test_id . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
