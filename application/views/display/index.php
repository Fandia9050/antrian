<script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>PILIH KECAMATAN :</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                
            </div>
        </div>
         <div class="ibox-content">
            <?= $this->session->flashdata('success')?>

            <div class="table-responsive">
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="sel1">LOKET 1</label>
                          <select data-loket="1" class="form-control" id="sel1">
                            <option value = "">Pilih Kecamatan</option>

                            <?php foreach ($kecamatan as $k) { ?>
                                <option value = "<?= $k->id_kecamatan ?>"> <?= $k->nama_kecamatan?> </option>
                            <?php }?>

                           
                          </select>
                        </div>
                    </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron" style="display: none;">
                      <h2 class="text-center">Nomor Antrian Anda</h2>      
                      <h1 id="nomor_antrian" class="text-center">1</h1>
                      <h2 id="loket" class="text-center"></h2>      
                      <center><button loket="" kecamatan ="" no_antrian="" id="btn-ambil" class="btn btn-primary">Ambil Antrian</button></center>
                    </div>
                </div>
            </div>

        </div>

        </div>
    </div>
</div>

<script type="text/javascript">
   $("select").on("change", function(){
    const loket = $(this).data("loket");
    $.get("/antrian/display/index/"+loket, function(result){
        $("#nomor_antrian").text(result);
        $("#loket").text("Silahkan Ke Loket "+loket);
        $("#btn-ambil").attr("loket", loket);
        $("#btn-ambil").attr("kecamatan", kecamatan);
        $("#btn-ambil").attr("no_antrian", result);
        $(".jumbotron").show(1000);
    })
   })

   // $("#btn-ambil").on("click", function(){
   //      const loket = $(this).attr("loket");
   //      const kecamatan = $(this).attr("kecamatan");
   //      const no_antrian = $(this).attr("no_antrian");

   //      $.get("/antrian/home/simpan_antrian/"+loket+"/"+kecamatan+"/"+no_antrian, function(){
   //          const no =parseInt($("#nomor_antrian").text())+1;
   //          $("#nomor_antrian").text(no);
   //          alert("Antrian Berhasil Di Ambil");
   //      });


   // })
</script>