var indexP = 0;
var prog = 0
function start(){ // Works "onchange=()" eventCaller

  // Read selected files



  var totalfiles = document.getElementById('files').files.length;
  var Div = '<div id = "img-holder"></div>'
  $('#img-container').append(Div)
  var Pbar = '<progress id="progressBar" value="0" max="100" style = width:100px; ></progress>';
  $('#img-holder').append(Pbar)
  $('#img-holder').attr("id","img-holder" + indexP)
  $('#progressBar').attr("id","progressBar" + indexP)
  for (var index = 0; index < totalfiles; index++) {
     var form_data = new FormData();
     var progress = 0;
     form_data.append("files[]" , document.getElementById('files').files[index])

     $.ajax({
       url: 'ajaxfile.php',
       type: 'post',
       data: form_data,
       dataType: 'json',
       contentType: false,
       processData: false,
       xhr: function(){
       var xhr = new window.XMLHttpRequest();
       xhr.upload.addEventListener("progress", function(evt) {
           if (evt.lengthComputable) {
               var percentComplete = evt.loaded / evt.total;
               progress = (Math.round(percentComplete * 100))
               $('#progressBar'+indexP).val(progress)
               console.log(indexP)
           }
       }, false);


       xhr.upload.addEventListener("loadend",function(evt){
         console.log(indexP)
         var Div = '<div id = "img-holder"></div>'
         $('#img-container').append(Div)
         var Pbar = '<progress id="progressBar" value="0" max="100" style = width:100px; ></progress>';
         $('#img-holder').append(Pbar)
         $('#img-holder').attr("id","img-holder" + indexP)
         $('#progressBar').attr("id","progressBar" + indexP)

         indexP++

       },false);
       return xhr;
          },










       success: function (response) {
         form_data = new FormData();
         for(var index = 0; index < response.length; index++ ) {
           var src = response[index];
           $('#img-container').append('<img src="'+src+'"">');

  } }     });

   }
  }
  // AJAX request
