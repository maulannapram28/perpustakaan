<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $anggota->id_anggota ?>">
        <i class="fa fa-trash-o"></i>Hapus
</button>
<div class="modal fade" id="Delete<?php echo $anggota->id_anggota ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus data anggota: <?php echo $anggota->nama_anggota ?></h4>
            </div>
            <div class="modal-body">
               <p class="alert alert-danger"><i class="fa fa-warning"></i>yakin ingin mengahpus data ini?</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('admin/anggota/delete/'.$anggota->id_anggota) ?>" class="btn btn-danger">
                    <i class="fa fa-trash-o"></i> Hapus</a>

                    <a href="<?php echo base_url('admin/anggota/edit/'.$anggota->id_anggota) ?>" class="btn btn-warning">
                    <i class="fa fa-edit"></i> Edit</a>

                <button type="button" class="btn btn-success" data-dismiss="modal">
            <i class="fa fa-time"></i>Close</button>
            </div>
        </div>
    </div>
</div>
