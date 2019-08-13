
	
		<?php $url_data=base_url().'index.php/apps/modul/get_Data_Pass';?>
		
		<table id="dg" title="Data Pass Keluar By <?=$this->session->userdata('pas_nama');?>" class="easyui-datagrid" style ="width:100%;height:auto"
		url   ="<?php echo $url_data;?>" toolbar="#toolbar" 
		pagination="true" 
		rownumbers="false" 
		fitColumns="true" singleSelect="true" 
		checkBox  ="true" striped="true" 
		remoteSort="false" 
		nowrap    ="false">
			 <thead>
			   <tr>
			   <th field="idpass">#ID</th> 
			   <th field="nomor_rdo"  sortable="true" width="30"><b>No. RDO</b> </th>
				<th field="customer" sortable="true" width="50"> <b>Customer</b></th>	
			   <th field="tglkeluar"  sortable="true" width="30"><b>Tanggal Keluar</b>  </th>
			   <th field="jamkeluar"  sortable="true" width="20"> <b>Jam</b></th>
			   <th field="nopol" sortable="true" width="30"> <b>Nomor Polisi</b></th>
			   <th field="warna" sortable="true" width="30"> <b>Warna</b></th>
			   <th field="driver" sortable="true" width="40"> <b>Nama Driver</b></th>
			   <th field="tujuan" sortable="true" width="80"> <b>Tujuan</b></th>
			   <th field="status" sortable="true"> <b>Status</b></th>
			   </tr>
			 </thead>
			</table>

		<!--TOOLBAR di Datagrid-->
		<div id="toolbar">
		  <a href="#" class="easyui-linkbutton c7" iconCls="icon-add" plain="true" onclick="newData()">New</a>
		  <a href="#" class="easyui-linkbutton c1" data-options="iconCls:'icon-edit',plain:true" onclick="editPass();">Edit</a>
		  <a href="#" class="easyui-linkbutton c5" data-options="iconCls:'icon-remove',plain:true" onclick="delete_Pass();">Delete</a>
		  <input id="search" placeholder="Cari No. RDO ">
		  <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-refresh',plain:true" onclick="doSearch('reset');">Clear search</a>
		</div>
		<!--END OF TOOLBAR-->
		
		
