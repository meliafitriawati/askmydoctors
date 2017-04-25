<style type="text/css">
	.detail-komentar{
		float: right;
		width: 88%;
		text-align: justify;
        margin-bottom: 5px;
        padding-bottom: 10px;
        border-bottom: 1px solid #efefef;
	}
    .tgl-holder {
        font-size: 12px;
        margin-bottom: 0px;
    }
    .action-holder{
        font-size: 12px;
    }
    
    .komentar-hold {
        padding: 0px;
        margin: 0px;
        line-height: 21px;
        width: 100%;
    }
    .action-placer {
        float: right;
    }
    .action-placer:hover{
        text-decoration: none;
    }
</style>


<?php
    if ($komentar != null) {
        foreach ($komentar->result() as $key) {
            $tanggal = $key->waktu_kirim;
            $tgl = date("d/m/Y h:i", strtotime($tanggal));
            $id = $key->id_komentar;
            echo "<div class='detail-komentar'>
                <p class='tumb-pertanyaan'><b>".$key->pengirim."</b></p>
                <p class='tgl-holder'>Dikirim pada ".$tgl."</p>
                <div class='komentar-hold'>".$key->komentar."</div>";
                if ($key->pengirim == $this->session->userdata('username')) {
                     echo "<div class='action-placer'>
                         <a class='action-holder' onclick='edit(".$id.")'>Edit</a> | 
                         <a class='action-holder' onclick='delete_comment(".$id.")'>Hapus</a>
                     </div>";
                }
            echo "</div>";

        }
    }
?>

<script type="text/javascript">
    function delete_comment(id_kom)
    {
      if(confirm('Apakah anda yakin menghapus komentar ini?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo base_url(); ?>pertanyaan/deletekomentar/"+id_kom,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
      }
    }
</script>