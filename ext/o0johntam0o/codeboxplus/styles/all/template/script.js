function codebox_plus_toggle(a, tmp)
{
	if (tmp)
	{
		var e = a.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0];
	}
	else
	{
		var e = a.parentNode.parentNode.getElementsByTagName('dd')[0];
	}
	
	if (e.style.display == 'none')
	{
		e.style.display = 'inline';
	}
	else
	{
		e.style.display = 'none';
	}
}

function codebox_plus_select(a, tmp)
{
	if (tmp)
	{
		var e = a.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0];
	}
	else
	{
		var e = a.parentNode.parentNode.getElementsByTagName('dd')[0];
	}

	// Not IE and IE9+
	if (window.getSelection)
	{
		var s = window.getSelection();
		// Safari
		if (s.setBaseAndExtent)
		{
			s.setBaseAndExtent(e, 0, e, e.innerText.length - 1);
		}
		// Firefox and Opera
		else
		{
			// workaround for bug # 42885
			if (window.opera && e.innerHTML.substring(e.innerHTML.length - 4) == '<br>')
			{
				e.innerHTML = e.innerHTML + '&nbsp;';
			}

			var r = document.createRange();
			r.selectNodeContents(e);
			s.removeAllRanges();
			s.addRange(r);
		}
	}
	// Some older browsers
	else if (document.getSelection)
	{
		var s = document.getSelection();
		var r = document.createRange();
		r.selectNodeContents(e);
		s.removeAllRanges();
		s.addRange(r);
	}
	// IE
	else if (document.selection)
	{
		var r = document.body.createTextRange();
		r.moveToElementText(e);
		r.select();
	}
}