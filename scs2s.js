// JavaScript Document schub.js
// JS-Functions for client dynamics

// Highlight / put on view elements  //
// o_t-Parameter: calling element via this //
// M-Parameter: for Highlighting this.-.bordercolor/color = 'h' for normal = 'n' //
//              >= 1 put menue-item into view //
//              <= 0 put note-book back into view //
// N-Parameter for extending use of future versions. Hand-over:  //
function IB_B(o_T,M,N)
         {   if(M == 'h'){
             o_T.style.borderStyle = 'inset';o_T.style.borderColor ='grey';o_T.style.color ='#EBD60A';
                         }
                         //close highlight
             if(M == 'n'){
             o_T.style.borderStyle = 'outset';o_T.style.borderColor ='#C3DDF7';o_T.style.color ='white';
                         }
                         // colse normal
   // Attention: this version uses hard-wired ID controlling DOM //
   if(M*1 >= 1 )
      {document.getElementById('s2s_intro_Book1').src = 'graphics/Ringbuch_300_S.png'; 
       document.getElementById('s2s_intro_Etik1').style.display = 'none';
       document.getElementById('intro_book_canvas1').style.display = 'block' ;
       document.getElementById('RBP').style.display = 'inline';
       // This version uses speaking Textbook IDs //
       // Attention: Multiple page Textbook-chapters use Start-Page canvas showing pages following calling-backwards to start-page always show present page //
       //            Productive version need to assign numeric-tail on IDs //
       if(M*1 > 1){document.getElementById('Spiral_Menue').style.display = 'none';}
       if(M*1 == 1){ document.getElementById('intro_book_canvas1').innerHTML = document.getElementById('AR_Intro0').innerHTML ;}
       if(M*1 == 2){ document.getElementById('intro_book_canvas1').innerHTML = document.getElementById('AR_Intro1').innerHTML ;
                     document.getElementById('Intro1_0').innerHTML = document.getElementById('Intro1_1').innerHTML ;
                   }
       if(M*1 == 3){ document.getElementById('intro_book_canvas1').innerHTML = document.getElementById('AR_Intro3').innerHTML ; document.getElementById('Intro3_0').innerHTML = document.getElementById('Intro3_1').innerHTML ; ;}
    // -------------document.getElementById('RBP').style.display = 'none';
}

       if(M*1 == 7){ document.getElementById('intro_book_canvas1').innerHTML = document.getElementById('sc_h_info').innerHTML ;}
      //}
     
      if(M*1 <= 0 )   {
    document.getElementById('s2s_intro_Book1').src = 'graphics/spiral_notebook_yellow_T.png';
    document.getElementById('s2s_intro_Etik1').style.display = 'block';
    document.getElementById('intro_book_canvas1').style.display = 'none' ;
    document.getElementById('RBP').style.display = 'none';
    document.getElementById('Spiral_Menue').style.display = 'inline';
   }
   // close - Restore Notebook //

      // close - open Chapter of Notebook
      // Restore view to closed Notebook //
   

   }
  // Close-Function Chapter.Controll NotebooK //
  
  // controll Forms //
  // controll entry-info //
  function FB_l(o_n,m,r)
          {
           ;
           if(m == '0')
           {document.getElementById(o_n).style.display='none';}
           else
           {document.getElementById(o_n).style.display='block';}
           
          }
 
