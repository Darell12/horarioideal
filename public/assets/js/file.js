
var offxf;
var offyf;
var contenidoaguardar = [];
var contenidorellenado = [];
var aciertos = 0;
var errores = 0;
var preguntas = 0;
var preguntasdetest = 0;
var respuestasdetest = 0;
var aciertosdetest = 0;
var erroresdetest = 0;
var clickedanswer = [];
var grabando = 0;
var intervalo;
var htmlrellenado;
var pnt;
var speechrecognitionenabledbrowser = 0;
var speechsynthesisenabledbrowser = 0;
var respuestascomprobadas = 0;
var resizandoi = 0;
var anorg = 0;
var alorg = 0;
var leorg = 0;
var toorg = 0;
var annu = 0;
var alnu = 0;
var tonu = 0;
var lenu = 0;
var oxf = 0;
var oyf = 0;
var dxf = 0;
var dyf = 0;
var arfi = 0;
var flechaunida = [];
var edstyln = 999999999;
var ognr;
var ognb;
var ogng;
var ogno;
var ognff;
var ognfs;
var ognfc;
var ognbc;
var ognbw;
var ognrc;
var ognta;

var nwr;
var nwb;
var nwg;
var nwo;
var nwff;
var nwfs;
var nwfc;
var nwbc;
var nwbw;
var nwrc;
var nwta;
var editandostyletipo;
var unixtimeinicial = 0;
var unixtimefinal = 0;
var totaltime = 0;
var maxscore = 10;




function establecerunixtimeinicial() {
	if (unixtimeinicial == 0) {
		unixtimeinicial = Math.floor(Date.now() / 1000);
	}
}


		var ignorarsignos = 0;
	
		var ignorarmayusculas = 1;
	
		var ignoraracentos = 0;
	

function post(path, params, method) {
    method = method || "post";
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}



function copiarEnlace() {
  var copyText = document.getElementById("enlace");
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  document.execCommand("copy");
}


var contenidojson = "elcontenidojson";



if ('webkitSpeechRecognition' in window) {
speechrecognitionenabledbrowser = 1;
}

if ('speechSynthesis' in window) {
	speechsynthesisenabledbrowser = 1;
var lasvoces = speechSynthesis.getVoices();
}

var elnumerodepaginas = 1;
var lacarpetadelworksheet = 'http://www.liveworksheets.com/def_files/2022/11/12/211121823454473679';
var elcodigodelworksheet = '211121823454473679';
var alturatotaldeimagenes = 1413;

function microfonointermitente() {
	if (document.getElementById("microfono" + grabando).innerHTML == "") {
	document.getElementById("microfono" + grabando).innerHTML = '<img src="https://files.liveworksheets.com/images/microfono.png">';
	} else {
	document.getElementById("microfono" + grabando).innerHTML = "";
	}
}

function mostrarcontenido() {
	if (contenidojson == "elcontenidojson") {
		contenidojson = '[["drop:2",224,162,27,187,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","c' + document.getElementById('wswo').getAttribute('class').charAt(2) + 'nt' + document.getElementById('wswo').getAttribute('class').charAt(2) + 'r","","1","4",0],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:1",273,778,27,176,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:6",469,779,26,167,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:8",547,779,23,174,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:12",703,779,25,174,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:13",743,779,25,174,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:6",470,1,27,187,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:8",518,55,27,187,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:13",864,-1,27,187,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:12",618,63,27,187,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:2",314,780,24,185,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","c' + document.getElementById('wswo').getAttribute('class').charAt(2) + 'nt' + document.getElementById('wswo').getAttribute('class').charAt(2) + 'r","","1","4",0],["drop:1",322,7,27,187,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:4",568,87,27,187,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:7",714,27,27,187,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:9",814,29,27,187,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:14",914,205,27,187,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:4",390,780,24,185,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:7",508,780,24,185,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:9",586,780,24,185,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:14",780,780,24,185,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:3",353,779,22,170,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","c' + document.getElementById('wswo').getAttribute('class').charAt(2) + 'nt' + document.getElementById('wswo').getAttribute('class').charAt(2) + 'r","","1","4",0],["drop:3",275,109,25,184,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","c' + document.getElementById('wswo').getAttribute('class').charAt(2) + 'nt' + document.getElementById('wswo').getAttribute('class').charAt(2) + 'r","","1","4",0],["drop:5",371,49,25,184,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:10",421,135,25,184,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:11",667,45,25,184,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["drop:15",766,174,25,184,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:5",431,779,24,170,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:10",625,779,26,170,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:11",663,779,26,170,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"],["dr' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'g:15",820,780,26,170,"",0,"Ari' + document.getElementById('wswo').getAttribute('class').charAt(10) + 'l","14","0000CC","255","255","255","0.5","666666","","","1","4"]]';
	}

	offxf = document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetLeft;
	offyf = document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetTop;
	contenidoaguardar = JSON.parse(contenidojson);
	contenidorellenado = JSON.parse(contenidojson);

	if (contenidoaguardar.indexOf("listen(") > -1 && speechsynthesisenabledbrowser == 0) {
		alert('');
	}

	if (contenidoaguardar.indexOf("speak(") > -1 && speechrecognitionenabledbrowser == 0) {
		alert('This worksheet requires speech recognition, which is not supported by your web browser. We recommend to use Google Chrome to view this worksheet');
	}

	rellenarHtml();

	
}

var tiempotranscurrido = 0;
var tiempolimite = 0;
var cadaminuto;

function ponercuentaatras(tiempo) {
	tiempolimite = tiempo;
	document.getElementById("capatimer").style.display = "block";
	document.getElementById("capatimer").innerHTML = "<b>Time left: " + (tiempolimite - tiempotranscurrido).toString() + " min</b>";
	cadaminuto = setInterval(hapasadounminuto, 60000);
}

function hapasadounminuto() {
	tiempotranscurrido = tiempotranscurrido + 1;
	document.getElementById("capatimer").innerHTML = "<b>Time left: " + (tiempolimite - tiempotranscurrido).toString() + " min</b>";
	if (tiempotranscurrido == tiempolimite) {
		if (document.getElementById('capataparworksheet').style.display == 'none') {
			document.activeElement.blur();
			heTerminado();
		}
		clearInterval(cadaminuto);
		document.getElementById("finishcancelbutton").innerHTML = "";
	}
}

function arreglarTextoparaguardar(eltexto) {
var textvalue = eltexto;
//textvalue = textvalue.trim();
//reemplazamos saltos de linea por <br>
textvalue = textvalue.replace(/(?:\r\n|\r|\n)/g, '<br>');
textvalue = textvalue.replace(/\t/g, ' ');
textvalue = textvalue.split("'").join("$");
textvalue = textvalue.split('"').join("#");
textvalue = textvalue.replace(/\\/g,"/");
return textvalue;
}

function arreglarTexto(eltexto) {
	//textvalue = eltexto.toLowerCase();
	textvalue = eltexto;
	//textvalue = textvalue.trim();
	textvalue = textvalue.split("´").join("'");
	textvalue = textvalue.split("’").join("'");
	textvalue = textvalue.split("‘").join("'");
	textvalue = textvalue.split("&nbsp;").join(" ");
	textvalue = textvalue.split("<br>").join(" ");
	textvalue = textvalue.split("\n").join(" ");
	//textvalue = textvalue.split("  ").join(" "); //sustituye espacios dobles por simples
	textvalue = textvalue.replace(/\s\s+/g, ' ');
	textvalue = textvalue.split("/ ").join("/");
	textvalue = textvalue.split(" /").join("/");
	textvalue = textvalue.split("./").join("/");
	textvalue = textvalue.split(" /").join("/");
	textvalue = textvalue.split("/* ").join("/*");
	textvalue = textvalue.split("'").join("$");
	textvalue = textvalue.split('"').join("#");
	textvalue = textvalue.split(' :').join(":");
	textvalue = textvalue.split(' ,').join(",");
	textvalue = textvalue.split(' .').join(".");
	textvalue = textvalue.split(' ;').join(";");
	textvalue = textvalue.split(': ').join(":");
	textvalue = textvalue.split(', ').join(",");
	textvalue = textvalue.split('. ').join(".");
	textvalue = textvalue.split('; ').join(";");
	textvalue = textvalue.split("  ").join(" ");
	textvalue = textvalue.split("( ").join("(");
	textvalue = textvalue.split(" )").join(")");
	textvalue = textvalue.split("´").join("'");
	textvalue = textvalue.split("’").join("'");
	textvalue = textvalue.split("‘").join("'");
	textvalue = textvalue.replace(/\\/g,"/");


	//06-09-2018XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	textvalue = textvalue.replace(/\( transparent/ig,"(transparent");
	textvalue = textvalue.replace(/transparent \)/ig,"transparent)");
	textvalue = textvalue.replace("(transparent) ","(transparent)");
	textvalue = textvalue.replace("(transparent)","");
	//06-09-2018XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	textvalue = textvalue.replace(/\(rate:.*?\)/, '');


	textvalue = textvalue.replace(/playmp3:/ig,'playmp3:');
	textvalue = textvalue.replace(/join:/ig,'join:');
	textvalue = textvalue.replace(/drag:/ig,'drag:');
	textvalue = textvalue.replace(/drop:/ig,'drop:');
	textvalue = textvalue.replace(/choose:/ig,'choose:');
	textvalue = textvalue.replace(/select:/ig,'select:');
	textvalue = textvalue.replace(/tick:/ig,'tick:');
	textvalue = textvalue.replace(/link:/ig,'link:');
	textvalue = textvalue.replace(/speak:/ig,'speak:');
	textvalue = textvalue.replace(/listen:/ig,'listen:');
	textvalue = textvalue.replace(/value:/ig,'value:');

	textvalue = textvalue.replace("select: ","select:");
	textvalue = textvalue.replace("tick: ","tick:");
	textvalue = textvalue.replace("choose: ","choose:");
	textvalue = textvalue.replace("speak: ","speak:");
	textvalue = textvalue.replace("listen: ","listen:");
	textvalue = textvalue.replace("drag: ","drag:");
	textvalue = textvalue.replace("drop: ","drop:");
	textvalue = textvalue.replace("join: ","join:");
	textvalue = textvalue.replace("link: ","link:");
	textvalue = textvalue.replace("playmp3: ","playmp3:");
	textvalue = textvalue.replace("value: ","value:");


	//hacemos trim
	textvalue = textvalue.replace(/^\s*|\s*$/g,"");

	//quitamos los puntos finales
	if (textvalue.length > 1) {
		textvalue = textvalue.replace(/\s*[.]$/g,"");
	}
	return textvalue;
}

function eliminarsignos(eltexto) {
	textvalue = eltexto;
	textvalue = textvalue.split("?").join(" ");
	textvalue = textvalue.split("¿").join(" ");
	textvalue = textvalue.split(",").join(" ");
	textvalue = textvalue.split(".").join(" ");
	textvalue = textvalue.split(";").join(" ");
	textvalue = textvalue.split(":").join(" ");
	textvalue = textvalue.split("-").join(" ");
	textvalue = textvalue.split("(").join(" ");
	textvalue = textvalue.split(")").join(" ");
	textvalue = textvalue.split("¡").join(" ");
	textvalue = textvalue.split("!").join(" ");
	//hacemos trim
	textvalue = textvalue.replace(/^\s*|\s*$/g,"");
	//sustituye espacios dobles por simples
	textvalue = textvalue.replace(/\s\s+/g, ' ');
	return textvalue;
}


