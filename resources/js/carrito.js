
//carrito 

//--------------------------------------------------------------------------------------------------------------------------
//      variables y constantes
//--------------------------------------------------------------------------------------------------------------------------


const contProducto = document.getElementById('cont-producto');
const templateFooter = document.getElementById('template-footer').content;
const templateCarrito = document.getElementById('template-carrito').content;
const items = document.getElementById('items');
const footer = document.getElementById('footer');
const valorCarrito = document.getElementById('valor-carrito');
const fragment = document.createDocumentFragment();
let carrito = {} /*objeto vacio del carrito donde se guardaran los productos*/;
let PrecioTotal = "";

var metodoPago = document.getElementById('metodoDePago')
var abono = document.getElementById('abono')

var metodoEnvio = document.getElementById('metodoDeEnvio')
var direccion = document.getElementById('direccion')





//--------------------------------------------------------------------------------------------------------------------------
//      eventos
//--------------------------------------------------------------------------------------------------------------------------

/* Capturamos el elemento en el cual se hace click */
contProducto.addEventListener('click', e => {
  agregarCarrito(e)
});

/*capturamos el btn de las acciones en la tabla del pedido*/
items.addEventListener('click',(e)=>{
  btnAccion(e)
})

//--------------------------------------------------------------------------------------------------------------------------
//      funciones
//--------------------------------------------------------------------------------------------------------------------------



const agregarCarrito = e => {
  /* console.log(e.target) */
  /* console.log(e.target.classList.contains('boton')) */
  /*si el elemento que se hace click tiene la clse "boton" entonces ejecutara lo siguiente*/
  if(e.target.classList.contains('boton')){
    /* console.log(e.target.parentElement) */ /*probamos con esta linea que le pasamos todo el div que contiene el producto*/
    setCarrito(e.target.parentElement) /* empujo el div dentro de la funcion setCarrito*/
  }
  e.stopPropagation() /* con esto evitamos que se heerede algun evento del padre*/
};

/* Esto me permite ir cargando los productos en el objeto carrito*/
const setCarrito = objeto => {
  /* console.log(objeto) */

  /*creo un objeto, dentro de la coleccion de objetos que es let carrito*/
  const producto = {
    id: objeto.querySelector('button').dataset.id,
    titulo: objeto.querySelector('h3').textContent,
    precio: objeto.querySelector('span').textContent,
    cantidad:1
  }
  /*chequeamos si ese producto ya existe en el objeto, en caso afirmativo aumentamos en 1*/
  if(carrito.hasOwnProperty(producto.id)){
    producto.cantidad = carrito[producto.id].cantidad + 1
  }
  /*cargamos el producto al objeto carrito*/
  carrito[producto.id] = {...producto}
  /*pintamos el carrito*/
  pintarCarrito()

  console.log(carrito) 

  

  

  
}



const pintarCarrito = () => {
  items.innerHTML = ''

  Object.values(carrito).forEach(producto => {
      
      templateCarrito.querySelectorAll('td')[0].textContent = producto.cantidad +" "+ producto.titulo
/*       templateCarrito.querySelectorAll('td')[1].textContent = producto.cantidad */
      templateCarrito.querySelector('span').textContent = producto.precio * producto.cantidad
      
      //botones
      templateCarrito.querySelector('.btn-info').dataset.id = producto.id
      templateCarrito.querySelector('.btn-danger').dataset.id = producto.id

      const clone = templateCarrito.cloneNode(true)
      fragment.appendChild(clone)
  })
  items.appendChild(fragment)

  pintarFooter()
  
}

const pintarFooter = () => {
  footer.innerHTML=''
  if(Object.keys(carrito).length === 0){
    footer.innerHTML=`
    <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
    `
    return
  }

  //sacamos la cantidad total de productos y precio total
  /* const nCantidad = Object.values(carrito).reduce( (acc,{cantidad})=> acc+cantidad,0 ) */
  const nPrecio =   Object.values(carrito).reduce( (acc,{cantidad,precio})=> acc+cantidad*precio,0 )
  PrecioTotal = nPrecio
  /* console.log(nPrecio) */

  /* templateFooter.querySelectorAll('td')[0].textContent = nCantidad */
  templateFooter.querySelector('span').textContent = nPrecio
  valorCarrito.textContent = nPrecio
  const clone = templateFooter.cloneNode(true)
  fragment.appendChild(clone)

  footer.appendChild(fragment)

  const btnVaciar = document.getElementById('vaciar-carrito')
  btnVaciar.addEventListener('click', ()=>{
    carrito = {}
    pintarCarrito()
  })
}

