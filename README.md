# SC_S2S
<DIV style="font-size:12pt;font-family:serif;">Sensor.community sensor2school first GitHub Trial.
This repository shall make available all required components required to:<BR>
-->Open a container on the sensor.community home-page introducing the sensor2school campaign
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
<BR>-----------------------------------------------------
Introduction to the https://s2s.sensor.community container is a preloaded html-File with klient-side JS-Interaction.
Menue-like chapter-buttons call content on canvas through CSS-display manipulated through JS-events
<BR>-----------------------------------------------------
s2s-member records: are YML-Files listing key:content
The functional mechanism of LAB management will be used
The CGI-routines for the S2S-Forms to be handled by sensor.community-server, are not subject of this repository
<BR>-----------------------------------------------------
Split of the accommodation request:<BR>
Part 1:<LI> Include proposed facility-name (Name of the school)[30 char printable]
       <LI> Include facility email-address (general porpose address)[64 chr email]
        <LI>include facility home-page-address (excluding protocoll&port)[has to return 200]
        <LI>Client JS will check content-against rules prior submit
<BR><LI>CGI will test for emeil-provider return: valid address
<LI>CGI will test for homepage-provider return: valid address no fwd
<LI>CGI will provide token for to send follow-up for full request
<BR>Part 2: <LI>Include the spectrum of registration-info for to:
        <LI>provide the required Map-popup of the facility
        <LI>provide the required management-contact information required for administrating the program
<BR><LI>CGI will test the provided info for html-compliance
<LI>CGI will submit a management-key for the facility to update provided info
<BR>Part 3: Maintenance form for facility-information including: edit, delete
<BR>-------------------------------------------------------------------------
<BR>SC_S2S.language:
<LI>Part 1 container-text: auto-increment / DOM-ID / Text-html-conform / Check-sum /CR-LF
<LI>Part 2 Form-Container 1: auto-increment / DOM-ID / Text-html-conform / Check-sum / CR-LF
<LI>Part 3 Form-Container 2(Edit): auto-increment / DOM-ID / text.html-conform / Check-sum /CR-LF
<BR>===========================================================================

 </div>       

