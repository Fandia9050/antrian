<script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Loket 1</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                
            </div>
        </div>
         <div class="ibox-content">
            <?= $this->session->flashdata('success')?>

            <div class="table-responsive">

                <form>
                    <div class="col-md-12">
                        <div class="form-group">

                              <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron"  >
                      <h2 class="text-center">Nomor Antrian </h2>      
                      <h1 id="nomor_antrian" class="text-center">1</h1>
                      <h2 id="loket" class="text-center"></h2>      
                     

                         <center>
                            <button loket="" kecamatan ="" no_antrian="" id="btn-ambil" class="btn btn-primary">PANGGIL ANTRIAN</button>

                            <button loket="" kecamatan ="" no_antrian="" id="btn-ambil" class="btn btn-primary">ANTRIAN SELANJUTNYA</button>
                         </center>
                        </div>
                    </div>
                 </div>
              </div>
               </div>
                </div>
            </div>
          </form>

       
                   

    </div>
</div>



    </div>
</div>
