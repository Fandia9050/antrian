<div class="ibox ">
    <div class="ibox-title">
        <h5>LOGIN</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <?= validation_errors('<div class="text-danger">', '</div>');?>
        <?= form_open($data['action']); ?>

        <div class="form-group">
            <?= form_input($data['username']);?>
        </div>

        <div class="form-group">
            <?= form_input($data['password']);?>
        </div>

        <?= form_submit('submit', 'LOGIN', ['class' => 'btn btn-primary']);?>

    </div>
</div>
