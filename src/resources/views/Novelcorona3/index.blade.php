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
                    {{ session('user_id') }}
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
          {{-- <div class="float-left">
              <a href="/Export/p3atk" class="btn btn-success"><i class="fas fa-file-excel"></i>&nbsp;Export to Excel</a>
          </div> --}}
          <div class="float-right">
              <a href="/n3/create" class="btn btn-primary">เพิ่มบุคคล</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="listtable" class="table table-sm table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>วันที่รายงาน</th>
                <th>CODE</th>
                <th>CID</th>
                <th>HN</th>
                <th>Name</th>
                <th>Recorder</th>
                <th>Function</th>
            </tr>
            </thead>
            <tbody>
                <?php $row = 1; ?>
                @foreach($record AS $r)
                <tr>
                    <td>{{$row++}}</td>
                    <td><span class="muted">{{$r->created_at}}</span>{{formatDateTimeThai($r->created_at)}}</td>
                    <td>{{$r->code}}</td>
                    <td class="{{(strlen($r->cid) != 13) ? 'text-danger' : ''}}">{{$r->cid}}</td>
                    <td>{{$r->hn}}</td>
                    <?php
                        $gender = [
                            NULL => '#n/a', 
                            '0' => 'หญิง', 
                            '1' => 'ชาย'];

                    ?>
                    <td>
                        <a href="/n3/{{$r->id}}">
                            {{$r->fname . ' ' . $r->lname .' ('. $r->age_y .' ปี)'}}
                        </a>
                    </td>
                    <td>{{$r->reportor}}</td>
                    <td>
                        <a href="/n3/{{$r->id}}/print" target="_blank" class="btn btn-sm btn-outline-primary fas fa-print"></a>
                        <a href="/n3/{{$r->id}}/edit" class="btn btn-sm btn-outline-success fas fa-edit"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->


</section><!-- /.content -->

@endsection


@push('script')
    <!-- Search -->
    <script src="{{ asset('patient/js/searchATK.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('admin-lte/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

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
@endpush


<!-- PUSH STYLE -->
@push('style')

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ URL::asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/ekko-lightbox/ekko-lightbox.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

<style>
    .muted {
        color: rgba(0, 0, 0, 0) !important;
        letter-spacing: -10em;
    }

    #listtable {
        font-size: 0.9em;
    }
</style>
@endpush