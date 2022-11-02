<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>
<link href="<?php echo base_url();?>assets/style.css" rel="stylesheet" />
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
      
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h3 class="page-title"><b><i class="fas fa-folder-open"></i>&nbsp; Laporan Penjualan</b></h3>
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
                                          <div id="box"> 
                                             <center><h4>LAPORAN PENJUALAN SAYUR <br> Lapak Toko Sayur Mayur Om Hendrik - Jakarta<br></h4></center><br>
            <table class="table" border="1" style="border-collapse: collapse; border-spacing: 1; width: 100%;">
                                                <thead>
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Nama Pembeli</b></th>
                                    <th><b>Tanggal Transaksi</b></th>
                                    <th><b>Sayur yang dibeli</b></th>
                                    <th><b>Total</b></th>
                                    <th><b>Status</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
           <?php $no=1; foreach ($transaksiku as $t): ?>

           <?php
              $listSayur = $this->db->query("SELECT*FROM keranjang LEFT JOIN sayur ON sayur.id_sayur=keranjang.id_sayur WHERE keranjang.status=2 AND id_transaksi='$t->id_transaksi' AND keranjang.deleted=0")->result();
            ?>
                 
                                
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td><?php echo $t->nm_user ?></td>
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
                                            $remark="Terbayar";
                                      }else if($t->status == 2){
                                            $icon="fas fa-check";
                                            $btn="btn btn-success btn-sm";
                                            $remark="Terkonfirmasi";
                                      }
                                       ?>
                                       <button class="<?=$btn?>"><i class="<?=$icon?>"></i> &nbsp;<?=$remark?></span></button>
                                    </td>
                                    
                                </tr>
                
            <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                          </div>
                                          <a href="javascript:printDiv('box');">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-print"></i> &nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;</button>
                                </a>
                                        </div>
                                    </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->                  