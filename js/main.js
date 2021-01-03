// Avoid `console` errors in browsers that lack a console.
(function() {

  'use strict';
  var regalo = document.getElementById("regalo");

  document.addEventListener('DOMContentLoaded', function(){


      // CARGER MAPA EN UN div
    if(document.getElementById('mapa')) {
      var map = L.map('mapa').setView([8.981965, -79.527465], 18);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      L.marker([8.981965, -79.527465]).addTo(map)
        .bindPopup('GDLWebCamp 2018 <br> Boletos ya disponibles')
        .openPopup()
        //puede ser uno o el otro es indiferente
        .bindTooltip("Un Tooltip")
        .openTooltip();
    }

    //FIN DE LA CARGA DEL MAPA






    //datos usuarios
    var nombre = document.getElementById("nombre");
    var apellido = document.getElementById("apellido");
    var email = document.getElementById("email");



    //Capos bases
    var pase_dia = document.getElementById("pase_dia");
    var pase_dos_dias = document.getElementById("pase_dos_dias");
    var pase_completo = document.getElementById("pase_completo");


    //botones y div
    var calcular = document.getElementById("calcular");
    var errorDiv = document.getElementById("error");
    var btnRegistro = document.getElementById("btnRegistro");
    var lista_productos = document.getElementById("lista-productos");
    var suma = document.getElementById("suma-total");
    var viernes = document.getElementById("viernes");
    var sabado = document.getElementById("sabado");
    var domingo = document.getElementById("domingo");
    btnRegistro.disabled = true;


    //Extras
    var camisa = document.getElementById("camisa_evento");
    var etiquetas = document.getElementById("etiquetas");

    if(document.getElementById('calcular')) {




      calcular.addEventListener("click", calMonto);
      pase_dia.addEventListener("blur", mostrarDias);
      pase_dos_dias.addEventListener("blur", mostrarDias);
      pase_completo.addEventListener("blur", mostrarDias);

      nombre.addEventListener("blur", validarCampos );
      apellido.addEventListener("blur", validarCampos );
      email.addEventListener("blur", validarCampos );
      email.addEventListener("blur", validarMail );

      function validarCampos() {
        if (this.value =="") {
          errorDiv.style.display= "block";
          errorDiv.innerHTML= "Este campo es oblibatorio";
          errorDiv.style.border="1px solid red";
          this.style.border="1px solid red";
        }
        else { errorDiv.style.display= "none";
        this.style.border="1px solid #cccccc";
      }
      }

      function validarMail() {
        if(this.value.indexOf("@")>-1){
          errorDiv.style.display= "none";
          this.style.border="1px solid #cccccc";
        }
        else {
          errorDiv.style.display= "block";
          errorDiv.innerHTML= "Debe tener un @";
          errorDiv.style.border="1px solid red";
          this.style.border="1px solid red";
        }
      }




      function calMonto(event) {

        event.preventDefault();
        if(regalo.value=="") {
            alert("Selecciona un Regalo");
            regalo.focus();
        }
        else {
          var boletoDia = parseInt(pase_dia.value, 10)|| 0,
              boleto2Dias = parseInt(pase_dos_dias.value, 10)|| 0,
              boletoCompleto = parseInt(pase_completo.value, 10)|| 0,
              cantCamisa = parseInt(camisa.value, 10)|| 0,
              cantEtiquetas = parseInt(etiquetas.value, 10)|| 0;


          var totalPagar = (boletoDia *30) + (boleto2Dias *45) + (boletoCompleto *50) + ((cantCamisa *10)*0.93) + (cantEtiquetas *2);
          console.log(totalPagar);

          var listadoProducto = [];
          if(boletoDia > 0) listadoProducto.push(boletoDia + " " + (boletoDia==1 ? "Pase por dia" : "Pases por dia"));
          if(boleto2Dias > 0) listadoProducto.push(boleto2Dias + " " + (boleto2Dias==1 ? "Pase por 2 dias" : "Pases por 2 dias"));
          if(boletoCompleto > 0) listadoProducto.push(boletoCompleto +" " + (boletoCompleto==1 ? "Pase completo" : "Pases completos"));
          if(cantCamisa > 0) listadoProducto.push(cantCamisa + " " + (cantCamisa==1 ? "Camisa" : "Camisas"));
          if(cantEtiquetas > 0) listadoProducto.push(cantEtiquetas + " " + (cantEtiquetas==1 ? "Etiqueta" : "Etiquetas"));

          lista_productos.innerHTML = '';
          if(totalPagar > 0) lista_productos.style.display= "block";

          listadoProducto.forEach( i => {
            lista_productos.innerHTML += i + "<br/>";
          });

          suma.innerHTML = '$' + totalPagar.toFixed(2);


          btnRegistro.disabled = false;
          document.getElementById('total_pedido').value= totalPagar;






        }
      }


      function mostrarDias() {



        var boletoDia = parseInt(pase_dia.value, 10)|| 0,
            boleto2Dias = parseInt(pase_dos_dias.value, 10)|| 0,
            boletoCompleto = parseInt(pase_completo.value, 10)|| 0;


        (boletoDia > 0 || boletoCompleto > 0 || boleto2Dias > 0)  ? (viernes.style.display= "block") : (viernes.style.display= "none");
        (boletoCompleto > 0 || boleto2Dias > 0)  ? (sabado.style.display= "block") : (sabado.style.display= "none");
        boletoCompleto > 0 ? (domingo.style.display= "block") : (domingo.style.display= "none");





      }

    }






  }); // DOM Conten loaded
}());


