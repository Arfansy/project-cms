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
			Tambah Konten
		</button>
	</div>

	<!-- Modal -->
	<div id="modalForm" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
		<div class="bg-white w-96 rounded-lg shadow-lg p-6">
			<!-- Modal Header -->
			<div class="flex justify-between items-center mb-4">
				<h2 class="text-xl font-semibold">Tambah Konten</h2>
				<button onclick="closeModal()" class="text-gray-500 hover:text-red-500 focus:outline-none">

				</button>
			</div>

			<!-- Modal Body -->
			<form method="post" action="<?= base_url("admin/konten/simpan")?>" enctype="multipart/form-data">
				<!-- Nama -->
				<div class="mb-4">
					<label for="nama" class="block text-sm font-medium text-gray-700"> Judul </label>
					<input type="text" id="nama" name="judul"
						class="w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
				</div>

				<div class="mb-4">
					<label for="nama" class="block text-sm font-medium text-gray-700"> Kategori </label>
					<select name="id_kategori" class="form-control">
						<?php foreach($kategori as $uu){?>
						<option value="<?= $uu['id_kategori']?>"><?= $uu['nama_kategori']?></option>
						<?php  }?>
					</select>
				</div>

				<div class="mb-4">
					<label for="nama" class="block text-sm font-medium text-gray-700"> Deskripsi </label>

					<textarea name="keterangan"
						class="w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
				</div>


			
					<div class="mb-4">
						<label for="foto" class="block text-sm font-medium text-gray-700"> Foto </label>
						<input type="file" name="foto"
							class="w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
							accept="image/png, image/jpeg, image/jpg" required>
					</div>

					<div class="mb-4">
						<label for="audio" class="block text-sm font-medium text-gray-700"> Audio MP3 </label>
						<input type="file" name="audio"
							class="w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
							accept="audio/mp3" required>
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

	<div class="card">

		<div class="table-responsive text-nowrap">
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Kategori Konten</th>
						<th>Tanggal</th>
						<th>Kreator</th>
						<th>Foto</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody class="table-border-bottom-0">
					<?php $no = 1;
                                            foreach ($konten as $aa) { ?>
					<tr>
						<td><?= $no; ?></td>
						<td><?= $aa['judul'] ?></td>
						<td><?= $aa['nama_kategori'] ?></td>
						<td><?= $aa['tanggal'] ?></td>
						<td><?= $aa['username'] ?></td>
						<td>
							<a href="<?= base_url('upload/konten/' . $aa['foto'] ) ?>" target="_blank">
								<span class="tf-icons bx bx-search"></span>Lihat foto
							</a>
						</td>
						<td>
							<a class="btn btn-sm btn-danger"
								onClick="return confirm('Apakah anda yakin untuk menghapus ini?')"
								href="<?= base_url('admin/konten/hapus/' . $aa['id_konten']) ?>">
								<span class="tf-icons bx bx-trash"></span>
							</a>

							<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
								data-bs-target="#konten<?= $no; ?>" fdprocessedid="iw7x2p">
								<span class="tf-icons bx bx-edit"></span>
							</button>

							<!-- Modal -->
							<div class="modal fade" id="konten<?= $no; ?>" tabindex="-1" style="display: none;"
								aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<form action="<?= base_url('admin/konten/update') ?>" method="post"
										enctype="multipart/form-data">
										<input type="hidden" name="nama_foto" value="<?= $aa['foto'] ?>">

										<div class="modal-content" style="background:#222A42;">
											<div class="modal-header">
												<h5 class="modal-title" id="modalCenterTitle"><?= $aa['judul'] ?></h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close" fdprocessedid="ax0u6d"></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col mb-6">
														<label for="nameWithTitle" class="form-label">Judul</label>
														<input type="text" id="nameWithTitle" class="form-control"
															placeholder="Masukkan Nama" name="judul"
															value="<?= $aa['judul'] ?>">
													</div>
												</div>
												<div class="row">
													<div class="col mb-6">
														<label for="nameWithTitle" class="form-label">Kategori</label>
														<select name="id_kategori" class="form-control">
															<?php foreach ($kategori as $uu) { ?>
															<option <?php if ($uu['id_kategori'] == $aa['id_kategori']) {
                                                                                                    echo "selected";
                                                                                                } ?>
																value="<?= $uu['id_kategori'] ?>">
																<?= $uu['nama_kategori'] ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="row">
													<div class="col mb-6">
														<label for="nameWithTitle" class="form-label">Keterangan</label>
														<textarea name="keterangan"
															class="form-control"><?= $aa['keterangan'] ?></textarea>
													</div>
												</div>

												<div class="row">
													<div class="col mb-6">
														<label for="nameWithTitle" class="form-label">Foto</label>
														<input type="file" id="nameWithTitle" class="form-control"
															placeholder="Masukkan Nama" name="foto" required
															accept="image/png, image/gif, image/jpeg">
													</div>
												</div>

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-outline-secondary"
													data-bs-dismiss="modal" fdprocessedid="3t093q">Close</button>
												<button type="submit" class="btn btn-primary"
													fdprocessedid="7zqvqu">Simpan</button>
											</div>
									</form>
								</div>
							</div>
						</td>

					</tr>
					<?php $no++;
                                            } ?>

				</tbody>
			</table>
		</div>
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
