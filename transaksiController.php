<?php
session_start();

class transaction{
    public $pinjamanAwal;
    public $tenor;
    public $startDate;
    public $endDate;
    public $periode;
    public $sisaPinjaman;
    public $bunga;
    public $totalAngsuran;
    public $DateInterval_construct;
    public $paymentData = array();


    public function setData($bp, $ten, $startDate)
    {
        $this->pinjamanAwal = (int) $bp;
        $this->tenor = $ten;
        $this->startDate = $startDate;
        $this->endDate = 0;
        $this->sisaPinjaman = $bp;
        $this->periode = (int)substr($ten, 0, 2);
        $this->bunga=0;
        $this->DateInterval_construct = "";

        $_SESSION['besarPinjaman'] = $this->pinjamanAwal;;
        $_SESSION['tenor'] = $ten;
        $_SESSION['tanggalPinjaman'] = $startDate;
        $_SESSION['periode'] = $this->periode;

    }

    public function getData()
    {
        $bp = $this->pinjamanAwal;
        $tenor = $this->tenor;
        $startDate = $this->startDate;
        $periode = $this->periode;
        $data = array($bp, $tenor, $startDate, $periode);
        return $data;
    }

    public function getDataSession()
    {
        $this->pinjamanAwal = (int) $_SESSION['besarPinjaman'];
        $this->tenor = $_SESSION['tenor'];
        $this->startDate = $_SESSION['tanggalPinjaman'];
        $this->periode = $_SESSION['periode'];
    }

    public function setBunga()
    {
        if(isset($_SESSION['besarPinjaman'])){
            $sisaPinjaman = $this->sisaPinjaman;
            $DateInterval_construct = "";
            $bunga = 0;
            $Condition = true;
            if (substr($this->tenor, -1) == 'm') { #mengambil karakter terakhir
                if ($this->pinjamanAwal < 20000000) {
                    $Condition = false;
                }
                $bunga = 0.1;
                $this->startDate = date("Y-m", strtotime($this->startDate));
                $enddate = date('Y-m', strtotime($this->startDate . ' + ' . $this->periode . " months"));
                $DateInterval_construct = "P1M";
            } else {
                if ($this->pinjamanAwal > 20000000) {
                    $Condition = false;
                }
                $bunga = 0.005;
                $enddate = date('Y-m-d', strtotime($this->startDate . ' + ' . $this->periode . " days"));
                $DateInterval_construct = "P1D";
            }
            $_SESSION['bunga'] = $bunga;
            $this->bunga = $bunga;
            $this->endDate = $enddate;
            $this->DateInterval_construct = $DateInterval_construct;
            return $Condition;
        }
        
    }


    public function paymentDetails()
    {
        $totalangsuran = 0;
        if(isset($_SESSION['besarPinjaman'])){
            $timeInterval = new DatePeriod(
            new DateTime($this->startDate),
            new DateInterval($this->DateInterval_construct),
            new DateTime($this->endDate)
            );
            $sisapinjaman = $this->sisaPinjaman;
            $periode = $this->periode;
            $bunga = $this->bunga;
            $angsuranpokok = ceil((int) $this->sisaPinjaman / $periode);

            foreach ($timeInterval as $key => $value) {
                // INI NNTI DI COMMENT DOLOO
                // echo "<table>

                //     <tr>
                //     <th>Periode</th>
                //     <th>Angsuran Bunga</th>
                //     <th>Angsuran Pokok</th>
                //     <th>Angsuran Total</th>
                //     <th>Sisa Angsuran</th>
                //     </tr>"; 
                // 
                    $angsuranbunga = ceil($sisapinjaman * $bunga);
                    $angsurantotal = ceil($angsuranpokok + $angsuranbunga);
                    array_push($this->paymentData, $angsurantotal); //add array for unit testing
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
                    // echo "<tr>";
                    // echo "<td>$date</td>";
                    // echo "<td>Rp.$angsuranbunga_v</td>";
                    // echo "<td>Rp.$angsuranpokok_v</td>";
                    // echo "<td>Rp.$angsurantotal_v</td>";
                    // echo "<td>Rp.$sisapinjaman_v</td>";
                    // echo "</tr>";
            }
            $this->totalAngsuran = $totalangsuran;
        }
    }
    
    public function getPaymentData(){
        //ini ngembaliin total angsuran
        return $this->paymentData;
    }

    public function paymentDetailFail()
    {
        if(isset($_SESSION['besarPinjaman'])){
            return "<h3>Untuk pinjaman dibawah 20 juta hanya dapat menggunakaan tenor harian sedangkan pinjaman
            diatas 20 juta hanya dapat menggunakaan tenor bulanan.</h3>";
        }
        
    }

    public function totalPayment()
    {
        return number_format($this->totalAngsuran);
    }

    public function simulation()
    {
        $tenor = $_SESSION['tenor'];
        $startDate = $_SESSION['tanggalPinjaman'];
        $pinjamanawal  = $_SESSION['besarPinjaman'];
        $bunga = $_SESSION['bunga'];
        $periode = $_SESSION['periode'];
        $pinjamanPeriode1 = ($pinjamanawal / $periode) + ($pinjamanawal * $bunga);
        $this->setData($pinjamanawal,$tenor, $startDate); //set ulang data
        return ceil($pinjamanPeriode1);
    }
}
?>