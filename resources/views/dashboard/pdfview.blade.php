<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
</head>
<body>
	<style type="text/css">
	table td, table th{
		border:1px solid blue;
	}
</style>
<div class="container">
	<br>
	<table class="tale center-aligned-table">
		<thead>
			<tr class="text-danger">
				<th>Tipe Surat</th>
				<th>Kode Surat</th>
				<th>Judul Surat</th>
				<th>Tanggal</th>
				<th>Pengirim</th>
			</tr>
		</thead>
		<tbody>
			@foreach($surat as $mail)
			<tr class="">
				<td>{{ App\Type::where('id', $mail->id_type)->value('type')}}</td>
				<td>{{ $mail->mail_code }}</td>
				<td>{{ $mail->mail_subject}}</td>
				<td>{{ $mail->created_at }}</td>
				<td>{{ App\User::where('id', $mail->mail_from)->value('name')}}</td>
			</tr>
			@endforeach
			<tbody>
			</table>
		</div>
		<body>
			<html>