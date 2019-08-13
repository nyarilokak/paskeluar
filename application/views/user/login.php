<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>User Login | Pass Keluar </title>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>easyui/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>easyui/color.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>easyui/demo.css">
	<script type="text/javascript" src="<?=base_url();?>easyui/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>easyui/jquery.easyui.min.js"></script>
</head>

<style type="text/css">
	.footer{		
		background: #43C6AC;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #F8FFAE, #43C6AC);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #F8FFAE, #43C6AC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
	
	.text-logo {
		font-size:18px; font-weight:bold;
		
	}
	
	li a:hover {
		
		text-decoration:none;
		
		
	}
	</style>
<body style="background-color:#FAFAFA">
	
<div class="col-lg-4 col-lg-offset-4">
 <center> <img src="<?=base_url();?>img/logonew.png"> </center> <br>
	<div class="easyui-panel footer" title="User Log in" style="width:100%;padding:40px;">

	<form id="login_form" method="post">
	
		<div style="margin-bottom:10px">
			<input class="easyui-textbox easyui-validatebox" name="username" style="width:100%;height:40px;padding:12px" data-options="prompt:'Username',iconCls:'icon-man',iconWidth:38,required:'true'">
		</div>
		<div style="margin-bottom:20px">
			<input class="easyui-textbox easyui-validatebox" name="password" type="password" style="width:100%;height:40px;padding:12px" data-options="prompt:'Password',iconCls:'icon-lock',iconWidth:38,required:'true'">
		</div>
		
		<div>
			<a class="easyui-linkbutton c7" data-options="iconCls:'icon-ok'" href="javascript:void(0)" onClick="go_login()" style="padding:5px 0px;width:100%;">
				<span style="font-size:14px;">Login</span>
			</a>
			
			
		</div>
		
	</form>
	
	</div>
	
</div>

 <script type="text/javascript">
 
	function go_login(){
		$('#login_form').form('submit',{
			url: "<?php echo base_url('index.php/welcome/ceklogin'); ?>",				 
			success: function(result){
				console.log(result);
				result = result.replace(/\s+/g, " ");
				obj = $.parseJSON(result);
				if (obj.success == false ){
					$.messager.alert('Oppss...','Username or Password Wrong','warning');
					$('#login_form').form('clear');
				} else {				
						
						progress(); 						
 
					}
				}
			});
		return false;
	}
	
	function progress(){
        var win = $.messager.progress({
            title:'Please waiting',
                msg:'Processing...'
            });
            setTimeout(function(){
            location.href='<?php echo base_url("index.php/apps/dashboard") ?>';
        },3300)
    }
 

</script>
</body>
</html>