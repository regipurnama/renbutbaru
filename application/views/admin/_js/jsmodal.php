<!-- Halaman Modal  -->
<script type="text/javascript">
    var role = "<?= $profile->role ?>";
    var unit_kerja = "<?= $profile->unit_kerja ?>";
    var id_user = "<?= $profile->id_user ?>";
    //console.log(id_role);

    var dpttable="",dptable="",ptable="";
    var edit="";
    var idpermohonan="";
    var rupiah = document.getElementById("hs");
    var e_rupiah = document.getElementById("ehs");

    $(document).ready(function(){
            rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });
        
        //$('#id_program').select2({tags: true, 'width': 50%});
        $('#id_program').select2({'width': '-webkit-fill-available'});
        $('#id_kegiatan').select2({'width': '-webkit-fill-available'});
        $('#id_subkegiatan').select2({'width': '-webkit-fill-available'});
        $('#id_uraian').select2({'width': '-webkit-fill-available'});
        $('#sumber_dana').select2({'width': '-webkit-fill-available'});
        $('#prioritas').select2({'width': '-webkit-fill-available'});
        
        $('#id_tipe_barang').select2({'width': '-webkit-fill-available'});
        $('#id_jenis_barang').select2({'width': '-webkit-fill-available'});
        
        //$('#id_subkegiatan').select2({'width': '-webkit-fill-available'});
        //$('#id_subkegiatan').select2({'width': '-webkit-fill-available'});
        $('#p_unit_kerja').html((unit_kerja).toUpperCase());
                          
        
        ambilprogram();
        ambiluraian();


        ambiltipebarang();
        ambiljenisbarang();
        
            
        
          
        ptable = $('#PengadaanTable').DataTable( {
            'processing'	: true,
            'scrollX'   :true,
        
            //'serverSide'	: true,
            ajax:{
                url   : '<?php echo base_url('Modal/data_Pengadaan')?>',
                dataSrc : function(response){
                  var row = new Array();
                  //console.log(hitung);
                  var i = 1;
                  var hitung = response.data.length;
                    if (hitung>0) {
                      for(var x in response.data){
                        // <button onClick="DeletePengadaan('+response.data[x].id_pengadaan+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></button><button onClick="KirimPersetujuan('+response.data[x].id_pengadaan+')" name="btn_validasi" class="btn btn-info btn-xs btn-flat" title="Kirim Ke RTP"><i class="fa fa-share-square" aria-hidden="true"></i></button> 
                        if(response.data[x].status == 1){
                            var link = response.data[x].id_pengadaan;
                            // button = '<a href="<?php base_url();?>CetakUsulan/'+link+'" name="btn_cetak" class="btn btn-success btn-xs btn-flat"  title="Cetak Data"><i class="fas fa-print"></i></a>';
                            //  || id_user ==16
                            // if(role == 'Admin'){
                                button = '<button onClick="BukaEdit('+response.data[x].id_pengadaan+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Data"><i class="fa fa-edit"></i></button> <a href="<?php base_url();?>CetakUsulan/'+link+'" name="btn_cetak" class="btn btn-success btn-xs btn-flat"  title="Cetak Data"><i class="fas fa-download"></i></a>';
                            // }else{
                                // button = '<a href="<?php base_url();?>CetakUsulan/'+link+'" name="btn_cetak" class="btn btn-success btn-xs btn-flat"  title="Cetak Data"><i class="fas fa-print"></i></a>';

                            // }
                           
                        }else if(response.data[x].status == 2){
                            button = '<button onClick="BukaEdit('+response.data[x].id_pengadaan+')" name="btn_info" class="btn btn-info btn-xs btn-flat" title="Info"><i class="fas fa-info-circle"></i></button>';
                            if(role=='Admin'){
                                button +='&nbsp<button onClick="BukaPersetujuan('+response.data[x].id_pengadaan+')" name="btn_persetujuan" class="btn btn-info btn-xs btn-flat" title="Halaman Persetujuan"><i class="fas fa-tasks"></i></button>';
                            }   
                        }
                        row.push({
                          'no'                : i,
                          'unit_kerja'        : response.data[x].unit_kerja,
                          'kode_pengadaan'     : response.data[x].kode_pengadaan,
                          'tanggal_usulan'    : response.data[x].tgl_usulan,
                          'jumlah_usulan'    : response.data[x].jumlah_usulan,
                          'total_anggaran'    : response.data[x].total_anggaran,
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
            //   {'data': 'kode_pengadaan'},
              {'data': 'unit_kerja'},
            //   {'data': 'tanggal_usulan'},
              {'data': 'jumlah_usulan'},
              {'data': 'total_anggaran','render': 
                function (data, type, full) {
                    return "Rp " + commaSeparateNumber(full.total_anggaran);
                }
              },
              {'data': 'status_usulan','render' : 
                function (data, type, full) {
                            var x;
                            if(full.status_usulan == 4){
                                x = "<span class='badge badge-dark'>Tidak Diakomodir</span>";
                                return x;
                            }else if(full.status_usulan == 3){
                                x = "<span class='badge badge-info'>Sudah Dikirim ke Perencanaan</span>";
                                return x; 

                            }else if(full.status_usulan == 2){
                                x = "<span class='badge badge-info'>Sudah Dikirim ke RTP</span>";
                                return x; 

                            }else{
                                x = "<span class='badge badge-warning'>Usulan Belum Valid</span>";
                                return x; 

                            }
                        }},
              {'data': 'aksi'}
              
             ],
             columnDefs: [ 
                    {  targets: 0, width: '5%' }, 
                    {  targets: 1, width: '15%' }, 
                    {  targets: 2, width: '15%' },                   
                    {  targets: 3, width: '10%' }, 
                    {  targets: 4, width: '5%' }, 
                    {  targets: 5, width: '15%' }, 
                    // {  targets: 6, width: '15%' },
                    // {  targets: 7, width: '15%' } 
             
                 ] ,
                 footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(), data;
            
                        // // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
        
                    // Total over all pages
                    // console.log(api.column(7).data());
                    total = api
                    .column(3)
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                    // console.log(total);
                    
                    // Total over this page
                    pageTotal = api
                    .column(3, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                     console.log(pageTotal);
        
                    // Update footer
                    $('#totalmodal').html(
                        'Rp '+ commaSeparateNumber(total)
                    );
                }
                
        } );

        dpttable = $('#DetailPengadaantempTable').DataTable( {
            'processing'	: true,
            'sScrollX'      : '100%',
            //'serverSide'	: true,
            ajax:{
                 url   : '<?php echo base_url('Modal/data_temp_pengadaan')?>',
                dataSrc : function(response){
                  var row = new Array();
                  //console.log()
                  var i = 1;
                  var hitung = response.data.length;
                    if (hitung>0) {
                      for(var x in response.data){
                        var button = '<button onClick="Edittemp('+response.data[x].id_temp_pengadaan+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Data"><i class="fa fa-edit"></i></button> <button onClick="Deletetemp('+response.data[x].id_temp_pengadaan+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></button>';
                        var download = response.data[x].nama_file +'<a href="../uploadfile/'+response.data[x].nama_file+'" name="btn_download" class="btn btn-primary btn-xs btn-flat" title="Download Dokumen">Download Dokumen <i class="fa fa-download"></i></a>';
                        row.push({
                          'no'                : i,
                          'kodering_program'       : response.data[x].kodering_program,
                          'nama_program'       : response.data[x].nama_program,
                          'kodering_kegiatan'       : response.data[x].kodering_kegiatan,
                          'nama_kegiatan'       : response.data[x].nama_kegiatan,
                          'kodering_subkegiatan'       : response.data[x].kodering_subkegiatan,
                          'nama_subkegiatan'       : response.data[x].nama_subkegiatan,
                          'kodering_uraian'       : response.data[x].kodering_uraian,
                          'nama_uraian'       : response.data[x].nama_uraian,
                          'nama_barang'       : response.data[x].nama_barang,
                          'nama_jenis_barang'       : response.data[x].nama_jenis_barang,
                          'nama_tipe_barang'       : response.data[x].nama_tipe_barang,
                          'spesifikasi'       : response.data[x].spesifikasi,
                          'catatan'       : response.data[x].catatan,
                          'sumber_dana'       : response.data[x].sumber_dana,
                          'prioritas'       : response.data[x].prioritas,
                          'kuantitas'         : response.data[x].kuantitas,
                          'satuan'            : response.data[x].satuan,
                          'harga_satuan'            : response.data[x].harga_satuan,
                          'total_harga'            : response.data[x].total_harga,
                          'nama_file'            : download,
                          'aksi'              : button,
                          'nomen_program'         : response.data[x].kodering_program+' '+ response.data[x].nama_program,
                          'nomen_kegiatan'        : response.data[x].kodering_kegiatan+' '+ response.data[x].nama_kegiatan,
                          'nomen_subkegiatan'     : response.data[x].kodering_subkegiatan+' '+ response.data[x].nama_subkegiatan,
                          'nomen_uraian'         : response.data[x].kodering_uraian+' '+ response.data[x].nama_uraian,
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
              {'data': 'nomen_program'},
              {'data': 'nomen_kegiatan'},
              {'data': 'nomen_subkegiatan'},
              {'data': 'nomen_uraian'},
              {'data': 'nama_barang','render':
                  function (data, type, full) {
                    return "<p> "+full.nama_barang +"<br> Spesifikasi : "+ full.spesifikasi+"<br> Tipe Barang : "+ full.nama_tipe_barang + "<br> Jenis Barang : "+ full.nama_jenis_barang;
                }
              
              },
              {'data': 'volume', 'render':
                function (data, type, full) {
                    return full.kuantitas +' '+ full.satuan;
                }
              
              },
              {'data': 'harga', 'render': 
                function (data, type, full) {
                    return "Sumber Dana : "+full.sumber_dana.toUpperCase()+"<br>Harga Satuan : "+commaSeparateNumber(full.harga_satuan)+"<br><b>Harga Total: "+ commaSeparateNumber(full.total_harga) +"</b><p>";

                }
            },
              {'data': 'total_harga', 'render': 
                function (data, type, full) {
                        return full.total_harga;
                }  
              },
              {'data': 'prioritas'},
              {'data': 'catatan'},
              {'data': 'nama_file'},
              {'data': 'aksi'}
              
             ],
             order: [[0, 'asc'],[1, 'asc'],[2, 'asc'],[3, 'asc']],
             rowGroup: {
                dataSrc: [ 'nomen_program', 'nomen_kegiatan', 'nomen_subkegiatan', 'nomen_uraian' ]
                },
                columnDefs: [ 
                    {targets: [0,1,2,3,7], visible: false},   
                      // {  targets: 0, width: '20%' }, 
                    // {  targets: 1, width: '20%' }, 
                    // {  targets: 2, width: '20%' }, 
                    // {  targets: 3, width: '20%' },                
                    {  targets: 4, width: '35%' }, 
                    {  targets: 5, width: '15%' }, 
                    {  targets: 6, width: '20%' }, 
                    {  targets: 8, width: '5%' }, 
                    {  targets: 9, width: '15%' }, 
                    {  targets: 10, width: '15%' }, 
                    {  targets: 11, width: '15%' } 
                
                 ] ,
                 footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(), data;
            
                        // // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
        
                    // Total over all pages
                    // console.log(api.column(7).data());
                    total = api
                    .column(7)
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                    // console.log(total);
                    
                    // Total over this page
                    pageTotal = api
                    .column(7, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                     console.log(pageTotal);
        
                    // Update footer
                    $(api.column(5).footer()).html(
                        'Rp '+ commaSeparateNumber(pageTotal) +' <br/>(Rp '+ commaSeparateNumber(total) +' Total Semua)' 
                    );
                }
               
        } );
        
       

    });            
     
     dptable = $('#DetailPengadaanTable').DataTable( {
        'sScrollX'      : '100%',
     });
        
 
        //Detail Usulan 
        
        $('#btn-batal-pengadaan').on('click',function(){
            //$('#Modal_Konfirmasi').modal('show');
        });
        $('#btn-save-pengadaan').on('click',function(){
            //Kondisi Edit 


            //kondisi tambah ke Head and Detail
             //console.log("simpan semua");
            $.ajax({
                //type : "POST",
                url  : "<?php echo base_url('Modal/save_pengadaan')?>",
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
        $('#btn-e-save-pengadaan').on('click',function(){
            //Kondisi Edit 


            //kondisi tambah ke Head and Detail
             //console.log("simpan semua");
            // $.ajax({
            //     //type : "POST",
            //     url  : "<?php echo base_url('Modal/save_pengadaan')?>",
            //     dataType : "JSON",
                
            //     success: function(response){
            // //        console.log(response);
            //         ptable.ajax.reload(null,false);
            //     }, 
            //     error: function(response){
            //         console.log(response);
            //     }
            // });
            //     $('#Modal_Add').modal('hide');
            //     return false;
                

        });
         //Save barang temp
            $('#form-tambah-barang').submit(function() {
        //  $('#form-tambah-barang').on("submit", "form", function(event){
            // alert("coy");   

            // event.preventDefault();
            
            $('#btn_save_brg_temp_pengadaan').attr('disabled','disabled');    
            // var harga_satuan  = $('#hs').val();
            // var e_harga_satuan  = $('#ehs').val();
            // harga_satuan = harga_satuan.replace(/\./g,'');
            // e_harga_satuan = e_harga_satuan.replace(/\./g,'');
            // console.log($('#form-tambah-barang'));die;
            // +'&harga_satuan='+ harga_satuan+'&e_harga_satuan='+ e_harga_satuan;
            var form = $('#form-tambah-barang')[0];
            var formData = new FormData(form);
            // var data =  +'&harga_satuan='+ harga_satuan+'&e_harga_satuan='+ e_harga_satuan;
            
            if(edit){
                var id_temp  = $('#id_temp').val();
                //edit
                // console.log("saveedit");
                // alert("bro");
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Modal/update_temp_pengadaan')?>",
                    //dataType : "JSON",
                    // data : data,
                    data :formData,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        //console.log('masuk');
                        
                        $('[name="id_program"]').val(0).trigger('change');
                        $('[name="id_kegiatan"]').val(0).trigger('change');
                        $('[name="id_subkegiatan"]').val(0).trigger('change');
                        $('[name="id_uraian"]').val(0).trigger('change');
                        $('[name="spesifikasi"]').val("");
                        $('[name="sumber_dana"]').val(0).trigger('change');
                        $('[name="e_id_tipe_barang"]').val(0).trigger('change');
                        $('[name="e_id_jenis_barang"]').val(0).trigger('change');
                        $('[name="prioritas"]').val(0).trigger('change');
                        $('[name="e_image"]').val("");
                        $('[name="catatan"]').val("");
                        $('[name="harga_satuan"]').val("");
                        $('[name="hs"]').val("");
                        $('[name="nama_barang"]').val("");
                        $('[name="kuantitas"]').val("");
                        $('[name="satuan"]').val("");
                        $('[name="catatan"]').val("");
                        $('#btn_save_brg_temp_pengadaan').removeAttr('disabled');    
            
                        
                        dpttable.ajax.reload(null,false);
                        ptable.ajax.reload(null,false);
                        
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                    }
                });
                edit="";
                $('#btn_save_brg_temp_pengadaan').html("Tambah Barang");
                return false;
                

            }else{
                //tambah
                // console.log(data);die;
                // alert("bros");
                
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Modal/save_temp_pengadaan')?>",
                    data : formData,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        console.log(response);
                        $('[name="id_program"]').val(0).trigger('change');
                        $('[name="id_kegiatan"]').val(0).trigger('change');
                        $('[name="id_subkegiatan"]').val(0).trigger('change');
                        $('[name="id_uraian"]').val(0).trigger('change');
                        $('[name="spesifikasi"]').val("");
                        $('[name="sumber_dana"]').val(0).trigger('change');
                        $('[name="prioritas"]').val(0).trigger('change');
                        $('[name="catatan"]').val("");
                        $('[name="nama_barang"]').val("");
                         $('[name="image"]').val("");
                        $('[name="kuantitas"]').val("");
                        $('[name="satuan"]').val("");
                        $('[name="catatan"]').val("");
                        $('[name="harga_satuan"]').val("");
                        $('[name="hs"]').val("");
                        $('#btn_save_brg_temp_pengadaan').removeAttr('disabled');    
            
    //                    show_brg_Pengadaan();
                        dpttable.ajax.reload(null,false);
                        ptable.ajax.reload(null,false);
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                    }
                });
                return false;
                
            }
            alert("brod");
                
            
                
            })

            //kondisi edit
            $('#form-edit-barang').submit(function() {
                $('#e_btn_save_brg_pengadaan').attr('disabled','disabled');
                var harga_satuan  = $('#hs').val();
                var e_harga_satuan  = $('#ehs').val();
                harga_satuan = harga_satuan.replace(/\./g,'');
                e_harga_satuan = e_harga_satuan.replace(/\./g,'');

                var data =$('#form-edit-barang').serialize()+'&harga_satuan='+ harga_satuan+'&e_harga_satuan='+ e_harga_satuan;
                
                // var tgl_usulan = $('#tgl_usulan').val();
                // var nama_barang = $('#e_nama_barang').val();
                // var unit_kerja = $('#e_unit_kerja').val();
                // var kuantitas  = $('#e_kuantitas').val();
                // var satuan  = $('#e_satuan').val();
                // var keterangan  = $('#e_keterangan').val();
                // var id_pengadaan  = $('#e_id_pengadaan').val();
                //console.log('e);
                //console.log(edit);
                if(edit){
                    var id_detail  = $('#e_id_detail').val();
                    //edit
                    //console.log(data);
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('Modal/update_pengadaan')?>",
                        dataType : "JSON",
                        data : data,
                        success: function(response){
                      //      console.log(response);
                            $('[name="e_id_program"]').val(0).trigger('change');
                            $('[name="e_id_kegiatan"]').val(0).trigger('change');
                            $('[name="e_id_subkegiatan"]').val(0).trigger('change');
                            $('[name="e_id_uraian"]').val(0).trigger('change');
                            $('[name="e_spesifikasi"]').val("");
                            $('[name="e_sumber_dana"]').val(0).trigger('change');
                            $('[name="e_prioritas"]').val(0).trigger('change');
                            $('[name="e_catatan"]').val("");
                            $('[name="e_nama_barang"]').val("");
                             $('[name="e_id_tipe_barang"]').val(0).trigger('change');
                            $('[name="e_id_jenis_barang"]').val(0).trigger('change');
                           
                            $('[name="e_kuantitas"]').val("");
                            $('[name="e_satuan"]').val("");
                            $('[name="e_catatan"]').val("");
                            $('[name="e_harga_satuan"]').val("");
                            $('[name="ehs"]').val("");
                            $('#e_btn_save_brg_pengadaan').removeAttr('disabled');
                            dptable.ajax.reload(null,false);
                            ptable.ajax.reload(null,false);

                            
                            
                            //$('#Modal_Edit').modal('hide');
                        }, 
                        error: function(response){
                            console.log(response);
                        }
                    });
                    edit="";
                    $('#e_btn_save_brg_pengadaan').html("Tambah Barang");
                    return false;
                    

            }else{
                //tambah
                //console.log("tambah")
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Modal/save_detail_pengadaan')?>",
                    dataType : "JSON",
                    data : data,
                    // data : {nama_barang:nama_barang ,
                    //         tgl_usulan:tgl_usulan , 
                    //         unit_kerja:unit_kerja, 
                    //         kuantitas:kuantitas,
                    //         satuan:satuan,
                    //         id_pengadaan:id_pengadaan,
                    //         keterangan:keterangan},
                    success: function(response){
                        //console.log('masuk');
                        // $('[name="e_id_program"]').val(0).trigger('change');
                            // $('[name="e_id_kegiatan"]').val(0).trigger('change');
                            // $('[name="e_id_subkegiatan"]').val(0).trigger('change');
                            $('[name="e_id_uraian"]').val(0).trigger('change');
                            $('[name="e_spesifikasi"]').val("");
                            $('[name="e_sumber_dana"]').val(0).trigger('change');
                            $('[name="e_prioritas"]').val(0).trigger('change');
                            $('[name="e_catatan"]').val("");
                            $('[name="e_nama_barang"]').val("");
                            $('[name="e_kuantitas"]').val("");
                            $('[name="e_satuan"]').val("");
                            $('[name="e_catatan"]').val("");
                            $('[name="e_harga_satuan"]').val("");
                            $('#e_btn_save_brg_pengadaan').removeAttr('disabled');
                            
                        dptable.ajax.reload(null,false);
                        ptable.ajax.reload(null,false);
                        
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
         $('#btn_hapus').on('click',function(){
             var id = $('#id_hapus').val();
            // console.log("id");
             //console.log(id);
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Modal/deletedetail')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_hapus"]').val("");
                    
                }
            });
            $('#Modal_Delete').modal('hide');
            //$('#Modal_Edit').modal('show');
            dptable.ajax.reload(null,false);
            ptable.ajax.reload(null,false);
            return false;
        });
        
        
        
        function Edittemp(x){
            var  id_keg, id_subkeg;
            edit="edit";
           
            
            // bukakegiatantemp();
            // bukasubkegiatantemp();
            //console.log(x);die;
            var id = x;
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Modal/get_id_temp')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            //console.log(data);
                            $('#id_program').focus();
                           // $('#id_program').val(data[0].id_program).trigger('change');
                              $('#id_program').append('<option value="'+data[0].id_program+'" selected>'+data[0].kodering_program+'-'+data[0].nama_program+'</option>');
                              $('#id_kegiatan').append('<option value="'+data[0].id_kegiatan+'" selected>'+data[0].kodering_kegiatan+'-'+data[0].nama_kegiatan+'</option>');
                              $('#id_subkegiatan').append('<option value="'+data[0].id_subkegiatan+'" selected>'+data[0].kodering_kegiatan+'-'+data[0].nama_subkegiatan+'</option>');
                              $('#id_jenis_barang').append('<option value="'+data[0].id_jenis_barang+'" selected>'+data[0].nama_jenis_barang+'</option>');
                              $('#id_tipe_barang').append('<option value="'+data[0].id_tipe_barang+'" selected>'+data[0].nama_tipe_barang+'</option>');
                      
                           
                            $('#id_uraian').val(data[0].id_uraian).trigger('change');
                            $('#sumber_dana').val(data[0].sumber_dana).trigger('change');
                            $('#prioritas').val(data[0].prioritas).trigger('change');
                            //console.log($('#id_subkegiatan').val());
                        
                            //$('#id_program').val();
                            $('#nama_barang').val(data[0].nama_barang);
                            $('#spesifikasi').val(data[0].spesifikasi);
                            $('#kuantitas').val(data[0].kuantitas);
                            $('#satuan').val(data[0].satuan);
                            $('#id_temp').val(data[0].id_temp_pengadaan);
                            $('#catatan').val(data[0].catatan);
                            $('#harga_satuan').val(data[0].harga_satuan);
                            $('#hs').val(data[0].harga_satuan);
                            $('#keterangan').val(data[0].keterangan);
                            $('#e_image').val(data[0].nama_file);
                            $('#btn_save_brg_temp_pengadaan').html("Ubah Barang");
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
                url  : "<?php echo base_url('Modal/DeleteTemp')?>",
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
                e_rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            e_rupiah.value = formatRupiah(this.value, "Rp. ");
            });
            
                //dptable.ajax.reload(null,false);
                $('#e_id_program').select2({'width': '-webkit-fill-available'});
                $('#e_id_kegiatan').select2({'width': '-webkit-fill-available'});
                $('#e_id_subkegiatan').select2({'width': '-webkit-fill-available'});
                $('#e_id_uraian').select2({'width': '-webkit-fill-available'});
                $('#e_sumber_dana').select2({'width': '-webkit-fill-available'});
                $('#e_prioritas').select2({'width': '-webkit-fill-available'});

                $('#e_id_tipe_barang').select2({'width': '-webkit-fill-available'});
                $('#e_id_jenis_barang').select2({'width': '-webkit-fill-available'});

                ambileprogram();
                ambileuraian();
                
                ambiletipebarang();
                ambilejenisbarang();

                dptable.destroy();
                dptable = $('#DetailPengadaanTable').DataTable( {
                'processing'	: true,
                'sScrollX'      : '100%',
                //'serverSide'	: true,
                ajax:{
                    type:"POST",
                    url   : '<?php echo base_url('Modal/data_detail_pengadaan')?>',
                    data : {id:id},
                    dataSrc : function(response){
                        var row = new Array();
                        console.log(response);
                        var i = 1;
                        var hitung = response.data.length;
                        if (hitung>0) {
                            for(var x in response.data){
                            var button = '<button onClick="EditPengadaan('+response.data[x].id_detail_pengadaan+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Data"><i class="fa fa-edit"></i></button> <button onClick="DeletePengadaan('+response.data[x].id_detail_pengadaan+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></button>';

                            row.push({
                                'no'                    : i,
                                'id_pengadaan'          : response.data[x].id_pengadaan,
                                'kodering_program'      : response.data[x].kodering_program,
                                'nama_program'          : response.data[x].nama_program,
                                'kodering_kegiatan'     : response.data[x].kodering_kegiatan,
                                'nama_kegiatan'         : response.data[x].nama_kegiatan,
                                'kodering_subkegiatan'  : response.data[x].kodering_subkegiatan,
                                'nama_subkegiatan'      : response.data[x].nama_subkegiatan,
                                'kodering_uraian'  : response.data[x].kodering_uraian,
                                'nama_uraian'           : response.data[x].nama_uraian,
                                'nama_barang'           : response.data[x].nama_barang,
                                'tipe_barang'           : response.data[x].tipe_barang,
                                'jenis_barang'           : response.data[x].jenis_barang,
                                'spesifikasi'           : response.data[x].spesifikasi,
                                'kuantitas'             : response.data[x].kuantitas,   
                                'satuan'                : response.data[x].satuan,
                                'prioritas'             : response.data[x].prioritas,
                                'sumber_dana'          : response.data[x].sumber_dana,
                                'harga_satuan'          : response.data[x].harga_satuan,
                                'total_harga'          : response.data[x].total_harga,
                                'catatan'               : response.data[x].catatan,
                                'unit_kerja'            : response.data[x].unit_kerja,
                                'kode_pengadaan'        : response.data[x].kode_pengadaan,
                                'aksi'                  : button,
                                'nomen_program'         : response.data[x].kodering_program+' '+ response.data[x].nama_program,
                                'nomen_kegiatan'        : response.data[x].kodering_kegiatan+' '+ response.data[x].nama_kegiatan,
                                'nomen_subkegiatan'     : response.data[x].kodering_subkegiatan+' '+ response.data[x].nama_subkegiatan,
                                'nomen_uraian'         : response.data[x].kodering_uraian+' '+ response.data[x].nama_uraian,
                                
                            });
                            i = i + 1;
                            }
                            // console.log(response.data[x].unit_kerja);
                            $('#p_kode_pengadaan').html(response.data[x].kode_pengadaan);
                            $('#e_unit_kerja').html((response.data[x].unit_kerja).toUpperCase());
                            $('#e_id_pengadaan').val(response.data[x].id_pengadaan);
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
              
              {'data': 'nama_program'},
              {'data': 'nama_kegiatan'},
              {'data': 'nama_subkegiatan'},
              {'data': 'nama_uraian'},
            //   {'data': 'nama_kegiatan'},
            //   {'data': 'nama_program','render' : 
            //     function (data, type, full) {
                
            //         // return "<p><b>Nama Program :"+full.kodering_program +'-'+ full.nama_program+"</b><br><b><i>Nama Kegiatan :"+full.kodering_kegiatan +'-'+ full.nama_kegiatan+"</i></b><br><i>Nama Subkegiatan :"+full.kodering_subkegiatan +'-'+ full.nama_subkegiatan+"</i><br>Nama Uraian :"+full.kodering_uraian +'-'+ full.nama_uraian+"<br></p>";
            //         return full.nama_program;
            //     }
            // },
              {'data': 'nama_barang','render':
                  function (data, type, full) {
                    return "<p> "+full.nama_barang +"<br> Spesifikasi : "+ full.spesifikasi;
                }
              
              },
              {'data': 'volume', 'render':
                function (data, type, full) {
                    return full.kuantitas +' '+ full.satuan;
                }
              
              },
              {'data': 'harga', 'render': 
                function (data, type, full) {
                    return "<p>Prioritas : "+ full.prioritas +" <br>Sumber Dana : "+full.sumber_dana.toUpperCase()+"<br>Harga Satuan : "+ commaSeparateNumber(full.harga_satuan) +"<br><b>Harga Total : "+ commaSeparateNumber(full.total_harga) +"</b><p>";

                }
            },
            {'data': 'total_harga', 'render': 
                function (data, type, full) {
                        return full.total_harga;
                }  
              },

              {'data': 'prioritas'},
              {'data': 'catatan'},
              {'data': 'aksi'}
              
             ],
             order: [[0, 'asc'],[1, 'asc'],[2, 'asc'],[3, 'asc']],
             rowGroup: {
                dataSrc: [ 'nomen_program', 'nomen_kegiatan', 'nomen_subkegiatan', 'nomen_uraian' ]
                },
                columnDefs: [ 
                    {targets: [0,1,2,3,7], visible: false},
                    // {  targets: 0, width: '20%' }, 
                    // {  targets: 1, width: '20%' }, 
                    // {  targets: 2, width: '20%' }, 
                    // {  targets: 3, width: '20%' }, 
                    {  targets: 4, width: '35%' }, 
                    {  targets: 5, width: '15%' }, 
                    {  targets: 6, width: '20%' },                   
                    {  targets: 8, width: '5%' }, 
                    {  targets: 9, width: '15%' }, 
                    {  targets: 10, width: '15%' } 
                    
                   
                
                 ] ,

                 
                    footerCallback: function ( row, data, start, end, display ) {
                        var api = this.api(), data;
            
                        // // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
        
                    // Total over all pages
                    // console.log(api.column(7).data());
                    total = api
                    .column(7)
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                    // console.log(total);
                    
                    // Total over this page
                    pageTotal = api
                    .column(7, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                     console.log(pageTotal);
        
                    // Update footer
                    $(api.column(5).footer()).html(
                        'Rp '+ commaSeparateNumber(pageTotal) +' <br/>(Rp '+ commaSeparateNumber(total) +' Total Semua)' 
                    );
                }
               
                
            } );
                
            $('#Modal_Edit').modal('show');
            //document.getElementById("unit_kerja").innerHTML="baru";                           

            //return false;
        }
        
        function EditPengadaan(x){
            var id = x;
            edit="edit";
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Modal/get_id_detail')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            //console.log(data);
                             $('#e_id_program').focus();
                           // $('#id_program').val(data[0].id_program).trigger('change');
                            $('#e_id_program').append('<option value="'+data[0].id_program+'" selected>'+data[0].kodering_program+'-'+data[0].nama_program+'</option>');
                            $('#e_id_kegiatan').append('<option value="'+data[0].id_kegiatan+'" selected>'+data[0].kodering_kegiatan+'-'+data[0].nama_kegiatan+'</option>');
                            $('#e_id_subkegiatan').append('<option value="'+data[0].id_subkegiatan+'" selected>'+data[0].kodering_kegiatan+'-'+data[0].nama_subkegiatan+'</option>');
                            $('#e_id_tipe_barang').append('<option value="'+data[0].id_tipe_barang+'" selected>'+data[0].nama_tipe_barang+'</option>');
                            $('#e_id_jenis_barang').append('<option value="'+data[0].id_jenis_barang+'" selected>'+data[0].nama_jenis_barang+'</option>');
                    
                           
                            $('#e_id_uraian').val(data[0].id_uraian).trigger('change');
                            $('#e_sumber_dana').val(data[0].sumber_dana).trigger('change');
                            $('#e_prioritas').val(data[0].prioritas).trigger('change');
                            //console.log($('#id_subkegiatan').val());
                        
                            //$('#id_program').val();
                            $('#e_nama_barang').val(data[0].nama_barang);
                            $('#e_spesifikasi').val(data[0].spesifikasi);
                            $('#id_temp').val(data[0].id_temp_pengadaan);
                            $('#e_catatan').val(data[0].catatan);
                            $('#e_harga_satuan').val(data[0].harga_satuan);
                            $('#ehs').val(data[0].harga_satuan);
                            
                            // $('#keterangan').val(data[0].keterangan);
                           
                            $('#e_nama_barang').val(data[0].nama_barang);
                            $('#e_id_detail').val(data[0].id_detail_pengadaan);
                            $('#e_kuantitas').val(data[0].kuantitas);
                            $('#e_satuan').val(data[0].satuan);
                            $('#e_btn_save_brg_pengadaan').html("Ubah Barang");
    //              
                            
                        }
                    });
            return false;
    }
        function DeletePengadaan(x){

            $('#id_seksi').val(2);
            $('#id_hapus').val(x);
            $('#Modal_Delete').modal('show');
        }

        function bukakegiatan(id){
    //    console.log(id.value);
             $.ajax ({
                    type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_kegiatan')?>',
                    dataType: 'json',
                    data : {id:id.value},
                    
                    success: function(response){
                        $('#id_kegiatan').empty();

                        $('#id_kegiatan').append('<option value="0">- Pilih Nama Kegiatan -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#id_kegiatan').append(
                                    $('<option></option>').val(value['id_kegiatan']).html(value['kodering_kegiatan'] +"-"+ value['nama_kegiatan'])
                                );
                        });        
                        }
         });
        }
         function bukakegiatan(id){
    //    console.log(id.value);
             $.ajax ({
                    type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_kegiatan')?>',
                    dataType: 'json',
                    data : {id:id.value},
                    
                    success: function(response){
                        $('#id_kegiatan').empty();

                        $('#id_kegiatan').append('<option value="0">- Pilih Nama Kegiatan -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#id_kegiatan').append(
                                    $('<option></option>').val(value['id_kegiatan']).html(value['kodering_kegiatan'] +"-"+ value['nama_kegiatan'])
                                );
                        });        
                        }
         });
       
         

        }
        function bukasubkegiatan(id){
             console.log(id.value);
             $.ajax ({
                    type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_subkegiatan')?>',
                    dataType: 'json',
                    data : {id:id.value},
                    
                    success: function(response){
                          $('#id_subkegiatan').empty();

                        $('#id_subkegiatan').append('<option value="0">- Pilih Nama Subkegiatan -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#id_subkegiatan').append(
                                    $('<option></option>').val(value['id_subkegiatan']).html(value['kodering_subkegiatan'] +"-"+ value['nama_subkegiatan'])
                                );
                        });        
                        }
         });
        }
        function bukakegiatantemp(){
            //  console.log(id.value);
             $.ajax ({
                    type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_kegiatantemp')?>',
                    dataType: 'json',
                    // data : {id:id.value},
                    
                    success: function(response){
                          $('#id_kegiatan').empty();

                        $('#id_kegiatan').append('<option value="0">- Pilih Nama Kegiatan -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#id_kegiatan').append(
                                    $('<option></option>').val(value['id_kegiatan']).html(value['kodering_kegiatan'] +"-"+ value['nama_kegiatan'])
                                );
                        });        
                        }
         });
        }
        
        function bukasubkegiatantemp(){
            //  console.log(id.value);
             $.ajax ({
                    type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_subkegiatantemp')?>',
                    dataType: 'json',
                    // data : {id:id.value},
                    
                    success: function(response){
                          $('#id_subkegiatan').empty();

                        $('#id_subkegiatan').append('<option value="0">- Pilih Nama Subkegiatan -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#id_subkegiatan').append(
                                    $('<option></option>').val(value['id_subkegiatan']).html(value['kodering_subkegiatan'] +"-"+ value['nama_subkegiatan'])
                                );
                        });        
                        }
         });

        }

        function ambilprogram(){
            $.ajax ({
                    // type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_program')?>',
                    dataType: 'json',
                    success: function(response){
                        $('#id_program').append('<option value="0">- Pilih Nama Program -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#id_program').append(
                                    $('<option></option>').val(value['id_program']).html(value['kodering_program'] +"-"+ value['nama_program'])
                                );
                        });        
                        }
            });
       
        }
        function ambiluraian(){
            var id_jenis_belanja=2;
            $.ajax ({
                    type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_uraian')?>',
                    dataType: 'json',
                    data: {id_jenis_belanja:id_jenis_belanja},
                    
                    success: function(response){
                        $('#id_uraian').append('<option value="0">- Pilih Nama Uraian -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#id_uraian').append(
                                    $('<option></option>').val(value['id_uraian']).html(value['kodering_uraian'] +"-"+ value['nama_uraian'])
                                );
                        });        
                        }
             });
                
        
       
        }
        
        function ambileprogram(){
            $.ajax ({
                    // type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_program')?>',
                    dataType: 'json',
                    success: function(response){
                        $('#e_id_program').append('<option value="0">- Pilih Nama Program -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#e_id_program').append(
                                    $('<option></option>').val(value['id_program']).html(value['kodering_program'] +"-"+ value['nama_program'])
                                );
                        });        
                        }
            });
       
        }
        function ambileuraian(){
            var id_jenis_belanja = 2;
            $.ajax ({
                    // type: 'POST',\
                    type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_uraian')?>',
                    dataType: 'json',
                    data: {id_jenis_belanja:id_jenis_belanja},
                    success: function(response){
                        $('#e_id_uraian').append('<option value="0">- Pilih Nama Uraian -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#e_id_uraian').append(
                                    $('<option></option>').val(value['id_uraian']).html(value['kodering_uraian'] +"-"+ value['nama_uraian'])
                                );
                        });        
                        }
             });
                
        
       
        }
        
        function bukaekegiatan(id){
    //    console.log(id.value);
             $.ajax ({
                    type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_kegiatan')?>',
                    dataType: 'json',
                    data : {id:id.value},
                    
                    success: function(response){
                        $('#e_id_kegiatan').empty();

                        $('#e_id_kegiatan').append('<option value="0">- Pilih Nama Kegiatan -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#e_id_kegiatan').append(
                                    $('<option></option>').val(value['id_kegiatan']).html(value['kodering_kegiatan'] +"-"+ value['nama_kegiatan'])
                                );
                        });        
                        }
         });
       


        }
        function bukaesubkegiatan(id){
            //  console.log(id.value);
             $.ajax ({
                    type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_subkegiatan')?>',
                    dataType: 'json',
                    data : {id:id.value},
                    
                    success: function(response){
                          $('#e_id_subkegiatan').empty();

                        $('#e_id_subkegiatan').append('<option value="0">- Pilih Nama Subkegiatan -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#e_id_subkegiatan').append(
                                    $('<option></option>').val(value['id_subkegiatan']).html(value['kodering_subkegiatan'] +"-"+ value['nama_subkegiatan'])
                                );
                        });        
                        }
         });
        }

        function ambiltipebarang(){
            $.ajax ({
                    // type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_tipe_barang')?>',
                    dataType: 'json',
                    success: function(response){
                        $('#id_tipe_barang').append('<option value="0">- Pilih Tipe Barang -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#id_tipe_barang').append(
                                    $('<option></option>').val(value['id_tipe_barang']).html(value['nama_tipe_barang'])
                                );
                        });        
                        }
            });
       }
        
       function ambiljenisbarang(){
            $.ajax ({
                    // type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_jenis_barang')?>',
                    dataType: 'json',
                    success: function(response){
                        $('#id_jenis_barang').append('<option value="0">- Pilih Jenis Barang -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#id_jenis_barang').append(
                                    $('<option></option>').val(value['id_jenis_barang']).html(value['nama_jenis_barang'])
                                );
                        });        
                        }
            });
       }

        function ambiletipebarang(){
            $.ajax ({
                    // type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_tipe_barang')?>',
                    dataType: 'json',
                    success: function(response){
                        $('#e_id_tipe_barang').append('<option value="0">- Pilih Tipe Barang -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#e_id_tipe_barang').append(
                                    $('<option></option>').val(value['id_tipe_barang']).html(value['nama_tipe_barang'])
                                );
                        });        
                        }
            });
       
        }

        function ambilejenisbarang(){
            $.ajax ({
                    // type: 'POST',
                    url: '<?php echo base_url('Modal/ambil_jenis_barang')?>',
                    dataType: 'json',
                    success: function(response){
                        $('#e_id_jenis_barang').append('<option value="0">- Pilih Jenis Barang -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#e_id_jenis_barang').append(
                                    $('<option></option>').val(value['id_jenis_barang']).html(value['nama_jenis_barang'])
                                );
                        });        
                        }
            });
       
        }
       












         /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split("."),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "." + split[1] : rupiah;
            // return prefix == undefined ? rupiah : rupiah ? "Rp." + rupiah : "";
            return prefix == undefined ? rupiah : rupiah ? rupiah : "";
        }
        function commaSeparateNumber(val) {
            while (/(\d+)(\d{3})/.test(val.toString())) {
                val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
            }
            return val;
        }

    
 
</script>

<!-- AKHIR HALAMAN Pengadaan -->