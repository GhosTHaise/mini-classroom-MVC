function RequeteAJAX(method,open,send,IDcible) {
    var target = document.getElementById(IDcible)
    var HTTPREquest = new XMLHttpRequest();
    HTTPREquest.onreadystatechange = function(){
        if(HTTPREquest.readyState == 4){
            target.innerHTML = HTTPREquest.responseText
        }
    HTTPREquest.open(method,open,true)
    HTTPREquest.send(send)    
    }
}
