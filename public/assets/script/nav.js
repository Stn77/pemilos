let profile = document.getElementById("account")
let profileOption = document.getElementById("profileAction")

profile.addEventListener("click", function(){
    if(profileOption.style.display === "none"){
        profileOption.style.display = "flex"
        profileOption.style.opacity = "1"
    }else{
        profileOption.style.opacity = "0"
        setTimeout(() => {
            profileOption.style.display = "none"
        }, 400);
    }
})