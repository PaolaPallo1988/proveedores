//QUE NO SE RECARGE LA PAGINA AL HACER F5
if(window.history.replaceState){
	window.history.replaceState(null,null,window.location.href)
}
//QUE NO SE RECARGE LA PAGINA AL HACER F5


    $(document).ready(function() {
        $("#cedula_usuario").on('paste', function(e) {
            e.preventDefault();
            alert("Esta acción está prohibida");
        })
        $("#password_usuario").on('paste', function(e) {
            e.preventDefault();
            alert("Esta acción está prohibida");
        })
        $("#bloquear").on('copy', function(e) {
            e.preventDefault();
            alert("Esta acción está prohibida");
        })
    })



    document.oncontextmenu = function(e) {
        return false;
    }



    function limpia() {
        var val = document.getElementById("cedula_usuario").value;
        var tam = val.length;
        for (i = 0; i < tam; i++) {
            if (!isNaN(val[i]))
                document.getElementById("cedula_usuario").value = '';
        }
    }



    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();




    window.onload = function() {
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        }, false);
        document.addEventListener("keydown", function(e) {
            //document.onkeydown = function(e) {
            // "I" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                disabledEvent(e);
            }
            // "J" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                disabledEvent(e);
            }
            // "S" key + macOS
            if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                disabledEvent(e);
            }
            // "U" key
            if (e.ctrlKey && e.keyCode == 85) {
                disabledEvent(e);
            }
            // "F12" key
            if (event.keyCode == 123) {
                disabledEvent(e);
            }
        }, false);
        function disabledEvent(e) {
            if (e.stopPropagation) {
                e.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
            e.preventDefault();
            return false;
        }
    }
    //edit: removed ";" from last "}" because of javascript error
