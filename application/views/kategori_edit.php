<div class="card">
                <div class="card-body">
                  <form action="<?= base_url('admin/kategori/update')?> " method="post">
                  <?php foreach($kategori as $aa){?>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                      <input type="text" value="<?= $aa['nama_kategori']?>" class="form-control" name="nama_kategori">
                    </div>
                    
                    
                    <input type="hidden" name="id_kategori" value="<?= $aa['id_kategori']?>" >
                    <?php }?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>