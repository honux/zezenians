if(!(parent.document.getElementById('middle')))
{
	var page = document.location.href.substr(document.location.href.lastIndexOf("mod")+4);
	document.location = 'http://zezenians.com/?redir='+page;
}

function HideRMenu ()
{
	parent.document.getElementById('rmenu').style.display = "none";
	parent.document.getElementById('content').style.width = "77%";
}

function ShowRMenu ()
{
	parent.document.getElementById('rmenu').style.display = "block";
	parent.document.getElementById('content').style.width = "57%";
}

function checkHeight(nameFrame)
{
	if(document.getElementById)
	{
		parent.document.getElementById(nameFrame).style.height = (document.getElementById('pheight').offsetHeight+20)+'px';
	}
	else
	{
		parent.document.all(nameFrame).height = document.body.scrollHeight;
	}
}