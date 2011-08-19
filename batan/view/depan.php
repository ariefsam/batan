
	<!--Berita-->
        <?php foreach ($list_berita_batan as $berita){?>
		<div class="border_berita1">
<!--			<img style="margin-top:5px; margin-left:5px; margin-right:0px;" src="images/berita.jpg" alt="" align="left" />-->
			<div class="text_judulberita">
				<a href="portal/berita/<?php echo $berita['id_berita']?>.html"><?php echo $berita['judul']?></a>
			</div>
				<div class="text_isiberita">
					<?php echo $berita['abstrak']?>
				</div>
				<div class="kotak_berita"> <!--kotak hijau bawah text-->
					<font color=#000; size=1; style="float:left; margin-top:1px; margin-left:10px;"><?php echo $satker[$berita['pengirim']];?></font>
					<font color=#000; size=1; style="float:left; margin-top:2px; margin-left:0px;">: <?php echo from_datetime($berita['waktu_kirim'])?></font>
					<img style="float: right; margin-right:5px; margin-top:2px;" src="images/selengkapnya.png" alt=" "/>
					<a href="portal/berita/<?php echo $berita['id_berita']?>.html"><font color=#000; size=1; style="float: right; margin-top:1px; margin-right:0px;">selengkapnya</font></a>
				</div> <!--end of kotak hijau-->
		</div>
        <?php }?>


			<!-- end of berita-->

			<!-- gambar -->
				<div class="tulisan">
				<font>Untuk melihat arsip berita silahkan </font><a href="portal/berita/arsipberita.html"><font color=#FF0000>Klik Disini</font></br></div>
				<div class="gambar">
				<a href="portal/home/bukutamu.html"><img src="images/buku-tamu.jpg" style="margin-left:-70px; width:100px; height:90px;" title="Buku Tamu"/></a>
				<a href="portal/organisasibatan.html"><img src="images/logo_BATAN.jpg" style="margin-left:70px; width:100px; height:90px;" title="Organisasi BATAN"/></a>
				<a href="http://maps.google.com/maps?source=s_q&hl=en&geocode=&q=Balai+tenaga+nuklir&aq=&sll=40.796295,-3.111996&sspn=9.294561,21.643066&ie=UTF8&hq=Balai+tenaga+nuklir&radius=15000.000000&split=1&hnear=&z=9&iwloc=A&ved=0CB4QpQY&sa=X&ei=ARs6TtviOeLgmAXk2Lj0DA"><img src="images/lokasi_batan.png" style="margin-left:70px; width:100px; height:90px;" title="Lokasi BATAN"/></a>
				</div>
			<!-- end of gambar-->
			<!--link -->
			<div class="link">
				<div class="space">
					<script type="text/javascript">
/***********************************************
* Conveyor belt slideshow script-  Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/
//Specify the slider's width (in pixels)
var sliderwidth="540px"
//Specify the slider's height
var sliderheight="50px"
//Specify the slider's slide speed (larger is faster 1-10)
var slidespeed=3
//configure background color:
slidebgcolor="#1f8af1;"

//Specify the slider's images
var leftrightslide=new Array()
var finalslide=''

/*leftrightslide[0]='<a href="http://" ><img src="braki-terapi.jpg"border=1></a>'*/
leftrightslide[0]='<a href="http://infopublik.depkominfo.go.id/" ><img style="margin-top:3px;" src="images/info_publik.png"border=2 title="Info Publik Depkominfo"></a>'
leftrightslide[1]='<a href="http://nhc.batan.go.id/" ><img src="images/nhc2.gif"border=2 title="Nuclear Health Centre"></a>'
leftrightslide[2]='<a href="http://www.batan.go.id/agenda/seminar.php" ><img src="images/seminar3.jpg" border=2 title="Info seminar dan Lokakarya"></a>'
leftrightslide[3]='<a href="http://www.batan.go.id/korpri-serpong/" ><img src="images/sunserpong.gif" border=2 title="Sun Serpong"></a>'

                                        //Specify gap between each image (use HTML):
                                        var imagegap=""

                                        //Specify pixels gap between each slideshow rotation (use integer):
                                        var slideshowgap=5


                                        ////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed=slidespeed
