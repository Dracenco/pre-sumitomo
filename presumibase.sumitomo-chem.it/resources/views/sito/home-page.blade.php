<?php
$route = Route::currentRouteName();
$ruoli = Session::get('permessi');
?>
@extends('layout.header-site')
@section('title', 'Home Page')

@section('content')

@include('layout.menu-sito')

      <section id="content-elenco-codici" data-equalizer-watch>
        <div class="row large-12 prima-riga">
            <div class="medium-12 large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><a href='{{ url("/") }}'>Sito</a></li>
                        <li class="disabled">Home Page</li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="error_sito"></div>
            </div>
        </div>

        <!---->
        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Slider</h2></div></div>
        </div>
        
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="hp_slider_1" method="post">
                     <div class="row">
                         <div class="large-6 columns end">
                             <label style="font-size:19px">Slider 1</label>
                         </div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorSlider1" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorImgSlider1" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Testo</label><input type="text" name="slider_1_testo" id="slider_hp_testo_1">
                         </div>

                         <div class="large-6 columns"> 
                             <label>Immagine</label>  
                                <label for="slider_1_immagine" class="filupp">
                                    <span class="filupp-file-name valueSlide"></span>
                                    <input type="file" name="slider_1_immagine" value="1" id="slider_1_immagine" class="img_slide"/>
                                </label>
                         </div>
                         <div class="large-6 columns">
                             <label>Link</label><input type="text" name="slider_1_link" id="slider_hp_link_1">
                         </div>
                     </div>
                     <div class="row">
                       <div class="large-6 columns">
                            <div class="preload_img_slide_hp1"><label>Immagine attuale</label></div>
                       </div>
                       <div class="large-6 columns">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right" id="salva" style="margin-left:10px">
                        <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="1">
                       </div>
                     </div>
                </form>

                <form class="hp_slider_2" method="post">
                     <div class="row">
                         <div class="large-6 columns end">
                             <label style="font-size:19px">Slider 2</label>
                         </div>
                    </div>
                    <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorSlider2" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorImgSlider2" style="margin:0"></div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="large-6 columns">
                             <label>Testo</label><input type="text" name="slider_2_testo" id="slider_hp_testo_2">
                         </div>
                         <div class="large-6 columns">
                             <label>Immagine</label>
                             <label for="slider_2_immagine" class="filupp">
                                    <span class="filupp-file-name valueSlide"></span>
                                    <input type="file" name="slider_2_immagine" value="1" id="slider_2_immagine" class="img_slide"/>
                            </label>
                         </div>
                         <div class="large-6 columns">
                             <label>Link</label><input type="text" name="slider_2_link" id="slider_hp_link_2">
                         </div>
                     </div>
                     <div class="row">
                       <div class="large-6 columns">
                            <div class="preload_img_slide_hp2"><label>Immagine attuale</label></div>
                       </div>
                       <div class="large-6 columns">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right" style="margin-left:10px">
                        <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="2">
                       </div>
                     </div>
                </form>

                <form class="hp_slider_3" method="post">
                     <div class="row">
                        <div class="large-6 columns end">
                            <label style="font-size:19px">Slider 3</label>
                        </div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorSlider3" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorImgSlider3" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Testo</label><input type="text" name="slider_3_testo" id="slider_hp_testo_3">
                         </div>

                         <div class="large-6 columns">
                             <label>Immagine</label>
                                <label for="slider_3_immagine" class="filupp">
                                    <span class="filupp-file-name valueSlide"></span>
                                    <input type="file" name="slider_3_immagine" value="1" id="slider_3_immagine" class="img_slide"/>
                                </label>
                         </div>
                         <div class="large-6 columns">
                             <label>Link</label><input type="text" name="slider_3_link" id="slider_hp_link_3">
                         </div>
                     </div>
                     <div class="row">
                       <div class="large-6 columns">
                            <div class="preload_img_slide_hp3"><label>Immagine attuale</label></div>
                       </div>
                       <div class="large-6 columns">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right" style="margin-left:10px">
                        <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="3">
                       </div>
                     </div>
                </form>

                <form class="hp_slider_4" method="post">
                     <div class="row">
                        <div class="large-6 columns end">
                            <label style="font-size:19px">Slider 4</label>
                        </div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorSlider4" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorImgSlider4" style="margin:0"></div>
                        </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Testo</label><input type="text" name="slider_4_testo" id="slider_hp_testo_4">
                         </div>

                         <div class="large-6 columns">
                             <label>Immagine</label>
                             <label for="slider_4_immagine" class="filupp">
                                    <span class="filupp-file-name valueSlide"></span>
                                    <input type="file" name="slider_4_immagine" value="1" id="slider_4_immagine" class="img_slide"/>
                                </label>
                         </div>
                         <div class="large-6 columns">
                             <label>Link</label><input type="text" name="slider_4_link" id="slider_hp_link_4">
                         </div>
                     </div>
                     <div class="row">
                       <div class="large-6 columns">
                            <div class="preload_img_slide_hp4"><label>Immagine attuale</label></div>
                       </div>
                       <div class="large-6 columns">
                        <input type="submit" name="SALVA" value="SALVA" class="float-right" style="margin-left:10px">
                        <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="4">
                       </div>
                     </div>
                </form>

                <form class="hp_slider_5" method="post">
                     <div class="row">
                        <div class="large-6 columns end">
                            <label style="font-size:19px">Slider 5</label>
                        </div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorSlider5" style="margin:0"></div>
                        </div>
                        <div class="medium-6 large-6 columns">
                            <div id="error" class="errorImgSlider5" style="margin:0"></div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Testo</label><input type="text" name="slider_5_testo" id="slider_hp_testo_5">
                         </div>

                         <div class="large-6 columns">
                             <label>Immagine</label>
                             <label for="slider_5_immagine" class="filupp">
                                    <span class="filupp-file-name valueSlide"></span>
                                    <input type="file" name="slider_5_immagine" value="1" id="slider_5_immagine" class="img_slide"/>
                                </label>
                         </div>
                         <div class="large-6 columns">
                             <label>Link</label><input type="text" name="slider_5_link" id="slider_hp_link_5">
                         </div>
                     </div>
                     <div class="row">
                        <div class="large-6 columns">
                            <div class="preload_img_slide_hp5"><label>Immagine attuale</label></div>
                        </div>
                        <div class="large-6 columns">
                            <input type="submit" name="SALVA" value="SALVA" class="float-right" style="margin-left:10px">
                            <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancella" id="5">
                        </div>
                     </div>
                 </form>
               </div>
            </div>
        </div>

        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>SUMITOMO CHEMICAL NEL MONDO</h2></div></div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="sumitomo_mondo" method="post">
                     <div class="row">
                         <div class="large-6 columns">
                             <div class="collapse row">
                                <div class="medium-12 large-12 columns">
                                    <div id="error" class="errorSCM1" style="margin:0"></div>
                                </div>
                            </div>
                            <label>Blocco 1</label><br><textarea name="sumitomo_mondo_1" id="sumitomo_mondo_1" style="height:50px"></textarea>
                         </div>
                         <div class="large-6 columns">
                            <div class="collapse row">
                                <div class="medium-12 large-12 columns">
                                    <div id="error" class="errorSCM2" style="margin:0"></div>
                                </div>
                            </div>
                             <label>Blocco 2</label><br><textarea name="sumitomo_mondo_2" id="sumitomo_mondo_2" style="height:50px"></textarea>
                         </div>
                     </div>
                     <div class="row">
                         <div class="large-6 columns">
                            <div class="collapse row">
                                <div class="medium-12 large-12 columns">
                                    <div id="error" class="errorSCM3" style="margin:0"></div>
                                </div>
                            </div>
                             <label>Blocco 3</label><br><textarea name="sumitomo_mondo_3" id="sumitomo_mondo_3" style="height:50px"></textarea>
                         </div>
                         <div class="large-6 columns">
                            <div class="collapse row">
                                <div class="medium-12 large-12 columns">
                                    <div id="error" class="errorSCM4" style="margin:0"></div>
                                </div>
                            </div>
                             <label>Blocco 4</label><br><textarea name="sumitomo_mondo_4" id="sumitomo_mondo_4" style="height:50px"></textarea>
                         </div>
                     </div>
                     <div class="large-12 columns">
                       <input type="submit" name="SALVA" value="SALVA" class="float-right">
                       <a href="" class="pulsante-annulla float-right">ANNULLA</a>
                     </div>

                 </form>
               </div>
            </div>
        </div>

        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>SUMITOMO CHEMICAL ITALIA</h2></div></div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="sumitomo_italia" method="post">                 
                    <div class="expanded row">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorSCI1" style="margin:0"></div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Testo rosso (blocco 1)</label><br><input type="text" name="sumitomo_italia_1_testo_rosso" id="sumitomo_italia_1_testo_rosso">
                         </div>
                         <div class="large-6 columns">
                             <label>Testo nero (blocco 1)</label><br><input type="text" name="sumitomo_italia_1_testo_nero" id="sumitomo_italia_1_testo_nero">
                         </div>
                     </div>
                     
                     <div class="expanded row">
                         <div class="large-12 columns"><div style="float:left; border-bottom: 1px solid #979797; width:100%; margin-bottom:20px">&nbsp;</div></div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorSCI2" style="margin:0"></div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Testo rosso (blocco 2)</label><br><input type="text" name="sumitomo_italia_2_testo_rosso" id="sumitomo_italia_2_testo_rosso">
                         </div>
                         <div class="large-6 columns">
                             <label>Testo nero (blocco 2)</label><br><input type="text" name="sumitomo_italia_2_testo_nero" id="sumitomo_italia_2_testo_nero">
                         </div>
                     </div>

                     <div class="expanded row">
                         <div class="large-12 columns"><div style="float:left; border-bottom: 1px solid #979797; width:100%; margin-bottom:20px">&nbsp;</div></div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-12 large-12 columns">
                            <div id="error" class="errorSCI3" style="margin:0"></div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="large-6 columns">
                             <label>Testo rosso (blocco 3)</label><br><input type="text" name="sumitomo_italia_3_testo_rosso" id="sumitomo_italia_3_testo_rosso">
                         </div>
                         <div class="large-6 columns">
                             <label>Testo nero (blocco 3)</label><br><input type="text" name="sumitomo_italia_3_testo_nero" id="sumitomo_italia_3_testo_nero">
                         </div>
                     </div>

                     <div class="large-12 columns">
                       <input type="submit" name="SALVA" value="SALVA" class="float-right">
                       <a href="" class="pulsante-annulla float-right">ANNULLA</a>
                     </div>

                 </form>
               </div>
            </div>
        </div>

        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Blocco Biorazionae</h2></div></div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="sumitomo_biorazionale" method="post">
                    <div class="row">
                       <div class="large-6 columns">
                            <div class="collapse row">
                                <div class="medium-12 large-12 columns">
                                    <div id="error" class="error_sumitomo_bio_url" style="margin:0"></div>
                                </div>
                            </div>
                           <label>Url</label><br><input type="text" name="sumitomo_biorazionale_url" id="sumitomo_biorazionale_url">
                       </div>
                    </div>
                     <div class="row">
                         <div class="large-6 columns">
                            <div class="collapse row">
                                <div class="medium-12 large-12 columns">
                                    <div id="error" class="error_sumitomo_bio_titolo" style="margin:0"></div>
                                </div>
                            </div>
                             <label>Titolo</label><br><input type="text" name="sumitomo_biorazionale_titolo" id="sumitomo_biorazionale_titolo">
                         </div>
                         <div class="large-6 columns">
                            <div class="collapse row">
                                <div class="medium-12 large-12 columns">
                                    <div id="error" class="error_sumitomo_bio_testo" style="margin:0"></div>
                                </div>
                            </div>
                             <label>Testo</label><br><textarea name="sumitomo_biorazionale_testo" id="sumitomo_biorazionale_testo" style="height:100px"></textarea>
                         </div>
                     </div>
                     <div class="expanded row">
                        <div class="medium-6 large-6 columns end">
                            <div id="error" class="errorImgBio" style="margin:0"></div>
                        </div>
                     </div>
                     
                     <div class="row">
                         <div class="large-6 columns">
                              <div class="preload_img_bio"><label>Immagine attuale</label></div>
                         </div>
                         <div class="large-6 columns">
                             <label>Immagine</label>
                             <label for="slider_bio_immagine" class="filupp">
                                <span class="filupp-file-name valueSlide"></span>
                                <input type="file" name="slider_bio_immagine" value="1" id="slider_bio_immagine" class="img_slide"/>
                             </label>                           
                         </div>
                     </div>

                     <div class="large-12 columns">
                       <input type="submit" name="SALVA" value="SALVA" class="float-right" style="margin-left:10px">
                       <input type="submit" name="CANCELLA" value="CANCELLA" class="float-right cancellaBio" id="cancellaBio">
                     </div>

                 </form>
               </div>
            </div>
        </div>


        <div class="expanded row">
            <div class="large-12 columns"><div class="titolo_sezione"><h2>Norme d'uso agrofarmaci</h2></div></div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
                <div id="error" class="usoAgrofarmaci" style="margin-left:15px"></div>
            </div>
        </div>
        <div class="expanded row">
            <div class="medium-12 large-12 columns">
               <div class="scheda-nuovo-prodotto formFile">
                 <form class="sumitomo_uso_agrofarmaci" method="post">
                    <div class="row">
                          <div class="large-12 columns">
                              <label>Testo</label><br><textarea name="textareauso_agrofarmaci" id="textareauso_agrofarmaci"></textarea>
                          </div>
                      </div>

                     <div class="large-12 columns">
                       <input type="submit" name="SALVA" value="SALVA" class="float-right">
                       <a href="" class="pulsante-annulla float-right">ANNULLA</a>
                     </div>
                 </form>
               </div>
            </div>
        </div>

        <!---->

      </section>

