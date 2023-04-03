const delete_buttons = document.querySelectorAll(".delete");
const delete_form = document.getElementById("manageUsers-main-confirmation");
const overflow = document.getElementById("manageUsers-main-overflow");
const closing_cross = document.getElementById("closing-cross");
const num_user = document.getElementById("num");

delete_buttons.forEach(button => {
    button.addEventListener("click", function(){
        delete_form.classList.add("active");
        overflow.classList.add("active");
        num_user.value = this.value;
    })
})

overflow.addEventListener("click", function(){
    delete_form.classList.remove("active");
    overflow.classList.remove("active");
})

closing_cross.addEventListener("click", function(){
    delete_form.classList.remove("active");
    overflow.classList.remove("active");
})