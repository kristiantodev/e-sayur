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
                                    <h3 class="page-title"><b><i class="fas fa-shopping-cart"></i>&nbsp; Keranjang Sayur (<?php echo $this->session->userdata('nm_user'); ?>)</b></h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Lapak Toko Sayur Mayur Om Hendrik</li>
                                    </ol>
            
                                    <div class="state-information d-none d-sm-block">                  
                                                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                           <div class="row">
                                <div class="col-12">
                            <div class="card m-b-20">
                                        <div class="card-body">
  <form action="<?php echo site_url('informasi/pembelian'); ?>" method="post">
            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                    <th width="9"><b>Pilih</b></th>
                                    <th><b>Nama Sayur</b></th>
                                    <th><b>Harga</b></th>
                                    <th><b>Qty</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($sayurku as $sayur): ?>
                                
                                <tr>
                                    <td width="7" align="center"><input type="checkbox" name="pilihanku[]" value="<?php echo $sayur->id_keranjang ?>" id="md_checkbox_<?php echo $no++; ?>" class="filled-in chk-col-navy"/></td>
                                    <td>&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('assets/images/sayur/'.$sayur->foto) ?>" alt="" class="thumb-md rounded-circle"> &nbsp;&nbsp;&nbsp;<?php echo $sayur->nm_sayur ?></td>
                                    <td>Rp. <?php echo $sayur->harga ?></td>
                                    <td><input type="number" name="qty[]" min="0" value="<?php echo $sayur->qty ?>"/></td>
                                    
                                </tr>
                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <p align="">
                                              <button type="submit"  class="btn btn-success">
                                    <i class="fas fa-money-bill-alt"></i>&nbsp; Checkout Pembelian
                                </button>
                                            </p>
                                            
                                          </form>
                                                
                                        </div>
                                    </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
    

        

                           
    
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->



 <!-- modal -->
<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
      <h5 class="modal-title"><font color='white'>Konfirmasi Penghapusan</font></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin akan menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
      <a type="button" class="btn btn-secondary" data-dismiss="modal"><font color='white'><i class="fas fa-times"></i>&nbsp;Batal</font></a>
      <a href="#" id="btn-delete" type="button" class="btn btn-danger mr-1"><i class="fas fa-trash"></i>&nbsp;Hapus</a>
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



                  