<?php /* Smarty version 2.6.19, created on 2013-11-06 17:45:14
         compiled from manage/events/create.tpl */ ?>
<div id="hld">
	<div class="wrapper">		<!-- wrapper begins -->
		<div class="block withsidebar">
			
	
				
				
				<div class="block_content">
					<h1>Add Eventi</h1>   
					
					
					<div class="sidebar_content" id="pages">
					
					
                    
                    
                    
                    <form name="add_event_form" id="add_event_form" method="post" action="" enctype="multipart/form-data">
		<?php if (isset ( $this->_tpl_vars['product_create_successfully'] ) && $this->_tpl_vars['product_create_successfully'] != NULL): ?>
			Your Event Added Successfully. Thanks
		<?php endif; ?>	
		<table class="events-standard-table">
			<tr>
				<td class="label"><label>Nome:</label></td>
				<td>
					<input type="text" name="event_name" id="event_name" class="text" />
					<?php if (isset ( $this->_tpl_vars['event_name_blank'] ) && $this->_tpl_vars['event_name_blank'] != NULL): ?>
						<div class="error-message">Event name can't be left blank.</div>
					<?php endif; ?>
				</td>
			</tr>
				
			<tr>
				<td class="label"><label>Sottotitolo:</label></td>
				<td>
					<input type="text" name="event_subtitle" id="event_subtitle" class="text" />
					<?php if (isset ( $this->_tpl_vars['event_subtitle_blank'] ) && $this->_tpl_vars['event_subtitle_blank'] != NULL): ?>
						<div class="error-message">Event Sottotitolo can't be left blank.</div>
					<?php endif; ?>
				</td>
			</tr>
				
			<tr>
				<td class="label"><label>Descrizione:</label></td>
				<td>
					<textarea name="event_description" id="event_description" class="text textarea" ></textarea>
					<?php if (isset ( $this->_tpl_vars['event_description_blank'] ) && $this->_tpl_vars['event_description_blank'] != NULL): ?>
						<div class="error-message">Event descrizione can't be left blank.</div>
					<?php endif; ?>
				</td>
			</tr>
				
			<tr>
				<td class="label"><label>Data:</label></td>
				<td>
					<input type="text" id="datepicker" name="event_date" class="text" />
					<?php if (isset ( $this->_tpl_vars['event_date_blank'] ) && $this->_tpl_vars['event_date_blank'] != NULL): ?>
						<div class="error-message">Event date can't be left blank.</div>
					<?php endif; ?>
				</td>
			</tr>
			
			<tr>
				<td class="label"><label>Foto:</label></td>
				<td>
					<input type="file" name="event_photo" id="event_photo" class="text" />
				</td>
			</tr>
				
			<tr>
				<td class="label"><label>File:</label></td>
				<td><input type="file" name="event_file" id="event_file" class="text" /></td>
			</tr>
			
			<tr>
				<td><label>Starts:</label></td>
				<td>
					<select name="event_time" id="event_time">
						<option value="8:00">8:00</option>
						<option value="8:30">8:30</option>
						<option value="9:00">9:00</option>
						<option value="9:30">9:30</option>
						<option value="10:00">10:00</option>
						<option value="10:30">10:30</option>
						<option value="11:00">11:00</option>
						<option value="11:30">11:30</option>
						<option value="12:00">12:00</option>
						<option value="12:30">12:30</option>
						<option value="13:00">13:00</option>
						<option value="13:30">13:30</option>
						<option value="14:00">14:00</option>
						<option value="14:30">14:30</option>
						<option value="15:00">15:00</option>
						<option value="15:30">15:30</option>
						<option value="16:00">16:00</option>
						<option value="16:30">16:30</option>
						<option value="17:00">17:00</option>
						<option value="17:30">17:30</option>
						<option value="18:00">18:00</option>
						<option value="18:30">18:30</option>
						<option value="19:00">19:00</option>
						<option value="19:30">19:30</option>
						<option value="20:00">20:00</option>
						<option value="20:30">20:30</option>
						<option value="21:00">21:00</option>
						<option value="21:30">21:30</option>
						<option value="22:00">22:00</option>
						<option value="22:30">22:30</option>
						<option value="23:00">23:00</option>
						<option value="23:30">23:30</option>
					</select>
				</td>
			</tr>

			<tr>
				<td></td>
				<td>                                   
					<button type="submit" name="add_event" id="add_event" value="submit" class="btn">Aggiungi evento</button>
				</td>
			</tr>
		</table>
		</form>
                    
                    
                    
                    
                    
					
					</div>
														
					
				</div>		<!-- .block_content ends -->
				
				<div class="bendl"></div>
				<div class="bendr"></div>
			</div>		<!-- .block ends -->
		