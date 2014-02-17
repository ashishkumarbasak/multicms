<?php /* Smarty version 2.6.19, created on 2014-02-12 16:16:57
         compiled from manage/menus/create_menu_form_it.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'manage/menus/create_menu_form_it.tpl', 29, false),)), $this); ?>
						<?php if (isset ( $this->_tpl_vars['menu_created_successfully'] )): ?>
                        	<div class="message info">
                            <p>
                            	Menu Created Successfully.
                            </p>
                            </div>
                        <?php endif; ?>
                        
                    				
						<table cellpadding="0" cellspacing="0" width="100%" class="sortable margin">
							<thead></thead>							
							<tbody>
								<tr>
									<td><label>Menu Name:</label></td>
									<td><input type="text" class="text small" name="menu_name" value="<?php if (isset ( $this->_tpl_vars['menu_detail'] ) && $this->_tpl_vars['menu_detail']->menu_name != NULL): ?><?php echo $this->_tpl_vars['menu_detail']->menu_name; ?>
 <?php endif; ?>" /></td>
									<td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
								</tr>

                                <tr>
                                	<td><label>Pages:</label></td>
                                    <td>
                                       <table cellpadding="0" cellspacing="0" width="100%" class="sortable">
                                                            <tbody>
                                                                <br>
                                                                <?php $_from = $this->_tpl_vars['pagelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listofpages'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listofpages']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pk'] => $this->_tpl_vars['page']):
        $this->_foreach['listofpages']['iteration']++;
?>
                                                                    <?php $this->assign('subpages', $this->_tpl_vars['sub_page_list'][$this->_tpl_vars['pk']]); ?>
                                                                <tr <?php if ($this->_tpl_vars['page']->mother_page_id == '0'): ?> <?php else: ?> class="blue_background" <?php endif; ?>>
                                                                    <td width="3%">
                                                                        <input type="checkbox" name="assigned_pages[]" value="<?php echo $this->_tpl_vars['page']->page_id; ?>
" id="page_included_<?php echo $this->_tpl_vars['page']->page_id; ?>
" <?php if (isset ( $this->_tpl_vars['assigned_page_ids'] ) && ((is_array($_tmp=$this->_tpl_vars['page']->page_id)) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['assigned_page_ids']) : in_array($_tmp, $this->_tpl_vars['assigned_page_ids']))): ?> checked="checked" <?php endif; ?>  />
                                                                    </td>
                                                                    <td><?php echo $this->_tpl_vars['page']->page_title; ?>
</td>
                                                                </tr>
                                                              	<?php endforeach; endif; unset($_from); ?>
                                                            </tbody>
                                                            
                                                        </table>
                                    </td>
                                    <td><a href="#" class="tooltip-test" title="Tooltip"><i class="icon-info-sign"></i></a></td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                    	<?php if (isset ( $this->_tpl_vars['menu_id'] ) && $this->_tpl_vars['menu_id'] != NULL): ?>
                                    		<input type="hidden" name="menu_id" id="menu_id" value="<?php echo $this->_tpl_vars['menu_id']; ?>
">
                                    	<?php endif; ?>
                                        <input class="btn" type="submit" value="Submit" name="save_menu">
                                    </td>
                                    <td></td>
								</tr>
							</tbody>
						</table>