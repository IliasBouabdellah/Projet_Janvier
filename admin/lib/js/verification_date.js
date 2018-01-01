$(document).ready(function () {
  
  var dbail = document.getElementById('dbail').value
  var dbail2 = new Date();
  dbail2.setFullYear(dbail.substr(6,4));
  dbail2.setMonth(dbail.substr(3,2));
  dbail2.setDate(dbail.substr(0,2));
  dbail2.setHours(0);
  dbail2.setMinutes(0);
  dbail2.setSeconds(0);
  dbail2.setMilliseconds(0);
  var db=dbail2.getTime()
  
  
  var fbail = document.getElementById('fbail').value
  var fbail2 = new Date();
  fbail2.setFullYear(fbail.substr(6,4));
  fbail2.setMonth(fbail.substr(3,2));
  fbail2.setDate(fbail.substr(0,2));
  fbail2.setHours(0);
  fbail2.setMinutes(0);
  fbail2.setSeconds(0);
  fbail2.setMilliseconds(0);
  var fb=fbail2.getTime()
  
  
  
  
 
  
  
     if (db > fb )
  {
      
      alert('une date est incorrect!!')
      //alert(date_sys.toLocaleString())
      
  }
  
  
  
  else{
      
      
      alert(' Date debut: '+dbail)
      
  }
  
});