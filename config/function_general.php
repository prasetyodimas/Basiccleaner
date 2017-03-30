<?php date_default_timezone_set('Asia/jakarta');
//kode booking
function acakangkahuruf($panjang){
	$karakter ='12345678910';
	$string ='';
	for ($i=0; $i<$panjang; $i++) { 
		$pos = rand(0,strlen($karakter)- 1);
		$string .= $karakter{$pos};
	}
	return $string;
}
//fungsi date tanggal sekarang format (Y-m-d)
function datenow($tanggal_now){
   $tanggal_now   = date('Y-m-d');
   $konvert_date  = substr($tanggal_now, 8, 2);
   $konvert_month = getbulan(substr($tanggal_now, 5, 2));
   $konvert_year  = substr($tanggal_now, 0, 4);
   $fix_date = $konvert_date.' '.$konvert_month.' '.$konvert_year;
   return $fix_date;
}
//fungsi get tanggal indo (day - month - year)
function tgl_indo($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan   = getBulan(substr($tgl,5,2));
    $tahun   = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;
}
//fungsi get bulan
function getBulan($bln){
    switch ($bln){
        case 1:
            return "Jan";
        break;
        case 2:
            return "Feb";
        break;
        case 3:
            return "Mar";
        break;
        case 4:
            return "April";
        break;
        case 5:
            return "Mei";
        break;
        case 6:
            return "Juni";
        break;
        case 7:
            return "Juli";
        break;
        case 8:
            return "August";
        break;
        case 9:
            return "Sept";
        break;
        case 10:
            return "Okto";
        break;
        case 11:
            return "Nov";
        break;
        case 12:
            return "Des";
    break;
    }
}
function stat_pengambilan($argue){
    if ($argue =='B') {
        $show_status ='Belum Diambil';  
    }elseif ($argue =='S') {
        $show_status ='Sudah Diambil';  
    }
    return $show_status;
}
function status_level($arg){
    if ($arg=='N') {
        $msg = 'Tidak';
    }elseif ($arg=='Y') {
        $msg = 'Ya';
    }
    return $msg;
}
 //function get tanggal 
function adding_days($days){
    $execute = substr($days, 8)+3;
    return $execute;
}
function split_month_year($var_month_year){
    $split_date = substr($var_month_year, 0,8);
    return $split_date;
}
//function remove date
function get_days_and_week($day_month_year){
    $execute = substr($day_month_year, 0,8);
}
/* function format uang Rp */
function formatuang($nilai_matauang){
    $var = number_format($nilai_matauang,0,",",".").',-';
    return $var;
}
/*function remove tags */
function removetags($val){
    $remove = strip_tags($val);
    return $remove;
}
/* this function remove / slases */
function removeStripslases($var){
    $act = stripslashes($var);
    return $act;
}
function preg_trim( $string, $pattern ) {
    $pattern = array( "/^" . $pattern . "*/", "/" . $pattern . "*$/" );
    return preg_replace( $pattern, "", $string );
    //output place echo preg_trim(variable, "[^a-zA-Z]");
}
function GetYear($vardate){
    $vardate = date("Y");
    return $vardate;
}
?>
<!-- function onkeyup in input text Rp... -->
<script type="text/javascript">
    function formatCurrency(num) {
        num = num.toString().replace(/\$|\,/g,'');
        if(isNaN(num))
            num = "0";
            sign = (num == (num = Math.abs(num)));
            num = Math.floor(num*100+0.50000000001);
            cents = num%100;
            num = Math.floor(num/100).toString();
            
            if(cents<10)
                cents = "0" + cents;
                for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
                num = num.substring(0,num.length-(4*i+3))+'.'+
                num.substring(num.length-(4*i+3));

            return (((sign)?'':'-') + 'Rp' + num + ',' + '-'); //removes ,00 at behind currency
           /* return (((sign)?'':'-') + 'Rp' + num + ',' + cents);*/ // add ,00 at behind currency    
    }
</script>
