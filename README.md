# SC_S2S
<DIV style="font-size:12pt;font-family:serif;">Sensor.community sensor2school first GitHub Trial.
This repository shall make available all required components required to:<BR>
<LI>Open a container on the sensor.community home-page introducing the sensor2school campaign
   from this container link to:<BR>
   <LI>Request-Form apply to be accommodated as a sensor2school-element
   <LI>Reply from CGI routine after test of email, test of homepage, test of suggested immage-link
  <LI>Request-Form finalizing enrolement in sensor2school-program
  <LI>Amendment of S2S_Members.YML file
<BR>----------------------------------------------------
S2S-Container:<BR>
<LI>include SC_S2S.CSS
<LI>include SC_S2S.JS
<LI>include SC_S2S.(language files)
<BR>-----------------------------------------------------
S2S-Language-files:<BR>
All HTML-Text-entries will be drawn from a JS-multidimensional[][][]array loaded with the S2S-Container to be included into SC-Homepage<BR>
S2S-Immage-files:<BR>
All files linked into position from: root-directory/s2sGraphics
<BR>-----------------------------------------------------<BR>
Introduction to the https://s2s.sensor.community container is a preloaded html-File with klient-side JS-Interaction.
Menue-like chapter-buttons call content on canvas through CSS-display manipulated through JS-events
<BR>-----------------------------------------------------<BR>
s2s-member records: are YML-Files listing key:content
<BR>The functional mechanism of LAB management will be used
<BR>The CGI-routines for the S2S-Forms to be handled by sensor.community-server, are not subject of this repository
<BR>-----------------------------------------------------
Split of the accommodation request:<BR>
   <U>Part 1:</u><LI> Include proposed facility-name (Name of the school)[30 char printable]
        <LI>Include Country of facility from ISO3166
        <LI>Include facility main language from ISO639
        <LI>Include international Languages from main   
        <LI>Include facility email-address (general porpose address)[64 chr email]
        <LI>include facility home-page-address (excluding protocoll&port)[has to return 200]
        <LI>Include Location (main entry is D\°M\"S\' Hemisphere) conversion to d84 decimal
        <LI>Client JS will check content-against rules prior submit
<BR><LI>CGI will test for emeil-provider return: valid address
<LI>CGI will test for homepage-provider return: valid address no fwd
   <LI>CGI will provide <B>token for to send follow-up</b> for full request
<LI>CGI will provide Country-prefix from ISO639 link with ISO3166-2   
   <BR><U>Part 2:</u> <LI>Include the spectrum of registration-info for to:
        <LI>provide the full address information
        <LI>provide the required Map-popup of the facility
        <LI>provide the required management-contact(POC) information required for administrating the program
<BR><LI>CGI will test the provided info for html-compliance
<LI>CGI will submit a management-key for the facility to update provided info
   <BR><U>Part 3:</u> Maintenance form for facility-information including: edit, delete
<BR>------------------------------------
Additional ressources:
   <LI>list-file ISO3166 Country, 2-Code, 3-Code, IDX, Phone Int.Prefix,
   <LI>List-File ISO639 Language-List,EN, FR,
   <LI>directory of ISO3166-country-flag-files from GITHUB   
   <LI>Known Address-scheme for countries:Country-2Code, white-chr spacing CRLF, POST-Var-Specs
   <LI>(SC-Repository)Look-Up for registered S2S-Elements
   <LI>(SC-Repository)Look-Up for other registered S2xxx Elements
   <LI>(S2S-Repository) HTML-Content-Container for Pages-Display in Program-Book S2S
   <LI>(S2S-Repository) HTML-Form-Part1/2 Introduction container input-elements
   <LI>(S2S-Repository) CSV-S2S-Memeber directory (Token identified flat database)   
   <LI>(S2S-Repository) HTML-Content-Container student-oriented course material
   <LI>(SC-Repository) HTML-Content-Container SC-orga.Structures (Root-HUB/HUB/LAB/S2xxx/S2Ref/)
<BR>--------------------------------------
   Functional structures:
   <LI>(S2S-Web-Site test-bed)https://pm.c4st.de/SC_S2S.PHP CGI-capable linked site from https://sensor.community #sensor2school(link)
   <LI>Web-Site as colledge-book titeled: sensor2school Project-book Chapters opened through 'sticky book-marks'
   <LI>Navigation: Intro to SC&S2S / S2S-enrolement process / SC-Orga-Elements intro(LAB/HUB) / SC-Programs-intro(S2xxx) / Intro sensor-repository students / 
Intro sensor-repositories instructors / intro technical features SC-Sensor-Kids/Firmware/Network
   <LI>Facility-Repository:<BR>SC-S2S will install sensor2school-Program-book for s2s-elements notes
   <LI>Facility-Repository:<BR>SC-S2S will install Project-history for schools
      

 </div>       

