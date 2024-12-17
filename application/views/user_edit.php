<div class="card">
                <div class="card-body">
                  <form action="<?= base_url('admin/user/update')?> " method="post">
                  <?php foreach($user as $aa){?>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama</label>
                      <input type="text" value="<?= $aa['nama']?>" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Username</label>
                      <input type="text" value="<?= $aa['username']?>" class="form-control" name="username" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Password</label>
                      <input type="password" value="<?= $aa['password']?>" class="form-control" name="password" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Level</label>
                      <select name="level" class="form-control" >
                        <option value="<?=$aa['level'] ? 'Admin' : 'User'?>">
                    <?=$aa['level']?>
                    </option>

                      </select>
                    </div>
                    
                    <input type="hidden" name="id_user" value="<?= $aa['id_user']?>" >
                    <?php }?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>