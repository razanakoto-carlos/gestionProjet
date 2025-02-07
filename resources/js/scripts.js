const btn = document.querySelector('#handlecliked');
const classIcon = document.querySelector('#bi-btn')
var cls = 0
btn.addEventListener('click', () => {
    if (cls == 0) {
        classIcon.classList = "bi-chevron-down"
        cls = 1
    } else {
        classIcon.classList = "bi-chevron-up"
        cls = 0
    }
})