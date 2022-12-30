<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Private Page</TITLE>
<META name="Author" Content="Bit Repository">
<META name="Keywords" Content="private">
<META name="Description" Content="Private Page">
</HEAD>
<BODY>
<h1>Welcome | <br /><br />
MERRY CHRISTMAS </h1>
<a href = "index.php" id = 'logout' >Logout</a>
<script>
let element = document.getElementById('logout');
element.onclick =function deleteAllCookies() {
    var cookies = document.cookie.split(";");
 
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
    
    setTimeout(function(){
                window.location.href = "index.php"
            }, 500);
}

</script>

</BODY>
</HTML>