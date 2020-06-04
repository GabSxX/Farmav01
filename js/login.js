const inputs = document.querySelectorAll(".input");

function addcL(){
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

function remcL(){
  let parent = this.parentNode.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach(input => {
  input.addEventListener("focus",addcL);
  input.addEventListener("blur",remcL);
})