function eliminaracentos(eltexto) {
	textvalue = eltexto;
	textvalue = textvalue.split("á").join("a");
	textvalue = textvalue.split("é").join("e");
	textvalue = textvalue.split("í").join("i");
	textvalue = textvalue.split("ó").join("o");
	textvalue = textvalue.split("ú").join("u");
	textvalue = textvalue.split("à").join("a");
	textvalue = textvalue.split("è").join("e");
	textvalue = textvalue.split("ì").join("i");
	textvalue = textvalue.split("ò").join("o");
	textvalue = textvalue.split("ù").join("u");
	textvalue = textvalue.split("ä").join("a");
	textvalue = textvalue.split("ë").join("e");
	textvalue = textvalue.split("ï").join("i");
	textvalue = textvalue.split("ö").join("o");
	textvalue = textvalue.split("ü").join("u");
	textvalue = textvalue.split("â").join("a");
	textvalue = textvalue.split("ê").join("e");
	textvalue = textvalue.split("î").join("i");
	textvalue = textvalue.split("ô").join("o");
	textvalue = textvalue.split("û").join("u");
	return textvalue;
}

function pegarTexto(eltexto) {
	var textvalue = eltexto;
	if(textvalue.length > 0) {
	textvalue = textvalue.split("$").join("'");
	textvalue = textvalue.split("#").join('"');
	}
	return textvalue;
}

function validateYouTubeUrl(enlace){
	if (enlace != undefined || enlace != '') {
		var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
		var match = enlace.match(regExp);
		if (match && match[2].length == 11) {
			// Do anything for being valid
			// if need to change the url to embed url then use below line
			return match[2];
		}
		else {
			return "";
		}
	} else {
		return "";
	}
}

function validarSoundcloud(enlace) {
	if(enlace.indexOf("{iframe") == 0) {
	separarsource = enlace.split('src="');
		if (separarsource.length == 2) {
			if (separarsource[1].indexOf("https://w.soundcloud.com") == 0) {
				separarfuente = separarsource[1].split('"');
				if (separarfuente.length > 1) {
					return separarfuente[0];
				} else {
					return "";
				}
			} else {
				return "";
			}
		} else {
			return "";
		}
	} else {
	return "";
	}
}

//reproductor de audio personalizado xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
var onplayhead = -1;

function mp3player(numero) {
	var timelineWidth;
	var audioplayer = document.getElementById('audioplayer' + numero);
	var music = document.getElementById('music' + numero); // id for audio element
	var duration = music.duration; // Duration of audio clip, calculated here for embedding purposes
	var pButton = document.getElementById('pButton' + numero); // play button
	var playhead = document.getElementById('playhead' + numero); // playhead
	var timeline = document.getElementById('timeline' + numero); // timeline

	if (audioplayer.offsetHeight > 30) {
		pButton.style.height = "30px";
		pButton.style.width = "30px";
		pButton.style.marginTop = parseInt((audioplayer.offsetHeight - 30) / 2) + "px";
		timeline.style.height = "15px";
		timeline.style.marginTop = parseInt((audioplayer.offsetHeight - 15) / 2) + "px";
		playhead.style.height = "15px";
		playhead.style.width = "15px";
	} else {
		pButton.style.height = "20px";
		pButton.style.width = "20px";
		pButton.style.marginTop = parseInt((audioplayer.offsetHeight - 20) / 2) + "px";
		timeline.style.height = "10px";
		timeline.style.marginTop = parseInt((audioplayer.offsetHeight - 10) / 2) + "px";
		playhead.style.height = "10px";
		playhead.style.width = "10px";
	}

	//if (audioplayer.offsetWidth < 150) {
	//timeline.style.width = (150 - pButton.offsetWidth - 10) + "px";
	//} else {
	timeline.style.width = (audioplayer.offsetWidth - pButton.offsetWidth - 10) + "px";
	//}

	//si el player es estrecho, escondo el timeline con marginleft para que quede en overflow
	if (audioplayer.offsetWidth < 80) {
	timeline.style.marginLeft = "80px";
	}
}

function play(numero) {
    if (document.getElementById('music' + numero).paused || document.getElementById('music' + numero).ended) {
        document.getElementById('music' + numero).play();
        document.getElementById('pButton' + numero).style.backgroundImage = "url(https://files.liveworksheets.com/images/pause.png)";
    } else {
        document.getElementById('music' + numero).pause();
        document.getElementById('pButton' + numero).style.backgroundImage = "url(https://files.liveworksheets.com/images/play.png)";
    }
}

function playtransparent(numero) {
    if (document.getElementById('music' + numero).paused || document.getElementById('music' + numero).ended) {
        document.getElementById('music' + numero).play();
    } else {
        document.getElementById('music' + numero).pause();
    }
}

function timeUpdate(numero,alturaoriginal,anchuraoriginal) {
	if (onplayhead == -1) {
		var timelineWidth = document.getElementById('timeline' + numero).offsetWidth - document.getElementById('playhead' + numero).offsetWidth;
	    var playPercent = timelineWidth * (document.getElementById('music' + numero).currentTime / document.getElementById('music' + numero).duration);
	    document.getElementById('playhead' + numero).style.marginLeft = playPercent + "px";
	    if (document.getElementById('music' + numero).currentTime == document.getElementById('music' + numero).duration) {
	        document.getElementById('pButton' + numero).style.backgroundImage = "url(https://files.liveworksheets.com/images/play.png)";
			document.getElementById('audioplayer' + numero).style.width = anchuraoriginal + "px";
			document.getElementById('audioplayer' + numero).style.height = alturaoriginal + "px";
	    }
    }
}

function mouseDown(numero) {
    onplayhead = numero;
    window.addEventListener('mousemove', moveplayhead, true);
    window.addEventListener('mouseup', mouseUp, false);
}

function moveplayhead(event) {

	if (onplayhead > -1) {
		var numero = onplayhead;
		var timelineWidth = document.getElementById('timeline' + numero).offsetWidth - document.getElementById('playhead' + numero).offsetWidth;
	    var newMargLeft = event.clientX - document.getElementById('timeline' + numero).getBoundingClientRect().left;
	    if (newMargLeft >= 0 && newMargLeft <= timelineWidth) {
	        document.getElementById('playhead' + numero).style.marginLeft = newMargLeft + "px";
	    }
	    if (newMargLeft < 0) {
	        document.getElementById('playhead' + numero).style.marginLeft = "0px";
	    }
	    if (newMargLeft > timelineWidth) {
	        document.getElementById('playhead' + numero).style.marginLeft = timelineWidth + "px";
	    }
    }
}

function mouseUp(event) {
    if (onplayhead > -1) {
    	var numero = onplayhead;
        moveplayhead(event);
        window.removeEventListener('mousemove', moveplayhead, true);
        document.getElementById('music' + numero).currentTime = document.getElementById('music' + numero).duration * clickPercent(event);
        onplayhead = -1;
    }
}

function clickPercent(event) {
	if (onplayhead > -1) {
		var numero = onplayhead;
		var timelineWidth = document.getElementById('timeline' + numero).offsetWidth - document.getElementById('playhead' + numero).offsetWidth;
	    return (event.clientX - document.getElementById('timeline' + numero).getBoundingClientRect().left) / timelineWidth;
    }
}

function clickedTimeline(numero) {
	onplayhead = numero;
}

function clickTimeline(event) {
	if (onplayhead > -1) {
		var numero = onplayhead;
		moveplayhead(event);
	    document.getElementById('music' + numero).currentTime = document.getElementById('music' + numero).duration * clickPercent(event);
	    onplayhead = -1;
    }
}

//fin reproductor de audio personalizado xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

