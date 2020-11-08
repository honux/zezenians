var selectedLink = "abc";

function ShowLangBox(elementID)
{
	var element;
	element = document.getElementById(elementID).style;
	if ( element.display == 'none' )
	{
		element.display = 'block';
	}
	else
	{
		element.display='none';
	}
}

function selectItem( selectedElement )
{
	//removing the last configs
	var element;
	element = document.getElementById(selectedLink);
	if ( element != null )
	{
		element.className = "lmenu_link";
	}

	selectedLink = selectedElement;
	
	document.getElementById(selectedElement).className = "lmenu_slink";
}

function Calc()
{
	var el_exp = document.getElementById('rmenu_ccexp');
	var el_lvl = document.getElementById('rmenu_clvl');
	var el_res = document.getElementById('rmenu_cresult');
	
	var exp = parseInt(el_exp.value, 10);
	var lvl = parseInt(el_lvl.value, 10);
	var res = 0;
	
	var lvl_exp = 0;
	
	el_res.style.display = "none";
	
	if ( isNaN(exp) || isNaN(lvl) )
	{
		alert('Please fill all the fields');
		( exp == '' )? el_exp.focus() : el_lvl.focus();
		return false;
	}
	else if ( exp < 0 || lvl < 2 )
	{
		alert('There are some incorrect values.');
		return false;
	}

	lvl_exp = (((2*Math.pow(lvl,3) + 3*Math.pow(lvl,2)+lvl)/6)-1)*50;
	
	if ( lvl_exp - exp <= 0 )
	{
		alert('You already got this lvl.');
		return false;
	}
	else
	{
		el_res.style.display = "block";
		el_res.value = lvl_exp - exp;
		return true;
	}
}

function redir ( lang )
{
	document.location = 'http://'+lang+'.zezenians.com/';
}