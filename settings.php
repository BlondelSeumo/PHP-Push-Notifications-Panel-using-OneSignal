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
            Settings 
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

	
    <div class="box-container container-100">
        <div class="box" id="div-1">
			<?=$ok;?>
            <div class="box-content">
                <form action="" class="form" method="post">
                    <div class="box-container container-50">
				<div style="padding:20px;">
				   <ul>
                        <li><label>OneSignal API KEY</label>
                            <input name="api_key" type="text" id="input" value="<?=$app_id;?>" placeholder="API KEY">
                        </li>
                        
						<li><label>OneSignal AUTH KEY</label>
                            <input name="auth_key" type="text" id="input" value="<?=$auth_key;?>" placeholder="AUTH KEY">
                        </li>
						
					
                       
						
                    </ul>
					
					</div>  
					</div>  
					
					<div class="box-container container-50">
					<div style="padding:20px;">

				   <ul>
                      
						<li><label>Username</label>
                            <input name="admin" type="text" id="input" value="<?=$admin;?>" placeholder="Admin Username">
                        </li>
						
						<li><label>Password</label>
                            <input name="password" type="text" id="input" value="<?=$passw;?>" placeholder="Password">
                        </li>
						
                     
					
						
                    </ul>
					
					</div>
					</div>
					
					<div style="padding:20px;">
					 <ul>
						<li><label>Logo Url</label>
                            <input name="api_logo" type="text" id="input" value="<?=$api_logo;?>" placeholder="Set Logo">
                        </li>
						
						
                        <li>
                            <button type="submit" name="save">Save Settings</button>
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