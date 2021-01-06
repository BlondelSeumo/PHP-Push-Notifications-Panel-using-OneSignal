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
                    <th>Delivered</th>
                    <th class="hide">Fail</th>
                    <th class="hide">Title</th>
                    <th class="hide">Content</th>
                    <th class="hide">Notification ID</th>
                    <th>Sent Date</th>
                </tr>
            </thead>
            <tbody>
			
				<?php 
					
					$limit = 20;  
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
					$start_from = ($page-1) * $limit;
					$response = Notifications($limit,$start_from);
					$return = json_decode($response); 
										
					foreach ($return->notifications as $notifi) {
					
						if($notifi->data == null) {

				?>			
						<tr>
							<td> <?=$notifi->successful;?> </td>
							<td class="hide"> <?=$notifi->failed;?> </td>
							<td class="hide"> <?=$notifi->headings->en;?> </td>
							<td class="hide"> <?=$notifi->contents->en;?> </td>
							<td class="hide"> <?=$notifi->id;?> </td>
							<td><span class="date"><?=gmdate("d-m-Y / H:i:s", $notifi->send_after);?></span></td>
						</tr>
					<?php 
							}
					}
					?>
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
									$pagLink .= "<li><a href='sent.php?page=".$i."'>".$i."</a></li>";  
								}
					};  
					echo $pagLink . "</div>";  
				?>


</div>

</body>
</html>