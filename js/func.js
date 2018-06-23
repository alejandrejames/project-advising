function chgcourse(){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("inputcourse").innerHTML = this.responseText;
     }
  };
  var id = document.getElementById("inputdepartm").value;
  xhttp.open("GET", "php/chgcourse.php?id="+id, true);
  xhttp.send();

}

function chgcourseedit(){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("editcourse").innerHTML = this.responseText;
     }
  };
  var id = document.getElementById("editdepartm").value;
  xhttp.open("GET", "php/chgcourse.php?id="+id, true);
  xhttp.send();

}

function enableedit(){
	document.getElementById("editbutton").disabled = true;
	document.getElementById("editstudno").disabled = false;
	document.getElementById("editfname").disabled = false;
	document.getElementById("editlname").disabled = false;
	document.getElementById("editdepartm").disabled = false;
	document.getElementById("editcourse").disabled = false;
	document.getElementById("edityrlvl").disabled = false;
	document.getElementById("editstatus").disabled = false;
	document.getElementById("savechg").style.display = "block";
}

function enableedit2(){
  document.getElementById("editbutton").disabled = true;
  document.getElementById("coursename").disabled = false;
  document.getElementById("coursecollege").disabled = false;
  document.getElementById("savechg").style.display = "block";
}

function enableedit3(){
  document.getElementById("editbutton").disabled = true;
  document.getElementById("subjectcode").disabled = false;
  document.getElementById("subjectname").disabled = false;
  document.getElementById("subjectunits").disabled = false;
  document.getElementById("savechg").style.display = "block";
}

function updatecourse(){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("alertscourse").innerHTML = this.responseText;
     document.getElementById("editbutton").disabled = false;
      document.getElementById("coursename").disabled = true;
      document.getElementById("coursecollege").disabled = true;
      document.getElementById("savechg").style.display = "none";
     }
  };
  var id = document.getElementById("coursedbid").value;
  var name = document.getElementById("coursename").value;
  var college = document.getElementById("coursecollege").value;
  xhttp.open("GET", "php/updatecourse.php?id="+id+"&name="+name+"&college="+college, true);
  xhttp.send();

}

function updatesubject(){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("editbutton").disabled = false;
     document.getElementById("alerts").innerHTML = this.responseText;
     document.getElementById("subjectcode").disabled = true;
     document.getElementById("subjectname").disabled = true;
     document.getElementById("subjectunits").disabled = true;
     document.getElementById("savechg").style.display = "none";
     }
  };
  var id = document.getElementById("subjectdbid").value;
  var name = document.getElementById("subjectname").value;
  var code = document.getElementById("subjectcode").value;
  var units = document.getElementById("subjectunits").value;
  xhttp.open("GET", "php/updatesubject.php?id="+id+"&name="+name+"&code="+code+"&units="+units, true);
  xhttp.send();

}

function corsub(id,year,sem){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        switch(year){
          case 1:
              if(sem==1)
                    document.getElementById("1st1stcourse").innerHTML = this.responseText;
              if(sem==2)
                    document.getElementById("1st2ndcourse").innerHTML = this.responseText;
              break;
          case 2:
              if(sem==1)
                    document.getElementById("2nd1stcourse").innerHTML = this.responseText;
              else
                    document.getElementById("2nd2ndcourse").innerHTML = this.responseText;
              break;
          case 3:
              if(sem==1)
                    document.getElementById("3rd1stcourse").innerHTML = this.responseText;
              else
                    document.getElementById("3rd2ndcourse").innerHTML = this.responseText;
              break;
          case 4:
              if(sem==1)
                    document.getElementById("4th1stcourse").innerHTML = this.responseText;
              else
                    document.getElementById("4th2ndcourse").innerHTML = this.responseText;
              break;
          default:
              break;

        }
     }
  };
  var id2 = document.getElementById("coursedbid").value;
  xhttp.open("GET", "php/addtosubjcour.php?id="+id+"&yrlvl="+year+"&sem="+sem+"&id2="+id2, true);
  xhttp.send();
}

