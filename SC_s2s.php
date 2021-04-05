
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <link rel="stylesheet" type="text/css" href="scs2s.css">
  
     <meta charset="UTF-8">
     <meta name="generator" content="Bluefish 2.2.7" />
    <title>Sensor.community sensor2school</title>
  </head>
<!-- files css / js via PHP -->  
<script type="text/JavaScript" language="JavaScript" ><?PHP require 'scs2s.js'; ?></script>


<style type="text/css"><?PHP include_once("scs2s.css");?></style>
<!-- files css/JS via PHP -->
<style type="text/css">
#intro_book_canvas1{font-family:cursive;
                    padding:10px;
                    font-size:12pt; 
                    position:relative;
                    top:-1540px;
                    left:80px;
                    width:530px;
                    height:720px;
                    border:double #C4CDDC 3px;
                    z-index:1020;
                    display:none;}             
 .TB_But{
       position:relative;
       width:80px;
       height:60px;
       background-color:#3399ff;
       padding-left:35px; 
       color:white;
       left:10px;
       border:3px outset #C3DDF7;
       border-radius:15px;
       font-family:cursive;

}
.I_3F1_Info {position:relative;
	       top:1px;
	       left:270px;
	       width:250px;
	       height:auto;
	       padding:6px;
	       color:blue;
	       background-color:#ADD8E6;
	       border:outset 4px #BFBFBF;
           display:none;
	       }

 .PgOvr {font-family:cursive;
         font-style:italic;
         font-size:10pt;
         padding:2px;
         border: 3px outset gray;
         border-radius:5px;
         background:#FFcC99;
         color:blue;}
.PgSel{font-family:arial;
         font-style:italic;
         font-size:8pt;
         padding:2px;
         border: 1px solid gray;
         border-radius:5px;
         background:#FFcC99;
         color:blue;}               
 .PgStart {font-family:cursive;
         font-style:italic;
         font-size:10pt;
         padding:2px;
         border: 3px outset gray;
         border-radius:5px;
         background:#FFcC99;
         color:red;}      
.PgCtrl{padding-top:10px;
        padding-left:160px;
        border:none;
        background:transparent;}
        
.S2RF1 {font-size:9pt;
        font-style:italic;
        font-family:serif;}
INPUT {border:1px gray solid;
       border-radius:5px;
       padding:3px;
       border-bottom:inset grey 5px;
        }        
SELECT {border:1px gray solid;
       border-radius:5px;
       padding:3px;
       border-bottom:inset grey 5px;
        } 
        
.R_B_BMT {
       Position:absolute;
       z-index:1300;
       top:415px;
       left:465px;
       width:250px;
       height:auto;
       border:solid 2px rgb(102,204,102);
       background:rgb(204,255,153);
       padding:6px;
       font-size:9pt;
       font-style:italic;
       display:none;
}               
                

</style>

  <body style="background-image:url(graphics/back-003.gif) ;">
  
  
  
  <?PHP
     /*------debugging form-submit stageed--------*/
     if($_POST){
     ?>
      <DIV id="Post" style="position:absolute;left:980px;top:50px;border:solid 2 blue;background:#a0a0a0;padding:8px;"> 
      <B>POST-Data available at Run</b><BR>
     <?PHP
     
     if($_POST["s2RI_Go"] == "Submit_Form1"){
       $JSV="<script type='text/javascript>'";
       echo "<B>Initial Form was submitted and returned for completion the enrolement</b><BR>";
     }
     
     if($_POST["s2R_name"] !="")
     { foreach ($_POST as $k => $v) {
            echo "FormPOST[".$k."] => ".$v."<BR>";
            $JSV=$JSV."document.getElementById('".$k."').value = '".$v."'\n";
     }
     
     }
       $JSV=$JSV."</script>";
    ?>
    </div>
   <?PHP  } ?>

   <?PHP  
   $PgID[0][0] = 1; $PgID[0][1]=9; $PgID[1][1]="1"; $PgID[2][1]="2";$PgID[3][1]="3";$PgID[4][1]="4";$PgID[5][1]="5";$PgID[6][1]="F1"; 
   $PgID[7][1]="F2";$PgID[8][1]="F3";$PgID[9][1]="F4";  
   $PgID[1][2]="Page-1"; $PgID[2][2]="Page-2";$PgID[3][2]="Page-3";$PgID[4][2]="Page-4";$PgID[5][2]="Page-5";$PgID[6][2]="Page-6(Enrole-Request)"; 
   $PgID[7][2]="Profile(Address)";$PgID[8][2]="Profile(POC)";$PgID[9][2]="Profile(Final)";
   
   /*  ==============================================================
    = PHP-Function generating the Menue surfing the Intro-Pages  =
    = Parameters are required to hand over: 
    = Array(PgID[][] holding parts of DOM-IDs Pages              =
    = [0][x] Int Page calling [0][1]=#ofMenue-items              =
    = PgID[n][1]= DOM-ID-Part as Str // PgID[n][2]= Text as Str  =
    = (int Pg)=variable part of the DOM-ID of this Page          =
    ==============================================================*/ 

   
    
   function PgMenue($PgCall){
            global $PgID;
            
            for($z=1;$z <= $PgID[0][1];$z++){
            if($z <> $PgCall){
            echo "<B onClick=\"document.getElementById('Intro3_0').innerHTML = ";
            echo "document.getElementById('Intro3_".$PgID[$z][1]."').innerHTML;\" class=\"PgSel\" >".$PgID[$z][2]."</b>";
           
            }
             if($z==5 ){echo "<BR>";}
            } 
            }
  
function RF_Tel(){
        // writing JS-Array from File ISO639_TelCodes.csv //
        // [0][0]= total entries for loop                 //
        // [0][1]= #entries in record 1-#                 //
        // [0][2]= Language-filename to home-dir          //
        // [0][3]= Tel-filename with path to home-dir     //
        // [loop][1]= ISO-2 upper-case [2]=Dial-Prefix(str)//
        // [loop][3]= Country-Name  (str)                 //
        // [loop][4]= Official Language  (Str)            //
        // [][5]= Language ISO-2 (lowercase)(Str)         //
        // [][6]= Path to Flag-File in include/flags/xx.svg //
        //        !exists = empty-string                  //
        //------------------------------------------------//
        // JS-global array=TelCountry[][]                 //
        // Thanks to  https://hampusborgos.github.io/country-flags/ for the flags //
        // With mode set to /F csv file is written        //
        ////////////////////////////////////////////////////
        $fP_639Tel="include/ISO639_TelCodes.csv";
        //--Country-Name,#Prefix,Country-code #2 / #3--//
        $fP_639_Languages="include/ISO639_LanguageCodes.csv";
        //--Language-Name,2-letter-lowercase,2-letter-uppercase //
        //-- For the majority 2-letter-UC is country#2          //
        $fP_639_Country="include/ISO639_Country_2-3_N.csv";
        //--Country-Name,3-Letter-UC,2-Letter-UC,#UN-CountryNum //
        
        /*----------------------------------------------------------
          - writing global js-ass-array tel-pfx j_tel[iso-2] = pfx -
          - ------------------------------------------------------ -*/
          
          
        



}





   
   ?>
  
 
  <H2 style="padding-left:200px;border:double 3px #ffffff;width:700px;background:#E5E5E5">
  <IMG src="graphics/Globe_2.svg" style="height:50px; background:transparent;" > 
      <IMG src="graphics/School_Pin_143_F.png" style="height:50px; background:transparent;" >
           sensor.community sensor2school Program
            <IMG src="graphics/School_Pin_143_F.png" style="height:50px;" > <IMG src="graphics/HUB_Pin_300T.svg" style="height:50px;" > <IMG src="graphics/LABPin_150T.png" style="height:50px;" >  
  </h2>
  <DIV  id="schub_canvas_main" style="background:gray;background-image:url('graphics/Comp010.jpg'); height:880px; width:880px;" >
     <DIV ID="intro_dis1" style="position:relative;top:40px;left:90px;width:650px;height:820px;">
        <img ID="s2s_intro_Book1" src="graphics/spiral_notebook_yellow_T.png" 
        alt="spiral_notebook_yellow_T.png, 28kB" 
        title="Notebook introducing the sensor.community Program sensor2school" 
        height="778" 
        width="650"
        style="position:relative;z-index:1000;"
        >
                <DIV ID="s2s_intro_Etik1" 
                     style="padding:10px;position:relative;top:-560px; left:240px; width:270px; font-size:22pt;color:blue;font-family:cursive;background:transparent;z-index:1010">
        <B><I>Project - Book<BR>Sensor2School<BR></i></b><br>
        <img src="graphics/Eule_BW1_102.png" width="40px" style="position:relative;top:-40px;" > 
        
       

        </div>
                <DIV ID="RBP" style="position:relative;top:-778px;left:-65px; height:788px;z-index:1021;display:none;">
           <IMG src="graphics/Ringbuch_300_03R_Li.png"  ID="RBPL" style="height:771px; width:80px;">
        </div>

        <DIV ID="intro_book_canvas1">
        <!-- All Display are within this container -->
             
        </div>
  </div>
  <!-- Container for selection explaination Container to be filled with RBBMTx along with chapter # -->
  <DIV ID="R_Book_BMTXT" class="R_B_BMT"></div>
  
  
  
  
  
  
     <!-- following Table is the Intro-Book-Main-Menue -->     
     <TABLE ID="Spiral_Menue" style="position:relative;top:-760px;left:725px;display:inline;border:none;spacing:10px;z-index:120;">
     <!-- menue will be blinded when info is on display except All-About-->
           
     <TR> <!--Select The general introduction to s2s within SC -->
          <TD  class="TB_But"
             onMouseOver="IB_B(this,'h','1');   document.getElementById('R_Book_BMTXT').innerHTML = document.getElementById('RBBMT1').innerHTML;document.getElementById('R_Book_BMTXT').style.display='block';   "
             onMouseOut="IB_B(this,'n','1');  document.getElementById('R_Book_BMTXT').style.display='none';"
             onClick="IB_B(this,'1','1');"
            
             >Intro<BR>(All about)</td> </tr>
     <TR><TD onMouseOver="IB_B(this,'h','2');    document.getElementById('R_Book_BMTXT').innerHTML = document.getElementById('RBBMT2').innerHTML;document.getElementById('R_Book_BMTXT').style.display='block';  "
             onMouseOut="IB_B(this,'n','2');  document.getElementById('R_Book_BMTXT').style.display='none';"
              onClick="IB_B(this,'2','2')"
             ID="bmd2"
             class="TB_But"
             >Intro<BR>S2School</td>
          
      </tr>
     <TR><TD  class="TB_But"
             onMouseOver="IB_B(this,'h','3');    document.getElementById('R_Book_BMTXT').innerHTML = document.getElementById('RBBMT3').innerHTML;document.getElementById('R_Book_BMTXT').style.display='block';  "
             onMouseOut="IB_B(this,'n','3');  document.getElementById('R_Book_BMTXT').style.display='none';"
              onClick="IB_B(this,'3','3');"
             >Enrole for<BR>S2School
             </td> </tr>
     <TR><TD class="TB_But"
             onMouseOver="IB_B(this,'h','4');   document.getElementById('R_Book_BMTXT').innerHTML = document.getElementById('RBBMT4').innerHTML;document.getElementById('R_Book_BMTXT').style.display='block';  "
             onMouseOut="IB_B(this,'n','4');  document.getElementById('R_Book_BMTXT').style.display='none';"
              onClick="IB_B(this,'4');"
             >Get Sensor<BR>Going</td> </tr>
     <TR><TD class="TB_But"
             onMouseOver="IB_B(this,'h','5');   document.getElementById('R_Book_BMTXT').innerHTML = document.getElementById('RBBMT5').innerHTML;document.getElementById('R_Book_BMTXT').style.display='block';  "
             onMouseOut="IB_B(this,'n','5');  document.getElementById('R_Book_BMTXT').style.display='none';"
              onClick="IB_B(this,'5','5');"
             >Sensor<BR>Registration</td> </tr>
     <TR><TD class="TB_But"
             onMouseOver="IB_B(this,'h','6');   document.getElementById('R_Book_BMTXT').innerHTML = document.getElementById('RBBMT6').innerHTML;document.getElementById('R_Book_BMTXT').style.display='block';  "
             onMouseOut="IB_B(this,'n','6');  document.getElementById('R_Book_BMTXT').style.display='none';"
              onClick="IB_B(this,'6');"
             onMouseOut="IB_B(this,'0');"
             >Hobby-Shop(LAB)<BR>Info</td> </tr>
     <TR><TD class="TB_But"
             onMouseOver="IB_B(this,'h','7');   document.getElementById('R_Book_BMTXT').innerHTML = document.getElementById('RBBMT7').innerHTML;document.getElementById('R_Book_BMTXT').style.display='block';   "
             onMouseOut="IB_B(this,'n','7'); document.getElementById('R_Book_BMTXT').style.display='none';  "
              onClick="IB_B(this,'7');"
             >HQ<BR>Site(HUB)</td> </tr>
     <TR><TD class="TB_But"
             onMouseOver="IB_B(this,'h','8');   document.getElementById('R_Book_BMTXT').innerHTML = document.getElementById('RBBMT8').innerHTML;document.getElementById('R_Book_BMTXT').style.display='block'; "
             onMouseOut="IB_B(this,'n','8');  document.getElementById('R_Book_BMTXT').style.display='none';"
              onClick="IB_B(this,'8');"
             >Sensor2School<BR>on WWW</td> </tr>
     <TR><TD class="TB_But"
             onMouseOver="IB_B(this,'h','9');   document.getElementById('R_Book_BMTXT').innerHTML = document.getElementById('RBBMT9').innerHTML;document.getElementById('R_Book_BMTXT').style.display='block'; "
             onMouseOut="IB_B(this,'n','9');  document.getElementById('R_Book_BMTXT').style.display='none';"
              onClick="IB_B(this,'9');"
             >Teachers<BR>Corner</td> </tr>
     <TR><TD class="TB_But"
             onMouseOver="IB_B(this,'h','10');   document.getElementById('R_Book_BMTXT').innerHTML = document.getElementById('RBBMT10').innerHTML;document.getElementById('R_Book_BMTXT').style.display='block'; "
             onMouseOut="IB_B(this,'n','10');  document.getElementById('R_Book_BMTXT').style.display='none';"
              onClick="IB_B(this,'10');"
             >Other<BR>Programms<BR>Campaigns</td> </tr>
    
    </table>
   
  
   <IMG src="graphics/grafik1.jpg" style="background:#fad0d0;height:610px;display:none;">  
   
  
