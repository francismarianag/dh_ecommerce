// window.onload=​function​(){​
//   var​ categoria=document.querySelector(​"#categoria"​);categoria.elements.name.focus()
//   categoria.onsubmit = ​function​(evento){​
//     if​(!validaciones()){       
//       evento.preventDefault()     
//     }​else​{ 
//       categoria.submit()     
//     }   
//   }
  
//   ​function​ validaciones(){
//     ​var​ name=categoria.elements.name​
//     if​ (!validateName(name.value)) ​return​​ false​
//     return​​ true   
//   }​
  
//   function​ validateName(name){​
//     var​ error=document.getElementById(​"errorfirstname"​)​
//     if​ (name === ​""​ || name.length <= ​3​) {       error.innerHTML = ​"Debe colocar un nombre válido mayor a 3caracteres";    error.setAttribute(​"class"​,​"alert-danger"​)​
//     return ​​false
//      }​ else​{
//       error.innerHTML = ​""       
//       error.removeAttribute(​"class"​,​"alert-danger"​)​
//       return​​ true     
//     }   
//   }
// }
