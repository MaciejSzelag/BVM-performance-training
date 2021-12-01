const showLists = document.querySelectorAll('.show-list');
const showLists_navList = document.querySelectorAll('.nav-list');



for (let $i = 0; $i < showLists.length; $i++){
    showLists[$i].addEventListener("click", function () {
        // if (showLists_navList) {
            showLists_navList[$i].classList.toggle('nav-list-show');
        // }
    })  
}



const confirmation = document.querySelectorAll(".confirm");
const deleteConfirmation = document.querySelectorAll('.alert-confirmation');



confirmation.forEach((confirm) => {
    

    confirm.addEventListener('click', () => {
 
        deleteConfirmation.forEach((deleteItem) => {
            deleteItem.classList.add('confirmed');
  


    })
})


})


 








console.log("I see")