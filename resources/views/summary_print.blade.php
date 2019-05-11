<!<doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>BILL SUMMARY FORM</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
	.errorinfo{
		background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
		color:red;
		padding:10px;
		text-align:center;
	}
    </style>
</head>
 <?php 
 
     $description="";     
     $name="";
     $IMSNO="";
 ?>
 @if(!$bilsums->isEmpty())
 @foreach($bilsums as $key)
 <?php 
  $description=$key->description;    
  $name=$key->FirstName.' '.$key->LastName; 
  $FirstName=$key->FirstName; 
  $IMSNO=$key->IMSNO; 
  $Country=$key->Country; 
  ?>
 @endforeach
 @else
	 
    <div class="errorinfo">Your Bill Summary Data is not Complete! , Kindly Go back and finish the Bill Creation</div>
	<?php return false; ?>
 @endif
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr> 
                            <td  style="text-align:center;">
                               INTERNATIONAL MISSIONARY BENEFIT SOCIETY<br>
                                KENYA CONFERENCE OF CATHOLIC BISHOPS<br>
                                <b>West Wing Chiromo Road Westlands-P.O. Box 13475-00800 NAIROBI</b>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                GROUP NO.8023<br>
                                GROUPNAME:CONSOLATA MISSIONARIES<br>                               
                            </td>
                            
                            <td>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> 
			<tr class="">
                <td colspan="3">
                    <table>
                        <tr>						   
                            <td style="text-align:center;">
                                <b>BILL SUMMARY FORM</b><br>
                                (tO be sent to your section)<br>                               
                            </td>
                            
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="">
                <td colspan="3">
                    <table>
                        <tr>						   
                            <td style="text-align:center;">
                                                              
                            </td>
                             <td >
                                <span style="Border:1px solid #000000;Border-radius:5px;padding:10px"><b>I.M.S Member No. {{ $IMSNO }}</b></span><br>                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
			<tr class="">
                <td colspan="3">
                    <table>
                        <tr>						   
                            <td >
                                NAME: {{ $name }}<br>                                                       
                                SURNAME:{{ $FirstName }}<br>                                                       
                                OPTION: 4<br>                                                       
                                COUNTRY OF CURE:{{ $Country }}<br>                                                       
                            </td>
                            
                        </tr>
                    </table>
                </td>
				
            </tr>
            <tr class="heading">
                <td style="text-align:center;border-right:1px solid #000000;border-top:1px solid #000000;border-left:1px solid #000000;">
                   DATE OF BILL
                </td>
                
                <td style="text-align:center;border-right:1px solid #000000;border-top:1px solid #000000;">
                    BILLS (Details)
                </td >
				<td style="text-align:center;border-right:1px solid #000000;border-top:1px solid #000000;">
                    Amount(KSH)
				</td>
            </tr>
			<?php 
			  $amount=0;
			?>
            @foreach($allbills as $key)
			<?php  
               $amount=$key->billamount+$amount;
			?>
            <tr>
                <td style="border-right:1px solid #000000;border-top:1px solid #000000;border-left:1px solid #000000;border-bottom:1px solid #000000;text-align:left;">
				   {{ date('d/m/Y',strtotime($key->billdate)) }}
                </td>
				<td style="border-right:1px solid #000000;border-top:1px solid #000000;border-bottom:1px solid #000000;text-align:left;">
                   {{ $key->billdetail }}
                </td>
                
                <td style="border-right:1px solid #000000;border-top:1px solid #000000;border-bottom:1px solid #000000;text-align:right;">
                    {{ number_format($key->billamount,2) }}
                </td>
            </tr>
             @endforeach
            <tr class="total">
                <td style="border-right:1px solid #000000;border-left:1px solid #000000;border-bottom:1px solid #000000">
                    &nbsp;
                </td>
                
                <td style="border-right:1px solid #000000;border-bottom:1px solid #000000;text-align:left;">
                    TOTAL AMOUNT
                </td>                
				
				<td style="border-right:1px solid #000000;border-bottom:1px solid #000000;text-align:right;">
				<b>{{ number_format($amount,2) }}</b>
                </td>
            </tr> 
			<tr>
                <td colspan="3" style="text-align:right;">
                    Date:<b>16th November 2018</b>  Group Managers Name :<b>Br.Clarence Lukungu, IMC</b>
					Signature.........................................................
                </td>
                
                
            </tr> 
        </table>
		  <!--- Show the uploaded invoices -->
		 @foreach($documents as $document)		
			
			<image   src="{{ asset('image/'. $document->document ) }}" ></image>
												
		   <br>
		 @endforeach
    </div>
</body>
</html>