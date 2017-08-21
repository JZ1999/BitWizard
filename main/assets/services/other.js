function cr_show(){
	document.getElementById('kot_table').style.display='none';
	document.getElementById('coc_table').style.display='none';
	document.getElementById('cr_table').style.display='table';
	document.getElementById('lol_table').style.display='none';
}

function lol_show(){
	document.getElementById('kot_table').style.display='none';
	document.getElementById('coc_table').style.display='none';
	document.getElementById('cr_table').style.display='none';
	document.getElementById('lol_table').style.display='table';
}

function coc_show(){
	document.getElementById('kot_table').style.display='none';
	document.getElementById('lol_table').style.display='none';
	document.getElementById('cr_table').style.display='none';
	document.getElementById('coc_table').style.display='table';
}

function kot_show(){
	document.getElementById('kot_table').style.display='table';
	document.getElementById('lol_table').style.display='none';
	document.getElementById('cr_table').style.display='none';
	document.getElementById('coc_table').style.display='none';
}
var num = 0;
function change(){
	if(num == 0){
		document.getElementById("ini_f").style.display = "none";
		document.getElementById("reg_f").style.display = "inline";
		num = 1;
	}else{
		document.getElementById("ini_f").style.display = "inline";
		document.getElementById("reg_f").style.display = "none";
		num = 0;
	}
}

function hide(){
	this.style.display = "none";
}