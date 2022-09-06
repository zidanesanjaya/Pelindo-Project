<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Budi's Projects</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/css/index.css" rel="stylesheet">
	<link href="/js/index.js" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
	<body>
			<div class="table-wrapper">
				<div class="table-title" style="text-align: center;">
					<h2>Manage <b>Ship</b></h2>
				</div>

				<div class="container text-center d-flex align-items-center justify-content-center">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" data-bs-toggle="tab" href="#kedatangan">Kedatangan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="tab" href="#keberangkatan">Keberangkatan</a>
						</li>
					</ul>
				</div>
				<br><hr><br>
				<div class="text-center">
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane container active" id="kedatangan">
							<h3 class="pb-3">Jadwal <b>Kedatangan</b> Kapal</h3>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Logo</th>
										<th colspan="2">Nama Kapal</th>
										<th>Schedule</th>
										<th>Kedatangan</th>
										<th>Status</th>
										<th>From</th>
									</tr>
								</thead>
								<tbody>
									@forelse($ship as $s)
									<tr>
									<?php
										for ($i=0; $i < sizeof($kapal) ; $i++) { 
											if($s->nama_kapal == $kapal[$i]->nama_kapal ){
										?>
											<td><img src="{{$kapal[$i]->path_logo}}" style="width: 80%; height: 60%"></td>
										<?php
											}
										} 
									?>
										<td colspan="2">{{$s->nama_kapal}}</td>
										<td>{{date("d-M-Y", strtotime($s->schedule))}}</td>
										<td>{{$s->kedatangan}}</td>
										<td>{{$s->status}}</td>
										<td>{{$s->from}}</td>
									</tr>
									@empty
									<tr>
										<td colspan="12">There are no Ship.</td>
									</tr>
									@endforelse 
								</tbody>
							</table>
							{{$ship->links()}}
						</div>
						<div class="tab-pane container fade" id="keberangkatan">
						<h3 class="pb-3">Jadwal <b>Keberangkatan</b> Kapal</h3>
						<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Logo</th>
										<th colspan="2">Nama Kapal</th>
										<th>Schedule</th>
										<th>Keberangkatan</th>
										<th>Status</th>
										<th>Destination</th>
									</tr>
								</thead>
								<tbody>
									@forelse($ship_ as $s1)
									<tr>
									<?php
										for ($i=0; $i < sizeof($kapal) ; $i++) { 
											if($s1->nama_kapal == $kapal[$i]->nama_kapal ){
										?>
											<td><img src="{{$kapal[$i]->path_logo}}" style="width: 80%; height: 60%"></td>
										<?php
											}
										} 
									?>
										<td colspan="2">{{$s1->nama_kapal}}</td>
										<td>{{date("d-M-Y", strtotime($s1->schedule))}}</td>
										<td>{{$s1->keberangkatan}}</td>
										<td>{{$s1->status}}</td>
										<td>{{$s1->destination}}</td>
									</tr>
									@empty
									<tr>
										<td colspan="12">There are no Ship.</td>
									</tr>
									@endforelse 
								</tbody>
							</table>
							{{$ship->links()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>