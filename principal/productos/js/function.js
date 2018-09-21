function ex(){
		var e = document.getElementsByTagName('op');
		if (e.options[e.selectedIndex].value== 2) {
			document.getElementsByTagName('ex').disabled=false;
		}
}