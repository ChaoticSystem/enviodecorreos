<?php
 require ("PHPMailer/class.phpmailer.php");




  if(isset($_GET['email'])){
        try{
            
            
            $to = trim($_GET['email']);//to send
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;// or 465
            $mail->IsHTML(true);
            $mail->Username = "";
            $mail->Password = "";
            $mail->SetFrom("","Sistems");//agregar correo
            $mail->Subject 		= "USUPASU2";
            $mail->addCustomHeader('MIME-Version:', '1');
            $mail->addCustomHeader(' Content-type:text/html;charset=UTF-8');
            
            
            
            if(!empty($to)){
                $htmlContent = ' 
                    <html> 
                    <head> 
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title></title>
                        <style>
                            * {
                                margin: 0;
                                padding: 0;
                                outline: none;
                            }
                            #main {
                                margin: auto;
                                max-width: 320px;
                            }
                            #marquee, .marquee  {
                                display: block;
                                width: 100%;
                                color: white;
                                font-weight: bold;
                                background-color: #064E45;
                                background-image: linear-gradient(to right,orange,red);
                            }
                            .marquee {
                                position: relative;
                                width: 100%;
                                border: 0px solid black;
                                overflow: hidden;
                            }
                            .marquee div {
                                display: block;
                                position: absolute;
                                width: 400%;
                                overflow: hidden;
                                animation: marquee 10s linear infinite both;
                            }
                            .marquee span {
                                float: left;
                                width: 50%;
                            }
                    
                            @keyframes marquee {
                                0% { left: 0; }
                                100% { left: -400%; }
                            }
                            .buttonGO {
                                transition: all 0.3s;
                                display: block;
                                margin: 24px auto 8px;
                                padding: 0 12px;
                                height: 32px;
                                color: rgb(255,255,255);
                                border: 0 none;
                                border-radius: 4px;
                                background-color: #00897B;
                                line-height: 32px;
                                width: 64px;
                                text-align: center;
                                box-shadow: 3px 3px 0 #064E45;
                                text-decoration: none;
                            }
                            .buttonGO:active {
                                box-shadow: 0px 0px rgb(27, 72, 157);
                                transform: translate(3px, 3px);
                            }
                        </style>
                    </head> 
                    <body>
                        <br><br>
                        <div id="main">
                            <div class="marquee">
                                <img style="vertical-align: bottom; width: 100%; max-height:48px;" src="data:image/jpeg;base64,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">
                            </div>
                            <table cellspacing="0" style="padding: 18px 10px;width: 100%; background-color: #e0e0e0; box-sizing: border-box;"> 
                                <tr> 
                                    <td><br><br></td> 
                                </tr>
                                <tr style=""> 
                                    <td>'.$text.'</td> 
                                </tr>
                                <tr> 
                                    <td>
                                        <a class="buttonGO" href="'.$link.'" target="_blank">
                                            Ir Ya!
                                        </a>
                                    </td> 
                                </tr>
                                <tr> 
                                    <td><br><br></td> 
                                </tr> 
                            </table>
                        </div>
                    </body> 
                    </html>
                '; 
                
                $mail->Body = $htmlContent;
                $mail->CharSet = 'UTF-8';
                $mail->AddAddress($to);
                
                
                //$mail->Send();
				if(!$mail) {
					  print_r( 'Mailer error: ' . error_get_last());
					} else {
					  echo 'Message has been sent.';
					}

            }  
           
        }catch(exception $ex){}
        
        die('error 3');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp</title>
    <link rel="shortcut icon" href="favicon.png" />
    <meta name="og:image" content="favicon.png" />
    <meta property="og:image" content="favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-1.10.1.min.js"
        integrity="sha256-SDf34fFWX/ZnUozXXEH0AeB+Ip3hvRsjLwp6QNTEb3k="
        crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: none;
        }
        body, html {
            color: white;
            background-color: rgb(21, 62, 62);
        }
        #main {
            margin: 64px auto;
            width: calc(100% - 16px);
            max-width: 480px;
            min-height: 96px;
            box-sizing: border-box;
        }
        #content {
            margin: 14px auto;
            width: calc(100% - 16px);
            max-width: 480px;
            min-height: 96px;
            border: 0px solid rgb(9, 34, 34);
            border-radius: 12px;
            background-image: linear-gradient(to right,rgb(7, 23, 23) 75%,rgb(17, 53, 53));
            box-sizing: border-box;
            overflow: hidden;
            box-shadow: 0 0 3px black inset;
        }
        #table {
            width: 100%;
        }
        #title {
            text-align: center;
            color: rgb(214, 217, 59);
            font-size: 23px;
            letter-spacing: 0.1em;
            text-shadow: 0 -1px 0 rgb(255, 229, 128), 0 1px 0 rgb(46, 46, 46), 0 2px 0 rgb(44, 44, 44), 0 3px 0 rgb(42, 42, 42), 0 4px 0 rgb(40, 40, 40), 0 5px 0 rgb(38, 38, 38), 0 6px 0 rgb(36, 36, 36), 0 7px 0 rgb(34, 34, 34), 0 8px 0 rgb(32, 32, 32), 0 9px 0 rgb(30, 30, 30), 0 10px 0 rgb(28, 28, 28), 0 11px 0 rgb(26, 26, 26), 0 12px 0 rgb(24, 24, 24), 0 13px 0 rgb(22, 22, 22), 0 14px 0 rgb(20, 20, 20), 0 15px 0 rgb(18, 18, 18), 0 22px 30px rgba(0, 0, 0, 0.9);
            font-weight: 100;
            font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
            text-transform: uppercase;
            text-rendering: optimizeLegibility;
        }
        #controlsStart {
            text-align: center;
        }
        #inputOpen, #inputSend {
            display: block;
        }
		
		 #inputOpen2, #inputSend {
            display: block;
        }
		
        #inputOpen {
            transition: all 0.3s;
            margin: 8px auto;
            padding: 0 12px;
            height: 32px;
            cursor: pointer;
            color: white;
            border: 0 none;
            border-radius: 4px;
            box-shadow: 3px 3px rgb(27, 72, 157);
            background-color: rgb(0, 88, 255);
        }
		
		 #inputOpen2 {
            transition: all 0.3s;
            margin: 8px auto;
            padding: 0 12px;
            height: 32px;
            cursor: pointer;
            color: white;
			    width: 140px;
            border: 0 none;
            border-radius: 4px;
            box-shadow: 3px 3px rgb(27, 72, 157);
            background-color: rgb(0, 88, 255);
        }
		
        #inputSend {
            transition: all 0.3s;
            margin: 8px auto;
            padding: 0 12px;
            height: 32px;
            cursor: pointer;
            color: rgb(255, 255, 255);
            border: 0 none;
            border-radius: 4px;
            box-shadow: 3px 3px rgb(34, 115, 17);
            background-color: rgb(94, 187, 1);
        }
        #inputOpen:active, #inputSend:active {
            box-shadow: 0px 0px rgb(27, 72, 157);
            transform: translate(3px, 3px);
        }
		
		 #inputOpen2:active, #inputSend:active {
            box-shadow: 0px 0px rgb(27, 72, 157);
            transform: translate(3px, 3px);
        }
		
        #pVal1, #pVal2 {
            margin-top: 8px;
            font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
            text-align: center;
            color: white;
        }
        .progressBox {
            position: relative;
            width: 100%;
            max-width: 320px;
            height: 24px;
            overflow: hidden;
            border: 2px solid gray;
            border: 2px solid rgb(221, 231, 255);
            background-color: rgb(234, 242, 251);
            box-sizing: border-box;
        }
        .progressBox {
            border: 2px solid rgb(14, 45, 45);
            box-shadow: 0 0 7px rgba(0, 0, 0, 0.24), 0 0 1px white inset;
            background-color: rgb(43, 51, 60);
            border-radius: 4px;
            overflow: hidden;
            box-sizing: border-box;
            padding: 2px;
            margin: 5px auto;
        }
        .progressBar {
            float: left;
            transition: all 0.3s;
            position: relative;
            width: 0%;
            max-width: 100%;
            height: 100%;
            border-radius: 2px;
            box-shadow: 3px 0px 35px 6px rgb(127, 207, 255);

            /*background-color: green;*/
            box-sizing: border-box;

            /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#a9e4f7+0,0fb4e7+100;Ble+3D+%235 */
            background: rgb(169,228,247); /* Old browsers */
            background: -moz-linear-gradient(top,  rgba(169,228,247,1) 0%, rgba(15,180,231,1) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top,  rgba(169,228,247,1) 0%,rgba(15,180,231,1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom,  rgba(169,228,247,1) 0%,rgba(15,180,231,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a9e4f7', endColorstr='#0fb4e7',GradientType=0 ); /* IE6-9 */

        }

        #emailContentHead {
            margin: 0px auto 8px;
            margin-top: 18px;
            padding: 4px;
            max-width: 420px;
            text-align: center;
            border: 2px solid rgb(21, 21, 21);
            box-shadow: 0 0 3px black inset;
            border-radius: 4px;
            background-image: linear-gradient(rgb(7, 23, 23), rgb(8, 17, 17));
            box-sizing: border-box;
        }
        #emailContent {
            margin: 0px auto 8px;
            max-width: 420px;
            max-height: 360px;
            min-height: 72px;
            overflow-y: scroll;
            border: 2px solid rgb(21, 21, 21);
            box-shadow: 0 0 3px black inset;
            border-radius: 4px;
            background-image: linear-gradient(rgb(7, 23, 23), rgb(8, 17, 17));
            color: white;
            padding: 12px;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        .email {
            border: 1px solid rgb(13, 38, 38);
            padding: 4px;
            box-sizing: border-box;
            margin: 4px 0;
            border-radius: 2px;
            background-color: rgb(12, 30, 30);
            font-family: verdana;
            font-size: 13px;
        }

        #controlsSend {
            display: none;
        }
    </style>
</head>
<body>
    <div id="main">
        <div id="content">
            <table id="table">
                <tr>
                    <td width="100"><img src="data:image/png;base64,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" alt=""></td>
                    <td><h2 id="title">Making Money</h2></td>
                </tr>
            </table>
        </div>
        
        <input id='inputFile' type='file' accept='text/plain' style="display: none;">
        <div id="controlsStart">
            <button id="inputOpen">Subir archivos con correos</button><a id="inputOpen2" href="formato.txt" download="formato.txt">Descargar formato</a>
            <div style="display: none;">
                <div style="text-align: center;">Cargando Emails...</div>
                <div id="pVal1">0%</div>
                <div id="pbox1" class="progressBox">
                    <div id="pbar1" class="progressBar"></div>
                </div>
            </div>
        </div>
        
        <div id="controlsSend">
            <button id="inputSend">Enviar Correos</button>
            <div style="display: none;">
                <div style="text-align: center;">Enviando Correos...</div>
                <div id="pVal2">0%</div>
                <div id="pbox2" class="progressBox">
                    <div id="pbar2" class="progressBar"></div>
                </div>
            </div>
        </div>


        <div id="emailContentHead">0</div>
        <div id="emailContent"></div>

    </div>
    
    <script>
        var list = {};
        var emails = [];
        var element = pbar1;
        const sleep = (...a) => (new Promise(r => setTimeout(r, a[0] || 0x3e8 / 0x3c)));

        async function step(){
            var width = (Math.ceil(this.Counter))+'%';
            try{
                if(element.id == 'pbar1'){
                    pVal1.innerText = width;
                }else
                if(element.id == 'pbar2'){
                    pVal2.innerText = width;
                }
            }catch(ex){}
            $(element).css({width: width})
        }
        async function complete(){
            console.log('Complete!');
        }

        function openFile(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = async function(){
                var text = reader.result;
                await parse(reader.result);
            };
            reader.readAsText(input.files[0]);
        };

        async function parse(text){
            element = pbar1;
            $(element).stop().css({width: '0%'});
            setTimeout(async() => {
                $(inputOpen).hide(500);
                $(element).parent().parent().show(500);
                var lines = [].slice.call(text.split(/\n/i));
                var line = null;
                var div = null;
                var porcent = 0;
                var l = lines.length;
                var i = 0;
                while(i < l){
                    line = (lines[i].trim().split(':',2)||['',''])[0].trim().replace(/\s|\s+/gi,'');
                    if((/((.*)\@(.*)\.(.*))/i).test(line) && document.querySelector('.email[value="'+line+'"]') == null){
                        list[line] = line;
                        div = document.createElement('div');
                        div.className = 'email';
                        div.setAttribute('value', line);
                        div.style = 'display: none;';
                        div.innerText = line;
                        $(emailContent).prepend(div);
                        $(div).show(50);
                        emailContentHead.innerText = (emails = Object.values(list)).length;
                    }
                    porcent = Math.ceil((i / l) * 100);
                    await new Promise(R => {
                        jQuery(element).animate({ Counter: porcent }, {duration: 1, easing: 'linear', step: async function(){
                            await step.apply(this, []);
                            R();
                        }});
                    });
                    i++;
                }
                $(element).stop().css({width: '100%'});
                pVal1.innerText = '100%';
                emails = Object.values(list);
                if(emails.length > 0){
                    setTimeout(() => {
                        $(controlsStart).hide(500);
                        $(controlsSend).show(500);
                    }, 1000);
                }
            }, 1000);
        }

        async function send(){
            element = pbar2;
            $(inputSend).hide(500);
            $(element).parent().parent().show(500);

            var porcent = 0;
            var all = [].slice.call(document.querySelectorAll('.email[value]'));
            var email = null;
            var div = null;
            var l = all.length;
            var i = 0;

            //console.log('all:',all);

            while(i < l){
                div = all[i];
                email = div.innerText;
                try{
                    await new Promise(R => {
                        try{
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', 'index.php?email='+email, true);
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4) {
                                    try{
                                        var text = xhr.responseText;
                                        //console.log(text);
                                    }catch(ex){}
                                    R();
                                }
                            };
                            xhr.send(null);
                        }catch(ex){
                            R();
                        }
                    });
                }catch(ex){}
                
                porcent = Math.ceil((i / l) * 100);

                await new Promise(R => {
                    jQuery(element).animate({ Counter: porcent }, {duration: 1, easing: 'linear', step: async function(){
                        await step.apply(this, []);
                        //console.log('email:',email);
                        R();
                    }});
                });

                try{
                    $(div).hide(50);
                    await sleep(50);
                    div.parentNode.removeChild(div);
                    emailContent.scrollTop = 0;
                }catch(ex){}

                //await sleep(1);
                i++;
            }
            
            await sleep(500);

            $(element).stop().css({width: '100%'});
            $(pVal2).text('100%');
        }

        inputFile.onchange = openFile;
        inputOpen.onclick = () => setTimeout(inputFile.click(), 1500);
        try{
           inputSend.onclick = () => setTimeout(async function(){
               await send();
            }, 1500); 
        }catch(ex){console.log(ex)}
        

    </script>
</body>
</html>
