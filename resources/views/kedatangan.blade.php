<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta http-equiv="refresh" content="5">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/img/logo-head.png" type="image/icon type">
	<title>Kedatangan</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/css/index.css" rel="stylesheet">
	<link href="/js/index.js" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
	<body onload="startTime()">
		<div class="table-wrapper">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="logo_pelindo">
						<a href="{{url ('http://127.0.0.1:8000/kb')}}"><img src="{{asset ('/img/logo-pelindo.png')}}" class="logo_pelindo"></a>
						</div>
					</div>
					<div class="col-9">
						<div class="table-title">
							<h2>Jadwal <b>Kedatangan</b> Kapal</h2>
						</div>
					</div>
				</div>
			
				<br><hr><br>

				<button type="button" class="btn btn-primary" style="float: right; width: 135px; height: 60px; font-size: 30px;"><div id="txt"></div></button>

				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Logo</th>
							<th colspan="2">Nama Kapal</th>
							<th>Jadwal</th>
							<th>Kedatangan</th>
							<th>Status</th>
							<th>Dari</th>
						</tr>
					</thead>

					<tbody>
						@forelse($ship as $s)
							<tr>
								<?php
									for ($i=0; $i < sizeof($kapal) ; $i++) { 
										if($s->nama_kapal == $kapal[$i]->nama_kapal ){
									?>
										<td><img src="{{$kapal[$i]->path_logo}}" style="width: 150%; height: 150%"></td>
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
								<td colspan="12">Tidak ada Kapal.</td>
							</tr>
						@endforelse 
					</tbody>
				</table>
			{{$ship->links()}}
		</div>

		<script>
			function startTime() {
			const today = new Date();
			let h = today.getHours();
			let m = today.getMinutes();
			let s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
			setTimeout(startTime, 1000);
			}

			function checkTime(i) {
			if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
			return i;
			}
		</script>
	</body>
</html>