const imgGrande = document.querySelector('.imagemGrande');
const imgPequena = document.querySelectorAll('.imagemPequena');

imgGrande.addEventListener('click', () => {
    location.href='parque_nubank.php';
})

imgPequena[0].addEventListener('click', () => {
    location.href='espaco_cimed.php';
})

imgPequena[1].addEventListener('click', () => {
    location.href='theatro_municipal.php';
})