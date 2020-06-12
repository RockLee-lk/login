<!DOCTYPE html>
<html lang="cn">
<head>
	<title>留言管理</title>
</head>
<body>
	 <h1>留言管理</h1>
	 <table>
	 	<tr>
	 		<td> ID </td>
	 		<td> 联系人 </td>
	 		<td> 联系方式 </td>
	 		<td> 留言 </td>
	 		<td> 操作 </td>
	 	</tr>

	 	<?php 

	 		$servername = "localhost";
			$username = "root";
			$password = "lk19950725";
			$dbname = "likun";
			 
			// 创建连接
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("连接失败: " . $conn->connect_error);
			} 
			 
			$sql = "SELECT * FROM message_board ";
			$result = $conn->query($sql);

			while($row = $result->fetch_assoc()) {
			        // echo "id: " . $row["id"]. " - Name: " . $row["username"].  "<br>";
			        
			        echo "<tr>
				        <td>{$row["id"]}</td>
				        <td>{$row["username"]}</td>
				        <td>{$row["phone"]}</td> 
				        <td>{$row["message"]}</td>
				        <td><a href='#' >编辑</a><a href='#'>删除</a></td>
				        </tr>";
			    } 
	 	?>

	 </table>

</body>
</html>