

		<?php $url_data=base_url().'index.php/apps/modul/get_Data_Pass_Pending/Pending';?>
		<table id="dg" title="Data Outstanding Pass Keluar" class="easyui-datagrid" style ="width:100%;height:auto"
		url   ="<?php echo $url_data;?>" toolbar="#toolbar"
		pagination="true"
		rownumbers="false"
		fitColumns="true" singleSelect="true"
		checkBox  ="true" striped="true"
		remoteSort="false"
		nowrap    ="false"
		data-options="pageList:[10,25,50,75,100]">
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

		  <a href="#" class="easyui-linkbutton c1" data-options="iconCls:'icon-edit',plain:true" onclick="editPass();">Update Pass</a>
		   <a href="#" class="easyui-linkbutton c5" data-options="iconCls:'icon-remove',plain:true" onclick="Form_Reject();">Reject</a>
		  <input  id="search" placeholder="Cari No. RDO">

		  <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-refresh',plain:true" onclick="doSearch('reset');">Clear search</a>
		</div>
		<!--END OF TOOLBAR-->


 <!-- DIALOG EDIT FORM PASS -->
<div id="dlg" class="easyui-dialog" style="width:60%;padding:30px 60px;"  closed="true" buttons="#dlg-buttons">

 <form id="ff" class="easyui-form" method="post" data-options="novalidate:false">
 <input name="idpass" type="hidden">
 <input name="status" type="hidden">

 <table width="100%" border="0" class="table-condensed">
  <tr>
    <td width="16%">Nomor RDO</td>
    <td width="1%">:</td>
    <td width="27%"><input name="nomor_rdo"  disabled class="easyui-textbox" style="width:100%;" tabindex="1" data-options="required:true"></td>
    <td width="9%">&nbsp;</td>
    <td width="18%">Tujuan</td>
    <td width="1%">:</td>
    <td width="28%"><input name="tujuan" disabled  class="easyui-textbox" style="width:100%;"  tabindex="6"  data-options="required:true" /></td>
  </tr>
  <tr>
    <td>Customer</td>
    <td>:</td>
    <td><input name="customer" disabled class="easyui-textbox"  style="width:100%;" tabindex="2" data-options="required:true"/></td>
    <td>&nbsp;</td>
    <td>Tanggal keluar</td>
    <td>:</td>
    <td><input name="tglkeluar" disabled class="easyui-datebox" style="width:100%;"  tabindex="7" data-options="formatter:myformatter,parser:myparser, required:true"  /></td>
  </tr>
  <tr>
    <td>Nomor Polisi</td>
    <td>:</td>
    <td><input name="nopol" readonly class="easyui-textbox" style="width:100%;" tabindex="3" data-options="required:true" /></td>
    <td>&nbsp;</td>
    <td>Jam Keluar (Wib)</td>
    <td>:</td>
    <td><input name="jamkeluar" disabled class="easyui-maskedbox" mask="99:99" style="width:100%;"  tabindex="8" data-options="required:true"/></td>
  </tr>
  <tr>
    <td>Warna</td>
    <td>:</td>
    <td><input name="warna" disabled class="easyui-textbox" style="width:100%;" tabindex="4" data-options="required:true"/></td>
    <td>&nbsp;</td>
    <td>Start Sewa</td>
    <td>:</td>
    <td><input name="start" disabled class="easyui-datebox" style="width:100%;" tabindex="9" data-options="formatter:myformatter,parser:myparser,required:true"  /></td>
  </tr>
  <tr>
    <td>Driver</td>
    <td>:</td>
    <td><input name="driver" disabled class="easyui-textbox" style="width:100%;"  tabindex="5"data-options="required:true" /></td>
    <td>&nbsp;</td>
    <td>End Sewa</td>
    <td>:</td>
    <td><input name="end" disabled class="easyui-datebox" style="width:100%;"  tabindex="10"  data-options="formatter:myformatter,parser:myparser,required:true" /></td>
  </tr>
  <tr>
    <td>Kilometer</td>
    <td>:</td>
    <td> <input name="kilometer"  class="easyui-numberbox" style="width:100%;"  tabindex="5"data-options="required:true" /> </td>
    <td>&nbsp;</td>
    <td>BBM</td>
    <td>:</td>
    <td>
	<select name="bbm" class="easyui-combobox"  style="width:100%;">
		<option value="E">E</option>
		<option value="1/8">1/8</option>
		<option value="1/4">1/4</option>
		<option value="1/2">1/2</option>
		<option value="3/4">3/4</option>
		<option value="F">F</option>
	</select>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td> 	</td>
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

		<a href="javascript:void(0)" class="easyui-linkbutton c7" onclick="savePass()" tabindex="11" style="width:50%">Post</a>
		</div>
	</td>
  </tr>
</table>


		</form>

</div>

<!-- DIALOG REJECT PASS -->
<div id="dlg2" class="easyui-dialog" style="width:40%;padding:30px 60px;"  closed="true" buttons="#dlg-buttons">

 <form id="fm" class="easyui-form" method="post" data-options="novalidate:false">
 <input name="idpass" type="hidden">
 <table width="100%" border="0" class="table-condensed">
  <tr>
    <td width="25%"> Masukan Alasan Pembatalan </td>
    <td width="1%">:</td>
    <td width="27%"><input name="reason" multiline="true"   class="easyui-textbox" style="width:100%; height:100px" tabindex="1" data-options="required:true"></td>
     </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

    <td>
    	<div style="text-align:right;padding:5px 0">

		<a href="javascript:void(0)" class="easyui-linkbutton c7" onclick="RejectPass()" tabindex="11" style="width:50%">Post</a>
		</div>
	</td>
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



	function editPass(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Update Pass Keluar');
				$('#ff').form('load',row);
				id=row.idpass;
				url = '<?=base_url()?>index.php/apps/modul/Edit_Pass_Pending?idpass='+row.idpass;
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

						 $.messager.confirm('Confirm','Apakah ingin cetak pass keluar?',function(r){
							if (r){

								var w = window.open('<?=base_url();?>index.php/apps/modul/get_print/'+id+'' ,'_blank', 'location=yes,height=700,width=900,scrollbars=yes,status=yes,position=center');
								var $w = $(w.document.body);
								$w.html();
							}
						}); // end messager.confirm

					}
				}
			});
		}


	function Form_Reject(){

       var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg2').dialog('open').dialog('setTitle','Yakin ingin membatalkan pass keluar ini?');
				$('#fm').form('load',row);
				url = '<?=base_url()?>index.php/apps/modul/Reject_pass?idpass='+row.idpass;
			}


    }

	function RejectPass(){

			$('#fm').form('submit',{
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
						$('#dlg2').dialog('close');
						$('#fm').form('clear');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					}
				}
			});
		}

    function clearForm(){
        $('#ff').form('clear');
    }
	</script>
