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
$pdf->AddPage('L');

// create some HTML content
$html = '
<br>
<br>
<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
	<tr style="width: 100%;">
		<td style="border-bottom:1px solid #EFEFEF;text-align:left;width:190px;"><img src="' . dirname(__FILE__) . '/../../img/logo.png" alt=""></td>
		<td style="border-bottom:1px solid #EFEFEF;width: 500px;line-height: 1.6;text-align:left;font-size: 12px;margin:0;padding:0;">Адрес отдела продаж: 630120, г. Новосибирск, ул. Связистов, 17<br>E-mail: 2996616@nskgs.ru<br>Режим работы: с 8:00 до 17:00 (Выходной: Сб, Вс). Обед: с 12:00 до 13:00<br></td>
		<td style="border-bottom:1px solid #EFEFEF;width: 300px;text-align:center;line-height: 1;" valign="top"><p style="line-height: 1;text-align:right;font-size: 24px;margin:0;padding:0;font-weight: bold;"><span style="line-height: 1;text-align:right;font-size: 14px;margin:0;padding:0;color: #ff7900;">Телефон отдела продаж: </span><br>(383) 299-66-16</p></td>
	</tr>
	<tr style="margin:0;padding:0;">
		<td style="text-align:center; width: 20%;">
			<p style=" font-size: 16px;"><span style=" color: #ff7900; font-size: 40px; font-weight: bold; display: block;">'.$_GET["currentHouse"].'</span><br>ДОМ</p>
		</td>
		<td style="text-align:center;line-height: 1;margin:0;padding:0; width: 60%;">
			<h1 style="color: #242424; text-transform: uppercase; font-size: 25px; font-weight: bolder;line-height: 2;margin:0;padding:0;">Дом №'.$_GET["currentHouse"].'</h1>
			<h2 style="text-transform: uppercase; font-weight: lighter;color: #242424; font-size: 20px;line-height: 0.2;margin:0;padding:0;">ПОДЪЕЗД '.$_GET["currentEntry"].'</h2>
		</td>
		<td style="text-align:center; width: 20%;">
			<p style=" font-size: 16px;"><span style=" color: #ff7900; font-size: 40px; font-weight: bold; display: block;">'.$_GET["currentFloor"].'</span><br>ЭТАЖ</p>
		</td>
	</tr>
	<tr>
		<td valign="bottom" style=" width: 15%;">
		</td>
		<td style="text-align:center; width: 70%;">
			<br><br>
			<img width="" height="450" src="' . dirname(__FILE__) . '/../../' . $_GET["currentPicture"] . '" alt="">
		</td>
		<td valign="bottom" style=" width: 15%;">
		</td>
	</tr>
</table>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

// add a page
$pdf->AddPage('L');

if (empty($_GET["rooms"])) {
	$rooms = '<span style=" color: #242424; font-size: 25px; text-align: right; text-transform: uppercase; font-weight: bolder;"></span><br>СТУДИЯ<br>';
} else {
	$rooms = '<span style=" color: #242424; font-size: 25px; text-align: right; text-transform: uppercase; font-weight: bolder;">'.$_GET["rooms"].'</span><br>КОМНАТНАЯ<br>';
}

if (!empty($_GET["sale"]) && $_GET["sale"] != "0") {
	$sale = '<br><span style=" color: #ff7900; font-size: 25px; text-align: right; text-transform: uppercase; font-weight: bolder;">'.$_GET["sale"].'</span><br>СКИДКА, РУБ.';
	$sale_sub = 'СО СКИДКОЙ';
} else {
	$sale = '';
	$sale_sub = '';
}

