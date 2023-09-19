<script>
  // windows onload check cookies
  window.onload = function() {
    checkCookie();
  }

  // get cookies function
  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  // delete cookies function
  function delete_cookie(name) {
    console.log(name);
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }

  //check cookies function
  function checkCookie() {
    let user = getCookie("token");
    delete_cookie('token');
    //Cookie.remove('token');
    console.log(user);
    if (user != "") {
      delete_cookie('token');
      window.location.href = 'index.php';
    } else {
      window.location.href = 'index.php';
      // user = prompt("Please enter your name:","");
      //  if (user != "" && user != null) {
      // setCookie("username", user, 30);
      //  }
    }
  }
</script>