<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Novelcorona3 AS PP3;

use Codedge\Fpdf\Facades\Fpdf;
class PrintNovelcorona3 extends Controller
{
    public function byid($id){
           
        $user_id = session('user_id');
        if($user_id == NULL){
            return redirect('/logout');
        }
        
        $p = PP3::find($id);

        $reportor = DB::table('user')->find(session('user_id'));

        if (ob_get_contents()) ob_end_clean();
        Fpdf::AddPage();
        Fpdf::SetTitle('EOC ทุ่งยางแดง COVID-19 (Novelcorona2) - '.$p->id, TRUE);
        Fpdf::AddFont('THSarabunPSK','','THSarabun.php');
        Fpdf::AddFont('THSarabunPSK','B','THSarabun Bold.php');
        Fpdf::AddFont('THSarabunPSK','I','THSarabun Italic.php');
        Fpdf::AddFont('THSarabunPSK','BI','THSarabun Bold Italic.php');

        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'CODE'), 0, 0);
        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(60, 6, iconv( 'UTF-8','cp874', $p->code), 'B', 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(120, 6, iconv( 'UTF-8','cp874', 'Novelcorona 3'), 0, 1, 'R');

        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(190, 4, iconv( 'UTF-8','cp874', 'แบบรายงานผู้ป่วยโรคติดเชื้อไวรัสโคโรนา 2019 ฉบับย่อ'), 0, 1, 'C');
        Fpdf::Cell(195, 1, iconv( 'UTF-8','cp874', 'HN '.$p->hn .'   '.$p->internal_code), 0, 1, 'R');
        

        Fpdf::Cell(190, 1, '', 'B', 1);

        /**
         * ข้อมูลทั่วไป
         */
        Fpdf::Cell(190, 1, '', 0, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 14);
        Fpdf::Cell(100, 6, iconv( 'UTF-8','cp874', '1. ข้อมูลทั่วไป'), 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(40, 6, iconv( 'UTF-8','cp874', 'เลขบัตรประชาชน/Passport'), 0, 0);
        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(50, 6, iconv( 'UTF-8','cp874',  $p->cid), 'B', 1, 'C');

        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', 'ชื่อ - นามสกุล'), 0, 0);
        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(75, 6, iconv( 'UTF-8','cp874', $p->fname.' '.$p->lname), 'B', 0, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        $gender = ['หญิง', 'ชาย'];        
        Fpdf::Cell(7, 6, iconv( 'UTF-8','cp874', 'เพศ'), 0, 0);
        Fpdf::Cell(13, 6, iconv( 'UTF-8','cp874', $gender[$p->gender]), 'B', 0, 'C');
        Fpdf::Cell(7, 6, iconv( 'UTF-8','cp874', 'อายุ'), 0, 0);
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', $p->age_y.' ปี '.$p->age_m.' เดือน'), 'B', 0, 'C');
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'สัญชาติ'), 0, 0);
        Fpdf::Cell(26, 6, iconv( 'UTF-8','cp874', $p->nationality), 'B', 1, 'C');

        // Fpdf::Cell(5, 6, '', 0, 0);
        // Fpdf::SetFont('THSarabunPSK', '', 14);
        // Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', 'กรณีเพศหญิง'), 0, 0);
        // $g = ['ไม่ได้ตั้งครรภ์', 'ตั้งครรภ์'];
        // Fpdf::Cell(75, 6, iconv( 'UTF-8','cp874', $p->pregnant ? $g[$p->pregnant] : '-'), 'B', 0, 'C');
        // Fpdf::SetFont('THSarabunPSK', '', 14);
        // $gender = ['หญิง', 'ชาย'];        
        // Fpdf::Cell(18, 6, iconv( 'UTF-8','cp874', 'วันเดือนปีเกิด'), 0, 0);
        // Fpdf::Cell(37, 6, iconv( 'UTF-8','cp874', formatDateThaiISO($p->dob)), 'B', 1, 'C');

        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'อาชีพ'), 0, 0);
        Fpdf::Cell(40, 6, iconv( 'UTF-8','cp874', $p->occupation), 'B', 0, 'C');
        Fpdf::Cell(37, 6, iconv( 'UTF-8','cp874', 'สถานที่ทำงาน/สถานศึกษา'), 0, 0);
        Fpdf::Cell(48, 6, iconv( 'UTF-8','cp874', $p->workplace), 'B', 0, 'C');
        Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', 'เบอร์โทรศัพท์'), 0, 0);
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', $p->telephone), 'B', 1, 'C');
        $ss = ['','','','','',''];
        foreach ($ss as $key => $value) {
            ($key == $p->patient_type) ? $ss[$key] = '3' : '';
        }
        Fpdf::Cell(1, 1, '', 0, 1);
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(15, 6, iconv( 'UTF-8','cp874', 'ประเภท'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'PUI'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(34, 6, iconv( 'UTF-8','cp874', 'ผู้สัมผัสใกล้ชิดผู้ติดเชื้อ'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[3]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(36, 6, iconv( 'UTF-8','cp874', 'การค้นหา/สำรวจเชิงรุก'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[4]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(34, 6, iconv( 'UTF-8','cp874', 'Sentinel surveillance'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[5]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(8, 6, iconv( 'UTF-8','cp874', 'อื่นๆ'), 0, 0);
        Fpdf::Cell(24, 6, iconv( 'UTF-8','cp874', $p->patient_type_text), 'B', 1);

        $sickplace = ($p->sickplace == 1) ? 'บ้าน' : $p->sickplace;
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(38, 6, iconv( 'UTF-8','cp874', 'ที่อยู่ขณะป่วยในประเทศไทย'), 0, 0);
        $address = $p->address_name;
        $address .= ' หมู่ ' . ($p->address_moo ?? '-');
        $address .= ' ตำบล ' . ($p->address_tmb ?? '-');
        $address .= ' อำเภอ ' . ($p->address_amp ?? '-');
        $address .= ' จังหวัด ' . ($p->address_chw ?? '-');
        Fpdf::Cell(147, 6, iconv( 'UTF-8','cp874', $address), 'B', 1, 'C');
        Fpdf::Cell(1, 1, '', 0, 1);
        // Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'เลขที่'), 0, 0);
        // Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', $p->sickplace_no), 'B', 0, 'C');
        // Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'หมู่ที่'), 0, 0);
        // Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', $p->sickplace_moo), 'B', 0, 'C');
        // Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'หมู่บ้าน'), 0, 0);
        // Fpdf::Cell(45, 6, iconv( 'UTF-8','cp874', $p->sickplace_village), 'B', 1, 'C');
        $ss = ['','','','','',''];
        foreach ($ss as $key => $value) {
            ($key == $p->address_type) ? $ss[$key] = '3' : '';
        }
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(28, 6, iconv( 'UTF-8','cp874', 'ลักษณะที่พักอาศัย'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', 'บ้านเดี่ยว'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', 'ตึกแถว/ทาวน์เฮ้าส์'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[3]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(40, 6, iconv( 'UTF-8','cp874', 'หอพัก/คอนโด/ห้องเช่า'), 0, 1);

        Fpdf::Cell(33, 6, '', 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[4]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(90, 6, iconv( 'UTF-8','cp874', 'พักห้องรวมกับคนจำนวนมาก เช่น แคมป์ก่อสร้าง หอผู้ป่วยใน รพ.'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[5]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(8, 6, iconv( 'UTF-8','cp874', 'อื่นๆ'), 0, 0);
        Fpdf::Cell(40, 6, iconv( 'UTF-8','cp874', $p->address_type_text), 'B', 0);

        // Fpdf::Cell(5, 6, '', 0, 0);
        // Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'จังหวัด'), 0, 0);
        // Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', $p->sickplace_chw), 'B', 0, 'C');
        // Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', 'โรคประจำตัว'), 0, 0);
        // Fpdf::Cell(50, 6, iconv( 'UTF-8','cp874', $p->ud), 'B', 0);
        // switch ($p->smoking) {
        //     case 0 : $smoking = 'ไม่เคยสูบบุหรี่'; break;
        //     case 1 : $smoking = 'ยังคงสูบบุหรี่อยู่'; break;
        //     case 2 : $smoking = 'เคยสูบบุหรี่แล้วเลิกแล้ว'; break;
            
        //     default: return;
        //         break;
        // }
        // Fpdf::Cell(70, 6, iconv( 'UTF-8','cp874', $smoking ), 'B', 1);

        /**
         * ข้อมูลทางคลินิก
         */
        Fpdf::Cell(5, 4, '', 0, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 14);
        Fpdf::Cell(100, 6, iconv( 'UTF-8','cp874', '2. ข้อมูลทางคลินิก'), 0, 1);
        
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(18, 6, iconv( 'UTF-8','cp874', 'วันที่เริ่มป่วย'), 0, 0);
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', formatDateThai($p->date_sick)), 'B', 0, 'C');
        Fpdf::Cell(34, 6, iconv( 'UTF-8','cp874', 'วันที่รับการรักษาครั้งแรก'), 0, 0);
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', formatDateThai($p->date_treat)), 'B', 0, 'C');
        Fpdf::Cell(27, 6, iconv( 'UTF-8','cp874', 'วันที่วินิจฉัยโควิด-19'), 0, 0);
        Fpdf::Cell(46, 6, iconv( 'UTF-8','cp874', formatDateThai($p->date_diagnosis)), 'B', 1, 'C');
        
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(57, 6, iconv( 'UTF-8','cp874', 'สถานพยาบาลที่เข้ารับการรักษาในปัจจุบัน'), 0, 0);
        Fpdf::Cell(55, 6, iconv( 'UTF-8','cp874', $p->hos_name), 'B', 0, 'C');
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'จังหวัด'), 0, 0);
        Fpdf::Cell(28, 6, iconv( 'UTF-8','cp874', $p->hos_chw), 'B', 1, 'C');
        Fpdf::Cell(1, 1, '', 0, 1);

        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(58, 6, iconv( 'UTF-8','cp874', 'อาการและอาการแสดง (ณ วันที่รายงาน)'), 0, 0);
        unset($ss);
        $ss = ['','','','','',''];
        foreach ($ss as $key => $value) {
            ($key == $p->symptom) ? $ss[$key] = '3' : '';
        }
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', 'ไม่มีอาการใดๆ'), 0, 0);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[2]), 1, 0);
        Fpdf::Cell(32, 6, iconv( 'UTF-8','cp874', 'มีอาการ แต่ไม่มีอาการระบบทางเดินหายใจ'), 0, 1);
        
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $ss[3]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(40, 6, iconv( 'UTF-8','cp874', 'มีอาการระบบทางเดินหายใจ '), 0, 0);
        Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', 'O2Sat ' .$p->symptom_o2sat. ' %'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $p->symptom_pneumonia ? '3' : ''), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(23, 6, iconv( 'UTF-8','cp874', 'เป็นปอดอักเสบ'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $p->symptom_ett ? '3' : ''), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(28, 6, iconv( 'UTF-8','cp874', 'ใส่เครื่องช่วยหายใจ'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $p->symptom_dead ? '3' : ''), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(17, 6, iconv( 'UTF-8','cp874', 'เสียชีวิต'), 0, 1);

        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(17, 6, iconv( 'UTF-8','cp874', 'โรคประจำตัว'), 0, 0);
        Fpdf::Cell(75, 6, iconv( 'UTF-8','cp874', $p->ud ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(17, 6, iconv( 'UTF-8','cp874', 'กรณีเพศหญิง'), 0, 0);
        $g = ['ไม่ได้ตั้งครรภ์', 'ตั้งครรภ์'];
        Fpdf::Cell(75, 6, iconv( 'UTF-8','cp874', ($p->pregnent == 0) ? 'ไม่ได้ตั้งครรภ์' : ('ตั้งครรภ์ '.$p->ga.' สัปดาห์')), 'B', 1, 'C');


        Fpdf::Cell(5, 9, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', 'B', 14);
        Fpdf::Cell(45, 9, iconv( 'UTF-8','cp874', 'ผลการตรวจที่ยืนยันว่าเป็น SARS-CoV-2'), 0, 1);
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(27, 6, iconv( 'UTF-8','cp874', 'วิธีตรวจ'), 1, 0, 'C');
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', 'วันที่เก็บ'), 1, 0, 'C');
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', 'ชนิดตัวอย่าง'), 1, 0, 'C');
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', 'สถานที่ส่งตรวจ'), 1, 0, 'C');
        Fpdf::Cell(70, 6, iconv( 'UTF-8','cp874', 'ผลตรวจ'), 1, 1, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(27, 6, iconv( 'UTF-8','cp874', 'RT-PCR'), 1, 0, 'L');
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', formatDateThai($p->rtpcr_date)), 1, 0, 'C');  
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', $p->rtpcr_sample ?? '-'), 1, 0, 'C');
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', $p->rtpcr_labplace ?? '-'), 1, 0, 'C');
        Fpdf::Cell(2, 2, '', 0, 2);
        Fpdf::Cell(2, 2, '', 0, 0);
        $result = ['', '', ''];
        switch ($p->rtpcr_result) {
            case 0: $result[0] = '3'; break;
            case 1: $result[1] = '3'; break;
            case 2: $result[2] = '3'; break;
            default: # code...
                break;
        }
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(6, 3, iconv( 'UTF-8','cp874', $result[1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(17, 2, iconv( 'UTF-8','cp874', 'Detected'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(6, 3, iconv( 'UTF-8','cp874', $result[2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(22, 2, iconv( 'UTF-8','cp874', 'Not detected'), 0, 0);
        Fpdf::Cell(26, 4, iconv( 'UTF-8','cp874', formatDateThai($p->cov2_result_date)), 0, 1);
        switch ($p->ag_type) {
            case 1: $p->ag_type = 'ATK'; break;
            case 2: $p->ag_type = 'FIA'; break;
            case 3: $p->ag_type = 'ATK ภาคสนาม'; break;
            
            default:
                # code...
                break;
        }
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(27, 6, iconv( 'UTF-8','cp874', 'Antigen: '.$p->ag_type), 1, 0, 'L');
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', formatDateThai($p->ag_date)), 1, 0, 'C');  
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', $p->ag_sample ?? '-'), 1, 0, 'C');
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', $p->ag_labplace ?? '-'), 1, 0, 'C');
        Fpdf::Cell(2, 2, '', 0, 2);
        Fpdf::Cell(2, 2, '', 0, 0);
        $result = ['', '', ''];
        switch ($p->ag_result) {
            case 0: $result[0] = '3'; break;
            case 1: $result[1] = '3'; break;
            case 2: $result[2] = '3'; break;
            default: # code...
                break;
        }
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(6, 3, iconv( 'UTF-8','cp874', $result[1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(17, 2, iconv( 'UTF-8','cp874', 'Detected'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(6, 3, iconv( 'UTF-8','cp874', $result[2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(22, 2, iconv( 'UTF-8','cp874', 'Not detected'), 0, 0);
        Fpdf::Cell(26, 4, iconv( 'UTF-8','cp874', formatDateThai($p->cov22a_result_date)), 0, 1);
        
        // Antibody
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(27, 6, iconv( 'UTF-8','cp874', 'Antibody ครั้งที่ 1 '), 1, 0, 'L');
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', formatDateThai($p->ab1_date)), 1, 0, 'C');  
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', $p->ab1_sample ?? '-'), 1, 0, 'C');
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', $p->ab1_labplace ?? '-'), 1, 0, 'C');
        Fpdf::Cell(2, 2, '', 0, 2);
        Fpdf::Cell(2, 2, '', 0, 0);
        $result = ['', '', '', ''];
        switch ($p->ab1_result) {
            case 0: $result[0] = '3'; break;
            case 1: $result[1] = '3'; break;
            case 2: $result[2] = '3'; break;
            case 3: $result[3] = '3'; break;
            default: # code...
                break;
        }
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(6, 3, iconv( 'UTF-8','cp874', $result[1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 2, iconv( 'UTF-8','cp874', 'IgM'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(6, 3, iconv( 'UTF-8','cp874', $result[2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 2, iconv( 'UTF-8','cp874', 'IgG'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(6, 3, iconv( 'UTF-8','cp874', $result[3]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 2, iconv( 'UTF-8','cp874', 'Neg'), 0, 0);
        Fpdf::Cell(26, 4, iconv( 'UTF-8','cp874', formatDateThai($p->cov2a_result_date)), 0, 1);

        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(27, 6, iconv( 'UTF-8','cp874', 'Antibody ครั้งที่ 2 '), 1, 0, 'L');
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', formatDateThai($p->ab2_date)), 1, 0, 'C');  
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', $p->ab2_sample ?? '-'), 1, 0, 'C');
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', $p->ab2_labplace ?? '-'), 1, 0, 'C');
        Fpdf::Cell(2, 2, '', 0, 2);
        Fpdf::Cell(2, 2, '', 0, 0);
        $result = ['', '', '', ''];
        switch ($p->ab2_result) {
            case 0: $result[0] = '3'; break;
            case 1: $result[1] = '3'; break;
            case 2: $result[2] = '3'; break;
            case 3: $result[3] = '3'; break;
            default: # code...
                break;
        }
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(6, 3, iconv( 'UTF-8','cp874', $result[1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 2, iconv( 'UTF-8','cp874', 'IgM'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(6, 3, iconv( 'UTF-8','cp874', $result[2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 2, iconv( 'UTF-8','cp874', 'IgG'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(6, 3, iconv( 'UTF-8','cp874', $result[3]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 2, iconv( 'UTF-8','cp874', 'Neg'), 0, 0);
        Fpdf::Cell(26, 4, iconv( 'UTF-8','cp874', formatDateThai($p->cov22a_result_date)), 0, 1);


        Fpdf::Rect(127, 117, 70, 6);
        Fpdf::Rect(127, 123, 70, 6);
        Fpdf::Rect(127, 129, 70, 6);
        Fpdf::Rect(127, 135, 70, 6);




        /**
         * ประวัติรับวัคซีน
         */  
        Fpdf::Cell(5, 3, '', 0, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 14);
        Fpdf::Cell(100, 6, iconv( 'UTF-8','cp874', '3. ประวัติการได้รับวัคซีนป้องกันโรคติดเชื้อไวรัสโคโรนา 2019'), 0, 1);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', 'ประวัติการได้รับวัคซีน'), 0, 0);
        Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', $p->vac == 1 ? 'ได้รับ' : 'ไม่ได้รับ'), 'B', 0, 'C');
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', 'หลักฐานการได้รับวัคซีน'), 0, 0);
        Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', $p->vac_evd == 1 ? 'มี' : 'ไม่มี'), 'B', 1, 'C');
        Fpdf::Cell(1, 1, '', 0, 1);



        Fpdf::Cell(5, 9, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', 'B', 14);
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', 'ครั้งที่'), 1, 0, 'C');
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', 'วันที่รับวัคซีน'), 1, 0, 'C');
        Fpdf::Cell(45, 6, iconv( 'UTF-8','cp874', 'ชื่อวัคซีน'), 1, 0, 'C');
        Fpdf::Cell(80, 6, iconv( 'UTF-8','cp874', 'สถานที่รับวัคซีน'), 1, 1, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 12);
        Fpdf::Cell(5, 9, '', 0, 0);
        Fpdf::Cell(25, 5, iconv( 'UTF-8','cp874', '1'), 1, 0, 'C');
        Fpdf::Cell(35, 5, iconv( 'UTF-8','cp874', formatDateThai($p->vac1_date)), 1, 0, 'C');
        switch ($p->vac1_type) {
            case 1: $p->vac1_type = 'Sinovac'; break;
            case 2: $p->vac1_type = 'AZ'; break;
            case 3: $p->vac1_type = 'Pfizer'; break;
            case 4: $p->vac1_type = 'Moderna'; break;
            default:
                # code...
                break;
        }
        Fpdf::Cell(45, 5, iconv( 'UTF-8','cp874', $p->vac1_type ?? '-'), 1, 0, 'C');
        Fpdf::Cell(80, 5, iconv( 'UTF-8','cp874', $p->vac1_place ?? '-'), 1, 1, 'C');
        Fpdf::Cell(5, 9, '', 0, 0);
        Fpdf::Cell(25, 5, iconv( 'UTF-8','cp874', '2'), 1, 0, 'C');
        Fpdf::Cell(35, 5, iconv( 'UTF-8','cp874', formatDateThai($p->vac2_date)), 1, 0, 'C');
        switch ($p->vac2_type) {
            case 1: $p->vac2_type = 'Sinovac'; break;
            case 2: $p->vac2_type = 'AZ'; break;
            case 3: $p->vac2_type = 'Pfizer'; break;
            case 4: $p->vac2_type = 'Moderna'; break;
            default:
                # code...
                break;
        }
        Fpdf::Cell(45, 5, iconv( 'UTF-8','cp874', $p->vac2_type ?? '-'), 1, 0, 'C');
        Fpdf::Cell(80, 5, iconv( 'UTF-8','cp874', $p->vac2_place ?? '-'), 1, 1, 'C');

        
        /**
         * ประวัติเสี่ยง
         */  
        Fpdf::Cell(5, 3, '', 0, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 14);
        Fpdf::Cell(100, 6, iconv( 'UTF-8','cp874', '4. ประวัติเสี่ยงในช่วง 14 วันก่อนเริ่มป่วย (หรือ 14 วันก่อนตรวจพบการตรวจเชื้อ)'), 0, 1);
        
        $check = [
            ['', '' ,''],
            ['', '' ,''],
            ['', '' ,''],
            ['', '' ,''],
            ['', '' ,''],
            ['', '' ,''],
            ['', '' ,''],
            ['', '' ,''],
            ['', '' ,''],
            ['', '' ,''],
            ['', '' ,'']];
        for($i=1; $i<=10; $i++){
            $id = 'rf'.$i;
            ($p->$id == 0) ? $check[$i][1] = '3' : $check[$i][2] = '3';
        }

        Fpdf::SetFont('ZapfDingbats','', 6, 'R');
        Fpdf::Cell(5, 6, 'l', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(149, 6, iconv( 'UTF-8','cp874', 'อาศัยอยู่หรือเดินทางมาจากพื้นที่ที่มีการระบาด'), 0, 0);
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[1][1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ไม่ใช่'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[1][2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ใช่'), 0, 1);
        
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', 'ประเทศไทย ระบุจังหวัด'), 0, 0);
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', $p->rf1_chw ?? '-'), 'B', 1, 'C');
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', 'ต่างประเทศ ระบุประเทศ'), 0, 0);
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', $p->rf1_country ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(8, 6, iconv( 'UTF-8','cp874', 'เมือง'), 0, 0);
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', $p->rf1_city ?? '-'), 'B', 1, 'C');
        
        Fpdf::SetFont('ZapfDingbats','', 6, 'R');
        Fpdf::Cell(5, 6, 'l', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(120, 6, iconv( 'UTF-8','cp874', 'ได้ดูแลหรือสัมผัสใกล้ชิดกับผู้ป่วยอาากรคล้ายไข้หวัดใหญ่หรือปอดอักเสบ'), 0, 0);
        Fpdf::Cell(34, 6, '', 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[2][1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ไม่ใช่'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[2][2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ใช่'), 0, 1);
        
        Fpdf::SetFont('ZapfDingbats','', 6, 'R');
        Fpdf::Cell(5, 6, 'l', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(71, 6, iconv( 'UTF-8','cp874', 'สัมผัสกับผู้ป่วยยืนยันโรคติดเชื้อไวรัสโคโรนา 2019 ชื่อ'), 0, 0);
        Fpdf::Cell(52, 6, iconv( 'UTF-8','cp874', $p->rf3_name ?? '-'), 'B', 0);
        Fpdf::Cell(31, 6, '', 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[3][1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ไม่ใช่'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[3][2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ใช่'), 0, 1);
        
        Fpdf::SetFont('ZapfDingbats','', 6, 'R');
        Fpdf::Cell(5, 6, 'l', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(110, 6, iconv( 'UTF-8','cp874', 'ประกอบอาชีพที่สัมผัสใกล้ชิดกับนักท่องเที่ยวต่างชาติหรือแรงงานต่างชาติ'), 0, 0);
        Fpdf::Cell(44, 6, '', 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[4][1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ไม่ใช่'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[4][2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ใช่'), 0, 1);
        
        Fpdf::SetFont('ZapfDingbats','', 6, 'R');
        Fpdf::Cell(5, 6, 'l', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(94, 6, iconv( 'UTF-8','cp874', 'เดินทางไปในสถานที่หรือทำกิจกรรมที่มีคนหนาแน่นหรือพลุกพล่าน ระบุ'), 0, 0);
        Fpdf::Cell(32, 6, iconv( 'UTF-8','cp874', $p->rf5_place ?? '-'), 'B', 0);
        Fpdf::Cell(28, 6, '', 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[5][1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ไม่ใช่'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[5][2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ใช่'), 0, 1);

        Fpdf::SetFont('ZapfDingbats','', 6, 'R');
        Fpdf::Cell(5, 6, 'l', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(154, 6, iconv( 'UTF-8','cp874', 'เป็นบุคลากรทางการแพทย์และสาธารณสุขหรือเจ้าหน้าที่ห้องปฏิบัติการ'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[6][1]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ไม่ใช่'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $check[6][2]), 1, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ใช่'), 0, 1);
        Fpdf::Cell(10, 6, '', 0, 0);
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', 'ดูแลหรือให้บริการผู้ป่วยโควิด 19 หรือเป็นผู้เก็บ/นำส่ง/ตรวจตัวอย่างของผู้ติดเชื้อโควิด 19'), 0, 1);
        Fpdf::Cell(10, 6, '', 0, 0);
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', 'ไม่ได้ดูแลหรือให้บริการผู้ป่วยโควิด 19 และ ไม่ได้เป็นผู้เก็บ/นำส่ง/ตรวจตัวอย่างของผู้ติดเชื้อโควิด 19'), 0, 1);
        
        Fpdf::SetFont('ZapfDingbats','', 6, 'R');
        Fpdf::Cell(5, 6, 'l', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', 'ประวัติเสี่ยงอื่น ๆ ระบุ'), 0, 0);
        Fpdf::Cell(132, 6, iconv( 'UTF-8','cp874', $p->rf8_text ?? '-'), 'B', 1);
        






        // /**
        //  * รายละเอียดเหตุการณ์ ประวัติเสี่ยงต่อการติดเชื้อ ก่อนเริ่มป่วย
        //  */
        // Fpdf::ln(10);
        // Fpdf::Cell(5, 4, '', 0, 1);
        // Fpdf::SetFont('THSarabunPSK', 'B', 16);
        // Fpdf::Cell(100, 6, iconv( 'UTF-8','cp874', 'รายละเอียดเหตุการณ์ ประวัติเสี่ยงต่อการติดเชื้อ ก่อนเริ่มป่วย'), 0, 1);
        // Fpdf::SetFont('THSarabunPSK', '', 14);
        // Fpdf::MultiCell(180, 10, iconv( 'UTF-8','cp874', $p->risk_detail), 1, 'L');

        // /**
        //  * ตารางกิจกรรมและากรเดินทางตั้งแต่เริ่มป่วย
        //  */
        // Fpdf::Cell(5, 4, '', 0, 1);
        // Fpdf::SetFont('THSarabunPSK', 'B', 16);
        // Fpdf::Cell(100, 6, iconv( 'UTF-8','cp874', 'ตารางกิจกรรมและการเดินทางตั้งแต่เริ่มป่วย'), 0, 1);
        // Fpdf::SetFont('THSarabunPSK', '', 14);
        // Fpdf::MultiCell(180, 10, iconv( 'UTF-8','cp874', $p->activity_detail), 1, 'L');


        /**
         * ประวัติเสี่ยง
         */  
        Fpdf::Cell(5, 1, '', 0, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 14);
        Fpdf::Cell(100, 6, iconv( 'UTF-8','cp874', '5. การค้นหาผู้สัมผัส'), 0, 1);
        Fpdf::SetFont('ZapfDingbats','', 6, 'R');
        Fpdf::Cell(5, 5, 'l', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(30, 5, iconv( 'UTF-8','cp874', 'ผู้สัมผัสใกล้ชิดเสี่ยงสูง'), 0, 0);
        Fpdf::Cell(8, 5, iconv( 'UTF-8','cp874', $p->highrisk_n ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(20, 5, iconv( 'UTF-8','cp874', 'คน ติดตามได้'), 0, 0);
        Fpdf::Cell(8, 5, iconv( 'UTF-8','cp874', $p->highrisk_n_trace ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(37, 5, iconv( 'UTF-8','cp874', 'คน       สถานที่กักตัว (บ้าน'), 0, 0);
        Fpdf::Cell(8, 5, iconv( 'UTF-8','cp874', $p->highrisk_hi ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(25, 5, iconv( 'UTF-8','cp874', 'คน, สถานที่กักตัว'), 0, 0);
        Fpdf::Cell(8, 5, iconv( 'UTF-8','cp874', $p->highrisk_ci ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(20, 5, iconv( 'UTF-8','cp874', 'คน)'), 0, 1);
        Fpdf::SetFont('ZapfDingbats','', 6, 'R');
        Fpdf::Cell(5, 5, 'l', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(30, 5, iconv( 'UTF-8','cp874', 'ผู้สัมผัสใกล้ชิดเสี่ยงต่ำ'), 0, 0);
        Fpdf::Cell(8, 5, iconv( 'UTF-8','cp874', $p->lowrisk_n ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(20, 5, iconv( 'UTF-8','cp874', 'คน ติดตามได้'), 0, 0);
        Fpdf::Cell(8, 5, iconv( 'UTF-8','cp874', $p->lowrisk_n_trace ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(37, 5, iconv( 'UTF-8','cp874', 'คน       สถานที่กักตัว (บ้าน'), 0, 0);
        Fpdf::Cell(8, 5, iconv( 'UTF-8','cp874', $p->lowrisk_hi ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(25, 5, iconv( 'UTF-8','cp874', 'คน, สถานที่กักตัว'), 0, 0);
        Fpdf::Cell(8, 5, iconv( 'UTF-8','cp874', $p->lowrisk_ci ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(20, 5, iconv( 'UTF-8','cp874', 'คน)'), 0, 0);
        Fpdf::Cell(5, 2, '', 0, 1);
        

        /**
         * ผู้รายงาน
         */

        $rp['name'] = $reportor->name;
        $rp['tel']  = $reportor->tel;

        Fpdf::Cell(5, 4, '', 0, 1);
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(14, 6, iconv( 'UTF-8','cp874', 'ผู้รายงาน'), 0, 0);
        Fpdf::Cell(32, 6, iconv( 'UTF-8','cp874', $p['name']), 'B', 0, 'C');
        Fpdf::Cell(16, 6, iconv( 'UTF-8','cp874', 'หน่วยงาน'), 0, 0);
        Fpdf::Cell(32, 6, iconv( 'UTF-8','cp874', 'โรงพยาบาลทุ่งยางแดง'), 'B', 0, 'C');
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'โทรศัพท์'), 0, 0);
        Fpdf::Cell(26, 6, iconv( 'UTF-8','cp874', $rp['tel']), 'B', 0, 'C');
        Fpdf::Cell(17, 6, iconv( 'UTF-8','cp874', 'วันที่รายงาน'), 0, 0);
        Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', formatDateThai($p->created_at)), 'B', 0, 'C');
        Fpdf::Rect(10, 266, 190, 8);

        Fpdf::ln(8);
        // Select Arial italic 8
        Fpdf::SetFont('THSarabunPSK', '', 10);
        // Print centered page number
        Fpdf::Cell(0, 2, iconv( 'UTF-8','cp874', 'Powered by: Parkphum.DEV     Host: EOCTYD.COM ' . ' IP:'.$_SERVER['REMOTE_ADDR'].' '.NOW().'(GMT+7)'. ' Print by: '.session('name').' Tel: '. session('tel')), 0, 0, 'R');
        // Fpdf::Cell(0, 4, 'Agent:'.$_SERVER['HTTP_USER_AGENT'], 0, 1, 'R');

        Fpdf::Output();
    }

    public function p3print($id){
        
        $p = PP3::find($id);
        $reportor = DB::table('user')->find(session('user_id'));

        if (ob_get_contents()) ob_end_clean();
        Fpdf::AddPage();
        Fpdf::SetTitle('EOC ทุ่งยางแดง COVID-19 (Novelcorona2) - '.$p->id, TRUE);
        Fpdf::AddFont('THSarabunPSK','','THSarabun.php');
        Fpdf::AddFont('THSarabunPSK','B','THSarabun Bold.php');
        Fpdf::AddFont('THSarabunPSK','I','THSarabun Italic.php');
        Fpdf::AddFont('THSarabunPSK','BI','THSarabun Bold Italic.php');

        /**
         * ผู้รายงาน
         */
        $rp['name'] = $reportor->name;
        $rp['tel']  = $reportor->tel;
        Fpdf::Rect(140, 10, 60, 36);

        Fpdf::SetFont('THSarabunPSK', 'B', 72);
        Fpdf::Cell(60, 1, 'ATK', 0, 0);
        Fpdf::SetFont('THSarabunPSK', 'B', 18);
        Fpdf::Cell(70, 30, iconv( 'UTF-8','cp874', 'CASE RECORD FORM'), 0, 0, 'C');
        Fpdf::Cell(60, 10, iconv( 'UTF-8','cp874', $p->code), 1, 1, 'C');
        Fpdf::Cell(130, 6, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(26, 6, iconv( 'UTF-8','cp874', 'สถานที่เก็บตัวอย่าง'), 'L', 0);
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', ''), 'B', 1, 'C');
        Fpdf::Cell(130, 6, '', 0, 0);
        Fpdf::Cell(18, 6, iconv( 'UTF-8','cp874', 'ผู้เก็บตัวอย่าง'), 'L', 0);
        Fpdf::Cell(38, 6, '', 'B', 1, 'C');
        Fpdf::Cell(130, 6, '', 0, 0);
        Fpdf::Cell(16, 6, iconv( 'UTF-8','cp874', 'ผู้เก็บข้อมูล'), 'L', 0);
        Fpdf::Cell(40, 6, iconv( 'UTF-8','cp874', $rp['name']), 'B', 1, 'C');
        Fpdf::Cell(130, 6, '', 0, 0);
        Fpdf::Cell(8, 6, iconv( 'UTF-8','cp874', 'วันที่'), 'L', 0);
        Fpdf::Cell(24, 6, iconv( 'UTF-8','cp874', formatDateThai($p->created_at)), 'B', 0, 'C');
        Fpdf::Cell(8, 6, iconv( 'UTF-8','cp874', 'เวลา'), 0, 0);
        Fpdf::Cell(16, 6, iconv( 'UTF-8','cp874', date("H:i",strtotime($p->created_at))), 'B', 1, 'C');

        
        
        Fpdf::ln(5);

        Fpdf::Cell(190, 1, '', 'B', 1);

        /**
         * ข้อมูลทั่วไป
         */
        Fpdf::Cell(190, 4, '', 0, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(100, 6, iconv( 'UTF-8','cp874', '1. ข้อมูลทั่วไป'), 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(32, 6, iconv( 'UTF-8','cp874', 'เลขบัตรประชาชน'), 0, 0);
        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(50, 6, iconv( 'UTF-8','cp874',  $p->cid), 'B', 1, 'C');

        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', 'ชื่อ - นามสกุล'), 0, 0);
        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(75, 6, iconv( 'UTF-8','cp874', $p->fname.' '.$p->lname), 'B', 0, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        $gender = ['หญิง', 'ชาย'];        
        Fpdf::Cell(7, 6, iconv( 'UTF-8','cp874', 'เพศ'), 0, 0);
        Fpdf::Cell(13, 6, iconv( 'UTF-8','cp874', $gender[$p->gender]), 'B', 0, 'C');
        Fpdf::Cell(7, 6, iconv( 'UTF-8','cp874', 'อายุ'), 0, 0);
        Fpdf::Cell(25, 6, iconv( 'UTF-8','cp874', $p->age_y.' ปี '.$p->age_m.' เดือน'), 'B', 1, 'C');
        
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'สัญชาติ'), 0, 0);
        Fpdf::Cell(38, 6, iconv( 'UTF-8','cp874', $p->nationality ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(15, 6, iconv( 'UTF-8','cp874', 'ศาสนา'), 0, 0, 'R');
        Fpdf::Cell(26, 6, iconv( 'UTF-8','cp874', $p->religion ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(14, 6, iconv( 'UTF-8','cp874', 'อาชีพ'), 0, 0, 'R');
        Fpdf::Cell(42, 6, iconv( 'UTF-8','cp874', $p->occupation ?? '-'), 'B', 1, 'C');
        
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(20, 6, iconv( 'UTF-8','cp874', 'เบอร์โทรศัพท์'), 0, 0);
        Fpdf::Cell(30, 6, iconv( 'UTF-8','cp874', $p->telephone ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(12, 6, iconv( 'UTF-8','cp874', 'ที่อยู่'), 0, 0, 'R');
        Fpdf::Cell(85, 6, iconv( 'UTF-8','cp874', $p->address ?? '-'), 'B', 1, 'C');

        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(37, 6, iconv( 'UTF-8','cp874', 'จำนวนคนที่อยู่บ้านเดียวกัน'), 0, 0);
        Fpdf::Cell(8, 6, iconv( 'UTF-8','cp874', $p->housemember ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(5, 6, iconv( 'UTF-8','cp874', 'คน'), 0, 1);

        // Fpdf::ln(5);

        /**
         * 2. ผลการตรวจ ATK
         */
        Fpdf::Cell(5, 4, '', 0, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(100, 6, iconv( 'UTF-8','cp874', '2. ผลการตรวจ ATK'), 0, 1);

        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', 'วันที่เก็บ ATK'), 1, 0, 'C');
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', 'ชนิดตัวอย่าง'), 1, 0, 'C');
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', 'ผลตรวจ'), 1, 1, 'C');
        Fpdf::Cell(5, 6, '', 0, 0);
        switch($p->atk1_type){
            case 1: $p->atk1_type = 'ATK'; break;
            case 2: $p->atk1_type = 'ATK (FIA)';    break;
            default: $p->atk1_type = '-'; break;
        }
        switch($p->atk1_result){
            case 1: $p->atk1_result = 'Negative'; break;
            case 2: $p->atk1_result = 'Positive';    break;
            default: $p->atk1_result = '-'; break;
        }
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', formatDateThai($p->atk1_date) ?? '-'), 1, 0, 'C');
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', $p->atk1_type), 1, 0, 'C');
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', $p->atk1_result), 1, 1, 'C');
        Fpdf::Cell(5, 6, '', 0, 0);
        switch($p->atk2_type){
            case 1: $p->atk2_type = 'ATK ภาคสนาม'; break;
            default: $p->atk2_type = '-'; break;
        }
        switch($p->atk2_result){
            case 1: $p->atk2_result = 'Negative'; break;
            case 2: $p->atk2_result = 'Positive';    break;
            default: $p->atk2_result = '-'; break;
        }
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', formatDateThai($p->atk2_date) ?? '-'), 1, 0, 'C');
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', $p->atk2_type), 1, 0, 'C');
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', $p->atk2_result), 1, 1, 'C');
        // Fpdf::ln(5);
        
        /**
         * 3. 3. ประวัติได้รับวัคซีน
         */
        Fpdf::Cell(5, 4, '', 0, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(100, 7, iconv( 'UTF-8','cp874', '3. ประวัติได้รับวัคซีน'), 0, 1);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        switch($p->vac){
            case 1: $p->vac = 'ได้รับวัคซีน'; break;
            case 2: $p->vac = 'ไม่ได้รับวัคซีน'; break;
            default: $p->vac = '-'; break;
        }
        switch($p->vac_type){
            case 1: $p->vac_type = 'Sinovac'; break;
            case 2: $p->vac_type = 'AZ'; break;
            case 3: $p->vac_type = 'Pfizer'; break;
            case 4: $p->vac_type = 'Moderna'; break;
            default: $p->vac = '-'; break;
        }
        
        $p->vac1_date = $p->vac1_date ? 'เข็ม 1 วันที่ ' . formatDateThai($p->vac1_date) : '';
        $p->vac2_date = $p->vac2_date ? 'เข็ม 2 วันที่ ' . formatDateThai($p->vac2_date) : '';
        $vacdate = $p->vac1_date . ' ' . $p->vac2_date;
        Fpdf::Cell(5, 6, '', 0, 0);
        Fpdf::Cell(35, 6, iconv( 'UTF-8','cp874', $p->vac . ' ' . $p->vac_type . $vacdate), 0, 0);

        Fpdf::ln(5);
        /**
         * 4. กรณีไม่ได้มีประวัติผู้ป่วย COVID-19
         */
        Fpdf::Cell(5, 4, '', 0, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(100, 7, iconv( 'UTF-8','cp874', '4. กรณีไม่ได้มีประวัติผู้ป่วย COVID-19'), 0, 1);
        
        $rf = [
            [' ',' '],
            [' ',' '],
            [' ',' '],
            [' ',' '],
            [' ',' '],
            [' ',' '],
            [' ',' ']
        ];

        for($i=1; $i<=5; $i++){
            $index = 'rf'.$i;
            if($p->$index == 1){
                $rf[$i][0] = 3;
            }else{
                $rf[$i][1] = 3;
            }
        }

        //return dd($rf);

        // Fpdf::Cell(5, 7, '', 0, 0);
        // Fpdf::SetFont('THSarabunPSK', '', 14);
        // Fpdf::Cell(140, 7, iconv( 'UTF-8','cp874', 'ประวัติเดินทางมาจากพื้นที่ระบาด COVID-19'), 0, 0);
        // Fpdf::SetFont('ZapfDingbats','', 14);
        // Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $rf[1][0]), 1, 0, 'C');
        // Fpdf::SetFont('THSarabunPSK', '', 14);
        // Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'มี'), 0, 0);
        // Fpdf::SetFont('ZapfDingbats','', 14);
        // Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $rf[1][1]), 1, 0, 'C');
        // Fpdf::SetFont('THSarabunPSK', '', 14);
        // Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'ไม่มี'), 0, 1);
        // Fpdf::SetFont('THSarabunPSK', '', 14);
        // Fpdf::Cell(20, 7, '', 0, 0);
        // Fpdf::Cell(8, 7, iconv( 'UTF-8','cp874', 'วันที่'), 0, 0);
        // Fpdf::Cell(30, 7, iconv( 'UTF-8','cp874', formatDateThai($p->rf1_date) ?? '-'), 'B', 0, 'C');
        // Fpdf::Cell(15, 7, iconv( 'UTF-8','cp874', 'สถานที่'), 0, 0, 'R');
        // Fpdf::Cell(50, 7, iconv( 'UTF-8','cp874', $p->rf1_place ?? '-'), 'B', 1, 'C');
        
        Fpdf::Cell(5, 7, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(140, 7, iconv( 'UTF-8','cp874', 'ประวัติใกล้ชิด/สัมผัสกับผู้ป่วยยืนยัน COVID-19/PUI'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $rf[2][0]), 1, 0, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'มี'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $rf[2][1]), 1, 0, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'ไม่มี'), 0, 1);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(20, 7, '', 0, 0);
        Fpdf::Cell(8, 7, iconv( 'UTF-8','cp874', 'วันที่'), 0, 0);
        Fpdf::Cell(30, 7, iconv( 'UTF-8','cp874', formatDateThai($p->rf2_date) ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(15, 7, iconv( 'UTF-8','cp874', 'สถานที่'), 0, 0, 'R');
        Fpdf::Cell(50, 7, iconv( 'UTF-8','cp874', $p->rf2_place ?? '-'), 'B', 1, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(20, 7, '', 0, 0);
        Fpdf::Cell(24, 7, iconv( 'UTF-8','cp874', 'ความสัมพันธ์เป็น'), 0, 0, 'L');
        Fpdf::Cell(28, 7, iconv( 'UTF-8','cp874', $p->rf2_relation ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(19, 7, iconv( 'UTF-8','cp874', 'ของผู้ป่วยยืนยัน COVID-19'), 0, 1, 'L');
        
        switch($p->rf3_place){
            case 1: $p->rf3_place = 'กลุ่มโยว์';   break;
            case 2: $p->rf3_place = 'กลุ่มมัสกัส';  break;
            default: $p->rf3_place = '-'; break;
        }
        Fpdf::Cell(5, 7, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(140, 7, iconv( 'UTF-8','cp874', 'ประวัติเข้าร่วมพิธีกรรมทางศาสนา'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $rf[3][0]), 1, 0, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'มี'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $rf[3][1]), 1, 0, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'ไม่มี'), 0, 1);
        Fpdf::Cell(20, 7, '', 0, 0);
        Fpdf::Cell(8, 7, iconv( 'UTF-8','cp874', 'วันที่'), 0, 0);
        Fpdf::Cell(30, 7, iconv( 'UTF-8','cp874', formatDateThai($p->rf3_date) ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(15, 7, iconv( 'UTF-8','cp874', 'สถานที่'), 0, 0, 'R');
        Fpdf::Cell(50, 7, iconv( 'UTF-8','cp874', $p->rf3_place ?? '-'), 'B', 1, 'C');

        Fpdf::Cell(5, 7, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(140, 7, iconv( 'UTF-8','cp874', 'ประวัติการเจ็บป่วย'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $rf[4][0]), 1, 0, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'มี'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $rf[4][1]), 1, 0, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'ไม่มี'), 0, 1);
        Fpdf::Cell(20, 7, '', 0, 0);
        Fpdf::Cell(8, 7, iconv( 'UTF-8','cp874', 'วันที่'), 0, 0);
        Fpdf::Cell(30, 7, iconv( 'UTF-8','cp874', formatDateThai($p->rf4_date) ?? '-'), 'B', 0, 'C');
        Fpdf::Cell(15, 7, iconv( 'UTF-8','cp874', 'สถานที่'), 0, 0, 'R');
        Fpdf::Cell(50, 7, iconv( 'UTF-8','cp874', $p->rf4_symptom ?? '-'), 'B', 1, 'C');
        
        Fpdf::Cell(5, 7, '', 0, 0);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(140, 7, iconv( 'UTF-8','cp874', 'เคยได้รับการตรวจ RT-PCR'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $rf[5][0]), 1, 0, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'มี'), 0, 0);
        Fpdf::SetFont('ZapfDingbats','', 14);
        Fpdf::Cell(5, 5, iconv( 'UTF-8','cp874', $rf[5][1]), 1, 0, 'C');
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::Cell(10, 6, iconv( 'UTF-8','cp874', 'ไม่มี'), 0, 1);
        Fpdf::Cell(20, 7, '', 0, 0);
        Fpdf::Cell(8, 7, iconv( 'UTF-8','cp874', 'วันที่'), 0, 0);
        Fpdf::Cell(30, 7, iconv( 'UTF-8','cp874', formatDateThai($p->rf5_date) ?? '-'), 'B', 0, 'C');
        Fpdf::ln(4);

        Fpdf::Cell(5, 4, '', 0, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 16);
        Fpdf::Cell(100, 6, iconv( 'UTF-8','cp874', 'ประวัติเสี่ยงอื่นๆ'), 0, 1);
        Fpdf::SetFont('THSarabunPSK', '', 14);
        Fpdf::MultiCell(180, 30, iconv( 'UTF-8','cp874', $p->rf6_text), 1, 'L');


        Fpdf::ln(2);
        // Select Arial italic 8
        Fpdf::SetFont('THSarabunPSK', '', 10);
        // Print centered page number
        Fpdf::Cell(0, 4, 'Host: '. gethostname(). ' IP:'.$_SERVER['REMOTE_ADDR'].' '.NOW().'(GMT+7)', 0, 1, 'R');
        Fpdf::Cell(0, 4, 'Agent:'.$_SERVER['HTTP_USER_AGENT'], 0, 1, 'R');
        Fpdf::Cell(0, 4, iconv( 'UTF-8','cp874','Print by: '.session('name').' Tel: '. session('tel')), 0, 0, 'R');

        //$this->p3print_sticker($id);

        Fpdf::Output();
    }


    public function p3print_sticker($id){
        
        $p = PP3::find($id);

        if (ob_get_contents()) ob_end_clean();
        
        Fpdf::AddPage('P', 'a4');
        Fpdf::AddFont('THSarabunPSK','','THSarabun.php');
        Fpdf::AddFont('THSarabunPSK','B','THSarabun Bold.php');
        Fpdf::AddFont('THSarabunPSK','I','THSarabun Italic.php');
        Fpdf::AddFont('THSarabunPSK','BI','THSarabun Bold Italic.php');

        Fpdf::SetAutoPageBreak(FALSE);
        Fpdf::setMargins(1, 1, 1, 1);
        Fpdf::setXY(1, 1);
        Fpdf::SetFont('THSarabunPSK', 'B', 6);
        Fpdf::Cell(23, 3, iconv( 'UTF-8','cp874', $p->fname.' '. $p->lname.' '.$p->code), 0, 1, 'C');
        Fpdf::SetFont('THSarabunPSK', 'B', 8);
        Fpdf::Cell(23, 3, iconv( 'UTF-8','cp874', $p->cid), 0, 1, 'C');
        Fpdf::ln();

        Fpdf::Output();
    }
}
