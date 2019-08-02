
filesList = $("#filesList");
dropArea = $("#dropArea");
inputFiles = $("#inputFiles");

$(document).ready(function(){
   dropArea.on("dragenter dragstart dragend dragleave dragover drag drop", function (event) {
      event.preventDefault();
   });
   dropArea.on({
      dragenter: function(event){
         event.stopPropagation();
         dropArea.css("border", "2px rgb(0, 54, 108) dashed");
         dropArea.css("color", "rgb(0, 54, 108)");
      },
      dragleave: function(event){
         event.stopPropagation();
         dropArea.css("border", "2px cornflowerblue dashed");
         dropArea.css("color", "cornflowerblue");
      },
      drop: function(event){
         event.stopPropagation();
         dropArea.css("border", "2px cornflowerblue dashed");
         dropArea.css("color", "cornflowerblue");
      }
   });
   
   inputFiles.fileupload({
      url: "uploadFiles.php",
      type: "POST",
      dropZone: dropArea,
      dataType: "json",
      autoUpload: false,
      singleFileUploads: false,
      progressInterval: 10000,
      bitrateInterval: 10000,
      fileInput: inputFiles,
      maxChunkSize: 500000000,
      limitMultiFileUploadSize: 500000000
   }).on("fileuploadadd", function(event, data){
      data.submit();
   }).on("fileuploadprogressall", function(event, data){
   }).on("fileuploaddone", function(event, data){
      var response = data.jqXHR.responseJSON;
      for(var key in response){
         var fileName = key;
         var fileStatus = response[key];
         var icon = getIcon(fileName);
         var errorLabel = getErrorLabel(fileStatus);
         filesList.append(
            "<li class='list-group-item filesListItem'>" +
               icon + "&nbsp;&nbsp;" + fileName + "&nbsp;&nbsp;" + errorLabel +
            "</li>"
         );
      }
   });
});

function getIcon(fileName){
   var imageFormat = /.\.(gif|jpg|png|jpeg)$/i;
   var audioFormat = /.\.(mp3|wav|wma|ogg|midi)$/i;
   var videoFormat = /.\.(wmv|mpg|mkv|mp4|avi)$/i;
   var pdfFormat = /.\.(pdf)$/i;
   var textFormat = /.\.(txt)$/i;
   var icon = "";
   if(imageFormat.test(fileName)){
      icon = "<i class='fas fa-file-image fa-lg imageFileIcon'></i>";
   }else if(audioFormat.test(fileName)){
      icon = "<i class='fas fa-file-audio fa-lg audioFileIcon'></i>";
   }else if(videoFormat.test(fileName)){
      icon = "<i class='fas fa-file-video fa-lg videoFileIcon'></i>";
   }else if(pdfFormat.test(fileName)){
      icon = "<i class='fas fa-file-pdf fa-lg pdfFileIcon'></i>";
   }else if(textFormat.test(fileName)){
      icon = "<i class='fas fa-file-alt fa-lg textFileIcon'></i>";
   }else{
      icon = "<i class='fas fa-file fa-lg fileIcon'></i>";
   }
   return(icon);
}

function getErrorLabel(fileStatus){
   var errorMssg = "";
   if(fileStatus == "exists"){
      errorMssg = "<strong style='color: red;'>[El archivo ya existe]</strong>";
   }else if(fileStatus == "error"){
      errorMssg = "<strong style='color: red;'>[Ocurrió un error al cargar el archivo]</strong>";
   }else if(fileStatus == "sizeExceeded"){
      errorMssg = "<strong style='color: red;'>[El archivo excede el tamaño permitido (10MB)]</strong>";
   }
   return(errorMssg);
}
