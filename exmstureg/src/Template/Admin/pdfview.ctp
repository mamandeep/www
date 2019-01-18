<?php //require_once (PATH_THIRDPARTY . "tcpdf" . PATH_SEP . "tcpdf.php"); 
	use Cake\Filesystem\Folder;
	use Cake\Filesystem\File;
	class xtcpdf extends TCPDF {
		public $header_align = 'C';      //center align header by default
   		public $header_line_width = 0.85;//percentage of the page width
   		public $header_line = false;     //set to true to display a line below the header
   		public $Id8 = "";
		public $Id9 = "";
		public $Id10 = "";
		public $courses = "";
   		//public $header_margin = 250;
   
   		public $footer_align = 'C';      //center align footer by default
   		public $footer_line = false;     //set to true to display a line above the footer
   		public $footer_text = 'Central University of Punjab';        //text to display in footer 
   		//public $image_file = '';  		//Path to CUPB Logo
   	
	public function setHeaderTextDMC($Id8, $Id9, $courses, $Id10) {
   		$this->Id8 = $Id8;
		$this->Id9 = $Id9;
		$this->courses = $courses;
		$this->Id10 = $Id10;
   	}
	
	public function Header() {
		$html = <<<EOF
		<!-- EXAMPLE OF CSS STYLE -->
		<style>
		    .wordart {
			  font-family: Arial, sans-serif;
			  font-size: 2em;
			  font-weight: bold;
			  position: relative;
			  text-align: center;
			  z-index: 1;
			  padding:0px;
  			  margin:0px;
			  display: inline-block;
			  -webkit-font-smoothing: antialiased;
			  -moz-osx-font-smoothing: grayscale;
			}

			.wordartact {
			  font-family: Arial, sans-serif;
			  font-size: 8px;
			  position: relative;
			  text-align: center;
			  z-index: 1;
			  padding:0px;
  			  margin:0px;
			  display: inline-block;
			  -webkit-font-smoothing: antialiased;
			  -moz-osx-font-smoothing: grayscale;
			}

			.wordart.blues .text {
			    font-family: Impact, sans-serif;
			    color: #24c0fd;
			    -webkit-text-stroke: 0.01em #0000aa;
			    filter: progid:DXImageTransform.Microsoft.Glow(Color=#0000aa,Strength=1);
			    text-shadow: 0.13em -0.13em 0px #0000aa;
			    letter-spacing: -0.05em;
			}
		</style>

		<div class="wordart blues">
			<span class="text">Central University of Punjab</span>
			<span class="wordartact"></span>
		</div>
EOF;

	// output the HTML content
		//$this->writeHTML($html, true, false, true, false, '');




		// Logo
		$this->SetFont('times', '', 8);
		$this->Cell(1, 0, 'Sr. No. 5181', 0, 0, 'L', 0, '', 0);
		$this->SetTextColor(2, 145, 0);
		$this->SetFont('times', 'B', 20);
		$sText = 'Central University of Punjab';
		$this->Cell(0, 0, 'Central University of Punjab', 0, 1, 'C', 0, '', 0);
		$this->SetTextColor(0, 0, 0);
		$this->SetFont('times', '', 8);
		$this->Cell(0, 0, '(Established vide Act 25(2009) of Parliament)', 0, 1, 'C', 0, '', 0);
		$this->SetFont('times', 'BI', 12);
		$this->Cell(0, 0, 'Result-Cum-Detailed Marks/Grades Card', 0, 1, 'C', 0, '', 0);
		//$this->Cell(0, 0, '', 0, 1, 'C', 0, '', 0);
		$this->SetTextColor(0, 148, 255);
		$this->SetFont('times', 'B', 12);
		//debug($this->courses); exit; 
		$name = !empty($this->courses[0]['programme']['name']) ? $this->courses[0]['programme']['name'] : "Data Not Found";
		$this->Cell(0, 0, $name, 0, 1, 'C', 0, '', 0);
		$this->SetTextColor(0, 0, 0);
		$this->SetFont('times', '', 12);
		$this->Cell(0, 0, ucwords(strtolower(!empty($this->Id8['department']['name']) ? $this->Id8['department']['name'] : "Deparment Not Found")), 0, 1, 'C', 0, '', 0);
		$this->Cell(0, 0, ucwords(strtolower(!empty($this->Id8['department']['school']['name']) ? $this->Id8['department']['school']['name'] : "School Not Found")), 0, 1, 'C', 0, '', 0);
		$this->SetTextColor(0, 148, 255);
		$this->SetFont('times', 'B', 12);
		$semesters = [];
		//debug($this->Id9); exit;
		foreach($this->Id9 as $key => $value) {
			//debug($value);
			if(!in_array($value['semester'], $semesters)) {
				$semesters[] = $value['semester'];
			}
		}
		
		$str = "";
		//debug($semesters[0]); exit;
		if(isset($this->Id9)) {
			switch($semesters[0]) {
				case 1:
					$str = "First Semester Examination Held in " . $this->courses[0]['examination_date'];
					break;
				case 2:
					$str = "Second Semester Examination Held in " . $this->courses[0]['examination_date'];
					break;
				case 3:
					$str = "Third Semester Examination Held in " . $this->courses[0]['examination_date'];
					break;
				case 4:
					$str = "Fourth Semester Examination Held in " . $this->courses[0]['examination_date'];
					break;
				}
		}
													
		$this->Cell(0, 0, strtoupper($str), 0, 1, 'C', 0, '', 0);

		$dir = new Folder(WWW_ROOT . 'img');
		$dir2 = new Folder(WWW_ROOT . 'uploads\files');
		//debug($dir); exit;
		$file = $dir->find('cup_logo.jpg', true);
		$file2 = $dir2->find($this->Id10['photo'], true);
		$file = new File($dir->pwd() . DS . $file[0]);
		$file2 = new File($dir2->pwd() . DS . $file2[0]);
		//debug($this->Id10); debug($file); exit;
		//$image_file = $this->request->webroot . 'AdminLTE./img/cup_logo.png';
		$this->Image('@'.file_get_contents($file->path), 10, 20, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->Image('@'.file_get_contents($file2->path), $this->getPageDimensions()['wk']-PDF_MARGIN_LEFT-15, 20, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$file->close();
		$style = array(
		    'border' => 2,
		    'vpadding' => 'auto',
		    'hpadding' => 'auto',
		    'fgcolor' => array(0,0,0),
		    'bgcolor' => false, //array(255,255,255)
		    'module_width' => 1, // width of a single module in points
		    'module_height' => 1 // height of a single module in points
		);

		// QRCODE,H : QR-CODE Best error correction
		$this->write2DBarcode('www.cup.edu.in', 'QRCODE,H', $this->getPageDimensions()['wk']-PDF_MARGIN_LEFT-10, 10, 10, 10, $style, 'N');
		//$this->Cell(0, 100, '&nbsp', 'T', 0, 'L');
		
		//debug($image_file); exit;
		//$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
        if ($this->header_line) {
        	$this->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));//$this->footer_line_color));
        	$this->Cell(0, 0, $sText, 'T', 0, $this->header_align);
    	}
    	else { //without line
        	
    	}
    	//debug($this->getPageDimensions()); exit;
    	$this->Line(PDF_MARGIN_LEFT,50,($this->getPageDimensions()['wk']-PDF_MARGIN_LEFT),50,array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(2, 145, 0)));
    	//$this->Multicell(0,0,"\n"); 
		//$this->Ln();
	}
	
	// Page footer
	public function Footer() {
		//$aTexts = preg_split('/{PageNo}/is', $this->footer_text);
        //$sText = $this->footer_text;
        //foreach ($aTexts as $str) {
        	//$sText .= $str;
    	//}
        
    // Set font
        $aFont   = $this->getFooterFont();
        $this->SetFont($aFont[0], $aFont[1], $aFont[2]);
        $this->SetTextColorArray($this->footer_text_color);
        
        //Print footer text with line:
    	if ($this->footer_line) {
        	$this->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));//$this->footer_line_color));
        	//$this->Cell(0, 0, $sText, 'T', 0, $this->footer_align);
    	}
    	else { //without line
        	//$this->Cell(0, 0, $sText, 0, false, $this->footer_align, 0, '', 0, false, 'T', 'M');
    	}
    	$this->SetFont('helvetica', '', 12);
		$this->Cell(($this->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, 'Date: '. date("d.m.Y"), 0, 0, 'L', 0, '', 0);
		$this->Ln();
		$this->Cell(($this->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, 'Bathinda', 0, 0, 'L', 0, '', 0);
		$this->SetFont('helvetica', 'B', 12);
		$this->Cell(3*($this->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, 'Controller of Examinations', 0, 0, 'R', 0, '', 0);
		$this->Ln();
		$style = array(
		    'position' => 'C',
		    'align' => 'C',
		    'stretch' => false,
		    'fitwidth' => true,
		    'cellfitalign' => '',
		    'border' => false,
		    'hpadding' => 'auto',
		    'vpadding' => 'auto',
		    'fgcolor' => array(0,0,0),
		    'bgcolor' => false, //array(255,255,255),
		    'text' => false,
		    'font' => 'helvetica',
		    'fontsize' => 8,
		    'stretchtext' => 4
		);

		$this->write1DBarcode('123456789', 'CODABAR', '', '', '', 8, 0.4, $style, 'N');
	}

	public function SetupFooter($sContent, $bottomMargin) {
        //check for footer tags:
        $this->SetPrintFooter(true);
    }

    public function SetupTable($courses, $marksgplg) {
    	$html = <<<EOF
    	<style type="text/css">
			img {
			  opacity: 0.5;
			  filter: alpha(opacity=50); /* For IE8 and earlier */
			}

			table {
				width: 100%;
				border-collapse: collapse;
				border: none;
			}

			td {
				border: 0.2px solid #029100;
			}

			.headertext {
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
				font-size: 16px;
				font-weight: bold;
				text-align: center;
			}

			.tabletext {
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
				font-size: 16px;
				font-weight: none;
				text-align: center;
			}

			td.subject {
				text-align: left;
			}

			.totaltext {
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
				font-size: 16px;
				font-weight: bold;
			}

			.startext {
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
				font-size: 8px;
				font-weight: bold;
				text-align: center;
				border: none;
			}

			.rowheight {
				line-height: 35px;
			}

		</style>

		<table width="100%">
			<tr>
				<td width="12.5%" class="headertext">Course Code</td>
				<td width="50%" class="headertext">Subject</td>
				<td width="12.5%" class="headertext">Course Credits</td>
				<td width="12.5%" class="headertext">Grade Points</td>
				<td width="12.5%" class="headertext">Letter Grade</td>
			</tr>
EOF;
			//debug($courses); exit;
			$totalCredits = 0;
			$totalMarks = 0;
			$totalCummulative = 0;
			//$totalGradePoint = 0;
			$totalLetterGrade = 0;
			$id7 = false;
			for($i=0;$i<12;$i++) {
				if(!empty($courses[$i])) {
					$id4 = "";
					if(!empty($courses[$i]['internal_assessment']) && !empty($courses[$i]['end_semester_examination']) && $courses[$i]['internal_assessment'] != 0 && $courses[$i]['end_semester_examination'] != 0) {
						$id4 = round(bcdiv(bcadd($courses[$i]['internal_assessment'], $courses[$i]['end_semester_examination'], 2),10,2),1);
						//debug($id4);
						$id7 = (round(bcadd($courses[$i]['internal_assessment'], $courses[$i]['end_semester_examination'], 2)) < 40 && $id7 == false) ? true : false;
					}
					else if(is_numeric($courses[$i]['total'])) {
						$id4 = round(bcdiv($courses[$i]['total'], 10, 2), 1);
						//debug($id4);
						$id7 = ($id4 < 40 && $id7 == false) ? true : false;
					}
					else {
						$id4 = $courses[$i]['total'];
						//debug($id4);
						$id7 = ($id4 == 'US' && $id7 == false) ? true : false;
					}
					$row = '';
					$row .= "<tr class=\"rowheight\">";
					$row .= "<td class=\"tabletext\">" . $courses[$i]['_matchingData']['Courses']['course_code'] . "</td>";
					$row .= "<td class=\"tabletext subject\">" . $courses[$i]['_matchingData']['Courses']['name'] . "</td>";
					$row .= "<td class=\"tabletext\">" . $courses[$i]['_matchingData']['Courses']['credits'] . "</td>";
					$row .= "<td class=\"tabletext\">" . $id4 . "</td>";
					$row .= "<td class=\"tabletext\">" . $courses[$i]['letter_grade'] . "</td>";
					$row .= "</tr>";
					$html .= $row;
					$totalCredits += $courses[$i]['_matchingData']['Courses']['credits'];
					$totalMarks += is_numeric($courses[$i]['total']) ? $courses[$i]['total'] : 0;
					$totalCummulative += ($courses[$i]['_matchingData']['Courses']['countable'] == "Yes") ? ((is_numeric($courses[$i]['total']) ? round(bcadd($courses[$i]['internal_assessment'], $courses[$i]['end_semester_examination'], 2),0) : 0) * intval($courses[$i]['_matchingData']['Courses']['credits'])) : 0;
					//debug($totalCredits); debug($totalCummulative); debug($course['total']);	
				}
				else {
					$row = '';
					$row .= "<tr class=\"rowheight\">";
					$row .= "<td class=\"tabletext\"></td>";
					$row .= "<td class=\"tabletext\"></td>";
					$row .= "<td class=\"tabletext\"></td>";
					$row .= "<td class=\"tabletext\"></td>";
					$row .= "<td class=\"tabletext\"></td>";
					$row .= "</tr>";
					$html .= $row;
				}
			}
			//debug($totalCredits); debug($totalCummulative); debug(bcdiv($totalCummulative,$totalCredits,2)); exit;
		$html .= '<tr class="rowheight"><td></td><td class="totaltext">TOTAL</td><td>'. ($id7 == true) ? "" : $totalCredits .'</td><td class="totaltext">' . ($id7 == true) ? "" :  bcdiv(bcdiv($totalCummulative,$totalCredits,2),10,2) . '</td><td class="totaltext">'. ($id7 == true) ? "" : $marksgplg[round(bcdiv($totalCummulative,$totalCredits,2))+1]['lg'] . '</td></tr>';
		if($id7 == true) {
			$html .= '<tr class="lastrow rowheight"><td colspan="5" class="startext">*Indicates the marks obtained after supplementary Examination held in ' . $this->courses[0]['examination_date'] . '</td></tr>';
		}
		$html .= '</table>';
		$this->writeHTML($html, true, false, true, false, '');
		$this->Ln();
		$html = <<<EOF
			<style type="text/css">
			img {
			  opacity: 0.5;
			  filter: alpha(opacity=50); /* For IE8 and earlier */
			}

			table {
				border-collapse: collapse;
				border: none;
			}

			td {
				border: 0.2px solid #0094ff;
			}

			.headertext {
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
				font-size: 16px;
				font-weight: bold;
				text-align: left;
			}

			.tabletext {
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
				font-size: 16px;
				font-weight: none;
				text-align: left;
			}

			td.text {
				text-align: center;
			}

			.totaltext {
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
				font-size: 16px;
				font-weight: bold;
			}

			.startext {
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif; 
				font-size: 8px;
				font-weight: bold;
				text-align: center;
				border: none;
			}

		</style>
EOF;
		$html .= '<table>';
		$html .= '<tr><td class="headertext" rowspan="2">Semester Result</td><td>SGPA: '. bcdiv(bcdiv($totalCummulative,$totalCredits,2),10,2) .' </td><td class="headertext">Letter Grade: '. $marksgplg[round(bcdiv($totalCummulative,$totalCredits,2))+1]['lg'] .'</td><td class="headertext">Total Credits: ' . $totalCredits . '</td></tr>';
		$html .= '<tr><td height="40px" class="text" colspan="3">Pass with Letter Grade \'C\' (Average)</td></tr>';
		$html .= '<tr><td class="headertext">Cummulative Result</td><td class="headertext">CGPA:</td><td class="headertext">Letter Grade:</td><td class="headertext">Total Credits:</td></tr>';
		$html .= '</table>';
		$this->writeHTML($html, true, false, true, false, '');
		
		//debug($html); exit;
		//$this->writeHTML($html, true, false, true, false, '');
    }
}

//debug("here-1");

// create new PDF document
$pdf = new xtcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
//debug("here");
//set default header data
//debug($Id7); exit;
$pdf->setHeaderTextDMC($Id8, $Id7, $courses, $Id10);
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 004', PDF_HEADER_STRING);

//$pdf->Footer();

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//debug("here2");
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(20);
//$pdf->SetupHeader($sContent, $margins['top']);
$pdf->SetupFooter(null, PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//debug("here3");
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);
//
// add a page
$pdf->AddPage();

/*$style = array(
		'position' => '',
		'align' => 'C',
		'stretch' => false,
		'fitwidth' => true,
		'cellfitalign' => '',
		'border' => true,
		'hpadding' => 'auto',
		'vpadding' => 'auto',
		'fgcolor' => array(0,0,0),
		'bgcolor' => false, //array(255,255,255),
		'text' => true,
		'font' => 'helvetica',
		'fontsize' => 8,
		'stretchtext' => 4
);

$pdf->Cell(0, 0, '', 0, 1);
$pdf->write1DBarcode('1234567', 'I25+', '', '', '', 18, 0.4, $style, 'N');*/

// set some text to print
$txt = <<<EOD
TCPDF Example 003
		
Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;

// print a block of text using Write()
//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$pdf->Multicell(0,30,"\n"); 
//$pdf->Ln();
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(($pdf->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, 'Name:', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(($pdf->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, 'Dharmendra Kumar', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(($pdf->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, 'Reg. No.:', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(($pdf->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, '16mslshg14', 0, 0, 'L', 0, '', 0);
$pdf->Ln();
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(($pdf->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, 'Father\'s Name:', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(($pdf->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, 'Rambali Das', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(($pdf->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, 'Mother\'s Name:', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(($pdf->getPageDimensions()['wk']- PDF_MARGIN_LEFT -PDF_MARGIN_RIGHT)/4, 0, 'Asha Devi', 0, 0, 'L', 0, '', 0);
//debug("here4");
$pdf->Ln();
$pdf->Ln();
//$data = $pdf->LoadData('data/table_data_demo.txt');

// print colored table
//debug($courses); exit;
$pdf->SetupTable($courses, $marksgplg);
$pdf->Ln();
//debug("here5");
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

?>