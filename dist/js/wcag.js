const contrastBtn = document.getElementById('contrast');

contrastBtn.addEventListener('click', ()=>{
    let item = window.localStorage.getItem('contrast');
    if(!item) {
        localStorage.setItem('contrast', 'yes');
        document.body.classList.add('wcag');
    } else {
        localStorage.removeItem('contrast');
        document.body.classList.remove('wcag');
    }
})

const contrast = window.localStorage.getItem('contrast');
if(contrast) {
    document.body.classList.add('wcag');
} else {
    document.body.classList.remove('wcag');
}