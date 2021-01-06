<!--header-->
<?php include 'header.php'; ?>
<!--header-->



<!--sidebar-->
<?php include 'sidebar.php'; ?>
<!--sidebar-->

<!--content-->
<div class="content">


    <div class="box-container container-25">
         <div class="box" id="div-1">
            <h3>
                Send Notification 
            </h3>
            <div class="box-content">
                <form class="form" id="send">
				<input type="hidden" name="send" value="true">
                    <ul>
                        <li>
                            <input name="title" type="text" id="input" placeholder="(Title) - max 50 character" maxlength="50" required>
                        </li>
                        <li>
                            <textarea name="content" id="" cols="30" rows="5" placeholder="(Content) - max 125 characters" maxlength="125" required></textarea>
                        </li>
						<li>
                            <input name="url" type="text" id="input" placeholder="URL" required>
                        </li>
						
                        <li>
                            <button type="submit" id="sendnotifi">Send Notification</button> <i id="result"></i>
                        </li>
					
						
                    </ul>
                </form>
            </div>
        </div>
    </div>

    <div class="box-container container-75">
        <div class="box" id="div-2">
            <h3>
                Last 10 Sent Notifications
            </h3>
            <div class="box-content">
                <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Delivered</th>
                    <th class="hide">Title</th>
                    <th class="hide">Content</th>
                    <th>Sent Date</th>
                </tr>
            </thead>
            <tbody>
			
				<?php 	
					$response = Notifications(10);
					
					$return = json_decode($response); 
					foreach ($return->notifications as $notifi) { 
						if($notifi->data == null) {
					
					
				?>			
                <tr>
                    <td> <?=$notifi->successful;?> </td>
                    <td class="hide"> <?=$notifi->headings->en;?> </td>
                    <td class="hide"> <?=$notifi->contents->en;?> </td>
                    <td><span class="date"><?=gmdate("d-m-Y / H:i:s", $notifi->send_after);?></span></td>
                </tr>
					<?php 
					}
					}
					?>
            </tbody>
        </table>
    </div>

            </div>
        </div>
    </div>



</div>

</body>
</html>