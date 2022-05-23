<?php

class transaction{

    // public function addData($besarPinjaman){
    //     if (isset($besarPinjaman)) {
    //         $pinjamanawal  = $besarPinjaman;
    //         $tenor  = $_POST['tenor'];
    //         $startdate = $_POST['tanggalpinjaman'];

    //         $_SESSION['besarpinjaman'] = $pinjamanawal;
    //         $_SESSION['tenor'] = $tenor;
    //         $_SESSION['tanggalpinjaman'] = $startdate;
    //     } else {
    //         $pinjamanawal  = $_SESSION['besarpinjaman'];
    //         $tenor  = $_SESSION['tenor'];
    //         $startdate = $_SESSION['tanggalpinjaman'];
    //     }
    // }

    public function simulation(){

        return  "hey";
    }

    public function rincian($date, $pinjaman){

        $timeInterval = new DatePeriod(
                                new DateTime($date[0]),
                                new DateInterval($date[1]),
                                new DateTime($date[2])
                            );

                            $angsuranpokok = ceil($pinjaman[0] /$pinjaman[1]);


                            foreach ($timeInterval as $key => $value) {
                                echo "<table>

                                                <tr>
                                                    <th>Periode</th>
                                                    <th>Angsuran Bunga</th>
                                                    <th>Angsuran Pokok</th>
                                                    <th>Angsuran Total</th>
                                                    <th>Sisa Angsuran</th>
                                                </tr>";
                                $angsuranbunga = ceil($sisapinjaman * $bunga);
                                $angsurantotal = ceil($angsuranpokok + $angsuranbunga);
                                $totalangsuran += $angsurantotal;
                                $angsuranbunga_v = number_format($angsuranbunga);
                                $angsuranpokok_v = number_format($angsuranpokok);
                                $angsurantotal_v = number_format($angsurantotal);
                                $sisapinjaman = ceil($sisapinjaman - $angsuranpokok);
                                if ($sisapinjaman < 0) {
                                    $sisapinjaman = 0;
                                }
                                $sisapinjaman_v = number_format($sisapinjaman);
                                $date = $value->format('Y-m-d');
                                echo "<tr>";
                                echo "<td>$date</td>";
                                echo "<td>Rp.$angsuranbunga_v</td>";
                                echo "<td>Rp.$angsuranpokok_v</td>";
                                echo "<td>Rp.$angsurantotal_v</td>";
                                echo "<td>Rp.$sisapinjaman_v</td>";
                                echo "</tr>";
                            }
        // return "tara";
    }

    public function total($totalangsuran){
        echo number_format($totalangsuran);
    }

}

?>