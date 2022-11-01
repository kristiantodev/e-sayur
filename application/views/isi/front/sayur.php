<link href="<?php echo base_url();?>assets/style.css" rel="stylesheet" />
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">

                                    <h3 class="page-title"><b><i class="fas fa-box-open"></i>&nbsp; 
                                        Sayur Mayur Segarrr
                                    </b></h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Lapak Toko Sayur Mayur Om Hendrik</li>
                                    </ol>
            
                                    <div class="state-information d-none d-sm-block">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">

                            <div class="row">

                              <?php $no=1; foreach ($sayurku as $sayur): ?>
                                <input type="hidden" readonly value="<?=$sayur->id_sayur;?>" name="id_sayur" class="form-control" >
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <!-- Simple card -->
                                    <div class="card m-b-30">
                                        <img class="card-img-top" src="<?php echo base_url('assets/images/sayur/'.$sayur->foto) ?>" height="150" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title font-16 mt-0"><?php echo $sayur->nm_sayur ?> <span class="badge badge-pill badge-success noti-icon-badge">Rp. <?php echo $sayur->harga ?></span></h4>
                                            <p class="card-text"><?php echo $sayur->keterangan ?></p>
                                                <center>
                                                  <span class="btn btn-info waves-effect waves-light"><i class="fas fa-info-circle"></i> <?php echo $sayur->nm_kategori ?></span>

                                                  <a onclick="deleteConfirm('<?php echo site_url('informasi/keranjang/'.$sayur->id_sayur); ?>')" href="#!" class="btn btn-success waves-effect waves-light"><span class="icon-label" data-toggle="modal" data-target="#modal-danger"><i class="fas fa-cart-arrow-down "></i> Beli </span></a>

                                            </center>
                                        </div>
                                    </div>

            
                                </div><!-- end col -->
                                <?php endforeach; ?>


            
                                
                            </div>
                            <!-- end row -->
            
                            
                            
            
            
                           
                            <!-- end row -->
            
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                 <!-- modal -->
<div class="modal modal-success fade" id="modal-danger">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
      <h5 class="modal-title"><font color='white'>Masukan ke Keranjang</font></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin memasukan sayur ini ke keranjang ?</p>
      </div>
      <div class="modal-footer">
      <a type="button" class="btn btn-secondary" data-dismiss="modal"><font color='white'><i class="fas fa-times"></i>&nbsp;Batal</font></a>
      <a href="#" id="btn-delete" type="button" class="btn btn-success mr-1"><i class="fas fa-cart-arrow-down"></i>&nbsp;Masukan Keranjang</a>
      </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<script>
function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>
