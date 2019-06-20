function openNav() {
    document.getElementById("myNav").style.width = "100%";
  }
  
  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }

  document.getElementById('description').addEventListener('focus', function()
  {
    document.getElementById('description').blur();
  });
  document.getElementById('description').style.cursor = 'default';