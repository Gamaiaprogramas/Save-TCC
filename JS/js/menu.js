
let navBar =document.querySelector('#header')

document.addEventListener("scroll" ,()=>{
    let scrollTop = window.scrollY

    if(scrollTop>190){
        navBar.classList.add('rolar')
    }else{
        navBar.classList.remove('rolar')
    }
})