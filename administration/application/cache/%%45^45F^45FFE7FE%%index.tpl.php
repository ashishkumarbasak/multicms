<?php /* Smarty version 2.6.19, created on 2013-11-11 05:50:23
         compiled from manage/documents2/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'manage/documents2/index.tpl', 34, false),)), $this); ?>
<?php echo '
<style type="text/css">
	.blue_background{ background:#ecf9ff; border:solid #bbdbe0 1px;}
</style>
'; ?>

<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block">
			
	
				
				
				<div class="block_content">
			
						
					<form action="" method="post">
					
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable" border="0">
						
							<thead>
								<tr>
									<th width="10"><input type="checkbox" class="check_all" /></th>
									<th>Document Name</th>
                                    <th>Category Name</th>
									<th width="100">Action</th>
								</tr>
							</thead>
							
							<tbody>
								<?php $_from = $this->_tpl_vars['documentlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofcategories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofcategories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ck'] => $this->_tpl_vars['document']):
        $this->_foreach['listofcategories']['iteration']++;
?>
								<tr>
									<td><input type="checkbox" /></td>
									<td>
                                    	<a target="_blank" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseurl'])) ? $this->_run_mod_handler('replace', true, $_tmp, "administration/", "") : smarty_modifier_replace($_tmp, "administration/", "")); ?>
assets/documents/<?php echo $this->_tpl_vars['document']->document_file_name; ?>
">
                                        	<?php echo $this->_tpl_vars['document']->document_name; ?>

                                        </a>
                                    </td>
                                    <td><?php echo $this->_tpl_vars['document']->category_name_it; ?>
</td>
                                    <td>
                                    	<a class="btn btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/documents2/edit/<?php echo $this->_tpl_vars['document']->document_id; ?>
">edit</a>
                                        <a class="btn btn-danger btn-small" href="<?php echo $this->_tpl_vars['baseurl']; ?>
manage/documents2/delete/<?php echo $this->_tpl_vars['document']->document_id; ?>
" onclick='return confirm("Are you sure you want to delete?")' >Delete</a>
									</td>
								</tr>
								<?php endforeach; endif; unset($_from); ?>
								
												
							</tbody>
							
						</table>
						
						<?php echo $this->_tpl_vars['pagination_link']; ?>

						
					</form>
														
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>		<!-- .block ends -->