
$(document).ready(function(){
var clickHandler = document.getElementById('dragandrophandler');
clickHandler.addEventListener('click' ,function(clickHandler){
  // Add div and append to input(file) div
    var div = document.createElement('div');
    div.innerHTML = '<input id="fileInput" type ="file" multiple style="visibility:hidden;">';
    $($('body')).append(div);
    // Open select file screen
    $('#fileInput').trigger('click');
 // get files and send to handler
    var fileInput = document.getElementById('fileInput')
    fileInput.onchange = function(){
      var obj = $("#dragandrophandler");
      files = this.files
      handleFileUpload(files,obj)
      };
  });
});


// Send Files
function sendFileToServer(formData,status)
{
    var uploadURL ="ajaxfile.php"; //Upload URL
    var extraData ={}; //Extra Data.
    var jqXHR=$.ajax({
            xhr: function() {
            var xhrobj = $.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
    url: uploadURL,
    type: "POST",
    contentType:false,
    processData: false,
        cache: false,
        data: formData,
        success: function(data){
            console.log('success')
            status.setProgress(100);

            $("#status1").append("File upload Done<br>");
            var name = document.createElement('input')
            name.style = 'visibility:hidden;position:relative;'
            name.name = 'photo'
            name.value= (data)
            console.log(name.name)
            $('#share-form').append(name)
        }
    });

    status.setAbort(jqXHR);
}

var rowCount=0;
function createStatusbar(obj,url)
{
     rowCount++;
     var row="odd";
     if(rowCount %2 ==0) row ="even";
     img = document.createElement('img')
     img.style = 'border:solid 1px #ddd;width:100px;height:100px;padding:5px;'
     img.src = url
     $('#bar').append(img)
     this.statusbar = $("<div class='statusbar  "+row+"'></div>");
     this.img = $("<li class = 'image-li'><img src = '"+url+"'class = 'img-upload'></li>").appendTo(this.statusbar);
     //this.filename = $("<div class='filename'></div>").appendTo(this.statusbar);
     //this.size = $("<div class='filesize'></div>").appendTo(this.statusbar);
     this.progressBar = $("<div class='progressBar'><div></div></div>").appendTo(this.statusbar);
     this.abort = $("<div class='abort'>Abort</div>").appendTo(this.statusbar);
     obj.after(this.statusbar);

    this.setFileNameSize = function(name,size)
    {
        var sizeStr="";
        var sizeKB = size/1024;
        if(parseInt(sizeKB) > 1024)
        {
            var sizeMB = sizeKB/1024;
            sizeStr = sizeMB.toFixed(2)+" MB";
        }
        else
        {
            sizeStr = sizeKB.toFixed(2)+" KB";
        }
// File Name And Size String
        // this.filename.html(name);
        // this.size.html(sizeStr);
    }
    this.setProgress = function(progress)
    {
        var progressBarWidth =progress*this.progressBar.width()/ 100;
        this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "% ");
        if(parseInt(progress) >= 100)
        {
            this.abort.hide();
        }
    }
    this.setAbort = function(jqxhr)
    {
        var sb = this.statusbar;
        this.abort.click(function()
        {
            jqxhr.abort();
            sb.hide();
        });
    }
}




// Control And Send to PHP

function handleFileUpload(files,obj)
{
   for (var i = 0; i < files.length; i++)
   {
        url =  URL.createObjectURL(files[i])
        var fd = new FormData();
        console.log(files[i])
        fd.append('file', files[i]);
        var status = new createStatusbar(obj,url); //Using this we can set progress.
        status.setFileNameSize(files[i].name,files[i].size);
        sendFileToServer(fd,status);

   }
}


// Drag And Drop Handler


$(document).ready(function()
{
var obj = $("#dragandrophandler");
obj.on('dragenter', function (e)
{
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');
      $(obj).css('background-color','blue');
});
obj.on('dragover', function (e)
{
     e.stopPropagation();
     e.preventDefault();
});
obj.on('drop', function (e)
{

     $(this).css('border', '2px dotted #0B85A1');

     e.preventDefault();
     var files = e.originalEvent.dataTransfer.files;
     console.log(e)
     //We need to send dropped files to Server
     handleFileUpload(files,obj);
});
$(document).on('dragenter', function (e)
{
    e.stopPropagation();
    e.preventDefault();
});
$(document).on('dragover', function (e)
{
  e.stopPropagation();handleFileUpload(files,obj)

  e.preventDefault();
  obj.css('border', '2px dotted #0B85A1');
    $(obj).css('background-color','')
    $(obj).css('transition' ,'1s')
});
$(document).on('drop', function (e)
{
    e.stopPropagation();
    e.preventDefault();
});

});