@endsection

@section('script')
<script type="text/javascript">
    $('.img_slide').change(function(){                
        var filename = $(this,"input[type='file']").val();
        $(this).prev('.valueSlide').html(filename);
    });
    
    var utente='';

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Users/GetUserInfo",
        async:false,
        success: function (result) {
            utente=result.firstName + ' ' + result.lastName;
        },
        error: function (request, status, errorThrown){}
    });

    CKEDITOR.replace('sumitomo_mondo_1');
    CKEDITOR.replace('sumitomo_mondo_2');
    CKEDITOR.replace('sumitomo_mondo_3');
    CKEDITOR.replace('sumitomo_mondo_4');

    CKEDITOR.replace('sumitomo_biorazionale_testo');
    CKEDITOR.replace('textareauso_agrofarmaci');

    $.ajax({
        type: "GET",
        beforeSend: function (request) {
            request.setRequestHeader("Authorization", "Bearer " + token );
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoSezioni?idPagina=10",
        async:false,
        success: function (results){
            $.each(results.data, function(index, value){
                console.log(value);
                /*disclaimer */
                if(value.id == 9){ $("#textareauso_agrofarmaci").text(value.description); }

                /*inizio slide*/
                if(value.id == 10){ 
                    $("#slider_hp_testo_1").val(value.description);
                    $('#slider_hp_link_1').val(value.img_link);
                }
                if(value.id == 11){ 
                    $("#slider_hp_testo_2").val(value.description); 
                    $('#slider_hp_link_2').val(value.img_link);
                }
                if(value.id == 12){ 
                    $("#slider_hp_testo_3").val(value.description); 
                    $('#slider_hp_link_3').val(value.img_link);
                }
                if(value.id == 13){ 
                    $("#slider_hp_testo_4").val(value.description); 
                    $('#slider_hp_link_4').val(value.img_link);
                }
                if(value.id == 14){ 
                    $("#slider_hp_testo_5").val(value.description); 
                    $('#slider_hp_link_5').val(value.img_link);
                }
                /*fine slider*/

                /*Sumitomo chemical mondo SCM */
                if(value.id == 15){ $("#sumitomo_mondo_1").val(value.description); }
                if(value.id == 16){ $("#sumitomo_mondo_2").val(value.description); }
                if(value.id == 17){ $("#sumitomo_mondo_3").val(value.description); }
                if(value.id == 18){ $("#sumitomo_mondo_4").val(value.description); }
                /*fine Sumitomo chemical mondo SCM */

                /*Sumitomo chemical mondo SC Italia */
                if(value.id == 19){ $("#sumitomo_italia_1_testo_nero").val(value.description); }
                if(value.id == 20){ $("#sumitomo_italia_1_testo_rosso").val(value.description); }
                if(value.id == 21){ $("#sumitomo_italia_2_testo_nero").val(value.description); }
                if(value.id == 22){ $("#sumitomo_italia_2_testo_rosso").val(value.description); }
                if(value.id == 23){ $("#sumitomo_italia_3_testo_nero").val(value.description); }
                if(value.id == 24){ $("#sumitomo_italia_3_testo_rosso").val(value.description); }
                /*fine Sumitomo chemical mondo SCM */

                /*Biorazionale */
                if(value.id == 28){ $("#sumitomo_biorazionale_url").val(value.description); }
                if(value.id == 29){ $("#sumitomo_biorazionale_titolo").val(value.description); }
                if(value.id == 32){ $("#sumitomo_biorazionale_testo").val(value.description); }
                /*Biorazionale*/
            });
        }
    });
    
    $('.cancella').click(function (t) {
        t.preventDefault();

        var Idsezione = '';
        var Namesezione = '';
        var myId = $(this).attr('id');

        if(myId == 1){
            Idsezione = 10;
            Namesezione = 'Slider 1 HP';
        }
        if(myId == 2){
            Idsezione = 11;
            Namesezione = 'Slider 2 HP';
        }
        if(myId == 3){
            Idsezione = 12;
            Namesezione = 'Slider 3 HP';
        }
        if(myId == 4){
            Idsezione = 13;
            Namesezione = 'Slider 4 HP';
        }
        if(myId == 5){
            Idsezione = 14;
            Namesezione = 'Slider 5 HP';
        }

        post_data='{ "ID" : "' + Idsezione + '" , "Name" :  "' + Namesezione + '" , "Description": "", "Visibile" : true , "IdPagina" : 10 }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data),
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorSlider" + myId).html('Impossibile cancellare la sezione ');
                        
                    }else{
                        $(".errorSlider" + myId).html('Sezione correttamente aggiornata');
                        $("#slider_hp_testo_" + myId).val('');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorSlider" + myId).html('Impossibile aggiornare il testo');
                }
            });

            $.ajax({
                type: "GET",
                beforeSend: function (request) {           
                  request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + Idsezione,      
                async:false,
                success: function (result){
                    $.each(result.data, function(index, value){           
                            
                        post_data = '{ "id" : ' + value.id + '}';
                        $.ajax({
                            type: "POST",
                            beforeSend: function (request) {           
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                                request.setRequestHeader("charset" , "utf-8");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Site/DeleteImmagine?IdSezione=" + Idsezione,      
                            dataType: "json",
                            data: JSON.parse(post_data),
                            success: function (result){$(".preload_img_slide_hp" + myId).html('');},
                            error: function (request, status, errorThrown){}
                        });
                    });            
                },
                error: function (request, status, errorThrown){}
            });
    });

    $("form[class^='hp_slider_']").submit(function(e) {
        e.preventDefault();           
        var className = $(this).attr('class');
        var res = className.split("_");
        var number = res.slice(-1)[0];

        if(number == 1){
            Idsezione = 10;
            Namesezione = 'Slider 1 HP';
        }
        if(number == 2){
            Idsezione = 11;
            Namesezione = 'Slider 2 HP';
        }
        if(number == 3){
            Idsezione = 12;
            Namesezione = 'Slider 3 HP';
        }
        if(number == 4){
            Idsezione = 13;
            Namesezione = 'Slider 4 HP';
        }
        if(number == 5){
            Idsezione = 14;
            Namesezione = 'Slider 5 HP';
        }

            /*immagine */

            var slider_uno_immagine = '';
            var validazionecampi = true;
            var error ='';

            var myObj ;
            var data = new FormData();
                       
            var files = $("#slider_" + number + "_immagine").get(0).files;

            myObj = { "Name": utente , "IdSezione": Idsezione, "Visibile": true };
            myJSON = JSON.stringify(myObj);
            data.append("data", myJSON);

            if(files.length > 0){  
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {           
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + Idsezione,      
                    async:false,
                    success: function (result){
                        $.each(result.data, function(index, value){           
                            
                            post_data = '{ "id" : ' + value.id + '}';
                            $.ajax({
                                type: "POST",
                                beforeSend: function (request) {           
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                    request.setRequestHeader("charset" , "utf-8");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/DeleteImmagine?IdSezione=" + Idsezione,      
                                dataType: "json",
                                data: JSON.parse(post_data),
                                success: function (result){},
                                error: function (request, status, errorThrown){}
                            });
                        });
                        
                    },
                    error: function (request, status, errorThrown){}
                });

                $(".preload_img_slide_hp" + number).html('');
                data.append("UploadedImage", files[0]);                         
                var ajaxRequest = $.ajax({
                      type: "POST",
                      beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                      },
                      url: "{{ config('constants.UrlWebService') }}api/Site/UploadImmagine",
                      contentType: false,
                      processData: false,
                      data: data,
                      async:false,
                      success: function (result) {
                        $(".errorImgSlider" + number ).html('Immagine correttamente caricata');
                            $.ajax({
                                type: "GET",
                                beforeSend: function (request) {           
                                    request.setRequestHeader("lang", "it");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=" + Idsezione,      
                                async:false,
                                success: function (result){
                                    $.each(result.data, function(index, value){           
                                        fielIdImgX = value.id; 
                                    });
                                    var srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                                    $(".preload_img_slide_hp" + number).append("<img src='" + srcX + "' /> <br />");
                                },
                                error: function (request, status, errorThrown){}
                            });
                      },
                      error: function (request, status, errorThrown) {
                        $(".errorImgSlider" + number).html('Impossibile caricare l\'immagine');
                      }
                });
                
            }

            var testoSlide = $('#slider_hp_testo_' + number).val();
            var linikSlide = $('#slider_hp_link_' + number).val();
        
            post_data='{ "ID" : ' + Idsezione + ' , "Name" :  "' + Namesezione + '" , "Description": "' + testoSlide + '", "Visibile" : true , "IdPagina" : 10, "img_link" : "'+linikSlide+'" }';
            $.ajax({
                type: "POST",
                    beforeSend: function (request) {
                    request.setRequestHeader("Authorization", "Bearer " + token );
                    request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
                dataType: "json",
                data: JSON.parse(post_data),
                async:false,
                success: function(data){
                    if(data.returnCode == '-1'){
                        $(".errorSlider" + number).html('Impossibile aggiornare il testo');
                    }else{
                        $(".errorSlider" + number).html('Testo correttamente aggiornato');
                    }
                },
                error: function (request, status, errorThrown){
                    $(".errorSlider" + number).html('Impossibile aggiornare il testo');
                }
            });            

    });

    var fielIdImg1 = '';
    var fielIdImg2 = '';
    var fielIdImg3 = '';
    var fielIdImg4 = '';
    var fielIdImg5 = '';
    
    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=10",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg1 = value.id; 
            });
            if(fielIdImg1 != ''){
                var src1 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg1;
                $(".preload_img_slide_hp1").append("<img src='" + src1 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=11",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg2 = value.id; 
            });
            if(fielIdImg2 != ''){
                var src2 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg2;
                $(".preload_img_slide_hp2").append("<img src='" + src2 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=12",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg3 = value.id; 
            });
            if(fielIdImg3 != ''){
                var src3 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg3;
                $(".preload_img_slide_hp3").append("<img src='" + src3 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=13",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg4 = value.id; 
            });
            if(fielIdImg4 != ''){
                var src4 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg4;
                $(".preload_img_slide_hp4").append("<img src='" + src4 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=14",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdImg5 = value.id; 
            });
            if(fielIdImg5 != ''){
                var src5 = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImg5;
                $(".preload_img_slide_hp5").append("<img src='" + src5 + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });
    /*fine slider */

    /*sumitomo mondo Italia*/    
    $("form.sumitomo_italia").submit(function(e) {
        e.preventDefault();

        var testoSCI1 = $('#sumitomo_italia_1_testo_rosso').val();
        var testoSCI2 = $('#sumitomo_italia_1_testo_nero').val();
        var testoSCI3 = $('#sumitomo_italia_2_testo_rosso').val();
        var testoSCI4 = $('#sumitomo_italia_2_testo_nero').val();
        var testoSCI5 = $('#sumitomo_italia_3_testo_rosso').val();
        var testoSCI6 = $('#sumitomo_italia_3_testo_nero').val();

        post_data='{ "ID" : 19 , "Name" :  "SC Italia Testo nero 1" , "Description": "' + testoSCI2 + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".errorSCI1").html('Impossibile aggiornare il testo');
                }else{
                    $(".errorSCI1").html('Testo correttamente aggiornato');
                }
            },
            error: function (request, status, errorThrown){
                $(".errorSCI1").html('Impossibile aggiornare il testo');
            }
        });
        
        post_data='{ "ID" : 20 , "Name" :  "SC Italia Testo rosso 1" , "Description": "' + testoSCI1 + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".errorSCI1").html('Impossibile aggiornare il testo');
                }else{
                    $(".errorSCI1").html('Testo correttamente aggiornato');
                }
            },
            error: function (request, status, errorThrown){
                $(".errorSCI1").html('Impossibile aggiornare il testo');
            }
        });
        
        post_data='{ "ID" : 21 , "Name" :  "SC Italia Testo nero 2" , "Description": "' + testoSCI4 + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".errorSCI2").html('Impossibile aggiornare il testo');
                }else{
                    $(".errorSCI2").html('Testo correttamente aggiornato');
                }
            },
            error: function (request, status, errorThrown){
                $(".errorSCI2").html('Impossibile aggiornare il testo');
            }
        });
        
        post_data='{ "ID" : 22 , "Name" :  "SC Italia Testo rosso 2" , "Description": "' + testoSCI3 + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".errorSCI2").html('Impossibile aggiornare il testo');
                }else{
                    $(".errorSCI2").html('Testo correttamente aggiornato');
                }
            },
            error: function (request, status, errorThrown){
                $(".errorSCI2").html('Impossibile aggiornare il testo');
            }
        });

        post_data='{ "ID" : 23 , "Name" :  "SC Italia Testo nero 3" , "Description": "' + testoSCI6 + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".errorSCI3").html('Impossibile aggiornare il testo');
                }else{
                    $(".errorSCI3").html('Testo correttamente aggiornato');
                }
            },
            error: function (request, status, errorThrown){
                $(".errorSCI3").html('Impossibile aggiornare il testo');
            }
        });

        post_data='{ "ID" : 24 , "Name" :  "SC Italia Testo rosso 3" , "Description": "' + testoSCI5 + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".errorSCI3").html('Impossibile aggiornare il testo');
                }else{
                    $(".errorSCI3").html('Testo correttamente aggiornato');
                }
            },
            error: function (request, status, errorThrown){
                $(".errorSCI3").html('Impossibile aggiornare il testo');
            }
        });


    });
    /*fine sumitomo Italia */

    /*sumitomo mondo SCM*/    
    $("form.sumitomo_mondo").submit(function(e) {
        e.preventDefault();

        var testoSCM1 = $('#sumitomo_mondo_1').val();
        var testoSCM2 = $('#sumitomo_mondo_2').val();
        var testoSCM3 = $('#sumitomo_mondo_3').val();
        var testoSCM4 = $('#sumitomo_mondo_4').val();

        var testoSCM1 = CKEDITOR.instances.sumitomo_mondo_1.getData();
        testoSCM1 = testoSCM1.replace(/(\r\n|\n|\r)/gm, "");
        testoSCM1 = testoSCM1.replace(/"/g,"\\\"");

        var testoSCM2 = CKEDITOR.instances.sumitomo_mondo_2.getData();
        testoSCM2 = testoSCM2.replace(/(\r\n|\n|\r)/gm, "");
        testoSCM2 = testoSCM2.replace(/"/g,"\\\"");

        var testoSCM3 = CKEDITOR.instances.sumitomo_mondo_3.getData();
        testoSCM3 = testoSCM3.replace(/(\r\n|\n|\r)/gm, "");
        testoSCM3 = testoSCM3.replace(/"/g,"\\\"");

        var testoSCM4 = CKEDITOR.instances.sumitomo_mondo_4.getData();
        testoSCM4 = testoSCM4.replace(/(\r\n|\n|\r)/gm, "");
        testoSCM4 = testoSCM4.replace(/"/g,"\\\"");


        post_data='{ "ID" : 15 , "Name" :  "SC Mondo 1" , "Description": "' + testoSCM1 + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".errorSCM1").html('Impossibile aggiornare il testo');
                }else{
                    $(".errorSCM1").html('Testo correttamente aggiornato');
                }
            },
            error: function (request, status, errorThrown){
                $(".errorSCM1").html('Impossibile aggiornare il testo');
            }
        });
        
        post_data='{ "ID" : 16 , "Name" :  "SC Mondo 2" , "Description": "' + testoSCM2 + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".errorSCM2").html('Impossibile aggiornare il testo');
                }else{
                    $(".errorSCM2").html('Testo correttamente aggiornato');
                }
            },
            error: function (request, status, errorThrown){
                $(".errorSCM2").html('Impossibile aggiornare il testo');
            }
        });
        
        post_data='{ "ID" : 17 , "Name" :  "SC Mondo 3" , "Description": "' + testoSCM3 + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".errorSCM3").html('Impossibile aggiornare il testo');
                }else{
                    $(".errorSCM3").html('Testo correttamente aggiornato');
                }
            },
            error: function (request, status, errorThrown){
                $(".errorSCM3").html('Impossibile aggiornare il testo');
            }
        });
        
        post_data='{ "ID" : 18 , "Name" :  "SC Mondo 4" , "Description": "' + testoSCM4 + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
                beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".errorSCM4").html('Impossibile aggiornare il testo');
                }else{
                    $(".errorSCM4").html('Testo correttamente aggiornato');
                }
            },
            error: function (request, status, errorThrown){
                $(".errorSCM4").html('Impossibile aggiornare il testo');
            }
        });


    });
    /*fine sumitomo mondo */

    /*biorazionale*/
    var fielIdBio = '';
    $.ajax({
        type: "GET",
        beforeSend: function (request) {           
            request.setRequestHeader("lang", "it");
        },
        url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=32",      
        async:false,
        success: function (result){
            $.each(result.data, function(index, value){           
                fielIdBio = value.id; 
            });
            if(fielIdBio != ''){
                var bio = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdBio;
                $(".preload_img_bio").append("<img src='" + bio + "' /> <br />");
            }
        },
        error: function (request, status, errorThrown){}
    });

    $("form.sumitomo_biorazionale").submit(function(e) {
        e.preventDefault();

        var slider_uno_immagine = '';
            
            var error ='';

            var myObj ;
            var data = new FormData();
                       
            var files = $("#slider_bio_immagine").get(0).files;

            myObj = { "Name": utente , "IdSezione": 32, "Visibile": true };
            myJSON = JSON.stringify(myObj);
            data.append("data", myJSON);

            if(files.length > 0){  
                $.ajax({
                    type: "GET",
                    beforeSend: function (request) {           
                        request.setRequestHeader("lang", "it");
                    },
                    url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=32",      
                    async:false,
                    success: function (result){
                        $.each(result.data, function(index, value){           
                            
                            post_data = '{ "id" : ' + value.id + '}';
                            $.ajax({
                                type: "POST",
                                beforeSend: function (request) {           
                                    request.setRequestHeader("Authorization", "Bearer " + token );
                                    request.setRequestHeader("lang", "it");
                                    request.setRequestHeader("charset" , "utf-8");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/DeleteImmagine?IdSezione=32",      
                                dataType: "json",
                                data: JSON.parse(post_data),
                                success: function (result){},
                                error: function (request, status, errorThrown){}
                            });
                        });
                        
                    },
                    error: function (request, status, errorThrown){}
                });

                $(".preload_img_bio" ).html('');
                data.append("UploadedImage", files[0]);                         
                var ajaxRequest = $.ajax({
                      type: "POST",
                      beforeSend: function (request) {
                            request.setRequestHeader("Authorization", "Bearer " + token );
                            request.setRequestHeader("lang", "it");
                      },
                      url: "{{ config('constants.UrlWebService') }}api/Site/UploadImmagine",
                      contentType: false,
                      processData: false,
                      data: data,
                      async:false,
                      success: function (result) {
                        $(".errorImgBio").html('Immagine correttamente caricata');
                            $.ajax({
                                type: "GET",
                                beforeSend: function (request) {           
                                    request.setRequestHeader("lang", "it");
                                },
                                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=32",      
                                async:false,
                                success: function (result){
                                    $.each(result.data, function(index, value){           
                                        fielIdImgX = value.id; 
                                    });
                                    var srcX = "{{ config('constants.UrlWebService') }}api/Site/DownloadImmagine?IdImmagine=" + fielIdImgX;
                                    $(".preload_img_bio").append("<img src='" + srcX + "' /> <br />");
                                },
                                error: function (request, status, errorThrown){}
                            });
                      },
                      error: function (request, status, errorThrown) {
                        $(".preload_img_bio").html('Impossibile caricare l\'immagine');
                      }
                });

                
            }

        var Description = CKEDITOR.instances.sumitomo_biorazionale_testo.getData();
        Description = Description.replace(/(\r\n|\n|\r)/gm, "");
        Description = Description.replace(/"/g,"\\\"");

        var URLBio = $('#sumitomo_biorazionale_url').val();
        post_data='{ "ID" : 28 , "Name" :  "Biorazionale URL" , "Description": "' + URLBio + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".error_sumitomo_bio_url").html('Impossibile aggiornare il link');
                }else{
                    $(".error_sumitomo_bio_url").html('Link correttamente aggiornato');
                }
            },
             error: function (request, status, errorThrown){
                    $(".error_sumitomo_bio_url").html('Impossibile aggiornare il link');
             }
        });

        var titoloBio = $('#sumitomo_biorazionale_titolo').val();
        
        post_data='{ "ID" : 29 , "Name" :  "Biorazionale Titolo" , "Description": "' + titoloBio + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".error_sumitomo_bio_titolo").html('Impossibile aggiornare il titolo');
                }else{
                    $(".error_sumitomo_bio_titolo").html('Titolo correttamente aggiornato');
                }
            },
             error: function (request, status, errorThrown){
                    $(".error_sumitomo_bio_titolo").html('Impossibile aggiornare il titolo');
             }
        });     

        post_data='{ "ID" : 32 , "Name" :  "Biorazionale Testo" , "Description": "' + Description + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".error_sumitomo_bio_testo").html('Impossibile aggiornare il testo');
                }else{
                    $(".error_sumitomo_bio_testo").html('Testo correttamente aggiornato');
                }
            },
             error: function (request, status, errorThrown){
                    $(".error_sumitomo_bio_testo").html('Impossibile aggiornare il testo');
             }
        });

    });

    $('.cancellaBio').click(function (r) {
        r.preventDefault();

        post_data='{ "ID" : 28 , "Name" :  "Biorazionale URL" , "Description": "", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".error_sumitomo_bio_url").html('Impossibile aggiornare il link');
                }else{
                    $(".error_sumitomo_bio_url").html('Link correttamente aggiornato');
                    $("#sumitomo_biorazionale_url").val('');
                }
            },
             error: function (request, status, errorThrown){
                    $(".error_sumitomo_bio_url").html('Impossibile aggiornare il link');
             }
        });

        post_data='{ "ID" : 29 , "Name" :  "Biorazionale Titolo" , "Description": "", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".error_sumitomo_bio_titolo").html('Impossibile aggiornare il titolo');
                }else{
                    $(".error_sumitomo_bio_titolo").html('Titolo correttamente aggiornato');
                    $("#sumitomo_biorazionale_titolo").val('');
                }
            },
             error: function (request, status, errorThrown){
                    $(".error_sumitomo_bio_titolo").html('Impossibile aggiornare il titolo');
             }
        });     

        post_data='{ "ID" : 32 , "Name" :  "Biorazionale Testo" , "Description": "", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".error_sumitomo_bio_testo").html('Impossibile aggiornare il testo');
                }else{
                    $(".error_sumitomo_bio_testo").html('Testo correttamente aggiornato');
                    $("#sumitomo_biorazionale_testo").empty();
                }
            },
             error: function (request, status, errorThrown){
                    $(".error_sumitomo_bio_testo").html('Impossibile aggiornare il testo');
             }
        });

            $.ajax({
                type: "GET",
                beforeSend: function (request) {           
                  request.setRequestHeader("lang", "it");
                },
                url: "{{ config('constants.UrlWebService') }}api/Site/GetElencoImmagini?IdSezione=32",      
                async:false,
                success: function (result){
                    $.each(result.data, function(index, value){           
                            
                        post_data = '{ "id" : ' + value.id + '}';
                        $.ajax({
                            type: "POST",
                            beforeSend: function (request) {           
                                request.setRequestHeader("Authorization", "Bearer " + token );
                                request.setRequestHeader("lang", "it");
                                request.setRequestHeader("charset" , "utf-8");
                            },
                            url: "{{ config('constants.UrlWebService') }}api/Site/DeleteImmagine?IdSezione=32",      
                            dataType: "json",
                            data: JSON.parse(post_data),
                            success: function (result){$(".preload_img_bio" ).html('');},
                            error: function (request, status, errorThrown){}
                        });
                    });            
                },
                error: function (request, status, errorThrown){}
            });


    });
    /* fine biorazionale */


    $("form.sumitomo_uso_agrofarmaci").submit(function(e) {
        e.preventDefault();

        var Description = CKEDITOR.instances.textareauso_agrofarmaci.getData();
        Description = Description.replace(/(\r\n|\n|\r)/gm, "");
        Description = Description.replace(/"/g,"\\\"");

        post_data='{ "ID" : 9 , "Name" :  "Disclaimer" , "Description": "' + Description + '", "Visibile" : true , "IdPagina" : 10 }';
        $.ajax({
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader("Authorization", "Bearer " + token );
                request.setRequestHeader("lang", "it");
            },
            url: "{{ config('constants.UrlWebService') }}api/Site/UpdateSezione",
            dataType: "json",
            data: JSON.parse(post_data),
            success: function(data){
                if(data.returnCode == '-1'){
                    $(".usoAgrofarmaci").html('Impossibile aggiornare il testo');
                }else{
                    $(".usoAgrofarmaci").html('Testo correttamente aggiornato');
                }
            },
             error: function (request, status, errorThrown){
                    $(".usoAgrofarmaci").html('Impossibile aggiornare il testo');
             }
        });
    });

</script>
@stop
