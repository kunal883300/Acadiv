<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>

<div class="nk-content">
   <div class="container-fluid">
      <div class="nk-content-inner">
         <div class="nk-content-body">
            <div class="nk-block">
				<div class="card card-bordered">
				   <div class="card-inner">
						<div class="nk-block">
							 <div class="row gy-5">
								<div class="col-lg-4">
									<div class="nk-block-head">
										<div class="nk-block-head-content">
											<h5 class="nk-block-title title"><?php echo $this->lang->line('role'); ?></h5>
										</div>
									</div><!-- .nk-block-head -->
									<?php if ($this->session->flashdata('msg')) {
												echo $this->session->flashdata('msg');
												$this->session->unset_userdata('msg');
											}
										  if (isset($error_message)) {
											 echo "<div class='alert alert-danger'>" . $error_message . "</div>";
										  }
									  ?>
									
									  <div class="card card-bordered">
										 <div class="card-inner">
											<form id="form1" action="<?php echo site_url('admin/roles') ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
												  <?php echo $this->customlib->getCSRF(); ?>
												  <div class="form-group mb5">
													 <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?></label><small class="text-danger"> *</small>
													 <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control" value="<?php echo set_value('name'); ?>" />
													 <span class="text-danger"><?php echo form_error('name'); ?></span>
												  </div>
											   <div class="box-footer">
												  <button type="submit" class="btn btn-info pull-right my-2"><?php echo $this->lang->line('save'); ?></button>
											   </div>
											</form>
										 </div>
									  </div>
								</div>
								<div class="col-lg-8">
									<div class="nk-block-head">
										<div class="nk-block-head-content">
											<h5 class="nk-block-title title"><?php echo $this->lang->line('role_list'); ?></h5>
										</div>
									</div><!-- .nk-block-head -->
									<?php if ($this->session->flashdata('list_msg')) { ?>
									  <?php
									  echo $this->session->flashdata('list_msg');
									  $this->session->unset_userdata('list_msg');
									  ?>
								   <?php } ?>
									  <div class="card card-bordered p-1">
											<table class="table table-bordered example">
											   <thead>
												  <tr>
													 <th><?php echo $this->lang->line('role'); ?></th>
													 <th><?php echo $this->lang->line('type'); ?></th>
													 <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
												  </tr>
											   </thead>
											   <tbody>
												  <?php if (empty($listroute)) {
												  ?>
													 <?php
												  } else {
													 $count = 1;
													 foreach ($listroute as $data) {
													 ?>
														<tr>
														   <td class="mailbox-name"> <?php echo $data['name'] ?></td>
														   <td class="mailbox-name">
															  <?php
															  if ($data['is_system']) {

																 echo $this->lang->line('system');
															  } else {
																 echo $this->lang->line('custom');
															  }
															  ?>
														   </td>
														   <td class="mailbox-date no-print">
															  <?php
															  if (!$data['is_superadmin']) {
															  ?>
																 <a href="<?php echo site_url('admin/roles/permission/' . $data['id']); ?>" class="btn btn-icon btn-xs btn-white btn-dim btn-outline-info p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('assign_permission'); ?>">
																	<em class="ni ni-tag-fill"></em>
																 </a>
																 <a href="<?php echo site_url('admin/roles/edit/' . $data['id']); ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-primary p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
																	<em class="ni ni-edit"></em>
																 </a>
																 <?php
																 if (!$data['is_system']) {
																 ?>
																	<a href="<?php echo site_url('admin/roles/delete/' . $data['id']); ?>" class="btn btn-icon btn-sm btn-white btn-dim btn-outline-danger p-1" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
																	   <em class="ni ni-trash"></em>
																	</a>

																 <?php
																 }
																 ?>
															  <?php
															  }
															  ?>
														   </td>
														</tr>
												  <?php
													 }
													 $count++;
												  }
												  ?>
											   </tbody>
											</table>
									  </div>
								</div>
							 </div>
						</div>
				   </div>
			   </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   $(document).ready(function() {
      $("#btnreset").click(function() {
         $("#form1")[0].reset();
      });
   });
</script>

<script type="text/javascript">
   var base_url = '<?php echo base_url() ?>';

   function printDiv(elem) {
      Popup(jQuery(elem).html());
   }

   function Popup(data) {
      var frame1 = $('<iframe />');
      frame1[0].name = "frame1";
      frame1.css({
         "position": "absolute",
         "top": "-1000000px"
      });
      $("body").append(frame1);
      var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
      frameDoc.document.open();
      //Create a new HTML document.
      frameDoc.document.write('<html>');
      frameDoc.document.write('<head>');
      frameDoc.document.write('<title></title>');
      frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/bootstrap/css/bootstrap.min.css">');
      frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/font-awesome.min.css">');
      frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/ionicons.min.css">');
      frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/AdminLTE.min.css">');
      frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/dist/css/skins/_all-skins.min.css">');
      frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/iCheck/flat/blue.css">');
      frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/morris/morris.css">');
      frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">');
      frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/datepicker/datepicker3.css">');
      frameDoc.document.write('<link rel="stylesheet" href="' + base_url + 'backend/plugins/daterangepicker/daterangepicker-bs3.css">');
      frameDoc.document.write('</head>');
      frameDoc.document.write('<body>');
      frameDoc.document.write(data);
      frameDoc.document.write('</body>');
      frameDoc.document.write('</html>');
      frameDoc.document.close();
      setTimeout(function() {
         window.frames["frame1"].focus();
         window.frames["frame1"].print();
         frame1.remove();
      }, 500);

      return true;
   }
</script>