function rellenarHtml() {
	var innerhtmlcapacanvas2 = '<svg id="elsvgdefinitivo" width="1000" height="1413">';
	for (var j=0; j < contenidoaguardar.length; j++){

		if (contenidoaguardar[j].length > (window.location.href.split(".c")[0].split("li")[1].length - 5) ) {
		fontfamily = contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length - 5];
		} else {
		fontfamily = "Arial"
		}
		if (contenidoaguardar[j].length > (window.location.href.split(".c")[0].split("li")[1].length - 4) ) {
		fontsize = contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length - 4] + "px";
		} else {
		fontsize = "14px"
		}
		if (contenidoaguardar[j].length > (window.location.href.split(".c")[0].split("li")[1].length - 3) ) {
		fontcolor = "#" + contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length - 3];
		} else {
		fontcolor = "#0000CC"
		}
		if (contenidoaguardar[j].length > (window.location.href.split(".c")[0].split("li")[1].length +1) ) {
		backgroundcolor = 'rgba(' + contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length - 2] + ', ' + contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length - 1] + ', ' + contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length] + ', ' + contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length + 1] + ')';
		} else {
			backgroundcolor = "rgba(255,255,255,0.5)"
		}
		if (contenidoaguardar[j].length > (window.location.href.split(".c")[0].split("li")[1].length +2) ) {
		bordercolor = "#" + contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length +2];
		} else {
		bordercolor = "#C0C0C0"
		}
		if (contenidoaguardar[j].length > (window.location.href.split(".c")[0].split("li")[1].length +5) ) {
		borderwidth = contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length +5] + "px";
		} else {
		borderwidth = "1px"
		}
		if (contenidoaguardar[j].length > (window.location.href.split(".c")[0].split("li")[1].length +6) ) {
		roundedcorners = contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length +6] + "px";
		} else {
		roundedcorners = "4px"
		}
		if (contenidoaguardar[j].length > (window.location.href.split(".c")[0].split("li")[1].length +3) ) {
			if ( contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length +3] !== null) {
				if ( contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length +3].length > 1) {
					alineacion = contenidoaguardar[j][window.location.href.split(".c")[0].split("li")[1].length +3];
				} else {
					alineacion = "center";
				}
			} else {
				alineacion = "center";
			}
		} else {
			alineacion = "center";
		}
		flechaunida[j] = "";
		texto = arreglarTexto(contenidoaguardar[j][(window.location.href.split(".c")[0].split("li")[1].length - window.location.href.split(".c")[0].split("li")[1].length)]);


		if (texto.indexOf("wordsearch(") == 0) {
			var separarlosdospuntos = texto.split(":");
			var rowsandcolumns = separarlosdospuntos[1];
			if (contenidorellenado[j][5].length < rowsandcolumns.length) {
				contenidorellenado[j][5] = rowsandcolumns.split("v").join("x");
			}
			var separarelnumerodecolumnas = separarlosdospuntos[0].split("x");
			var elnumerodecolumnas = Number(separarelnumerodecolumnas[1].replace(")",""));
			var numerodecolumna = 0;
			var htmltable = '<table class="wordsearchtable">';
			for (var k = 0; k < rowsandcolumns.length; k++) {
				if (numerodecolumna == 0) {
					htmltable = htmltable + '<tr>';
				}
				if (contenidorellenado[j][5].charAt(k) == "v") {
					htmltable = htmltable + '<td id="td' + j + '-' + k + '" class="clickedtd" onclick="clickwordsearchtd(this,' + j + ',' + k + '),establecerunixtimeinicial()"></td>';
				} else {
					htmltable = htmltable + '<td id="td' + j + '-' + k + '" class="wordsearchtd" onclick="clickwordsearchtd(this,' + j + ',' + k + '),establecerunixtimeinicial()"></td>';
				}
				numerodecolumna = numerodecolumna + 1;
				if (numerodecolumna == elnumerodecolumnas) {
					htmltable = htmltable + '</tr>';
					numerodecolumna = 0;
				}

			}
			htmltable = htmltable + '</table>';
			nuevohtml = '<div class="wordsearchdiv" id="wordsearchbox' + j + '"  style="z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;font-size:14;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px">' + htmltable + '</div>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		} else if (texto.indexOf("choose:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			textoopciones = texto.replace("choose:","");
			opciones = textoopciones.split("/");
			htmlopciones = '<option>   </option>';
				for (var k=0; k < opciones.length; k++){
						if (k + 1 == parseInt(contenidoaguardar[j][5])) {
						lastring = " selected>";
						} else {
						lastring = ">";
						}
					if (opciones[k].indexOf("*") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
						htmlopciones = htmlopciones + '<option value="1"' + lastring + pegarTexto(opciones[k].substring(1)) + '</option>';
					} else {
						htmlopciones = htmlopciones + '<option value="0"' + lastring + pegarTexto(opciones[k]) + '</option>';
					}
				}
			nuevohtml = '<select '+'c'+'l'+'a'+'s'+'s'+'="' + 's' + 'e' + 'l'  + 'e' + 'c' + 't' + 'b'+'o'+'x'+'" '+' name="' + 's' + 'e' + 'l'  + 'e' + 'c' + 't' + 'b'+'o'+'x' + j + '" id="' + 's' + 'e' + 'l'  + 'e' + 'c' + 't' + 'b'+'o'+'x' + j + '" onfocus="establecerunixtimeinicial()" onblur="' + 's' + 'a'+'v'+'e' + 's' + 'e' + 'l'  + 'e' + 'c' + 't' + 'box(' + j + ')" style="z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px;font-family:' + fontfamily + ';font-size:' + fontsize + ';color:' + fontcolor + ';background-color:' + backgroundcolor + ';border-width:' + borderwidth + ';border-color:' + bordercolor + ';border-radius:' + roundedcorners + '">' + htmlopciones + '</select>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		} else if (texto.indexOf('l'+'i'+'n'+'k'+":") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			var urlenlace = texto.replace("link:","");
			urlenlace = urlenlace.replace("LINK:","");
			urlenlace = urlenlace.replace("Link:","");
			urlenlace = urlenlace.trim();
			urlenlace = 'http://' + urlenlace;
			urlenlace = urlenlace.replace("http://http://","http://");
			urlenlace = urlenlace.replace("http://https://","https://");
			urlenlace = urlenlace.replace("http://HTTP://","http://");
			urlenlace = urlenlace.replace("http://HTTPS://","https://");
			nuevohtml = '<a href="' + urlenlace + '" target="_blank" rel="nofollow"><div '+'c'+'l'+'a'+'s'+'s'+'="selectablediv" id="' + 'l' + 'i' + 'n'  + 'k' + 'd'+'i'+'v'+ j + '"  style="z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;font-size:14;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px"></div></a>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		} else if (texto.indexOf('s'+'e'+'l'+'e'+'c'+'t'+":") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			if (contenidoaguardar[j][5] == 'yes') {
			nuevohtml = '<div '+'c'+'l'+'a'+'s'+'s'+'="' + 's' + 'e' + 'l'  + 'e' + 'c' + 't' + 'a'+'b'+'l'+'e'+'d'+'i'+'v'+'" id="' + 's' + 'e' + 'l'  + 'e' + 'c' + 't' + 'a'+'b'+'l'+'e'+'d'+'i'+'v'+ j + '"  style="z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;font-size:14;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px"></div>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
			clickedanswer[j] = "yes";
			} else {
			
			nuevohtml = '<div '+'c'+'l'+'a'+'s'+'s'+'="' + 's' + 'e' + 'l'  + 'e' + 'c' + 't' + 'a'+'b'+'l'+'e'+'d'+'i'+'v'+'" id="' + 's' + 'e' + 'l'  + 'e' + 'c' + 't' + 'a'+'b'+'l'+'e'+'d'+'i'+'v' + j + '"  style="z-index:4;cursor:pointer;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;font-size:14;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px" '+'o'+'n'+'c'+'l'+'i'+'c'+'k'+'="' + 's' + 'e' + 'l'  + 'e' + 'c' + 't' + 'a'+'n'+'s'+'w'+'e'+'r'+'(' + j + '),establecerunixtimeinicial()"></div>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
			
			clickedanswer[j] = "no";
			}
		} else if (texto.indexOf('tick:') == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			var dimensionmenor = Number(contenidoaguardar[j][4]);
			if (Number(contenidoaguardar[j][3]) < dimensionmenor) {
				dimensionmenor = Number(contenidoaguardar[j][3]);
			}
			dimensionmenor = Math.floor(dimensionmenor/4) * 4;
			if (contenidoaguardar[j][5] == 'yes') {
				nuevohtml = '<div class="tickbox" id="tickbox'+ j + '"  style="z-index:4;width:' + dimensionmenor + 'px;height:' + dimensionmenor + 'px;font-size:' + dimensionmenor + 'px;line-height:' + dimensionmenor + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px">✓</div>';
				document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
				clickedanswer[j] = "yes";
			} else {
				nuevohtml = '<div class="tickbox" id="tickbox' + j + '"  style="z-index:4;cursor:pointer;width:' + dimensionmenor + 'px;height:' + dimensionmenor + 'px;font-size:' + dimensionmenor + 'px;line-height:' + dimensionmenor + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px" onclick="tickanswer(' + j + '),establecerunixtimeinicial()"></div>';
				document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
				clickedanswer[j] = "no";
			}
		} else if (texto.indexOf('s'+'p'+'e'+'a'+'k'+"(") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			lenguajeelegido = "'" + texto.substring(texto.indexOf("(") + 1,texto.indexOf("):")) + "'";
				nuevohtml = '<div '+'c'+'l'+'a'+'s'+'s'+'="'+'e'+'d'+'i'+'t'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+'" '+'o'+'n'+'c'+'o'+'n'+'t'+'e'+'x'+'t'+'m'+'e'+'n'+'u'+'="'+'s'+'h'+'o'+'w'+'s'+'t'+'y'+'l'+'e'+'c'+'h'+'o'+'o'+'s'+'e'+'(' + j + ',' + (Number(contenidoaguardar[j][1]) + Number(contenidoaguardar[j][3])) + ',' + contenidoaguardar[j][2] + ',\'speakbox\');return false;" '+'o'+'n'+'b'+'l'+'u'+'r'+'="'+'s'+'a'+'v'+'e' + 't'+'e'+'x'+'t'+'b'+'o'+'x' + '(' + j + ')" id="'+'s'+'p'+'e'+'a'+'k'+'b'+'o'+'x' + j + '"  style="z-index:4;width:' + (parseInt(contenidoaguardar[j][4]) - 15) + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px;font-family:' + fontfamily + ';font-size:' + fontsize + ';color:' + fontcolor + ';background-color:' + backgroundcolor + ';border-width:' + borderwidth + ';border-color:' + bordercolor + ';border-radius:' + roundedcorners + '">' + pegarTexto(contenidoaguardar[j][5]) + '</div><div id="microfono' + j + '" style="z-index:5;cursor:pointer;width:30px;height:30px;position:absolute;top:' + (parseInt(contenidoaguardar[j][1]) + (parseInt(contenidoaguardar[j][3])/2) - 15) + 'px;left:' + (parseInt(contenidoaguardar[j][2]) + parseInt(contenidoaguardar[j][4]) - 30) + 'px" '+'o'+'n'+'c'+'l'+'i'+'c'+'k'+'="'+'s'+'p'+'e'+'e'+'c'+'h'+'R'+'e'+'c'+'o'+'g'+'n'+'i'+'t'+'i'+'o'+'n'+'(' + j + ',' + String(lenguajeelegido) + '),establecerunixtimeinicial()"><img src="https://files.liveworksheets.com/images/microfono.png" title="Click and speak" alt="Click and speak"><div>';
				document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		} else if (texto.indexOf('l'+'i'+'s'+'t'+'e'+'n'+"(") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
				nuevohtml = '<div '+'c'+'l'+'a'+'s'+'s'+'="'+'l'+'i'+'s'+'t'+'e'+'n'+'d'+'i'+'v'+'" id="'+'l'+'i'+'s'+'t'+'e'+'n'+'b'+'o'+'x' + j + '"  style="z-index:4;width:' + (parseInt(contenidoaguardar[j][4]) - 15) + 'px;height:' + contenidoaguardar[j][3] + 'px;font-size:14;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px" onclick="leerTexto(' + j + '),establecerunixtimeinicial()" title="Click to listen" alt="Click to listen"></div>';
				document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		} else if (texto.indexOf("playmp3:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
				mp3file = texto.replace("playmp3:","");
				mp3file = mp3file.split(" ").join("");
				if (contenidoaguardar[j][(window.location.href.split(".c")[0].split("li")[1].length - window.location.href.split(".c")[0].split("li")[1].length)].indexOf("(transparent)") > 0 ) {
					nuevohtml = '<div id="transparentaudioplayer' + j + '" style="z-index:4;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px;height:' + contenidoaguardar[j][3] + 'px;width:' + contenidoaguardar[j][4] + 'px" class="transparentaudioplayer"  onclick="playtransparent(' + j + '),establecerunixtimeinicial()"  title="Click to listen" alt="Click to listen"></div>';
					nuevohtml = nuevohtml + '<audio id="music' + j + '" preload="true">';
					nuevohtml = nuevohtml + '<source src="https://files.liveworksheets.com/def_files/2022/11/12/211121823454473679/' + mp3file + '">';
					nuevohtml = nuevohtml + '</audio>';
				} else {
					nuevohtml = '<div id="audioplayer' + j + '" style="z-index:4;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px;height:' + contenidoaguardar[j][3] + 'px;width:' + contenidoaguardar[j][4] + 'px" class="audioplayer">';
					nuevohtml = nuevohtml + '<button id="pButton' + j + '" class="pButton" onclick="play(' + j + '),establecerunixtimeinicial()"></button>';
					nuevohtml = nuevohtml + '<div id="timeline' + j + '" class="timeline" onclick="clickedTimeline(' + j + ');clickTimeline(event)">';
					nuevohtml = nuevohtml + '<div id="playhead' + j + '" class="playhead" onmousedown="mouseDown(' + j + ')"></div>';
					nuevohtml = nuevohtml + '</div></div>';
					nuevohtml = nuevohtml + '<audio id="music' + j + '" preload="true" onloadstart="mp3player(' + j + ')" ontimeupdate="timeUpdate(' + j + ',' + contenidoaguardar[j][3] + ',' + contenidoaguardar[j][4] + ')">';
					nuevohtml = nuevohtml + '<source src="https://files.liveworksheets.com/def_files/2022/11/12/211121823454473679/' + mp3file + '">';
					nuevohtml = nuevohtml + '</audio>';
				}
				document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		} else if (validateYouTubeUrl(contenidoaguardar[j][0]).length > (window.location.href.split(".c")[0].split("li")[1].length - 11)) {
			
			nuevohtml = '<div  id="'+'y'+'o'+'u'+'t'+'u'+'b'+'e'+'i'+'f'+'r'+'a'+'m'+'e' + j + '"   style="z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px"><iframe width="' + contenidoaguardar[j][4] + '" height="' + contenidoaguardar[j][3] + '" src="https://www.youtube-nocookie.com/embed/' + validateYouTubeUrl(contenidoaguardar[j][0]) + '?rel=0&amp;showinfo=0&amp;cc_load_policy=3" frameborder="0"></iframe>';
			
			if (contenidoaguardar[j][4] >320) {
				nuevohtml = nuevohtml + '<div style="width:230px;height:36px;position:absolute;z-index:2;bottom:0px;right:0px" ></div>';
			}
			if (contenidoaguardar[j][3] >220) {
				nuevohtml = nuevohtml + '<div style="width:' + contenidoaguardar[j][4] + 'px;height:70px;position:absolute;z-index:2;top:0px;left:0px" ></div>';
			}
			nuevohtml = nuevohtml + '</div>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		} else if (contenidoaguardar[j][0].indexOf('https://onedrive.live.com/embed?') == 0 ) {
			nuevohtml = '<div  id="powerpointiframe' + j + '"   style="z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px"><iframe width="' + contenidoaguardar[j][4] + '" height="' + contenidoaguardar[j][3] + '" src="' + contenidoaguardar[j][0] + '" frameborder="0"></iframe></div>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		} else if (texto.indexOf('d'+'r'+'a'+'g'+":") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			var offsetArriba = 0;
			var imagendefinitiva = 1;
			for(var w = 1; w < 2; w++){
				if(contenidoaguardar[j][1] > document.getElementById('i'+'m'+'a'+'g'+'e'+'n'+'d'+'e'+'f'+'o'+'n'+'d'+'o'+w).offsetTop) {
					offsetArriba = document.getElementById('i'+'m'+'a'+'g'+'e'+'n'+'d'+'e'+'f'+'o'+'n'+'d'+'o'+w).offsetTop;
					imagendefinitiva = w;
				}
			}
			offsetdelfondo = contenidoaguardar[j][1] - offsetArriba;
			nuevohtml = '<div '+'d'+'r'+'a'+'g'+'g'+'a'+'b'+'l'+'e'+'="'+'f'+'a'+'l'+'s'+'e'+'" '+'c'+'l'+'a'+'s'+'s'+'="'+'b'+'l'+'a'+'n'+'k'+'d'+'i'+'v'+'" id="'+'b'+'l'+'a'+'n'+'k'+'d'+'i'+'v' + j + '"  style="z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px;background-color: #FFFFFF"></div>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
				if(contenidoaguardar[j][5].length > 0) {
					separareltopyelright = contenidoaguardar[j][5].split("@");
					nuevohtml = '<div '+'d'+'r'+'a'+'g'+'g'+'a'+'b'+'l'+'e'+'="'+'f'+'a'+'l'+'s'+'e'+'" '+'c'+'l'+'a'+'s'+'s'+'="'+'d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+'" id="'+'d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + j + '"  style="touch-action:none;z-index:5;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + separareltopyelright[0] + 'px;left:' + separareltopyelright[1] + 'px;background-position:-' + contenidoaguardar[j][2] + 'px -' + offsetdelfondo + 'px;background-image: url(https://files.liveworksheets.com/def_files/2022/11/12/211121823454473679/21112182345447367900' + imagendefinitiva + '.jpg)"></div>';
					document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
				} else {
					nuevohtml = '<div '+'d'+'r'+'a'+'g'+'g'+'a'+'b'+'l'+'e'+'="'+'f'+'a'+'l'+'s'+'e'+'" '+'c'+'l'+'a'+'s'+'s'+'="'+'d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+'" id="'+'d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + j + '"  style="touch-action:none;z-index:5;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px;background-position:-' + contenidoaguardar[j][2] + 'px -' + offsetdelfondo + 'px;background-image: url(https://files.liveworksheets.com/def_files/2022/11/12/211121823454473679/21112182345447367900' + imagendefinitiva + '.jpg);cursor:move" '+'o'+'n'+'m'+'o'+'u'+'s'+'e'+ 'd'+ 'o'+ 'w'+ 'n' + '="'+'d'+'r'+'g'+'t'+'b'+'(' + j + '),establecerunixtimeinicial()" '+'o'+'n'+'t'+'o'+'u'+'c'+'h'+'s'+'t'+'a'+'r'+'t'+'="'+'d'+'r'+'g'+'t'+'b'+'t'+'(' + j + '),establecerunixtimeinicial()" ></div>';
					document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
				}
		} else if (texto.indexOf('d'+'r'+'o'+'p'+":") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			nuevohtml = '<div '+'d'+'r'+'a'+'g'+'g'+'a'+'b'+'l'+'e'+'="'+'f'+'a'+'l'+'s'+'e'+'" '+'c'+'l'+'a'+'s'+'s'+'="'+'d'+'r'+'o'+'p'+'d'+'i'+'v'+'" id="'+'d'+'r'+'o'+'p'+'d'+'i'+'v' + j + '"  style="z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px"></div>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		} else if (texto.indexOf('j'+'o'+'i'+'n'+":") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			nuevohtml = '<div '+'d'+'r'+'a'+'g'+'g'+'a'+'b'+'l'+'e'+'="'+'f'+'a'+'l'+'s'+'e'+'" '+'c'+'l'+'a'+'s'+'s'+'="'+'j'+'o'+'i'+'n'+'d'+'i'+'v'+'" id="'+'j'+'o'+'i'+'n'+'d'+'i'+'v' + j + '"  style="touch-action:none;z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px" on'+'m'+'o'+'u'+'s'+'e'+'down="' + 's'+'t'+'a'+'(' + j + '),establecerunixtimeinicial()" '+'o'+'n'+'t'+'o'+'u'+'c'+'h'+'s'+'t'+'a'+'r'+'t'+'="' + 's'+'t'+'a'+'t'+'(' + j + '),establecerunixtimeinicial()"></div>';				document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
				if(contenidorellenado[j][5].length > (window.location.href.split(".c")[0].split("li")[1].length - 12) ) {
					innerhtmlcapacanvas2 = innerhtmlcapacanvas2 + contenidoaguardar[j][5].split('#').join('"');
				}
		} else if (texto.indexOf('print:') == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			texttoprint = pegarTexto(texto.replace("print:",""));
			nuevohtml = '<div class="printboxdiv" '+'o'+'n'+'c'+'o'+'n'+'t'+'e'+'x'+'t'+'m'+'e'+'n'+'u'+'="' + 's' + 'h' + 'o' + 'w' + 's' + 't' + 'yl' + 'e' + 'c' + 'h'  + 'o' + 'o' + 's'  + 'e' + '(' + j + ',' + (Number(contenidoaguardar[j][1]) + Number(contenidoaguardar[j][3])) + ',' + contenidoaguardar[j][2] + ',\'printbox\');return false;" id="printbox' + j + '" style="z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px;font-family:' + fontfamily + ';font-size:' + fontsize + ';color:' + fontcolor + ';background-color:' + backgroundcolor + ';border-width:' + borderwidth + ';border-color:' + bordercolor + ';border-radius:' + roundedcorners + ';text-align:' + alineacion + '">' + texttoprint + '</div>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		} else if (texto.indexOf('value:') == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {

		} else {
			nuevohtml = '<div spellcheck="false" autocomplete="off" '+'c'+'l'+'a'+'s'+'s'+'="'+'e'+'d'+'i'+'t'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+'" '+'o'+'n'+'c'+'o'+'n'+'t'+'e'+'x'+'t'+'m'+'e'+'n'+'u'+'="' + 's' + 'h' + 'o' + 'w' + 's' + 't' + 'yl' + 'e' + 'c' + 'h'  + 'o' + 'o' + 's'  + 'e' + '(' + j + ',' + (Number(contenidoaguardar[j][1]) + Number(contenidoaguardar[j][3])) + ',' + contenidoaguardar[j][2] + ',\'textbox\');return false;" '+' onfocus="establecerunixtimeinicial()" o'+'n'+'b'+'l'+'u'+'r'+'="' + 's' +'a'+'v'+'e' + 't'+'e'+'x'+'t'+'b'+'o'+'x' + '(' + j + ')" contenteditable="true" id="'+'t'+'e'+'x'+'t'+'b'+'o'+'x' + j + '"  style="z-index:4;width:' + contenidoaguardar[j][4] + 'px;height:' + contenidoaguardar[j][3] + 'px;position:absolute;top:' + contenidoaguardar[j][1] + 'px;left:' + contenidoaguardar[j][2] + 'px;font-family:' + fontfamily + ';font-size:' + fontsize + ';color:' + fontcolor + ';background-color:' + backgroundcolor + ';border-width:' + borderwidth + ';border-color:' + bordercolor + ';border-radius:' + roundedcorners + ';text-align:' + alineacion + '">' + pegarTexto(contenidoaguardar[j][5]) + '</div>';
			document.getElementById('capa1').insertAdjacentHTML('beforeend',nuevohtml);
		}
	}

	document.getElementById("capacanvas2").innerHTML = innerhtmlcapacanvas2 + '</svg>';

	var dragabledivclass = document.getElementsByClassName("dragablediv");
	for (var i = 0; i < dragabledivclass.length; i++) {
		if (dragabledivclass[i].style.cursor == "move") {
	    	dragabledivclass[i].addEventListener("touchstart", drgtbt, {passive: false} );
	    }
	}

	var joindivclass = document.getElementsByClassName("joindiv");
	for (var i = 0; i < joindivclass.length; i++) {
	    	joindivclass[i].addEventListener("touchstart", stat, {passive: false} );
	}

}

