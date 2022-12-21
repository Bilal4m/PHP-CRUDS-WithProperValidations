<?php
     require_once('FPDF/fpdf.php');
     require_once('connection.php');

     $selectquery = "select * from crud";
     $query = mysqli_query($con , $selectquery);
     
     $numsofrows = mysqli_num_rows($query);
     
    

     if(isset($_POST['pdfbtn'])){

        


         $pdf = new FPDF('P','mm','A4');
         $pdf->SetFont('Arial','b','8');
         $pdf->AddPage();
        //  $pdf->Image('logo.png',10,6,30,0);

        $pdf->cell('0','10','Data Of Applicants','0','1','C');

         $pdf->cell('10','10','ID','1','0','C');
         $pdf->cell('23','10','Name','1','0','C');
         $pdf->cell('45','10','Email','1','0','C');
         $pdf->cell('22','10','Phone','1','0','C');
         $pdf->cell('15','10','Degree','1','0','C');
         $pdf->cell('15','10','Reference','1','0','C');
         $pdf->cell('20','10','Language','1','0','C');
         $pdf->cell('20','10','Gender','1','0','C');
         $pdf->cell('20','10','Pic','1','1','C');

         while($res = mysqli_fetch_array($query)){
            $pdf->cell('10','10',$res['id'],'1','0','C');
            $pdf->cell('23','10',$res['name'],'1','0','C');
            $pdf->cell('45','10',$res['email'],'1','0','C');
            $pdf->cell('22','10',$res['phone'],'1','0','C');
            $pdf->cell('15','10',$res['degree'],'1','0','C');
            $pdf->cell('15','10',$res['refer'],'1','0','C');
            $pdf->cell('20','10',$res['language'],'1','0','C');
            $pdf->cell('20','10',$res['gender'],'1','0','C');
            $pdf->cell('20','10',$res['pic'],'1','1','C');

        }


         $pdf->Output();

         
     }

   ?>