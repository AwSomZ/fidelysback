
  const mvtPopup = document.querySelector(".mvt-popup");
  const trsPopup = document.querySelector(".trs-popup");
  const blocker = document.querySelector(".blocker");
  const blockermvt = document.querySelector(".blockermvt");
 
  
  function showPopup(){
        
    mvtPopup.classList.add("show");
   
}

function showPopuptrs(){
        
  trsPopup.classList.add("show");
 
}

  



  blocker.addEventListener("click",function(){
    trsPopup.classList.remove("show");
  })
  blockermvt.addEventListener("click",function(){
    mvtPopup.classList.remove("show");
  })