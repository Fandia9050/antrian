<div class="ibox ">
    <div class="ibox-title">
        <h5>Register</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <?= validation_errors('<div class="text-danger">', '</div>');?>
        <?= form_open($data['action']); ?>

        <div class="form-group" >
            <?= form_input($data['username']);?>
        </div>

        <div class="form-group">
            <?= form_input($data['password']);?>
        </div>

        <div class="form-group">
            <?= form_input($data['nama']);?>
        </div>

        <div class="form-group">
            <?= form_input($data['email']);?>
        </div>

        <div class="form-group">
            <?= form_input($data['foto']);?>
        </div>

        <div class="form-group">
            <?= form_input($data['notelp']);?>
        </div>

        <div class="form-group">
            <?= form_input($data['alamat']);?>
        </div>

        <div class="form-group">
            <?= form_input($data['status']);?>
        </div>

        <?= form_submit('submit', 'Register', ['class' => 'btn btn-primary']);?>

    </div>
</div>
