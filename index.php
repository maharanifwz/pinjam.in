<?php
include 'config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pinjam.in</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Link CSS -->
    <link rel="stylesheet" href="styles.css">

    <!-- Link Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <section id="home">
        <div class="container-fluid">
            <div class="wrapper">
                <header>
                    <nav>
                        <a href="#" class="logo">
                            pinjam.in
                        </a>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <?php if (isset($_SESSION['state'])) { ?>
                                <li><a href="logout.php">Keluar</a></li>
                            <?php } else { ?>
                                <li><a href="login.php">Masuk</a></li>
                                <li><a href="register.php">Daftar</a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </header>
            </div>

            <div class="title">
                <h1 class="heading">Hadir untuk mempermudah anda dalam merencanakan finansial anda.</h1>
                <p class="heading-desc">Ingin mengetahui bagaimana pinjaman yang kamu ambil akan membebani
                    finansial mu kedepannya? Coba pinjamin untuk melihat rencana pinjaman mu!</p>
                <a href="#installment"><button type="button">Mulai</button></a>
                    
            </div>

        </div>
    </section>

    <section id="installment">
        <div class="container-fluid">
            <h1 class="installment-title">SIMULASIKAN PINJAMAN ANDA</h1>
            <div class="installment-text">
                <h2 class="installment-desc">Cari Tahu Angsuran Mu Disini</h2>
                <form action="" method="POST">
                    <div>
                        <label for="besarpinjaman">Besar Pinjaman</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="besarpinjaman" id="besarpinjaman" required>
                    </div>
                    <div>
                        <!-- <label for="tenorpinjaman">Tenor Pinjaman</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="tenorpinjaman" id="tenorpinjaman" required> -->
                        <label for="tenorpinjaman">Tenor Pinjaman</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="tenor" id="tenor">
                            <option value="">--Silahkan pilih tenor yang tersedia--</option>
                            <option value="03d">3 Hari</option>
                            <option value="07d">7 hari</option>
                            <option value="14d">14 Hari</option>
                            <option value="30d">30 Hari</option>
                            <option value="3m">3 Bulan</option>
                            <option value="6m">6 Bulan</option>
                            <option value="12m">12 Bulan</option>
                        </select>
                        <br>
                    </div>
                    <div>
                        <label for="tanggalpinjaman">Tanggal Pinjaman</label>&nbsp;&nbsp;&nbsp;
                        <input type="date" name="tanggalpinjaman" id="tanggalpinjaman" required>
                    </div>
                    <div class="center">
                        <input class="submit" id="simpan" type="submit" value="Simpan Data Pinjaman" name="simpanData">
                    </div>
                </form>
            </div>
        </div>
    </section>
   
        <section id="menu">
            <div class="container-fluid">
                <h1 class="installment-title">CARI TAHU KEBUTUHANMU</h1>
                <div class="box-container">
                    <div class="box">
                        <img src="simulasi.png" alt="Simulasi Angsuran">
                        <h3>Simulasi Angsuran</h3>
                        <p class="box-desc">Cek bagaimana angsuran yang harus dibayarkan secara efektif perbulannya beserta bunga nya.</p>
                        <button type="button">Coba Bayar</button>
                    </div>
                    <div class="box">
                        <img src="rincian.png" alt="Rincian Angsuran">
                        <h3>Rincian Angsuran</h3>
                        <p class="box-desc">Cek bagaimana perhitungan angsuran yang harus dibayarkan perbulannya secara rinci.</p>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#detailsModal">Cek Rincian</button>
                    </div>
                    <div class="box">
                        <img src="total.png" alt="Total Angsuran">
                        <h3>Total Angsuran</h3>
                        <p class="box-desc">Cek angsuran selanjutnya yang harus dibayarkan berdasarkan perhitungan dengan bunga.</p>
                        <button type="button">Cek Total</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="simulation">
            <div class="container-fluid">
                <div class="simulation-text">
                    <h3 class="installment-desc">Simulasi Angsuran</h3>
                    <div class="simulation-desc">
                        <label for="angsuran">Angsuran yang dibayarkan</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="angsuran" id="angsuran" required>
                        <!-- Button trigger modal -->
                        <button type="button" class="simulation-btn" data-bs-toggle="modal" data-bs-target="#detailsModal">
                            Coba Bayar
                        </button>
                   
                    <!-- Modal -->
                    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tabel Angsuran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table>

                                        <tr>
                                            <th>Periode</th>
                                            <th>Angsuran Bunga</th>
                                            <th>Angsuran Pokok</th>
                                            <th>Angsuran Total</th>
                                            <th>Sisa Angsuran</th>
                                        </tr>

                                        <?php

                                        $sisapinjaman  = $_POST['besarpinjaman'];
                                        $tenor  = $_POST['tenor'];
                                        $startdate = $_POST['tanggalpinjaman'];

                                        $periode = (int)substr($tenor, 0, 2); #mengambil 2 karakter pertama

                                        $bunga = 0;
                                        if (substr($tenor, -1) == 'm') { #mengambil karakter terakhir
                                            $bunga = 0.1;
                                            $enddate = date('Y-m-d', strtotime($startdate . ' + ' . $periode . " months"));
                                        } else {
                                            $bunga = 0.005;
                                            $enddate = date('Y-m-d', strtotime($startdate . ' + ' . $periode . " days"));
                                        }


                                        $timeInterval = new DatePeriod(
                                            new DateTime($startdate),
                                            new DateInterval('P1D'),
                                            new DateTime($enddate)
                                        );

                                        $angsuranpokok = ceil($sisapinjaman / $periode);

                                        foreach ($timeInterval as $key => $value) {
                                            $angsuranbunga = ceil($sisapinjaman * $bunga);
                                            $angsurantotal = ceil($angsuranpokok + $angsuranbunga);
                                            $angsuranbunga_v = number_format($angsuranbunga);
                                            $angsuranpokok_v = number_format($angsuranpokok);
                                            $angsurantotal_v = number_format($angsurantotal);
                                            $sisapinjaman_v = number_format($sisapinjaman);
                                            $date = $value->format('Y-m-d');
                                            echo "<tr>";
                                            echo "<td>$date</td>";
                                            echo "<td>Rp.$angsuranbunga_v</td>";
                                            echo "<td>Rp.$angsuranpokok_v</td>";
                                            echo "<td>Rp.$angsurantotal_v</td>";
                                            echo "<td>Rp.$sisapinjaman_v</td>";
                                            echo "</tr>";
                                            $sisapinjaman = ceil($sisapinjaman - $angsuranpokok);
                                        }
                                        ?>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>

    
</body>

</html>