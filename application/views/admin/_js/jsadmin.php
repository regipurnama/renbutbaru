<!-- Halaman Pemeliharaan  -->
<script type="text/javascript">
    var role = "<?= $profile->role ?>";
    //console.log(id_role);

    var dpttable="",dptable="",ptable="";
    var edit="";
    var idpermohonan="";
    $(document).ready(function(){
        $('#show_data_csv').DataTable( {
            'processing'	: true,
            //'serverSide'	: true,
            'pageLength' :10,
           
                     
        } );
          
        ptable = $('#PemeliharaanTable').DataTable( {
            'processing'	: true,
            //'serverSide'	: true,
            ajax:{
                url   : '<?php echo base_url('Pemeliharaan/data_pemeliharaan')?>',
                dataSrc : function(response){
                  var row = new Array();
                  //console.log(hitung);
                  var i = 1;
                  var hitung = response.data.length;
                    if (hitung>0) {
                      for(var x in response.data){
                        
                        var button = '<button onClick="BukaEdit('+response.data[x].id_pemeliharaan+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Data"><i class="fa fa-edit"></i></button> <button onClick="DeletePemeliharaan('+response.data[x].id_pemeliharaan+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></button>';
                        if(role=='Admin'){
                            button +='&nbsp<button onClick="BukaEdit('+response.data[x].id_pemeliharaan+')" name="btn_realisasi" class="btn btn-info btn-xs btn-flat" title="Realisasi"><i class="fa fa-edit"></i></button>';
                        }
                        row.push({
                          'no'                : i,
                          'unit_kerja'        : response.data[x].unit_kerja,
                          'kode_permohonan'     : response.data[x].kode_permohonan,
                          'tanggal_usulan'    : response.data[x].tgl_usulan,
                          'status_usulan'     : response.data[x].status,
                          'aksi'              : button
                        });
                        i = i + 1;
                      }
                              
                      response.data = row;
                      return row;
                    } else{
                      response.draw = 0;
                      return [];
                    }
                }
            },
            columns : [ 
              {'data': 'no'},
              {'data': 'kode_permohonan'},
              {'data': 'unit_kerja'},
              {'data': 'tanggal_usulan'},
              {'data': 'status_usulan','render' : 
                        function (data, type, full) {
                            var x;
                            if(full.status_usulan == 4){
                                x = "<span class='badge badge-dark'>Tidak Diakomodir</span>";
                                return x;
                            }else if(full.status_usulan == 3){
                                x = "<span class='badge badge-success'>Semua Diakomodir</span>";
                                return x; 

                            }else if(full.status_usulan == 2){
                                x = "<span class='badge badge-info'>Beberapa Diakomodir</span>";
                                return x; 

                            }else{
                                x = "<span class='badge badge-danger'>Belum Diakomodir</span>";
                                return x; 

                            }
                        }},
              {'data': 'aksi'}
              
             ],
                
        } );

        dpttable = $('#DetailpemeliharaantempTable').DataTable( {
            'processing'	: true,
            //'serverSide'	: true,
            ajax:{
                 url   : '<?php echo base_url('Pemeliharaan/data_temp_pemeliharaan')?>',
                dataSrc : function(response){
                  var row = new Array();
                  //console.log()
                  var i = 1;
                  var hitung = response.data.length;
                    if (hitung>0) {
                      for(var x in response.data){
                        var button = '<button onClick="Edittemp('+response.data[x].id_temp_pemeliharaan+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Data"><i class="fa fa-edit"></i></button> <button onClick="Deletetemp('+response.data[x].id_temp_pemeliharaan+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></button>';

                        row.push({
                          'no'                : i,
                          'nama_barang'       : response.data[x].nama_barang,
                          'kuantitas'         : response.data[x].kuantitas,
                          'satuan'            : response.data[x].satuan,
                          'aksi'              : button
                        });
                        i = i + 1;
                      }
                              
                      response.data = row;
                      return row;
                    } else{
                      response.draw = 0;
                      return [];
                    }
            }

                },
            columns : [ 
              {'data': 'no'},
              {'data': 'nama_barang'},
              {'data': 'kuantitas'},
              {'data': 'satuan'},
              {'data': 'aksi'}
              
             ],
                
        } );
        
       

    });            
     
     dptable = $('#DetailpemeliharaanTable').DataTable( {
     });
        
       

             
        
        
        //Detail Usulan 
        
        $('#btn-batal-pemeliharaan').on('click',function(){
            //$('#Modal_Konfirmasi').modal('show');
        });
        $('#btn-save-pemeliharaan').on('click',function(){

            //kondisi tambah ke Head and Detail
            // console.log("simpan semua");
            $.ajax({
                //type : "POST",
                url  : "<?php echo base_url('Pemeliharaan/save_pemeliharaan')?>",
                dataType : "JSON",
                
                success: function(response){
            //        console.log(response);
                        ptable.ajax.reload(null,false);
                    }, 
                    error: function(response){
                        console.log(response);
                    }
                });
                $('#Modal_Add').modal('hide');
                return false;
                

        });

        $('#btn-e-save-pemeliharaan').on('click',function(){

            //kondisi tambah ke Head and Detail
             console.log("simpan head setelah edit ");
            // $.ajax({
            //     //type : "POST",
            //     url  : "<?php echo base_url('Pemeliharaan/update_head_pemeliharaan')?>",
            //     dataType : "JSON",
                
            //     success: function(response){
            // //        console.log(response);
            //             ptable.ajax.reload(null,false);
            //         }, 
            //         error: function(response){
            //             console.log(response);
            //         }
            //     });
            //     $('#Modal_Add').modal('hide');
            //     return false;
                

        });
         //Save barang temp
            $('#form-tambah-barang').submit(function() {
                var data = $('#form-tambah-barang').serialize();
                    //kondisi add
            var tgl_usulan = $('#tgl_usulan').val();
            var nama_barang = $('#nama_barang').val();
            var kode_barang = $('#kode_barang').val();
            var unit_kerja = $('#unit_kerja').val();
            var kuantitas  = $('#kuantitas').val();
            var satuan  = $('#satuan').val();
            var keterangan  = $('#keterangan').val();
            if(edit){
                var id_temp  = $('#id_temp').val();
                //edit
                //console.log("saveedit");
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Pemeliharaan/update_temp_pemeliharaan')?>",
                    dataType : "JSON",
                    data : {nama_barang:nama_barang,
                            tgl_usulan:tgl_usulan, 
                            unit_kerja:unit_kerja, 
                            kuantitas:kuantitas,
                            satuan:satuan,
                            keterangan:keterangan,
                            id_temp:id_temp,
                            kode_barang:kode_barang},
                    success: function(response){
                        //console.log('masuk');
                        $('[name="kode_barang"]').val("");
                        $('[name="id_temp"]').val("");
                        $('[name="nama_barang"]').val("");
                        $('[name="kuantitas"]').val("");
                        $('[name="satuan"]').val("");
                        $('[name="keterangan"]').val("");
    //                    show_brg_pemeliharaan();
                        dpttable.ajax.reload(null,false);
                        
                        
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                    }
                });
                edit="";
                $('#btn_save_brg_temp_pemeliharaan').html("Tambah Barang");
                return false;
                

            }else{
                //tambah
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Pemeliharaan/save_temp_pemeliharaan')?>",
                    dataType : "JSON",
                    data : {nama_barang:nama_barang ,
                            tgl_usulan:tgl_usulan , 
                            unit_kerja:unit_kerja, 
                            kuantitas:kuantitas,
                            satuan:satuan,
                            keterangan:keterangan,
                            kode_barang:kode_barang},
                    success: function(response){
                        //console.log('masuk');
                        $('[name="kode_barang"]').val("");
                        $('[name="nama_barang"]').val("");
                        $('[name="kuantitas"]').val("");
                        $('[name="satuan"]').val("");
                        $('[name="keterangan"]').val("");
    //                    show_brg_pemeliharaan();
                        dpttable.ajax.reload(null,false);
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                    }
                });
                return false;
                
            }
        
            
                
            })

            //kondisi edit
            $('#form-edit-barang').submit(function() {
                var data = $('#form-edit-barang').serialize();
                    //kondisi add
                var tgl_usulan = $('#tgl_usulan').val();
                var nama_barang = $('#e_nama_barang').val();
                var unit_kerja = $('#e_unit_kerja').val();
                var kuantitas  = $('#e_kuantitas').val();
                var satuan  = $('#e_satuan').val();
                var keterangan  = $('#e_keterangan').val();
                var id_pemeliharaan  = $('#e_id_pemeliharaan').val();
                //console.log('e);
                //console.log(edit);
                if(edit){
                    var id_detail  = $('#e_id_detail').val();
                    //edit
                    //console.log(data);
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('Pemeliharaan/update_pemeliharaan')?>",
                        dataType : "JSON",
                        data : {nama_barang:nama_barang,
                                tgl_usulan:tgl_usulan, 
                                unit_kerja:unit_kerja, 
                                kuantitas:kuantitas,
                                satuan:satuan,
                                keterangan:keterangan,
                                id_detail:id_detail},
                        success: function(response){
                      //      console.log(response);
                            $('[name="e_id_detail"]').val("");
                            $('[name="e_nama_barang"]').val("");
                            $('[name="e_kuantitas"]').val("");
                            $('[name="e_satuan"]').val("");
                            $('[name="e_keterangan"]').val("");
                           
                            dptable.ajax.reload(null,false);
                            
                            
                            
                            //$('#Modal_Edit').modal('hide');
                        }, 
                        error: function(response){
                            console.log(response);
                        }
                    });
                    edit="";
                    $('#btn_save_brg_pemeliharaan').html("Tambah Barang");
                    return false;
                    

            }else{
                //tambah
                //console.log("tambah")
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Pemeliharaan/save_detail_pemeliharaan')?>",
                    dataType : "JSON",
                    data : {nama_barang:nama_barang ,
                            tgl_usulan:tgl_usulan , 
                            unit_kerja:unit_kerja, 
                            kuantitas:kuantitas,
                            satuan:satuan,
                            id_pemeliharaan:id_pemeliharaan,
                            keterangan:keterangan},
                    success: function(response){
                        //console.log('masuk');
                        $('[name="e_id_detail"]').val("");
                        $('[name="e_nama_barang"]').val("");
                        $('[name="e_kuantitas"]').val("");
                        $('[name="e_satuan"]').val("");
                        $('[name="e_keterangan"]').val("");
                        
                        dptable.ajax.reload(null,false);
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                    }
                });
                return false;
                
            }
        
            
                
            })

        
        //delete record to database
         $('#btn_delete').on('click',function(){
             var product_code = $('#product_code_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/delete')?>",
                dataType : "JSON",
                data : {product_code:product_code},
                success: function(data){
                    $('[name="product_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_product();
                }
            });
            return false;
        });
        
        //delete record to database
         $('#btn_hapus').on('click',function(){
             var id = $('#id_hapus').val();
            // console.log("id");
             //console.log(id);
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Pemeliharaan/deletedetail')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_hapus"]').val("");
                    
                }
            });
            $('#Modal_Delete').modal('hide');
            //$('#Modal_Edit').modal('show');
            dptable.ajax.reload(null,false);
            
            return false;
        });
        
        
        
        
        function Edittemp(x){
            edit="edit";
            var id = x;
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Pemeliharaan/get_id_temp')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            //console.log(data);
                            $('#kode_barang').val(data[0].kode_barang);
                            $('#nama_barang').val(data[0].nama_barang);
                            $('#id_temp').val(data[0].id_temp_pemeliharaan);
                            $('#kuantitas').val(data[0].kuantitas);
                            $('#satuan').val(data[0].satuan);
                            $('#keterangan').val(data[0].keterangan);
                            $('#btn_save_brg_temp_pemeliharaan').html("Ubah Barang");
    //              
                            
                        }
                    });
            return false;
        }
        
        function Deletetemp(x){
            // console.log(x);
            // console.log('Hapus');
            var id = x;
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Pemeliharaan/DeleteTemp')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            dpttable.ajax.reload(null,false);
                            
                        }
                    });
            return false;
    }
        function BukaEdit(x){

                var id = x;
                //dptable.ajax.reload(null,false);
                dptable.destroy();
                dptable = $('#DetailpemeliharaanTable').DataTable( {
                'processing'	: true,
                //'serverSide'	: true,
                ajax:{
                    type:"POST",
                    url   : '<?php echo base_url('Pemeliharaan/data_detail_pemeliharaan')?>',
                    data : {id:id},
                    dataSrc : function(response){
                        var row = new Array();
                        //console.log(response);
                        var i = 1;
                        var hitung = response.data.length;
                        if (hitung>0) {
                            for(var x in response.data){
                            var button = '<button onClick="EditPemeliharaan('+response.data[x].id_detail_pemeliharaan+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Data"><i class="fa fa-edit"></i></button> <button onClick="DeletePemeliharaan('+response.data[x].id_detail_pemeliharaan+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></button>';

                            row.push({
                                'no'                    : i,
                                'id_pemeliharaan'           : response.data[x].id_pemeliharaan,
                                'nama_barang'           : response.data[x].nama_pemeliharaan,
                                'kuantitas'             : response.data[x].kuantitas,
                                'satuan'                : response.data[x].satuan,
                                'unit_kerja'            : response.data[x].unit_kerja,
                                'kode_permohonan'       : response.data[x].kode_permohonan,
                                'aksi'                  : button
                            });
                            i = i + 1;
                            }

                            $('#p_kode_permohonan').html((response.data[x].kode_permohonan).toUpperCase());
                            $('#p_unit_kerja').html((response.data[x].unit_kerja).toUpperCase());
                            $('#e_id_pemeliharaan').val(response.data[x].id_pemeliharaan);
                            $('#e_tgl_usulan').val(response.data[x].tgl_usulan);
                            
            
                            response.data = row;
                            return row;
                        } else{
                            response.draw = 0;
                            return [];
                        }
                }

                    },
                columns : [ 
                    {'data': 'no'},
                    {'data': 'nama_barang'},
                    {'data': 'kuantitas'},
                    {'data': 'satuan'},
                    {'data': 'aksi'}
                    
                    ],
                
            } );
                
            $('#Modal_Edit').modal('show');
            //document.getElementById("unit_kerja").innerHTML="baru";                           

            //return false;
        }
        
        function EditPemeliharaan(x){
            var id = x;
            edit="edit";
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Pemeliharaan/get_id_detail')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            //console.log(data);
                            $('#e_nama_barang').val(data[0].nama_pemeliharaan);
                            $('#e_id_detail').val(data[0].id_detail_pemeliharaan);
                            $('#e_kuantitas').val(data[0].kuantitas);
                            $('#e_satuan').val(data[0].satuan);
                            $('#e_keterangan').val(data[0].keterangan);
                            $('#btn_save_brg_pemeliharaan').html("Ubah Barang");
    //              
                            
                        }
                    });
            return false;
    }
        function DeletePemeliharaan(x){
            $('#id_seksi').val(2);
            $('#id_hapus').val(x);
            $('#Modal_Delete').modal('show');
           
    }
 
</script>

<!-- AKHIR HALAMAN PEMELIHARAAN -->