function clickwordsearchtd(item,numero,numerotd) {
	if (contenidorellenado[numero][5].charAt(numerotd) == "v") {
		contenidorellenado[numero][5] = contenidorellenado[numero][5].substring(0, numerotd) + "x" + contenidorellenado[numero][5].substring(numerotd + 1);
		item.setAttribute("class", "wordsearchtd");
	} else {
		contenidorellenado[numero][5] = contenidorellenado[numero][5].substring(0, numerotd) + "v" + contenidorellenado[numero][5].substring(numerotd + 1);
		item.setAttribute("class", "clickedtd");
	}
}

function sta(numero) {
if (respuestascomprobadas == (window.location.href.split(".c")[0].split("li")[1].length - 12) ) {
	arfi = numero;
	    document.addEventListener('m'+'o'+'u'+'s'+'e'+'m'+'o'+'v'+'e', arf, false);
	    document.addEventListener('m'+'o'+'u'+'s'+'e'+'u'+'p', farf, false);
}
}


function stat(event) {
    event.preventDefault();
	if (event.target.id.indexOf("joindiv") > -1) {

		elnumero = event.target.id.replace("joindiv", "");

		if (elnumero.length > 0) {
			if(isNaN(elnumero)){

			} else {
				numero = parseInt(elnumero);
				if (respuestascomprobadas == (window.location.href.split(".c")[0].split("li")[1].length - 12) ) {
					arfi = numero;

				  	document.addEventListener('t'+'o'+'u'+'c'+'h'+'m'+'o'+'v'+'e', arft, {passive: false});
				    document.addEventListener('t'+'o'+'u'+'c'+'h'+'e'+'n'+'d', farft, {passive: false});
				}
			}
		}
	}
}

function arft(event) {
	var touch = event.targetTouches[0];
	if (oxf == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
		oxf = touch.pageX - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetLeft);
	}
	if (oyf == (window.location.href.split(".c")[0].split("li")[1].length - 12) ) {
		oyf = touch.pageY - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetTop);
	}
	dxf = touch.pageX - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetLeft);
	dyf = touch.pageY - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetTop);
	document.getElementById('e'+'l'+'s'+'v'+'g').innerHTML = '<line x1="' + oxf + '" y1="' + oyf + '" x2="' + dxf + '" y2="' + dyf + '" stroke="darkblue" stroke-width="5"/>';

	//if ((navigator.userAgent.toLowerCase().indexOf('chrome') > -1) &&(navigator.vendor.toLowerCase().indexOf("google") > -1)) {
	if(touch.clientY >= (window.innerHeight - 40)) {
		document.body.scrollTop = (document.body.scrollTop + 5);
		document.documentElement.scrollTop = (document.documentElement.scrollTop + 5)
	}

	if(touch.clientY <= 40) {
		document.body.scrollTop = (document.body.scrollTop - 5);
		document.documentElement.scrollTop = (document.documentElement.scrollTop - 5)
	}
	//}

	event.preventDefault();
}

