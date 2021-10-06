<?php include_once('config.php'); include('Classes/PHPExcel.php');?>
<?php
$excel->getActiveSheet()->setCellValue('A'.$rowNumber, $data->code_caption)->setCellValue('B'.$rowNumber, $data->color);
if(file_exists('./media/img/gallery/items/'.$data->image.'TH.jpg'))
{
 $objDrawing = new PHPExcel_Worksheet_Drawing();
 $objDrawing->setPath('./media/img/gallery/items/'.$data->image.'TH.jpg');
 $objDrawing->setCoordinates('C'.$rowNumber);
 $objDrawing->setWorksheet($this->excel->getActiveSheet());
 $this->excel->getActiveSheet()->getRowDimension($rowNumber)->setRowHeight(120);
}
else
{
$this->excel->getActiveSheet()->setCellValue('C'.$rowNumber, '');}
$this->excel->getActiveSheet()->setCellValue('D'.$rowNumber, $data->desc);
$this->excel->getActiveSheet()->setCellValue('E'.$rowNumber, $data->$d_met);
$this->excel->getActiveSheet()->setCellValue('F'.$rowNumber, $data->$w_met);
$this->excel->getActiveSheet()->setCellValue('G'.$rowNumber, $data->$h_met);
$this->excel->getActiveSheet()->setCellValue('H'.$rowNumber, $data->qty);
$this->excel->getActiveSheet()->setCellValue('I'.$rowNumber,$data->$cur_dat);
$this->excel->getActiveSheet()->setCellValue('J'.$rowNumber,$data->$total_price);
$rowNumber++;
 }?>