<DIV style="display:none;">  
  
<!------------------------------------------------------------------------------------------------
  --  Start of TEXT definition for to be copied into display-container on                       --
  --  Menue selection. visibility is through                                                    --
  --  js-function IB_B((obj)DOM-Obj:menue,(int:1-n)#item-selected-menue.(int:1-n)#not used yet) --
  --  ----------------------------------------------------------------------------------------  --
  --> 
  <!--  --  -- about LABs --  --  -->
  
  
  
  <!--  --  -- about >
  
  
  
  <!-- --  -- about HUBs -- --> 
  <!-- This is Part 7/1 of the Bookmarked introduction -->
  <DIV id="sc_h_info" ><B><I><U>What are HUBs anyhow?</b></i></u><BR>The <B>Sensor.community</b> organisational structures are made up of 'HUBs' dealing with the 
                      operation and planning the <B>Sensor.community</b> in their area of watch. That could be a country 
                      but it could be also a region, a city or a special event.<BR>
                      <IMG src="graphics/Global_Net_People1.png" style="padding:2px;border:solid 2px gray; height:80px;float:left;margin:5px;">
                      HUBs are the management points, where the global <B>Sensor.community</b> policy is published, adjusted, 
                      introduced, to fit into the very situation, lawfully, politically and culturally, for the HUBs footprint.<BR>
                      <IMG src="graphics/CompTable1.png" style="padding:2px;border:solid 2px gray; height:80px;float:right;margin:5px;">
                      Registered supporters of the <B>Sensor.community</b> are invited by the HQ-<B>Sensor.community</b>, in organizational terms 
                      called the 'root-HUB', to organize, register and establish the HUB-committee.<BR> 
                      
                      HUBs are identified through the maps.sensor.community.<BR>
                      <IMG src="graphics/HUB_Pin_300.png" style="padding:2px;border:solid 2px gray; height:80px;float:left;margin:5px;"> The pin-icon is a Globe with Manual.<BR>
                      
                      <B>Sensor.community</b> is the very special service-provider for the global community operating sensor-nodes. Language, culture, 
                      legal-systems, need to be handeled for the community within the HUB. <BR>
                      Be aware, there is the community of sensor-operators, where just the registration for the device and the contact is required to be given. 
                      These are the most valuable contributors.<BR>
                      <IMG src="graphics/NetOfPeopleICO_300.jpg" style="padding:2px;border:solid 2px gray; height:80px;float:left;margin:5px;"> But there is also the community of supporters of the <B>Sensor.community</b>. These individuals have decided to 
                      get registered within the support-organization, get and keeping the <B>Sensor.community</b> in shape and capacity to fit the job.<BR>
                      
    <DIV class="PgCtrl">                   
       <B onClick="document.getElementById('sc_h_info').style.display='none';IB_B('-','-1'); " 
          class="PgStart">Close Notebook</b>
         
        <B onClick="document.getElementById('intro_book_canvas1').innerHTML = document.getElementById('sc_AF_info').innerHTML;"
           class="PgOvr">Next Page HUB-Process
      </b>
    
    </div>
  </div>
  <DIV ID="RBBMT7" style="display:none;">
  Select this Bookmark for reading the first introduction to the Organization structure: HUB.<BR>
  This intro consits of 2 Pages. This is to get a clou of sensor.community backend work for you.<BR>
  <B>Leaving the bookmark</b> will close this hint.
  </div>
<!-- This is Part 7/2 of the Bookmarked introduction -->
<DIV id="sc_AF_info"><B><I><U>What's an HUB PROCESS anyhow?</b></i></u><BR>
                      The <B>Sensor.community</b> organisational structures are made up of 'HUBs' dealing with the 
                      operation and planning the <B>Sensor.community</b> in their area of watch. HUBs speak for sensor.community.<BR>
                      The authority of an HUB is defined through a 'Memorandum of Understanding'(MoU). It is like a contract between the 
                      Infrastructure operating 'root-HUB' and the new HUB to be established.<BR>
                      The process distinguishes between the type of HUB. It also generates document-structures and communication-structures for the HUB (Mattermost)<BR>
                      It is known, foreign language comprehention requires exercises and practice. HUBs have a crucial function to maintain an interface 
                      between the native language and the working language of <B>Sensor.community</b>, that is English [EN].<BR>
                      The next-following organizational-element, the LAB, is the place to be! There the makers gather to help, to make contact with 
                      sponsors and do projects. For the people in the HUB to assist people in the LABs, the HUB-Process need to know, what LABs, what projects, 
                      what campaign-Elements are belonging to it.<BR>
                      Because <B>Sensor.community</b> is an open-community, focal documents, project-reports, calendars, etc , need to be made available in EN too. The entire 
                      organizational elements (HUB/LAB/CAMPAIGN/...) have a filing-help. As the directory-service, a reduced X.500 is used.<BR>
                      (The insides of the schema will be published when ready.) The HUB-Process is a functional part of the SC-Directory-Service<BR>
              <DIV class="PgCtrl">                   
                   <B onClick="document.getElementById('sc_AF_info').style.display='none';IB_B('-',-1); " 
                      class="PgStart">Close Notebook
                   </b>
              </div>
  </div>            
<!-- This is Part 1 of the Bookmarked introduction -->
  <div ID="AR_Intro0" >
    <B><I><U>The Sensor-2-School Application-Process</b></i></u><BR>
      <IMG src="graphics/DBSK37.png" style="padding:2px;border:solid 2px gray; height:80px;float:left;margin:5px;" >
      Sensor.community is the largest 'Contributor-driven' open-data sensor network. Thousands of sensors around the world report their values 
      for to be displayed, but more importantly, being available as current or historic data for analytics or complex processing through 
      Artificial-Intelligence(AI) by citizens-scientists.<IMG src="graphics/NetOfPeopleICO_web.jpg" style="padding:2px;border:solid 2px gray; height:80px;float:left;margin:5px;" ><BR>
      The required 'smart doing' for to cope with the dramatically changing living-conditions on planet earth need data for to force 
      'Decission-Makers' but also to generate transparency.<BR>
      <IMG src="graphics/E_Cough1.png" style="padding:2px;border:solid 2px gray; height:80px;float:right;" >The human generation at school at this time is facing the deep impact of changes to living conditions, as well as they are facing the need 
      as to analyse data for to find solutions and to plot success or failiure. The grid-step-width of official sensors is not yet and will never be 
      fine enough to evaluate the living conditions for individuals or specific locations.<BR>
      One very special place to live is the school or the schools for kids, teachers, students, for half the awake time a day. It is obvious, the conditions 
      shall be monitored and published these people have to face, since there is no choise, kids have to learn to manage life and job. The activists and contributors 
      to sensor.community are parents or grand-parents or citizens being aware of the responsibility for the comming generations. 
      <IMG src="graphics/S2S_cert1.png" style="padding:2px;border:solid 2px gray; height:80px;float:right;" ><BR>This is the motivation 
      as to role-out a program to encourage and support every school in the world for to monitor conditions through sensor-operation.<BR><BR><BR> 
  
    <DIV onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "> 
        <B class="PgStart">Close Notebook</b> 
    </div>
    
    </div>
    <!-- this is the bookmark-1 hint for pages 1 -->
  <DIV ID="RBBMT1" style="display:none;">
  Select this Bookmark for reading the first introduction to the Sensor2School Program and the appliance-Process.<BR>
  This is the first hint, how it goes.<BR>
  Leaving the bookmark will close this hint.
  </div>

<!-- This is Container-2 of the Bookmarked introduction -->
  <div ID="AR_Intro1" >
    <B><I><U>The Sensor-2-School Program</b></i></u><BR>
    <DIV ID="Intro1_0"></div>
  </div>  
<!-- This is Part 2-1 of the Bookmarked introduction -->
      <DIV ID="Intro1_1">
      Sensor.community(SC) is the largest 'Contributor-driven' open-data sensor network.<BR> Everybody can set up a sensor-site and register with SC-HQ 
      regardless of intention or motivation. The required instructions are available through the SC-Web-Site. The hardware for the micro-controller 
      and sensors is 'Open Source' that is: all specs are available.<BR> To function as a sensor-site, a special software for the microntrolle is required. That is also 
      open source. That is: The code with readable instructions is available. Everybody who has the knowledge may make changes to it to fit the intended purpose. 
      There is a rule-set programmers have agreed to, a license-agreement, how to do that.<BR> The world is changing and spinning very fast. 
      Sensors and controllers up-to-date today, are old fashion tomorrow. 
      Programmers and developers around the world are dedicated to adjust and to finetune and to keep new things going and fit to new ideas.<BR>
      This could be confusing for newcommers. But this is also an exiting universe!<BR>
      SC-Staff has made the decission, to guide people around the world and to invite for participation. 
      Before the sensor2school program/campaign was started, people learned where ever about SC and started to learn.<BR> 
      Learning is the domain of schools. Thus, what is more appropriate to provide students with help and giving the chance to schools joining the program 
      for showing how applied physics, applied chemistry, applied environmental protection looks like.<BR><BR>
      <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "
         class="PgStart">Close Notebook
      </b> 
      <B onClick="document.getElementById('Intro1_0').innerHTML = document.getElementById('Intro1_2').innerHTML;"
         class="PgOvr">Next Page(2)</b>
      </div>
<!-- This is Part 2-2 of the Bookmarked introduction -->
      <DIV ID="Intro1_2" style="display:none;">-P2-<BR> 
      Good scientific practice is to base conclusion on facts. Facts are numbers and values. 
      Human senses are a miracle, but they don't produce fact sheets with temperature, moisture, air-presure, particle-count, soil-moisture, nuclear-radiation, and so on!<BR>
      With all that data, human brains are needed then again. And it is like learning school-math: 1+1=2 need the same rules than 4+sqr(22)=8.6904. Students need to learn 
      what exists, how to make use of it and what it can be used for. First learn ABC and then after a while write a book.<BR>
      With the sensor2school(S2S) Program we will do exactly that. The chapters(classes) of enroled schools set up a standard sensor-site for 'Particular Matter'(micron-dust), 
      register it with Sensor.community through the campus WLAN and then learn about technology, writing small programms, learn about sensors.<BR>
      But there will be more. SC will provide Instructor(teacher) guidance, for understanding technical sensing compared with human sensing. 
      It is quite obvious why human need his senses for living. It is exiting to learn, how technical sensing can enrich living and it is an even more exciting jurney to learn 
      making use of sensor-data to explore hidden facts, later.<BR><BR>
      <B onClick="document.getElementById('Intro1_0').innerHTML = document.getElementById('Intro1_1').innerHTML;"
         class="PgOvr">Page(1)before
      </b>

      <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "
         class="PgStart">Close Notebook
      </b> 
      <B onClick="document.getElementById('Intro1_0').innerHTML = document.getElementById('Intro1_3').innerHTML;"
         class="PgOvr">Next Page(3)
      </b>
      </div>
<!-- This is Part 2-3 of the Bookmarked introduction -->
      <DIV ID="Intro1_3" style="display:none;">-P3-<BR> 
      Not all pf that might be possible in one semester. In fact, it is not planned that way. SC will provide guidance for the level of students to have fun with little things 
      in the beginning and real science-analytics and data-services, all associated with the very school and among schools.<BR> 
      Every country, even every city, has some specialities about and with their schools. Obviously it is language, but also rules an law. For this reason, a dialogue 
      between schools and between sensor.community and schools, tachers(instructors), make things much easier and fun! The 'Program-Manager' at sensor.community 
      will assist for the first steps. There are some more programs and a lot to share and gain - let's GO.<BR>
      The S2S-Program offers a little goody to registered schools: Within the registration-data, schools provide theire Latitude/longitude position, some standard pictures, 
      the school-'point-of-contact', some introduction-words about the school, the WWW of the school.<BR> Every registered school is identified with the 
      sensor.community S2S-Pin on the world-map. Sensor.community as a sensor-platform is a world-wide service. The programs provide the chance becomming a member 
      of the family exploring the world.
      <BR><BR>
      <B onClick="document.getElementById('Intro1_0').innerHTML = document.getElementById('Intro1_1').innerHTML;"
         class="PgOvr">Page(1)before
      </b>
      <B onClick="document.getElementById('Intro1_0').innerHTML = document.getElementById('Intro1_2').innerHTML;"
         class="PgOvr">Page(2)before
      </b>

      <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "
           class="PgStart">Close Notebook
      </b> 
    </div>
    <!-- this is the bookmark-1 hint for pages 1 -->
  <DIV ID="RBBMT2" style="display:none;">
  Select this Bookmark for reading the overview of the Sensor2School Program and the appliance-Process.<BR>
  This is to evaluate the program and the appliance-process that followes, if you wish. It can be only the first hint, how it goes. 
  There are thousands of sensor-operators in the world and each one has other views.<BR> this chapter has 3 Pages<BR>
  Leaving the bookmark will close this hint.
  </div>
    
    




<?PHP
  
  
  

?>  

<script type="text/javascript">

//-- scripting the menue for Intro-pages -->
//-- defining global vars for the menue-System --//
//---------- This function is for prototyping ----------------//

var PgID = new Array(10);               // 10 rows of the table
for(var i = 0; i < PgID.length; i++)
   { PgID[i] = new Array(5); }
   PgID[0][0]=9; //--holding #of Menue-Items(1-) --//
   PgID[0][1]=1; //--holding current Page to display //
   PgID[0][2]="Intro3_0"; //holding ID of Canvas to display Page //
   PgID[0][3]="T"; //-holding: "T"=Menue on Top-of Page "B"=Menue Bottom-of page //
   PgID[1][0]="Intro3_"; //holding 1st part of Page-ID //
   PgID[1][1]="1"; //holding 2st part of Page-ID //
   PgID[2][1]="2"; //holding 2st part of Page-ID //
   PgID[3][1]="3"; //holding 2st part of Page-ID //
   PgID[4][1]="4"; //holding 2st part of Page-ID //
   PgID[5][1]="5"; //holding 2st part of Page-ID //
   PgID[6][1]="F1"; //holding 2st part of Page-ID //
   PgID[7][1]="F2"; //holding 2st part of Page-ID //
   PgID[8][1]="F3"; //holding 2st part of Page-ID //
   PgID[9][1]="F4"; //holding 2st part of Page-ID //
   PgID[1][2]="Page-1"; //holding 2st part of Page-ID //
   PgID[2][2]="Page-2"; //holding 2st part of Page-ID //
   PgID[3][2]="Page-3"; //holding 2st part of Page-ID //
   PgID[4][2]="Page-4"; //holding 2st part of Page-ID //
   PgID[5][2]="Page-5"; //holding 2st part of Page-ID //
   PgID[6][2]="Pg-6(Enrole-Request)"; //holding 2st part of Page-ID //
   PgID[7][2]="Pg-7(Profile(Address))"; //holding 2st part of Page-ID //
   PgID[8][2]="Pg-8(Profile(POC))"; //holding 2st part of Page-ID //
   PgID[9][2]="Pg-9(Profile(Final))"; //holding 2st part of Page-ID //

function MenIntro()
{ //--------- Format a string to hold text to be inserted into PgID[0][2]-innerHTML --//
  //--count through # of pages to display as by [0][0]--//
  var PgMen = ""; //--Var to hold menue-string--//
  for(c=1;c <= (PgID[0][0]*1);c++)
     {
     //-- no menue item for this page displayed --//
     if(c != PgID[0][1])
         {
           PgMen = PgMen + "<B onClick=\"document.getElementById(\'"+PgID[0][2]+"\').innerHTML = ";
           if(PgID[0][3] == "T" ){PgMen = PgMen + "PgID[0][1] = "+c+" ; MenIntro() ; ";}
           PgMen = PgMen +"document.getElementById(\'"+PgID[c][0]+PgID[c][1]+"\').innerHTML ; ";
           if(PgID[0][3] == "B" ){PgMen = PgMen + "PgID[0][1] = "+c+" ; MenIntro() ; ";}
           PgMen = PgMen + " \n";
           PgMen = PgMen + "class=\"PgSel\">"+PgID[c][2]+"</b>\n";
           
         } //--close is not this page--//
  } //-- close for

  return PgMen;


}



</script>
  
    
  <div ID="AR_Intro3" style="display:none;" >
           <DIV ID="Intro3_0"></div>

      <DIV ID="Intro3_1" style="display:none;">
    <B><I><U>The Sensor-2-School Program</b></i></u> <I style="text-align:right;">(enrole for S2S )</i><BR>
    <?PHP $PgID[0][0]= 1; $X=PgMenue($PgID[0][0]); ?>
      <BR>
      
      
      
      
      <I style="font-size:9pt;align:right;">(page-1-)</i><BR>

      Sensor2school is a program within sensor.community, supporting schools through organization-Elements.<BR><BR> Here we give background and lead you through the  
      'request-for-enrole' scheme. This means:<BR>
      <LI>All organization-Elements within sensor.community are to support communication, colaboration, organizing, representing. 
      <LI>The TOP-community-structures are the HUBs, supporting on the georaphic/national level. The root-element ist the root-HUB, providing 
      the EU-Environment and the SC-Infrastructure is operated. Language is EN. All other HUBs are established on needs of the community. 
      Recommendation is to establish HUBs for languages, countries, regions.<LI> HUBs are operated through sc-contributor-individuals, 
      forming committees.<LI>An other organization-Element is the LAB.<BR> LABs are established by sc-contributing individuals, 
      also forming committees.<LI>LABs are the actual playground maintaining sensor-nodes and introducing SC to the public. 
      <LI>LABs are point-of-contact for the local/regional/national public.<LI> Thus, HUBs / LABs have an important function comming over 
      the language/cultural-barrier. <LI>The Rule-set, especially lawfully acting, is set by HUB/LAB agreements.<BR>
      <B  onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1,''); "
         class="PgStart">Close Notebook
      </b> 
      <B onClick="document.getElementById('Intro3_0').innerHTML = document.getElementById('Intro3_2').innerHTML;"
         class="PgOvr" >Next Page(2)</b>

   </div>
      <DIV ID="Intro3_2" style="display:none;">
                <?PHP $PgID[0][0]= 2; $X=PgMenue($PgID[0][0]); ?>

      <BR>

      <I style="align:text-right;">(enrole for S2S page:2)</i>
      <LI>In case S2S-organization elemets have no national HUB-Elements yet, the root-HUB accommodates the programm-elements.
      <LI>In case S2S-organization elements have no LAB-support yet, s2s-elements may establish a proforma-LAB as an exception to the rule.
      <LI>The recommended organisational cluster is a S2S/LAB/S2L(library).
      <LI>The registered S2S-Element is identified by name and location(GEO-Ref). The global-communication is based on [EN] 
      language and LATIN Character-set.
      <LI>The S2S-Element (primarily schools) provide the registration data through the S2S-Request-Form and receive endorsement from the root-HUB or the HUB 
      where the GEO-Ref foot-print is covered.<BR> Normally, there is support for the S2S-Element from the closest SC-LAB. In case there is none, 
      the S2S-Element may become granted LAB privileges. In that case, the POC of the S2S-Element need to be a registered SC-contributor-individual and 
      granted access to the chat.sensor.community/sensor2school channel.(Interneal sensor.community management)<BR>Note: In that case aditional information has to be provided for the LAB-Registration.<BR><BR>
       <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B(this,'-1'); "
         class="PgStart">Close Notebook
      </b> 
      <B onClick="document.getElementById('Intro3_0').innerHTML = document.getElementById('Intro3_3').innerHTML;"
         class="PgOvr" >Next Page(3)</b>

   </div>
      <DIV ID="Intro3_3" style="display:none;">
          <?PHP $PgID[0][0]= 3; $X=PgMenue($PgID[0][0]); ?>

      <BR>

      <I style="align:right;">(enrole for S2S page:3)</i>
      <U>Please note:</u> There might be hundereds of s2s-elements, even in one country.<BR> 
      The naming is a serious act in that way. Thus, the s2s-element will recieve 
      a cryptic name (behind the scenes), linked with the clear-text name. The name can be local language.<BR> 
      this could cause difficulties interacting internationally.<BR>
      <LI>Language is part of culture. Sensor.community promotes the idea of cultural identity without borders in minds. 
      Especially for children in school, the idea of 
      <LI>global citizenschip <LI>global responsibility <LI>global friendschip <BR>includes the respect for foreign 
      culture with common language, <LI>that is by international 
      standards the Air / Maritime English.<BR> 
      All forms, procedures, guidlines etc. in sensor.community use Latin-leters and english-spelling. 
      If available, the content of the s2s-Element procedures and instructions can be in local-language. 
      <LI>Communication to the international community shall be english.<BR>
       <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B(this,'-1'); "
         class="PgStart">Close Notebook
      </b> 
      <B onClick="document.getElementById('Intro3_0').innerHTML = document.getElementById('Intro3_4').innerHTML;"
         class="PgOvr" >Next Page(4)</b>
   </div>
     
      <DIV ID="Intro3_4" style="display:none;">
          <?PHP $PgID[0][0]= 4; $X=PgMenue($PgID[0][0]); ?>

      

      <BR><U>About the Registration Process:</u> <I style="align:right;">(enrole for S2S page:4)</i><BR>
      
      <LI>You will be asked to provide a name for your facility(school). 
      <LI>It schould be meaningfull, but not too long. <LI>You might want to look up, what --names are already on record--. 
      <LI><B>When we process your initial request successfully, we will assign a cryptic ID</b>; that'll be the S2S-internal key for 
      the lifetime of your registration and you need to tell us when you want us to do something to your reccord.(That'll be an on-line process)<BR>
      <LI>We will do some validation on the data you'll send to us. This is to protect your information and to ensure 
      the many S2S-Entities live in harmony together. <LI><B>A big one is the EMail-Address</b> you give to us. We are going to use 
      it for the registration process and it'll be the main-gate for you to make friends in the sensor.community.<BR>
      <LI><B>An other big one is the Address of the homepage of your facility(school)</b>. We need it for -at least- 2 reasons: 
      <LI>(A) we will ensure it is working because we will put it behind the Pin on the map. <LI>(B)We encourage you to out an 
      HTML-Document on your website telling the world what you are doing about Sensor2School. <LI>That'll be the rocking place. 
      It was nice, when all schools of the world in the program had a Document with the same name.<BR>
      <LI>We ask you to give us the country the facility(school) is located and the primary language spoken.<BR> 
      The country is to be selected from the ISO-list of countries.<BR> The language spoken is a help to us, 
      to make priorities in internationaliztion for the S2S-Program.<BR>
      <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "
         class="PgStart">Close Notebook
      </b> 
      <B onClick="document.getElementById('Intro3_0').innerHTML = document.getElementById('Intro3_5').innerHTML;"
         class="PgOvr" >Next Page(5)</b>
      </div>
      
      
      
      <DIV ID="Intro3_5" style="display:none;">
          <?PHP $PgID[0][0]= 5; $X=PgMenue($PgID[0][0]); ?>

      <BR>

      <BR><U>About the Registration Process:</u> <I style="align:right;">(enrole for S2S page:5)</i><BR>
      
       <LI><B>The most important information creating a pin on a map, 
      is the geographical position</b>.<IMG src="graphics/EARTHB2.GIF" height="25px"> So, we ask you the position reported in the GOOGLE-Standard. 
      00&#186; 00' 00.0" E,  000&#186; 00' 00.0" N <BR>
      or the Degree-Decimal. First you find with GOOGLE-Earth or Navigation-Aid from Car or Your Smartphone.<BR>
      Second, Look like '(-)00.00000000 / (-)000.00000000' you find from 'maps.sensor.community' ((C)OpenStreetMap) 
      or from Navigation-aid or <IMG src="graphics/WorldPlugged1.png" height="25px">Your smartphone<BR> 
      How to do that and more, we spent en entire 'what about...' on Location and locating.<BR>
      Even important is the 'Name' of the school. All schools in the sensor2school program can be looked up. It need to be only ONE with the 
      name in that City/Country! Do not repeat City/Country. <BR>
      EMail-address we ask is for the registration-process. We will not publish it.<BR>
      Differently the WWW-Address we ask for. This will pop-up when the Pin on the map is clicked! Both, EMail and www we will check, before 
      you see the pin on the map.<BR>
      The language you use! We, sensor.community, are 'globalists'. When we work, we like our mother-toung! When we work together, we do that mostly in English. 
      When you scroll through Countries, you see a 'Flag', where sensor.community is used and supported. For Languages, a 'Flag' 
      indicates, the sensor.community web-page supports that.<BR>  
      For now, here followes a little help providing the coordinate for the registration-form: Page 5-1!
      
     .<BR>
      <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "
         class="PgStart">Close Notebook
      </b> 
      <B onClick="document.getElementById('Intro3_0').innerHTML = document.getElementById('Intro3_51').innerHTML;"
         class="PgOvr" >Next Page 5-1</b>
      </div>

      <DIV ID="Intro3_51" style="display:none;">
          <?PHP $PgID[0][0]= 6; $X=PgMenue($PgID[0][0]); ?>

      <BR>

      <BR><U>About the Registration Process:</u> <I style="align:right;">(enrole for S2S page:5-1)</i><BR>
      <B>Retrieve Coordinates (decimals) from Sensor.Community-Map</b><BR>
      <BR>Call the <B>map.sensor.community</b>, arrange the map for your school in the middle, 
      click in the URL where it reads #xx/.., make it 15 (highest resolution is 16), call up the map again. Now move the hand-cursor to the entry of your school and click. 
      The coordinates in the URL now show exacly that point.<BR> Now we start to copy and pace.<BR> Now mark(make it blue) the first coordinate and punch CTRL and C. 
      Go to the sensor2school Notebook, open the chapter enrolement, 
      open Page-6(Form Pg1), below the Field-mask for Latitude you see a field marked: Latitude-Decimal. Click into that field and punch CTRL and V. Click to leave the field.<BR> 
      Now you may notice, the form has converted the decimal figure to the propper Coordinate with Deg/Min/Sec/Hemisphere.<BR>
      You do the same with the 2nd coordinate(Longitude) of maps.sensor.community and you are done with the Pin-Coordinate this way.<BR><BR>
      This days many cars have NAVIgation-aids. Little devices with displays. The Heart of it is a GPS-Receiver. Sattelites provide signals, the devices use to calculate 
      the Position. Almost all of them display the present coordinates, primarily in Decimal notation. You could also punch in those figures. It works too!<BR><BR>
      
     
      <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "
         class="PgStart">Close Notebook
      </b> 
      <B onClick="document.getElementById('Intro3_0').innerHTML = document.getElementById('Intro3_F1').innerHTML;"
         class="PgOvr" >Next Request-Form-1</b>
      </div>









      <DIV ID="Intro3_F1" class="I_3F1_Info">
          <?PHP $PgID[0][0]= 6; $X=PgMenue($PgID[0][0]); ?>

      <BR>

       <I style="align:right;">(enrole for S2S page:6)</i>
       <BR>
         <H3>sensor2school participation request Form(1)</H3>
         <FORM ID="S2R_InitForm" name="S2R_InitForm" method="POST" autocomplete="off">
         <I ID="S2RF1H" class="S2RF1"><B><<<(School)>>></b></i>
       <DIV style="border:double 3px gray;padding:5px;border-radius:5px;" >  

         <span style="font-family:arial;font-size:10pt;">
         <I class="S2RF1">Name_______:</i> 
         <INPUT name="s2R_name"  ID="s2R_name"
                type="text"
                size="30"
                maxlength="30"
                style="border:1px gray solid;border-radius:5px;padding:3px;border-bottom:inset grey 5px;" 
                onFocus="FB_l('I_3F1_01','1');"
                onBlur="FB_l('I_3F1_01','0','T');if(validate(this.value,'s2R_name',1)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}" 
                > 
         <DIV  ID="I_3F1_01" class="I_3F1_Info">
         Provide the Name of your school. 15 - 30 Chr. Talking Name. 
         This name will be used:Pin Plaque, register of S2S-Elements, SC-WebPage, with sensor-nodes 500 Meter-circle. 
         All characters NOT a-z, A-Z, 0-9, (- space) are deleted (pirate scripting prevention).[ close ]
         </DIV>
       
         <BR>
          <I class="S2RF1">Country_____:</i> 
        
         <SELECT name="s2R_Country"  ID="s2R_Country"
                size="1"
                onFocus="document.getElementById('I_3F1_03').style.display ='block'"
                onBlur ="document.getElementById('I_3F1_03').style.display ='none';" 
                >
                <OPTION disabled >------Most used------</option>
                <OPTION value="GE"selected >Germany</option>
                <OPTION value="FR" >France</option>
                <OPTION value="BE" >Belgium</option>
                <OPTION value="NL" >Netherlands</option>
                <OPTION value="LX" >Luxembourg</option>
                <OPTION value="IT" >Italy</option>
                <OPTION value="UK" >United Kingdom</option>
                <OPTION value="US" >United States</option>
                <OPTION value="CA" >Canada</option>
                <OPTION value="PO" >Portugal</option>
                <OPTION value="GR" >Greek</option>
                <OPTION value="S" >Sweden</option>
                <OPTION value="DK" >Denmark</option>
                <OPTION value="RU" >Rushian Federation</option>
                <OPTION disabled  >----Full ISO3166----</option>
                <?PHP include "include/SOG_Country.csv"; ?>
          </select><BR>
<!--          
          <I class="S2RF1">Associated Telephone Prefix::</i>

          <DIV ID="s2R_TelCountry" 
               style="display:inline;border:3px outset grey;padding:5px;font-size:9pt;width:auto;color:blue;" 
               class="" >
               +(49)
          </div>
 -->               
         <DIV  ID="I_3F1_03" class="I_3F1_Info">
              Select the country your school is located in. This us used to complete the adress and location. This is mandatory. Incase your country is 
              not in the list, contact the sensor.community staff. 
         </DIV>
         
          <I class="S2RF1">Language____:</i> 
         <SELECT name="s2R_Language" 
                size="1"
                ID="s2R_Language"
                onFocus="document.getElementById('I_3F1_02').style.display ='block'"
                onBlur="document.getElementById('I_3F1_02').style.display ='none'" 
                >
                
                <OPTION disabled >-----Most used-----</option>
                <OPTION value="en" selected>English(US/GB/AUS/NZ/CA)</option>
                <OPTION value="de" >German</option>
                <OPTION value="fr" >French(FR/BE/CA)</option>
                <OPTION value="it" >Italian</option>
                <OPTION value="es" >Spanish(SP/US/S-Amerika)</option>
                <OPTION value="pt" >Portugisian(PO/S-Amerika)</option>
                <OPTION value="gr" >Greek</option>
                <OPTION value="dk" >Denish</option>
                <OPTION value="nl" >Dutch</option>
                <OPTION value="ru" >Rushian</option>
                <OPTION disabled>-------Full ISO639------</option>

                 <?PHP include "include/SOG_Language.csv"; ?>
                 
                 
                 
         </select><BR>
         <DIV  ID="I_3F1_02" class="I_3F1_Info">
              Select the native language of your school. This is the message, which language is normally used at your school. 
              In case it is multi-langual, select the most used. Be aware: For the sensor2school program, the character set will be latin 
              for to ensure, all information is internationally suitable. This is NOT discreminating culture or identity. This is, because the 
              majority is using this typing. 
         </DIV>

         
         
          <I class="S2RF1">Email_______:</i> 
                <INPUT name="s2R_email"
                ID="s2R_email" 
                type="text"
                size="30"
                maxlength="64" 
                onFocus="document.getElementById('I_3F1_04').style.display ='block'; "
                onBlur="document.getElementById('I_3F1_04').style.display ='none'; if(validate(this.value,'s2R_email',3)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}" 
                ><INPUT type="checkbox" 
                        name="s2R_MailValidate" 
                        value="Override" 
                        ID="R_MailValidate">
                        <I style="font-size:8pt;">Override Mail-format-check</i> 
         <BR>
         <DIV  ID="I_3F1_04" class="I_3F1_Info">
              Provide the E-Mail-Address of your facility(school) used to administer the registration-process. Be sure, 
              you spell it correctly! We will use this address to confirm identity and verify. After registration, 
              this is the email people around the world will use to get in touch with you. 
              Only characters a-z, A-Z, 0-9, (_ / . / @) are accepted. At least 1 dot(.) after(@)<BR><I style="color:red";>This check is performed automatically. There are rare exceptions 
              to the rules. When the Frame around is red, PLEASE check the address carefully for typos! you click in to correct or you click to the 'Override' checkbox.</i> 
         </DIV>

          <I class="S2RF1">HomePage___:</i> 
                <INPUT name="s2R_www" 
                type="text"
                ID="s2R_www" 
                size="30"
                maxlength="64" 
                onFocus="document.getElementById('I_3F1_05').style.display ='block';"
                onBlur="document.getElementById('I_3F1_05').style.display ='none'; if(validate(this.value,'s2R_www',12)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}" 
                ><INPUT type="checkbox" 
                        name="s2R_wwwValidate" 
                        value="Override" 
                        ID="R_wwwValidate">
                        <I style="font-size:8pt;">Override www-Format check</i>  
 
         <BR>
         <DIV  ID="I_3F1_05" class="I_3F1_Info">
              Provide the Internet Address of your facility(school)(HomePage). This address will be shown with 
              your pin on the map, in the directory of all sensor2school members. You will later be asked 
              to provide a link within this address for a nice thumbnail picture. This address 
              will also be used to verify a space on your homepage with a link to sensor.community. 
              Only characters a-z, A-Z, 0-9, (_ / .) are accepted. 
         </DIV >
         
         <B><U><I>Location</i></u></B><HR>
         <INPUT type="checkbox" 
                       name="R_latValidate" 
                       value="Override" 
                       ID="R_latValidate" 
                       onFocus="document.getElementById('I_3F1_061').style.display ='block';"
                        onBlur="document.getElementById('I_3F1_061').style.display ='none'; if(document.getElementById('R_latValidate').checked == true){document.getElementById('s2R_loclatDec').disabled = 'true';}else{document.getElementById('s2R_loclatDec').disabled = false;} "
                       
                       >
                       <I class="S2RF1" >Protect Decimal-Format</i><BR>
                       
              <DIV  ID="I_3F1_061" class="I_3F1_Info">
              Ticking this Check-Box, the provided latitude in Deg/Min/Sec/Hemisphere will override what ever is provided in the Latitude Decimal Information.<BR>
              Then, when the Latitude Hemisphere-Field is left by the cursor, the Latitude Decimal Figure is set converting Deg/Min/Sec/Hemisphere 
              to a decimal figure. Only 'S' / 'W'  will result in Neg-Degree, Figures in excess of (89Deg59Min59.9999Sec)(179Deg59Min59.9999Sec) will be invalid Results. 
              Figures > 59 for Minutes will count up Degrees, Figures >60 for Seconds will count up Minutes.<BR>
              To convert Deg/Min/Sec/Hemisphere to Degrees-Decimal is not recommended! 
         </DIV>

          <I class="S2RF1">Latitude_____:</i> 
                <INPUT name="s2R_loclatdeg"  ID="s2R_loclatdeg"
                type="text"
                size="2"
                maxlength="2" 
                onFocus="document.getElementById('I_3F1_06').style.display ='block'"
                onBlur="document.getElementById('I_3F1_06').style.display ='none';if(checkUI(this.value,'s2R_loclatdeg',1)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}" 
                > <I class="S2RF1">Deg </i>
                <INPUT name="s2R_loclatmin"   ID="s2R_loclatmin"
                type="text"
                size="2"
                maxlength="2" 
                onFocus="document.getElementById('I_3F1_06').style.display ='block'"
                onBlur="document.getElementById('I_3F1_06').style.display ='none';if(checkUI(this.value,'s2R_loclatmin',3)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}" 
                > <I class="S2RF1">' </i>
                <INPUT name="s2R_loclatsec" ID="s2R_loclatsec"
                type="text"
                size="7"
                maxlength="9" 
                onFocus="document.getElementById('I_3F1_06').style.display ='block'"
                onBlur="document.getElementById('I_3F1_06').style.display ='none';if(checkUI(this.value,'s2R_loclatsec',3)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}" 
                > <I class="S2RF1">'' </i>
                <INPUT name="s2R_loclathem" ID="s2R_loclathem" 
                type="text"
                size="1"
                maxlength="1" 
                onFocus="document.getElementById('I_3F1_06').style.display ='block'"
                onBlur="document.getElementById('I_3F1_06').style.display ='none';if(checkUI(this.value,'s2R_loclathem',4)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}" 
                > <I class="S2RF1">N/S </i><BR>
                <INPUT name="s2R_loclatDec" 
                       ID="s2R_loclatDec"
                       type="text" 
                       size="13" 
                       maxlength="13"
                       onFocus="document.getElementById('I_3F1_06').style.display ='block'"
                onBlur="document.getElementById('I_3F1_06').style.display ='none';if(checkUI(this.value,'s2R_loclatDec',10)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}" 
                > <I class="S2RF1">Degree Decimal <B id="DecMin"></b><B id="DecSec"></b><B id="DecTot"></b> </i>
         <DIV  ID="I_3F1_06" class="I_3F1_Info">
              Provide the Latitude position of your facility(school) in the format Degree/Minutes/seconds 
              Hemisphere (N/S) Degrees is 0-89(no decimals) Minutes is 0-59(no decimals) Seconds is o-59(decimals with(.). The rules are OK when green. 
              RED will remarkably delay the registration, please avoide! In the Information-part of this registration, you will find 
              usefull internet-addresses, where you may generate a location-figure by clicking into a world-map. Only characters N/S, 0-9 are accepted.<BR>
              You may use a work-around by punch-in or copy-and-pace a Location in decimal notation. The figure for Degrees is still 0-89, 
              the decimals start with (.). For Latitude 1-3 digits for (S) the number is negative (-). 
              You may use up to 9 decimal-figures. Using 5 is down to 10 Meters, 4 is 100 Meters.<BR>
              Neither Pin on the map may be closer than 100 Meters to any other. So we might adjust! 
         </DIV>

 
                       
                       
                       
                       
                       

                       
         <HR>
          <INPUT type="checkbox" 
                name="R_longValidate" 
                value="Override" 
                ID="R_longValidate"
                onFocus="document.getElementById('I_3F1_071').style.display ='block';"
                onBlur="document.getElementById('I_3F1_071').style.display ='none'; if(document.getElementById('R_longValidate').checked == true){document.getElementById('s2R_loclongDec').disabled = 'true';}else{document.getElementById('s2R_loclongDec').disabled = false;} "
                >
         <I style="font-style:italic;font-size: 8pt;">PROTECT Decimal-Format</i><BR>
         <DIV  ID="I_3F1_071" class="I_3F1_Info">
              Ticking this Check-Box, the provided latitude in Deg/Min/Sec/Hemisphere will NOT override the Longitude Decimal Information. if not ticked, the accessible 
              decimal Latitude information will override the Deg-Min-Sec-Hem.<BR>
              Then, when the Latitude Hemisphere-Field is left by the cursor, the Latitude Decimal Figure is set converting Deg/Min/Sec/Hemisphere 
              to a decimal figure. Only 'S' / 'W'  will result in Neg-Degree, Figures in excess of (89Deg59Min59.9999Sec)(179Deg59Min59.9999Sec) will be invalid Results. 
              Figures > 59 for Minutes will count up Degrees, Figures >60 for Seconds will count up Minutes.<BR>
              To convert Deg/Min/Sec/Hemisphere to Degrees-Decimal is not recommended! 
         </DIV>

          <I class="S2RF1">Longitude___:</i> 
                <INPUT name="s2R_loclongdeg"  ID="s2R_loclongdeg"
                type="text"
                size="3"
                maxlength="3" 
                onFocus="document.getElementById('I_3F1_07').style.display ='block'"
                onBlur="document.getElementById('I_3F1_07').style.display ='none';if(checkUI(this.value,'s2R_locllongdeg',2)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}"  
                ><I class="S2RF1">Deg</i>
                <INPUT name="s2R_loclongmin"  ID="s2R_loclongmin"
                type="text"
                size="2"
                maxlength="2" 
                onFocus="document.getElementById('I_3F1_07').style.display ='block'"
                onBlur="document.getElementById('I_3F1_07').style.display ='none'; if(checkUI(this.value,'s2R_loclongmin',3)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}"  
                ><I class="S2RF1">'</i>
                <INPUT name="s2R_loclongsec"  ID="s2R_loclongsec"
                type="text"
                size="8"
                maxlength="8" 
                onFocus="document.getElementById('I_3F1_07').style.display ='block'"
                onBlur="document.getElementById('I_3F1_07').style.display ='none';if(checkUI(this.value,'s2R_loclongsec',3)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}"  
                ><I class="S2RF1">''</i>
                <INPUT name="s2R_loclonghem"  ID="s2R_loclonghem"
                type="text"
                size="1"
                maxlength="1" 
                onFocus="document.getElementById('I_3F1_07').style.display ='block'"
                onBlur="document.getElementById('I_3F1_07').style.display ='none';if(checkUI(this.value,'s2R_loclonghem',5)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}"  
                ><I class="S2RF1">E/W</i><BR>
         <INPUT name="s2R_loclongDec" 
                ID="s2R_loclongDec"
                type="text" 
                size="13" 
                maxlength="13"
                onFocus="document.getElementById('I_3F1_07').style.display ='block'"
                onBlur="document.getElementById('I_3F1_07').style.display ='none';if(checkUI(this.value,'s2R_loclatDec',11)){this.style.borderColor = 'green';}else{this.style.borderColor = 'red';}" 
                > <I class="S2RF1">Degree Decimal </i>
         <DIV  ID="I_3F1_07" class="I_3F1_Info">
              Provide the Longitude position of your facility(school) in the format Degree/Minutes/seconds 
              Hemisphere (E/W) Degrees is 0-179(no decimals) Minutes is 0-59(no decimals) Seconds is 0-59(decimals with(.). The rules are OK when green.  
              RED will remarkably delay the registration, please avoide! In the Information-part of this Notebook, you will find 
              usefull internet-addresses, where you may generate a location-figure by clicking into a world-map.
              Only characters E/W, 0-9 are accepted.
              You may use a work-around by punch-in or copy-and-pace a Location in decimal notation. The figure for Degrees is 0-179, 
              the decimals start with (.). For Longitude 1-3 digits for (W) the number is negative (-). 
              You may use up to 9 decimal-figures. Using 5 is down to 10 Meters, 4 is 100 Meters.<BR>
              Neither Pin on the map may be closer than 100 Meters to any other. So we might adjust! 
         </DIV>

                <HR>  
         <INPUT name="s2RI_Go"
                type="submit"
                value="Submit_Form1"
                >
         <DIV class="PgCtrl" 
              ID="Frm1Abrt"
              onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "
              
              >
            <B class="PgStart">Abort Request-Form Close Notebook </b> 
         </div>
                
                
          </form>
          <!-------- This is the initial form for starting the process ------->      
        
      </div>

         </div><!-- Close Frame initial Request Form-1-->
   </div>
      <DIV ID="Intro3_F2" class="I_3F1_Info">
          <?PHP $PgID[0][0]= 7; $X=PgMenue($PgID[0][0]); ?>

      <BR>

         <H3>sensor2school participation request Form (2)</H3>
         <span style="font-family:arial;font-size:10pt;">
         (Form-Block Full Contact.Address This S2S-Element:)
        <DIV style="border:double 3px gray;padding:5px;border-radius:5px;" >  
           <I class="S2RF1"><B><U>Note:</u> This Profile-Info can be changed any time by the S2S-Lead of the school.<BR>
           This can be done using this Form and providing the Registration-Key send to the Contact-EMail.</b></i><HR>
         
          <I class="S2RF1">State_________:</i> 
                <INPUT name="s2R_state" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_08').style.display ='block'"
                onBlur="document.getElementById('I_3F1_08').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_08" class="I_3F1_Info">
              Provide the State your school is located in.  Many countries are organized as stated within the country. For some it ia an important part of 
              the address, for others not. Since there is no complete directory available within ISO or UN, please write here in international (EN) writing.  
              If this is not suitable for your country, leave it blank, then it will NOT be used. Only 30 characters a-z, A-Z, 0-9, (- space) are accepted.
         </DIV>
          <I class="S2RF1">County________:</i> 
                <INPUT name="s2R_county" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_07').style.display ='block'"
                onBlur="document.getElementById('I_3F1_07').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_07" class="I_3F1_Info">
              Provide the name of the county your school is located in. Many countries are organized as states and counties within the country. For some it ia an important part of 
              the address, for others not. Since there is no complete directory available within ISO or UN, please write here in international (EN) writing. 
              When the county is part of the schools identity, make the 1st Character a '*'. When composing your Map-BussinesCard, this will ber used. 
              (This is known for some parts of the USA and Canada). 
              If this is not suitable for your country, leave it blank, then it will NOT be used.  Only 30 characters(*) a-z, A-Z, 0-9, (- space) are accepted.
         </DIV>
         <I class="S2RF1">City__________:</i> 
                <INPUT name="s2R_city" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_08').style.display ='block'"
                onBlur="document.getElementById('I_3F1_08').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_08" class="I_3F1_Info">
              Provide the City-Name your school is located in. Please find the most suitable form to register your address. When your school is located in a capital or big city, 
              it might be you need two names. In that case use the county for the capital (i.e. BERLIN) and the Living-Quater in the city-field (i.e. MALZAHN). 
              Please reflect the most suitable way to identify your school on the map and among others and an impression for your fellow S2S-Elements. This field is mandatory.   
               Only 30 characters a-z, A-Z, 0-9, (- space) are accepted.
         </DIV>
          <I class="S2RF1">City-Code_____:</i> 
                <INPUT name="s2R_ZIP" 
                type="text"
                size="15"
                maxlength="15" 
                onFocus="document.getElementById('I_3F1_07').style.display ='block'"
                onBlur="document.getElementById('I_3F1_07').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_07" class="I_3F1_Info">
              Provide the City-Code for the city your school is located and belonging to the city-name you provided before. 
              In many countries, the city code is unique, in others, the code is lead by a state-shortcut, others it is a grid-code. 
              In some countries, the ZIP code extends with a quater- or street-code. Please select the most suitable way. Empty fields will be skiped. 
              Only 15 characters a-z, A-Z, 0-9, (- space) are accepted.
         </DIV>
          <I class="S2RF1">Street-Name___:</i>
                <INPUT name="s2R_streetname" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_08').style.display ='block'"
                onBlur="document.getElementById('I_3F1_08').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_08" class="I_3F1_Info">
              Provide the Street-Name your school is located in. Please find the most suitable form to register your address. This field is mandatory. However, 
              once you feel publishing this creates a risk, please put a leading(*). In that case, the street will not be published in the business-card.   
               Only characters a-z, A-Z, 0-9, (- space) are accepted.
         </DIV>
          <I class="S2RF1">Street-Code____:</i>
                <INPUT name="s2R_streetcode" 
                type="text"
                size="8"
                maxlength="15" 
                onFocus="document.getElementById('I_3F1_09').style.display ='block'"
                onBlur="document.getElementById('I_3F1_09').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_09" class="I_3F1_Info">
              Provide the Street-Code your school is located and belonging to the city-name you provided before. 
              In many countries, the city code is unique, in others, the code is lead by a state-shortcut, others it is a grid-code. 
              In some countries, the ZIP code extends with a quater- or street-code. Please select the most suitable way. Empty fields will be skiped. However, 
              once you feel publishing this creates a risk, please put a leading(*). In that case, the street will not be published in the business-card. 
              Only characters(*) a-z, A-Z, 0-9, (- space) are accepted.
         </DIV>
          <I class="S2RF1">Apartment_____:</i>
                <INPUT name="s2R_Apartment" 
                type="text"
                size="15"
                maxlength="15" 
                onFocus="document.getElementById('I_3F1_10').style.display ='block'"
                onBlur="document.getElementById('I_3F1_10').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_10" class="I_3F1_Info">
              Provide the Apartment-Code for the address your school is located and belonging to the city-name you provided before. 
              In many countries, addresses are extended with Apartment-IDs, especially in big cities. Please select the most suitable way. Empty fields will be skiped. 
              However, once you feel publishing this creates a risk, please put a leading(*). In that case, the street will not be published in the business-card. 
              Only characters(*) a-z, A-Z, 0-9, (- space) are accepted.
         </DIV>
          <I class="S2RF1">Deliver to_____:</i>
                <INPUT name="s2R_Deliver" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_11').style.display ='block'"
                onBlur="document.getElementById('I_3F1_11').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_11" class="I_3F1_Info">
              Provide deliver-notice, once your address has a centralized mail-office. 
              Please select the most suitable way. Empty fields will be skiped. However, 
              once you feel publishing this creates a risk, please put a leading(*). In that case, the street will not be published in the business-card. 
              Only characters(*) a-z, A-Z, 0-9, (- space) are accepted.
         </DIV>
         
     .<BR><BR></span>
      <DIV class="PgCtrl" >
            <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "
         class="PgStart">Close Notebook
      </b> 
      <B onClick="document.getElementById('Intro3_0').innerHTML = document.getElementById('Intro3_F3').innerHTML;"
         class="PgOvr">Next:Request FORM-3(POC)</b>
         </div>
      </div>
        
         
      <DIV ID="Intro3_F3" class="I_3F1_Info">
          <?PHP $PgID[0][0]= 8; $X=PgMenue($PgID[0][0]); ?>

      <BR>
         <H3>sensor2school participation request Form (3)</H3>
         <span style="font-family:arial;font-size:10pt;">
         (Form-Block Point-of-contact This S2S-Element:)
        <DIV style="border:double 3px gray;padding:5px;border-radius:5px;" >  
           <I class="S2RF1"><B><U>Note:</u> This Profile-Info can be changed any time by the S2S-Lead of the school.<BR>
           This can be done using this Form and providing the Registration-Key send to the Contact-EMail.</b></i><HR>
         
         <I class="S2RF1">Name___:</i>
         <INPUT name="s2R_POC_name" 
                ID="s2R_POC_name"
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_12').style.display ='block'"
                onBlur="FB();" 
                > 
         <BR>
         <DIV  ID="I_3F1_12" class="I_3F1_Info">
              Provide the name of the POC of the S2S-Element at your school. This field is mandatory. 
              It also could be something leike:Deputy Director or School-Office. Preferably use a persons name.<BR>
              It could be of community-benefit, if the normal language spoken is given. 
              Only characters a-z, A-Z, 0-9, (- space) are accepted. Ensure the POC-Info plausibility within the set following. 
         </DIV>

         
         <I class="S2RF1">Function___:</i>         
         <INPUT name="s2R_POC_Function" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_13').style.display ='block'"
                onBlur="document.getElementById('I_3F1_13').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_13" class="I_3F1_Info">
              Provide the function of the POC of the S2S-Element at your school. This field is optional. 
              It is used to get the right expectation towards the Person. Within the pilote-phase this is text. In the final set-up it'll a selection. 
              Only characters a-z, A-Z, 0-9, (- space) are accepted. Ensure the POC-Info plausibility within the set following. 
         </DIV>
         <I class="S2RF1">Direct Email___:</i>
                <INPUT name="s2R_POC_EMail" 
                type="text"
                size="30"
                maxlength="255" 
                onFocus="document.getElementById('I_3F1_14').style.display ='block'"
                onBlur="document.getElementById('I_3F1_14').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_14" class="I_3F1_Info">
              Provide the POC's Email contact. This will be reduced to urgent contacts and not published. This field is optional. 
              Ensure the POC-Info plausibility within the set following. The EMail-address can be any valid email-address(aaaaaa.aaaaaa@bbbbbb.bbbbbb.bbbb) 
              The maximum length is 64+256(RFC). Here the visible part is 30 chracters, the maximum length is 255. 
         </DIV>
         <I class="S2RF1">Web-Site___:</i>
         <INPUT name="s2R_POC_Web" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_15').style.display ='block'"
                onBlur="document.getElementById('I_3F1_15').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_15" class="I_3F1_Info">
              Provide the Web-Site of the POC of the S2S-Element at your school. This field is optional. 
              This is the web-site the POC uses to administer the S2S when there is no LAB assigned. 
              The special-rules for web-addresses (URL) are applied. Ensure the POC-Info plausibility within the set following.<BR>
              Preferably, the POC maintains a Site on the main web-address of the school. I.E.: www.myschool.de/S2S/poc.html 
         </DIV>

         <I class="S2RF1">chat.Sensor.community-Name__:</i>
         <INPUT name="s2R_POC_Chat" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_16').style.display ='block'"
                onBlur="document.getElementById('I_3F1_16').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_16" class="I_3F1_Info">
              Provide the chat.sensor.community (Mattermost) name of the POC of the S2S-Element at your school. This field is optional. 
              This is the sensor.community administration plattform the POC uses to administer the S2S when there is no LAB assigned. 
              The special-rules for this names are applied. Ensure the POC-Info plausibility within the set following. LAB-Capacities require registration with 
              the chat.sensor.community (no cost). 
         </DIV>
         
         <I class="S2RF1">Messenger___:</i>         
         <INPUT name="s2R_POC_Msg" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_17').style.display ='block'"
                onBlur="document.getElementById('I_3F1_17').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_17" class="I_3F1_Info">
              Provide the Messenger-Address of the POC at your school (Signal/WhatsApp/Telegram). This field is optional. 
              This info shall not become public. It'll used, when there is set-up a proforma LAB. 
         </DIV>

         <I class="S2RF1">Tel-Country-Code___:</i>         
         <INPUT name="s2R_POC_TelC" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_18').style.display ='block'"
                onBlur="document.getElementById('I_3F1_18').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_18" class="I_3F1_Info">
              Provide the Telephone-Contact-Country-Code of the POC at your school. This field is mandatory. It is preset defined by the school-Country. 
              This info shall not become public. It'll be used for managing. Visible to the top-management only.(Only 30 Numbers 0-9, NOSpace, Leading(+)) 
         </DIV>
<BR>
         <I class="S2RF1">Tel-Regional-Code___:</i>         
         <INPUT name="s2R_POC_TelR" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_19').style.display ='block'"
                onBlur="document.getElementById('I_3F1_19').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_19" class="I_3F1_Info">
              Provide the Telephone-Contact-Regional-Code of the POC at your school. This field is mandatory. 
              This info shall not become public. It'll be used for managing. Visible to the top-management only.(Only 30 Numbers 0-9 NOSpace) 
         </DIV>
<BR>
         <I class="S2RF1">Telephone Number:</i>         
         <INPUT name="s2R_POC_TelP" 
                type="text"
                size="30"
                
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_20').style.display ='block'"
                onBlur="document.getElementById('I_3F1_20').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_20" class="I_3F1_Info">
              Provide the Telephone-Contact-Extension of the POC at your school. This field is mandatory. 
              This info shall not become public. It'll be used for managing. Visible to the top-management only. (Only 30 numbers 0-9 NOSpace) 
         </DIV>
<BR>

      <DIV class="PgCtrl" >
            <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "
         class="PgStart">Close Notebook
      </b> 
      <B onClick="document.getElementById('Intro3_0').innerHTML = document.getElementById('Intro3_F4').innerHTML;"
         class="PgOvr">Next:Request FORM-4(Community)</b>
         </div>
      </div>
        
         
      <DIV ID="Intro3_F4" class="I_3F1_Info">
              <?PHP $PgID[0][0]= 9; $X=PgMenue($PgID[0][0]); ?>
         <H3>sensor2school participation request Form (4)</H3>
         <span style="font-family:arial;font-size:10pt;">
         (Form-Block Community Structures This S2S-Element:)
        <DIV style="border:double 3px gray;padding:5px;border-radius:5px;" >  
           <I class="S2RF1"><B><U>Note:</u> Most of this Profile-Info can be changed any time by the S2S-Lead of the school.<BR>
           Change to the HUB / LAB / and Cluster-Info is done by the assigned HUB.<BR>
           This can be done using this Form and providing the Registration-Key send to the Contact-EMail.</b></i><HR>

         
         
         <I class="S2RF1">WiFi Sensor Bandwidth___:</i>         
         <INPUT name="s2R_POC_Band" 
                type="text"
                size="30"
                maxlength="30" 
                onFocus="document.getElementById('I_3F1_20').style.display ='block'"
                onBlur="document.getElementById('I_3F1_20').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_20" class="I_3F1_Info">
              Provide the Bandwidth available connecting the sensor node(s) at your school to the rooter of your facility/school. 
              This is an informal information for to do statistics in the sensor2school program. This information is optional. 
         </DIV>
<BR>
         <I class="S2RF1">Endorsing Sensor.community LAB Name___:</i>         
         <INPUT name="s2R_POC_LABName" 
                type="text"
                size="30"
                maxlength="30"
                disabled
                onFocus="document.getElementById('I_3F1_21').style.display ='block'"
                onBlur="document.getElementById('I_3F1_21').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_21" class="I_3F1_Info">
              Provide the Name of the sensor.community-LAB supporting your facility/school. Please type: Self-LAB 
              when there is no regular LAB close to you. In this case you are granted limitted LAB rights interacting 
              with the sensor.community management. This Info is mandatory. (In most cases, the LAB showing the shortest Distance will be selected)<BR>
              Contact the S2S-Program-Lead, finding Language support. 
         </DIV>
<BR>
         <I class="S2RF1">Endorsing sensor.community HUB-Name___:</i>
         <INPUT name="s2R_POC_HUBName" 
                type="text"
                size="30"
                maxlength="30"
                disabled 
                onFocus="document.getElementById('I_3F1_22').style.display ='block'"
                onBlur="document.getElementById('I_3F1_22').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_22" class="I_3F1_Info">
              Provide the Name of the sensor.community-HUB supporting your facility/school. Please type: Root-HUB 
              when there is no HUB assigned to your Country. In this case you are supported by the root-HUB(Stuttgart) 
              sensor.community management. This Info is mandatory. (In most cases the HUB with the same country / shortest distance and language supported will be selected)
         </DIV>
<BR>
         <I class="S2RF1">sensor.community S2L Cluster-Name__:</i>
         <INPUT name="s2R_POC_ClusterS2L" 
                type="text"
                size="30"
                maxlength="30"
                disabled 
                onFocus="document.getElementById('I_3F1_23').style.display ='block'"
                onBlur="document.getElementById('I_3F1_23').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_23" class="I_3F1_Info">
              Provide the Name of the sensor.community-S2Library facility close to you forming a cluster. Please leave BLANK when not known. 
              It is a goal of sensor.community to form CLUSTERS of the Program-Structures. A full Cluster comprises of 
              LAB/school/library/city/Ref. Where more than one Element i.e. school may link with library or city. Ref-Elements are 
              linked with LABs. This information is not mandatory. This field is left blank, once the distance to the closest S2L-Element 
              is unsuitable or the language is not supported
         </DIV>
<BR>
         <I class="S2RF1">sensor.community S2C Cluster-Name___:</i>
         <INPUT name="s2R_POC_ClusterS2C" 
                type="text"
                size="30"
                maxlength="30"
                disabled 
                onFocus="document.getElementById('I_3F1_24').style.display ='block'"
                onBlur="document.getElementById('I_3F1_24').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_24" class="I_3F1_Info">
              Provide the Name of the sensor.community-S2City facility close to you forming a cluster. Please leave BLANK when not known. 
              It is a goal of sensor.community to form CLUSTERS of the Program-Structures. A full Cluster comprises of 
              LAB/school/library/city/Ref. Where more than one Element i.e. school may link with library or city. Ref-Elements are 
              linked with LABs. This information is not mandatory. In optimal situation, the City accommodating the school, participates in the sensor2City Program. 
              
         </DIV>
<BR>
         <I class="S2RF1">sensor.community S2Ref Cluster-Name___:</i>
         <INPUT name="s2R_POC_ClusterS2R" 
                type="text"
                size="30"
                maxlength="30" 
                disabled
                onFocus="document.getElementById('I_3F1_25').style.display ='block'"
                onBlur="document.getElementById('I_3F1_25').style.display ='none'" 
                > 
         <BR>
         <DIV  ID="I_3F1_25" class="I_3F1_Info">
              Provide the Name of the sensor.community-S2Ref facility close to you forming a cluster. Please leave BLANK when not known. 
              It is a goal of sensor.community to form CLUSTERS of the Program-Structures. A full Cluster comprises of 
              LAB/school/library/city/Ref. Where more than one Element i.e. school may link with library or city. Ref-Elements are 
              linked with LABs. This information is not mandatory. 
         </DIV>
<BR>
        </div> 
         </span>
         
            
     <BR><BR>
      <DIV class="PgCtrl" >
            <B onClick="document.getElementById('AR_Intro0').style.display='none';IB_B('-',-1); "
         class="PgStart">Close Notebook
      </b>
      </div> 
       <I class="S2RF1">Send the Final-Request-Form to the Sensor2School Team</i>
         <INPUT 
                type="submit"
                value="Submit_Form2"
                > 
         <BR>         Now, this data has to be send to allow us looking for community-management!
               
      


         </div>
      </div>
      
      

</div>


                      



  </body>
  <?PHP
   if(isset($JFC)){echo $JSV;}
  ?>
  
  
  
  
  <?PHP
  

  
  
  
  
   /*==================================================================
     == Write-scripts html from files                                ==
     == Select Options COUNTRY: include/ISO639_Country_2-3N.csv      ==
     == Select Options LANGUAGE: include/ISO639_LanguageCodes.csv    ==
     == Select Options Tel-Prefix: include/ISO639_TelCodes.csv       ==
     == LookUp / Validate Name of S2S-Elements: include/SC_S2S.csv   ==
     == LookUp / Validate Name of LAB-Elements: include/SC_LABS.csv  ==
     == LookUp / Validate Name of HUB-Elements: include/SC_HUBS.csv  ==
     ==--------------------------------------------------------------==
     == Generate Country-Options:                                    ==
     ==  File-csv-array: Name , Code-Cap3 . code-Cap2 , Code-Num3    ==
     ==  Option-Value: CodeCap2 Option-Text: Name                    ==
     ==  Default-Selected = DE                                       ==
     ==  Generate Language-Options:                                  ==
     ==  File-csv-array: Name , Code-Lcase2, Code-Cap2               ==
     ==  Option-Value: Code-Lcase2, Option-Text: Name                ==
     ==  Generate Prefix-Options:                                    ==
     ==  File-csv-array: Name, PrefixFig, Country-Code XX / XXX      ==
     ==  Option-Value: PrefixFig  Option-Text: Name  Reference: XX   ==
     ==  LookUp SC-Provided Lists: array: Name, Country, Language,   ==
     ==                                   GeoRef                     ==
     == ------------------------------------------------------------ ==
     ==  function: Ins_OptCountry                                    ==
     ==            Return: Number of Options or 0-fail               ==
     ==            Parameter:Mode (1)=Flags for SC-Country           ==
     ==                      Mode (2)=preselect-on() this:GBR        ==
     ==                      Mode (8)=write to include-File (xxx.inc)==
     ==                      Mode (4)=preselect-on() Language        ==
     == ------------------------------------------------------------ ==
     == function: InsOptLanguage                                     ==
     ==           Return: Number of Options 0=fail                   ==
     ==           Parameter: Mode (1)=Flags for SC-Language          ==
     ==                      Mode (2)=(*) for Lang.of Opt-Country    ==
     ==                      Mode (4)= gray-out not in Country Cap2  ==
     ==                      Mode (8)= write to include-File(xxx.inc)==
     == ------------------------------------------------------------ ==
     == function: InsOptTelPrefix                                    ==
     ==           Return: Number of Options 0=fail                   ==
     ==           Parameter: Mode (1)=Flags for SC-Country           ==
     ==                      Mode (2)=insert www-TLC (from TLC.inc)  ==
     ==                      Mode (8)=write to include-file(xxx.inc) ==
     ==  ########################################################### ==*/
     
     function Ins_OptCountry($mode)
              {
                /*-------------------------------------
                  - Will open source-file for reading -
                  - once Mode=0 execute default:      -
                  - Write text-only xxx.inc file for: -
                  - Country / Language / Telephone    -
                  - Gray-selectable Language not in   -
                  - Country-List (do by code2)        -
                  - preselect Germany/English/+49     -
                  -------------------------------------*/
             $OC_f_src="include/ISO639_Country_2-3_N.csv";
             $OC_fh_src="";
             $L_src_C="";
             $L_dst_C="";
             $OL_f_src="include/ISO639_LanguageCodes.csv";
             $OL_fh_src="";
             $L_src_L="";
             $L_dst_L="";
             $OT_f_src="include/ISO639_TelCodes.csv";
             $OT_fh_src="";
             $L_src_T="";
             $L_dst_T="";
             $OC_f_drn="include/OS_Country.csv"; 
             $OC_fh_drn="";
             $OL_f_drn="include/OS_Language.csv";
             $OL_fh_drn=""; 
             $OT_f_drn="include/OS_TelCode.csv";
             $OT_fh_drn="";  
             $O_Img_src ="graphics/flags";
             $TNE_C=0;
             $TNE_L=0;
             $TNE_T=0;


             

} 
              
              
             // }      
      
  
  
  
  
  
  
  ?>
</html>