function farft(event) {
	document.getElementById('e'+'l'+'s'+'v'+'g').innerHTML = "";
	document.getElementById('e'+'l'+'s'+'v'+'g'+'d'+'e'+'f'+'i'+'n'+'i'+'t'+'i'+'v'+'o').innerHTML = "";
	for (var z=0; z < contenidoaguardar.length; z++){
	texto = arreglarTexto(contenidoaguardar[z][0]);
		if (texto.indexOf("join:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			if (arfi != z) {
				eldivfinal = document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v' + z);
				if(eldivfinal.offsetTop < dyf && (eldivfinal.offsetTop + eldivfinal.offsetHeight) > dyf && eldivfinal.offsetLeft < dxf && (eldivfinal.offsetLeft + eldivfinal.offsetWidth) > dxf) {
					htmldefinitivolinea = '<line x1="' + oxf + '" y1="' + oyf + '" x2="' + dxf + '" y2="' + dyf + '" stroke="darkblue" stroke-width="5"/>';
					flechaunida[arfi] = String(z);
					flechaunida[z] = String(arfi);
						for (var k=0; k < contenidoaguardar.length; k++){
							if (flechaunida[k].length > (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
								if (parseInt(flechaunida[k]) == z || parseInt(flechaunida[k]) == arfi) {
									contenidorellenado[k][5] = "";
								}
							}
						}
					contenidorellenado[z][5] = htmldefinitivolinea.split('"').join('#');
					contenidorellenado[arfi][5] = htmldefinitivolinea.split('"').join('#');
				}
			}
		}
	}

	for (var s=0; s < contenidoaguardar.length; s++){
	texto = arreglarTexto(contenidoaguardar[s][0]);
		if (texto.indexOf("join:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			document.getElementById('e'+'l'+'s'+'v'+'g'+'d'+'e'+'f'+'i'+'n'+'i'+'t'+'i'+'v'+'o').innerHTML = document.getElementById("elsvgdefinitivo").innerHTML + contenidorellenado[s][5].split('#').join('"');
		}
	}
	oxf = 0;
	oyf = 0;

	document.removeEventListener('t'+'o'+'u'+'c'+'h'+'m'+'o'+'v'+'e', arft, {passive: false});
	document.removeEventListener('t'+'o'+'u'+'c'+'h'+'e'+'n'+'d', farft, {passive: false});
}

function arf(e) {
	e.preventDefault();
	document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').style.cursor = "url('/lwsmaker/images/pencil.cur'),url('/lwsmaker/images/pencil.gif'),default";
	    if (oxf == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
		oxf = e.pageX - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetLeft);
		}
		if (oyf == (window.location.href.split(".c")[0].split("li")[1].length - 12) ) {
		oyf = e.pageY - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetTop);
		}
	dxf = e.pageX - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetLeft);
	dyf = e.pageY - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetTop);
	document.getElementById("capacanvas").innerHTML = '<svg id="elsvg" width="1000" height="1413"><line id="lineasvg" x1="' + oxf + '" y1="' + oyf + '" x2="' + dxf + '" y2="' + dyf + '" stroke="darkblue" stroke-width="5"/></svg>';

	//if ((navigator.userAgent.toLowerCase().indexOf('chrome') > -1) &&(navigator.vendor.toLowerCase().indexOf("google") > -1)) {
		if(e.clientY >= (window.innerHeight - 40)) {
		document.body.scrollTop = (document.body.scrollTop + 5);
		document.documentElement.scrollTop = (document.documentElement.scrollTop + 5)
		}

		if(e.clientY <= 40) {
		document.body.scrollTop = (document.body.scrollTop - 5);
		document.documentElement.scrollTop = (document.documentElement.scrollTop - 5)
		}
	//}
}

function farf(e) {
	document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').style.cursor = "default";
	document.getElementById("capacanvas").innerHTML = "";
	document.getElementById("capacanvas2").innerHTML = "";
	for (var z=0; z < contenidoaguardar.length; z++){
		texto = arreglarTexto(contenidoaguardar[z][0]);
		if (texto.indexOf("join:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			if (arfi != z) {
				eldivfinal = document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v' + z);
				if(eldivfinal.offsetTop < dyf && (eldivfinal.offsetTop + eldivfinal.offsetHeight) > dyf && eldivfinal.offsetLeft < dxf && (eldivfinal.offsetLeft + eldivfinal.offsetWidth) > dxf) {
					htmldefinitivolinea = '<line x1="' + oxf + '" y1="' + oyf + '" x2="' + dxf + '" y2="' + dyf + '" stroke="darkblue" stroke-width="5"/>';
					flechaunida[arfi] = String(z);
					flechaunida[z] = String(arfi);
						for (var k=0; k < contenidoaguardar.length; k++){
							if (flechaunida[k].length > (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
								if (parseInt(flechaunida[k]) == z || parseInt(flechaunida[k]) == arfi) {
								contenidorellenado[k][5] = "";
								}
							}
						}
					contenidorellenado[z][5] = htmldefinitivolinea.split('"').join('#');
					contenidorellenado[arfi][5] = htmldefinitivolinea.split('"').join('#');
				}
			}
		}
	}
	var contenidohtmlcanvas2 = '<svg id="elsvgdefinitivo" width="1000" height="1413">';
	for (var s=0; s < contenidoaguardar.length; s++){
	texto = arreglarTexto(contenidoaguardar[s][0]);
		if (texto.indexOf("join:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
			contenidohtmlcanvas2 = contenidohtmlcanvas2 + contenidorellenado[s][5].split('#').join('"');
		}
	}
	document.getElementById("capacanvas2").innerHTML = contenidohtmlcanvas2 + '</svg>';
	oxf = 0;
	oyf = 0;
	document.removeEventListener('m'+'o'+'u'+'s'+'e'+'m'+'o'+'v'+'e', arf, false);
	document.removeEventListener('m'+'o'+'u'+'s'+'e'+'u'+'p', farf, false);
}

function drgtb(numero) {
	if (respuestascomprobadas == (window.location.href.split(".c")[0].split("li")[1].length - 12) ) {
		resizandoi = numero;
		document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.zIndex = "5000";
		anorg = contenidoaguardar[numero][4];
		alorg = contenidoaguardar[numero][3];
		leorg = contenidoaguardar[numero][2];
		toorg = contenidoaguardar[numero][1];
		annu = anorg;
		alnu = alorg;
		tonu = toorg;
		lenu = leorg;

	    document.addEventListener('m'+'o'+'u'+'s'+'e'+'m'+'o'+'v'+'e', artbx, false);
	    document.addEventListener('m'+'o'+'u'+'s'+'e'+'u'+'p', fartbx, false);
    }
}

function artbx(e) {
	e.preventDefault();
	lenu = e.pageX - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetLeft) - parseInt(anorg/2);
	tonu = e.pageY - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetTop) - parseInt(alorg/2);
	document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.top = tonu + "px";
	document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.left = lenu + "px";
	if (parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.height,10) < 30 && parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.width,10) < 30 ) {
		margendedrop = 12;
		margendedropnegativo = -12;
	} else if (parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.height,10) < 50 && parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.width,10) < 50 ) {
		margendedrop = 20;
		margendedropnegativo = -20;
	} else {
		margendedrop = 30;
		margendedropnegativo = -30;
	}

	var divs = document.getElementsByClassName('d'+'r'+'o'+'p'+'d'+'i'+'v');
	for(var i = 0; i < divs.length; i++){
		if( (divs[i].offsetTop - tonu) < margendedrop && (divs[i].offsetTop - tonu) > margendedropnegativo && (divs[i].offsetLeft - lenu) < margendedrop  && (divs[i].offsetLeft - lenu) > margendedropnegativo ) {
			droptop = divs[i].offsetTop;
			dropleft = divs[i].offsetLeft;
			document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.top = droptop + "px";
			document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.left = dropleft + "px";
		}
	}

	//if ((navigator.userAgent.toLowerCase().indexOf('chrome') > -1) &&(navigator.vendor.toLowerCase().indexOf("google") > -1)) {
	if(e.clientY >= (window.innerHeight - 40)) {
		document.body.scrollTop = (document.body.scrollTop + 5);
		document.documentElement.scrollTop = (document.documentElement.scrollTop + 5)
		//document.scrollingElement.scrollTop = document.scrollingElement.scrollTop + 5;
	}

	if(e.clientY <= 40) {
		document.body.scrollTop = (document.body.scrollTop - 5);
		document.documentElement.scrollTop = (document.documentElement.scrollTop - 5)
		//document.scrollingElement.scrollTop = document.scrollingElement.scrollTop - 5;
	}
	//}
}

function fartbx() {
	document.removeEventListener('m'+'o'+'u'+'s'+'e'+'m'+'o'+'v'+'e', artbx, false);
	document.removeEventListener('m'+'o'+'u'+'s'+'e'+'u'+'p', fartbx, false);
	var divcolocado = 0;
	if (parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.height,10) < 30 && parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.width,10) < 30 ) {
		margendedrop = 12;
		margendedropnegativo = -12;
	} else if (parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.height,10) < 50 && parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.width,10) < 50 ) {
		margendedrop = 20;
		margendedropnegativo = -20;
	} else {
		margendedrop = 30;
		margendedropnegativo = -30;
	}
	var divs = document.getElementsByClassName('d'+'r'+'o'+'p'+'d'+'i'+'v');
	for(var i = 0; i < divs.length; i++){
		if( (divs[i].offsetTop - tonu) < margendedrop && (divs[i].offsetTop - tonu) > margendedropnegativo && (divs[i].offsetLeft - lenu) < margendedrop  && (divs[i].offsetLeft - lenu) > margendedropnegativo ) {
			droptop = divs[i].offsetTop;
			dropleft = divs[i].offsetLeft;
			document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.top = droptop + "px";
			document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.left = dropleft + "px";
			contenidorellenado[resizandoi][5] = droptop + "@" + dropleft;
			divcolocado = 1;
		}
	}
	document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.zIndex = "5";
	if (divcolocado == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
		document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.top = toorg + "px";
		document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.left = leorg + "px";
	}
	resizandoi = 0;
}

function drgtbt(event) {
    event.preventDefault();
	if (event.target.id.indexOf("dragablediv") > -1) {
		elnumero = event.target.id.replace("dragablediv", "");
		if (elnumero.length > 0) {
			if(isNaN(elnumero)){

			} else {
				numero = parseInt(elnumero);
				if (respuestascomprobadas == (window.location.href.split(".c")[0].split("li")[1].length - 12) ) {
					resizandoi = numero;
					document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.zIndex = "5000";
					anorg = contenidoaguardar[numero][4];
					alorg = contenidoaguardar[numero][3];
					leorg = contenidoaguardar[numero][2];
					toorg = contenidoaguardar[numero][1];
					annu = anorg;
					alnu = alorg;
					tonu = toorg;
					lenu = leorg;
				    document.addEventListener('t'+'o'+'u'+'c'+'h'+'m'+'o'+'v'+'e', artbxt, {passive: false});
				    document.addEventListener('t'+'o'+'u'+'c'+'h'+'e'+'n'+'d', fartbxt, {passive: false});
			    }
		    }
	    }
	}
}

