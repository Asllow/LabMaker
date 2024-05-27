//open and close menu (icon)
const nav = document.querySelector('#header nav')
const toggle = document.querySelectorAll('nav .toggle')
for (const element of toggle) {
    element.addEventListener('click', function () {
        nav.classList.toggle('show')
    })
}
// open and close menu (item)
const links = document.querySelectorAll('nav ul li a')
for (const link of links) {
    link.addEventListener('click', function () {
        nav.classList.remove('show')
    })
}
//Selecionar a Página
const sections = document.querySelectorAll('body[id]')
function activateMenuAtCurrentSection() {
    for (const section of sections) {
        const sectionId = section.getAttribute('id')
        document
            .querySelector('nav ul li a[id*=' + sectionId + ']')
            .classList.add('active')
    }
}
// Botão voltar para o topo
const backToTopButton = document.querySelector('.back-to-top')
function backToTop() {
    if (window.scrollY >= 360) {
        backToTopButton.classList.add('show')
    } else {
        backToTopButton.classList.remove('show')
    }
}

activateMenuAtCurrentSection()
window.addEventListener('scroll', function () {
    backToTop()
})
