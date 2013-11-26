<div id="header-sub">
	<div class="wrapper">		<!-- wrapper begins -->
		<h2>{$section} / <strong>{$operation}</strong></h2>
        
        <span style="float:right;">
        <b>Choose Language: </b>
			{foreach from=$langlist item=lang name=ll key=cl}
				<a href="javascript:void(0);" onclick="setlanguage('{$lang->flag}');">
                	<img src="{$baseurl}assets/images/flags/png/{$lang->flag}.png" style="border:0px; padding-top:3px; margin-left:2px;">
                </a>
            {/foreach}
        </span>
        <span style="clear:both;"></span>
	</div>	
</div>		<!-- #header ends -->