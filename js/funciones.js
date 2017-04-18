/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function sumar_tnino()

    {

       /* var valor1=verificar("frutanino");

        var valor2=verificar("verduranino");

        var valor3=verificar("horasnino");

        var valor4=verificar("grasasnino");
        
        var valor5=verificar("dulcesnino");
         
        var valor6=verificar("bebidasnino"); 
      
    */
     
       
        var valor1=document.getElementById("frutanino").value; 

        var valor2=document.getElementById("verduranino").value;

        var valor3=document.getElementById("horasnino").value;

        var valor4=document.getElementById("grasasnino").value;
        
        var valor5=document.getElementById("dulcesnino").value;
         
        var valor6=document.getElementById("bebidasnino").value;
        
        
        

        // realizamos la suma de los valores y los ponemos en la casilla del

        // formulario que contiene el total

        document.getElementById("totalnino").value=parseFloat(valor1)+parseFloat(valor2)+parseFloat(valor3)
                +parseFloat(valor4)+parseFloat(valor5)+parseFloat(valor6);

    }

 
 function sumar_tpadres()

    {

        var valor1=document.getElementById("frutapadres").value; 

        var valor2=document.getElementById("verdurapadres").value;

        var valor3=document.getElementById("horaspadres").value;

        var valor4=document.getElementById("grasaspadres").value;
        
        var valor5=document.getElementById("dulcespadres").value;
         
        var valor6=document.getElementById("bebidaspadres").value;
        
       
        // realizamos la suma de los valores y los ponemos en la casilla del

        // formulario que contiene el total

        document.getElementById("totalpadres").value=parseFloat(valor1)+parseFloat(valor2)+parseFloat(valor3)
                +parseFloat(valor4)+parseFloat(valor5)+parseFloat(valor6);

    }

 
 function sumar_fisicanino()

    {

        var valor1=document.getElementById("deportenino").value; 

        var valor2=document.getElementById("juegonino").value;

        var valor3=document.getElementById("movimientonino").value;

        var valor4=document.getElementById("sedentarianino").value;
        
      
       
        // realizamos la suma de los valores y los ponemos en la casilla del

        // formulario que contiene el total

        document.getElementById("totalfisicanino").value=parseFloat(valor1)+parseFloat(valor2)+parseFloat(valor3)
                +parseFloat(valor4);

    }

     
function sumar_fisicapadres()

    {

        var valor1=document.getElementById("deportepadres").value; 

        var valor2=document.getElementById("juegopadres").value;

        var valor3=document.getElementById("movimientopadres").value;

        var valor4=document.getElementById("sedentariapadres").value;
        
      
       
        // realizamos la suma de los valores y los ponemos en la casilla del

        // formulario que contiene el total

        document.getElementById("totalfisicapadres").value=parseFloat(valor1)+parseFloat(valor2)+parseFloat(valor3)
                +parseFloat(valor4);

    }
 

    /**

     * Funcion para verificar los valores de los cuadros de texto. Si no es un

     * valor numerico, cambia de color el borde del cuadro de texto

     */

    function verificar(id)

    {

        var obj=document.getElementById(id);

        if(obj.value=="")

            value="0";

        else

            value=obj.value;

        if(validate_importe(value,1))

        {

            // marcamos como erroneo

            obj.style.borderColor="#808080";

            return value;

        }else{

            // marcamos como erroneo

            obj.style.borderColor="#f00";

            return 0;

        }

    }