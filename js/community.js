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

            let userId = post.dataset.userid;
            let postId = post.dataset.postid;
            let text = post.querySelector("#commentField").value;


            if(text != ''){
                let formData = new FormData();
                formData.append('post_id', postId);
                formData.append('user_id', userId);
                formData.append('comment', text);

                fetch('ajax/comment.php', {
                    method: 'POST',
                    body: formData
                    })
                    .then(response => response.json())
                    .then(result => {
                        console.log('Success:', result);

                        let comments = post.querySelector('.comments');

                        let comment = document.createElement('li');
                        comment.className = "comment"
                        let avatarField = document.createElement('img');
                        let usernameField = document.createElement('p');
                        let commentField = document.createElement('p');

                        avatarField.className = "comment__avatar";
                        avatarField.src = "images/" + result.avatar;

                        usernameField.className = "comment__username";
                        usernameField.innerHTML = result.username;

                        commentField.className = "comment__text";
                        commentField.innerHTML = result.text;

                        comments.appendChild(comment);

                        comment.appendChild(avatarField);
                        comment.appendChild(usernameField);
                        comment.appendChild(commentField);

                        let amountComments = parseInt(post.querySelector('.comment__number').innerHTML);
                        amountComments += 1;
                        post.querySelector('.comment__number').innerHTML = amountComments;

                        post.querySelector('#commentField').value = "";
                        post.querySelector('#commentField').placeholder = "Typ a comment";


                    })
                    .catch(error => {
                    console.error('Error:', error);
                    });
            }
        })

    
})