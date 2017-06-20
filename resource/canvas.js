
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
   custom();
   function custom()
   {
   var display=decodeURIComponent(getQueryVariable('show'));
   //var display="["jack", "john", "joe"]";
   //display=JSON.parse(display);
   //itemsArray[]=itemsArray;
   //console.log(display);
   //drawImage();
  }


    function initialImage(v){
      img=v;

    }
   

    function draw() {

      canvas = document.getElementById("craft-canvas");
      if (canvas.getContext) {
        ctx = canvas.getContext("2d");

        canvas.onclick = function(event){
         // ctx.clearRect(0, 0, canvas.width, canvas.height);
            var x = Math.round(event.offsetX - img.width/2);
            var y = Math.round(event.offsetY - img.height/2);

            var id=(img.src.split('/').pop()).split('.')[0];
           // console.log("Id:"+id);
            insertIntoItem(id,x,y);

            //ctx.drawImage(img,x,y);
            drawImage();
            //console.log(itemsArray);
            //console.log(ctx);
        }; 

      
      }
      
    }

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

    function confirm(){
      var name=document.getElementById('name').value;
      var phone=document.getElementById('phone').value;

      window.location="custom-order.php?name="+name+"&phone="+phone+"&design="+JSON.stringify(itemsArray);
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
