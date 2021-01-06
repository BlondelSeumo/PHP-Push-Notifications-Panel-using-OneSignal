<!--header-->
<?php include 'header.php'; ?>
<!--header-->



<!--sidebar-->
<?php include 'sidebar.php'; ?>
<!--sidebar-->

<!--content-->
<div class="content">

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Device Model</th>
                    <th class="hide">Sessions</th>
                    <th class="hide">Language Code</th>
                    <th class="hide">Player ID</th>
                    <th>Register Date</th>
                </tr>
            </thead>
            <tbody>
			
				<?php 	
					$limit = 20;  
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
					$start_from = ($page-1) * $limit;
					if($start_from<2) {
						$start = 1;
					} else {
					$start = $start_from;
					}
					$response = showDevices($limit,$start); 
					$return = json_decode($response); 
					foreach ($return->players as $data) { 
				?>			
                <tr>
                    <td> <?=$data->device_model;?> </td>
                    <td class="hide"> <?=$data->session_count;?> </td>
                    <td class="hide"> <?=$data->language;?> </td>
                    <td class="hide"> <?=$data->id;?> </td>
                    <td><span class="date"><?=gmdate("d-m-Y / H:i:s", $data->created_at);?></span></td>
                </tr>
				<?php } ?>
            </tbody>
        </table>
    </div>
				<?php 
					$total_pages = ceil($return->total_count / $limit);  
					$pagLink = "<div class='pagination'> <ul>";  
					for ($i=1; $i<=$total_pages; $i++) {  
								if($page==$i) {
									$pagLink .= "<li class='active'><a href='#'>".$i."</a></li>";  
								} else {
									$pagLink .= "<li><a href='devices.php?page=".$i."'>".$i."</a></li>";  
								}
					};  
					echo $pagLink . "</div>";  
				?>

</div>

</body>
</html>