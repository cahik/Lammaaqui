// jQuery("#telefone")
// .mask("(99) 9999-9999")
// .focusout(function (event) {  
//   var target, phone, element;  
//   target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
//   phone = target.value.replace(/\D/g, '');
//   element = $(target);  
//   element.unmask();
// });

// jQuery("#celular")
// .mask("(99) 9999?9-9999")
// .focusout(function (event) {  
//   var target, phone, element;  
//   target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
//   phone = target.value.replace(/\D/g, '');
//   element = $(target);  
//   element.unmask();  
//   if(phone.length > 10) {  
//     element.mask("(99) 9999?9-9999");  
//   } else {  
//     element.mask("(99) 9999?9-9999");  
//   }  
// });

$(document).ready(function() { 

$('#telefone').mask('(00) 0000-0000');

$('#celular').mask('(00) 00000-0000');

})