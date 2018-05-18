<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link href="{{ asset('tags/jquery.tag-editor.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

<input type="text" id="campo">
<button type="button" onclick="alert($('#campo').tagEditor('getTags')[0].tags);">Click Me!</button>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('tags/jquery.tag-editor.min.js') }}"></script>
<script src="{{ asset('tags/jquery.caret.min.js') }}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
var sugerencias;
$(document).ready(function(){
    getPrueba();
    $('#campo').tagEditor({
    autocomplete: {
        delay: 0, // show suggestions immediately
        position: { collision: 'flip' }, // automatic menu position up/down
        source: resultado
    },
    forceLowercase: false,
    placeholder: 'Programming languages ...'
});
});

   function getPrueba()
    {      
        resultado = [];
        $.ajax({
            dataType: 'json',
            url: 'getall',
        }).done(function(data) {
            sugerencias = data;
            //console.log('sugerencias:', data);
            for(var a in data){
                //console.log(data[a].name);        
                resultado.push(data[a].name);                
            }     
            console.log(resultado);         
        });
    }
</script>


</body>
</html>
