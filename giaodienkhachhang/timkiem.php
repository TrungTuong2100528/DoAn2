<?php
    
  include_once __DIR__ . '/../admin/config/db.php';
    if(isset($_GET['timkiem'])){
        $tukhoa = $_GET['tukhoa'];
    }else{
        $tukhoa ='';
    }
    $sql_pro ="SELECT * from SanPham where TenSanPham LIKE '%".$tukhoa."%'";
    $query_pro = mysqli_query($con, $sql_pro);
?>
<h3>Từ khóa tìm kiếm: <?php $_POST['tukhoa'] ?></h3>
<div id="list-products">
        <?php
          while($row = mysqli_fetch_array($query_pro)){
          
        ?>
        <div class="item">
          <img src="/WEB_TBYT/giaodienkhachhang/image_giaodien/<?php echo $row['HinhAnh']; ?>" alt="">
          <a class="name"><?php echo $row["TenSanPham"] ?></a>
          <a>Giá: <?php echo $row["GiaSanPham"]?> VNĐ </a>
         <a href="/WEB_TBYT/giaodienkhachhang/ThongTinSanPham/ThongTinSanPham.php?id=<?php echo $row['IDSanPham']; ?>"> <button>Xem</button></a> 
        </div>
        <?php
          }
        ?>
</div>