const btnAccion = e => {
  //accion de aumentar
  if(e.target.classList.contains('btn-info')){
    
    /* console.log(carrito[e.target.dataset.id]) */
    const producto = carrito[e.target.dataset.id]
    producto.cantidad++
    carrito[e.target.dataset.id] = {...producto}
    pintarCarrito()
  }
  if(e.target.classList.contains('btn-danger')){
    
    const producto = carrito[e.target.dataset.id]
    producto.cantidad--
    if(producto.cantidad === 0){
      delete carrito[e.target.dataset.id]
    }
    pintarCarrito()
  }

  e.stopPropagation()
}

//Armado del texto del pedido


  
  


// Codigo que captura todo los campos a llenar y enviar el mensaje 

let whatsapp = document.querySelector('.boton__whatsapp')



whatsapp.addEventListener('click', ()=>{

  //alert('holamundo')
  
  var nombre = document.getElementById('valor').value
  var metodoEnvio = document.getElementById('metodoDeEnvio').value
  var metodoPago = document.getElementById('metodoDePago').value
  var direccion = document.getElementById('direccion').value
  var abono = document.getElementById('abono').value

    if(nombre){
        valor = valor

        if(metodoEnvio){
            


            if(metodoPago){

                if(metodoEnvio == "Retiro por sucursal" && metodoPago == "Mercado pago"){
                    enviarPedido(valor, metodoEnvio, metodoPago,carrito,PrecioTotal)
                } 

                if(metodoEnvio == "Envio a domicilio" && metodoPago == "Mercado pago"){
                    if(direccion){
                        metodoEnvio = metodoEnvio +" -> Dirección: "+ direccion
                        enviarPedido(valor, metodoEnvio, metodoPago,carrito,PrecioTotal)
                    } else{
                        alert('Debe completar el campo "dirección"')
                    }
                }

                if(metodoEnvio == "Retiro por sucursal" && metodoPago == "Efectivo"){
                    if(abono){
                        metodoPago = metodoPago +" -> Abonó con: $" + abono
                        enviarPedido(valor, metodoEnvio, metodoPago,carrito,PrecioTotal)
                    } else {
                        alert('Debe completar el campo "Abonó con.."')
                    }
                }

                if(metodoEnvio == "Envio a domicilio" && metodoPago == "Efectivo"){
                    if(direccion){
                        metodoEnvio = metodoEnvio + "-> Dirección: " + direccion
                        
                        if(abono){
                            metodoPago = metodoPago + " -> Abonó con $" + abono
                            enviarPedido(valor, metodoEnvio, metodoPago,carrito,PrecioTotal)
                        } else {
                            alert('Debe completar el campo "Abonó con.."')
                        }

                    } else{
                        alert('Debe completar el campo "dirección"')
                    }
  
                }      

            }else {
                alert('Debe completar el campo "Metodo de pago"')
            }

        }else {
            alert('Debe completar el campo "Metodo de envio"')
        }
    }else {
        alert('Debe completar el campo "nombre"')
  }

  
    
  function enviarPedido(valor, metodoEnvio, metodoPago,carrito,PrecioTotal){   
    
    let pedido = "";

    for(valor in carrito){     
      
      for(i in carrito[valor] ){
        if(i == "cantidad"){
          pedido += i + ":" + carrito[valor][i] + "%0A"
    
        } if(i == "id"){
          pedido +=""

        } 

        if (i == "titulo"){
          pedido += carrito[valor][i]
        }

        if (i =="precio"){
          pedido +=" - "
        }
          
      } 

    }
        
      let mensaje = "https://api.whatsapp.com/send?phone=5491141774133&text=||----Pedido----|| "+"%0A"+"%0A"+"Nombre: "+nombre+"%0A"+"Método de envio: "+metodoEnvio+"%0A"+"Método de pago: "+metodoPago+"%0A"+"%0A"+"Pedido: "+"%0A"+pedido+"%0A"+"PRECIO TOTAL: $"+PrecioTotal+"&source=&data="
      window.location.href = mensaje   
        
  }

          
})

//--------------------------------------------------------------------------------------------------------------------------
//      Seleccion de metodo de envio y pago
//--------------------------------------------------------------------------------------------------------------------------

metodoPago.addEventListener('input', (e)=>{
  if(e.target.value == "Efectivo"){
    abono.classList.add('mostrar-abono')
  } else {
    abono.classList.remove('mostrar-abono')
  }  
})

metodoEnvio.addEventListener('input', (e)=>{
  if(e.target.value == "Envio a domicilio"){
    direccion.classList.add('mostrar-direccion')
  } else {
    direccion.classList.remove('mostrar-direccion')
  }  
})
