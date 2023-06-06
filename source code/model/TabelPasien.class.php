<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasien($id)
	{
		// Query mysql select data pasien
		$query = "DELETE FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function addPasien($data)
	{
		$nama = $data['nama'];
		$nik = $data['nik'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query mysql select data pasien
		$query = "INSERT INTO pasien VALUES ('','$nik', '$nama','$tempat', '$tl', '$gender', '$email', '$telp')";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function editPasien($data)
	{
		$nama = $data['nama'];
		$id = $data['id'];
		$nik = $data['nik'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

		// Query mysql select data pasien
		$query = "UPDATE pasien SET nama = '$nama', nik = '$nik', tempat = '$tempat', tl = '$tl', gender='$gender', email = '$email', telp = '$telp' WHERE id = $id";
		// Mengeksekusi query
		return $this->execute($query);
	}
}
