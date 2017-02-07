 document.getElementById('a').onclick = function (){               
             var date = new Date(0);
             document.cookie = "log=; path=/; expires=" + date.toUTCString();
           }   
 
 var workers = document.getElementById('workers');
 
 document.getElementById('rab').onclick = function(){     
     
     workers.classList.remove('invisible');
     
     
 }
 
 document.getElementById('closewokers').onclick = function(){
     
        workers.classList.add('invisible');   
     
 }
 
 
 function getXmlHttp(){
		var xmlhttp;
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
				xmlhttp = false;
			}
		}
		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
			xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}


var httpreq = getXmlHttp();

var bsubmit = document.getElementById('submit');

bsubmit.onclick = click;
    
    
    function click(event){
                            var res = document.getElementById('res'),
                            fam = document.getElementsByName('fam')[0].value,
                            nam = document.getElementsByName('name')[0].value,
                            nic = document.getElementsByName('nic')[0].value,
                            tel = document.getElementsByName('tel')[0].value,
                            mail = document.getElementsByName('mail')[0].value;
    
    var body = "fam="+fam+"&name="+nam+"&nic="+nic+"&tel="+tel+"&mail="+mail+"&form=workers";
    
        sendData(body);
    
}


function sendData(body){
    httpreq.open('POST', "fhandler.php", true);
		httpreq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
		httpreq.onreadystatechange = function() {
			if (httpreq.readyState == 4) {
				if(httpreq.status == 200) {
					res.innerHTML = httpreq.responseText;          
				}
					
			}
		}
		httpreq.send(body);
}

var table = document.getElementById('table');


document.getElementById('rabshow').onclick = function (){
    
    var body = "table=workers";
    
    getData(body);    
    
}

function getData(body){
    httpreq.open('POST', "gettable.php", true);
		httpreq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
		httpreq.onreadystatechange = function() {
			if (httpreq.readyState == 4) {
				if(httpreq.status == 200) {
					table.innerHTML = httpreq.responseText;          
                    initializebbb();
				}
					
			}
		}
		httpreq.send(body);
}

function initializebbb(){
    
    var bbbs = document.getElementsByName('bbb');
    
    for (var i=0;i<bbbs.length;i++){
        
        bbbs[i].onclick = bbbclick;
        
    }
    
}

function bbbclick()
{
    var id = this.value; 
    getidDate("id="+id+"&table=workers");
    document.getElementsByName('id')[0].value = id;    
}

var bupdate = document.getElementById('update');
bupdate.onclick=function(){
    
    var res = document.getElementById('res'),
    fam = document.getElementsByName('fam')[0].value,
    nam = document.getElementsByName('name')[0].value,
    nic = document.getElementsByName('nic')[0].value,
    tel = document.getElementsByName('tel')[0].value,
    mail = document.getElementsByName('mail')[0].value,
    id = document.getElementsByName('id')[0].value;
    
    var body = "fam="+fam+"&name="+nam+"&nic="+nic+"&tel="+tel+"&mail="+mail+"&form=workers&id="+id;
    
    upDate(body);
    
}

function getidDate(body){
    
    httpreq.open('POST', "gettable.php", true);
		httpreq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
		httpreq.onreadystatechange = function() {
			if (httpreq.readyState == 4) {
				if(httpreq.status == 200) {
					document.getElementById('datadiv').innerHTML = httpreq.responseText; 
                    workers.classList.remove('invisible');
                    bupdate.classList.remove('invisible'); 
                    bsubmit.classList.add('invisible');
				}
					
			}
		}
		httpreq.send(body);   
    
}

function upDate(body){
    
    httpreq.open('POST', "fhandler.php", true);
		httpreq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
		httpreq.onreadystatechange = function() {
			if (httpreq.readyState == 4) {
				if(httpreq.status == 200) {
					res.innerHTML = httpreq.responseText; 
                    getData("table=workers");
                    bsubmit.classList.remove('invisible'); 
                    bupdate.classList.add('invisible');
                    document.getElementsByName('id')[0].value = null;
                     fam = document.getElementsByName('fam')[0].value=null;
                    document.getElementsByName('name')[0].value=null;
                    document.getElementsByName('nic')[0].value=null;
                    document.getElementsByName('tel')[0].value=null;
                    document.getElementsByName('mail')[0].value=null;
				}
					
			}
		}
		httpreq.send(body);   
    
}