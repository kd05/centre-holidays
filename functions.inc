<%
Function ValidEmail(byref Email)
	ValidEmail = true: Valid2 = true
	if isnull(Email) then ValidEmail = false
	if instr(1,Email,"@") = 0 then ValidEmail = false
	if instr(1,Email,".") = 0 then ValidEmail = false
	if instr(1,Email,".") > (len(Email) - 2) then ValidEmail = false
	if len(Email) <=  7 then ValidEmail = false
	for x = 1 to len(strValue)
		if mid(strValue,x,1) = "." then Valid2 = true
		if mid(strValue,x,1) = "-" then Valid2 = true
		if mid(strValue,x,1) = "_" then Valid2 = true
		if mid(strValue,x,1) = "@" then Valid2 = true
		if mid(strValue,x,1) >= "a" and mid(strValue,x,1) <= "z" then Valid2 = true
		if mid(strValue,x,1) >= "A" and mid(strValue,x,1) <= "Z" then Valid2 = true
		if mid(strValue,x,1) >= "0" and mid(strValue,x,1) <= "9" then Valid2 = true
	next 
	if not Valid2 then ValidEmail = false
end function

Function StripApos(byref strValue)
	StripApos = ""
	for x = 1 to len(strValue)
		if mid(strValue,x,1) = "'" then 
			StripApos = StripApos + "´" 
		else
			StripApos = StripApos + mid(strValue,x,1)
		end if
	next 
end function

Function StripExt(byref strValue)
	StripExt = ""
	for x = 1 to len(strValue)
		select case asc(mid(strValue,x,1))
			case 10, 13
				StripExt = StripExt + " " 
			case else
				StripExt = StripExt + mid(strValue,x,1)
		end select
		'Response.write asc(mid(strValue,x,1)) & ","
	next 
end function
%>
