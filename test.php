<div class="card bg-light text-black shadow m-2">
    <div class="card-body">
        <?php
        $sql = "SELECT * FROM tb_praktikan LIMIT 10";
        $query_exc = $conn->query($sql);
        $jumlah_baris = $query_exc->rowCount();
        $no = 1;
        while ($data_array = $query_exc->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <label for="ck<?= $no ?>">ck<?= $no ?></label>
            <input type="checkbox" class="ck<?= $no ?>" name="ck<?= $no ?>" id="ck<?= $no ?>" value="<?= $data_array['nama_praktikan']; ?>"><br>
        <?php
            $no++;
        }
        ?>
        <input type="hidden" name="jumlah_baris" id="jumlah_baris" value="<?= $jumlah_baris ?>">
        <a class="tambah_init btn btn-success">TAMBAH</a>
        <div id="tampil"></div>
        <script>
            $('.tambah_init').click(function() {
                var jumlah_baris = $('#jumlah_baris').val();
                const cb_checked_ar = [];
                var no = 1;
                while (no <= jumlah_baris) {
                    var cb_checked = $('input[class="ck' + no + '"]:checked').val();
                    if (cb_checked != undefined) {
                        cb_checked_ar[no] = cb_checked;
                    }
                    console.log(cb_checked)
                    no++;
                }

                console.log(cb_checked_ar)
                $('#tampil').html(cb_checked_ar);
            });
        </script>
    </div>
</div>