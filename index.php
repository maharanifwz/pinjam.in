<?php
include 'config.php';
include 'transaksiController.php';

$trControll = new transaction();

if ((isset($_POST["bayar"])) & (isset($_SESSION['bunga']))) {
    // $pinjamanawal  = $_SESSION['besarPinjaman'];
    // $bunga = $_SESSION['bunga'];
    // $periode = $_SESSION['periode'];
    $pinjamanPeriode1 = $trControll->simulation();
    $trControll->getDataSession();
    if ((isset($_POST['angsuran'])) & ($_POST['angsuran'] < $pinjamanPeriode1)) {
?>
        <div class="alert alert-danger alert-warning alert-dismissible fade show" role="alert">
            <div class="alert-position">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <div>Angsuran yang dibayarkan masih kurang dari target angsuran yang harus dibayarkan untuk periode pertama.</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    } else { ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                Pembayaran valid. Angsuran yang dibayarkan memenuhi minimum dari perhitungan.
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php }


}
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
                <?php if (isset($_SESSION['state'])) { ?>
                    <a href="#installment"><button type="button">Mulai</button></a>
                <?php
                }else {
                ?>
                    <a href="login.php"><button type="button">Mulai</button></a>
                
                <?php } ?>
            </div>

        </div>
    </section>

    <section id="installment">
        <div class="container-fluid">
            <h1 class="installment-title">SIMULASIKAN PINJAMAN ANDA</h1>
            <div class="installment-text">
                <h2 class="installment-desc">Cari Tahu Angsuran Mu Disini</h2>
                <form action="" method="POST">
                    <?php
                    if (isset($_SESSION['besarPinjaman'])) {

                    ?>
                        <div>
                            <label for="besarpinjaman">Besar Pinjaman</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="besarpinjaman" id="besarpinjaman" value="<?php echo "RP." . number_format($_SESSION["besarPinjaman"]) ?>" required>
                        </div>
                        <div>
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
                            <input type="date" name="tanggalpinjaman" id="tanggalpinjaman" value="<?php echo $_SESSION["tanggalPinjaman"] ?>" required>
                        </div>
                        <div class="center">
                            <input class="submit" id="simpan" type="submit" value="Simpan Data Pinjaman" name="simpanData">
                        </div>
                    <?php } else {
                    ?>
                        <div>
                            <label for="besarpinjaman">Besar Pinjaman</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" name="besarpinjaman" id="besarpinjaman" required>
                        </div>
                        <div>
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

                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </section>

    <section id="menu">
        <div class="container-fluid">
            <h1 class="installment-title">CARI TAHU KEBUTUHANMU</h1>
            <div class="box-container">
                <div class="box">
                    <img src="/img/simulasi.png" alt="Simulasi Angsuran">
                    <h3>Simulasi Angsuran</h3>
                    <p class="box-desc">Cek bagaimana angsuran yang harus dibayarkan secara efektif perbulannya beserta bunga nya.</p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#simulasiModal">Coba Bayar</button>
                </div>
                <div class="box">
                    <img src="/img/rincian.png" alt="Rincian Angsuran">
                    <h3>Rincian Angsuran</h3>
                    <p class="box-desc">Cek bagaimana perhitungan angsuran yang harus dibayarkan perbulannya secara rinci.</p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#detailsModal">Cek Rincian</button>
                </div>
                <div class="box">
                    <img src="/img/total.png" alt="Total Angsuran">
                    <h3>Total Angsuran</h3>
                    <p class="box-desc">Cek angsuran selanjutnya yang harus dibayarkan berdasarkan perhitungan dengan bunga.</p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#angsuranModal">
                        Cek Total
                    </button>

                </div>
            </div>
        </div>
    </section>

    <section id="modal-container">
        <!-- Details Modal -->
        <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <?php

                    // if (isset($_POST['besarpinjaman'])) {
                    //     $pinjamanawal  = $_POST['besarpinjaman'];
                    //     $tenor  = $_POST['tenor'];
                    //     $startdate = $_POST['tanggalpinjaman'];

                    //     $_SESSION['besarpinjaman'] = $pinjamanawal;
                    //     $_SESSION['tenor'] = $tenor;
                    //     $_SESSION['tanggalpinjaman'] = $startdate;
                    // } else {
                    //     $pinjamanawal  = $_SESSION['besarpinjaman'];
                    //     $tenor  = $_SESSION['tenor'];
                    //     $startdate = $_SESSION['tanggalpinjaman'];
                    // }

                    if(isset($_POST['besarpinjaman'])){
                        $pinjamanawal  = $_POST['besarpinjaman'];
                        $tenor  = $_POST['tenor'];
                        $startdate = $_POST['tanggalpinjaman'];

                        $trControll->setData($pinjamanawal, $tenor, $startdate);
                        
                    }else{

                    }
                    $Condition = true;
                    $Condition = $trControll->setBunga();

                    if ($Condition) { ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tabel Angsuran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            $trControll->paymentDetails();
                        } else { ?>
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tabel Angsuran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            <?php
                            $trControll->paymentDetailFail();
                        }?>
                            </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                </div>
            </div>

            <!-- Modal Total Angsuran -->
            <div class="modal fade" id="angsuranModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Total Angsuran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Total angsuran anda sebesar Rp  -->
                            <?php $trControll->totalPayment(); $trControll->getData();?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Simulasi Angsur -->
            <div class="modal fade" id="simulasiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Simulasi Angsuran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <label for="angsuran">Angsuran yang dibayarkan</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="text" name="angsuran" id="angsuran" required>
                                <div class="center">
                                    <input class="submit" id="simpan" type="submit" value="Bayar" name="bayar">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>

</html>