<!--header-->
<?php include 'header.php'; ?>
<!--header-->

<!--sidebar-->
<?php include 'sidebar.php'; ?>
<!--sidebar-->


<!--content-->
<div class="content">

    <div class="box-">
        <h1>
            RSS Url Add 
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

	
    <div class="box-container container-100">
        <div class="box" id="div-1">
			<?=$ok;?>
            <div class="box-content">
                <form action="" class="form" method="post">
                    <div class="box-container container-50">
				
					</div>  
					
									
					<div style="padding:20px;">
					 <ul>
						<li><label>RSS Url</label>
                            <input name="rssurl" type="text" id="input" value="<?=$rssurl;?>" placeholder="Set Logo">
                        </li>
						
						
                        <li>
                            <button type="submit" name="rsssave">Save Settings</button>
                        </li>
					
						
                    </ul>
					</div>
					
                </form>
					
            </div>
        </div>
    </div>

	
</div>

</body>
</html>