console.log('Init!');

$('document').ready(function () {
check();
hiddenFields();
// inputmask
const form = document.querySelector('.form');
const telSelector = form.querySelector('input[type="tel"]');
const inputMask = new Inputmask('+373 999-99-999');
inputMask.mask(telSelector);

const validation = new JustValidate('.form');

validation

  .addField('.input-name', [
    {
      rule: 'minLength',
      value: 3,
      errorMessage:"Minimum 3 simboluri",
    },
    {
      rule: 'maxLength',
      value: 30,
      errorMessage:"Maximum 30 simboluri",
    },
    {
      rule: 'required',
      value: true,
      errorMessage: 'Introduceți Numele și Prenumele'
    }
  ])
  .addField('.input-mail', [
    {
      rule: 'required',
      value: true,
      errorMessage: 'E-mail este obligatoriu',
    },
    {
      rule: 'email',
      value: true,
      errorMessage: 'Incorrect E-mail',
    },
  ])
  .addField('.input-tel', [
    {
      rule: 'required',
      value: true,
      errorMessage: 'Introduceți numărul de telefon',
    },
    {
      rule: 'function',
      validator: function() {
        const phone = telSelector.inputmask.unmaskedvalue();
        return phone.length === 8;
      },
      errorMessage: 'Incorrect numărul',
    },
  ]).onSuccess((event) => {
    console.log('Validation passes and form submitted', event);

    let formData = new FormData(event.target);

    console.log(...formData);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          console.log('trimit');
        }
      }
    }

    xhr.open('POST', 'mail.php', true);
    xhr.send(formData);

    event.target.reset();
  });

  function check(){
    if(cartQuantity>0){
        console.log(cartQuantity);
        var forma = document.querySelector('.hidden_block1');
        forma.classList.add('shownt');
    }
    else
    if(cartQuantity === 0){
      
    }
    
  }

  function hiddenFields(){
    $.getJSON('goods.json', function (data) {
    if (!$.isEmptyObject(cart)) {    
        var out2 = '';
        var total = '';

        for (var key in cart) {
         total+=''+data[key]['name']+': '+cart[key]+' buc,  ';
        }
        out2 += '<input type="hidden" class="hidden_input" name="Comandat:" value="'+total+'. ">';
        out2 += '<input type="hidden" class="hidden_input" name="Limba" value="Romînă">';
    }
    else{
        var out2 = '';
    }
    $('div.hidden').html(out2);
  })
}
   
});