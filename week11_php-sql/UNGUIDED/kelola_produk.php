
<!DOCTYPE html>
<html>
<head>
<title>Kelola Produk</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
<h3>Kelola Produk</h3>

<form class="d-flex mb-3">
<input class="form-control me-2" placeholder="Cari produk...">
<button class="btn btn-primary">Cari</button>
</form>

<a href="#" class="btn btn-success mb-3">+ Tambah Produk</a>

<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
<th>No</th>
<th>Nama</th>
<th>Harga</th>
<th>Stok</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Contoh Produk</td>
<td>10000</td>
<td>5</td>
<td>
<button class="btn btn-sm btn-warning">Edit</button>
<button class="btn btn-sm btn-danger">Hapus</button>
</td>
</tr>
</tbody>
</table>
</div>
</body>
</html>
