<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data PLN
                            </h2>
                            <a href="<?=base_url()?>app/data/exportToExcel" style="margin-top:12px;" id="btnExcel" class="btn btn-success">Export to Excel</a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <!-- <table class="table table-bordered dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th rowspan="3">NO</th>
                                            <th rowspan="3">NO.BA</th>
                                            <th rowspan="3">HARI/TANGGAL</th>
                                            <th rowspan="3">IDPEL</th>
                                            <th rowspan="3">NAMA</th>
                                            <th rowspan="3">ALAMAT</th>
                                            <th rowspan="3">TARIF/DAYA</th>
                                            <th colspan="9">Sebelum</th>
                                            <th colspan="9">Sesudah</th>
                                            <th rowspan="3">Petugas</th>
                                            <th rowspan="3">Keterangan</th>
                                        </tr>
                                        <tr>
                                            <th colspan="7">kWh Meter Lama</th>
                                            <th colspan="2">MCB Lama</th>
                                            <th colspan="7">kWh Meter Baru</th>
                                            <th colspan="2">MCB Baru</th>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <th>No</th>
                                            <th>Teg</th>
                                            <th>Arus</th>
                                            <th>Class</th>
                                            <th>Tahun</th>
                                            <th>Stand</th>
                                            <th>Kapasitas</th>
                                            <th>Merk</th>
                                            <th>Type</th>
                                            <th>No</th>
                                            <th>Teg</th>
                                            <th>Arus</th>
                                            <th>Class</th>
                                            <th>Total</th>
                                            <th>kVaRh</th>
                                            <th>Kapasitas</th>
                                            <th>Merk</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                    </tbody>
                                </table> -->
                                <table id="toExcel">
                                    <thead>
                                        <tr>
                                            <th rowspan="3">NO</th>
                                            <th rowspan="3">NO.BA</th>
                                            <th rowspan="3">HARI/TANGGAL</th>
                                            <th rowspan="3">IDPEL</th>
                                            <th rowspan="3">NAMA</th>
                                            <th rowspan="3">ALAMAT</th>
                                            <th rowspan="3">TARIF/DAYA</th>
                                            <th colspan="9">Sebelum</th>
                                            <th colspan="9">Sesudah</th>
                                            <th rowspan="3">Petugas</th>
                                            <th rowspan="3">Foto Sebelum</th>
                                            <th rowspan="3">Foto Setelah</th>
                                            <th rowspan="3">Keterangan</th>
                                        </tr>
                                        <tr>
                                            <th colspan="7">kWh Meter Lama</th>
                                            <th colspan="2">MCB Lama</th>
                                            <th colspan="7">kWh Meter Baru</th>
                                            <th colspan="2">MCB Baru</th>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <th>No</th>
                                            <th>Teg</th>
                                            <th>Arus</th>
                                            <th>Class</th>
                                            <th>Tahun</th>
                                            <th>Stand</th>
                                            <th>Kapasitas</th>
                                            <th>Merk</th>
                                            <th>Type</th>
                                            <th>No</th>
                                            <th>Teg</th>
                                            <th>Arus</th>
                                            <th>Class</th>
                                            <th>Tahun</th>
                                            <th>Stand</th>
                                            <th>Kapasitas</th>
                                            <th>Merk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            foreach($data as $dt){
                                        ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?=$dt['no_ba']?></td>
                                            <td><?=$dt['hari_tgl']?></td>
                                            <td><?=$dt['id_pel']?></td>
                                            <td><?=$dt['nama_pel']?></td>
                                            <td><?=$dt['alamat']?></td>
                                            <td><?=$dt['tarif']?></td>
                                            <td><?=$dt['type_kwh_lama']?></td>
                                            <td><?=$dt['no_kwh_lama']?></td>
                                            <td><?=$dt['teg_kwh_lama']?></td>
                                            <td><?=$dt['arus_kwh_lama']?></td>
                                            <td><?=$dt['class_kwh_lama']?></td>
                                            <td><?=$dt['thn_kwh_lama']?></td>
                                            <td><?=$dt['stand_kwh_lama']?></td>
                                            <td><?=$dt['kap_mcb_lama']?></td>
                                            <td><?=$dt['merk_mcb_lama']?></td>
                                            <td><?=$dt['type_kwh_baru']?></td>
                                            <td><?=$dt['no_kwh_baru']?></td>
                                            <td><?=$dt['teg_kwh_baru']?></td>
                                            <td><?=$dt['arus_kwh_baru']?></td>
                                            <td><?=$dt['class_kwh_baru']?></td>
                                            <td><?=$dt['total_kwh_baru']?></td>
                                            <td><?=$dt['kvarh_kwh_baru']?></td>
                                            <td><?=$dt['kap_mcb_baru']?></td>
                                            <td><?=$dt['merk_mcb_baru']?></td>
                                            <td><?=$dt['nama']?></td>
                                            <td><img src="<?=base_url()?>assets/photo/<?=$dt['foto']?>" width="120px" alt=""></td>
                                            <td><img src="<?=base_url()?>assets/photo/<?=$dt['foto_setelah']?>" width="120px" alt=""></td>
                                            <td><?=$dt['keterangan']?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
<script type="text/javascript">
    // $("#btnExcel").click(function (){
    //     XLExport("toExcel");
    // });
    // function XLExport(tableId) {
    //     var tab_text = "<table border='2px'><tr>";
    //     var textRange;
    //     var j = 0;
    //     tab = document.getElementById(tableId);
    //     for (j = 0 ; j < tab.rows.length ; j++) {
    //         tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
    //     }
    //     tab_text = tab_text + "</table>";
    //     tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    //     // tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
    //     tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // remove input params
    //     sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
    //     return (sa);
    // }
</script>