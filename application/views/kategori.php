<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modal Form</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
	<!-- Button to Open Modal -->
	<div class="flex justify-center mt-10">
		<button onclick="openModal()"
			class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none shadow">
			Tambah Kategori
		</button>
	</div>

	<!-- Modal -->
	<div id="modalForm" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
		<div class="bg-white w-96 rounded-lg shadow-lg p-6">
			<!-- Modal Header -->
			<div class="flex justify-between items-center mb-4">
				<h2 class="text-xl font-semibold">Tambah Kategori</h2>
				<button onclick="closeModal()" class="text-gray-500 hover:text-red-500 focus:outline-none">

				</button>
			</div>

			<!-- Modal Body -->
			<form method="post" action="<?= base_url("admin/kategori/simpan")?>">
				<!-- Nama -->
				<div class="mb-4">
					<label for="nama" class="block text-sm font-medium text-gray-700"> Nama Kategori</label>
					<input type="text" id="nama" name="nama_kategori"
						class="w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
				</div>


				<!-- Modal Footer -->
				<div class="flex justify-end gap-4">
					<button type="button" onclick="closeModal()"
						class="px-4 py-2 text-gray-500 hover:text-gray-700 focus:outline-none">
						Batal
					</button>
					<button type="submit"
						class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">
						Simpan
					</button>
				</div>
			</form>
		</div>
	</div>

	<div class="container mt-5">
		<table class="table table-striped table-bordered">
			<thead class="table-dark">
				<tr>
					<th>No</th>
					<th>Kategori</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach($kategori as $uu){?>
				<tr>
					<td><?= $no++;?></td>
					<td><?= $uu['nama_kategori']?></td>
					<td>
						<a href="<?= base_url('admin/kategori/hapus/')  . $uu['id_kategori']?>">
							<button class="btn btn-danger">Hapus</button>
						</a>
						<a href="<?= base_url('admin/kategori/edit/')  . $uu['id_kategori']?>">
							<button class="btn btn-warning">Edit</button>
						</a>
					</td>

				</tr>
				<?php  }?>
			</tbody>
		</table>
	</div>

	<script>
		// Open Modal
		function openModal() {
			document.getElementById('modalForm').classList.remove('hidden');
			document.getElementById('modalForm').classList.add('flex');
		}

		// Close Modal
		function closeModal() {
			document.getElementById('modalForm').classList.add('hidden');
		}

		// Form Submission
		document.getElementById('userForm').addEventListener('submit', function (e) {
			e.preventDefault();

			const data = {
				nama: document.getElementById('nama').value,
				username: document.getElementById('username').value,
				password: document.getElementById('password').value,
				level: document.getElementById('level').value,
			};

			console.log('Data yang dikirim:', data);

			// Tutup modal setelah submit
			closeModal();

			// Reset Form
			e.target.reset();
		});

	</script>
</body>

</html>
