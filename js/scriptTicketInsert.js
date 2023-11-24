//Get value(select-option)
const service = document.getElementById('service');
const price = document.getElementById('priceJS');
const totalPrice = document.getElementById('totalPrice');
const persons = document.getElementById('uds');
const priceHour = document.getElementById('priceHour');
const bar = document.getElementById('bar');
const internBar = document.getElementById('intern-bar')
const unidadesBar = document.getElementById('unidadBar');
const priceBar = document.getElementById('priceBar');

service.addEventListener('change', (e) => {
    let price2 = e.target.value;
    console.log(price2);
 
    separarComa(price2);
    calcularTotal();
}); 

internBar.addEventListener('change', (e) => {
    let price2 = e.target.value;
    console.log(price2);
 
    separarComaBar(price2);
}); 

persons.addEventListener('change', () => {
    calcularTotal();
});

unidadesBar.addEventListener('change', (e) => {
    let unidades = +unidadesBar.value;
    console.log(unidades);
    calcularBar(unidades);
});

function separarComa(value) {
    let array = value.split(',');
    //console.log(priceHour.value.trim);
    console.log(array[1]);
    priceHour.value = array[1] + ".00";  //PASAR VALOR DE PRECIO A PRICEHOUR
    console.log(priceHour.value);
x

    serviceMyores(array[0]); 
}

function separarComaBar(value) {
    let array = value.split(',');
    priceBar.innerText = +array[1] + ".00";
    calcularBar(unidadesBar.value);
}

function calcularBar(unidades){
    totalPrice.innerText = unidades * +priceBar.innerHTML + '.00';
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