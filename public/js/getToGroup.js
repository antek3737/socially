const events = document.querySelectorAll(".one-group");

events.forEach(e =>
    e.addEventListener("click", function (e) {
        e.preventDefault()
            const id = e.target.getAttribute("id")
        fetch(`/join/${id}`).then(()=>
        window.location.replace('main'));
        }
    )
)