<div id="dlg" class="easyui-dialog" style="width:60%;padding:30px 60px;"  closed="true" buttons="#dlg-buttons">
  
    <form id="ff" class="easyui-form" method="post" data-options="novalidate:false">
	<input name="idpass" type="hidden">
 <table width="100%" border="0" class="table-condensed">
  <tr>
    <td width="16%">Nomor RDO</td>
    <td width="1%">:</td>
    <td width="27%"><input name="nomor_rdo" class="easyui-textbox" style="width:100%;" tabindex="1" data-options="required:true"></td>
    <td width="9%">&nbsp;</td>
    <td width="18%">Tujuan</td>
    <td width="1%">:</td>
    <td width="28%"><input name="tujuan" class="easyui-textbox" style="width:100%;"  tabindex="6"  data-options="required:true" /></td>
  </tr>
  <tr>
    <td>Customer</td>
    <td>:</td>
    <td>
					<input class="easyui-combobox" name="customer"  tabindex="2" style="width:100%;" data-options="
					url:'<?=base_url();?>index.php/apps/modul/c_customer',
					required:'true',
					method:'get',
					valueField:'customer',
					textField:'customer',
					panelHeight:'auto',					
					labelPosition: 'top'
					">				
	
	</td>
    <td>&nbsp;</td>
    <td>Tanggal keluar</td>
    <td>:</td>
    <td><input name="tglkeluar" class="easyui-datebox" style="width:100%;"  tabindex="7" data-options="formatter:myformatter,parser:myparser, required:true"  /></td>
  </tr>
  <tr>
    <td>Nomor Polisi</td>
    <td>:</td>
    <td> 
					<input class="easyui-combobox" name="nopol"  tabindex="3" style="width:100%;" data-options="
					url:'<?=base_url();?>index.php/apps/modul/c_unit',
					required:'true',
					method:'get',
					valueField:'nopol',
					textField:'nopol',
					panelHeight:'auto',					
					labelPosition: 'top'
					">
	</td>
    <td>&nbsp;</td>
    <td>Jam Keluar (Wib)</td>
    <td>:</td>
    <td><input name="jamkeluar" class="easyui-maskedbox" mask="99:99" style="width:100%;"  tabindex="8" data-options="required:true"/></td>
  </tr>
  <tr>
    <td>Warna</td>
    <td>:</td>
    <td><input name="warna" class="easyui-textbox" style="width:100%;" tabindex="4" data-options="required:true"/></td>
    <td>&nbsp;</td>
    <td>Start Sewa</td>
    <td>:</td>
    <td><input name="start" class="easyui-datebox" style="width:100%;" tabindex="9" data-options="formatter:myformatter,parser:myparser,required:true"  /></td>
  </tr>
  <tr>
    <td>Driver</td>
    <td>:</td>
    <td><input name="driver" class="easyui-textbox" style="width:100%;"  tabindex="5"data-options="required:true" /></td>
    <td>&nbsp;</td>
    <td>End Sewa</td>
    <td>:</td>
    <td><input name="end" class="easyui-datebox" style="width:100%;"  tabindex="10"  data-options="formatter:myformatter,parser:myparser,required:true" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
    	<div style="text-align:right;padding:5px 0">		
		<a href="javascript:void(0)" class="easyui-linkbutton c8" onclick="clearForm()" style="width:80px">Clear</a>
		<a href="javascript:void(0)" class="easyui-linkbutton c7" onclick="savePass()" tabindex="11" style="width:80px">Submit</a>
		</div>    </td>
  </tr>
</table>
		
        
		</form>
       
</div>

	<script>
	
		function doSearch(reset){

			if(reset){
				
			$('#search').val('');	
			}
			$('#dg').datagrid('load',{  

			search: $('#search').val()              
			}); 
			$('#search').focus();
		}

		$(function(){
			
			 $('#search').keyup(function(){

			doSearch();
					
			});
				
		 });
	</script>		

  	<script type="text/javascript">
	
		function myformatter(date){
			var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
		}
		
		function myparser(s){
			if (!s) return new Date();
			var ss = (s.split('-'));
			var y = parseInt(ss[0],10);
			var m = parseInt(ss[1],10);
			var d = parseInt(ss[2],10);
			if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
				return new Date(y,m-1,d);
			} else {
				return new Date();
			}
		}
		
	function newData(){
        $('#dlg').dialog('open').dialog('setTitle','New Pass Keluar');
        $('#ff').form('clear');
        url = '<?=base_url()?>index.php/apps/modul/save_pass';
    }
		
		function editPass(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Pass Keluar');
				$('#ff').form('load',row);
				id=1;
				url = '<?=base_url()?>index.php/apps/modul/edit_pass?idpass='+row.idpass;
			}
		}
		
		function savePass(){
			   
			$('#ff').form('submit',{					
				url:url,					
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
						$.messager.show({
							title: 'Success',
							msg: result.SuccessMsg
						});
						$('#dlg').dialog('close');   
						$('#ff').form('clear');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		
	function delete_Pass(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('Confirm','Are you sure you want to delete this data?',function(r){
                if (r){
                    $.post('<?=base_url()?>index.php/apps/modul/delete_pass',{id:row.idpass},function(result){
                        if (result.SuccessMsg){
							$.messager.show({
							title: 'Success',
							msg: result.SuccessMsg
						});
                            $('#dg').datagrid('reload');    // reload the user data
                        } else {
                            $.messager.show({    // show error message
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        }
                    },'json');
                }
            });
        }
    }
		
		
    function clearForm(){
		
      $('#ff').form('clear');
	  
    }
	</script>