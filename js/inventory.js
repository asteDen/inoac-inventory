
const sideBar = document.getElementById("sidebar-wrapper");
const wrapper = document.getElementById("wrapper");



let display = 0;

function hideShow(){


  if(display == 1){
    sideBar.style.width = "0px";
    wrapper.style.paddingLeft = "0px";
    display = 0;
  } else {
    sideBar.style.width = "250px";
    wrapper.style.paddingLeft = "250px";
    display = 1;
  }
  
  console.log(display);
}