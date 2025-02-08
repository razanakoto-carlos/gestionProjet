const btn = document.querySelector('#handlecliked');
const classIcon = document.querySelector('#bi-btn')
var countStyle = 0
btn.addEventListener('click', () => {
    if (countStyle == 0) {
        classIcon.classList = "bi-chevron-down";
        btn.classList = "mt-12 text-black cursor-pointer hover:bg-gray-800 hover:w-full hover:font-semibold transition-all ease-in-out p-1 hover:rounded hover:text-white focus:bg-gray-800 focus:font-semibold focus:p-1 focus:rounded focus:text-white"
        countStyle = 1
    } else {
        classIcon.classList = "bi-chevron-up"
        btn.classList = "mt-12 text-black cursor-pointer hover:bg-gray-800 hover:w-full hover:font-semibold transition-all ease-in-out p-1 hover:rounded hover:text-white"
        countStyle = 0
    }
})