//Muestra la imagen en la pantalla cuando la seleccionamos
function archivo(evt)
{
    var files = evt.target.files; // FileList object

    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++)
    {
        //Solo admitimos imágenes.
        if (!f.type.match('image.*'))
        {
            continue;
        }

        var reader = new FileReader();
        reader.onload = (function (theFile)
        {
            return function (e)
            {
                // Insertamos la imagen
                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
            };
        })(f);
        
        reader.readAsDataURL(f);
    }
}
document.getElementById('file').addEventListener('change', archivo, false);
