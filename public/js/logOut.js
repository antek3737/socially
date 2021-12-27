const button = document.querySelector("button[name='logOut']");

button.addEventListener('click', function () {
    console.log("clicked");
    fetch(`/logOut`).then(()=>
        window.location.replace('main'));
});