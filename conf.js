

var csrf_token;


function loadDOC(method,url,htmlTag)
{
    var xhttp = new XMLHttpRequest(); 
    xhttp.onreadystatechange = function() 
    {
        if(this.readyState==4 && this.status==200)
        {           
            document.getElementById(htmlTag).value = this.responseText;
                   
        }
    };

    xhttp.open(method,url,true);
    xhttp.send();
}

