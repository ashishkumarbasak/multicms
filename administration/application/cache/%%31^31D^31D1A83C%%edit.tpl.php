<?php /* Smarty version 2.6.19, created on 2013-07-26 07:12:40
         compiled from manage/videos/edit.tpl */ ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['baseurl']; ?>
assets/js/jQuery-File-Upload/css/jquery.fileupload-ui.css">

<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			<div class="block_content">
				
                <form action="" method="post" enctype="multipart/form-data">
                	<input type="hidden" id="VideoEdit" name="VideoEdit" value="VideoEdit">
                    <input type="hidden" id="trv_video_id" name="trv_video_id" value="<?php if ($this->_tpl_vars['video_details'] != NULL): ?><?php echo $this->_tpl_vars['video_details']->trv_video_id; ?>
<?php endif; ?>">	
					<div class="tabbable">
						<ul class="nav nav-tabs" style="height:52px !important;">
                            <li class="active"><a data-toggle="tab" href="#tab1"> italiano</a></li>
                            <li><a data-toggle="tab" href="#tab2">english</a></li>
                            <li><a data-toggle="tab" href="#tab3">french</a></li>
							<li><a data-toggle="tab" href="#tab4">Breton</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab1" class="tab-pane active">
                				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/videos/create_video_form_it.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                			</div>
                            <div id="tab2" class="tab-pane">
                				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/videos/create_video_form_en.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                			</div>
                            <div id="tab3" class="tab-pane">
                				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/videos/create_video_form_fr.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                			</div>
                            <div id="tab4" class="tab-pane">
                				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "manage/videos/create_video_form_br.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                			</div>
          				</div>
        			</div>
				</form>
			
            </div>		<!-- .block_content ends -->
		</div>		<!-- .block_content ends -->
	</div>		<!-- wrapper ends -->
</div>		<!-- #hld ends -->