leftrightslide='<nobr>'+leftrightslide.join(imagegap)+'</nobr>'
var iedom=document.all||document.getElementById
                                        if (iedom)
                                        document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px">'+leftrightslide+'</span>')
                                        var actualwidth=''
                                        var cross_slide, ns_slide

                                        function fillup(){
                                        if (iedom){
                                        cross_slide=document.getElementById? document.getElementById("test2") : document.all.test2
                                        cross_slide2=document.getElementById? document.getElementById("test3") : document.all.test3
                                        cross_slide.innerHTML=cross_slide2.innerHTML=leftrightslide
                                        actualwidth=document.all? cross_slide.offsetWidth : document.getElementById("temp").offsetWidth
                                        cross_slide2.style.left=actualwidth+slideshowgap+"px"
                                        }
                                        else if (document.layers){
                                        ns_slide=document.ns_slidemenu.document.ns_slidemenu2
                                        ns_slide2=document.ns_slidemenu.document.ns_slidemenu3
                                        ns_slide.document.write(leftrightslide)
                                        ns_slide.document.close()
                                        actualwidth=ns_slide.document.width
                                        ns_slide2.left=actualwidth+slideshowgap
                                        ns_slide2.document.write(leftrightslide)
                                        ns_slide2.document.close()
                                        }
                                        lefttime=setInterval("slideleft()",30)
                                        }
                                        window.onload=fillup

                                        function slideleft(){
                                        if (iedom){
                                        if (parseInt(cross_slide.style.left)>(actualwidth*(-1)+8))
                                        cross_slide.style.left=parseInt(cross_slide.style.left)-copyspeed+"px"
                                        else
                                        cross_slide.style.left=parseInt(cross_slide2.style.left)+actualwidth+slideshowgap+"px"

                                        if (parseInt(cross_slide2.style.left)>(actualwidth*(-1)+8))
                                        cross_slide2.style.left=parseInt(cross_slide2.style.left)-copyspeed+"px"
                                        else
                                        cross_slide2.style.left=parseInt(cross_slide.style.left)+actualwidth+slideshowgap+"px"

                                        }
                                        else if (document.layers){
                                        if (ns_slide.left>(actualwidth*(-1)+8))
                                        ns_slide.left-=copyspeed
                                        else
                                        ns_slide.left=ns_slide2.left+actualwidth+slideshowgap

                                        if (ns_slide2.left>(actualwidth*(-1)+8))
                                        ns_slide2.left-=copyspeed
                                        else
                                        ns_slide2.left=ns_slide.left+actualwidth+slideshowgap
                                        }
                                        }


                                        if (iedom||document.layers){
                                        with (document){
                                        document.write('<table border="0" cellspacing="0" cellpadding="0"><td>')
                                        if (iedom){
                                        write('<div style="position:relative;width:'+sliderwidth+';height:'+sliderheight+';overflow:hidden">')
                                        write('<div style="position:absolute;width:'+sliderwidth+';height:'+sliderheight+';background-color:'+slidebgcolor+'" onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed">')
                                        write('<div id="test2" style="position:absolute;left:0px;top:0px"></div>')
                                        write('<div id="test3" style="position:absolute;left:-1000px;top:0px"></div>')
                                        write('</div></div>')
                                        }
                                        else if (document.layers){
                                        write('<ilayer width='+sliderwidth+' height='+sliderheight+' name="ns_slidemenu" bgColor='+slidebgcolor+'>')
                                        write('<layer name="ns_slidemenu2" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')
                                        write('<layer name="ns_slidemenu3" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')
                                        write('</ilayer>')
                                        }
                                        document.write('</td></table>')
                                        }
                                        }
                                    </script>
							</div>
					</div>	<!--end of lInk -->