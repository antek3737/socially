const plusButtons = document.querySelectorAll(".event-left");
const container = document.querySelector(".placement-content");

const event = document.querySelector("template[id='event']");

plusButtons.forEach(plusButton =>{
    plusButton.addEventListener('click', function (event) {
        event.preventDefault();
        const id = this.parentElement.parentElement.parentElement.parentElement.parentElement.getAttribute("id");
        console.log(id);

        fetch(`/addEvent/${id}`).then(()=>
         // window.location.replace('main'));
        console.log(id+"added")
        );

    })
});


//     fetch(`/join/${id}`).then(()=>
//         window.location.replace('main'));
// });

// function addChecked(checkbox){
//     checkbox.setAttribute('checked','');
// }
//
// function remoteChecked(checkbox){
//     checkbox.removeAttribute('checked');
// }
//
// function updateEvent(event, type,actionChecked){
//     console.log("UpdateEvent");
//     container.innerHTML = "";
//     let clone = event.content.cloneNode(true);
//
//      let deadlineCheckboxClone = clone.querySelector('input[name="eventDeadlineModeOn"]');
//      deadlineCheckboxClone.addEventListener('change', eventTrigger)
//
//     let names = clone.querySelector(".inputs-names-placement")
//     let nameToHide = names.querySelector('#nameToHide')
//     nameToHide.style.display = type;
//
//      let checkBox = clone.querySelector("input[name='eventDeadlineModeOn']");
//     actionChecked(checkBox);
//     let spaces = clone.querySelector(".inputs-spaces-placement")
//     let spaceToHide = spaces.querySelector('#spaceToHide')
//     spaceToHide.style.display = type;
//
//     container.appendChild(clone);
// }






//
//
// const deadlineCkeckbox = document.querySelector('input[name="eventDeadlineModeOn"]');
// const container = document.querySelector(".placement-content");
//
// const eventOn = document.querySelector("template[id='event']");
//
// let type = '1';
//
// deadlineCkeckbox.addEventListener('input', eventTrigger)
//
//
// function eventTrigger(){
//     if (this.checked) {
//         updateEvent(eventOn,'1')
//     } else {
//         updateEvent(eventOn,'none')
//     }
// }
//
// function updateEvent(event, type){
//     container.innerHTML = "";
//     let clone = event.content.cloneNode(true);
//
//     let deadlineCheckboxClone = clone.querySelector('input[name="eventDeadlineModeOn"]');
//     deadlineCheckboxClone.addEventListener('change', eventTrigger)
//
//     let names = clone.querySelector(".inputs-names-placement")
//     let nameToHide = names.querySelector('#nameToHide')
//     nameToHide.style.display = type;
//
//     let spaces = clone.querySelector(".inputs-spaces-placement")
//     let spaceToHide = spaces.querySelector('#spaceToHide')
//     spaceToHide.style.display = type;
//
//     container.appendChild(clone);
// }