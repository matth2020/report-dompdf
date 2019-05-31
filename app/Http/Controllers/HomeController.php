<?php

namespace App\Http\Controllers;
use App\library\FPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View; 
use URL;
use App\Models\Patient;
use App\Models\Prescription;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function reports()
    {
        return view('report');
    }
    public function pdfView($patient_id,$prescription_id)
    {
        $PatientData        = Patient::where('patient_id',$patient_id)->first();
        $PrescriptionData   = Prescription::where('patient_id',$prescription_id)->first();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->Image('./assets/images/logo.png',150,5,50);
        $pdf->SetXY(15,10);
        $pdf->SetFont('Arial','',20);
        $pdf->Write(10,'IMMUNOTHERAPY OVERVIEW');
        $pdf->SetFont('Arial','B',10);
        $pdf->Ln();
        $pdf->Image('./assets/images/person.png',8,19,4);
        /*paitent_line*/
        $pdf->SetXY(15,20);
        $pdf->Write(5,$PatientData['firstname'].' '.$PatientData['lastname']);
        $pdf->SetFont('Arial','',10);
        $pdf->SetTextColor(0,100,250);
        $pdf->Write(5,' | ');
        $pdf->SetTextColor(0,0,0);
        $pdf->Write(5,'DOB: '.$PatientData['dob']);
        $pdf->Write(5,' | ');
        $pdf->Write(5,'MRN: '.$PatientData['chart']);
        $pdf->SetTextColor(0,0,0);
        $pdf->Ln();
        /*paitent_line*/
        $pdf->Image('./assets/images/location.png',8,25,4);
        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(15,26);
        $pdf->Write(5,$PrescriptionData->provider['first'].' '.$PrescriptionData->provider['last'].' '.$PrescriptionData->provider['addr1'].' '.$PrescriptionData->provider['city'].', '.$PrescriptionData->provider['state']);
        $pdf->SetDrawColor(0,100,250);
        $pdf->SetLineWidth(.3);
        $pdf->Line(25,35,190,35);
        $pdf->Ln();
        $pdf->SetXY(10,25);
        /*paitent_line*/
        /*body*/
            /*providers*/
            $pdf->Ln();
            $pdf->SetFont('Arial','',14);
            $pdf->Write(30, 'Prescription Overview');
            $pdf->Ln();
            $pdf->SetXY(20,50);
            $pdf->SetFont('Arial','',10);
            $pdf->Write(6,'Attending provider: '.$PrescriptionData->provider['displayname']);
            $pdf->Ln();
            $pdf->Image('./assets/images/doc-check.png',14,52,4);
            $pdf->SetXY(20,55);
            $pdf->Write(6,'Prescribing provider: '.$PrescriptionData->provider['displayname']);
            $pdf->SetDrawColor(0,0,0);
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(20,65);
            $pdf->Write(5, 'Reason for Prescription');
            $pdf->Image('./assets/images/doc.png',14,65,4);
            $pdf->SetFont('Arial','',10);
            $pdf->Ln();
            $pdf->SetXY(20,70);
            $pdf->Write(5, 'Allergy immunotherapy treatment of');
            $pdf->Ln();
            $pdf->SetXY(25,75);
            $pdf->Write(5,$PrescriptionData['strikethrough_reason']);
            $pdf->Ln();
            $pdf->SetXY(25,80);
            $pdf->Write(5,$PrescriptionData['prescription_note']);
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(20,90);
            $pdf->Write(5, 'Mixed by');
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(45,90);
            $pdf->Write(5, 'Luke Barratt');
            $pdf->Image('./assets/images/tree.png',13,88,6);
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(20,95);
            $pdf->Write(5, 'Mixed on ');
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(45,95);
            $pdf->Write(5, '09/01/2018');
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(20,100);
            $pdf->Write(5, 'Expiration  ');
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(45,100);
            $pdf->Write(5, '09/01/2018');
            $pdf->Line(25,110,190,110);
            $pdf->Image('./assets/images/barcode.png',132,88,56);
            $pdf->Ln();

            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(20,120);
            $pdf->Write(5, 'Prescription ID');
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(50,120);
            $pdf->Write(5, '#904798');
            $pdf->Image('./assets/images/bottle.png',12,121,6);

            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(20,125);
            $pdf->Write(5, 'Bottle name');
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(50,125);
            $pdf->Write(5, 'TRS/GRS Vial 1');

            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(20,130);
            $pdf->Write(5, 'Dosing plan');
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(50,130);
            $pdf->Write(5, 'Baker Standard');

            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->SetXY(20,135);
            $pdf->Write(5, 'Vial size');
            $pdf->SetFont('Arial','',10);
            $pdf->SetXY(50,135);
            $pdf->Write(5, '5 mL');
            $pdf->SetXY(109,120);
            $pdf->Write(5, '1:10,000');
            $pdf->Image('./assets/images/icon1.png',112,125,10);
            $pdf->SetXY(125,120);
            $pdf->Write(5, '1:10,00');
            $pdf->Image('./assets/images/icon2.png',127,125,10);

            $pdf->SetXY(140,120);
            $pdf->Write(5, '1:100');
            $pdf->Image('./assets/images/icon3.png',141,125,10);

            $pdf->SetXY(155,120);
            $pdf->Write(5, '1:10');
            $pdf->Image('./assets/images/icon4.png',155,125,10);

            $pdf->SetXY(170,120);
            $pdf->Write(5, '1:1');
            $pdf->Image('./assets/images/icon5.png',169,125,10);
            $pdf->Ln();
            /*end-providers*/
            /*tables*/
                /*head*/
                    $pdf->SetXY(15,147);
                    $pdf->SetFont('Arial','B',10);
                    $pdf->SetDash(1,1); //5mm on, 5mm off
                    $pdf->Cell(40,10,'Extract','LT');
                    $pdf->Cell(30,10,'Dose (at 1:1)','T');
                    $pdf->Cell(30,10,'Dilution','T');
                    $pdf->Cell(30,10,'Units','T');
                    $pdf->Cell(25,10,'Lot #','T');
                    $pdf->Cell(20,10,'Outdate','RT');
                    $pdf->Ln();
                /*head*/
                /*bordy*/
                $addpres = 10;
                foreach ($PrescriptionData->extracts as $key => $value) 
                {
                    $pdf->SetXY(15,147+$addpres);
                    $pdf->SetFont('Arial','',10);
                    $pdf->SetFillColor(230,230,230); 
                    $pdf->Cell(40,10,$value->extract->name,11,0,'C',true);
                    $pdf->Cell(30,10, $value->dose,11,0,'T',true);
                    $pdf->Cell(30,10,$value->extract->dilution,11,0,'T',true);
                    $pdf->Cell(30,10,'W/V',11,0,'T',true);
                    $pdf->Cell(25,10,$value->extract->code,11,0,'T',true);
                    $pdf->Cell(20,10,'12/25/2019',11,1,'L',true);
                    $addpres = $addpres+10;
                }
                    
                    /*$pdf->SetXY(15,147+ $addpres);
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(40,10,'Diluents','');
                    $pdf->Cell(30,10,'','');
                    $pdf->Cell(30,10,'','');
                    $pdf->Cell(30,10,'','');
                    $pdf->Cell(25,10,'','');
                    $pdf->Cell(20,10,'','');

                    $pdf->Ln();
                    $pdf->SetXY(15,207);
                    $pdf->SetFont('Arial','',10);
                    $pdf->SetFillColor(230,230,230); 
                    $pdf->Cell(40,10,'HSA Saline',11,0,'C',true);
                    $pdf->Cell(30,10,'4 mL',11,0,'T',true);
                    $pdf->Cell(30,10,'',11,0,'T',false);
                    $pdf->Cell(30,10,'',11,0,'T',false);
                    $pdf->Cell(25,10,'',11,0,'T',false);
                    $pdf->Cell(20,10,'',11,1,'L',false);*/
                /*bordy-end*/
            /*end-table*/
            /*table*/
            /*head*/
                $pdf->SetXY(15,220);
                $pdf->SetFont('Arial','B',10);
                $pdf->SetDash(1,1); //5mm on, 5mm off
                $pdf->Cell(70,10,'Total Amounts','LRT');
                $pdf->Ln();
            /*head-end*/
            /*body*/
                $pdf->SetXY(15,240);
                $pdf->SetFont('Arial','',10);
                $pdf->SetFillColor(230,230,230); 
                $pdf->Cell(40,10,'Extract',11,0,'C',true);
                $pdf->Cell(30,10,'1 mL',11,0,'C',true);
                $pdf->Ln();
                $pdf->SetXY(15,230);
                $pdf->Cell(40,10,'Diluents',11,0,'C',true);
                $pdf->Cell(30,10,'4 mL',11,0,'C',true);
                $pdf->Ln();
                $pdf->SetXY(15,240);
                $pdf->Cell(40,10,'% Glycerin',11,0,'C',true);
                $pdf->Cell(30,10,'6 %',11,0,'C',true);
            /*body-end*/
            /*end-table*/

        /*end-body*/
        /*footer*/
        $pdf->SetXY(20,-27);
        $pdf->SetFont('Arial','',10);
        $pdf->Write(5,'Report generated: metheo_andrew');
        $pdf->SetXY(160,270);
        $pdf->Write(5,'Page 1 of 10');
        /*footer*/


        $pdf->AddPage();
        $pdf->SetFont('Arial','b',10);
        $pdf->Write(5,'Custom Compound Details');
        /*tables*/
            /*head*/
                $pdf->SetXY(15,20);
                $pdf->SetFont('Arial','B',10);
                $pdf->Cell(40,10,'Extract','LTB');
                $pdf->Cell(30,10,'Dose (at 1:1)','LTB');
                $pdf->Cell(30,10,'Dilution','LTB');
                $pdf->Cell(30,10,'Units','LTB');
                $pdf->Cell(25,10,'Lot #','LTB');
                $pdf->Cell(20,10,'Outdate','LRTB');
                $pdf->Ln();
            /*head*/
            /*bordy*/
                $pdf->SetXY(15,30);
                $pdf->SetFont('Arial','',10);
                $pdf->SetFillColor(230,230,230); 
                $pdf->Cell(40,10,'Tree Mix 1',1,'LTB','L',true);
                $pdf->Cell(30,10,'0.5mL',1,0,'T',true);
                $pdf->Cell(30,10,'1:20',1,0,'T',true);
                $pdf->Cell(30,10,'W/V',1,0,'T',true);
                $pdf->Cell(25,10,'TM5642',1,0,'T',true);
                $pdf->Cell(20,10,'12/25/2019',1,1,'L',true);
                $pdf->Ln();

                $pdf->SetXY(15,40);
                $pdf->SetFont('Arial','',10);
                $pdf->SetFillColor(230,230,230); 
                $pdf->Cell(40,10,'Elm',1,'LTB','L',true);
                $pdf->Cell(30,10,'0.3 mL',1,0,'T',true);
                $pdf->Cell(30,10,'1:20',1,0,'T',true);
                $pdf->Cell(30,10,'W/V',1,0,'T',true);
                $pdf->Cell(25,10,'ELM015',1,0,'T',true);
                $pdf->Cell(20,10,'01/01/2020',1,1,'L',true);
                $pdf->Ln();

                $pdf->SetXY(15,50);
                $pdf->SetFont('Arial','',10);
                $pdf->SetFillColor(230,230,230); 
                $pdf->Cell(40,10,'Maple',1,'LTB','L',true);
                $pdf->Cell(30,10,'0.3 mL',1,0,'T',true);
                $pdf->Cell(30,10,'1:20',1,0,'T',true);
                $pdf->Cell(30,10,'W/V',1,0,'T',true);
                $pdf->Cell(25,10,'ELM015',1,0,'T',true);
                $pdf->Cell(20,10,'01/01/2020',1,1,'L',true);
                $pdf->Ln();

                $pdf->SetXY(15,60);
                $pdf->SetFont('Arial','',10);
                $pdf->SetFillColor(230,230,230); 
                $pdf->Cell(40,10,'Oak',1,'LTB','L',true);
                $pdf->Cell(30,10,'0.3 mL',1,0,'T',true);
                $pdf->Cell(30,10,'1:20',1,0,'T',true);
                $pdf->Cell(30,10,'W/V',1,0,'T',true);
                $pdf->Cell(25,10,'ELM015',1,0,'T',true);
                $pdf->Cell(20,10,'01/01/2020',1,1,'L',true);
                $pdf->Ln();
            /*bordy-end*/
        /*end-table*/
        /*footer*/
            $pdf->SetXY(20,-27);
            $pdf->SetFont('Arial','',10);
            $pdf->Write(5,'Report generated: metheo_andrew');
            $pdf->SetXY(160,270);
            $pdf->Write(5,'Page 1 of 10');
        /*footer*/
        $pdf->Output();
        exit; 
    }
    public function convert($val)
    {
        return '$pdf->'.$val;
    }
    public function parseJson()
    {
        $array = ["providers"=>[
            "SetFont('Arial','',10)",
            "Write(6, 'Injections administered by: marx')",
            "Ln()",
            "SetXY(25,10)",
            "Write(6,'Attending provider: spicer')",
            "Ln()",
            "SetXY(25,10)",
            "Write(6,'Prescribing provider: alex')",
            "Ln()",
            "SetDrawColor(0,0,0)",
            "SetLineWidth(1)",
            "Line(25,12,190,12)"
        ]];

        foreach ($array['providers'] as $key => $value) 
        {
           $arrr[] = $this->convert($value);
        }
     
        $pdf = new FPDF();
        $pdf->AddPage();
        foreach ($arrr as $key => $value) 
        {
            if(isset($value))
            {
                eval("return $value;");
            }
        }
        $pdf->Output();
        exit;     

    }

    public function parseJsonPost(Request $request)
    {
        $rra        = json_decode(json_encode($request->all()),true);
      /*  foreach ($rra as $key => $value) 
        {
            if($key=='header')
            {
                foreach ($value as $k => $val) 
                {
                    $header[] = $this->convert($val);
                }
            }  
        }
        dd($header);
        die();*/
        foreach ($rra['header'] as $key => $value) 
        {
            $header[] = $this->convert($value);
        }
        foreach ($rra['footer'] as $key => $value) 
        {
            $footer[] = $this->convert($value);
        }

        $pdf = new FPDF();
        $pdf->AddPage();
        foreach ($header as $key => $value) 
        {
            if(isset($value))
            {
                eval("return $value;");
            }
        }
        foreach ($footer as $key => $value) 
        {
            if(isset($value))
            {
                eval("return $value;");
            }
        }
        $pdf->Output();
        exit;     
    }
    public function index()
    {
        //$data = findOut::get();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('welcome');
        // If you want to store the generated pdf to the server then you can use the store function
        //$pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('reporst.pdf');
    }
}
