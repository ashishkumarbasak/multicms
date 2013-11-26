<label style="margin-top:7px;"><?php echo lang('type_of_sub_hotel');?></label>
	<?php 
      	 if(isset($sub_category))
			$selected_sub_category = $sub_category;
		else
			$selected_sub_category = $profile_details->sub_category;
	?>
	<select name="sub_category" id="sub_category">
		 <option value=""><?php echo lang('select_sub_category');?></option>
		 <?php if($subCategories!=NULL) { ?>
		 	<?php foreach($subCategories as $key=>$subcategory) { ?>
				<option value="<?php echo $subcategory->category_id;?>" <?php if(isset($selected_sub_category) && $selected_sub_category==$subcategory->category_id && !isset($ajax_load)){ ?> selected="selected" <?php } ?> ><?php echo $subcategory->category_name_it;?></option>
			<?php } ?>
        <?php } ?>
	</select>
<div class="clearfix"></div>