
    var img = new Image();
    var itemsArray=new Array();
    var serial=0;
    var canvas;
    var ctx;

 // if (display!=null) {
     // itemsArray=display;
      //console.log(display);
     // drawImage();
   // }
 
   var display=decodeURIComponent(getQueryVariable('show'));
   //var display="["jack", "john", "joe"]";
   display=JSON.parse(display);
   //itemsArray[]=itemsArray;
 // console.log(display);
   //drawImage();
   itemsArray=display;
   console.log(itemsArray);
   

  

      canvas = document.getElementById("craft-canvas");
      if (canvas.getContext) {
        ctx = canvas.getContext("2d");
        //ctx.drawImage(img,x,y);
        drawImage();
        //console.log(itemsArray);
        //console.log(ctx);

    function drawImage(){
     itemsArray.forEach(function(itemInfo,itemSerial){
      var tempImg=new Image();
      img.src='resource/craft-img/'+itemInfo[0]+'.png';
      ctx.drawImage(img,itemInfo[1],itemInfo[2]);
       //console.log("serial: "+itemSerial);
       //console.log(itemInfo);
     })

     console.log(JSON.stringify(itemsArray));
    }

    function insertIntoItem(id,x,y){
      itemsArray[serial++]=new Array(id,x,y);
    }

    function clearItems(){
      console.log("clearItem");
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      itemsArray=[];
      serial=0;
      drawImage();
    }


    function getQueryVariable(variable)
    { 
      var query = window.location.search.substring(1); 
      var vars = query.split("&"); 
      for (var i=0;i<vars.length;i++)
      { 
        var pair = vars[i].split("="); 
        if (pair[0] == variable)
        { 
          return pair[1]; 
        } 
      }
      return -1; //not found 
    }