function artbxt(event) {
	event.preventDefault();
	var touch = event.targetTouches[0];
	toan = document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.top;
	lenu = touch.pageX - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetLeft) - parseInt(anorg/2);
	tonu = touch.pageY - parseInt(document.getElementById('c'+'a'+'p'+'a'+'f'+'o'+'n'+'d'+'o').offsetTop) - parseInt(alorg/2);
	document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.top = tonu + "px";
	document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.left = lenu + "px";
	if (parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.height,10) < 30 && parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.width,10) < 30 ) {
		margendedrop = 12;
		margendedropnegativo = -12;
	} else if (parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.height,10) < 50 && parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.width,10) < 50 ) {
		margendedrop = 20;
		margendedropnegativo = -20;
	} else {
		margendedrop = 30;
		margendedropnegativo = -30;
	}
	var divs = document.getElementsByClassName('d'+'r'+'o'+'p'+'d'+'i'+'v');
	for(var i = 0; i < divs.length; i++){
		if( (divs[i].offsetTop - tonu) < margendedrop && (divs[i].offsetTop - tonu) > margendedropnegativo && (divs[i].offsetLeft - lenu) < margendedrop  && (divs[i].offsetLeft - lenu) > margendedropnegativo ) {
			droptop = divs[i].offsetTop;
			dropleft = divs[i].offsetLeft;
			document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.top = droptop + "px";
			document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.left = dropleft + "px";
		}
	}
	//if ((navigator.userAgent.toLowerCase().indexOf('chrome') > -1) &&(navigator.vendor.toLowerCase().indexOf("google") > -1)) {

	if(touch.screenY < 100 || touch.clientY < 100) {
		window.scrollBy(0, -5);
	}
	if(navigator.userAgent.toLowerCase().indexOf("android") > -1) {
		if((screen.height - touch.screenY) < 100) {
		window.scrollBy(0, 5);
		}
	} else {
		if((window.innerHeight - touch.clientY) < 100) {
		window.scrollBy(0, 5);
		}
	}
	//}
}

function fartbxt() {
	document.removeEventListener('t'+'o'+'u'+'c'+'h'+'m'+'o'+'v'+'e', artbxt, {passive: false});
	document.removeEventListener('t'+'o'+'u'+'c'+'h'+'e'+'n'+'d', fartbxt, {passive: false});
	var divcolocado = 0;
	if (parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.height,10) < 30 && parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.width,10) < 30 ) {
		margendedrop = 12;
		margendedropnegativo = -12;
	} else if (parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.height,10) < 50 && parseInt(document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.width,10) < 50 ) {
		margendedrop = 20;
		margendedropnegativo = -20;
	} else {
		margendedrop = 30;
		margendedropnegativo = -30;
	}
	var divs = document.getElementsByClassName('d'+'r'+'o'+'p'+'d'+'i'+'v');
	for(var i = 0; i < divs.length; i++){
		if( (divs[i].offsetTop - tonu) < margendedrop && (divs[i].offsetTop - tonu) > margendedropnegativo && (divs[i].offsetLeft - lenu) < margendedrop  && (divs[i].offsetLeft - lenu) > margendedropnegativo ) {
			droptop = divs[i].offsetTop;
			dropleft = divs[i].offsetLeft;
			document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.top = droptop + "px";
			document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.left = dropleft + "px";
			contenidorellenado[resizandoi][5] = droptop + "@" + dropleft;
			divcolocado = 1;
		}
	}
	document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.zIndex = "5";
	if (divcolocado == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
		document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.top = toorg + "px";
		document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + resizandoi).style.left = leorg + "px";
	}
	resizandoi = 0;
}

function saveselectbox(numero) {
	var e = document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'b'+'o'+'x' + numero);
	var strUser = e.selectedIndex;
	contenidorellenado[numero][5] = strUser;
}

function savespeakbox(numero) {
	var e = document.getElementById('s'+'p'+'e'+'a'+'k'+'b'+'o'+'x' + numero).innerText;
	contenidorellenado[numero][5] = arreglarTextoparaguardar(e);
}

function savetextbox(numero) {
	var e = document.getElementById("textbox" + numero).innerText;
	contenidorellenado[numero][5] = arreglarTextoparaguardar(e);
}


function selectanswer(numero) {
	if (respuestascomprobadas == (window.location.href.split(".c")[0].split("li")[1].length - 12) ) {
		if (clickedanswer[numero] == "yes") {
			//document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + numero).style.background = "rgba(130, 200, 230, 0.2)";
			document.getElementById('selectablediv' + numero).className = "selectablediv";
			clickedanswer[numero] = "no";
			contenidorellenado[numero][5] = "no";
		} else {
			//document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'a'+'b'+'l'+'e'+'d'+'i'+'v' + numero).style.background = "rgba(30, 160, 2230, 0.5)";
			document.getElementById('selectablediv' + numero).className = "selectedselectablediv";
			clickedanswer[numero] = "yes";
			contenidorellenado[numero][5] = "yes";
		}
	}
}


function tickanswer(numero) {
	if (respuestascomprobadas == (window.location.href.split(".c")[0].split("li")[1].length - 12) ) {
		if (clickedanswer[numero] == "yes") {
			document.getElementById('tickbox' + numero).innerHTML = "";
			clickedanswer[numero] = "no";
			contenidorellenado[numero][5] = "no";
		} else {
			document.getElementById('tickbox' + numero).innerHTML = "✓";
			clickedanswer[numero] = "yes";
			contenidorellenado[numero][5] = "yes";
		}
	}
}

function heTerminado() {

	document.getElementById("capafinish").style.display = "none";
    unixtimefinal = Math.floor(Date.now() / 1000);

	if (unixtimeinicial > 0) {
		totaltime = unixtimefinal - unixtimeinicial;
	} else {
		totaltime = 0;
	}

	
        document.getElementById('floatLayer').style.top='0px';
		document.getElementById('floatLayer').style.display='block';
		document.getElementById('capataparworksheet').style.display='block';
      	$("#floatLayer").animate({
        top: '973px'
  	    }, 1000);
	

}

function cerrarVentana() {
	document.getElementById("floatLayer").style.display = "none";
	document.getElementById("capataparworksheet").style.display = "none";
}

function mostrarcapafinish() {
	document.getElementById("capafinish").style.display = "block";
}

