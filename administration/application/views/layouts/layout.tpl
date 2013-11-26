{include file="layouts/header.tpl"}

{include file="layouts/breadcamp.tpl"}
			
{if isset($page)}
	{include file=$page}
{/if}			
			
{include file="layouts/footer.tpl"}