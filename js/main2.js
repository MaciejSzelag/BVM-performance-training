const showLists = document.querySelectorAll('.show-lists');
const showLists_navList = document.querySelectorAll('.show-list');



showLists.forEach((item) => {
    item.addEventListener("click", () => {
        showLists_navList.forEach((navList) => {
            navList.classList.toggle("nav-list-show");
        })
   })

})


const confirmation = document.querySelector(".confirm");
const deleteConfirmation = document.querySelector('.alert-confirmation"');

confirmation.addEventListener('click', () => {
    console.log("confirm")
    deleteConfirmation.classList.add('confirmed');
})

console.log("I see")