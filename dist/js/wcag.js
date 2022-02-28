const contrastBtn = document.getElementById('contrast');
const bigLetter = document.getElementById('big-letter');
const smallLetter = document.getElementById('small-letter');
const body = document.querySelector('body');
let play = document.querySelector('.play img');
let pause = document.querySelector('.pause img');
const imagesDir = 'https://przychodnia-skala.pl/wp-content/themes/spzoz/dist/images';

contrastBtn.addEventListener('click', ()=>{
    let item = window.localStorage.getItem('contrast');
    if(!item) {
        localStorage.setItem('contrast', 'yes');
        document.body.classList.add('wcag');
        document.getElementById('contrastText').textContent = 'Przejdź do wersji standardowej';
        document.querySelectorAll('.logo').forEach(logo => {
            let img = logo.querySelector('img');
            img.setAttribute('src', `${imagesDir}/logotyp-prawidlowy_zolty.png`);
        });
        if(play) {
            document.querySelector('.play img').setAttribute('src', `${imagesDir}/play-solid_zolty.svg`);
            document.querySelector('.pause img').setAttribute('src', `${imagesDir}/pause-solid_zolty.svg`);
        }
        document.querySelector('#big-letter img').setAttribute('src', `${imagesDir}/letter-a_zolty.png`);
        document.querySelector('#small-letter img').setAttribute('src', `${imagesDir}/letter-a_zolty.png`);
    } else {
        localStorage.removeItem('contrast');
        document.body.classList.remove('wcag');
        document.getElementById('contrastText').textContent = 'Przejdź do wersji kontrastowej';
        document.querySelectorAll('.logo').forEach(logo => {
            let img = logo.querySelector('img');
            img.setAttribute('src', `${imagesDir}/logotyp-prawidlowy.png`);
        })
        if(play) {
            document.querySelector('.play img').setAttribute('src', `${imagesDir}/play-solid_biala.svg`);
            document.querySelector('.pause img').setAttribute('src', `${imagesDir}/pause-solid_biala.svg`);
        }
        document.querySelector('#big-letter img').setAttribute('src', `${imagesDir}/letter-a.png`);
        document.querySelector('#small-letter img').setAttribute('src', `${imagesDir}/letter-a.png`);
    }
})

const contrast = window.localStorage.getItem('contrast');
if(contrast) {
    document.body.classList.add('wcag');
    document.getElementById('contrastText').textContent = 'Przejdź do wersji standardowej';
    document.querySelectorAll('.logo').forEach(logo => {
        let img = logo.querySelector('img');
        img.setAttribute('src', `${imagesDir}/logotyp-prawidlowy_zolty.png`);
    });
    document.querySelector('#big-letter img').setAttribute('src', `${imagesDir}/letter-a_zolty.png`);
    document.querySelector('#small-letter img').setAttribute('src', `${imagesDir}/letter-a_zolty.png`);
    if(play) {
        document.querySelector('.play img').setAttribute('src', `${imagesDir}/play-solid_zolty.svg`);
        document.querySelector('.pause img').setAttribute('src', `${imagesDir}/pause-solid_zolty.svg`);
    }
}

bigLetter.addEventListener('click', function() {
    if(body.classList.contains('big')) {
        localStorage.setItem('size', 'bigger');
        body.classList.remove('big')
        body.classList.add('bigger')
    } else if(body.classList.contains('bigger')) {
        localStorage.setItem('size', 'bigest');
        body.classList.remove('bigger')
        body.classList.add('bigest');
        bigLetter.disabled = true;
    } else if(body.classList.contains('bigest')) {
        return
    } else {
        localStorage.setItem('size', 'big');
        body.classList.add('big')
    }
});
smallLetter.addEventListener('click', function() {
    if(body.classList.contains('big')) {
        localStorage.removeItem('size');
        body.classList.remove('big')
    } else if(body.classList.contains('bigger')) {
        localStorage.setItem('size', 'big');
        body.classList.remove('bigger')
        body.classList.add('big')
    } else if(body.classList.contains('bigest')) {
        localStorage.setItem('size', 'bigger');
        bigLetter.disabled = false;
        body.classList.remove('bigest')
        body.classList.add('bigger')
    } else {
        return
    }
});
const size = localStorage.getItem('size');
if(size === 'big') {
    body.classList.add('big')
} else if (size === 'bigger') {
    body.classList.add('bigger')
} else if (size === 'bigest') {
    body.classList.add('bigest')
}

let formAlert = document.querySelector('.screen-reader-response')
if(formAlert) formAlert.setAttribute('role','alert');
let screenAlert = document.querySelector('.wpcf7-response-output');
if(screenAlert) {
    screenAlert.setAttribute('aria-hidden','false');
    screenAlert.setAttribute('role','alert')
}
document.addEventListener( 'wpcf7submit', function( event ) {
    const invalid = document.querySelector('.not-valid');
    invalid.focus();
}, false );
const form = document.querySelector('.wpcf7-form ');
if(form) {
    document.getElementById('name_surname').setAttribute('autocomplete','name');
    document.getElementById('email').setAttribute('autocomplete','email');
    document.getElementById('tel').setAttribute('autocomplete','tel-national');
}
const search = document.querySelector('.search');
if(search) {
    let el = document.createElement("span");
    let label = document.createElement("label");
    label.classList.add('sr-only');
    label.setAttribute('for','search');
    el.classList.add('sr-only');
    label.appendChild(document.createTextNode('Wpisz wyszukiwaną frazę'));
    const content = document.createTextNode('Wyszukaj')
    el.appendChild(content)
    let button = document.querySelector('.search button');
    button.appendChild(el);
    document.querySelector('.search input').setAttribute('id','search');
    search.insertBefore(label, document.querySelector('.search input'));
}

let downloads = document.querySelectorAll('.subpage a');
    downloads.forEach(function(el) {
        let doc = el.getAttribute('href');
        let content = el.textContent;
        if(doc.includes('pdf')) {
            content += ' (PDF)';
            el.textContent = content;
        } else if (doc.includes('doc')) {
            content += ' (DOC)';
            el.textContent = content;
        } else if (doc.includes('docx')) {
            content += ' (DOCX)';
            el.textContent = content;
        }
        else if (doc.includes('jpg')) {
            content += ' (JPG)';
            el.textContent = content;
        } else if (doc.includes('xlsx')) {
            content += ' (XLSX)';
            el.textContent = content;
        }
    });
let sitemap = document.querySelector('.wsp-container');
if(sitemap) {
    document.querySelector('.wsp-pages-title').textContent = 'Strony';
    document.querySelector('.wsp-posts-title').textContent = 'Posty wg kategorii';
}

document.querySelectorAll('.home_2 .cta').forEach(block => {
    // console.log(block)
    let title = block.querySelector('.txt h3').textContent;
    // console.log(title)
    block.querySelector('.arrow span').textContent = `o ${title}`;
})

document.addEventListener('focusin', function() {
    // console.log('focused: ', document.activeElement)
}, true);