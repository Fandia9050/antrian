<script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<div class="col-lg-6">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>HARIAN</h5>
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
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="sel1">PILIH TANGGAL :</label>

                         <center><button loket="" kecamatan ="" no_antrian="" id="btn-ambil" class="btn btn-primary">LIHAT</button></center>


                         <!--  <select data-loket="1" class="form-control" id="sel1">
                            <option value = "">Pilih Kecamatan</option>

                            <?php foreach ($kecamatan1 as $k) { ?>
                                <option value = "<?= $k->id_kecamatan ?>"> <?= $k->nama_kecamatan?> </option>
                            <?php }?>

                           
                          </select> -->
                        </div>
                    </div>
        </div>

        </div>
    </div>
</div>

<div class="col-lg-6">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>BULANAN</h5>
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
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="sel1">PILIH BULAN :</label>
                           <center><button loket="" kecamatan ="" no_antrian="" id="btn-ambil" class="btn btn-primary">LIHAT</button></center>
                         <!--  <select data-loket="1" class="form-control" id="sel1">
                            <option value = "">Pilih Kecamatan</option>

                            <?php foreach ($kecamatan1 as $k) { ?>
                                <option value = "<?= $k->id_kecamatan ?>"> <?= $k->nama_kecamatan?> </option>
                            <?php }?>

                           
                          </select> -->
                        </div>
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
    const kecamatan = $(this).val();
    $.get("/antrian/home/nomor_antrian/"+loket, function(result){
        $("#nomor_antrian").text(result);
        $("#loket").text("Silahkan Ke Loket "+loket);
        $("#btn-ambil").attr("loket", loket);
        $("#btn-ambil").attr("kecamatan", kecamatan);
        $("#btn-ambil").attr("no_antrian", result);
        $(".jumbotron").show(1000);
    })
   })

   $("#btn-ambil").on("click", function(){
        const loket = $(this).attr("loket");
        const kecamatan = $(this).attr("kecamatan");
        const no_antrian = $(this).attr("no_antrian");

        $.get("/antrian/home/simpan_antrian/"+loket+"/"+kecamatan+"/"+no_antrian, function(){
            const no =parseInt($("#nomor_antrian").text())+1;
            $("#nomor_antrian").text(no);
            alert("Antrian Berhasil Di Ambil");
        });


   })
</script>