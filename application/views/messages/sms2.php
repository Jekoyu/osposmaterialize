<?php $this->load->view("themes/header"); ?>
<body>
	<!-- loader -->
	<div class="loading"></div>

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<?php $this->load->view('themes/topbar');?>
		<?php $this->load->view('themes/sidebar');?>
				
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Beranda</a></li>
				<li><a href="javascript:;">SMS</a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">SMS</h1>
			<!-- end page-header -->
			
			<div class="row">
			    <div class="col-md-12">
	                <div class="panel panel-inverse">
	                    <!-- <div class="panel-heading">
	                        <h4 class="panel-title">Panel Title here</h4>
	                    </div> -->
	                    <div class="panel-body">
	                    	<!-- original ospos -->
							<script type="text/javascript">
								dialog_support.init("a.modal-dlg");
							</script>
								      
								<?php echo form_open("messages/send/", array('id'=>'send_sms_form', 'enctype'=>'multipart/form-data', 'method'=>'post', 'class'=>'form-horizontal')); ?>
									<fieldset>
										<legend style="text-align: center;"><?php echo $this->lang->line('messages_sms_send'); ?></legend>
										<div class="form-group form-group-sm">
											<label for="phone" class="col-xs-3 control-label"><?php echo $this->lang->line('messages_phone'); ?></label>
											<div class="col-xs-9">
												<input class="form-control input-sm", type="text", name="phone", placeholder="<?php echo $this->lang->line('messages_phone_placeholder'); ?>"></input>
												<span class="help-block" style="text-align:center;"><?php echo $this->lang->line('messages_multiple_phones'); ?></span>
											</div>
										</div>

										<div class="form-group form-group-sm">
											<label for="message" class="col-xs-3 control-label"><?php echo $this->lang->line('messages_message'); ?></label>
											<div class="col-xs-9">
												<textarea class="form-control input-sm" rows="3" id="message" name="message" placeholder="<?php echo $this->lang->line('messages_message_placeholder'); ?>"></textarea>
											</div>
										</div>

										<?php echo form_submit(array(
											'name'=>'submit_form',
											'id'=>'submit_form',
											'value'=>$this->lang->line('common_submit'),
											'class'=>'btn btn-primary btn-sm pull-right'));?>
									</fieldset>
								<?php echo form_close(); ?>
							<script type="text/javascript">
							//validation and submit handling
							$(document).ready(function()
							{
								$('#send_sms_form').validate({
									submitHandler: function(form) {
										$(form).ajaxSubmit({
											success: function(response)	{
												$.notify(response.message, { type: response.success ? 'success' : 'danger'} );
											},
											dataType: 'json'
										});
									}
								});
							});
							</script>
							<!-- ./original ospos -->
	                    </div>
	                </div>
	            </div>
	        </div>
		</div>

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->

	</div>
<?php $this->load->view('themes/footer');?>