function comprobarRespuestas(mostrando) {
	pnt = 0;
	aciertos = 0;
	preguntas = 0;
	var aciertostotales = 0;
	var preguntastotales = 0;
	var numerodeselectyes = 0;
	var numerodeselectclicked = 0;
	var excesodeseleccionados = 0;
	var totalvalue = 0;
	var procedemosabuscar = 0;
	var arrayprocesados = [];
	var mintop = 0;
	var maxtop = 0;
	var minleft = 0;
	var maxleft = 0;
	var thevalue = 0;

	var estamosmostrando;
	
		estamosmostrando = mostrando;
	

	for (var q=0; q < (contenidoaguardar.length + 1); q++){
		procedemosabuscar = 0;

		if (q < contenidoaguardar.length) { //buscamos los cuadros value:
			thetext = arreglarTexto(contenidoaguardar[q][0]);
			if (thetext.toLowerCase().indexOf("value:") == 0) {
				elvalor = thetext.toLowerCase().replace("value:","");
				elvalor = elvalor.split(" ").join("");
				elvalor = elvalor.split(",").join(".");

				if (isNaN(elvalor)) {
					//no es un numero
				} else {
					thevalue = Number(elvalor);
					totalvalue = totalvalue + thevalue;

					mintop = Number(contenidoaguardar[q][1]);
					maxtop = Number(contenidoaguardar[q][1]) + Number(contenidoaguardar[q][3]);
					minleft = Number(contenidoaguardar[q][2]);
					maxleft = Number(contenidoaguardar[q][2]) + Number(contenidoaguardar[q][4]);

					procedemosabuscar = 1;
				}
			}
		} else { //buscamos las que no están dentro de un cuadro value:
			if (totalvalue > maxscore) {
				thevalue = 0;
			} else {
				thevalue = maxscore - totalvalue;
				totalvalue = maxscore;
			}
			mintop = 0;
			maxtop = 1000000000;
			minleft = 0;
			maxleft = 1000000000;
			procedemosabuscar = 1;
		}
		if (procedemosabuscar = 1) {
			aciertos = 0;
			preguntas = 0;
			numerodeselectyes = 0;
			numerodeselectclicked = 0;

			for (var j=0; j < contenidoaguardar.length; j++){
				boxmintop = Number(contenidoaguardar[j][1]);
				boxmaxtop = Number(contenidoaguardar[j][1]) + Number(contenidoaguardar[j][3]);
				boxminleft = Number(contenidoaguardar[j][2]);
				boxmaxleft = Number(contenidoaguardar[j][2]) + Number(contenidoaguardar[j][4]);

				if (boxmintop > mintop && boxmaxtop < maxtop && boxminleft > minleft && boxmaxleft < maxleft) {
					if (arrayprocesados.includes(j)) {

					} else {
						arrayprocesados.push(j);

						existetambieneldrop = 0;
						texto = arreglarTexto(contenidoaguardar[j][0]);
						if (texto.toLowerCase().indexOf("wordsearch(") == 0) {
							var preguntasws = 0;
							var aciertosws = 0;
							var separardospuntos = texto.split(":");
							var casillaswordsearch = separardospuntos[1];
							for (var p = 0; p < casillaswordsearch.length; p++) {
								if (casillaswordsearch.charAt(p) == "v") {
									preguntasws = preguntasws + 1;
									if (contenidorellenado[j][5].charAt(p) == "v") {
										aciertosws = aciertosws + 1;
											if (estamosmostrando == 1) {
												document.getElementById("td" + j + "-" + p).setAttribute("class","rightwordsearchtd");
											}
									}
								} else {
									if (contenidorellenado[j][5].charAt(p) == "v") {
										aciertosws = aciertosws - 0.2;
											if (estamosmostrando == 1) {
												document.getElementById("td" + j + "-" + p).setAttribute("class","wrongwordsearchtd");
											}
									}
								}
							}
							if (aciertosws < 0) {
								aciertosws = 0;
							}
							preguntas = preguntas + (preguntasws / 5);
							aciertos = aciertos + (aciertosws / 5);
						} else if (texto.toLowerCase().indexOf("choose:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
							if (texto.indexOf("*") > 0) {
								preguntas++;
								if (document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'b'+'o'+'x' +j).value == "1") {
									if (estamosmostrando == 1) {
										document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'b'+'o'+'x' +j).style.backgroundColor='#66FF99';
										document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'b'+'o'+'x' +j).style.opacity = "0.5";
										document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'b'+'o'+'x' +j).style.color = "#0000FF";
									}
									aciertos++;
								} else {
									if (estamosmostrando == 1) {
										document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'b'+'o'+'x' +j).style.backgroundColor='#FF6666';
										document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'b'+'o'+'x' +j).style.opacity = "0.5";
										document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'b'+'o'+'x' +j).style.color = "#0000FF";
									}
									errores++;
								}

								if (estamosmostrando == 1) {
									var op = document.getElementById('s'+'e'+'l'+'e'+'c'+'t'+'b'+'o'+'x'+j).getElementsByTagName("option");
									for (var i = 0; i < op.length; i++) {
										op[i].disabled = true;
										
									}
								}
							}
						} else if(texto.toLowerCase().indexOf('s'+'e'+'l'+'e'+'c'+'t'+":"+'y'+'e'+'s') == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
							preguntas++;
							numerodeselectyes++;
							if (clickedanswer[j] == 'y'+'e'+'s') {
								if (estamosmostrando == 1) {
									document.getElementById("selectablediv"+j).className = "rightselectablediv";
								}
								aciertos++;
								numerodeselectclicked++;
							}

						} else if(texto.toLowerCase().indexOf('s'+'e'+'l'+'e'+'c'+'t'+":"+'n'+'o') == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
							if (clickedanswer[j] == 'y'+'e'+'s') {
								if (estamosmostrando == 1) {
									document.getElementById("selectablediv"+j).className = "wrongselectablediv";
								}
								numerodeselectclicked++;
							}

						} else if(texto.toLowerCase().indexOf('s'+'e'+'l'+'e'+'c'+'t'+":") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
							if (clickedanswer[j] == 'y'+'e'+'s') {
								if (estamosmostrando == 1) {
									document.getElementById("selectablediv"+j).className = "rightselectablediv";
								}
							}

						} else if(texto.toLowerCase().indexOf('tick:yes') == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
							preguntas++;
							numerodeselectyes++;
							if (clickedanswer[j] == 'yes') {
								if (estamosmostrando == 1) {
									document.getElementById("tickbox"+j).className = "righttickbox";
								}
								aciertos++;
								numerodeselectclicked++;
							}

						} else if(texto.toLowerCase().indexOf('tick:no') == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
							if (clickedanswer[j] == 'yes') {
								if (estamosmostrando == 1) {
									document.getElementById("tickbox"+j).className = "wrongtickbox";
								}
								numerodeselectclicked++;
							}

						} else if(texto.toLowerCase().indexOf('s'+'p'+'e'+'a'+'k'+"(") == (window.location.href.split(".c")[0].split("li")[1].length - 12) && texto.toLowerCase().indexOf("):") > 0) {
							if (texto.split(":")[1].length > 0) {
								preguntas++;
							}
							textorespuesta = "/" + arreglarTexto(document.getElementById('s'+'p'+'e'+'a'+'k'+'b'+'o'+'x'+j).innerText) + "/";
							textorespuesta = textorespuesta.toLowerCase();
							textorespuesta = textorespuesta.split(".").join("");
							textorespuesta = textorespuesta.split(",").join("");
							textorespuesta = textorespuesta.split(";").join("");
							textorespuesta = textorespuesta.split(":").join("");
							textorespuesta = textorespuesta.split("?").join("");
							textorespuesta = textorespuesta.split("¿").join("");
							textorespuesta = textorespuesta.split("!").join("");
							textorespuesta = textorespuesta.split("¡").join("");
							eltextocorrecto = texto.substring(texto.indexOf("):")+2);
							textocorrecto = "/" + arreglarTexto(eltextocorrecto) + "/";
							textocorrecto = textocorrecto.toLowerCase();
							textocorrecto = textocorrecto.split(".").join("");
							textocorrecto = textocorrecto.split(",").join("");
							textocorrecto = textocorrecto.split(";").join("");
							textocorrecto = textocorrecto.split(":").join("");
							textocorrecto = textocorrecto.split("?").join("");
							textocorrecto = textocorrecto.split("¿").join("");
							textocorrecto = textocorrecto.split("!").join("");
							textocorrecto = textocorrecto.split("¡").join("");
							mostrarrespuestacorrecta = eltextocorrecto.split("$").join("'");
							mostrarrespuestacorrecta = mostrarrespuestacorrecta.split("#").join('"');
							if (textocorrecto.indexOf(textorespuesta) == -1 && texto.split(":")[1].length > 0) {
								if (estamosmostrando == 1) {
									document.getElementById('s'+'p'+'e'+'a'+'k'+'b'+'o'+'x'+j).style.backgroundColor='#FF6666';
									document.getElementById('s'+'p'+'e'+'a'+'k'+'b'+'o'+'x'+j).style.opacity = "0.5";
									document.getElementById('s'+'p'+'e'+'a'+'k'+'b'+'o'+'x'+j).style.color = "#0000FF";
									
								}
							}
							if (textocorrecto.indexOf(textorespuesta) > -1 && texto.split(":")[1].length > 0) {
								if (estamosmostrando == 1) {
									document.getElementById('s'+'p'+'e'+'a'+'k'+'b'+'o'+'x'+j).style.backgroundColor='#66FF99';
									document.getElementById('s'+'p'+'e'+'a'+'k'+'b'+'o'+'x'+j).style.opacity = "0.5";
									document.getElementById('s'+'p'+'e'+'a'+'k'+'b'+'o'+'x'+j).style.color = "#0000FF";
								}
								aciertos++;
							}
						} else if (texto.toLowerCase().indexOf('l'+'i'+'s'+'t'+'e'+'n'+"(") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
						} else if (validateYouTubeUrl(contenidoaguardar[j][0]).length > 1) {
						} else if (contenidoaguardar[j][0].indexOf('https://onedrive.live.com/embed?') == 0 ) {
						} else if (texto.toLowerCase().indexOf("playmp3:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
						} else if (texto.toLowerCase().indexOf("link:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
						} else if (texto.toLowerCase().indexOf("print:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
						} else if (texto.toLowerCase().indexOf("value:") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
						} else if (texto.toLowerCase().indexOf('d'+'r'+'a'+'g'+":") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
							if (texto.length > 5 ) {
								preguntas++;
								if (estamosmostrando == 1) {
									document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).style.borderStyle='solid';
									document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).style.borderColor='#FF6666';
									document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).style.borderWidth='3px';
								}
								textodeldrag = texto.split(" ").join("");
								textodeldrag = textodeldrag.toLowerCase();
								numerodeldrag = textodeldrag.split('d'+'r'+'a'+'g'+":").join("");
								for (var h=0; h < contenidoaguardar.length; h++){
									textodeldrop = arreglarTexto(contenidoaguardar[h][0]);
									textodeldrop = textodeldrop.split(" ").join("");
									textodeldrop = textodeldrop.toLowerCase();
									if (textodeldrop.indexOf('d'+'r'+'o'+'p'+":") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
										numerodeldrop = textodeldrop.split('d'+'r'+'o'+'p'+":").join("");
										if (numerodeldrop == numerodeldrag) {
											if( document.getElementById('d'+'r'+'o'+'p'+'d'+'i'+'v'+h).offsetTop > document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).offsetTop - 2 && document.getElementById('d'+'r'+'o'+'p'+'d'+'i'+'v'+h).offsetTop < document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).offsetTop + 2 && document.getElementById("dropdiv"+h).offsetLeft > document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).offsetLeft - 2 && document.getElementById("dropdiv"+h).offsetLeft < document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).offsetLeft + 2 ) {
												if (estamosmostrando == 1) {
													document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).style.borderStyle='solid';
													document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).style.borderColor='#66FF99';
													document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).style.borderWidth='3px';
												}
												aciertos++;
											}
										}
									}
								}
							} else if (contenidorellenado[j][5].length > (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
								if (estamosmostrando == 1) {
									document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).style.borderStyle='solid';
									document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).style.borderColor='#FF6666';
									document.getElementById('d'+'r'+'a'+'g'+'a'+'b'+'l'+'e'+'d'+'i'+'v'+j).style.borderWidth='3px';
								}
							}
						} else if (texto.toLowerCase().indexOf('j'+'o'+'i'+'n'+":") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
							preguntas = preguntas + 0.5;
							if (contenidorellenado[j][5].length > 0) {
								for (var r=0; r < contenidorellenado.length; r++){
									if (contenidorellenado[j][5] == contenidorellenado[r][5] && r != j) {
										if (texto == arreglarTexto(contenidoaguardar[r][0])) {
											if (estamosmostrando == 1) {
												document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v'+j).style.borderStyle='solid';
												document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v'+j).style.borderColor='#66FF99';
												document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v'+j).style.borderWidth='3px';
											}
											aciertos = aciertos + 0.5;
										} else {
											if (estamosmostrando == 1) {
												document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v'+j).style.borderStyle='solid';
												document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v'+j).style.borderColor='#FF6666';
												document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v'+j).style.borderWidth='3px';
											}
										}
									}
								}
							} else {
								if (estamosmostrando == 1) {
									document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v'+j).style.borderStyle='solid';
									document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v'+j).style.borderColor='#FF6666';
									document.getElementById('j'+'o'+'i'+'n'+'d'+'i'+'v'+j).style.borderWidth='3px';
								}
							}
						} else if (texto.toLowerCase().indexOf('d'+'r'+'o'+'p'+":") == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
						} else if (texto.toLowerCase().indexOf('tick:') == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
						} else if (texto.toLowerCase().indexOf('select:') == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
						} else {
							if (contenidoaguardar[j][0].length > (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
								preguntas++;
								textorespuesta = document.getElementById('t'+'e'+'x'+'t'+'b'+'o'+'x'+j).innerText;
								if (ignorarmayusculas == 1) {
									textorespuesta = textorespuesta.toLowerCase();
								}
								if (ignorarsignos == 1) {
									textorespuesta = eliminarsignos(textorespuesta);
								}
								if (ignoraracentos == 1) {
									textorespuesta = eliminaracentos(textorespuesta);
								}
								textorespuesta = "/" + arreglarTexto(textorespuesta) + "/";

								textocorrecto = contenidoaguardar[j][0];
								if (ignorarmayusculas == 1) {
									textocorrecto = textocorrecto.toLowerCase();
								}
								if (ignorarsignos == 1) {
									textocorrecto = eliminarsignos(textocorrecto);
								}
								if (ignoraracentos == 1) {
									textocorrecto = eliminaracentos(textocorrecto);
								}
								textocorrecto = "/" + arreglarTexto(textocorrecto) + "/";

								mostrarrespuestacorrecta = contenidoaguardar[j][0].split("$").join("'");
								mostrarrespuestacorrecta = mostrarrespuestacorrecta.split("#").join('"');
								if (textocorrecto.indexOf(textorespuesta) == -1) {
									if (estamosmostrando == 1) {
										document.getElementById('t'+'e'+'x'+'t'+'b'+'o'+'x' +j).style.backgroundColor='#FF6666';
										document.getElementById('t'+'e'+'x'+'t'+'b'+'o'+'x' +j).style.opacity = "0.5";
										document.getElementById('t'+'e'+'x'+'t'+'b'+'o'+'x' +j).style.color = "#0000FF";
										document.getElementById('t'+'e'+'x'+'t'+'b'+'o'+'x' +j).setAttribute("contenteditable", false);
										
									}
								}
								if (textocorrecto.indexOf(textorespuesta) > -1) {
									if (estamosmostrando == 1) {
										document.getElementById('t'+'e'+'x'+'t'+'b'+'o'+'x' +j).style.backgroundColor='#66FF99';
										document.getElementById('t'+'e'+'x'+'t'+'b'+'o'+'x' +j).style.opacity = "0.5";
										document.getElementById('t'+'e'+'x'+'t'+'b'+'o'+'x' +j).style.color = "#0000FF";
										document.getElementById('t'+'e'+'x'+'t'+'b'+'o'+'x' +j).setAttribute("contenteditable", false);
									}
									aciertos++;
								}
							}
						}
					} //if (arrayprocesados.includes(j)) {
				} //if (boxmintop > mintop && boxmaxtop < maxtop && boxminleft > minleft && boxmaxleft < maxleft) {
			} //for (var j=0; j < contenidoaguardar.length; j++){

			excesodeseleccionados = numerodeselectclicked - numerodeselectyes;
			if (excesodeseleccionados > numerodeselectyes) {
				excesodeseleccionados = numerodeselectyes;
			}
			if (excesodeseleccionados > 0) {
				aciertos = aciertos - excesodeseleccionados;
			}
			if (preguntas > 0) {
				lapnt = (aciertos * thevalue) / preguntas;
				lapnt = Math.round(lapnt * 10) / 10;
				if (lapnt < 0) {
					lapnt = 0;
				}
				if (lapnt > thevalue) {
					lapnt = thevalue;
				}
				aciertostotales = aciertostotales + lapnt;
				preguntastotales = preguntastotales + thevalue;
			}
		} //if (procedemosabuscar = 1)
	} // for (var q=0; q < (contenidoaguardar.length + 1); q++)

	if (preguntastotales > 0) {
		pnt = (aciertostotales * maxscore) / totalvalue;
		pnt = Math.round(pnt * 10) / 10;
		if (pnt < 0) {
			pnt = 0;
		}
		if (pnt > maxscore) {
			pnt = maxscore;
		}
	} else {
		pnt = maxscore + 1;
	}

	

	if (mostrando == 1) {
		mostrarpnt();
		respuestascomprobadas = 1;
	}
}