// create some HTML content
// $html = file_get_contents('pdf.html', false);
$html = '
<br>
<br>
<table style="width: 100%;" border="0" cellpadding="0" cellspacing="0">
	<tr style="width: 100%;">
		<td style="border-bottom:1px solid #EFEFEF;text-align:left;width:190px;"><img src="' . dirname(__FILE__) . '/../../img/logo.png" alt=""></td>
		<td style="border-bottom:1px solid #EFEFEF;width: 500px;line-height: 1.6;text-align:left;font-size: 12px;margin:0;padding:0;">Адрес отдела продаж: 630120, г. Новосибирск, ул. Связистов, 17<br>E-mail: 2996616@nskgs.ru<br>Режим работы: с 8:00 до 17:00 (Выходной: Сб, Вс). Обед: с 12:00 до 13:00<br></td>
		<td style="border-bottom:1px solid #EFEFEF;width: 300px;text-align:center;line-height: 1;" valign="top"><p style="line-height: 1;text-align:right;font-size: 24px;margin:0;padding:0;font-weight: bold;"><span style="line-height: 1;text-align:right;font-size: 14px;margin:0;padding:0;color: #ff7900;">Телефон отдела продаж: </span><br>(383) 299-66-16</p></td>
	</tr>
	<tr style="margin:0;padding:0;">
		<td style="text-align:center; width: 20%;">
			<p style=" font-size: 16px;"><span style=" color: #ff7900; font-size: 40px; font-weight: bold; display: block;">'.$_GET["currentHouse"].'</span><br>ДОМ</p>
		</td>
		<td style="text-align:center;line-height: 1;margin:0;padding:0; width: 60%;">
			<h1 style="color: #242424; text-transform: uppercase; font-size: 25px; font-weight: bolder;line-height: 2;margin:0;padding:0;">Квартира №'.$_GET["n_kv"].'</h1>
			<h2 style="text-transform: uppercase; font-weight: lighter;color: #242424; font-size: 20px;line-height: 0.2;margin:0;padding:0;">ПОДЪЕЗД '.$_GET["currentEntry"].'</h2>
		</td>
		<td style="text-align:center; width: 20%;">
			<p style=" font-size: 16px;"><span style=" color: #ff7900; font-size: 40px; font-weight: bold; display: block;">'.$_GET["currentFloor"].'</span><br>ЭТАЖ</p>
		</td>
	</tr>
	<tr>
		<td valign="bottom" style=" width: 15%;">
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<table style="width: 270px; border: 1px solid #acacac; border-radius: 7px; padding: 10px;" border="0" cellpadding="5" cellspacing="0">
				<tr style="margin:0;padding:0;">
					<td style="margin:0;padding:0; line-height: 1; color: #242424; font-size: 10px; text-align: left; font-weight: bolder;">Площадь жилая</td>
					<td style="margin:0;padding:0; line-height: 1; color: #242424; font-size: 10px; text-align: right; font-weight: lighter;">'.$_GET["area_live"].'</td>
				</tr>
				<tr style="margin:0;padding:0;">
					<td style="margin:0;padding:0; line-height: 1; color: #242424; font-size: 10px; text-align: left; font-weight: bolder;">Площадь кухни</td>
					<td style="margin:0;padding:0; line-height: 1; color: #242424; font-size: 10px; text-align: right; font-weight: lighter;">'.$_GET["area_kitchen"].'</td>
				</tr>
				<tr style="margin:0;padding:0;">
					<td style="margin:0;padding:0; line-height: 1; color: #242424; font-size: 10px; text-align: left; font-weight: bolder;">Площадь лоджии</td>
					<td style="margin:0;padding:0; line-height: 1; color: #242424; font-size: 10px; text-align: right; font-weight: lighter;">'.$_GET["area_loggia"].'</td>
				</tr>
				<tr style="margin:0;padding:0;">
					<td style="margin:0;padding:0; line-height: 1; color: #242424; font-size: 10px; text-align: left; font-weight: bolder;">Цена 1 кв.м.</td>
					<td style="margin:0;padding:0; line-height: 1; color: #242424; font-size: 10px; text-align: right; font-weight: lighter;">'.$_GET["price_kvm"].'</td>
				</tr>
			</table>
		</td>
		<td style="text-align:center; width: 70%;">
			<img width="960" src="' . dirname(__FILE__) . '/../../' . $_GET["kv_img"] . '" alt="">
		</td>
		<td valign="bottom" style=" width: 15%;">
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<p style=" color: #242424; font-size: 14px; text-align: right; text-transform: uppercase;">'.$rooms.'<span style=" color: #242424; font-size: 25px; text-align: right; text-transform: uppercase; font-weight: bolder;">'.$_GET["area_full"].'</span><br>ПЛОЩАДЬ, КВ.М.<br><span style=" color: #242424; font-size: 25px; text-align: right; text-transform: uppercase; font-weight: bolder;">'.$_GET["sale_price"].'</span><br>СТОИМОСТЬ '.$sale_sub.', РУБ.'.$sale.'</p>
		</td>
	</tr>
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