$(function(){

  //menu fijo

  var windowHeight = $(window).height();
  var barraAltura = $('.barra').innerHeight();
  $(window).scroll(ponerBarra);
  function ponerBarra (){
    var scroll = $(window).scrollTop();
    if(scroll >windowHeight) {
      $('.barra').addClass('fixed');
      $('body').css({"margin-top" : barraAltura + 'px' });
    }
    else {
      $('.barra').removeClass('fixed');
      $('body').css({"margin-top" : 0 });
    }
  }

//menu Responsive
  $('.menu-movil').click(function(){
    $('.navegacion-principal').slideToggle();
  });




  //lettering
  $('.nombre-sitio').lettering();

  //agregra clase a menu

  $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
  $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
  $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');



  //Programam de conferencia
  $('.programa-evento nav a:first').addClass('activo');
  $('.programa-evento .info-cursos:first').show();
  $('.programa-evento nav a').click(function(e) {
    e.preventDefault();
    var enlace = $(this).attr('href');
    $('.ocultar').hide();
    $('.programa-evento nav a').removeClass('activo');
    $(this).addClass('activo');
    $(enlace).fadeIn();
  });

  //animaciones numeros

  if( $('.animar').length > 0 ){
    $('.animar').waypoint(function(){
      if( $('.animar').length > 0 ){
        $('.resumen-evento li:nth-child(1) p').animateNumber({ number:6},1200);
        $('.resumen-evento li:nth-child(2) p').animateNumber({ number:15},1200);
        $('.resumen-evento li:nth-child(3) p').animateNumber({ number:3},1200);
        $('.resumen-evento li:nth-child(4) p').animateNumber({ number:9},1200);
        $('.resumen-evento.animar').removeClass('animar');
      }
    }, {
      offset:'60%'
    });
  }


  //cuenta regresiva
  $('.cuenta-regresiva').countdown('2021/11/15 09:00:00',function(e){
    $('#dias').html(e.strftime('%D'));
    $('#horas').html(e.strftime('%H'));
    $('#minutos').html(e.strftime('%M'));
    $('#segundos').html(e.strftime('%S'));
  });


  //galeria
  for(i=1;i<=21;i++) {
    (i>9) ?
      $('.galeria').append(
        `<a href="img/galeria/`+ i +`.jpg" data-lightbox='galeria'>
         <img src="img/galeria/thumbs/`+ i +`.jpg">
         </a>`
    )
    :
      $('.galeria').append(
        `<a href="img/galeria/0`+ i +`.jpg" data-lightbox='galeria'>
         <img src="img/galeria/thumbs/0`+i+`.jpg">
         </a>`
      );


  }

  //ColorbOX

  $('.invitado-info').colorbox({inline:true, width:"50%"});


});
