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
            <!-- <nav>
                <div class="navbar">
                    <div>
                        <a href="">pinjam.in</a>
                    </div>
                    <div>
                        <ul>
                            <li>
                                <a href="">Home</a>
                            </li>
                            <li>
                                <a href="login.php">Masuk</a>
                            </li>
                            <li>
                                <a href="register.php">Daftar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> -->

            <div class="wrapper">
                <header>
                    <nav>
                        <a href="#" class="logo">
                            pinjam.in
                        </a>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <?php if (isset($_SESSION['state'])){?>
                                <li><a href="logout.php">Keluar</a></li>
                            <?php }else{ ?>
                                <li><a href="login.php">Masuk</a></li>
                                <li><a href="register.php">Daftar</a></li>
                            <?php }?>
                            
                        </ul>
                    </nav>
                </header>
            </div>

            <div class="title">
                <h1 class="heading">Hadir untuk mengatasi permasalahan finansial Anda.</h1>
                <p class="heading-desc">Butuh uang cepat? Tidak ingin terlihat di riwayat transaksi? Coba pinjamin untuk
                    meminjam uang secara
                    aman.</p>
                <button type="button">Mulai</button>
            </div>

        </div>
    </section>

    <section id="installment">
        <div class="container-fluid">
            <h1 class="installment-title">SIMULASIKAN PINJAMAN ANDA</h1>
            <div class="installment-text">
                <h3 class="installment-desc">Cari Tahu Angsuran Mu Disini</h3>
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
                        <option value="hari">Hari</option>
                        <option value="bulan">Bulan</option>
                    </select>
                    <br>
                </div>
                <div>
                    <label for="tanggalpinjaman">Tanggal Pinjaman</label>&nbsp;&nbsp;&nbsp;
                    <input type="date" name="tanggalpinjaman" id="tanggalpinjaman" required>
                </div>
                <div class="center">
                    <input class="submit" type="submit" value="Mulai Simulasi" name="Mulai Simulasi">
                </div>
            </div>
        </div>
    </section>
    
    <section id = "modal">
        <div class="container-fluid">
            <table>
                <tr>
                    <th>Periode</th>
                    <th>Angsuran Bunga</th>
                    <th>Angsuran Pokok</th>
                    <th>Angsuran Total</th>
                    <th>Sisa Angsuran</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Rp.000</td>
                    <td>Rp.000</td>
                    <td>Rp.000</td>
                    <td>Rp.000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Rp.000</td>
                    <td>Rp.000</td>
                    <td>Rp.000</td>
                    <td>Rp.000</td>
                </tr>
            </table>
        </div>
    </section>

</body>

</html>