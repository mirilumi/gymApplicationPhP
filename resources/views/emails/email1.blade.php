<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style type="text/css">

        body{
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }

        @media screen and (max-width: 550px){
            table[class="responsive-table"]{
                width: 100% !important;
                padding: 10px 5%;
            }

            table[class="responsive-table2"]{
                width: 100% !important;
                padding: 10px 5%;
            }

            img[class="responsive-image"]{
                width: 100% !important;
                height: auto !important;
            }

            td[class="headline"]{
                font-size: 18px !important;
                background: #3498db;
                color: #ffffff;
                padding-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td align="center">

            <table width="550px" cellspacing="0" cellpadding="0" border="0" class="responsive-table" >
                <tr>
                    <td style="font-size: 20px;color: #000000; border-top: 3px solid #333; padding-top: 10px; padding-bottom: 5px;"><b>Maestro Del Fitness</b></td>
                </tr>
                <tr>
                    <td style="padding-bottom: 15px; color: #666;"><center><strong>Grazie per aver completato il tuo Acquisto!</strong></center></td>
                </tr>
                <tr>
                    <td>
                        <a href="https://mailchi.mp/da7deb30def6/newslettermaestrodelfitness">
                            <img src="http://www.maestrodelfitness.com/EmailMDF.png" style="width:550px;"  alt="" class="responsive-image"/>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px 5%;">
                        <div>
                            <div style=" font-family:Tahoma, Geneva, sans-serif"><span>Salve: </span> {{$name }}</div>
                            <div style=" font-family:Tahoma, Geneva, sans-serif"><span>Residente: </span> {{$indirrizio}}</div>
                            <div style=" font-family:Tahoma, Geneva, sans-serif">Grazie per aver Acquistato su Maestro del Fitness e aver accettato i nostri Termini e Condizioni. </div>
                            <div style=" font-family:Tahoma, Geneva, sans-serif"><span>Dettagli Acquisto: </span> {{$purchase}}</div>
                            <div style=" font-family:Tahoma, Geneva, sans-serif"><span>Prezzo: </span>&euro; {{$payment}}</div>
                            <div style=" font-family:Tahoma, Geneva, sans-serif"><span>Il giorno: </span>  {{$date_purchase->format('d/m/Y H:m:s')}}</div>
                            <div style=" font-family:Tahoma, Geneva, sans-serif">Siamo felici tu abbia deciso di iniziare il tuo Percorso con Maestro del Fitness.</div>
                        </div>
                    </td>
                </tr><br/>
                <table max-width="550" align="center"  border="0" cellpadding="0" cellspacing="0" >
                    <tbody>
                    <tr>
                        <td width="200" align="center" valign="middle" height="40" style="background-color:#000000; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:18px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 400; padding-left:18px; padding-right:18px;">
                            <span style="color: #ffffff; font-weight: 300;">
                                <a style="color: #ffffff; text-align:center;text-decoration: none;" href="https://goo.gl/forms/zdIuvU2yit45JMy22">Clicca qui e Completa l'accesso al portale!</a>
                                <p>
                            </span>
                        </td>
                    </tr>
                    </tbody>
                </table> <br/><br/><h2 style="text-align: center; color: #000000;">&nbsp;</h2>Il tuo accesso sarà presto Autenticato!</h2>
                <table width="550px" align="center" cellspasing="0" cellpadding="0" border="0" class="responsive-table2">
                    <tr>
                        <td align="center" bgcolor="#ececec" style="padding:10px 5%; font-size:12px; border-top: 3px solid #000000;">Questa Mail è la conferma di acquisto. Ti preghiamo di compilare il tuo Questionario nei minimi dettagli.
                            Qualora volessi più informazioni sul servizio scrivi a <a style="color:#353f8e; font-family: Arial, Helvetica, sans-serif; font-size: 12px;" href="mailto:info@maestrodelfitness.com">info@maestrodelfitness.com</a> ti risponderemo nel più breve tempo possibile.Ti ricordiamo che le transazioni avvengono tramite piattaforme di pagamento online 100% sicure.  Se pensi ci sia qualcosa di importante di cui dovremmo essere al corrente ti preghiamo di farcelo sapere.
                            NOTA BENE Il Programma Personalizzato viene creato in 48 ore e avrai una LiveChat per contattare i nostri Trainer che ti supporteranno in tutto il percorso. Ti ricordiamo che se hai completato l’ordine hai precedentemente confermato di aver preso visione dell’informativa e dei Termini e Condizioni di vendita riguardanti il servizio venduto da maestrodelfitness.com
                            <a style="color:#353f8e; font-family: Arial, Helvetica, sans-serif; font-size: 12px;" href="http://www.maestrodelfitness.com/Ufficiale/TC/">Visualizza Qui</a>
                        </td>
                    </tr>
                </table>
            </table>
</body>
</html>