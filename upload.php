<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/upload.css">
  </head>
<body>
  <div class="container">
    <nav class="navbar">
      <div class="navbar-brand">
        <span class="brand-text">Sew n.Slay</span>
      </div>
    </nav>
    <!-- mengarahkan ke file prosesUpload gambar-->
    <form action="prosesupload.php" method="POST" enctype="multipart/form-data">
     <div class="center">
      <div class="form-input">
        <div class="preview">
          <img id="file-ip-1-preview" name="file-ip-1">
        </div>
        <label for="file-ip-1">Upload Image</label>
        <input type="file" name="file-ip-1" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
        
      </div>
    </div> 

    <!-- menampilkan preview gambar yang dipilih -->
    <script type="text/javascript">
      function showPreview(event){
      if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "block";
      }
    }
    </script>

    <!-- menginputkan dan memilih data konten-->
    <div class="text-field">
      <h3>Judul:</h3>
      <input type="text" id="judul" name="judul">
    </div>
    
    <div class="text-field">
      <h3>Deskripsi:</h3>
      <textarea id="deskripsi" name="deskripsi" rows="4"></textarea>
    </div>

    <h3>Tingkat Kemampuan</h3>
    <div class="checkbox-group">
      <label class="checkbox-label" for="pemula">
        <input type="checkbox" id="pemula" name="tingkat_kemampuan[]" value="pemula" class="checkbox-input">
        <span class="checkbox">
        <span class="check"></span>
        </span>
        <span class="checkbox-label-text">pemula</span>
      </label>
      <label class="checkbox-label" for="menengah">
        <input type="checkbox" id="menengah" name="tingkat_kemampuan[]" value="menengah" class="checkbox-input">
        <span class="checkbox">
          <span class="check"></span>
        </span>
        <span class="checkbox-label-text">menengah</span>
      </label>
      <label class="checkbox-label" for="ahli">
        <input type="checkbox" id="ahli" name="tingkat_kemampuan[]" value="ahli" class="checkbox-input">
        <span class="checkbox">
          <span class="check"></span>
        </span>
        <span class="checkbox-label-text">ahli</span>
      </label>
    </div>

      
      <h3>Ukuran</h3>
      <div class="radio-group">
        <label class="label">
          <input type="radio" id="S" name="ukuran" value="S" class="radio-input">
          <span class="radio-design"></span>
          <span class="label-text" for="S">S</span>
        </label>
        <label class="label">
          <input type="radio" id="M" name="ukuran" value="M" class="radio-input">
          <span class="radio-design"></span>
          <span class="label-text" for="M">M</span>
        </label>
        <label class="label">
          <input type="radio" id="L" name="ukuran" value="L" class="radio-input">
          <span class="radio-design"></span>
          <span class="label-text" for="L">L</span>
        </label>
        <label class="label">
          <input type="radio" id="XL" name="ukuran" value="XL" class="radio-input">
          <span class="radio-design"></span>
          <span class="label-text" for="XL">XL</span>
        </label>
        <label class="label">
          <input type="radio" id="XXL" name="ukuran" value="XXL" class="radio-input">
          <span class="radio-design"></span>
          <span class="label-text" for="XXL">XXL</span>
        </label>
      </div>
      
      
      <h3>Jenis Pakaian</h3>
      <div class="radio-group">
        <label class="label" for="atasan">
          <input type="radio" id="atasan" name="pakaian" value="atasan" class="radio-input">
          <span class="radio-design"></span>
          <span class="label-text">Atasan</span>
        </label>
        <label class="label" for="bawahan">
          <input type="radio" id="bawahan" name="pakaian" value="bawahan" class="radio-input">
          <span class="radio-design"></span>
          <span class="label-text">Bawahan</span>
        </label>
        <label class="label" for="sweater">
          <input type="radio" id="sweater" name="pakaian" value="sweater" class="radio-input">
          <span class="radio-design"></span>
          <span class="label-text">Sweater</span>
        </label>
        <label class="label" for="gaun">
          <input type="radio" id="gaun" name="pakaian" value="gaun" class="radio-input">
          <span class="radio-design"></span>
          <span class="label-text">Gaun</span>
        </label>
        <label class="label" for="jumpsuit">
          <input type="radio" id="jumpsuit" name="pakaian" value="jumpsuit" class="radio-input">
          <span class="radio-design"></span>
          <span class="label-text">jumpsuit</span>
        </label>
      </div>
        
      <h3>Jenis Acara</h3>
      <div class="checkbox-group">
        <label class="checkbox-label" for="formal">
          <input type="checkbox" id="formal" name="jenis_acara[]" value="formal" class="checkbox-input">
          <span class="checkbox">
            <span class="check"></span>
          </span>
          <span class="checkbox-label-text">formal</span>
        </label>
        <label class="checkbox-label" for="non-formal">
          <input type="checkbox" id="non-formal" name="jenis_acara[]" value="non-formal" class="checkbox-input">
          <span class="checkbox">
            <span class="check"></span>
          </span>
          <span class="checkbox-label-text">non-formal</span>
        </label>
        <label class="checkbox-label" for="casual">
          <input type="checkbox" id="casual" name="jenis_acara[]" value="casual" class="checkbox-input">
          <span class="checkbox">
            <span class="check"></span>
          </span>
          <span class="checkbox-label-text">casual</span>
        </label>
        <label class="checkbox-label" for="sport">
          <input type="checkbox" id="sport" name="jenis_acara[]" value="sport" class="checkbox-input">
          <span class="checkbox">
            <span class="check"></span>
          </span>
          <span class="checkbox-label-text">sport</span>
        </label>
        <label class="checkbox-label" for="party">
          <input type="checkbox" id="party" name="jenis_acara[]" value="party" class="checkbox-input">
          <span class="checkbox">
            <span class="check"></span>
          </span>
          <span class="checkbox-label-text">party</span>
        </label>
      </div>

      <h3>File Pola</h3>
      
      <div class="file-upload">
        <input class="file-upload__input" type="file" name="myFile" id="myFile">
        <button class="file-upload__button" type="button">Choose File(s)</button>
        <span class="file-upload__label"></span>
      </div>

      <!-- mengupload file Pola -->
                    <script type="text/javascript">
                    Array.prototype.forEach.call(
                    document.querySelectorAll(".file-upload__button"),
                    function(button) {
                    const hiddenInput = button.parentElement.querySelector(
                    ".file-upload__input"
                    );
                    const label = button.parentElement.querySelector(".file-upload__label");
                    const defaultLabelText = "No file(s) selected";

                    // Set default text for label
                    label.textContent = defaultLabelText;
                    label.title = defaultLabelText;

                    button.addEventListener("click", function() {
                    hiddenInput.click();
                    });

                    hiddenInput.addEventListener("change", function() {
                    const filenameList = Array.prototype.map.call(hiddenInput.files, function(
                      file
                    ) {
                      return file.name;
                    });

                    label.textContent = filenameList.join(", ") || defaultLabelText;
                    label.title = label.textContent;
                    });
                    }
                    );
                    </script>
    <!-- button untuk mengupload konten -->
    <button class="upload-button" name="upload">Upload</button>
      </from>
</body>
</html>
