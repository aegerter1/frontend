<script>
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

  function checkCookie() {
    let user = getCookie("token");
    if (user != "") {

    } else {
      // user = prompt("Please enter your name:","");
      //  if (user != "" && user != null) {
      // setCookie("username", user, 30);
      //  }
    }
  }
</script>