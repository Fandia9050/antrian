<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Referensi kecamatan</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                
            </div>
        </div>
        <div class="ibox-content">
            <?= $this->session->flashdata('success')?>

            <div class="table-responsive">
                <a href="<?= base_url('kecamatan/create')?>" class="btn btn-success">Tambah</a> <br /><br />

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kecamatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($model as $data ) { ?>
                            <tr>
                                <td><?= $data->id ?> </td>
                                <td><?= $data->nama_kecamatan ?></td>
                                <td>
                                    <a href = "<?= base_url("kecamatan/update/".$data->id)?>" type="button" class="btn btn-outline btn-primary">Ubah</a>
                                    <a href = "<?= base_url("kecamatan/delete/".$data->id)?>" type="button" class="btn btn-outline btn-danger">Hapus</a>
                            
                                </td>
                            </tr>
                        <?php }?>
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>