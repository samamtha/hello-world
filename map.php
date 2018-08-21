<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
	body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
	#info {
		display: none;
	}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=buQZqR1M875bpRufYVxS33C2x6sfjxSf"></script>
	<title>地图展示</title>
</head>
<body>
	<?php
		/*ignore_user_abort(); // 后台运行
			set_time_limit(0); // 取消脚本运行时间的超时上限
			$interval=3;// 每隔半小时运行，这个间隔时间是可以随着 需要进行修改
			do{
		*/
				$con = mysql_connect("localhost","root","root");   //通过数据库地址接上数据库
			    if (!$con)
			    {
			    	die('Could not connect: ' . mysql_error());
			    }
			    mysql_select_db("ans", $con);
			    mysql_query("set character set 'utf8'");
			    $result = mysql_query("SELECT * FROM ans");

			    while($row = mysql_fetch_array($result))
			    {
					$info = $row['num'];
				}
			    mysql_close($con);
			/*
			sleep($interval); // 休眠半小时
			}while(true)
			*/
	?>
	<div id="info"><?php echo $info; ?></div>
	<div id="allmap"></div>
	<script type="text/javascript" src="car.php"></script>
</body>
</html>

<script type="text/javascript">
	var info = document.getElementById("info").innerHTML;
	
	
	var map = new BMap.Map('allmap');
	// 创建地图实例
	var point = new BMap.Point(113.42136, 23.02508);
	// 创建点坐标
	map.centerAndZoom(point, 19);
	// 初始化地图， 设置中心点坐标和地图级别
	
	//添加地图类型控件
	map.addControl(new BMap.MapTypeControl({
		mapTypes:[
            BMAP_NORMAL_MAP,
            BMAP_HYBRID_MAP
        ]}));	  
	map.setCurrentCity("广东");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
	if(info){
	//setInterval(
		
		//alert(info);
		if(info == "200"){
		var marker = new BMap.Marker(point);
		map.addOverlay(marker);
		}else{
			map.removeOverlay(marker);
		}
	//,3000)
	}
	

	
</script>