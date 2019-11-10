<?php

// // Nhập giá trị number bằng phương thức post
// $number = isset($_GET['number']) ? (int)$_GET['number'] : false;

// // Kiểm tra number có lớn hơn không hay không
// if (!$number){
// die ('<h1>Vui lòng nhập một số lớn hơn không (0)</h1>');
// }

// // Lặp từ 1 tới number để in ra màn hình
// for ($i = 1; $i <= $number; $i++){
// echo '<li>Số: '.$i.'</li>';
// }
?>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>