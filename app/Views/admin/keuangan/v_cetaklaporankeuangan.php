<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Keuangan $tahun.xls");
?>
<html>

<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>No Pendaftaran</th>
                <th>Tanggal Daftar</th>
                <th>Jurusan</th>
                <th>Jalur Masuk</th>
                <th>Nama</th>
                <th>Formulir</th>
                <th>DPSP</th>
                <th>DPS</th>
                <th>BOPP</th>
                <th>Potongan</th>
                <th>Piutang</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($siswa as $key => $value) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['no_pendaftaran'] ?></td>
                    <td><?= $value['tgl_pendaftaran'] ?></td>
                    <td><?= $value['jurusan'] ?></td>
                    <td><?= $value['jalur_masuk'] ?></td>
                    <td><?= $value['nama_lengkap'] ?></td>
                    <td><?= array_sum(array_column(search(getUang($value['id_siswa']), 'tipe', 'formulir'), 'total')) ?></td>
                    <td><?= array_sum(array_column(search(getUang($value['id_siswa']), 'tipe', 'dpsp'), 'total')) ?></td>
                    <td><?= array_sum(array_column(search(getUang($value['id_siswa']), 'tipe', 'dps'), 'total')) ?></td>
                    <td><?= array_sum(array_column(search(getUang($value['id_siswa']), 'tipe', 'bopp'), 'total')) ?></td>
                    <td>-</td>
                    <td>-</td>
                    <td><?= array_sum(array_column(getUang($value['id_siswa']), 'total')) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </table>
</body>


</html>