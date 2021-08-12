@extends('app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Novelcorona 3</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Novelcorona 3</li>
                    <li class="breadcrumb-item active">ลงทะเบียน</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    
    {!!Form::open(['action' => 'Novelcorona3Controller@store', 'method' => 'POST']) !!}
    <div class="card col-12">
        <div class="card-header">
          <h3 class="card-title">1. ข้อมูลทั่วไป</h3>
          <div class="float-right">
            {{Form::submit('บันทึก', ['class' => 'btn btn-lg btn-primary'])}}
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="form-row">
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-h-square"></i></div>
                    </div>
                    {{Form::text('hn', NULL, ['class' => 'form-control', 'placeholder' => 'HN'])}}
                </div>
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                    </div>
                    {{Form::text('cid', NULL, ['class' => 'form-control', 'placeholder' => 'เลขประชาชน', 'required' => 'required'])}}
                </div>
                <div class="col-md-3 mb-1 ml-auto input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-code"></i></div>
                    </div>
                    {{Form::text('code', NULL, ['class' => 'form-control', 'placeholder' => 'CODE'])}}
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3 mb-1 input-group">
                    {{Form::text('fname', NULL, ['class' => 'form-control', 'placeholder' => 'ชื่อ'])}}
                </div>
                <div class="col-md-3 mb-1 input-group">
                    {{Form::text('lname', NULL, ['class' => 'form-control', 'placeholder' => 'นามสกุล'])}}
                </div>


                <div class="col-md-3 mb-1 input-group">
                    <div class="form-check form-check-inline">
                        {{Form::radio('gender', 1, NULL, ['class' => 'form-check-input', 'checked'])}}
                        {{Form::label('gender', 'ชาย', ['class' => 'form-check-label'])}}
                        &nbsp;<i class="fas fa-mars text-primary"></i>
                    </div>
                    <div class="form-check form-check-inline">
                        {{Form::radio('gender', 0, NULL, ['class' => 'form-check-input'])}}
                        {{Form::label('gender', 'หญิง', ['class' => 'form-check-label'])}} 
                        &nbsp;<i class="fas fa-venus text-danger"></i>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-birthday-cake"></i></div>
                    </div>
                    {{Form::number('age_y', NULL, ['class' => 'form-control', 'placeholder' => 'ปี'])}}
                    <div class="input-group-prepend">
                        <div class="input-group-text">ปี</div>
                    </div>
                    {{Form::number('age_m', NULL, ['class' => 'form-control', 'placeholder' => 'เดือน'])}}
                    <div class="input-group-append">
                        <div class="input-group-text">เดือน</div>
                    </div>
                </div>
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-flag"></i></div>
                    </div>
                    {{Form::text('nationality', NULL, ['class' => 'form-control', 'placeholder' => 'สัญชาติ'])}}
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-1 px-0">
                    <div class="input-group btn-group btn-group-toggle col-12" data-toggle="buttons">
                        <label class="btn btn-outline-secondary font-weight-normal d-inline-flex align-items-center justify-content-center">
                            <input type="radio" name="patient_type" id="patient_type_1" value="1" autocomplete="off">PUI
                        </label>
                        <label class="btn btn-outline-secondary font-weight-normal d-inline-flex align-items-center justify-content-center">
                            <input type="radio" name="patient_type" id="patient_type_2" value="2" autocomplete="off">ผู้สัมผัสใกล้ชิดผู้ติดเชื้อ
                        </label>
                        <label class="btn btn-outline-secondary font-weight-normal d-inline-flex align-items-center justify-content-center">
                            <input type="radio" name="patient_type" id="patient_type_3" value="3" autocomplete="off">การค้นหา/สำรวจเชิงรุก
                        </label>
                        <label class="btn btn-outline-secondary font-weight-normal d-inline-flex align-items-center justify-content-center">
                            <input type="radio" name="patient_type" id="patient_type_4" value="4" autocomplete="off">Sentinel surveillance
                        </label>
                        <label class="btn btn-outline-secondary font-weight-normal d-flex align-items-center text-nowrap">
                            <input type="radio" name="patient_type" id="patient_type_5" value="5" autocomplete="off">อื่นๆ&ensp;
                            {{Form::text('patient_type_text', NULL, ['class' => 'form-control form-control-sm', 'placeholder' => 'ระบุ'])}}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-briefcase"></i></div>
                    </div>
                    {{Form::text('occupation', NULL, ['class' => 'form-control', 'placeholder' => 'อาชีพ'])}}
                </div>
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone-alt"></i></div>
                    </div>
                    {{Form::text('telephone', NULL, ['class' => 'form-control', 'placeholder' => 'เบอร์โทรศัพท์'])}}
                </div>
                <div class="col-md-6 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">สถานที่ทำงาน/สถานศึกษา</div>
                    </div>
                    {{Form::text('workplace', NULL, ['class' => 'form-control', 'placeholder' => 'ชื่อสถานที่ทำงานหรือสถานศึกษา'])}}
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">ที่อยู่ขณะป่วย</div>
                    </div>
                    {{Form::text('address_name', NULL, ['class' => 'form-control', 'placeholder' => 'ระบุชื่อสถานที่'])}}
                </div>
                <div class="col-md-1 mb-1 input-group">
                    {{Form::text('address_moo', NULL, ['class' => 'form-control', 'placeholder' => 'หมู่'])}}
                </div>
                <div class="col-md-2 mb-1 input-group">
                    {{Form::text('address_tmb', NULL, ['class' => 'form-control', 'placeholder' => 'ตำบล'])}}
                </div>
                <div class="col-md-2 mb-1 input-group">
                    {{Form::text('address_amp', NULL, ['class' => 'form-control', 'placeholder' => 'อำเภอ'])}}
                </div>
                <div class="col-md-4 mb-1 input-group">
                    {{Form::text('address_chw', NULL, ['class' => 'form-control', 'placeholder' => 'จังหวัด'])}}
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-1 px-0">
                    <div class="input-group btn-group btn-group-toggle col-12" data-toggle="buttons">
                        <label class="btn btn-outline-secondary font-weight-normal d-inline-flex align-items-center justify-content-center">
                            <input type="radio" name="address_type" id="address_type_1" value="1" autocomplete="off">บ้านเดี่ยว
                        </label>
                        <label class="btn btn-outline-secondary font-weight-normal d-inline-flex align-items-center justify-content-center">
                            <input type="radio" name="address_type" id="address_type_2" value="2" autocomplete="off">ตึกแถว/ทาวน์เฮ้าส์
                        </label>
                        <label class="btn btn-outline-secondary font-weight-normal d-inline-flex align-items-center justify-content-center">
                            <input type="radio" name="address_type" id="address_type_3" value="3" autocomplete="off">หอพัก/คอนโด/ห้องเช่า
                        </label>
                        <label class="btn btn-outline-secondary font-weight-normal d-inline-flex align-items-center justify-content-center">
                            <input type="radio" name="address_type" id="address_type_4" value="4" autocomplete="off">พักห้องรวมกับคนจำนวนมาก
                        </label>
                        <label class="btn btn-outline-secondary font-weight-normal d-flex align-items-center text-nowrap">
                            <input type="radio" name="address_type" id="address_type_5" value="5" autocomplete="off">อื่นๆ&ensp;
                            {{Form::text('address_type_text', NULL, ['class' => 'form-control form-control-sm', 'placeholder' => 'ระบุสถานที่'])}}
                        </label>
                    </div>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div><!-- /.card -->

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">2. ข้อมูลทางคลินิก</h3>
        </div>
        <div class="card-body">
            <div class="row mb-1">
                <div class="col-md-4 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">วันที่เริ่มป่วย</div>
                    </div>
                    {{Form::date('date_sick', NULL, ['class' => 'form-control', 'placeholder' => 'วันที่เริ่มป่วย'])}}
                </div>
                <div class="col-md-4 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">วันที่รักษาครั้งแรก</div>
                    </div>
                    {{Form::date('date_treat', NULL, ['class' => 'form-control', 'placeholder' => 'วันที่เริ่มป่วย'])}}
                </div>
                <div class="col-md-4 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">วันวินิจฉัยโควิด-19</div>
                    </div>
                    {{Form::date('date_diagnosis', NULL, ['class' => 'form-control', 'placeholder' => 'วันที่เริ่มป่วย'])}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-4 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">ชื่อสถานพยาบาล</div>
                    </div>
                    {{Form::text('hos_name', NULL, ['class' => 'form-control', 'placeholder' => 'สถานพยาบาลปัจจุบัน'])}}
                </div>
                <div class="col-md-4 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">จังหวัด</div>
                    </div>
                    {{Form::text('hos_chw', NULL, ['class' => 'form-control', 'placeholder' => 'จังหวัด'])}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-3">อาการและอาการแสดง (ณ วันที่รายงาน)</div>
                <div class="input-group btn-group btn-group-toggle col-9" data-toggle="buttons">
                    <label class="btn btn-outline-secondary d-flex justify-content-center align-items-center font-weight-normal">
                        <input type="radio" name="symptom" id="symptom_1" value="1" autocomplete="off"> ไม่มีอาการใดๆ
                    </label>
                    <label class="btn btn-outline-secondary d-flex justify-content-center align-items-center font-weight-normal">
                        <input type="radio" name="symptom" id="symptom_2" value="2" autocomplete="off"> มีอาการ แต่ไม่มีอาการระบบทางเดินหายใจ
                    </label>
                    <label class="btn btn-outline-secondary d-flex text-nowrap align-items-center font-weight-normal">
                        <input type="radio" name="symptom" id="symptom_3" value="3" autocomplete="off"> มีอาการระบบทางเดินหายใจ 
                        {{Form::text('symptom_o2sat', NULL, ['class' => 'form-control form-control-sm col-3', 'placeholder' => 'O2SAT'])}}
                    </label>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-3"></div>
                <div class="input-group btn-group btn-group-toggle col-9" data-toggle="buttons">
                    <label class="btn btn-outline-secondary font-weight-normal">
                        <input type="checkbox" name="symptom_pneumonia" value="1" autocomplete="off"> เป็นปอดอักเสบ
                    </label>
                    <label class="btn btn-outline-secondary font-weight-normal">
                        <input type="checkbox" name="symptom_ett" value="1" autocomplete="off"> ใส่เครื่องช่วยหายใจ
                    </label>
                    <label class="btn btn-outline-secondary font-weight-normal">
                        <input type="checkbox" name="symptom_dead" value="1" autocomplete="off"> เสียชีวิต
                    </label>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-6">
                    <div class="input-group h-100">
                        <div class="input-group-prepend">
                            <div class="input-group-text">โรคประจำตัว</div>
                        </div>
                        {{Form::text('ud', NULL, ['class' => 'form-control h-100', 'placeholder' => 'โรคประจำตัว'])}}
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary d-flex justify-content-center align-items-center font-weight-normal">
                            <input type="radio" name="pregnent" id="pregnent_1" value="0" autocomplete="off"> ไม่ได้ตั้งครรภ์
                        </label>
                        <label class="btn btn-outline-secondary d-flex text-nowrap align-items-center font-weight-normal">
                            <input type="radio" name="pregnent" id="pregnent_2" value="1" autocomplete="off"> ตั้งครรภ์&nbsp;
                            {{Form::number('ga', NULL, ['class' => 'form-control form-control-sm col-3', 'placeholder' => 'GA'])}}&nbsp;สัปดาห์
                        </label>
                    </div>
                </div>
            </div>
            <hr class="mb-3">
            <div class="row mb-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ครั้งที่</th>
                            <th>วันที่เก็บ</th>
                            <th>ชนิดตัวอย่าง</th>
                            <th>สถานที่ส่งตรวจ</th>
                            <th>ผลตรวจ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>RT-PCR</td>
                            <td><input class="form-control" name="rtpcr_date" type="date"></td>
                            <td><input class="form-control" name="rtpcr_sample" type="text"></td>
                            <td><input class="form-control" name="rtpcr_labplace" type="text"></td>
                            <td>
                                <div class="input-group btn-group btn-group-toggle col-12" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="rtpcr_result" id="rtpcr_result_1" value="0" autocomplete="off"> รอผล
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="rtpcr_result" id="rtpcr_result_2" value="1" autocomplete="off"> Detected
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="rtpcr_result" id="rtpcr_result_3" value="2" autocomplete="off"> Not detected
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Antigen</label>
                                <div class="input-group btn-group btn-group-sm btn-group-toggle col-12" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary font-weight-light">
                                        <input type="radio" name="ag_type" id="ag_type_1" value="1" autocomplete="off"> ATK
                                    </label>
                                    <label class="btn btn-outline-secondary font-weight-light">
                                        <input type="radio" name="ag_type" id="ag_type_2" value="2" autocomplete="off"> FIA
                                    </label>
                                    <label class="btn btn-outline-secondary font-weight-light">
                                        <input type="radio" name="ag_type" id="ag_type_3" value="3" autocomplete="off"> ATK ภาคสนาม
                                    </label>
                                </div>
                            </td>
                            <td><input class="form-control" name="ag_date" type="date"></td>
                            <td><input class="form-control" name="ag_sample" type="text"></td>
                            <td><input class="form-control" name="ag_labplace" type="text"></td>
                            <td>
                                <div class="input-group btn-group btn-group-toggle col-12" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ag_result" id="ag_result_1" value="0" autocomplete="off"> รอผล
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ag_result" id="ag_result_2" value="1" autocomplete="off"> Detected
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ag_result" id="ag_result_3" value="2" autocomplete="off"> Not detected
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Antibody ครั้งที่ 1</td>
                            <td><input class="form-control" name="ab1_date" type="date"></td>
                            <td><input class="form-control" name="ab1_sample" type="text"></td>
                            <td><input class="form-control" name="ab1_labplace" type="text"></td>
                            <td>
                                <div class="input-group btn-group btn-group-toggle col-12" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ab1_result" id="ab1_result_1" value="0" autocomplete="off"> รอผล
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ab1_result" id="ab1_result_2" value="1" autocomplete="off"> IgM
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ab1_result" id="ab1_result_3" value="2" autocomplete="off"> IgG
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ab1_result" id="ab1_result_4" value="3" autocomplete="off"> Neg
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Antibody ครั้งที่ 2</td>
                            <td><input class="form-control" name="ab2_date" type="date"></td>
                            <td><input class="form-control" name="ab2_sample" type="text"></td>
                            <td><input class="form-control" name="ab2_labplace" type="text"></td>
                            <td>
                                <div class="input-group btn-group btn-group-toggle col-12" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ab2_result" id="ab2_result_1" value="0" autocomplete="off"> รอผล
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ab2_result" id="ab2_result_2" value="1" autocomplete="off"> IgM
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ab2_result" id="ab2_result_3" value="2" autocomplete="off"> IgG
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="ab2_result" id="ab2_result_4" value="3" autocomplete="off"> Neg
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.card-body -->
    </div><!-- /.card -->

    <div class="card col-10">
        <div class="card-header">
            <h3 class="card-title">3. ประวัติได้รับวัคซีนป้องกันโรคติดเชื้อไวรัสโคโรนา 2019</h3>
        </div>
        <div class="card-body">
            <div class="col-9 mb-1">
                <div class="d-flex">
                    <div class="col-3 mr-2 font-weight-bold">ประวัติการรับวัคซีน</div>
                    <div class="input-group btn-group btn-group-toggle col-5" data-toggle="buttons">
                        <label class="btn btn-outline-secondary">
                        <input type="radio" name="vac" id="vac_1" value="0" autocomplete="off"> ไม่เคยได้รับ
                        </label>
                        <label class="btn btn-outline-success">
                        <input type="radio" name="vac" id="vac_2" value="1" autocomplete="off"> เคยได้รับ
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-9 mb-1">
                <div class="d-flex">
                    <div class="col-3 mr-2 font-weight-bold">หลักฐานการได้รับวัคซีน</div>
                    <div class="input-group btn-group btn-group-toggle col-5" data-toggle="buttons">
                        <label class="btn btn-outline-secondary">
                        <input type="radio" name="vac_evd" id="vac_evd_1" value="0" autocomplete="off"> ไม่มีหลักฐาน
                        </label>
                        <label class="btn btn-outline-success">
                        <input type="radio" name="vac_evd" id="vac_evd_2" value="1" autocomplete="off"> มีหลักฐาน
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-1">
                <div class="input-group col-lg-12">
                    <div class="input-group">
                        <div class="input-group-prepend pr-0">
                            <div class="input-group-text">เข็มที่ 1 วันที่</div>
                        </div>
                        {{Form::date('vac1_date', NULL, ['class' => 'form-control col-2'])}}
                        <div class="btn-group btn-group-toggle " data-toggle="buttons">
                            <label class="btn btn-outline-secondary font-weight-normal">
                            <input type="radio" name="vac1_type" id="vac1_type_1" value="1" autocomplete="off"> Sinovac
                            </label>
                            <label class="btn btn-outline-secondary  font-weight-normal">
                            <input type="radio" name="vac1_type" id="vac1_type_2" value="2" autocomplete="off"> AZ
                            </label>
                            <label class="btn btn-outline-secondary  font-weight-normal">
                            <input type="radio" name="vac1_type" id="vac1_type_3" value="3" autocomplete="off"> Pfizer
                            </label>
                            <label class="btn btn-outline-secondary  font-weight-normal">
                            <input type="radio" name="vac1_type" id="vac1_type_4" value="4" autocomplete="off"> Moderna
                            </label>
                        </div>
                        {{Form::text('vac1_place', NULL, ['class' => 'form-control col-12', 'placeholder' => 'สถานที่ฉีด'])}}
                    </div>
                </div>
            </div>
            <div class="row mb-1">
                <div class="input-group col-lg-12">
                    <div class="input-group">
                        <div class="input-group-prepend pr-0">
                            <div class="input-group-text">เข็มที่ 2 วันที่</div>
                        </div>
                        {{Form::date('vac2_date', NULL, ['class' => 'form-control col-2'])}}
                        <div class="btn-group btn-group-toggle " data-toggle="buttons">
                            <label class="btn btn-outline-secondary font-weight-normal">
                            <input type="radio" name="vac2_type" id="vac2_type_1" value="1" autocomplete="off"> Sinovac
                            </label>
                            <label class="btn btn-outline-secondary  font-weight-normal">
                            <input type="radio" name="vac2_type" id="vac2_type_2" value="2" autocomplete="off"> AZ
                            </label>
                            <label class="btn btn-outline-secondary  font-weight-normal">
                            <input type="radio" name="vac2_type" id="vac2_type_3" value="3" autocomplete="off"> Pfizer
                            </label>
                            <label class="btn btn-outline-secondary  font-weight-normal">
                            <input type="radio" name="vac2_type" id="vac2_type_4" value="4" autocomplete="off"> Moderna
                            </label>
                        </div>
                        {{Form::text('vac2_place', NULL, ['class' => 'form-control col-12', 'placeholder' => 'สถานที่ฉีด'])}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">4. ประวัติเสี่ยงในช่วง 14 วันก่อนเริ่มป่วย (หรือ 14 วันก่อนตรวจพบการติดเชื้อ)</h3>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            {{Form::hidden('rf1', FALSE)}}
                            {{Form::checkbox('rf1', TRUE, NULL, ['id' => 'rf1', 'class' => 'custom-control-input'])}}
                            {{Form::label('rf1', 'ประวัติการเดินทางมาจากพื้นที่ระบาด COVID-19', ['class' => 'custom-control-label'])}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text form-control-sm">ประเทศไทย</div>
                        </div>
                        {{Form::text('rf1_chw', NULL, ['class' => 'form-control form-control-sm col-3 ', 'placeholder' => 'จังหวัด'])}}
                        <div class="input-group-prepend">
                            <div class="input-group-text form-control-sm">ต่างประเทศ</div>
                        </div>
                        {{Form::text('rf1_country', NULL, ['class' => 'form-control form-control-sm col-3 ', 'placeholder' => 'ประเทศ'])}}
                        {{Form::text('rf1_city', NULL, ['class' => 'form-control form-control-sm col-3 ', 'placeholder' => 'เมือง'])}}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            {{Form::hidden('rf2', FALSE)}}
                            {{Form::checkbox('rf2', TRUE, NULL, ['id' => 'rf2', 'class' => 'custom-control-input'])}}
                            {{Form::label('rf2', 'ได้ดูแลหรือสัมผัสใกล้ชิดกับผู้ป่วยอาการคล้ายไข้หวัดใหญ่หรือปอดอักเสบ', ['class' => 'custom-control-label'])}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            {{Form::hidden('rf3', FALSE)}}
                            {{Form::checkbox('rf3', TRUE, NULL, ['id' => 'rf3', 'class' => 'custom-control-input'])}}
                            {{Form::label('rf3', 'สัมผัสกับผู้ป่วยยืนยันโรคติดเชื้อไวรัสโคโรนา 2019', ['class' => 'custom-control-label'])}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        {{Form::text('rf3_name', '', ['class' => 'form-control form-control-sm col-lg-6', 'placeholder' => 'ชื่อผู้ที่สัมผัส'])}}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            {{Form::hidden('rf4', FALSE)}}
                            {{Form::checkbox('rf4', TRUE, NULL, ['id' => 'rf4', 'class' => 'custom-control-input'])}}
                            {{Form::label('rf4', 'ประกอบอาชีพที่สัมผัสใกล้ชิดกับนักท่องเที่ยวต่างชาติหรือแรงงานต่างชาติ', ['class' => 'custom-control-label'])}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            {{Form::hidden('rf5', FALSE)}}
                            {{Form::checkbox('rf5', TRUE, NULL, ['id' => 'rf5', 'class' => 'custom-control-input'])}}
                            {{Form::label('rf5', 'เดินทางไปในสาถานที่หรือทำกิจกรรมที่มีคนหนาแน่นหรือพลุกพล่าน', ['class' => 'custom-control-label'])}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        {{Form::text('rf5_place', NULL, ['class' => 'form-control form-control-sm col-9 ', 'placeholder' => 'ระบุสถานที่'])}}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            {{Form::hidden('rf6', FALSE)}}
                            {{Form::checkbox('rf6', TRUE, NULL, ['id' => 'rf6', 'class' => 'custom-control-input'])}}
                            {{Form::label('rf6', 'เป็นบุคลากรทางการแพทย์หรือเจ้าหน้าที่ห้องปฏิบัติการ', ['class' => 'custom-control-label'])}}
                            <div>- ดูแลหรือให้บริการผู้ป่วยโควิต 19 หรือ เป็นผู้เก็บ/นำส่ง/ตรวจตัวอย่างของผู้ติดเชื้อโควิด 19</div>
                            <div>- ไม่ได้ดูแลหรือให้บริการผู้ป่วยโควิต 19 หรือ ไม่ได้เป็นผู้เก็บ/นำส่ง/ตรวจตัวอย่างของผู้ติดเชื้อโควิด 19</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            {{Form::hidden('rf7', FALSE)}}
                            {{Form::checkbox('rf7', TRUE, FALSE, ['id' => 'rf7', 'class' => 'custom-control-input'])}}
                            {{Form::label('rf7', 'ประวัติเสี่ยงอื่นๆ', ['class' => 'custom-control-label'])}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    {{Form::textarea('rf8_text', '', ['class' => 'form-control form-control-sm col-lg-12', 'placeholder' => 'ประวัติเสี่ยงอื่นๆ'])}}
                </div>
            </div>
                
                
           
        </div>
    </div><!-- /.card -->

    <div class="card col-12">
        <div class="card-header">
            <h3 class="card-title">5. การค้นหาผู้สัมผัสเสี่ยงสูง</h3>
        </div>
        <div class="card-body">
            <div class="row mb-1">
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text text-danger"><i class="fas fa-user"></i></div>
                    </div>
                    {{Form::number('highrisk_n', NULL, ['class' => 'form-control h-100', 'placeholder' => 'ผู้สัมผัสเสี่ยงสูง'])}}
                    <div class="input-group-append">
                        <div class="input-group-text text-danger">คน</div>
                    </div>
                </div>
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text text-danger">ติดตามได้</div>
                    </div>
                    {{Form::number('highrisk_n_trace', NULL, ['class' => 'form-control h-100', 'placeholder' => 'ตามได้'])}}
                    <div class="input-group-append">
                        <div class="input-group-text text-danger">คน</div>
                    </div>
                </div>
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary d-flex">
                            <input type="radio" autocomplete="off">บ้าน 
                            {{Form::number('highrisk_hi', NULL, ['class' => 'form-control', 'placeholder' => 'จำนวน....คน'])}}
                        </label>
                    </div>
                </div>
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary d-flex text-nowrap">
                            <input type="radio" autocomplete="off">สถานที่กักตัว 
                            {{Form::number('highrisk_ci', NULL, ['class' => 'form-control', 'placeholder' => 'จำนวน....คน'])}}
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text text-secondary"><i class="fas fa-user"></i></div>
                    </div>
                    {{Form::number('lowrisk_n', NULL, ['class' => 'form-control h-100', 'placeholder' => 'จำนวนผู้สัมผัสเสี่ยงต่ำ'])}}
                    <div class="input-group-append">
                        <div class="input-group-text text-secondary">คน</div>
                    </div>
                </div>
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text text-secondary">ติดตามได้</div>
                    </div>
                    {{Form::number('lowrisk_n_trace', NULL, ['class' => 'form-control h-100', 'placeholder' => 'ตามได้'])}}
                    <div class="input-group-append">
                        <div class="input-group-text text-secondary">คน</div>
                    </div>
                </div>
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary d-flex">
                            <input type="radio" autocomplete="off">บ้าน 
                            {{Form::number('lowrisk_hi', NULL, ['class' => 'form-control', 'placeholder' => 'จำนวน....คน'])}}
                        </label>
                    </div>
                </div>
                <div class="col-md-3 mb-1 input-group">
                    <div class="input-group btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-secondary d-flex text-nowrap">
                            <input type="radio" autocomplete="off">สถานที่กักตัว 
                            {{Form::number('lowrisk_ci', NULL, ['class' => 'form-control', 'placeholder' => 'จำนวน....คน'])}}
                        </label>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex mt-3 justify-content-center">
            {{Form::submit('บันทึก', ['class' => 'btn btn-lg btn-primary'])}}
        </div>
    </div>
    {!!Form::close()!!}

</section><!-- /.content -->

@endsection


<!-- PUSH STYLE -->
@push('style')

<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/ekko-lightbox/ekko-lightbox.css') }}">
<link rel="stylesheet" href="{{ asset('patient/css/app.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

<style>
.input-group> .same-pre-flex {
    flex: 0 0 30%;
}
.input-group> .same-post-flex {
    flex: 0 0 18%;
}
.same-pre-flex .input-group-text, .same-post-flex .input-group-text {
    width: 100%;
}

input[type=number] {
    text-align: center;
}

.table > tbody > tr > td {
     vertical-align: top !important;
     padding: 0px 0px 0.75em 0px;
}
.table > tbody > tr > td:first-child {
     padding-top: 0px !important;
     display: block;
     /* text-align: end; */
     white-space: nowrap;
}
.table > tbody > tr > td:first-child > div:first-child {
     margin-right: 0.25em !important;
}

.custom-control-label {
    font-weight: normal !important;
}
</style>

@endpush





<!-- PUSH SCRIPT -->
@push('script')
<!-- DataTables -->
<script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function () {
        $("#listtable").DataTable({
        "pageLength" : 25,
        "order" : [[0, 'desc'], [1, 'asc']]
        });
    });
</script>

<!-- Ekko Lightbox -->
<script src="{{ asset('admin-lte/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- Tabs script -->
<script src="{{ asset('patient/js/image_tab.js') }}"></script>
<script src="{{ asset('patient/js/visit_tab.js') }}"></script>

@endpush