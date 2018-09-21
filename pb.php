<?php 
/*session_start();
if(!isset($_SESSION['timezone']))
{
    if(!isset($_REQUEST['offset']))
    {
    ?>
    <script>
    var d = new Date()
    var offset= -d.getTimezoneOffset()/60;
    location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?offset="+offset;
    </script>
    <?php    
    }
    else
    {
        $zonelist = array('Kwajalein' => -12.00, 'Pacific/Midway' => -11.00, 'Pacific/Honolulu' => -10.00, 'America/Anchorage' => -9.00, 'America/Los_Angeles' => -8.00, 'America/Denver' => -7.00, 'America/Tegucigalpa' => -6.00, 'America/New_York' => -5.00, 'America/Caracas' => -4.30, 'America/Halifax' => -4.00, 'America/St_Johns' => -3.30, 'America/Argentina/Buenos_Aires' => -3.00, 'America/Sao_Paulo' => -3.00, 'Atlantic/South_Georgia' => -2.00, 'Atlantic/Azores' => -1.00, 'Europe/Dublin' => 0, 'Europe/Belgrade' => 1.00, 'Europe/Minsk' => 2.00, 'Asia/Kuwait' => 3.00, 'Asia/Tehran' => 3.30, 'Asia/Muscat' => 4.00, 'Asia/Yekaterinburg' => 5.00, 'Asia/Kolkata' => 5.30, 'Asia/Katmandu' => 5.45, 'Asia/Dhaka' => 6.00, 'Asia/Rangoon' => 6.30, 'Asia/Krasnoyarsk' => 7.00, 'Asia/Brunei' => 8.00, 'Asia/Seoul' => 9.00, 'Australia/Darwin' => 9.30, 'Australia/Canberra' => 10.00, 'Asia/Magadan' => 11.00, 'Pacific/Fiji' => 12.00, 'Pacific/Tongatapu' => 13.00);
        $index = array_keys($zonelist, $_REQUEST['offset']);
        $_SESSION['timezone'] = $index[0];
    }
}
date_default_timezone_set($_SESSION['timezone']);

//rest of your code goes here*/
     ?>
   <!--   <script type="text/javascript">
            var  nombre="melissa";
            var hello;
            alert(hello);
     </script> -->


    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
    </head>
    <body>
        <br><br><br><br>
        <!-- FORMULARIO  -->
        <select onchange="activar(this.value)">
            <option value="0">------------</option>
            <option value="1">aprendiz</option>
            <option value="2">instructor</option>
        </select>

        <DIV id="respuesta">
            
        </DIV>
   <!--   <div id="caja1">
        <label >ficha</label>
        <input  type="" name="">

     </div>
    
    
     <div id="caja2">    
        <label >programa</label>
        <input  type="" name="">
     </div>
    
    <div id="caja3">
        <label >programa</label>
        <input   type="" name="">
    </div> -->
    
    

    </body>
    <script type="text/javascript">
        function activar(valor) {
            if (valor==1) {
             document.getElementById('respuesta').innerHTML='<div id="caja1"><label >ficha</label><input  type="" name=""></div> <div id="caja2"><label >programa</label><input  type="" name=""></div>';
               
            }else if(valor==2){
             
                document.getElementById('respuesta').innerHTML=' <div id="caja3"><label >programa</label><input   type="" name=""></div>';
            }
        }
    </script>
    </html>