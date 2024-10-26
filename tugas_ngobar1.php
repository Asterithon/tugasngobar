<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Bangun Ruang</title>
</head>
<body>
    <h1>Kalkulator Bangun Ruang</h1>

    <?php
    class RumusBangunRuang {
        public function rumusPersegiPanjang($panjang, $lebar) {
            $luas = $panjang * $lebar;
            $keliling = 2 * ($panjang + $lebar);
            return ['luas' => $luas, 'keliling' => $keliling];
        }

        public function rumusPersegi($sisi) {
            $luas = $sisi * $sisi;
            $keliling = $sisi * 4;
            return ['luas' => $luas, 'keliling' => $keliling];
        }

        public function rumusSegitiga($alas, $tinggi) {
            $luas = 0.5 * $alas * $tinggi;
            return ['luas' => $luas];
        }

        public function rumusLingkaran($jari) {
            $luas = 3.14 * $jari * $jari;
            $keliling = 2 * 3.14 * $jari;
            return ['luas' => $luas, 'keliling' => $keliling];
        }
    }

    $bangunRuang = new RumusBangunRuang();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $shape = $_POST['shape'];
        $result = null;

        switch ($shape) {
            case 'persegipanjang':
                $panjang = isset($_POST['panjang']) ? $_POST['panjang'] : null;
                $lebar = isset($_POST['lebar']) ? $_POST['lebar'] : null;
                if ($panjang && $lebar) {
                    $result = $bangunRuang->rumusPersegiPanjang($panjang, $lebar);
                }
                break;
            case 'persegi':
                $sisi = isset($_POST['sisi']) ? $_POST['sisi'] : null;
                if ($sisi) {
                    $result = $bangunRuang->rumusPersegi($sisi);
                }
                break;
            case 'segitiga':
                $alas = isset($_POST['alas']) ? $_POST['alas'] : null;
                $tinggi = isset($_POST['tinggi']) ? $_POST['tinggi'] : null;
                if ($alas && $tinggi) {
                    $result = $bangunRuang->rumusSegitiga($alas, $tinggi);
                }
                break;
            case 'lingkaran':
                $jari = isset($_POST['jari']) ? $_POST['jari'] : null;
                if ($jari) {
                    $result = $bangunRuang->rumusLingkaran($jari);
                }
                break;
        }
    }
    ?>

    <?php if (!isset($shape)): ?>
        <form method="post">
            <label for="shape">Pilih Bangun Ruang:</label>
            <select name="shape" id="shape" onchange="this.form.submit()">
                <option value="">--Pilih--</option>
                <option value="persegipanjang">Persegi Panjang</option>
                <option value="persegi">Persegi</option>
                <option value="segitiga">Segitiga</option>
                <option value="lingkaran">Lingkaran</option>
            </select>
        </form>
    <?php endif; ?>

    <?php if (isset($shape) && !isset($result)): ?>
        <form method="post">
            <input type="hidden" name="shape" value="<?= $shape ?>">

            <?php if ($shape == 'persegipanjang'): ?>
                <label for="panjang">Panjang:</label>
                <input type="number" name="panjang" required><br>
                <label for="lebar">Lebar:</label>
                <input type="number" name="lebar" required><br>
            <?php elseif ($shape == 'persegi'): ?>
                <label for="sisi">Sisi:</label>
                <input type="number" name="sisi" required><br>
            <?php elseif ($shape == 'segitiga'): ?>
                <label for="alas">Alas:</label>
                <input type="number" name="alas" required><br>
                <label for="tinggi">Tinggi:</label>
                <input type="number" name="tinggi" required><br>
            <?php elseif ($shape == 'lingkaran'): ?>
                <label for="jari">Jari-jari:</label>
                <input type="number" name="jari" required><br>
            <?php endif; ?>

            <button type="submit">Proses</button>
            <button type="button" onclick="window.location.href=''">Kembali</button>
        </form>
    <?php endif; ?>

    <?php if (isset($result)): ?>
        <h2>Hasil Perhitungan</h2>
        <?php foreach ($result as $key => $value): ?>
            <p><?= ucfirst($key) ?>: <?= $value ?></p>
        <?php endforeach; ?>
        <button type="button" onclick="window.location.href=''">Kembali</button>
    <?php endif; ?>
</body>
</html>
