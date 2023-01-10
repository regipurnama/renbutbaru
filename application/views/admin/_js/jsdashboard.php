<!-- Halaman Pengadaan  -->
<script type="text/javascript">
    var role = "<?= $profile->role ?>";
    var unit_kerja = "<?= $profile->unit_kerja ?>";
    //console.log(id_role);

    var dpttable="",dptable="",ptable="",persetujuantable="";
    var edit="";
    var idpermohonan="";
    var rupiah = document.getElementById("hs");
    var e_rupiah = document.getElementById("ehs");

    $(document).ready(function(){
     
        
          
        ptable = $('#BelanjaperunitTable').DataTable( {
            'processing'	: true,
            'scrollX'   :true,
            //'serverSide'	: true,
            ajax:{
                url   : '<?php echo base_url('RKBU/belanjaperunit')?>',
                dataSrc : function(response){
                    // console.log(response.data.length);
                  var row = new Array();
                  var i = 1;
                  var button;
                  var hitung = response.data.length;
                    if (hitung>0) {
                        for(var x in response.data){
                     
                        //<i class="far fa-paper-plane"></i>
                        row.push({
                          'no'                : i,
                          'unit_kerja'        : response.data[x].unit_kerja,
                          'total'              : response.data[x].total,
                          
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
              {'data': 'total', 'render':
                function (data, type, full) {
                    return "Rp. "+commaSeparateNumber(full.total);
                }
              
              },
              
             ],
             columnDefs: [ 
                    {  targets: 0, width: '5%' }, 
                    {  targets: 1, width: '50%' }, 
                    {  targets: 2, width: '40%' }
                   
                
                 ] ,
                
        } );
    
    });  
        function commaSeparateNumber(val) {
            while (/(\d+)(\d{3})/.test(val.toString())) {
                val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
            }
            return val;
        }
</script>

<!-- AKHIR HALAMAN Pengadaan -->