

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
                                <h3 class="page-title"><b><i class='fas fa-chart-line'></i>&nbsp;Selamat Datang di Penjualan E-Sayur</b></h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Toko Lapak Sayur Om Hendrik</li>
                                    </ol>
               
                                    
                                </div>
                            </div>
                        </div>
                       
                        <div class="page-content-wrapper">
                            <div class="row">
             <div class="col-xl-4 col-md-6">
                                    <div class="card bg-primary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h6 class="verti-label text-white-50">E-Sayur</h6>
                                                <div class="text-white">
                                                    <h6 class="mt-0 text-white-50"><a href='<?php echo site_url();?>adm/alumni' class="text-white">Total</a></h6>
                                                    <h4 class="mb-3 mt-0"><b> 
                                                    <?php $array = array('deleted' => 0);
  echo $total = $this->db->where($array)->count_all_results('sayur');?> Distributor</b></h4>
                                                    
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="fas fa-dolly display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-primary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h6 class="verti-label text-white-50">E-Sayur</h6>
                                                <div class="text-white">
                                                    <h6 class="mt-0 text-white-50"><a href='<?php echo site_url();?>adm/alumni' class="text-white">Total</a></h6>
                                                    <h4 class="mb-3 mt-0"><b> 
                                                    <?php $array = array('deleted' => 0);
  echo $total = $this->db->where($array)->count_all_results('sayur');?> Lokasi</b></h4>
                                                    
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="fas fa-map-marker-alt display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
     

                                <div class="col-xl-4 col-md-6">
                                    <div class="card bg-primary mini-stat position-relative">
                                        <div class="card-body">
                                            <div class="mini-stat-desc">
                                                <h6 class="verti-label text-white-50">E-Sayur</h6>
                                                <div class="text-white">
                                                    <h6 class="mt-0 text-white-50"><a href="" class="text-white">Total</a></h6>
                                                    <h4 class="mb-3 mt-0"><b>
                                                    <?php $array = array('deleted' => 0);
  echo $total = $this->db->where($array)->count_all_results('sayur');?> Bahan Pokok</b></h4>
                                                    
                                                </div>
                                                <div class="mini-stat-icon">
                                                    <i class="fas fa-box-open display-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                   
                            </div>
                            <!-- end row -->

                           <div class="row">
                                <!-- <div class="col-xl-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
            
                                            <center><h4 class="mt-0 header-title"><b>Harga Bahan Pokok Tertinggi</b></h4></center>
            
                                                        
                                            <canvas id="pokok_8" height="200"></canvas>
            
                                        </div>
                                    </div>
                                </div> -->
            
                                
                            </div> 

                            
                               
                            


                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->
               
   <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
                <!-- ChartJS -->
    <script src="<?php echo base_url();?>assets/Chart.min.js"></script>
    <!-- Superieur Admin for Chart purposes -->
    <script src="<?php echo base_url();?>assets/widget-charts2.js"></script>
    <script>
    
$(function () {

'use strict';

    if( $('#pokok_8').length > 0 ){
		var ctx2 = document.getElementById("pokok_8").getContext("2d");
		var data2 = {
			labels: [
                <?php foreach ($grafik as $grafik2): ?>
          "<?php echo $grafik2['nm_bahan']; ?> - <?php echo $grafik2['nm_lokasi']; ?>",
         <?php endforeach; ?>
            ],
			datasets: [
			{
				label: "Harga Rp",
				backgroundColor: "#05b085",
				borderColor: "#05b085",
				data: [
                    <?php foreach ($grafik as $grafik4): ?>
                    <?php echo $grafik4['harga'] ?>,

                    <?php endforeach; ?>
                ]
			}
			]
		};
		
		var hBar = new Chart(ctx2, {
			type:"bar",
			data:data2,
			
			options: {
				tooltips: {
					mode:"label"
				},
				scales: {
					yAxes: [{
						stacked: true,
						gridLines: {
							color: "rgba(135,135,135,0)",
						},
						ticks: {
							fontFamily: "Poppins",
							fontColor:"#878787"
						}
					}],
					xAxes: [{
						stacked: true,
						gridLines: {
							color: "rgba(135,135,135,0)",
						},
						ticks: {
							fontFamily: "Poppins",
							fontColor:"#878787"
						}
					}],
					
				},
				elements:{
					point: {
						hitRadius:40
					}
				},
				animation: {
					duration:	3000
				},
				responsive: true,
				maintainAspectRatio:false,
				legend: {
					display: false,
				},
				
				tooltip: {
					backgroundColor:'rgba(33,33,33,1)',
					cornerRadius:0,
					footerFontFamily:"'Poppins'"
				}
				
			}
		});
	}
    

  }); // End of use strict
    </script>        