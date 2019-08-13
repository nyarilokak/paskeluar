
	<?php $url_data=base_url().'index.php/apps/modul/get_Data_Pass_History';?>
	<table id="dg" title="History Pass Keluar" class="easyui-datagrid" style ="width:100%;height:auto"
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
			    <th field="status" sortable="true" width="20"> <b>Status</b></th>
			   </tr>
			 </thead>
	 </table>

<!--TOOLBAR di Datagrid-->
<div id="toolbar">
  <a href="#" class="easyui-linkbutton c1" data-options="iconCls:'icon-search',plain:true" onclick="editPass();" title="Detail Pass Keluar">Detail</a>
  <a href="#" class="easyui-linkbutton c2" data-options="iconCls:'icon-print',plain:true" onclick="print_Pass();" title="Cetak Pass Keluar">Print</a>
  <a href="#" class="easyui-linkbutton c7" data-options="iconCls:'icon-download',plain:true" onclick="download();" title="Export Excel">Download</a>
  <input id="search" placeholder="Cari No. RDO">
  <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-pin',plain:true" onclick="doSearch('reset');">Clear search</a>
</div>
<!--END OF TOOLBAR-->


	 <!-- DIALOG EDIT FORM PASS -->
			<div id="dlg" class="easyui-dialog" style="width:60%;padding:30px 60px;"  closed="true" buttons="#dlg-buttons">

			 <form id="ff" class="easyui-form" method="post" data-options="novalidate:false">
			 <input name="idpass" type="hidden">
			  <input name="stts" type="hidden" value="In">
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
				<td><input name="nopol" disabled class="easyui-textbox" style="width:100%;" tabindex="3" data-options="required:true" /></td>
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
				<td><input name="driver" disabled class="easyui-textbox" style="width:100%;"  tabindex="5" data-options="required:true" /></td>
				<td>&nbsp;</td>
				<td>End Sewa</td>
				<td>:</td>
				<td><input name="end" disabled class="easyui-datebox" style="width:100%;"  tabindex="10"  data-options="formatter:myformatter,parser:myparser,required:true" /></td>
			  </tr>
			  <tr>
				<td>Kilometer Awal</td>
				<td>:</td>
				<td> <input name="kilometer1"   disabled class="easyui-numberbox" style="width:100%;"  tabindex="6" data-options="required:true" /> </td>
				<td>&nbsp;</td>
				<td>BBM Awal</td>
				<td>:</td>
				<td>
				<select name="bbm1" disabled class="easyui-combobox"  tabindex="11" style="width:100%;">
					<option value="">E</option>
					<option value="1/8">1/8</option>
					<option value="1/4">1/4</option>
					<option value="1/2">1/2</option>
					<option value="3/4">3/4</option>
					<option value="F">F</option>
				</select>
				</td>
			  </tr>

			  <tr>
				<td>Tanggal Masuk</td>
				<td>:</td>
				<td><input name="tglmasuk"  disabled class="easyui-datebox" style="width:100%;"  tabindex="7" data-options="formatter:myformatter,parser:myparser, required:true"  /></td>
			 </td>
				<td>&nbsp;</td>
				<td>Jam Masuk</td>
				<td>:</td>
				<td>  <input name="jammasuk"  disabled class="easyui-maskedbox" mask="99:99" style="width:100%;"  tabindex="8" data-options="required:true"/>  </td>
				 </tr>
			  <tr>
				<td>Kilometer Akhir </td>
				<td>:</td>
				<td><input name="kilometer2"  disabled  class="easyui-numberbox" style="width:100%;"  tabindex="6" data-options="required:true" /> </td>
				<td>&nbsp;</td>
				<td>BBM Akhir</td>
				<td>:</td>
				<td> <select name="bbm2"  disabled class="easyui-combobox"  tabindex="11" style="width:100%;">
					<option value="">E</option>
					<option value="1/8">1/8</option>
					<option value="1/4">1/4</option>
					<option value="1/2">1/2</option>
					<option value="3/4">3/4</option>
					<option value="F">F</option>
				</select></td>
			  </tr>
			  <tr>
				<td>Remark </td>
				<td>:</td>
				<td><input name="keterangan" disabled   class="easyui-textbox" style="width:100%;"></td>
			   <td>&nbsp;</td>
				<td>Approved</td>
				<td>: </td>
				<td> <input name="disetujui"  disabled  class="easyui-textbox" style="width:100%;"  />	</td>
			  </tr>

			   <tr>
				<td>Dikeluarkan Oleh </td>
				<td>:</td>
				<td><input name="dibuatoleh" disabled   class="easyui-textbox" style="width:100%;"></td>
			   <td>&nbsp;</td>
				<td></td>
				<td> </td>
				<td>  </td>
			  </tr>

			</table>
			</form>

		</div>

	<script>
	function print_Pass(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to print this data?',function(r){
					if (r){
						var w = window.open('<?=base_url();?>index.php/apps/modul/get_print/'+row.idpass+'' ,'_blank', 'location=yes,height=700,width=900,scrollbars=yes,status=yes,position=center');
						var $w = $(w.document.body);
						$w.html();
					}
				});
			}
		}

		function editPass(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Informasi Pass Keluar');
				$('#ff').form('load',row);
				id=row.idpass;
				url = '<?=base_url()?>index.php/apps/modul/Edit_Pass_Pending?idpass='+row.idpass;
			}
	}

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
