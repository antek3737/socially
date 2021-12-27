const search = document.querySelector('input[name="groupSearcher"]');
const groupContainer = document.querySelector(".groups");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data) //wykonujemy post na search
        }).then(function (response) {
            return response.json(); //odbieramy odpowiedz i odczytujemy jako json
        }).then(function (groups) { // to co zostaje zwrocone przez response.json()
            groupContainer.innerHTML = "";  //czyscimy html container
            loadGroups(groups);
        });
    }
});

function loadGroups(groups) {
    groups.forEach(group => {
        console.log(group);
        createGroup(group);
    });
}

function createGroup(group) {
    const template = document.querySelector("#group-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = group.IDgroup;
    div.innerText = group.groupName;

    div.addEventListener("click",() => {
        const id = group.IDgroup;
        fetch(`/join/${id}`).then(() =>
            window.location.replace('main'));
    });

    groupContainer.appendChild(clone);
}
