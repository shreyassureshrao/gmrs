<?php
//SHOW A DATABASE ON A PDF FILE
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('fpdf.php');

//Connect to your database
include('include/config.php');

//Select the Products you want to show in your PDF file
$result=mysqli_query($bd,"SELECT c.committeeName,m.name,cm.role FROM committee c, member m, `committee-member-mapping` cm WHERE c.id=cm.committeeId and cm.memberId=m.id ORDER BY c.committeeName, cm.role ASC");
$number_of_products = mysqli_num_rows($result);

//Initialize the 3 columns and the total
$column_committeename = "";
$column_membername = "";
$column_role = "";
$previousCommitteeName='OLD';

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
    $row_committeename = $row["committeeName"];
    $row_membername = $row["name"];
    $row_role = $row["role"];
	
	$column_committeename = $column_committeename.$row_committeename."\n";
    $column_membername = $column_membername.$row_membername."\n";
    $column_role = $column_role.$row_role."\n";
    
 }
mysqli_close($bd);

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(45);
$pdf->Cell(20,6,'COMMITTEE-NAME',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(100,6,'MEMBER-NAME',1,0,'L',1);
$pdf->SetX(135);
$pdf->Cell(30,6,'ROLE',1,0,'R',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$column_committeename,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(100,6,$column_membername,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(30,6,$column_role,1,'R');

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(45);
    $pdf->MultiCell(120,6,'',1);
    $i = $i +1;
}

$pdf->Output();
?>