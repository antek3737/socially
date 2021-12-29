const dates = document.querySelectorAll('p[class="calendarDate"]');
const container = document.querySelector(".placement-content");
let arrayOfDates = [];
dates.forEach(date =>{
    arrayOfDates.push(date.innerText);
});

let arrayOfDatesToDelete = [];

// let setOfDates = new Set(arrayOfDates);

for(let i =1; i<dates.length;i++){
    let temp = dates[i-1].innerText;
    if(dates[i].innerText === temp){
        arrayOfDatesToDelete.push(dates[i]);
    }else{
        temp = dates[i].innerText;
    }
}

for(let date of arrayOfDatesToDelete){
    date.innerText="";
    date.parentElement.innerHTML='';
}
// for (let item of setOfDates) console.log(item);


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