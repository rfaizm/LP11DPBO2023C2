<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/FormPasien.php");

$tp = new FormPasienView();

if (isset($_POST['add'])) {
    $tp->add($_POST);
} else if (isset($_GET['edit'])) {
    $tp->tampilEdit($_GET['edit']);
} else if (isset($_POST['update'])) {
    $tp->edit($_POST);
} else {
    $data = $tp->tampil();
}