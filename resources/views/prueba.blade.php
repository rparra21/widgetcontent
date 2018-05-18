<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link href="{{ asset('tags/jquery.tag-editor.css') }}" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<input type="text" id="campo">
<button type="button" id="btnCrear">Click Me!</button>

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

    function obtener(){
        console.log($('#campo').tagEditor('getTags')[0].tags);
    }

    
    $("#btnCrear").click(function() {
       
            var category = $('#campo').tagEditor('getTags')[0].tags;
           console.log(category);
            $.ajax({
                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
            dataType: 'json',
            type:'POST',
            url: "category",
            data: {"category": category},
        }).done(function(data){        
                console.log("hecho");
        });
    });
</script>


</body>
</html>