function validate(text,item,mode) {
            //-- text::String-for-test--//
            //-- item:: ID/name of input-field --//
            //-- mode:: parameter for RegEx-string--//
            //=======================================//
            //-- mode=1::Only a-zA-z0-9 space _- only eng.Characters--//
            //-- mode=2::Only 0-9-.                                 --//
            //-- mode=3::validate email                             --//
            //-- mode=4::validate latitude-hemisphere n/sN/S        --//
            //-- mode=51::validate Latitude Hem+Deg                 --//
            //-- mode=5::validate latitude-Degree 00-89             --//
            //-- mode=6::validate longitude-hemisphere e/wE/W       --//
            //-- mode=7::validate longitude-Degree 00-179           --//
            //-- mode=8::validate minutes 00-59                     --//
            //-- mode=9::validate seconds 00-59[.]0-9{4}            --//
            //-- mode=10::validate WGS-84(GPS) latitude(-S/N)       --//
            //-- mode=11::validate WGS-84 Longitude(-W/E)           --//
            //-- mode=12::validate www-address                      --//
            //-- mode=13::validate Tel-Country-Prefix               --//
            if(mode*1==1){var reg = /^([A-Za-z_\-\.\s]{15,30})$/;}
            if(mode*1==2){var reg = /^[0-9-\.]$/;}
            if(mode*1==3){ var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z0-9]{2,8})$/;}
            if(mode*1==4){var reg= /^([nsNS])$/;}
            if(mode*1==5){var reg =/^[0-9]{1-2}$/;} 
            if(mode*1==6){var reg= /^([weWE])$/;}
            if(mode*1==7){var reg =/^([0-9]{1-3})$/;}
            if(mode*1==8){var reg=/^([0-5]{1})([0-9]{1})$/;}
            if(mode*1==9){var reg=/^([0-5]{1})([0-9]{1})+\.([0-9]{1-4})$/;}
            if(mode*1==12){var reg=/^([0-9a-zA-Z_\.])$/;}

            if (reg.test(text) == false) 
            {   
               // document.getElementById("s2R_email").value = "Invalid Address !";
              
                return (false);
            }
            else
            {
              return(true);
            }
 } 

 function checkUI(text,item,mode){  var err=0;
                                    var tv=text*1;
                                    tv.toFixed(5);
 if(mode*1==1){ if(!Number.isInteger(tv) || tv > 89){err=1;} } //-- check latitude-Degree
 if(mode*1==2){ if(!Number.isInteger(tv) ||tv > 179){err=1;}}  //-- check longitude Degree
 if(mode*1==3){ if(Number.isNaN(tv)){tv = 0;} //-- if NaN then set to 0
                if(Number.isNaN(tv) || tv > 59.999){err=1;} // -- do not accept numbers closer to 60 // false input of dec-minutes is accepted
              }  //-- check minutes-seconds
 if(mode*1==4){ 
                if(text.toUpperCase() != "N" && text.toUpperCase() !="S"){err=1;}
                   else
              {document.getElementById(item).value = text.toUpperCase();} 

               if(document.getElementById('R_latValidate').checked == false)
              //-- processed, when Digital-Latitude is not protected --//
              //-- Convert Deg/Min/Sec to Dec-Degree                  --//
              //-- Check-Deg/Min/Sec is valid                         --//
                { if((document.getElementById('s2R_loclatdeg').value *1) > 89){err=1;}
                  if((document.getElementById('s2R_loclatmin').value *1) > 59){err=1;}
                  if((document.getElementById('s2R_loclatsec').value *1) >= 60){err=1;}
                  if(err==0)
                    {                   
                      var degmin= (document.getElementById('s2R_loclatmin').value *1)*(1/60);
                      var degsec= (document.getElementById('s2R_loclatsec').value *1)*(1/3600);
                      var degdec= document.getElementById('s2R_loclatdeg').value *1 + degmin + degsec;
                      if(text.toUpperCase() == "S"){degdec = degdec*(-1);}
                      document.getElementById('s2R_loclatDec').value = degdec.toFixed(5); 
                    } //-Hemisphere evaluated OK Finished
                }//- Protection is OFF
             


              }//-Mode-4 Check latitude-hemisphere
 if(mode*1==5){ 
                if(text.toUpperCase() != "E" && text.toUpperCase() !="W"){err=1;}
                   else
              {document.getElementById(item).value = text.toUpperCase();} 
                
              if(document.getElementById('R_longValidate').checked == false)
              //-- processed, when Digital-Longetude is not protected --//
              //-- Convert Deg/Min/Sec to Dec-Degree                  --//
              //-- Check-Deg/Min/Sec is valid                         --//
                { if((document.getElementById('s2R_loclongdeg').value *1) > 179){err=1;}
                  if((document.getElementById('s2R_loclongmin').value *1) > 59){err=1;}
                  if((document.getElementById('s2R_loclongsec').value *1) >= 60){err=1;}
                  if(err==0)
                    {                   
                      var degmin= (document.getElementById('s2R_loclongmin').value *1)*(1/60);
                      var degsec= (document.getElementById('s2R_loclongsec').value *1)*(1/3600);
                      var degdec= document.getElementById('s2R_loclongdeg').value *1 + degmin + degsec;
                      if(text.toUpperCase() == "W"){degdec = degdec*(-1);}
                      document.getElementById('s2R_loclongDec').value = degdec.toFixed(5); 
                    } //-Hemisphere evaluated OK Finished
                }//- Protection is OFF
             }//-- Mode was 5 check hemisphere --
 
 if(mode*1==10){  if(tv > 89.999999999 || tv < (-89.999999999)){err=1;} }
 if(mode*1==11){  if(tv > 179.999999999 || tv < (-179.999999999)){err=1;} }
 if(mode*1 == 10 && err==0)
 //======= Calculate Latitude Deg-Min-Sec.sec H ======//
 {
                            if(tv < 0){ document.getElementById('s2R_loclathem').value='S';
                                        tv=tv*((-1));
                                        } else  
                                        { document.getElementById('s2R_loclathem').value='N';}
                            //--Seperate Degree from Latitude.decimal - write to form-field Degree --//            
                            document.getElementById('s2R_loclatdeg').value=Math.trunc(tv);
                            //-- Generate var with decimals of degree.decimals --//
                            var tvd=tv-Math.trunc(tv);
                            //-- Generate var for decimals calculated in Seconds --//
                            var tvs=(tvd-(Math.trunc(tvd/(1/60))*(1/60)))/(1/3600);
                            //-- Generate Minutes to write into latitude-Minutes by: Generate INT seconds/(1/60) write to form-field Minutes --//
                            document.getElementById('s2R_loclatmin').value=Math.trunc(tvd/(1/60));
                            //-- insert Seconds.decimals into form-Field seconds --//
                            document.getElementById('s2R_loclatsec').value=tvs.toFixed(5);
 }
 if(mode*1 == 11 && err==0)
 //======= Calculate Longitude Deg-Min-Sec.sec H ======//
 {
                            if(tv < 0){ document.getElementById('s2R_loclonghem').value='W';
                                        tv=tv*((-1));
                                        } else  
                                        { document.getElementById('s2R_loclonghem').value='E';}
                            //--Seperate Degree from Latitude.decimal - write to form-field Degree --//            
                            document.getElementById('s2R_loclongdeg').value=Math.trunc(tv);
                            //-- Generate var with decimals of degree.decimals --//
                            var tvd=tv-Math.trunc(tv);
                            //-- Generate var for decimals calculated in Seconds --//
                            var tvs=(tvd-(Math.trunc(tvd/(1/60))*(1/60)))/(1/3600);
                            //-- Generate Minutes to write into latitude-Minutes by: Generate INT seconds/(1/60) write to form-field Minutes --//
                            document.getElementById('s2R_loclongmin').value=Math.trunc(tvd/(1/60));
                            //-- insert Seconds.decimals into form-Field seconds --//
                            document.getElementById('s2R_loclongsec').value=tvs.toFixed(5);
 }
 
 if( err > 0){return (false);}else{return (true);}
 
 }


   