<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
    {!!Html::style('css/dropzone.css')!!}
 {!!Html::style('css/dropzone.css')!!}
</head>
<body>
 



{!!Form::open(['route'=>'files.store', 'method'=>'POST','class'=>'dropzone','id'=>'my-dropzone','files'=>true])!!}

    <div class="dz-message needsclick">
    Drop files here or click to upload.<br>
    <span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
  </div>


  <button id="submit-all">Submit all files</button>

{!!Form::close()!!} 


{!!Html::script('js/dropzone.js')!!}
<script>
Dropzone.options.myDropzone = {

  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,
  uploadMultiple: true,
  maxFilesize: 10,
  maxFiles:2,
  addRemoveLinks: true,
  acceptedFiles:".png, .jpg",

  init: function() {
    var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function(e) {
      e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    });

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("addedfile", function() {
      // Show submit button here and/or inform user to click it.
      alert("se agrego un archivo");
    });

    this.on("complete",function(file){
        myDropzone.removeFile(file);
    });

  }
};
</script>
</body>
</html>