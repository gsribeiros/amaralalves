function abreImagemAbertura() {
	var imagens = new Array('teste1.png','teste2.png');
	var i = imagens.length;
	var j = Math.floor( Math.random() * ( i ) );
	document.getElementById('obras').style.background = 'url(img/obras/'+imagens[j]+')';
	setTimeout('abreImagemAbertura()',1050);
}

function galeria(id){
	
	$('#galeria').load('galeria.php?cd='+id );
	setTimeout("document.getElementById('galeria').style.display='block'",1000);
	//;
	}
function noticia(id){
	
	$('#noticia').load('noticia.php?id='+id );
	//setTimeout("document.getElementById('galeria').style.display='block'",1000);
	//;
	}
function menunoticia(id){
	var clase ='lim'+id;
	var ststus = document.getElementsByClassName(clase)[0].style.display;
	//alert(ststus);
	
	var myObjs = document.getElementsByClassName(clase);
	for (i=0;i<myObjs.length;i++){
		if(ststus=='none'){      myObjs[i].style.display='block';}
		else{      myObjs[i].style.display='none';}
    }
	/*var myObjs = document.getElementsByClassName('lim');
	//document.getElementsByClassName("lim").style.display='block';
	//var ststus = document.getElementsByClassName('lim '+id).style.display;
	//alert('lim '+id);
	
	for (i=0;i<myObjs.length;i++){
      myObjs[i].style.display='none';
    }
	
	var myObjs2 = document.getElementsByClassName(id);
	//document.getElementsByClassName("lim").style.display='block';
	for (i=0;i<myObjs2.length;i++){
      myObjs2[i].style.display='block';
    }
	
	//document.getElementsByClassName(id).style.display='block';
	//alert(id);*/
	}
function mostratitulo(id){
	
	//document.getElementById(id).style.display='block';
	}
function escondetitulo(id){
	
	//document.getElementById(id).style.display='none';
	}
function mostrasubmenu(id){
	
	document.getElementById(id).style.display='block';
	}
function escondesubmenu(id){
	
	document.getElementById(id).style.display='none';
	}
function cursor_link() {
document.body.style.cursor = 'hand';
}
function cursor_normal() {
document.body.style.cursor = 'default';
}
//***********************Adciona campo no form***********************
var idm 	= 1;
var ids 	= 1;
var idsi 	= 1;
var idps	= 1;
var idpd	= 1;
var idt		= 1;
var idcl	= 1;
var idclp	= 1;
var idcn	= 1;
var idflp	= 1;
var idfl	= 1;

function atualizaN(){
	n = 1;
	$('.rows').each(function(){
		$(this).find('.NSpan').html(n);
		n += 1;
	});
}

function addFormFoto(campo){
	
	
	atualizaN();
	campo.style.display='none';
	idtp=idt +  1;
	$('#addfoto'+idt).load('add-foto.php?cd='+idtp );
	idt +=  1;	
}
