<?PHP
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/contact-form-attachment.html
*/
require_once("./include/fgcontactform.php");

$formproc = new FGContactForm();

//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('contatos@fazendasbartira.com.br'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('DyPhWn3Oa6HtjnL');

$formproc->AddFileUploadField('photo','jpg,jpeg',200);
$formproc->AddFileUploadField('resume','pdf',2024);

if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thank-you.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Trabalhe conosco</title>
      <link rel="STYLESHEET" type="text/css" href="contact.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <script type='text/javascript' src='scripts/fg_captcha_validator.js'></script>
</head>
<body>

<!-- Form Code Start -->
<form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' enctype="multipart/form-data" accept-charset='UTF-8'>

<fieldset >
<legend></legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>
<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
<input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='name' >Nome: </label><br/>
    <input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>
    <span id='contactus_name_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='telefone' >Telefone: </label><br/>
    <input type='text' name='telefone' id='telefone' value='<?php echo $formproc->SafeDisplay('telefone') ?>' maxlength="50" /><br/>
    <span id='contactus_telefone_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='email' >Email:</label><br/>
    <input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <span id='contactus_email_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='endereco' >Endereço:</label><br/>
    <input type='text' name='endereco' id='endereco' value='<?php echo $formproc->SafeDisplay('endereco') ?>' maxlength="50" /><br/>
    <span id='contactus_endereco_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='escolaridade' >Nível de Escolaridade:</label><br/>
    <select name="escolaridade" id="escolaridade" value='<?php echo $formproc->SafeDisplay('escolaridade') ?>'>
    	<option value="">Escolha..</option>
        <option value="medio">Médio</option>
      	<option value="superior">Superior</option>
       	<option value="pos-graduado">Pós-Graduado</option>
    </select>
</div>
<div class='container'>
    <label for='conhecimento_ingles' >Conhecimento da língua inglesa:</label><br/>
    <select name="conhecimento_ingles" id="conhecimento_ingles" value='<?php echo $formproc->SafeDisplay('conhecimento_ingles') ?>'>
    	<option value="">Escolha..</option>
        <option value="baixo">Baixo (compreende)</option>
      	<option value="medio">Médio (mantém uma conversação)</option>
       	<option value="alto">Alto (fala e escreve fluentemente)</option>
    </select>
</div>
<div class='container'>
    <label for='message' >Mensagem:</label><br/>
    <span id='contactus_message_errorloc' class='error'></span>
    <textarea rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
</div>

<div class='container'>
    <label for='photo' >Anexe seu currículo (PDF):</label><br/>
    <input type="file" name='resume' id='resume' /><br/>
    <span id='contactus_resume_errorloc' class='error'></span>
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Enviar' />
</div>

</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Por favor coloque seu nome");

    frmvalidator.addValidation("email","req","Por favor coloque seu email");

    frmvalidator.addValidation("email","email","Por favor coloque seu email");

    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");
	
	frmvalidator.addValidation("resume","file_extn=doc;docx;pdf;txt","Por favor, apenas formato .pdf");
// ]]>
</script>
</body>
</html>