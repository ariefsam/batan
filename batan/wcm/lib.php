<html>
<body>
<script LANGUAGE="JavaScript">
function Fconfirm(x){
  var agree=confirm(x);
  if (agree)
    return true ;
  else
    return false ;
}

function FcheckFilled(n,v){ 
  if(v==""){ alert(n+" Harus Di ISI!");return false; }
  else { return true; }
}


function FcheckMinLength(n,v,num){ 
  if(v.length<num){ alert("Jumlah Karakter Minimum "+n+" adalah "+num+"!");return false; }
  else { return true; }
}

function FcheckMaxLength(n,v,num){ 
  if(v.length>num){ alert("Jumlah Karakter Maksimum  "+n+" adalah "+num+"!");return false; }
  else { return true; }
}

function FcheckNumber(n,v){
  if((isNaN(v))||(v=="")){ alert(n+" Harus Angka!");return false; }
  else { return true; }
}

function FcheckChars(n,v,num){ 
  if(v.length>num){ alert("Jumlah karakter Maksimum Untuk "+n+" adalah "+num+"!\n"+(v.length-num)+" Kelebihan Char!");return false; }
  else { return true; }
}

function FcheckEmail(n,v){
  var a=0
  var p=0
  for(var i=1;i<v.length;i++){
    if(!v.charAt(i))return false
    else if(v.charAt(i)=='@'){a++;if(v.charAt(i+1)==''){ alert(n+" Tidak VALID!");return false; }}
    else if(v.charAt(i)=='.'){p++;if(v.charAt(i+1)==''||v.charAt(i+1)=='@'||v.charAt(i-1)=='@'){ alert(n+" Tidak VALID!");return false; }}
  }
  if(a==1&&p){ return true; }
  else { alert("Isikan " + n+" yang VALID atau biarkan KOSONG!");return false; }
}

function FcheckRadioAwal(n,v){
  var r = false;
  var i;
  for (i = 0;  i < v.length;  i++){
    if (v[i].checked)
        r = true;
  }  
  if (!r){ alert("Pilihan Pada "+n+" Belum Dipilih!");return (false); }
  else { return true; }
}

function FcheckRadio(n,v){
  var r = false;
  var i;
  if(v.length != undefined)
  { for (i = 0;  i < v.length;  i++){
    if (v[i].checked)
        r = true;
   }
  }
  else {
    if(v.checked)
    r = true;
  }
  if (!r){ alert(n+" Belum Dipilih!");return (false); }
  else { return true; }
}

function FcheckDropOne(n,v){
  if(v.selectedIndex<=0){ alert("Silakan Pilih Salah Satu Pada "+n+"!");return false; }
  else { return true; }
}

function FcheckDropMultiple(n,v,mi,ma){
  var sel = 0;
  var i;
  for (i = 0;  i < v.length;  i++){ if (v.options[i].selected) sel++; }
  
  if(mi>0){
    if (sel < mi) { alert("Minimal harus Memilih "+mi+" items untuk "+n+"!");return false; }
  }
  if(ma>0){
    if (sel > ma) { alert("Maksimal harus Memilih "+ma+" items untuk "+n+"!");return false; }
  }
   return true;
}

function FcheckBoxes(n,v,mi,ma){
  var sel = false;
  var i;
  for (i = 0;  i < v.length;  i++){ if (v[i].checked) sel++; }
  
  if(mi>0){
    if (sel < mi) { alert("Minimal harus Memilih "+mi+" items untuk "+n+"!");return false; }
  }
  if(ma>0){
    if (sel > ma) { alert("maksimal harus Memilih "+ma+" items untuk "+n+"!");return false; }
  }
   return true;
}
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else 
countfield.value = maxlimit - field.value.length;
}

var ns6=document.getElementById&&!document.all

function restrictinput(maxlength,e,placeholder){
if (window.event&&event.srcElement.value.length>=maxlength)
return false
else if (e.target&&e.target==eval(placeholder)&&e.target.value.length>=maxlength){
var pressedkey=/[a-zA-Z0-9\.\,\/]/ //detect alphanumeric keys
if (pressedkey.test(String.fromCharCode(e.which)))
e.stopPropagation()
}
}

function countlimit(maxlength,e,placeholder){
var theform=eval(placeholder)
var lengthleft=maxlength-theform.value.length
var placeholderobj=document.all? document.all[placeholder] : document.getElementById(placeholder)
if (window.event||e.target&&e.target==eval(placeholder)){
if (lengthleft<0)
theform.value=theform.value.substring(0,maxlength)
placeholderobj.innerHTML=lengthleft
}
}


function displaylimit(thename, theid, thelimit){
var theform=theid!=""? document.getElementById(theid) : thename
var limit_text='<b><font color = red><span id="'+theform.toString()+'">'+thelimit+'</span></b> Sisa Karakter </font>'
if (document.all||ns6)
document.write(limit_text)
if (document.all){
eval(theform).onkeypress=function(){ return restrictinput(thelimit,event,theform)}
eval(theform).onkeyup=function(){ countlimit(thelimit,event,theform)}
}
else if (ns6){
document.body.addEventListener('keypress', function(event) { restrictinput(thelimit,event,theform) }, true); 
document.body.addEventListener('keyup', function(event) { countlimit(thelimit,event,theform) }, true); 
}
}

