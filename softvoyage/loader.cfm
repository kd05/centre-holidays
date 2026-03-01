<cfparam name="url.section" default="css" type="any">

<cfscript>
	// Images should be over https
	if (cgi.HTTPS eq 'on')
		request.protocol = "https";
	else
		request.protocol = "http";
		
		
	request.ImagePath="#request.protocol#://#cgi.HTTP_HOST#/img";
</cfscript>
 
<cfswitch expression="#url.section#">
	<cfcase value="Css">
		<cfinclude template="./css/gray/softvoyage.css">
	</cfcase>
	<cfcase value="Header">
		<cfinclude template="header.cfm">
	</cfcase>
	<cfcase value="Footer">
		<cfinclude template="footer.cfm">
	</cfcase>
</cfswitch>