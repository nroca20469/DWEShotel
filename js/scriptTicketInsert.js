//Get value(select-option)
const service = document.getElementById('service');
const price = document.getElementById('priceJS');
const totalPrice = document.getElementById('totalPrice');
const persons = document.getElementById('uds');
const bar = document.getElementById('bar');
const priceHour = document.getElementById('priceHour');
const unidadesBar = document.getElementById('unidadBar');
const priceBar = document.getElementById('priceBar');

service.addEventListener('change', (e) => {
    let price2 = e.target.value;
   // console.log(price2);
 
    separarComa(price2);
    calcularTotal();
}); 

persons.addEventListener('change', () => {
    calcularTotal();
});

unidadesBar.addEventListener('change', (e) => {
    let unidades = e.value;
    console.log(unidadesBar);
});

function calcularBar() {

}

function separarComa(value) {
    let array = value.split(',');
  //  console.log(array);

    price.innerText = array[1];
    //console.log(price);
    serviceMyores(array[0]);
}


function calcularTotal(){
    totalPrice.innerText = +persons.value * +price.innerHTML + '.00';

    // console.log(totalPrice.innerHTML);
    // console.log(persons.value);
}

function serviceMyores(service) {
    if(service == 'bar') {
        bar.style.display="block";
        priceHour.style.display="none";
        document.getElementById('persons').style.display="none";
    } else {
        bar.style.display="none";
        priceHour.style.display="block";
        document.getElementById('persons').style.display="block ";
     
    }
}