function isEmail(str)
{
    var regex = /^[-_.a-z0-9]+@(([-a-z0-9]+\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|nama|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i;
    return regex.test(str);
}

function trim(str)
{
    return str.replace(/^\s+|\s+$/g,"");
}

</script>
<?php
function generate_pagination($base_url, $num_items, $per_page, $start_item, $add_prevnext_text = TRUE) {
    $total_pages = ceil($num_items/$per_page);
    if ( $total_pages == 1 ) {
        return "";
    }
    $on_page = floor($start_item / $per_page) + 1;
    $page_string = "";
    if ( $total_pages > 10 ) {
        $init_page_max = ( $total_pages > 3 ) ? 3 : $total_pages;
        for($i = 1; $i < $init_page_max + 1; $i++) {
            $page_string .= ( $i == $on_page ) ? "<b>" . $i . "</b>" : "<a href=\"$base_url&amp;start=" . ( ( $i - 1 ) * $per_page )  . "\">" . $i . "</a>";
            if ( $i <  $init_page_max ) {
                $page_string .= ", ";
            }
        }
        if ( $total_pages > 3 ) {
            if ( $on_page > 1  && $on_page < $total_pages ) {
                $page_string .= ( $on_page > 5 ) ? " ... " : ", ";
                $init_page_min = ( $on_page > 4 ) ? $on_page : 5;
                $init_page_max = ( $on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;

                for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++) {
                    $page_string .= ($i == $on_page) ? "<b>" . $i . "</b>" : "<a href=\"$base_url&amp;start=" . ( ( $i - 1 ) * $per_page )  . "\">" . $i . "</a>";
                    if ( $i <  $init_page_max + 1 ) {
                        $page_string .= ", ";
                    }
                }
                $page_string .= ( $on_page < $total_pages - 4 ) ? " ... " : ", ";
            } 
            else {
                $page_string .= " ... ";
            }
            for($i = $total_pages - 2; $i < $total_pages + 1; $i++) {
                $page_string .= ( $i == $on_page ) ? "<b>" . $i . "</b>"  : "<a href=\"$base_url&amp;start=" . ( ( $i - 1 ) * $per_page )  . "\">" . $i . "</a>";
                if( $i <  $total_pages ) {
                    $page_string .= ", ";
                }
            }
        }
    }
    else {
        for($i = 1; $i < $total_pages + 1; $i++) {
            $page_string .= ( $i == $on_page ) ? "<b>" . $i . "</b>" : "<a href=\"$base_url&amp;start=" . ( ( $i - 1 ) * $per_page )  . "\">" . $i . "</a>";
            if ( $i <  $total_pages ) {
                $page_string .= ", ";
            }
        }
    }
    if ( $add_prevnext_text ) {
        if ( $on_page > 1 ) {
            $page_string = " <a href=\"$base_url&amp;start=" . ( ( $on_page - 2 ) * $per_page )  . "\">Prev</a>&nbsp;&nbsp;" . $page_string;
        }

        if ( $on_page < $total_pages ) {
            $page_string .= "&nbsp;&nbsp;<a href=\"$base_url&amp;start=" . ( $on_page * $per_page )  . "\">Next</a>";
        }
    }

    $page_string = "Link Halaman:&nbsp&nbsp" . $page_string;
    return $page_string;
}




function smile($message) { 
   if ($getsmiles = mysql_query("SELECT *, length(code) as length FROM forum_smile ORDER BY length DESC")) { 
      while ($smiles = mysql_fetch_array($getsmiles)) { 
                        $smile_code = preg_quote($smiles[code]); 
                        $smile_code = str_replace('/', '//', $smile_code); 
                        $message = preg_replace("/$smile_code/si", '\1<IMG SRC="' . 'images' . '/' . $smiles[smile_url] . '">', $message);

      } 
   } 
//  $message = substr($message, 1);  line commented out to prevent first letter of each message from disappearing 
  return($message); 
} 

function auto_url($text) {
    $ret = " " . $text;
    $ret = preg_replace("#([\n ])([a-z]+?)://([^, \n\r]+)#i", "\\1<a href=\"\\2://\\3\" target=\"_blank\">\\2://\\3</a>", $ret);
    $ret = preg_replace("#([\n ])www\.([a-z0-9\-]+)\.([a-z0-9\-.\~]+)((?:/[^, \n\r]*)?)#i", "\\1<a href=\"http://www.\\2.\\3\\4\" target=\"_blank\">www.\\2.\\3\\4</a>", $ret);
    $ret = preg_replace("#([\n ])([a-z0-9\-_.]+?)@([^, \n\r]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
    $ret = substr($ret, 1);
    return($ret);
}

function createRandomPassword() {
  $chars = "abcdefghijkmnopqrstuvwxyz023456789";
  srand((double)microtime()*1000000);    
  $i = 0;    
  $pass = '' ;    
  while ($i <= 7) {        
    $num = rand() % 33;        
    $tmp = substr($chars, $num, 1);        
    $pass = $pass . $tmp;        
    $i++;    
  }    
  return $pass;
}
?>
</body>
</html>