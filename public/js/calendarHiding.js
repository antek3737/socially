const dates = document.querySelectorAll('p[class="calendarDate"]');
const container = document.querySelector(".placement-content");
let arrayOfDates = [];
dates.forEach(date =>{
    arrayOfDates.push(date.innerText);
});

let arrayOfDatesToDelete = [];

for(let i =1; i<dates.length;i++){
    let temp = dates[i-1].innerText;
    if(dates[i].innerText === temp){
        arrayOfDatesToDelete.push(dates[i]);
    }else{
        temp = dates[i].innerText;
    }
}

for(let date of arrayOfDatesToDelete){
    date.parentElement.parentElement.parentElement.remove();
}

let ctp=document.querySelectorAll('.calendar-top-placement');

for (let i =1; i<ctp.length;i++){
    ctp[i].style.marginTop='5vh';
}
