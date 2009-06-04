<HTML>
<HEAD>
<TITLE>Escrever Twitt</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
</HEAD>
<BODY BGCOLOR="#FFFFFF" background="images/index_01.jpg">
<SCRIPT LANGUAGE="JavaScript">
function CountLeft(field, count, max) {
if (field.value.length > max)
field.value = field.value.substring(0, max);
else
count.value = max - field.value.length;
}
</script>

<form name="Escrever Twitt" action="TrataEnvioController.php" method="post" enctype="multipart/form-data">
<font size="1" face="arial, helvetica, sans-serif"> No máximo 160 caracteres!
<center>
<input name="text" type="text" size="100" maxlength="400" onKeyDown="CountLeft(this.form.text, this.form.left,160);" onKeyUp="CountLeft(this.form.text,this.form.left,160);"> 
</center>
<br>
Arquivo Multimídia <input name="upfile" type="file">
<input readonly type="text" name="left" size=3 maxlength=3 value="160"> characters left</font>
<br>
<input type="hidden" value="tipo" value="imagem">
<INPUT TYPE=SUBMIT VALUE="Submit">

</form>

</BODY>
</HTML>