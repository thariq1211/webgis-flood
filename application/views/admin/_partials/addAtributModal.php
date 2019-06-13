<div class="modal fade" id="TambahAtribut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Atribut</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
    <div class="card card-register mx-auto mt-1">
      <!-- <div class="card-header">Register an Account</div> -->
      <div class="card-body">
        <form action="<?php echo base_url('admin/admin/addAtribut') ?>" method="post">
        <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputKecamatan" name="kecamatan" class="form-control" placeholder="Kecamatan" required="required">
              <label for="inputKecamatan">Masukkan Nama Kecamatan</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="inputLuasWilayah" name="luas_wilayah" class="form-control" placeholder="Luas Wilayah" required="required" autofocus="autofocus">
                  <label for="inputLuasWilayah">Luas Wilayah</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="inputJenisTanah" name="jenis_tanah" class="form-control" placeholder="Jenis Tanah" required="required">
                  <label for="inputJenisTanah">Jenis Tanah</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="inputKemiringan" name="kemiringan" class="form-control" placeholder="Kemiringan" required="required">
                  <label for="inputKemiringan">Kemiringan</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="penggunaan_lahan" name="penggunaan_lahan" class="form-control" placeholder="Penggunaan Lahan" required="required">
                  <label for="penggunaan_lahan">Penggunaan Lahan</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="inputOrdeSungai" name="orde_sungai" class="form-control" placeholder="Orde Sungai" required="required">
                  <label for="inputOrdeSungai">Orde Sungai</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="inputCH" name="curah_hujan" class="form-control" placeholder="Curah Hujan" required="required">
                  <label for="inputCH">Curah Hujan</label>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
        </div>
        </form>
      </div>
    </div>
  </div>