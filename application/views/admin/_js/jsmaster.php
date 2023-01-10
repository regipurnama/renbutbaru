<!-- Halaman Pengadaan  -->
<script type="text/javascript">
    var role = "<?= $profile->role ?>";
    var unit_kerja = "<?= $profile->unit_kerja ?>";
    var id_user = "<?= $profile->id_user ?>";
    //console.log(id_role);

    var uratable="",kegtable="",ptable="",subtable="",protable="",persetujuantable="";
    var edit="";
    var idpermohonan="";

    $(document).ready(function(){


        //$('#id_kegiatan').select2({tags: true, 'width': 50%});
      
        //$('#id_subkegiatan').select2({'width': '-webkit-fill-available'});
        //$('#id_subkegiatan').select2({'width': '-webkit-fill-available'});
        $('#id_program').select2({'width': '-webkit-fill-available'});
        $('#id_kegiatan').select2({'width': '-webkit-fill-available'});
        //$('#id_kegiatan').select2({'width': '-webkit-fill-available'});
        $('#p_unit_kerja').html((unit_kerja).toUpperCase());
                          
        
        ambilprogram();
        ambilkegiatan();
        ambiluraian();
        
            
        
          
        ptable = $('#PenggunaTable').DataTable( {
            'processing'	: true,
            'scrollX'   :true,
            //'serverSide'	: true,
            ajax:{
                url   : '<?php echo base_url('Master/ambil_pengguna')?>',
                dataSrc : function(response){
                  var row = new Array();
                  //console.log(hitung);
                  var i = 1;
                  var button;
                  var hitung = response.data.length;
                    if (hitung>0) {
                      for(var x in response.data){
                        button = '<button onClick="BukaEditPengguna('+response.data[x].id_user+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Data Pengguna"><i class="fas fa-edit"></i></button>';
                       
                        row.push({
                          'no'                : i,
                          'unit_kerja'        : response.data[x].unit_kerja,
                          'unit_kerja_lengkap'        : response.data[x].unit_kerja_lengkap,
                          'username'     : response.data[x].username,
                          'password'    : response.data[x].password,
                          'role'    : response.data[x].role,
                          'blokir'    : response.data[x].isblokir,
                          'status'     : response.data[x].status,
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
              {'data': 'unit_kerja'},
              {'data': 'username'},
              {'data': 'role'},              
              {'data': 'blokir','render':
                  function (data, type, full) {
                      if(full.blokir == 0 ){
                          return "<span class='badge badge-info'>Akses Dibuka</span>";
                        }else{
                            
                            return "<span class='badge badge-danger'>diblokir</span>";
                      }
                  //  return "<p> "+full.nama_barang +"<br> Spesifikasi : "+ full.spesifikasi;
                }},              
              {'data': 'aksi'}
              
             ],
             columnDefs: [ 
                    {  targets: 0, width: '5%' }, 
                    {  targets: 1, width: '35%' }, 
                    {  targets: 2, width: '15%' },                   
                    {  targets: 3, width: '10%' }, 
                    {  targets: 4, width: '10%' }, 
                    {  targets: 5, width: '10%' }, 
                
                
                 ] ,
                 
        } );

        protable = $('#ProgramTable').DataTable( {
            'processing'	: true,
            'scrollX'   :true,
            //'serverSide'	: true,
            ajax:{
                url   : '<?php echo base_url('Master/ambil_program')?>',
                dataSrc : function(response){
                  var row = new Array();
                  //console.log(hitung);
                  var i = 1;
                  var button;
                  var hitung = response.data.length;
                    if (hitung>0) {
                      for(var x in response.data){
                          if(role =='Admin'){
                            button = '<button onClick="BukaEditProgram('+response.data[x].id_program+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Program"><i class="fa fa-edit"></i></button> <button onClick="DeleteProgram('+response.data[x].id_program+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Program"><i class="fa fa-trash"></i></button>';
                      
                          }else{
                              button="";
                          }
                        
                        row.push({
                          'no'                : i,
                          'kodering_program'        : response.data[x].kodering_program,
                          'nama_program'        : response.data[x].nama_program,
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
              {'data': 'kodering_program'},
              {'data': 'nama_program'},
              {'data': 'aksi'}
              
             ],
             columnDefs: [ 
                    {  targets: 0, width: '5%' }, 
                    {  targets: 1, width: '30%' }, 
                    {  targets: 2, width: '35%' },                   
                    {  targets: 3, width: '20%' }, 
                                
                 ] ,
                 
        } );

        kegtable = $('#KegiatanTable').DataTable( {
            'processing'	: true,
            'scrollX'   :true,
            //'serverSide'	: true,
            ajax:{
                url   : '<?php echo base_url('Master/ambil_kegiatanmaster')?>',
                dataSrc : function(response){
                    
                    var row = new Array();
                    //console.log(hitung);
                    var i = 1;
                    var button;
                    var hitung = response.data.length;
                    if (hitung>0) {
                        for(var x in response.data){
                            if(role=='Admin'){
                          button = '<button onClick="BukaEditKegiatan('+response.data[x].id_kegiatan+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Data"><i class="fa fa-edit"></i></button> <button onClick="DeleteKegiatan('+response.data[x].id_kegiatan+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Kegiatan"><i class="fa fa-trash"></i></button>';
                        }else{
                              button="";
                          }
                        row.push({
                          'no'                  : i,
                          'kodering_kegiatan'      : response.data[x].kodering_kegiatan,
                          'nama_program'        : response.data[x].nama_program,
                          'nama_kegiatan'        : response.data[x].nama_kegiatan,
                          'aksi'                : button
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
              {'data': 'nama_program'},
              {'data': 'kodering_kegiatan'},
              {'data': 'nama_kegiatan'},
              {'data': 'aksi'}
              
             ],
             columnDefs: [ 
                    {  targets: 0, width: '5%' }, 
                    {  targets: 1, width: '30%' }, 
                    {  targets: 1, width: '30%' }, 
                    {  targets: 2, width: '35%' },                   
                    {  targets: 3, width: '20%' }, 
                                
                 ] ,
                 
        } );

        uratable = $('#UraianTable').DataTable( {
            'processing'	: true,
            'scrollX'   :true,
            //'serverSide'	: true,
            ajax:{
                url   : '<?php echo base_url('Master/ambil_uraianmaster')?>',
                dataSrc : function(response){
                  var row = new Array();
                  //console.log(hitung);
                  var i = 1;
                  var button;
                  var hitung = response.data.length;
                    if (hitung>0) {
                      for(var x in response.data){
                          if(role=='Admin'){
                        button = '<button onClick="BukaEditUraian('+response.data[x].id_uraian+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Uraian"><i class="fa fa-edit"></i></button> <button onClick="DeleteUraian('+response.data[x].id_uraian+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Uraian"><i class="fa fa-trash"></i></button>';
                    }else{
                              button="";
                          }
                        row.push({
                          'no'                  : i,
                          'kodering_uraian'      : response.data[x].kodering_uraian,
                          'nama_uraian'        : response.data[x].nama_uraian,
                          'aksi'                : button
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
              {'data': 'kodering_uraian'},
              {'data': 'nama_uraian'},
              {'data': 'aksi'}
              
             ],
             columnDefs: [ 
                    {  targets: 0, width: '5%' }, 
                    {  targets: 1, width: '30%' }, 
                    {  targets: 2, width: '35%' },                   
                    {  targets: 3, width: '20%' }, 
                                
                 ] ,
                 
        } );


        subtable = $('#SubkegiatanTable').DataTable( {
            'processing'	: true,
            'scrollX'   :true,
            //'serverSide'	: true,
            ajax:{
                url   : '<?php echo base_url('Master/ambil_subkegiatanmaster')?>',
                dataSrc : function(response){
                  var row = new Array();
                  //console.log(hitung);
                  var i = 1;
                  var button;
                  var hitung = response.data.length;
                    if (hitung>0) {
                      for(var x in response.data){
                          if(role=='Admin'){
                        button = '<button onClick="BukaEditSubkegiatan('+response.data[x].id_subkegiatan+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Data"><i class="fa fa-edit"></i></button> <button onClick="DeleteSubkegiatan('+response.data[x].id_subkegiatan+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Subkegiatan"><i class="fa fa-trash"></i></button>';
                            }else{
                              button="";
                          }
                        row.push({
                          'no'                : i,
                          'nama_kegiatan'   : response.data[x].nama_kegiatan,
                          'kodering_subkegiatan'        : response.data[x].kodering_subkegiatan,
                          'nama_subkegiatan'        : response.data[x].nama_subkegiatan,
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
              {'data': 'nama_subkegiatan'},
              {'data': 'kodering_subkegiatan'},
              {'data': 'nama_kegiatan'},
              {'data': 'aksi'}
              
             ],
             columnDefs: [ 
                    {  targets: 0, width: '5%' }, 
                    {  targets: 1, width: '30%' }, 
                    {  targets: 2, width: '35%' },                   
                    {  targets: 3, width: '20%' }, 
                    {  targets: 4, width: '20%' }, 
                                
                 ] ,
                 
        } );


        dpttable = $('#DetailPengadaantempTable').DataTable( {
            'processing'	: true,
            'sScrollX'      : '100%',
            'width'         :'100%',
            
            //'serverSide'	: true,
            ajax:{
                 url   : '<?php echo base_url('Pengadaan/data_temp_pengadaan')?>',
                dataSrc : function(response){
                  var row = new Array();
                  //console.log()
                  var i = 1;
                  var hitung = response.data.length;
                    if (hitung>0) {
                      for(var x in response.data){
                        var button = '<button onClick="Edittemp('+response.data[x].id_temp_pengadaan+')" name="btn_edit" class="btn btn-warning btn-xs btn-flat" title="Edit Data"><i class="fa fa-edit"></i></button> <button onClick="Deletetemp('+response.data[x].id_temp_pengadaan+')" name="btn_delete" class="btn btn-danger btn-xs btn-flat" title="Hapus Data"><i class="fa fa-trash"></i></button>';

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
                          'spesifikasi'       : response.data[x].spesifikasi,
                          'catatan'       : response.data[x].catatan,
                          'sumber_dana'       : response.data[x].sumber_dana,
                          'prioritas'       : response.data[x].prioritas,
                          'kuantitas'         : response.data[x].kuantitas,
                          'satuan'            : response.data[x].satuan,
                          'harga_satuan'            : response.data[x].harga_satuan,
                          'total_harga'            : response.data[x].total_harga,
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
                    return "<p>Prioritas : "+full.prioritas +"<br>Sumber Dana : "+full.sumber_dana.toUpperCase()+"<br>Harga Satuan : "+commaSeparateNumber(full.harga_satuan)+"<br><b>Harga Total (PPH+Inflasi): "+ commaSeparateNumber(full.total_harga) +"</b><p>";

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
            

    });            
                        
     dptable = $('#DetailPengadaanTable').DataTable( {
        'scrollX'   :true,
        
    });
    
    persetujuantable = $('#PersetujuanTable').DataTable( {
        'scrollX'   :true,
        
            } );

     $('#Modal_Add').on('shown.bs.modal', function () {
            dpttable.columns.adjust();
    });
    $('#Modal_Persetujuan').on('shown.bs.modal', function () {
            dpttable.columns.adjust();
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
                url  : "<?php echo base_url('Pengadaan/save_pengadaan')?>",
                dataType : "JSON",
                
                success: function(response){
                    console.log(response);
                    ptable.ajax.reload(null,false);
                }, 
                error: function(response){
                    console.log(response);
                }
            });
                $('#Modal_Add').modal('hide');
                return false;
                

        });
        $('#btn-save-pengguna').on('click',function(){
            //Kondisi Edit 


            //kondisi tambah ke Head and Detail
             //console.log("simpan semua");
            $.ajax({
                //type : "POST",
                url  : "<?php echo base_url('Master/save_pengguna')?>",
                dataType : "JSON",
                
                success: function(response){
                    console.log(response);
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
            //     url  : "<?php echo base_url('Pengadaan/save_pengadaan')?>",
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
         //Save Pengguna
            $('#form-tambah-pengguna').submit(function() {
           // console.log('xx');
                var data =$('#form-tambah-pengguna').serialize();
            
                //tambah
                // die;
             //  console.log(data);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Master/save_pengguna')?>",
                    data : data,
                    success: function(response){
                       //console.log(response.data);
                        
                        $('[name="unit_kerja"]').val("");
                        $('[name="ukl"]').val("");
                        $('[name="username"]').val("");
                        $('[name="pass"]').val("");
                        $('[name="bidang"]').val("");
                        $('[name="direksi"]').val("");
                        ptable.ajax.reload(null,false);
                        tata.success('Sukses', 'User Berhasil Ditambah .. ', 
                        {
                            duration: 3000
                        })
                   
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                        tata.error('Gagal', 'User Gagal ditambah ', {
                            duration: 3000
                        })
                    }
                             
                });
                $('#Modal_Add').modal('hide');
      
                return false;   
                           
            })
            $('#form-edit-pengguna').submit(function() {
           // console.log('xx');
                var data =$('#form-edit-pengguna').serialize();
            
                //tambah
                // die;
             //  console.log(data);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Master/update_pengguna')?>",
                    data : data,
                    success: function(response){
                       //console.log(response.data);
                        
                        $('[name="e_id"]').val("");
                        $('[name="e_unit_kerja"]').val("");
                        $('[name="e_ukl"]').val("");
                        $('[name="e_username"]').val("");
                        $('[name="e_pass"]').val("");
                        $('[name="e_bidang"]').val("");
                        $('[name="e_direksi"]').val("");
                        ptable.ajax.reload(null,false);
                        tata.success('Sukses', 'Data Berhasil Berubah .. ', {
                            duration: 3000
                        })
                        $('#Modal_Edit_Pengguna').modal('hide');
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                        tata.error('Gagal', 'Data Gagal diubah ', {
                            duration: 3000
                        })
                    }
                             
                });
                $('#Modal_Add').modal('hide');
      
                return false;   
                           
            })

            $('#form-tambah-subkegiatan').submit(function() {
           // console.log('xx');
                var data =$('#form-tambah-subkegiatan').serialize();
            
                //tambah
                // die;
             //  console.log(data);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Master/save_subkegiatan')?>",
                    data : data,
                    success: function(response){
                       //console.log(response.data);
                        
                        $('[name="kodering_subkegiatan"]').val("");
                        $('[name="nama_subkegiatan"]').val("");
                        $('[name="id_kegiatan"]').val("");
                        subtable.ajax.reload(null,false);
                        tata.success('Sukses', 'Subkegiatan Berhasil Ditambah .. ', 
                        {
                            duration: 3000
                        })
                   
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                        tata.error('Gagal', 'Subkegiatan Gagal ditambah ', {
                            duration: 3000
                        })
                    }
                             
                });
                $('#Modal_Add').modal('hide');
      
                return false;   
                           
            })
            $('#form-edit-subkegiatan').submit(function() {
           // console.log('xx');
                var data =$('#form-edit-subkegiatan').serialize();
            
                //tambah
                // die;
             //  console.log(data);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Master/update_subkegiatan')?>",
                    data : data,
                    success: function(response){
                       //console.log(response.data);
                        
                        $('[name="e_id"]').val("");
                        $('[name="e_unit_kerja"]').val("");
                        $('[name="e_ukl"]').val("");
                        $('[name="e_username"]').val("");
                        $('[name="e_pass"]').val("");
                        $('[name="e_bidang"]').val("");
                        $('[name="e_direksi"]').val("");
                        subtable.ajax.reload(null,false);
                        tata.success('Sukses', 'Subkegiatan Berhasil Berubah .. ', {
                            duration: 3000
                        })
                        $('#Modal_Edit').modal('hide');
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                        tata.error('Gagal', 'Subkegiatan Gagal diubah ', {
                            duration: 3000
                        })
                    }
                             
                });
                $('#Modal_Add').modal('hide');
      
                return false;   
                           
            })

            $('#form-tambah-program').submit(function() {
           // console.log('xx');
                var data =$('#form-tambah-program').serialize();
            
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Master/save_program')?>",
                    data : data,
                    success: function(response){
                       //console.log(response.data);
                        
                        $('[name="kodering_program"]').val("");
                        $('[name="nama_program"]').val("");
                        protable.ajax.reload(null,false);
                        tata.success('Sukses', 'Program Berhasil Ditambah .. ', 
                        {
                            duration: 3000
                        })
                   
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                        tata.error('Gagal', 'Data Gagal diubah ', {
                            duration: 3000
                        })
                    }
                             
                });
                $('#Modal_Add').modal('hide');
      
                return false;   
                           
            })

            $('#form-edit-program').submit(function() {
           // console.log('xx');
                var data =$('#form-edit-program').serialize();
            
                //tambah
                // die;
             //  console.log(data);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Master/update_program')?>",
                    data : data,
                    success: function(response){
                       //console.log(response.data);
                        
                        $('[name="e_id_program"]').val("");
                        $('[name="e_kodering_program"]').val("");
                        $('[name="e_nama_program"]').val("");
                        protable.ajax.reload(null,false);
                        tata.success('Sukses', 'Program Berhasil Berubah .. ', {
                            duration: 3000
                        })
                        $('#Modal_Edit_Pengguna').modal('hide');
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                        tata.error('Gagal', 'Program Gagal diubah ', {
                            duration: 3000
                        })
                    }
                             
                });
                $('#Modal_Edit').modal('hide');
      
                return false;   
                           
            })

            $('#form-tambah-kegiatan').submit(function() {
           // console.log('xx');
                var data =$('#form-tambah-kegiatan').serialize();
            
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Master/save_kegiatan')?>",
                    data : data,
                    success: function(response){
                       //console.log(response.data);
                        
                        $('[name="kodering_kegiatan"]').val("");
                        $('[name="nama_kegiatan"]').val("");
                        $('[name="id_program"]').val("");
                        kegtable.ajax.reload(null,false);
                        tata.success('Sukses', 'kegiatan Berhasil Ditambah .. ', 
                        {
                            duration: 3000
                        })
                   
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                        tata.error('Gagal', 'Data Gagal diubah ', {
                            duration: 3000
                        })
                    }
                             
                });
                $('#Modal_Add').modal('hide');
      
                return false;   
                           
            })

            $('#form-edit-kegiatan').submit(function() {
           // console.log('xx');
                var data =$('#form-edit-kegiatan').serialize();
            
                //tambah
                // die;
             //  console.log(data);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Master/update_kegiatan')?>",
                    data : data,
                    success: function(response){
                       //console.log(response.data);
                        
                        $('[name="e_kodering_kegiatan"]').val("");
                        $('[name="e_nama_kegiatan"]').val("");
                        $('[name="e_id_program"]').val(0);
                              
                        kegtable.ajax.reload(null,false);
                        tata.success('Sukses', 'Kegiatan Berhasil Berubah .. ', {
                            duration: 3000
                        })
                        $('#Modal_Edit').modal('hide');
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                        tata.error('Gagal', 'Program Gagal diubah ', {
                            duration: 3000
                        })
                    }
                             
                });
                $('#Modal_Add').modal('hide');
      
                return false;   
                           
            })

            $('#form-tambah-uraian').submit(function() {
           // console.log('xx');
                var data =$('#form-tambah-uraian').serialize();
            
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Master/save_uraian')?>",
                    data : data,
                    success: function(response){
                       //console.log(response.data);
                        
                        $('[name="kodering_uraian"]').val("");
                        $('[name="nama_uraian"]').val("");
                        uratable.ajax.reload(null,false);
                        tata.success('Sukses', 'Uraian Berhasil Ditambah .. ', 
                        {
                            duration: 3000
                        })
                   
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                        tata.error('Gagal', 'Data Gagal diubah ', {
                            duration: 3000
                        })
                    }
                             
                });
                $('#Modal_Add').modal('hide');
      
                return false;   
                           
            })

            $('#form-edit-uraian').submit(function() {
           // console.log('xx');
                var data =$('#form-edit-uraian').serialize();
            
                //tambah
                // die;
             //  console.log(data);
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('Master/update_uraian')?>",
                    data : data,
                    success: function(response){
                       //console.log(response.data);
                        
                        $('[name="e_kodering_uraian"]').val("");
                        $('[name="e_nama_uraian"]').val("");
                              
                        uratable.ajax.reload(null,false);
                        tata.success('Sukses', 'Uraian Berhasil Berubah .. ', {
                            duration: 3000
                        })
                        $('#Modal_Edit').modal('hide');
                
                        
                        //$('#Modal_Edit').modal('hide');
                    }, 
                    error: function(response){
                        console.log(response);
                        tata.error('Gagal', 'Uraian Gagal diubah ', {
                            duration: 3000
                        })
                    }
                             
                });
                $('#Modal_Add').modal('hide');
      
                return false;   
                           
            })



            //kondisi edit
            $('#form-edit-barang').submit(function() {
                $('#e_btn_save_brg_pengadaan').attr('disabled','disabled');
                var harga_satuan  = $('#hs').val();
                var e_harga_satuan  = $('#ehs').val();
                harga_satuan = harga_satuan.replace(/\./g,'');
                e_harga_satuan = e_harga_satuan.replace(/\./g,'');
                var data =$('#form-edit-barang').serialize()+'&harga_satuan='+ harga_satuan+'&e_harga_satuan='+ e_harga_satuan;
                    //var data = $('#form-edit-barang').serialize();
                    //kondisi add
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
                        url  : "<?php echo base_url('Pengadaan/update_pengadaan')?>",
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
                            $('[name="e_kuantitas"]').val("");
                            $('[name="e_satuan"]').val("");
                            $('[name="e_catatan"]').val("");
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
                    url  : "<?php echo base_url('Pengadaan/save_detail_pengadaan')?>",
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
                return false;
                
            }            
                
            })

            //validasi record to database
            $('#btn_valid').on('click',function(){
             var id = $('#id_pengadaan').val();
            // console.log("id");
             //console.log(id);
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Pengadaan/kirim_rtp')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_pengadaan"]').val("");
                    
                }
            });
            $('#Modal_Validasi').modal('hide');
            //$('#Modal_Edit').modal('show');
            ptable.ajax.reload(null,false);
            
            return false;
        });

        //delete record to database
         $('#btn_hapus').on('click',function(){
             var id = $('#id_hapus').val();
            // console.log("id");
             //console.log(id);
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Pengadaan/deletedetail')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_hapus"]').val("");
                    tata.success('Sukses', 'Data Berhasil Dihapus.. ', 
                    {
                        duration: 3000
                    })
                   
                    
                },
                error: function(response){
                    console.log(response);
                    tata.success('Gagal!', 'Data Gagal Dihapus.. ', 
                    {
                        duration: 3000
                    })
                }
            });
            $('#Modal_Delete').modal('hide');
            //$('#Modal_Edit').modal('show');
            dptable.ajax.reload();
            ptable.ajax.reload();
            
            return false;
        });
        
        function CetakUsulan(id){
            //console.log("cetak");
            //console.log(id);
            //var id = id;
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Pengadaan/CetakUsulan')?>",
                // dataType : "JSON",
                data : {id:id},
               
            });
        }
        
        function Edittemp(x){
            var  id_keg, id_subkeg;
            edit="edit";
            
            // bukakegiatantemp();
            // bukasubkegiatantemp();
            //console.log(x);die;
            var id = x;
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Pengadaan/get_id_temp')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            //console.log(data);
                            $('#id_program').focus();
                           // $('#id_program').val(data[0].id_program).trigger('change');
                              $('#id_program').append('<option value="'+data[0].id_program+'" selected>'+data[0].kodering_program+'-'+data[0].nama_program+'</option>');
                              $('#id_kegiatan').append('<option value="'+data[0].id_kegiatan+'" selected>'+data[0].kodering_kegiatan+'-'+data[0].nama_kegiatan+'</option>');
                              $('#id_subkegiatan').append('<option value="'+data[0].id_subkegiatan+'" selected>'+data[0].kodering_kegiatan+'-'+data[0].nama_subkegiatan+'</option>');
                      
                           
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
                url  : "<?php echo base_url('Pengadaan/DeleteTemp')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            dpttable.ajax.reload();
                            
                        }
                    });
            return false;
                
    }
  
   
        function BukaEditPengguna(id){
           //console.log(id);
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Master/get_id_pengguna')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            console.log(data[0]);
                                                
                            $('#e_id_user').val(data[0].id_user);
                            $('#e_unit_kerja').val(data[0].unit_kerja);
                            $('#e_ukl').val(data[0].unit_kerja_lengkap);
                            $('#e_username').val(data[0].username);
                            $('#e_pass').val(data[0].password);
                            $('#e_role').val(data[0].role);
                            $('#e_blokir').val(data[0].isblokir);
                            $('#e_bidang').val(data[0].bidang);
                            $('#e_direksi').val(data[0].direksi);
                            
                            $('#Modal_Edit_Pengguna').modal('show');
                            
                        }
                    });
            return false;

            
        }
        function BukaEditProgram(id){
            // $('#Modal_Edit').on('shown.bs.modal', function () {
            //     dptable.columns.adjust();
            // });  
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Master/get_id_program')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            console.log(data[0]);
                                                
                            $('#e_id_program').val(data[0].id_program);
                            $('#e_kodering_program').val(data[0].kodering_program);
                            $('#e_nama_program').val(data[0].nama_program);
                            
                            $('#Modal_Edit').modal('show');
                            
                        }
                    });
            return false;

         
            $('#Modal_Edit').modal('show');
        }
        function BukaEditKegiatan(id){
            // $('#Modal_Edit').on('shown.bs.modal', function () {
            //     dptable.columns.adjust();
            // });  
            $('#e_id_program').select2({'width': '-webkit-fill-available'});
            $('#e_id_program').empty();
            ambileprogram();
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Master/get_id_kegiatan')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            console.log(data[0]);
                                                
                        //    $('#e_id_program').val(data[0].id_program);
                            $('#e_id_program').append('<option value="'+data[0].id_program+'" selected>'+data[0].kodering_program+'-'+data[0].nama_program+'</option>');
                            $('#e_id_program').val(data[0].id_program).trigger('change');
                            $('#e_id_kegiatan').val(data[0].id_kegiatan);
                            $('#e_kodering_kegiatan').val(data[0].kodering_kegiatan);
                            $('#e_nama_kegiatan').val(data[0].nama_kegiatan);
                            
                            $('#Modal_Edit').modal('show');
                            
                        }
                    });
            return false;

         
            $('#Modal_Edit').modal('show');
        }
        function BukaEditSubkegiatan(id){
            // $('#Modal_Edit').on('shown.bs.modal', function () {
            //     dptable.columns.adjust();
            // });  
            $('#e_id_kegiatan').select2({'width': '-webkit-fill-available'});
            $('#e_id_kegiatan').empty();
            ambilekegiatan();
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Master/get_id_subkegiatan')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            console.log(data[0]);
                                                
                        //    $('#e_id_program').val(data[0].id_program);
                            $('#e_id_kegiatan').append('<option value="'+data[0].id_kegiatan+'" selected>'+data[0].kodering_kegiatan+'-'+data[0].nama_kegiatan+'</option>');
                            $('#e_id_kegiatan').val(data[0].id_kegiatan).trigger('change');
                            $('#e_id_subkegiatan').val(data[0].id_subkegiatan);
                            $('#e_kodering_subkegiatan').val(data[0].kodering_subkegiatan);
                            $('#e_nama_subkegiatan').val(data[0].nama_subkegiatan);
                            
                            $('#Modal_Edit').modal('show');
                            
                        }
                    });
            return false;

         
            $('#Modal_Edit').modal('show');
        }
        function BukaEditUraian(id){
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Master/get_id_uraian')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                        //    console.log(data[0]);
                                                
                            $('#e_id_uraian').val(data[0].id_uraian);
                            $('#e_kodering_uraian').val(data[0].kodering_uraian);
                            $('#e_nama_uraian').val(data[0].nama_uraian);
                            
                            $('#Modal_Edit').modal('show');
                            
                        }
                    });
            return false;

         
            $('#Modal_Edit').modal('show');
        }
        function BukaEdit(x){
                e_rupiah.addEventListener("keyup", function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                e_rupiah.value = formatRupiah(this.value, "Rp. ");
                });
                var id = x;
                //dptable.ajax.reload(null,false);
                $('#e_id_program').select2({'width': '-webkit-fill-available'});
                $('#e_id_kegiatan').select2({'width': '-webkit-fill-available'});
                $('#e_id_subkegiatan').select2({'width': '-webkit-fill-available'});
                $('#e_id_uraian').select2({'width': '-webkit-fill-available'});
                $('#e_sumber_dana').select2({'width': '-webkit-fill-available'});
                $('#e_prioritas').select2({'width': '-webkit-fill-available'});

                ambileprogram();
                ambileuraian();

                dptable.destroy();
                dptable = $('#DetailPengadaanTable').DataTable( {
                'processing'	: true,
                //'serverSide'	: true,
                'scrollX'   :true,
                'searchHighlight': true,
               
                ajax:{
                    type:"POST",
                    url   : '<?php echo base_url('Pengadaan/data_detail_pengadaan')?>',
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
                    return "<p>Prioritas : "+ full.prioritas +" <br>Sumber Dana : "+full.sumber_dana.toUpperCase()+"<br>Harga Satuan : "+commaSeparateNumber(full.harga_satuan)+"<br><b>Harga Total : "+ commaSeparateNumber(full.total_harga)+"</b><p>";

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
                        console.log('edit');
                        console.log(pageTotal);
            
                        // Update footer
                        $(api.column(5).footer()).html(
                            'Rp '+ commaSeparateNumber(pageTotal) +' <br/>(Rp '+ commaSeparateNumber(total) +' Total Semua)' 
                        );
                    }   
            } );

            $('#Modal_Edit').on('shown.bs.modal', function () {
                dptable.columns.adjust();
            });  
            $('#Modal_Edit').modal('show');
            //document.getElementById("unit_kerja").innerHTML="baru";                           

            //return false;
        }
        
        function BukaPersetujuan(x){
                e_rupiah.addEventListener("keyup", function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                e_rupiah.value = formatRupiah(this.value, "Rp. ");
                });
                var id = x;
                //dptable.ajax.reload(null,false);
                $('#e_id_program').select2({'width': '-webkit-fill-available'});
                $('#e_id_kegiatan').select2({'width': '-webkit-fill-available'});
                $('#e_id_subkegiatan').select2({'width': '-webkit-fill-available'});
                $('#e_id_uraian').select2({'width': '-webkit-fill-available'});
                $('#e_sumber_dana').select2({'width': '-webkit-fill-available'});
                $('#e_prioritas').select2({'width': '-webkit-fill-available'});

                ambileprogram();
                ambileuraian();

                dptable.destroy();
                dptable = $('#DetailPengadaanTable').DataTable( {
                'processing'	: true,
                //'serverSide'	: true,
                'scrollX'   :true,
                'searchHighlight': true,
               
               
                 
               
                ajax:{
                    type:"POST",
                    url   : '<?php echo base_url('Pengadaan/data_detail_pengadaan')?>',
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
                    return "<p>Prioritas : "+ full.prioritas +" <br>Sumber Dana : "+full.sumber_dana.toUpperCase()+"<br>Harga Satuan : "+full.harga_satuan+"<br><b>Harga Total (PPH+Inflasi) : "+full.total_harga+"</b><p>";

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
                        console.log('edit');
                        console.log(pageTotal);
            
                        // Update footer
                        $(api.column(5).footer()).html(
                            'Rp '+ commaSeparateNumber(pageTotal) +' <br/>(Rp '+ commaSeparateNumber(total) +' Total Semua)' 
                        );
                    }
             
                    
            } );

            $('#Modal_Persetujuan').on('shown.bs.modal', function () {
                dptable.columns.adjust();
            });  
            $('#Modal_Persetujuan').modal('show');
            //document.getElementById("unit_kerja").innerHTML="baru";                           

            //return false;
        }
    
        
        function EditPengadaan(x){
            var id = x;
            edit="edit";
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Pengadaan/get_id_detail')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    //console.log(data);
                    // $('#e_id_program').empty();
                    // $('#e_id_kegiatan').empty();
                    // $('#e_id_subkegiatan').empty();
                    $('#e_id_program').focus();
                    // $('#id_program').val(data[0].id_program).trigger('change');
                    $('#e_id_program').append('<option value="'+data[0].id_program+'" selected>'+data[0].kodering_program+'-'+data[0].nama_program+'</option>');
                    $('#e_id_kegiatan').append('<option value="'+data[0].id_kegiatan+'" selected>'+data[0].kodering_kegiatan+'-'+data[0].nama_kegiatan+'</option>');
                    $('#e_id_subkegiatan').append('<option value="'+data[0].id_subkegiatan+'" selected>'+data[0].kodering_kegiatan+'-'+data[0].nama_subkegiatan+'</option>');
                    
                    
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
                function KirimPersetujuan(x){
                    //console.log(x);
                    $('#id_pengadaan').val(x);
                    $('#Modal_Validasi').modal('show');
                    
                    // $('#Modal_Konfirmasi').modal({
            // show: true
            // })
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
                    url: '<?php echo base_url('Pengadaan/ambil_kegiatan')?>',
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
                    url: '<?php echo base_url('Pengadaan/ambil_subkegiatan')?>',
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
                    url: '<?php echo base_url('Pengadaan/ambil_kegiatantemp')?>',
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
                    url: '<?php echo base_url('Pengadaan/ambil_subkegiatantemp')?>',
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
                    url: '<?php echo base_url('Pengadaan/ambil_program')?>',
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
        function ambilkegiatan(){
            $.ajax ({
                    // type: 'POST',
                    url: '<?php echo base_url('Master/ambil_kegiatan')?>',
                    dataType: 'json',
                    success: function(response){
                        $('#id_kegiatan').append('<option value="0">- Pilih Nama kegiatan -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#id_kegiatan').append(
                                    $('<option></option>').val(value['id_kegiatan']).html(value['kodering_kegiatan'] +"-"+ value['nama_kegiatan'])
                                );
                        });        
                        }
            });
       
        }
        function ambiluraian(){
            var id_jenis_belanja =1;
            $.ajax ({
                    type: 'POST',
                    url: '<?php echo base_url('Pengadaan/ambil_uraian')?>',
                    dataType: 'json',
                    data : {id_jenis_belanja:id_jenis_belanja},
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
                    url: '<?php echo base_url('Pengadaan/ambil_program')?>',
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
        function ambilekegiatan(){
            $.ajax ({
                    // type: 'POST',
                    url: '<?php echo base_url('Master/ambil_kegiatan')?>',
                    dataType: 'json',
                    success: function(response){
                        $('#e_id_kegiatan').append('<option value="0">- Pilih Nama kegiatan -</option>');
                        
                        $.each(response.data, function(key,value){
                                $('#e_id_kegiatan').append(
                                    $('<option></option>').val(value['id_kegiatan']).html(value['kodering_kegiatan'] +"-"+ value['nama_kegiatan'])
                                );
                        });        
                        }
            });
       
        }
        function ambileuraian(){
            var id_jenis_belanja =1;
            $.ajax ({
                    type: 'POST',
                    url: '<?php echo base_url('Pengadaan/ambil_uraian')?>',
                    dataType: 'json',
                    data : {id_jenis_belanja:id_jenis_belanja},
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
                    url: '<?php echo base_url('Pengadaan/ambil_kegiatan')?>',
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
                    url: '<?php echo base_url('Pengadaan/ambil_subkegiatan')?>',
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
        function DeleteProgram(id){
            $.ajax ({
                type: 'POST',
                url: '<?php echo base_url('Master/tampil_program')?>',
                dataType: 'json',
                data : {id:id},
                
                success: function(response){
                    //console.log(response[0]);
                    $.each(response, function(key,value){
                        //console.log(value['nama_program']);
                        $('#text_program').html(value['nama_program']);
                    });
                }
            });
            // $('#id_seksi').val(2);
            $('#id_hapus').val(id);
            $('#Modal_Delete').modal('show');
        }

        //delete record to database
        $('#btn_hapus_program').on('click',function(){
             var id = $('#id_hapus').val();
            // console.log("id");
             //console.log(id);
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Master/delete_program')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_hapus"]').val("");
                    tata.success('Sukses', 'Data Berhasil Dihapus.. ', 
                    {
                        duration: 3000
                    })
                },
                   
                error: function(response){
                    console.log(response);
                    tata.error('Gagal!', 'Data Gagal Dihapus.. ', 
                    {
                        duration: 3000
                    })
                }
            });
            $('#Modal_Delete').modal('hide');
            //$('#Modal_Edit').modal('show');
            //dptable.ajax.reload();
            protable.ajax.reload();
            
            return false;
        });

        function DeleteKegiatan(id){
            $.ajax ({
                type: 'POST',
                url: '<?php echo base_url('Master/tampil_kegiatan')?>',
                dataType: 'json',
                data : {id:id},
                
                success: function(response){
                    //console.log(response[0]);
                    $.each(response, function(key,value){
                        //console.log(value['nama_program']);
                        $('#text_kegiatan').html(value['nama_kegiatan']);
                    });
                }
            });
            // $('#id_seksi').val(2);
            $('#id_hapus').val(id);
            $('#Modal_Delete').modal('show');
        }

        //delete record to database
        $('#btn_hapus_kegiatan').on('click',function(){
             var id = $('#id_hapus').val();
            // console.log("id");
             //console.log(id);
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Master/delete_kegiatan')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_hapus"]').val("");
                    tata.success('Sukses', 'Data Berhasil Dihapus.. ', 
                    {
                        duration: 3000
                    })
                },
                   
                error: function(response){
                    console.log(response);
                    tata.error('Gagal!', 'Data Gagal Dihapus.. ', 
                    {
                        duration: 3000
                    })
                }
            });
            $('#Modal_Delete').modal('hide');
            //$('#Modal_Edit').modal('show');
            //dptable.ajax.reload();
            kegtable.ajax.reload();
            
            return false;
        });
        function DeleteSubkegiatan(id){
            $.ajax ({
                type: 'POST',
                url: '<?php echo base_url('Master/tampil_subkegiatan')?>',
                dataType: 'json',
                data : {id:id},
                
                success: function(response){
                    //console.log(response[0]);
                    $.each(response, function(key,value){
                        //console.log(value['nama_program']);
                        $('#text_subkegiatan').html(value['nama_subkegiatan']);
                    });
                }
            });
            // $('#id_seksi').val(2);
            $('#id_hapus').val(id);
            $('#Modal_Delete').modal('show');
        }

        //delete record to database
        $('#btn_hapus_subkegiatan').on('click',function(){
             var id = $('#id_hapus').val();
            // console.log("id");
             //console.log(id);
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Master/delete_subkegiatan')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_hapus"]').val("");
                    tata.success('Sukses', 'Data Berhasil Dihapus.. ', 
                    {
                        duration: 3000
                    })
                },
                   
                error: function(response){
                    console.log(response);
                    tata.error('Gagal!', 'Data Gagal Dihapus.. ', 
                    {
                        duration: 3000
                    })
                }
            });
            $('#Modal_Delete').modal('hide');
            //$('#Modal_Edit').modal('show');
            //dptable.ajax.reload();
            subtable.ajax.reload();
            
            return false;
        });
        function DeleteUraian(id){
            $.ajax ({
                type: 'POST',
                url: '<?php echo base_url('Master/tampil_uraian')?>',
                dataType: 'json',
                data : {id:id},
                
                success: function(response){
                    //console.log(response[0]);
                    $.each(response, function(key,value){
                        //console.log(value['nama_program']);
                        $('#text_uraian').html(value['nama_uraian']);
                    });
                }
            });
            // $('#id_seksi').val(2);
            $('#id_hapus').val(id);
            $('#Modal_Delete').modal('show');
        }

        //delete record to database
        $('#btn_hapus_uraian').on('click',function(){
             var id = $('#id_hapus').val();
            // console.log("id");
             //console.log(id);
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('Master/delete_uraian')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_hapus"]').val("");
                    tata.success('Sukses', 'Data Berhasil Dihapus.. ', 
                    {
                        duration: 3000
                    })
                },
                   
                error: function(response){
                    console.log(response);
                    tata.error('Gagal!', 'Data Gagal Dihapus.. ', 
                    {
                        duration: 3000
                    })
                }
            });
            $('#Modal_Delete').modal('hide');
            //$('#Modal_Edit').modal('show');
            //dptable.ajax.reload();
            uratable.ajax.reload();
            
            return false;
        });

        
        
        
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