<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDF
 *
 * @author lparagua
 */

include_once '/../third_party/fpdf/fpdf.php';

class PDF extends FPDF{
    
    var $widths;
    var $aligns;
    var $title;
    
    public function __construct($orientation = 'P', $unit = 'mm', $size = 'A4') {
        parent::__construct($orientation, $unit, $size);
    }
    
    //Configuramos el ancho 
    function setWidths($w){
        $this->widths=$w;
    }
    
    //Configuramos el alineamiento
    function setAligns($a){
        $this->aligns=$a;
    }
    
    function setPageTitle($title) {
        $this->title = $title;
    }


    // Cabecera de página
    function Header(){
    
        //Image Path
        $imgPath = base_url().'assets/img/logo_everis.png';    
        // Logo
        $this->Image($imgPath,10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        //Título
        $this->Cell(30, 10, $this->title, 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer(){
    
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
    function NbLines($w,$txt){
	
        //Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	
        if($w==0) {
            
            $w = $this->w-$this->rMargin-$this->x;
        }
        
	$wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
	$s = str_replace("\r",'',$txt);
	$nb = strlen($s);
        
	if($nb > 0 && $s[$nb-1]=="\n"){
            $nb--;
        }
		
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
        
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
    }
    
    function CheckPageBreak($h){
	
        //If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
    }
    
    function Row($data, $align){
	
        //Calculate the height of the row
	$nb=0;
        
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
        
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
        
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		//$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		
                //Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
                
		//Draw the border
		$this->Rect($x,$y,$w,$h);
		$this->MultiCell($w,5,$data[$i],0,$align,'true');

		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
        
	//Go to the next line
	$this->Ln($h);
    }
}
