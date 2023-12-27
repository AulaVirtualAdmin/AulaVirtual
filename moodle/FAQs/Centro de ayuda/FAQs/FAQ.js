let question = document.querySelectorAll('.question');
let btndropdown = document.querySelectorAll('.question .more');
let answer = document.querySelectorAll('.answer');
let parrafo =document.querySelectorAll('.answer p');

for (let i = 0; i < btndropdown.length; i++){

    let altoparrafo = parrafo[i].clientHeight;
    let switchc = 0;

    btndropdown[i].addEventListener('click', () => {


        if (switchc == 0){

            answer[i].style.height = `${altoparrafo}px`;
            question[i].style.marginbottom = '10px';
            btndropdown[i].innerHTML='<i>-</i>';
            switchc ++;
        }

        
        else if (switchc == 1){

            answer[i].style.height = '0'; 
            question[i].style.marginbottom = '0px';
            btndropdown[i].innerHTML='<i>+</i>';
            switchc --;
        }
    })


}