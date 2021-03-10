# SC_S2S
Sensor.community sensor2school first GitHub Trial.
This repository shall make available all required components required to:
-->Open a container on the sensor.community home-page introducing the sensor2school campaign
   from this container link to:
   -->Request-Form apply to be accommodated as a sensor2school-element
   -->Reply from CGI routine after test of email, test of homepage, test of suggested immage-link
   -->Request-Form finalizing enrolement in sensor2school-program
   -->Amendment of S2S_Members.YML file
----------------------------------------------------
S2S-Container:
include SC_S2S.CSS
include SC_S2S.JS
include SC_S2S.(language files)
-----------------------------------------------------
S2S-Language-files:
All HTML-Text-entries will be drawn from a JS-multidimensional[][][]array loaded with the S2S-Container to be included into SC-Homepage
S2S-Immage-files:
All files linked into position from: root-directory/s2sGraphics
-----------------------------------------------------
Introduction to the https://s2s.sensor.community container is a preloaded html-File with klient-side JS-Interaction.
Menue-like chapter-buttons call content on canvas through CSS-display manipulated through JS-events
-----------------------------------------------------
s2s-member records: are YML-Files listing key:content
The functional mechanism of LAB management will be used
The CGI-routines for the S2S-Forms to be handled by sensor.community-server, are not subject of this repository
-----------------------------------------------------
Split of the accommodation request:
Part 1: Include proposed facility-name (Name of the school)[30 char printable]
        Include facility email-address (general porpose address)[64 chr email]
        include facility home-page-address (excluding protocoll&port)[has to return 200]
        Client JS will check content-against rules prior submit
CGI will test for emeil-provider return: valid address
CGI will test for homepage-provider return: valid address no fwd
CGI will provide token for to send follow-up for full request
Part 2: Include the spectrum of registration-info for to:
        provide the required Map-popup of the facility
        provide the required management-contact information required for administrating the program
CGI will test the provided info for html-compliance
CGI will submit a management-key for the facility to update provided info
Part 3: Maintenance form for facility-information including: edit, delete
-------------------------------------------------------------------------
SC_S2S.language:
Part 1 container-text: auto-increment / DOM-ID / Text-html-conform / Check-sum /CR-LF
Part 2 Form-Container 1: auto-increment / DOM-ID / Text-html-conform / Check-sum / CR-LF
Part 3 Form-Container 2(Edit): auto-increment / DOM-ID / text.html-conform / Check-sum /CR-LF
===========================================================================

        

