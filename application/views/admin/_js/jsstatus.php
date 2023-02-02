<!-- Halaman Modal  -->
<script type="text/javascript">
    var role = "<?= $profile->role ?>";
    var unit_kerja = "<?= $profile->unit_kerja ?>";
    var id_user = "<?= $profile->id_user ?>";
    //console.log(id_role);

    var dpttable="",dptable="",ptable="",statustable="";
    var edit="";
    var idpermohonan="";
    var rupiah = document.getElementById("hs");
    var e_rupiah = document.getElementById("e_hs");

    $(document).ready(function(){
            rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });
        
        
        //$('#id_subkegiatan').select2({'width': '-webkit-fill-available'});
        //$('#id_subkegiatan').select2({'width': '-webkit-fill-available'});
        $('#p_unit_kerja').html((unit_kerja).toUpperCase());
                          
               
      statustable = $('#StatusTable').DataTable( {
            'processing'	: true,
            'sScrollX'      : '100%',
            //'serverSide'	: true,
            select: {
             style: 'multi'
            },

            ajax:{
                 url   : '<?php echo base_url('Status/data_status_pengadaan')?>',
                dataSrc : function(response){
                  var row = new Array();
                //   console.log(role);
                  var i = 1;
                  var hitung = response.data.length;
                    if (hitung>0) {
                      for(var x in response.data){
                        if(role=='user'){
                            var button = '<button class="btn btn-info btn-sm btn-flat"><i class="fas fa-info"></i></button>';
                            
                        }else{
                            var button = '<button onClick="Editstatus('+response.data[x].id_detail_pengadaan+')" name="btn_edit" class="btn btn-warning btn-sm btn-flat" title="Edit Data"><i class="fas fa-pencil-alt"></i></button>';

                        }
                        if(!!response.data[x].status){
                            if(response.data[x].status=='diakomodir'){
                                status = '<span class="badge badge-success">Usulan Diakomodir</span>';
                            }else if(response.data[x].status=='pending'){
                                status = '<span class="badge badge-warning">Usulan Dipending</span>';
                            }else if(response.data[x].status=='tolak'){
                                status = '<span class="badge badge-danger">Usulan Ditolak</span>';
                            }

                        }else{
                            var status = '<span class="badge badge-info">Masih Tahap Usulan</span>';

                        }
                        if(!!response.data[x].nama_file){
                                var download = response.data[x].nama_file +'<a href="../uploadfile/'+response.data[x].nama_file+'" name="btn_download" class="btn btn-primary btn-xs btn-flat" title="Download Dokumen" target="_blank">Download Dokumen <i class="fa fa-download"></i></a>';

                            }else{
                                var download ='<span class="badge badge-dark">Tidak ada File Pembanding</span>';

                            } row.push({
                          'no'                : i,
                          'id_detail_pengadaan'       : response.data[x].id_detail_pengadaan,
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
                          'status_usulan'              : status,
                          'aksi'              : button,
                          'unit_kerja'              :  response.data[x].unit_kerja,
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
               {'data':'no'},
            //   {'data': 'id_detail_pengadaan','render':
            //       function (data, type, full) {
            //         return "<input type='checkbox' name='id_detail' id='id_detail_pengadaan_"+full.no+"'  value="+full.id_detail_pengadaan+" class='form form-control id_detail_pengadaan_"+full.no+"'>";
            //     }},
              {'data': 'unit_kerja','render':
                  function (data, type, full) {
                    return "<p> "+full.unit_kerja+"</p>";
                }
              
              },
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
              
              {'data': 'prioritas'},
              {'data': 'nama_file'},
              {'data': 'status_usulan'},
              {'data': 'aksi'}

             ],
             order: [[0, 'asc'],[1, 'asc'],[2, 'asc'],[3, 'asc']],
                columnDefs: [ 
                    // {targets: [0,1,2,3,7], visible: false},   
                    //   // {  targets: 0, width: '20%' }, 
                    // {  targets: 1, width: '20%' }, 
                    // {  targets: 2, width: '20%' }, 
                    // {  targets: 3, width: '20%' },                
                    {  targets: 1, width: '35%' }, 
                    {  targets: 2, width: '15%' }, 
                    {  targets: 3, width: '20%' }, 
                    {  targets: 4, width: '5%' }, 
                    {  targets: 5, width: '15%' }, 
                    {  targets: 6, width: '15%' }, 
                    {  targets: 7, width: '15%' } 
                
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

        $('.tambah-status').on('click',function(){
            var cekbok = $('.id_detail_pengadaan');
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

     

            $('#form-status').submit(function() {
                $('#e_btn_save_status').attr('disabled','disabled');
                var form = $('#form-status')[0];
                var formData = new FormData(form);
                    //console.log(data);
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('status/save_status')?>",
                        // dataType : "JSON",
                    //    data : data,
                        data :formData,
                        processData: false,
                        contentType: false,
                        
                        success: function(response){
                      //      console.log(response);
                            $('#e_btn_save_status').removeAttr('disabled');
                            statustable.ajax.reload(null,false);
                                
                            
                            $('#Modal_Edit').modal('hide');
                        }, 
                        error: function(response){
                            console.log(response);
                        }
                    });
                    edit="";
                    $('#e_btn_save_status').html("Tambah Barang");
                    return false;
                    

                });
               
        
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
        
        
        
        function Editstatus(x){
            var  id_keg, id_subkeg;
            edit="edit";
        
            $('#Modal_Edit').modal('show');
            
            // bukakegiatantemp();
            // bukasubkegiatantemp();
            //console.log(x);die;
            var id = x;
            $.ajax({
                type:"POST",
                url  : "<?php echo base_url('Status/get_id_status')?>",
                dataType : "JSON",
                data : {id:id},
                        success: function(data){
                            console.log(data);
                            $('#s_nama_barang').html(data[0].nama_barang);
                            $('#s_volume').html(data[0].kuantitas+' '+data[0].satuan);
                            $('#s_spesifikasi').html(data[0].spesifikasi);
                            $('#e_unit_kerja').html((data[0].unit_kerja).toUpperCase());
                            $('#detail_pengadaan').val(data[0].id_detail_pengadaan);
                            $('#bidang').val(data[0].unit_kerja);
                            $('#user').val(data[0].id_user);
                            $('#id_status').val(data[0].id_status);
                            $('#tindakan:checked').val(data[0].status);
                            $('#deskripsi').val(data[0].deskripsi);
                            $('#volume_status').val(data[0].volume_status);
                            $('#satuan_status').val(data[0].satuan_status);
                            $('#prioritas_status:checked').val(data[0].prioritas_status);
                             
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
                            if(!!response.data[x].nama_file){
                                var download = response.data[x].nama_file +'<a href="../uploadfile/'+response.data[x].nama_file+'" name="btn_download" class="btn btn-primary btn-xs btn-flat" title="Download Dokumen" target="_blank">Download Dokumen <i class="fa fa-download"></i></a>';

                            }else{
                                var download ='<span class="badge badge-dark">Tidak ada File Pembanding</span>';

                            }
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
                                'tipe_barang'           : response.data[x].nama_tipe_barang,
                                'jenis_barang'           : response.data[x].nama_jenis_barang,
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
                                'nama_file'        : download,
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
                        return "<p> "+full.nama_barang +"<br> Spesifikasi : "+ full.spesifikasi+"<br> Tipe Barang : "+ full.tipe_barang + "<br> Jenis Barang : "+ full.jenis_barang;
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
                            $('#e_hs').val(data[0].harga_satuan);
                            
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