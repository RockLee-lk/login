 <?php 

	$user_name = $_POST['username'];
	$psw = $_POST['psw'];

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
 
$sql = "SELECT * FROM login WHERE username = '".$user_name."'";
$result = $conn->query($sql);
 
if ($result->num_rows == 1) {
	echo "用户存在";
	// $row = mysqli_fetch_array($result,MYSQL_ASSOC);
	// echo "用户信息:".$row;
    // 输出数据
    $islogin = false;
    while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["id"]. " - Name: " . $row["username"].  "<br>";
        if($row["password"] == $psw){
              $islogin = true; 
        }
    }
    if($islogin){ 
    	echo "登录成功";
    	echo "<script type='text/javascript'>

  window.location.href='./manager.php'         

</script>";
    	
    }else{
    	echo "密码错误";
    }
} else {
    echo "用户名不存在";
}
$conn->close();
?>