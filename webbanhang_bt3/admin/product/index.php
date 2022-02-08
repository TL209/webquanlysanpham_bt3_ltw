<?php
require_once ('../../db/dbhelper.php');
require_once ('../../common/utillity.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link " href="../category/">Quản Lý Công Ty</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="#">Quản Lý Sản Phẩm</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Sản Phẩm</h2>
			</div>
			<div class="panel-body">
			<div class="row">
					<div class="col-lg-6">
					    <a href="add.php">
					        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Sản Phẩm</button>
				        </a>
					</div>
					<div class="col-lg-6">
					    <form method="get">
                            <div class="form-group" style="width: 200px; float: right;">
                                <input type="text" class="form-control" placeholder="Searching..." id="s" name="s">
                            </div>
                        </form>
					</div>
				</div>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
                            <th>Hình Ảnh</th>
							<th>Tên Sản Phẩm</th>
                            <th>Giá bán</th>
							<th>Danh mục</th>
                            <th>Ngày Cập Nhật</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach danh muc tu database
$limit = 3;
$page = 1;
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
if($page <= 0){
	$page = 1;
}
$firstIndex = ($page-1)*$limit;

$s = '';
if(isset($_GET['s'])){
	$s = $_GET['s'];
}

$additional = '';

if(!empty($s)){
	$additional =  ' and product.title like "%'.$s.'%" ';
}



$sql          = 'select product.id, product.title, product.price, product.thumbnail, product.updated_at, category.name category_name from product left join category on product.id_Category = category.id where 1'.$additional .' limit '.$firstIndex.','.$limit;
$productList = executeResult($sql);


$sql = 'select count(id) as total from product where 1 '.$additional;
$countResult = executeSingleResult($sql);
$number = 0;
if($countResult != null){
	$count = $countResult['total'];
    $number = ceil($count/$limit);
}

$index = 1;
foreach ($productList as $item) {
	echo '<tr>
				<td>'.(++$firstIndex).'</td>
				<td><img src="'.$item['thumbnail'].'" style = "max-width: 100px"/></td>
                <td>'.$item['title'].'</td>
                <td>'.$item['price'].'</td>
                <td>'.$item['category_name'].'</td>
                <td>'.$item['updated_at'].'</td>
				<td>
					<a href="add.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteProduct('.$item['id'].')">Xoá</button>
				</td>
			</tr>';
}
?>
					</tbody>
				</table>
				<!-- Bai toan phan trang -->
				<?=paginarion($number, $page, '&s='.$s)?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteProduct(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>
</body>
</html>