$(function() {
        //seleccionamos el div que contiene el texto y los botones
        var $contenedor = $('#contenedor');

        //código que se ejecuta al presionar el botón btnAbajo
        $('#btnAbajo').click(
          function (e) {
            //el método animate crea una animación mediante
            //las propiedades otorgadas como primer parámetro
            //y la velocidad indicada como segundo
            $('html, body').animate({scrollTop: $contenedor.height()}, 1000);
          }
        );

        //código que se ejecuta al presionar el botón btnArriba
        $('#btnArriba').click(
          function (e) {
            $('html, body').animate({scrollTop: '0px'}, 1000);
          }
        );
    });