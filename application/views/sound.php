
<h1>
Sound</h1>
<table border="1" celspacing='100'>
<tr>
        <td>Judul</td>
        <td>Sound</td>
        <td>Keterangan</td>
    </tr>
<?php foreach($sounds as $so => $val){   ?>
<tr>
        <td><?php echo $val->judul; ?></td>
        <td>
            <audio controls>
                <source src="<?php echo base_url(),'/asset/sound/'.$val->sound;?>" type="audio/mpeg">
                <embed height="50" width="100" src="<?php echo base_url(),'/asset/sound/'.$val->sound;?>">
            </audio>

        </td>
        <td><?php echo $val->keterangan; ?></td>


    </tr>
<?php } ?>
</table>
