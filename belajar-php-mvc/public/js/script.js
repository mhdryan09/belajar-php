// ketika document sudah siap, jalankan function di dalamnya
$(function () {

  // ketika tombol tambah di klik
  $('.tombolTambahData').on('click', function () {
    // ubah isi tulisan HTML nya
    $('#formModalLabel').html('Tambah Data Mahasiswa');
    // ganti tulisan html pada button
    $('.modal-footer button[type=submit]').html('Tambah Data');
  });

  // ketika tombol ubah di klik
  $('.tampilModalUbah').on('click', function () {
    // ubah isi tulisan HTML nya
    $('#formModalLabel').html('Ubah Data Mahasiswa');
    // ganti tulisan html pada button
    $('.modal-footer button[type=submit]').html('Ubah Data');
    // cari elemen form dari modal-body, lalu ubah isi action nya
    $('.modal-body form').attr('action', 'http://localhost/belajar-php/belajar-php-mvc/public/mahasiswa/ubah');

    // ambil attribute data-id dari form nya
    const id = $(this).data('id');

    // jalankan ajax
    $.ajax({
      // mau ambil data ke URL mana
      url: 'http://localhost/belajar-php/belajar-php-mvc/public/mahasiswa/getubah',
      // data yg akan dikirim
      data: { id: id },
      method: 'post',
      dataType: 'json',
      // menerima paramater data jika sukses
      success: function (data) {
        // ambil elemen nama lalu ubah value nya dari objek data 
        $('#nama').val(data.nama);
        $('#nim').val(data.nim);
        $('#email').val(data.email);
        $('#jurusan').val(data.jurusan);
        $('#id').val(data.id);
      }
    });
  });
});