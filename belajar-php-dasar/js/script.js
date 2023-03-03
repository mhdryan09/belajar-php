const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

// hilangkan tombol cari
tombolCari.style.display = 'none';

// event ketika kita menuliskan keyword
keyword.addEventListener('keyup', function () {
  // ajax, cara kita melakukan request tanpa merefresh halamannya
  // ada 2 cara : xmlhttprequest, dan fetch

  // 1. xmlhttprequest
  // const xhr = new XMLHttpRequest();

  // // ketika ajax sudah ready
  // xhr.onreadystatechange = function () {
  //   if (xhr.readyState == 4 && xhr.status == 200) {
  //     // ubah isi container, dgn apapun yg ada dari response ajaxnya
  //     container.innerHTML = xhr.responseText;
  //   }
  // };

  // // memanggil ajax_cari.php sambil mengirimkan inputan keyword
  // xhr.open('get', 'ajax/ajax_cari.php?keyword=' + keyword.value);
  // xhr.send(); // jalankan ajax


  // 2. fetch()
  fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
    .then((response) => response.text()) // ambil resonse text
    .then((response) => (container.innerHTML = response)); // ubah isi container, dgn apapun yg ada dari response ajaxnya
});