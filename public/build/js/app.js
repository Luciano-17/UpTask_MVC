const mobileMenuBtn=document.querySelector("#mobile-menu"),sidebar=document.querySelector(".sidebar");mobileMenuBtn&&mobileMenuBtn.addEventListener("click",(function(){sidebar.classList.toggle("mostrar")}));const anchoPantalla=document.body.clientWidth;window.addEventListener("resize",(function(){document.body.clientWidth>=768&&sidebar.classList.remove("mostrar")}));