<?php

require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetTopMargin(2);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/tcpdf/lang/rus.php')) {
    require_once(dirname(__FILE__).'/tcpdf/lang/rus.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
// $fontname = $pdf->addTTFfont('/../../fonts/HelveticaNeueCyr-Roman.ttf', 'TrueTypeUnicode', '', 32);
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// create some HTML content
$html = '

<table style="width: 900px;" border="0" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<table>
				<tbody>
					<tr style="width: 900px; padding-top: 20px;">
						<td style="border-bottom:1px solid #0069c7;text-align:left;width:250px;">
						<br><br><img src="' . dirname(__FILE__) . '/img/logo.jpg" width="150px" alt=""></td>
						<td style="border-bottom:1px solid #0069c7;width: 400px;line-height: 1.3;text-align:left;font-size: 11px;margin:0;padding:0;"><br><br>Адрес отдела продаж: г. Новосибирск, ул. Дунаевского, 3<br>Адрес дома: г.Новосибирск, Красный проспект, 163/6
							<p style="text-align: left; font-size: 24px; margin:0;padding:0; line-height: 1; color: #0069c7; ">
							+7 (383) 274-23-43 <br></p>
						</td>		
					</tr>
					<tr style="width: 900px;">
						<td valign="top">
							<table width="250px" border="0" cellpadding="0" cellspacing="0" style="padding: 100px 30px 10px;">
								<tr>
									<td style="padding-top: 25px;">
										<br><br>
										<p style="text-align: center; font-size: 24px; margin:0;padding:0; line-height: 1;">
										'. $_GET['rooms'] . '<br>
										<span style="text-align: center; font-size: 14px;margin:0;padding:0; line-height: 1;">комнат</span></p>
									</td>
								</tr>
								<tr>
									<td style="padding-top: 5px;">
										<p style="text-align: center; font-size: 24px;margin:0;padding:0; line-height: 1;">
										'. $_GET['afull'] . '<br>
										<span style="text-align: center; font-size: 14px;margin:0;padding:0; line-height: 1;">площадь кв.м.</span></p>
									</td>									
								</tr>
								<tr>
									<td style="padding-top: 5px;">
										<p style="text-align: center; font-size: 24px;margin:0;padding:0; line-height: 1;">
										'. $_GET['price'] .'<br>
										<span style="text-align: center; font-size: 14px;margin:0;padding:0; line-height: 1;">стоимость, руб.</span></p>
									</td>									
								</tr>
							</table>


							<table width="250px;" style="padding: 30px 10px 10px;" border="0" cellpadding="5" cellspacing="0">
								<tr style="margin:0;padding:0;">
									<td style="margin:0;padding:0; line-height: 2; color: #2d2d2d; font-size: 11px; text-align: left; border-bottom: 1px solid #2d2d2d;"><br><br><br>Площадь общая</td>
									<td style="margin:0;padding:0; line-height: 2; color: #2d2d2d; font-size: 11px; text-align: right; border-bottom: 1px solid #2d2d2d;"><br><br><br>
									'. $_GET['afull'] . ' кв.м</td>
								</tr>
								<tr style="margin:0;padding:0;">
									<td style="margin:0;padding:0; line-height: 2; color: #2d2d2d; font-size: 11px; text-align: left; border-bottom: 1px solid #2d2d2d;">Площадь жилая</td>
									<td style="margin:0;padding:0; line-height: 2; color: #2d2d2d; font-size: 11px; text-align: right;border-bottom: 1px solid #2d2d2d;">
									'. $_GET['akitchen'] . ' кв.м</td>
								</tr>
								<tr style="margin:0;padding:0;">
									<td style="margin:0;padding:0; line-height: 2; color: #2d2d2d; font-size: 11px; text-align: left; border-bottom: 1px solid #2d2d2d;">Площадь кухни</td>
									<td style="margin:0;padding:0; line-height: 2; color: #2d2d2d; font-size: 11px; text-align: right;border-bottom: 1px solid #2d2d2d;">
									'. $_GET['akitchen'] . ' кв.м</td>
								</tr>
								<tr style="margin:0;padding:0;">
									<td style="margin:0;padding:0; line-height: 2; color: #2d2d2d; font-size: 11px; text-align: left;border-bottom: 1px solid #2d2d2d;">Площадь лоджии</td>
									<td style="margin:0;padding:0; line-height: 2; color: #2d2d2d; font-size: 11px; text-align: right; border-bottom: 1px solid #2d2d2d;">
									'. $_GET['abalcony'] . ' кв.м</td>
								</tr>
								<tr style="margin:0;padding:0;">
									<td style="margin:0;padding:0; line-height: 2; color: #2d2d2d; font-size: 11px; text-align: left;  border-bottom: 1px solid #2d2d2d;">
									Санузел</td>
									<td style="margin:0;padding:0; line-height: 2; color: #2d2d2d; font-size: 11px; text-align: right;  border-bottom: 1px solid #2d2d2d;">'. $_GET['bathroom'] . ' кв.м</td>
								</tr>
							</table>
						</td>
						<td valign="top" style="text-align: center;">
							<p style="text-align: center; color: #2d2d2d; text-transform: uppercase; font-size: 25px; font-weight: bolder;line-height: 2;margin:0;padding:0;">Квартира № '. $_GET['nkv'] . '<br><span style=" text-align: center; font-size: 25px; font-weight: bolder; color:  #0069c7; padding: 0; margin: 0;">'. $_GET['nfl'] . ' этаж</span></p>
							<img width="259" src="' . dirname(__FILE__) ."/img/plan/aparts/" . $_GET['ikv']. '" alt="" style="display: block; margin: 20px auto 0;">
						</td>
					</tr>					
				</tbody>
			</table>
		</tr>

		<tr>
			<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td style="text-align: center;">
						<br>
							<h1 style="text-align: center; color: #2d2d2d; text-transform: uppercase; font-size: 25px; font-weight: bolder;line-height: 2;margin:0;padding: 0 0 30px 0;">План этажа:</h1>
							<img width="500" src="' . dirname(__FILE__)  . "/" . $_GET['ifl'] .'" alt="" style="display: block; margin: 0 auto;">
						</td>
					</tr>
				</tbody>
			</table>
		</tr>
	</tbody>
	
</table>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
// $pdf->Output('pdf.pdf', 'D');


if ( !isset($_GET["email"]) ) {
	echo $pdf->Output('pdf.pdf', 'I');
} else {
	
}

//============================================================+
// END OF FILE
//============================================================+