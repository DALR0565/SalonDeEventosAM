<!DOCTYPE html>
<html>
<head>
    <title>Subir imágenes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: 100%;
        }

        #preview-container {
            display: flex;
            flex-wrap: wrap;
        }

        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin: 10px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Subir imágenes</h2>
    @yield('contenido')



    <script>
        function previewImages() {
            var previewContainer = document.getElementById('preview-container');
            previewContainer.innerHTML = '';

            var files = document.querySelector('input[type=file]').files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('preview-image');
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        }

        document.getElementById('imagenes').addEventListener('change', previewImages);
    </script>
</body>
</html>
