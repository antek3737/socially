const minusButtons = document.querySelectorAll(".event-right");
let  IDontWantToSeeItAnymore = [];

minusButtons.forEach(minusButton =>{
    minusButton.addEventListener('click', function (event) {
        event.preventDefault();
        let id = this.parentElement.parentElement.parentElement.parentElement.parentElement.getAttribute("id");
        let e = this.parentElement.parentElement.parentElement.parentElement.parentElement;
        console.log(id);
        console.log(e);
        e.remove();
        let events = document.querySelectorAll('.placement-event');
        container.innerHTML='';
        events.forEach(event=> container.appendChild(event));
    })
});







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