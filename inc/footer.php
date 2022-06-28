<div class="container">
  <footer class="py-3 my-4 border-top">

    <p id="demo" class="text-center text">&copy; 2021 IşıQ, Inc</p>
  </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  
  var element = document.getElementById('mesajlar');

  element.scrollTop = element.scrollHeight;

  function kayit() 
  {
  var message = document.getElementById("floatingTextarea2").value;   
  var to = document.getElementById("to").value;   
  
  $.ajax({
    url:"http://localhost/www/ajax%20%C3%B6%C4%9Frenme/mesaj-kayit.php",
    data:"mesaj="+message+"&name="+to,
    type:"POST",
    success:function(data) 
    {
      if (data == true) 
      {
        alert ("1");
      }  
      else
      {
        alert ("2");      
      }
    }
  });
  
  }


setInterval(function() {$("#mesajlar").load("http://localhost/www/ajax%20%C3%B6%C4%9Frenme/mesajlar.php");}, 1000);



  
</script>
</body>
</html> 