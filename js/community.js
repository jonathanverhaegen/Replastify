const inputField = document.querySelector("#input");

inputField.addEventListener("click", (e) => {
    document.querySelector(".community__header_container").style.display = "none";
    document.querySelector(".popup__post").style.display = "block";
})

const sort = document.querySelector("#sort");

sort.addEventListener('change', (e) => {
    let state = e.target.value;
    if(state === "old"){
        document.querySelector(".post__container").style.flexDirection = "column-reverse";
    }
    if(state === "new"){
        document.querySelector(".post__container").style.flexDirection = "column";
    }
})

const posts = document.querySelectorAll(".post");

posts.forEach((post) => {
    
        let commentBtn = post.querySelector("#commentBtn");

        commentBtn.addEventListener('click', (f)=>{
            f.preventDefault();
            console.log("test");
        })

    
})