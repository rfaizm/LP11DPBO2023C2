<?php
include_once("presenter/ProsesFormPasien.php");
include_once("kontrak/KontrakFormPasien.php");

class FormPasienView implements KontrakFormPasienView
{
    private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        //konstruktor
        $this->prosespasien = new ProsesFormPasien();
    }

    function tampil()
    {
        $data = null;
        $data .= '
      
        <form method="post" action="form.php">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK" name="nik" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name = "nama" required>
            </div>
            <div class="form-group">
                <label for="tempat">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat" placeholder="Masukkan Tempat Lahir" name="tempat" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal" name="tl" required>
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="" disabled selected hidden>Select Gender</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="text" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" name="telp" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add">Submit</button>
            <button type="reset" class="btn btn-danger ml-2">Cancel</button>
        </form>';

        // Membaca template skin.html
        $this->tpl = new Template("templates/form.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $title = "TAMBAH";
        $this->tpl->replace("DATA_TABEL", $data);
        $this->tpl->replace("TITLE", $title);

        // Menampilkan ke layar
        $this->tpl->write();
    }

    function tampilEdit($i)
    {
        $this->prosespasien->prosesDataPasien();
        $data = null;

        $genders = ["Laki-laki", "Perempuan"];
        $option = null;
        foreach ($genders as $gender) {
            if ($this->prosespasien->getGender($i) == $gender) {
                $option .= '<option value="' . $gender . '" selected>' . $gender . '</option>';
            } else {
                $option .= '<option value="' . $gender . '">' . $gender . '</option>';
            }
        }


        $data .= '
        
        <form method="post" action="form.php">
            <input type="text" name="id" class="form-control" value = "' . $this->prosespasien->getId($i) . '" hidden>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK" name="nik" value = "' . $this->prosespasien->getNik($i) . '" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name = "nama" value = "' . $this->prosespasien->getNama($i) . '" required>
            </div>
            <div class="form-group">
                <label for="tempat">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat" placeholder="Masukkan Tempat Lahir" name="tempat" value = "' . $this->prosespasien->getTempat($i) . '" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal" name="tl" value = "' . $this->prosespasien->getTl($i) . '" required>
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="form-control" id="gender" name="gender" required>
                    ' . $option . '
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email" value = "' . $this->prosespasien->getEmail($i) . '" required>
            </div>
            <div class="form-group">
                <label for="telp">Telepon</label>
                <input type="text" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" name="telp" value = "' . $this->prosespasien->getTelp($i) . '" required>
            </div>
            <button type="submit" class="btn" name="update">Edit</button>
            <button type="reset" class="btn ml-2">Cancel</button>
        </form>';

        // Membaca template skin.html
        $this->tpl = new Template("templates/form.html");
        $title = "EDIT";
        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);
        $this->tpl->replace("TITLE", $title);
        // Menampilkan ke layar
        $this->tpl->write();
    }

    function add($data)
    {
        $this->prosespasien->add($data);
        header("location:index.php");
    }

    function edit($data)
    {
        $this->prosespasien->edit($data);
        header("location:index.php");
    }
}