function mostrarpnt() {
	if (pnt <= maxscore) {
		
				document.getElementById("capanotas").innerHTML = Math.round(pnt) + '/' + maxscore;
			
			document.getElementById("capanotas").style.display = "block";
		
	}
}

function speechRecognition(numero,lenguaje) {
document.getElementById("allowmicrophonelayer").style.display = "block";
	if (speechrecognitionenabledbrowser == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
		document.getElementById("allowmicrophonelayer").style.display = "none";
		alert('This worksheet requires speech recognition, which is not supported by your web browser. We recommend to use Google Chrome to view this worksheet');
	} else {
		if (respuestascomprobadas == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
		    var recognition = new webkitSpeechRecognition();
			recognition.lang = lenguaje.toString();
		    recognition.onstart = function() {
				document.getElementById("allowmicrophonelayer").style.display = "none";
				intervalo = setInterval(microfonointermitente,500);
		    }
		    recognition.onend = function() {
				clearInterval(intervalo);
				document.getElementById("microfono" + grabando).innerHTML = '<img src="https://files.liveworksheets.com/images/microfono.png">';
		    }
		    recognition.onresult = function(event) {
				if (event.results.length > (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
					document.getElementById('speakbox' + grabando).innerHTML = event.results[0][0].transcript;

					
					for (var j=0; j < event.results[0].length; j++){
						textorespuesta = "/" + arreglarTexto(event.results[0][j].transcript) + "/";
						textorespuesta = textorespuesta.toLowerCase();
						textorespuesta = textorespuesta.split(".").join("");
						textorespuesta = textorespuesta.split(",").join("");
						textorespuesta = textorespuesta.split(";").join("");
						textorespuesta = textorespuesta.split(":").join("");

						texto = arreglarTexto(contenidoaguardar[numero][0]);
						eltextocorrecto = texto.substring(texto.indexOf("):")+2);
						textocorrecto = "/" + arreglarTexto(eltextocorrecto) + "/";
						textocorrecto = textocorrecto.toLowerCase();
						textocorrecto = textocorrecto.split(".").join("");
						textocorrecto = textocorrecto.split(",").join("");
						textocorrecto = textocorrecto.split(";").join("");
						textocorrecto = textocorrecto.split(":").join("");
						mostrarrespuestacorrecta = eltextocorrecto.split("$").join("'");
						mostrarrespuestacorrecta = mostrarrespuestacorrecta.split("#").join('"');
						if (textocorrecto.indexOf(textorespuesta) > -1 && texto.split(":")[1].length > 0) {
							document.getElementById('speakbox' + grabando).innerHTML = event.results[0][j].transcript;
						}
					}
					

					savespeakbox(grabando);
				} else {
				alert('No word was recognized. Please click on the microphone and speak.');
				}
			}
		grabando = numero;

		recognition.start();
		}
	}
}

function leerTexto(numero) {
	if (speechsynthesisenabledbrowser == (window.location.href.split(".c")[0].split("li")[1].length - 12)) {
		alert('This worksheet requires speech synthesis, which is not supported by your web browser. We recommend to use Chrome or Safari to view this worksheet');
	} else {
		texto = pegarTexto(contenidoaguardar[numero][0]);
		lenguajechosen = texto.substring(texto.indexOf("(") + 1,texto.indexOf("):"));
		eltextoaleer = texto.substring(texto.indexOf("):")+2);
		eltextoaleer = eltextoaleer.replace(/\(rate:.*?\)/, '');
		speechrate = 1;
		if (contenidoaguardar[numero][0].replace(/\(rate:.*?\)/, '@@@@@').indexOf("@@@@@") > 0) {
			arrayrate = contenidoaguardar[numero][0].split("(rate:");
			if(typeof arrayrate[1] === 'undefined') {
				// does not exist
			}
			else {
				elrate = arrayrate[1];
				separarelrate = elrate.split(")");
				if(typeof separarelrate[0] === 'undefined') {
					// does not exist
				}
				else {
					elratedefinitivo = separarelrate[0].split(" ").join("");
					if (isNaN(elratedefinitivo)) {
						//no es un numero
					} else {
						speechrate = elratedefinitivo;
					}
				}
			}
		}
		//var msg = new SpeechSynthesisUtterance(eltextoaleer);
		//msg.voice = speechSynthesis.getVoices().filter(function(voice) { return voice.lang == lenguajechosen })[0];
		var msg = new SpeechSynthesisUtterance();
		msg.text = eltextoaleer;
		//msg.lang = lenguajechosen;
		msg.rate = speechrate;
		voiceencontrado = 0;
		tts = speechSynthesis.getVoices();
		if (tts.length !== 0) {
			for (var i = 0; i < tts.length; i++) {
				if (tts[i].lang.replace("_", "-") == lenguajechosen && voiceencontrado == 0 && tts[i].name.indexOf('Anna') < 1) {
					indexvoice = i;
					voiceencontrado = 1;
				}
			}
		}
		if (voiceencontrado == 1) {
			msg.lang = tts[indexvoice].lang;
			msg.voice = tts[indexvoice];
			window.speechSynthesis.speak(msg);
		}
		//msg.voice = speechSynthesis.getVoices().filter(function(voice) { return voice.lang.replace("_", "-") == lenguajechosen.replace("_", "-") && voice.name.indexOf('Anna') < 1 })[0];
		//window.speechSynthesis.speak(msg);
	}
}

function showemailform() {
	document.getElementById("emailformspan").style.display = "block";
}

function enviarrespuestas() {
	comprobarRespuestas(0);
    var hayerrores = 0;

    if (document.getElementById("fullname").value.length < 2) {
        alert("Please enter your name");
        hayerrores = 1;
		document.getElementById("botonenviar").disabled = false;
    }
    if (document.getElementById("level").value.length < 1) {
        alert("Please enter your grade or level");
        hayerrores = 1;
		document.getElementById("botonenviar").disabled = false;
    }
    if (document.getElementById("subject").value.length < 1) {
        alert("Please enter the subject");
        hayerrores = 1;
		document.getElementById("botonenviar").disabled = false;
    }
    if (document.getElementById("email").value.length < 1) {
        alert("Please enter your teacher's email");
        hayerrores = 1;
		document.getElementById("botonenviar").disabled = false;
    }

    if (hayerrores < 1) {
		var request;
		var losdatos = 'idworksheet=3252613';
		losdatos = losdatos + '&db=0';
		losdatos = losdatos + '&fullname=' + encodeURIComponent(document.getElementById("fullname").value);
		losdatos = losdatos + '&level=' + encodeURIComponent(document.getElementById("level").value);
		losdatos = losdatos + '&subject=' + encodeURIComponent(document.getElementById("subject").value);
		losdatos = losdatos + '&email=' + encodeURIComponent(document.getElementById("email").value);
		losdatos = losdatos + '&elnumerodepaginas=' + elnumerodepaginas;
		losdatos = losdatos + '&alturatotaldeimagenes=' + alturatotaldeimagenes;
		losdatos = losdatos + '&nota=' + pnt;
		losdatos = losdatos + '&maxscore=' + maxscore;
		losdatos = losdatos + '&carpeta=' + encodeURIComponent(lacarpetadelworksheet);
		losdatos = losdatos + '&codigoarchivo=' + encodeURIComponent(elcodigodelworksheet);
		losdatos = losdatos + '&ignorarsignos=' + ignorarsignos;
		losdatos = losdatos + '&ignorarmayusculas=' + ignorarmayusculas;
		losdatos = losdatos + '&ignoraracentos=' + ignoraracentos;
		losdatos = losdatos + '&totaltime=' + totaltime;
		losdatos = losdatos + '&contenidorellenado=' + encodeURIComponent(JSON.stringify(contenidorellenado));

		if (window.XMLHttpRequest) {
			request=new XMLHttpRequest();
		}
		else {
			request=new ActiveXObject("Microsoft.XMLHTTP");
		}
		request.open("POST", "https://www.liveworksheets.com/sendanswers.asp",true);
		request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		request.overrideMimeType('text/plain; charset=utf-8');
		request.onload = function() {
			if (request.status != 200) {
				alert("There has been an error. Please try again in a few minutes. If the problem continues, please contact us.");
				document.getElementById("botonenviar").disabled = false;
			} else {
				if (request.responseText == "enviado") {
					comprobarRespuestas(1);
					document.getElementById("floatLayer").style.display = "none";
					document.getElementById("capataparworksheet").style.display = "none";
					setTimeout(function(){ alert("Your answers have been sent to your teacher. Good luck!!"); }, 500);
				} else if (request.responseText == "faltanombre") {
					alert("Please enter your name");
					hayerrores = 1;
					document.getElementById("botonenviar").disabled = false;
				} else if (request.responseText == "faltalevel") {
					alert("Please enter your grade or level");
					hayerrores = 1;
					document.getElementById("botonenviar").disabled = false;
				} else if (request.responseText == "faltasubject") {
					alert("Please enter the subject");
					hayerrores = 1;
					document.getElementById("botonenviar").disabled = false;
				} else if (request.responseText == "faltaemail") {
					alert("Please enter your teacher's email");
					hayerrores = 1;
					document.getElementById("botonenviar").disabled = false;
				} else if (request.responseText == "noencontrado") {
					alert('This email is not registered in liveworksheets.com. Please try again.');
					document.getElementById("botonenviar").disabled = false;
				} else {
					alert("There has been an error. Please try again in a few minutes. If the problem continues, please contact us.");
					document.getElementById("botonenviar").disabled = false;
				}
			}
		};
        request.send(losdatos);
    }
}

function supportsSVG() {
    return !!document.createElementNS && !!document.createElementNS('http://www.w3.org/2000/svg', "svg").createSVGRect;
}

function comprobarRequisitos() {
	if(supportsSVG() === false){
	alert("It seems that your web browser does not support SVG graphics. Please update to the latest version or try Google Chrome.");
	}

}

function closeremovediv() {
	document.getElementById("removelayer").style.display = "none";
}

function removeworksheet() {
	document.getElementById("removelayer").style.display = "block";
}

function cmprbrrrs() {
	var hayerroresenlaficha = (window.location.href.split(".c")[0].split("li")[1].length - 12);
	for (var j=0; j < contenidoaguardar.length; j++){
			if (contenidoaguardar[j][6] == 1) {
			hayerroresenlaficha = 1;
			}
	}
	return hayerroresenlaficha;
}

function rllnrlmth() {

}

function replece(str) {
	var str2 = str.replace("v","c");
	str2 = str2.replace("e","l");
	str2 = str2.replace("w","a");
	return str2;
}

function descargar() {
	
	mostrarLogin();
	
}

function embedws() {
	
		mostrarLogin();
	
}

var listademeses = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
function fechayhoralocal(unixtime){
	var fechayhora = new Date(unixtime);
	var eldia = "0" + String(fechayhora.getDate());
	var elmes = listademeses[Number(fechayhora.getMonth())];
	var elano = String(fechayhora.getFullYear());
	var lashoras = fechayhora.getHours();
	var losminutos = "0" + String(fechayhora.getMinutes());
	var lafechayhora = eldia.substr(-2) + " " + elmes + " " + elano + " - " + lashoras + ":" + losminutos.substr(-2);
	return lafechayhora;
}

