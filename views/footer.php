<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<?php
echo '
<script src="js/map.js?version=' . filemtime('../public_html/js/map.js') . '"></script>
<script src="js/post.js?version=' . filemtime('../public_html/js/post.js') . '"></script>';
?>
<!------ Include the above in your HEAD tag ---------->
<script>
  var image = null;
  var lat = null;
  var long = null;
  async function fileUpload() {
    const { value: file } = await Swal.fire({
  title: 'Select image',
  input: 'file',
  inputAttributes: {
    'accept': 'image/*',
    'aria-label': 'Upload your profile picture'
  }
})

  if (file) {
    const reader = new FileReader()
    reader.onload = (e) => {
      image = e.target.result
    }
    reader.readAsDataURL(file)
  }
}


  function getLocation(user) {
    if(lat == null && long == null){
      let x = document.getElementById("demo");

      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }else{
      lat = null;
      long = null;
      demo.innerHTML = '';
    }
    

  }
  function showPosition(position) {
    let x = document.getElementById("demo");
    x.innerHTML = '<open-map lat="' + position.coords.latitude +
      '" long="' + position.coords.longitude + '" w="100%" h="250" z="13" p=""></open-map>';
    lat = position.coords.latitude;
    long = position.coords.longitude;
  }

  function sendPost() {
    //let text_area = document.body.querySelector("#postArea");
    var text_area = document.getElementById("postArea");
    var demo = document.getElementById("demo");
 
    if (text_area.value != '') {

      $.ajax({
          method: "POST",
          url: "savePost",
          data: {
            lng: long,
            lt: lat,
            msg: text_area.value,
            img : image
          }
        })
        .done(function(msg) {
         window.location.reload();  //Amíg nincs ajaxolás, addig újratöltődik magától az egész.        

          image = null;
          lat = null;
          long = null;
          text_area.value = '';
          demo.innerHTML = '';
          
        })
        .fail(function(msg){  
          alert(msg.data);
          image = null;
          lat = null;
          long = null;
          text_area.value = '';
          demo.innerHTML = '';
        });
        ;
    } else {
    let postarea = document.body.querySelector("#postarea");
   
    postarea.classList.toggle("animated");
    postarea.classList.toggle("swing");
 
/*
    if(postarea.classList.contains("animated") &&
    postarea.classList.contains("swing") ){
      postarea.classList.remove("animated");
    postarea.classList.remove("swing");

    }else{
      postarea.classList.add("animated");
    postarea.classList.add("swing");
    }
   
*/

    //   text_area.style.border = "2px solid #4CAF50";
    // EZ valamiért nem ment. TODO: vörös keret, ha üres volt a textarea.
    }    
  }


function deletePost(post_id_got) {

$.ajax({
        method: "POST",
        url: "deletePost",
        data: {
            post_id: post_id_got,
        }
    })
    .done(function(msg) {

        Array.from(document.body.querySelectorAll("user-post")).find(el => el.getAttribute("post-id") == post_id_got).remove();

    })
    .fail(function(msg) {
      alert(msg);

    });
}
</script>