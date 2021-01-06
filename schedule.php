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
				<input type="hidden" name="sendafter" value="true">
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
							<input id="datetimepicker_dark" type="text" name="send_after" required>
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
	<script src="./assets/datebuild/jquery.datetimepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
	
	<script>
		$.datetimepicker.setDateFormatter({
			parseDate: function (date, format) {
				var d = moment(date, format);
				return d.isValid() ? d.toDate() : false;
			},
			
			formatDate: function (date, format) {
				return moment(date).format(format);
			},

			//Optional if using mask input
			formatMask: function(format){
				return format
					.replace(/Y{4}/g, '9999')
					.replace(/Y{2}/g, '99')
					.replace(/M{2}/g, '19')
					.replace(/D{2}/g, '39')
					.replace(/H{2}/g, '29')
					.replace(/m{2}/g, '59')
					.replace(/s{2}/g, '59');
			}
		});

		jQuery('#datetimepicker_dark').datetimepicker({
		  format: "YYYY-MM-DD HH:mm:00 ZZ",
		  formatTime:'HH:mm',
		  formatDate:'DD-MM-YYYY',
		  minTime: moment().add(1, 'H').toDate(),
		  minDate: moment().add(1, 'H').toDate(),
		  inline:true,
		  useCurrent: true,
		  theme:'dark',
		  lang:'tr'
		}).on("change", function (e) {
			console.log("Date changed: ", e.target.value);
		  });

	</script>
</body>
</html>