function removesub(id,year,sem){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        switch(year){
          case 1:
              if(sem==1)
                    document.getElementById("1st1stcourse").innerHTML = this.responseText;
              if(sem==2)
                    document.getElementById("1st2ndcourse").innerHTML = this.responseText;
              break;
          case 2:
              if(sem==1)
                    document.getElementById("2nd1stcourse").innerHTML = this.responseText;
              else
                    document.getElementById("2nd2ndcourse").innerHTML = this.responseText;
              break;
          case 3:
              if(sem==1)
                    document.getElementById("3rd1stcourse").innerHTML = this.responseText;
              else
                    document.getElementById("3rd2ndcourse").innerHTML = this.responseText;
              break;
          case 4:
              if(sem==1)
                    document.getElementById("4th1stcourse").innerHTML = this.responseText;
              else
                    document.getElementById("4th2ndcourse").innerHTML = this.responseText;
              break;
          default:
              break;

        }
     }
  };
  console.log(sem);
  var id2 = document.getElementById("coursedbid").value;
  xhttp.open("GET", "php/remsubcour.php?id="+id+"&id2="+id2+"&yrlvl="+year+"&sem="+sem, true);
  xhttp.send();
}

function addprereq(subid,reqid){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("reqtable").innerHTML = this.responseText;
     }
  };
  
  xhttp.open("GET", "php/addprereq.php?id="+subid+"&reqid="+reqid, true);
  xhttp.send();

var xhttp2 = new XMLHttpRequest();
  xhttp2.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("addtable").innerHTML = this.responseText;
     }
  };
  
  xhttp2.open("GET", "php/refaddtable.php?id="+subid, true);
  xhttp2.send();
}

function remprereq(id,subid){
var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("reqtable").innerHTML = this.responseText;
     }
  };
  
  xhttp.open("GET", "php/remprereq.php?id="+id+"&subid="+subid, true);
  xhttp.send();

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("addtable").innerHTML = this.responseText;
     }
  };
  
  xhttp.open("GET", "php/refaddtable.php?id="+subid, true);
  xhttp.send();
}

function advise(id,year,sem,courseid){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("advbutton").innerHTML = '<a href="advised.php?id='+id+'&yrlvl='+year+'&sem='+sem+'&courseid='+courseid+'"><button class="btn btn-success">Advise for this semester</button></a>';
        document.getElementById("advisetbl").innerHTML = this.responseText;
        document.getElementById("semgrade").style.display = "block";
     }
  };
  
  xhttp.open("GET", "php/advisesem.php?id="+id+'&courseid='+"&year="+year+"&sem="+sem, true);
  xhttp.send();
}

function addstudsub(id,subid,courseid,yrlvl,sem){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("advstbl").innerHTML = this.responseText;
     }
  };
  
  xhttp.open("GET", "php/addstudsub.php?id="+id+"&subid="+subid+"&courseid="+courseid+"&yrlvl="+yrlvl+"&sem="+sem, true);
  xhttp.send();
}

function remstudsub(id,subid,courseid,yrlvl,sem){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("advstbl").innerHTML = this.responseText;
     }
  };
  
  xhttp.open("GET", "php/remstudsub.php?id="+id+"&subid="+subid+"&courseid="+courseid+"&yrlvl="+yrlvl+"&sem="+sem, true);
  xhttp.send();
}

function printadvslip(divName){
   var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

function addgrade(id,subid){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("alert2").innerHTML = this.responseText;
     }
  };

  var grade = document.getElementById("subgrade-"+subid).value;
  xhttp.open("GET", "php/addgrade.php?id="+id+"&subid="+subid+"&subgrade="+grade, true);
  xhttp.send();
}

function pagina(page,book,start,end){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("pagina-tbl").innerHTML = this.responseText;
      document.getElementById("page-"+page).classList.add('active');
      var pages = document.getElementById("totpages").value;
      var i=0;
      while(i<=pages){
          if(i!=page)
            document.getElementById("page-"+i).classList.remove('active');
          i++;
      }
     }
  };
  
  xhttp.open("GET", "php/pagination.php?book="+book+"&start="+start+"&end="+end, true);
  xhttp.send();
}