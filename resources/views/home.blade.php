@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="/img/logo-head.png" type="image/icon type">
<title>Admin Pelindo</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/index.css" rel="stylesheet">
<link href="/js/index.js" rel="stylesheet">
  
  <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Mengelola <b>Kapal</b></h2>
					</div>

					<div class="col-sm-6">
                        <a href="#"class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"><i class="material-icons">&#xE147;</i> <span>Tambahkan Kapal Baru</span></a>
						<a href="#"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="material-icons">&#xE147;</i> <span>Tambahkan Kapal Ke Daftar</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th colspan="3">Nama Kapal</th>
                        <th>Jadwal</th>
                        <th>Kedatangan</th>
						<th>Keberangkatan</th>
						<th>Status</th>
                        <th>Dari</th>
                        <th>Tujuan</th>
                        <th>Perubahan</th>
                    </tr>
                </thead>
                <tbody>
					@forelse($ship as $ss)
                    <tr>
                        <?php
                            for ($i=0; $i < sizeof($kapal) ; $i++) { 
                                if($ss->nama_kapal == $kapal[$i]->nama_kapal ){
                            ?>
                                <td><img src="{{$kapal[$i]->path_logo}}" style="width: 150%; height: 150%"></td>
                            <?php
                                }
                            } 
                        ?>
                        <td colspan="3">{{$ss->nama_kapal}}</td>
                        <td>{{date("d-M-Y", strtotime($ss->schedule))}}</td>
						<td>{{$ss->kedatangan}}</td>
                        <td>{{$ss->keberangkatan}}</td>
						<td>{{$ss->status}}</td>
                        <td>{{$ss->from}}</td>
                        <td>{{$ss->destination}}</td>
                        <td>
                            <a href="{{route('edit',$ss->id)}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							@csrf
                    		@method('DELETE')
                            <a href="{{route('delete',$ss->id) }}" type="submit" class="delete"><i class="material-icons" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
					@empty
					<tr>
						<td colspan="12">Tidak ada Kapal.</td>
					</tr>
					@endforelse 
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Kapal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('store') }}" method="POST">
        @csrf
            <div class="form-group mb-3">
                <label for="nama_kapal">Nama Kapal <span class="text-danger">*</span></label>
                <select name="nama_kapal" id="nama_kapal" class="form-control">
                    @forelse($kapal as $kapal)
                        <option value="{{$kapal->nama_kapal}}">{{$kapal->nama_kapal}}</option>
                    @empty
                        <option>Tidak Ada Kapal</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="schedule">Jadwal <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="schedule" id="schedule">
            </div>
            <div class="form-group mb-3">
                <label for="from">Dari</label>
                <input type="text" class="form-control" name="from" id="from" value="Balikpapan" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="destination">Tujuan</label>
                <input type="text" class="form-control" name="destination" id="destination">
            </div>
            <div class="form-group mb-3">
                <label for="kedatangan">Kedatangan</label>
                <input type="time" class="form-control" name="kedatangan" id="kedatangan">
            </div>
            <div class="form-group mb-3">
                <label for="keberangkatan">Keberangkatan</label>
                <input type="time" class="form-control" name="keberangkatan" id="keberangkatan">
            </div>
            <div class="form-group mb-3">
                <label for="kedatangan">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-control">
                    <option value="Estimasi" selected>Estimasi</option>
                    <option value="Bersandar">Bersandar</option>
                    <option value="Tertunda">Tertunda</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Kapal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('store_kapal') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="nama">Nama Kapal</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group mb-3">
                    <label for="path">Logo Kapal</label>
                    <input type="file" class="form-control" name="path" id="path" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
    </div>
	
	
</body>
</html>
@endsection
