<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?=$title;?> | Pass Keluar </title>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>easyui/themes/<?=$this->session->userdata('themes')?>/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>easyui/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>easyui/color.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>easyui/demo.css">
	<script type="text/javascript" src="<?=base_url();?>easyui/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>easyui/jquery.easyui.min.js"></script>
	
	<style type="text/css">
	.footer{		
		background: #1488CC;  /* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);  /* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #2B32B2, #1488CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	}
	
	.header {
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
	
</head>
<body class="easyui-layout">
	<!-- header layout -->
	<div data-options="region:'north',border:false"  style="padding:20px; color:#333" class="header"> <img src="<?=base_url()?>img/logonew.png" width="90" height="40">  </div>

	
	<!-- Menu layout --> 
	<div data-options="region:'west',split:true,title:'Main Menu'" style="width:200px;padding:0px;">                
				<ul id="tt">
                   
                    <li> <a href="javascript:void(0)" onclick="open1('home')"> Dashboard </a> </li>
					<?php if($this->session->userdata('pas_level')=='rmo') { ?>
                    <li> <a href="javascript:void(0)" onclick="open1('add')"> Entry Pass Keluar </a> </li>
					<?php } ?>
					<?php if($this->session->userdata('pas_level')=='admin') { ?>
                    <li> <a href="javascript:void(0)" onclick="open1('berkas')"> Berkas Pass Keluar </a> </li>
					<li> <a href="javascript:void(0)" onclick="open1('list_Out')"> Out Pass Keluar </a> </li>
					<?php } ?>
					<?php if($this->session->userdata('pas_level')=='fleet') { ?>
                    <li> <a href="javascript:void(0)" onclick="open1('list_pending')"> Pending Pass Keluar </a> </li>
					<li> <a href="javascript:void(0)" onclick="open1('list_Out')"> Out Pass Keluar </a> </li>
					<?php } ?>
					
                    <li> <a href="javascript:void(0)" onclick="open1('get_Pass_Data')"> History Pass Keluar </a> </li>
					<li> <a href="javascript:void(0)" onclick="logout()"> Log Out </a> </li>
                    
                </ul>
	</div>
	
	<!-- Setting Themes Layout -->
	<div data-options="region:'east',split:true,collapsed:true,title:'Themes'" style="width:130px;padding:0px;">
			<ul id="tb">
					<li> <a href="javascript:void(0)" onclick="onChangeTheme('default')"> Default </a> </li>
                    <!--li> <a href="javascript:void(0)" onclick="onChangeTheme('black')"> Black </a> </li -->
                    <li> <a href="javascript:void(0)" onclick="onChangeTheme('bootstrap')">Bootstrap </a> </li>
                    <li> <a href="javascript:void(0)" onclick="onChangeTheme('gray')"> Gray </a> </li>
                    <li> <a href="javascript:void(0)" onclick="onChangeTheme('material')"> Material </a> </li>
					<li> <a href="javascript:void(0)" onclick="onChangeTheme('material-blue')">Material Blue </a> </li>
                    <li> <a href="javascript:void(0)" onclick="onChangeTheme('material-teal')">Material Teal </a> </li>
                    <li> <a href="javascript:void(0)" onclick="onChangeTheme('metro')">Metro </a> </li>                    
                </ul>
	</div>
	
	<!-- Footer Layout -->
	<div data-options="region:'south',border:false" style="padding:20px; color:#666;" class="header">  &copy; Copyright 2019 Trac Palembang - Development by Ardian Saputra</div>
	
	<!-- Body Layout -->
	<div data-options="region:'center',title:'&nbsp;'" id="content" class="easyui-panel"> 

	</div>
	
	
</body>   <!-- end Body --> 

<!-- Javascript --> 
	<script>
        $(function(){
            $('#mm').menu();
            $('#tt').tree();
			$('#tb').tree();
            $(document).bind('contextmenu',function(e){
                e.preventDefault();
                $('#mm').menu('show', {
                    left: e.pageX,
                    top: e.pageY
                });
            });
        });
		
	function onChangeTheme(theme){
		location.href='<?php echo base_url("index.php/apps/setting/themes/'+theme+'") ?>';
	}
	
	function openLink(link){
		location.href='<?php echo base_url("index.php/'+link+'") ?>';
	}
	
	function logout(link){
		location.href='<?php echo base_url("index.php/welcome/logout") ?>';
	}
	
	function open1(link){
		//currPageItem = $(a).text();
		$('body>div.menu-top').menu('destroy');
		$('body>div.window>div.window-body').window('destroy');
		$('#content').panel('refresh','<?php echo base_url("index.php/apps/modul/'+link+'") ?>');
	}
	
    </script>
	
	   
	
</html>