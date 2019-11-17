<h3>
Input Sound</h3>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart("sound/isound"); ?>
<table>
<tr>
        <td>Judul</td><td>:</td><td><input type="text" name="judul" /></td>
    </tr>
<tr>
        <td>Sound</td><td>:</td><td><input type="file" name="sound" /></td>
    </tr>
<tr>
        <td>Keterangan</td><td>:</td><td><textarea name="keterangan"></textarea></td>
    </tr>
<tr>
        <td></td><td></td><td><input type="submit" value="Simpan" /><input type="reset" value="Clear" /></td>
    </tr>
</table>
<?php echo form_close();?>



