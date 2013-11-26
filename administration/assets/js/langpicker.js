function setCookie(c_name,value,exdays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value+"; path=/";
}

function setlanguage(value){
	setCookie("lang_code", value, 365);
   var url = "'" + window.location + "'";
	if(url.indexOf('=') >= 0){
		url = url.substring(1, url.length - 3)
		var org_url = url +value
	}else{
		var p =  window.location;
		var org_url = p + "?lang="+value
	}
    window.location.href = org_url;
}