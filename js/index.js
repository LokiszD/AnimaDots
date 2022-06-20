function barOpener(){ //botao para abrir menu de navegacao em celular

    let open = document.querySelector('#nav-aside')

    if((open.classList.contains('nav-aside')) == false){
        open.classList.add('nav-aside')
    }else{
        open.classList.remove('nav-aside')
    }

}

function scrollUp(){ //botao de voltar ao topo
    
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    })

}

function scrollUpButton(){ //aparecer botao de voltar ao topo

    if(window.scrollY == 0){
        document.querySelector('.scrollup').style.display = 'none'
    }else{
        document.querySelector('.scrollup').style.display = 'block'
    }

}

window.addEventListener('scroll', scrollUpButton)