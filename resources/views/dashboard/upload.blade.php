<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="post" action="/uploadfile" enctype="multipart/form-data">
		{{ csrf_field() }}
		Nama : <input type="text" name="nama" value=""> <br>
		Pilih File <input type="file" name="filename" value=""> <br>

		<hr>

		<input type="submit" name="submit" value="simpan"/>
	</form>
</body>
</html>
