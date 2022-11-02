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
                                    <h3 class="page-title"><b><i class="fas fa-shopping-bag"></i>&nbsp; Riwayat Pembelian (<?php echo $this->session->userdata('nm_user'); ?>)</b></h3>
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
            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Tanggal Transaksi</b></th>
                                    <th><b>Sayur yang dibeli</b></th>
                                    <th><b>Total</b></th>
                                    <th><b>Status</b></th>
                                    <th><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
           <?php $no=1; foreach ($transaksiku as $t): ?>

           <?php
              $listSayur = $this->db->query("SELECT*FROM keranjang LEFT JOIN sayur ON sayur.id_sayur=keranjang.id_sayur WHERE keranjang.status=2 AND id_transaksi='$t->id_transaksi' AND keranjang.deleted=0")->result();
            ?>
                 
                                
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td><?php echo $t->tgl_transaksi ?></td>
                                    <td>
                                       <?php foreach ($listSayur  as $s): ?>
                                          <ul>
                                          <li><?php echo $s->nm_sayur ?> | Qty : <?php echo $s->qty ?> | Rp. <?php echo $s->harga ?> </li>
                                          </ul>
                                       <?php endforeach; ?>
                                    </td>
                                    <td align="center">Rp. <?php echo $t->total ?></td>
                                    <td align="center">
                                      
                                      <?php 
                                         $icon="";
                                            $btn="";
                                            $remark="";
                                    if($t->status == 0){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-info btn-sm";
                                            $remark="New";
                                      }else if($t->status == 1){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-warning btn-sm";
                                            $remark="Proses";
                                      }else if($t->status == 2){
                                            $icon="fas fa-check";
                                            $btn="btn btn-warning btn-sm";
                                            $remark="Terkonfirmasi";
                                      }
                                       ?>
                                       <button class="<?=$btn?>"><i class="<?=$icon?>"></i> &nbsp;<?=$remark?></span></button>
                                    </td>
                                    <td>
                                      <?php
                                           if($t->status == 0){
                                       ?>
                                       <a data-toggle="modal" data-target="#bb-bayar<?php echo $t->id_transaksi ?>" class="btn btn-success waves-effect waves-light"><font color="white"><i class="fas fa-upload"></i> Pembayaran</font></a>

                                        <?php
                                           }
                                       ?>

                                       <?php
                                           if($t->status == 1 || $t->status == 2){
                                       ?>
                                       <a data-toggle="modal" data-target="#bb-see<?php echo $t->id_transaksi ?>" class="btn btn-success waves-effect waves-light"><font color="white"><i class="fas fa-folder-open"></i>&nbsp; Bukti Bayar</font></a>
                                       
                                        <?php
                                           }
                                       ?>
                                      
                                    </td>
                                </tr>
                
            <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
    

        

                           
    
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->



      <?php $no=1; foreach ($transaksiku as $t): ?>
                  <div class="modal fade text-left" id="bb-bayar<?=$t->id_transaksi?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-success">
                      <h6 class="modal-title"><font color='white'>Upload Bukti Pembayaran</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('informasi/pembayaran'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_transaksi" value="<?=$t->id_transaksi?>">
                      <div class="modal-body">
                       
                       <fieldset class="form-group floating-label-form-group">
                          <label for="email">Upload Bukti Pembayaran *pdf</label>
                          <input type="file" name="file_pembayaran" class="form-control">
                        </fieldset>
                         
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-success">
                                    <i class="fa fa-upload"></i>&nbsp;Upload
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>

                  <?php endforeach; ?>

                 <?php $no=1; foreach ($transaksiku as $t): ?>
                  <div class="modal fade text-left" id="bb-see<?=$t->id_transaksi?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-success">
                      <h6 class="modal-title"><font color='white'>Bukti Pembayaran</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      
                      <div class="modal-body">
              
                         <?php if ($t->file_pembayaran == "default.png") { ?>
              <center>
            <img src="<?php echo base_url('assets/images/bukti/'.$t->file_pembayaran) ?>" height="450"><br>Tidak ada file pembayaran yang dilampirkan</center>
            <?php }else{ ?>
<embed src="<?php echo base_url('assets/images/bukti/'.$t->file_pembayaran) ?>" width="750px" height="450px" />
             <?php }?> 

                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary mr-1"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                      </div>
                    </div>
                    </div>
                  </div>

                  <?php endforeach; ?>