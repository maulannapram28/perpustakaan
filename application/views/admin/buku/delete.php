<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $buku->id_buku ?>">
        <i class="fa fa-trash-o"></i>
</button>
<div class="modal fade" id="Delete<?php echo $buku->id_buku ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus data buku: <?php echo $buku->nama ?></h4>
            </div>
            <div class="modal-body">
               <p class="alert alert-danger"><i class="fa fa-warning"></i>yakin ingin mengahpus data ini?</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('admin/buku/delete/'.$buku->id_buku) ?>" class="btn btn-danger">
                    <i class="fa fa-trash-o"></i> Hapus</a>

                    <a href="<?php echo base_url('admin/buku/edit/'.$buku->id_buku) ?>" class="btn btn-warning">
                    <i class="fa fa-edit"></i> Edit</a>

                <button type="button" class="btn btn-success" data-dismiss="modal">
            <i class="fa fa-time"></i>Close</button>
            </div>
        </div>
    </div>
</div>
