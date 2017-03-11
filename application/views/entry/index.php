<h5><strong>Cách tra cứu:</strong> Ấn CTRL + F để tìm sản phẩm, dịch vụ. Mọi thắc mắc, góp ý anh chị vui lòng bình luận bằng Facebook ở bên dưới.</h5>
<table class="table striped-table">
	<thead>
		<tr>
			<th class="col-md-1 text-center">STT</th>
      		<th class="col-md-1 text-center">Danh mục</th>
          	<th class="col-md-3 text-center">Dịch vụ</th>
          	<th class="col-md-1 text-center">Số phòng</th>
      	    <th class="col-md-1 text-center">Điện thoại</th>
   	       	<th class="col-md-2 text-center">Facebook</th>
  	        <th class="text-center">Ghi chú</th>
  	        <th class="text-center">Sửa</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($list as $row):  ?>
		<tr>
			<td class="text-center"><?php echo $row->id; ?></td>
			<td class="text-center"><a href="<?php echo base_url($row->slug);?>" title=""><?php echo $row->category_name;?></a></td>
  			<td><?php echo $row->name;?></td>
  			<td class="text-center"><?php echo $row->room . ' - <a href="' . base_url($row->building) .'">'.$row->building .'</a>';?></td>
  			<td class="text-center"><?php echo $row->phone;?></td>
  			<td class="text-center"><a href="<?php echo $row->fb_link;?>" title="" rel="nofollow" target="_blank"><?php echo $row->fb_name;?></a></td>
  			<td><?php echo $row->note;?></td>
  			<td class="text-center"><a href="e/<?php echo $row->id; ?>"><span class="glyphicon glyphicon-cog"></span></a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>