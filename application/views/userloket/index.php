<script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<div class="col-lg-5">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>LOKET 1</h5>
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
                          <label for="sel1">LOKET 1</label>

                         <center><a loket="" kecamatan ="" target="_blank" href="display" no_antrian="" id="btn-ambil" class="btn btn-primary">MULAI</a></center>

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

<div class="col-lg-5">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>LOKET 2</h5>
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
                          <label for="sel1">LOKET 2</label>
                           <center><button loket="" kecamatan ="" no_antrian="" id="btn-ambil" class="btn btn-primary">MULAI</button></center>
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
<div class="col-lg-5">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>LOKET 3</h5>
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
                          <label for="sel1">LOKET 3</label>
                           <center><button loket="" kecamatan ="" no_antrian="" id="btn-ambil" class="btn btn-primary">MULAI</button></center>
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
<div class="col-lg-5">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>LOKET 4</h5>
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
                          <label for="sel1">LOKET 4</label>
                           <center><button loket="" kecamatan ="" no_antrian="" id="btn-ambil" class="btn btn-primary">MULAI</button></center>
                         
                        </div>
                    </div>
        </div>

        </div>
    </div>
</div>
<div class="col-lg-5">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>LOKET 5</h5>
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
                          <label for="sel1">LOKET 5</label>
                           <center><button loket="" kecamatan ="" no_antrian="" id="btn-ambil" class="btn btn-primary">MULAI</button></center>
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