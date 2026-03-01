<?php ob_start(); 

if (empty($_GET['BookUnique']) && empty($_GET['BookID']))
header('Location: manage-email-forms.php');

date_default_timezone_set('America/New_York'); // EST

$PBookID=trim($_GET['BookID']);
$BookUnique=trim($_GET['BookUnique']);
$BookingTime5=time();// preview time

$AgentPrevIP=$_SERVER['REMOTE_ADDR'];

	//====================================================================
	//=================================reviwed by the agent update time========
	//=====================================================================
	
	include($_SERVER['DOCUMENT_ROOT'].'/library/open_dbi_epik.php');
	
	$sql329 = "UPDATE booking_2 SET BookingTime5='$BookingTime5', AgentPrevIP='$AgentPrevIP' WHERE (BookUnique='$BookUnique' || BookID2='$PBookID')";
	if (mysqli_query($conn, $sql329)) {
	// echo "Record updated successfully";
	} else {
	// echo "Error updating record: " . mysqli_error($conn);
	}
	
	//====================================================================
	//=======================update the database to stop the AGENT CRON========
	//=====================================================================

	if ($_GET['agentcron']==0) {
	//=================variables related to CRON update======================
	$CRONBookID=trim($_GET['BookID']);
	//=======================================================================
	
	$sql3290 = "UPDATE booking_1 SET agentcron='1' WHERE BookID='$CRONBookID'";
	if (mysqli_query($conn, $sql3290)) {
	// echo "Record updated successfully";
	} else {
	// echo "Error updating record: " . mysqli_error($conn);
	}
	}

?>
<!DOCTYPE html>
<html lang="en" > 
    <!--begin::Head-->
    <head>
    <meta charset="utf-8"/>
    <title>Preview/Edit Booking Authorization Form - Agent Portal | Centre Holidays</title>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/head-scripts.php');?>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/booking-db-details.php');?>
    
    <!--THIS PART HAS THE JS FOR THE EDITOR-->
    <script src="../library/ckeditor/ckeditor.js"></script>
    
    <script>
    
    // The instanceReady event is fired, when an instance of CKEditor has finished
    // its initialization.
    CKEDITOR.on( 'instanceReady', function( ev ) {
    // Show the editor name and description in the browser status bar.
    document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';
    
    // Show this sample buttons.
    document.getElementById( 'eButtons' ).style.display = 'block';
    });
    
    function InsertHTML() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert HTML code.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
    editor.insertHtml( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function InsertText() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'txtArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert as plain text.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
    editor.insertText( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function SetContents() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Set editor contents (replace current contents).
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
    editor.setData( value );
    }
    
    function GetContents() {
    // Get the editor instance that you want to interact with.
    var editor = CKEDITOR.instances.editor3;
    
    // Get editor contents
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
    alert( editor.getData() );
    }
    
    function ExecuteCommand( commandName ) {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Execute the command.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
    editor.execCommand( commandName );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    alert( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    alert( 'The "IsDirty" status has been reset' );
    }
    
    function Focus() {
    CKEDITOR.instances.editor3.focus();
    }
    
    function onFocus() {
    document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
    }
    
    function onBlur() {
    document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
    }
    
    </script>
    
    
    <script>
    
    // The instanceReady event is fired, when an instance of CKEditor has finished
    // its initialization.
    CKEDITOR.on( 'instanceReady', function( ev ) {
    // Show the editor name and description in the browser status bar.
    document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';
    
    // Show this sample buttons.
    document.getElementById( 'eButtons' ).style.display = 'block';
    });
    
    function InsertHTML() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor1;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert HTML code.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
    editor.insertHtml( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function InsertText() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor1;
    var value = document.getElementById( 'txtArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert as plain text.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
    editor.insertText( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function SetContents() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor1;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Set editor contents (replace current contents).
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
    editor.setData( value );
    }
    
    function GetContents() {
    // Get the editor instance that you want to interact with.
    var editor = CKEDITOR.instances.editor1;
    
    // Get editor contents
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
    alert( editor.getData() );
    }
    
    function ExecuteCommand( commandName ) {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor1;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Execute the command.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
    editor.execCommand( commandName );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor1;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    alert( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor1;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    alert( 'The "IsDirty" status has been reset' );
    }
    
    function Focus() {
    CKEDITOR.instances.editor1.focus();
    }
    
    function onFocus() {
    document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
    }
    
    function onBlur() {
    document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
    }
    
    </script>
    
    
    <script>
    
    // The instanceReady event is fired, when an instance of CKEditor has finished
    // its initialization.
    CKEDITOR.on( 'instanceReady', function( ev ) {
    // Show the editor name and description in the browser status bar.
    document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';
    
    // Show this sample buttons.
    document.getElementById( 'eButtons' ).style.display = 'block';
    });
    
    function InsertHTML() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert HTML code.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
    editor.insertHtml( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function InsertText() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'txtArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert as plain text.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
    editor.insertText( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function SetContents() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Set editor contents (replace current contents).
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
    editor.setData( value );
    }
    
    function GetContents() {
    // Get the editor instance that you want to interact with.
    var editor = CKEDITOR.instances.editor3;
    
    // Get editor contents
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
    alert( editor.getData() );
    }
    
    function ExecuteCommand( commandName ) {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Execute the command.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
    editor.execCommand( commandName );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    alert( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    alert( 'The "IsDirty" status has been reset' );
    }
    
    function Focus() {
    CKEDITOR.instances.editor3.focus();
    }
    
    function onFocus() {
    document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
    }
    
    function onBlur() {
    document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
    }
    
    </script>
    
    
    <script>
    
    // The instanceReady event is fired, when an instance of CKEditor has finished
    // its initialization.
    CKEDITOR.on( 'instanceReady', function( ev ) {
    // Show the editor name and description in the browser status bar.
    document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';
    
    // Show this sample buttons.
    document.getElementById( 'eButtons' ).style.display = 'block';
    });
    
    function InsertHTML() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor2;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert HTML code.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
    editor.insertHtml( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function InsertText() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor2;
    var value = document.getElementById( 'txtArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert as plain text.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
    editor.insertText( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function SetContents() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor2;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Set editor contents (replace current contents).
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
    editor.setData( value );
    }
    
    function GetContents() {
    // Get the editor instance that you want to interact with.
    var editor = CKEDITOR.instances.editor2;
    
    // Get editor contents
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
    alert( editor.getData() );
    }
    
    function ExecuteCommand( commandName ) {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor2;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Execute the command.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
    editor.execCommand( commandName );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor2;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    alert( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor2;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    alert( 'The "IsDirty" status has been reset' );
    }
    
    function Focus() {
    CKEDITOR.instances.editor2.focus();
    }
    
    function onFocus() {
    document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
    }
    
    function onBlur() {
    document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
    }
    
    </script>
    
    
    <script>
    
    // The instanceReady event is fired, when an instance of CKEditor has finished
    // its initialization.
    CKEDITOR.on( 'instanceReady', function( ev ) {
    // Show the editor name and description in the browser status bar.
    document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';
    
    // Show this sample buttons.
    document.getElementById( 'eButtons' ).style.display = 'block';
    });
    
    function InsertHTML() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert HTML code.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
    editor.insertHtml( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function InsertText() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'txtArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert as plain text.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
    editor.insertText( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function SetContents() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Set editor contents (replace current contents).
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
    editor.setData( value );
    }
    
    function GetContents() {
    // Get the editor instance that you want to interact with.
    var editor = CKEDITOR.instances.editor3;
    
    // Get editor contents
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
    alert( editor.getData() );
    }
    
    function ExecuteCommand( commandName ) {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Execute the command.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
    editor.execCommand( commandName );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    alert( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    alert( 'The "IsDirty" status has been reset' );
    }
    
    function Focus() {
    CKEDITOR.instances.editor3.focus();
    }
    
    function onFocus() {
    document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
    }
    
    function onBlur() {
    document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
    }
    
    </script>
    
    
    <script>
    
    // The instanceReady event is fired, when an instance of CKEditor has finished
    // its initialization.
    CKEDITOR.on( 'instanceReady', function( ev ) {
    // Show the editor name and description in the browser status bar.
    document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';
    
    // Show this sample buttons.
    document.getElementById( 'eButtons' ).style.display = 'block';
    });
    
    function InsertHTML() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert HTML code.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
    editor.insertHtml( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function InsertText() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'txtArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert as plain text.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
    editor.insertText( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function SetContents() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Set editor contents (replace current contents).
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
    editor.setData( value );
    }
    
    function GetContents() {
    // Get the editor instance that you want to interact with.
    var editor = CKEDITOR.instances.editor3;
    
    // Get editor contents
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
    alert( editor.getData() );
    }
    
    function ExecuteCommand( commandName ) {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Execute the command.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
    editor.execCommand( commandName );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    alert( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    alert( 'The "IsDirty" status has been reset' );
    }
    
    function Focus() {
    CKEDITOR.instances.editor3.focus();
    }
    
    function onFocus() {
    document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
    }
    
    function onBlur() {
    document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
    }
    
    </script>    
    
    
    <script>
    
    // The instanceReady event is fired, when an instance of CKEditor has finished
    // its initialization.
    CKEDITOR.on( 'instanceReady', function( ev ) {
    // Show the editor name and description in the browser status bar.
    document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';
    
    // Show this sample buttons.
    document.getElementById( 'eButtons' ).style.display = 'block';
    });
    
    function InsertHTML() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert HTML code.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
    editor.insertHtml( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function InsertText() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    var value = document.getElementById( 'txtArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert as plain text.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
    editor.insertText( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function SetContents() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Set editor contents (replace current contents).
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
    editor.setData( value );
    }
    
    function GetContents() {
    // Get the editor instance that you want to interact with.
    var editor = CKEDITOR.instances.editor4;
    
    // Get editor contents
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
    alert( editor.getData() );
    }
    
    function ExecuteCommand( commandName ) {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Execute the command.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
    editor.execCommand( commandName );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    alert( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    alert( 'The "IsDirty" status has been reset' );
    }
    
    function Focus() {
    CKEDITOR.instances.editor4.focus();
    }
    
    function onFocus() {
    document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
    }
    
    function onBlur() {
    document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
    }
    
    </script>
    
    
    <script>
    
    // The instanceReady event is fired, when an instance of CKEditor has finished
    // its initialization.
    CKEDITOR.on( 'instanceReady', function( ev ) {
    // Show the editor name and description in the browser status bar.
    document.getElementById( 'eMessage' ).innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';
    
    // Show this sample buttons.
    document.getElementById( 'eButtons' ).style.display = 'block';
    });
    
    function InsertHTML() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert HTML code.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
    editor.insertHtml( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function InsertText() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    var value = document.getElementById( 'txtArea' ).value;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Insert as plain text.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
    editor.insertText( value );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function SetContents() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    var value = document.getElementById( 'htmlArea' ).value;
    
    // Set editor contents (replace current contents).
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
    editor.setData( value );
    }
    
    function GetContents() {
    // Get the editor instance that you want to interact with.
    var editor = CKEDITOR.instances.editor4;
    
    // Get editor contents
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
    alert( editor.getData() );
    }
    
    function ExecuteCommand( commandName ) {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    
    // Check the active editing mode.
    if ( editor.mode == 'wysiwyg' )
    {
    // Execute the command.
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
    editor.execCommand( commandName );
    }
    else
    alert( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    alert( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    alert( 'The "IsDirty" status has been reset' );
    }
    
    function Focus() {
    CKEDITOR.instances.editor4.focus();
    }
    
    function onFocus() {
    document.getElementById( 'eMessage' ).innerHTML = '<b>' + this.name + ' is focused </b>';
    }
    
    function onBlur() {
    document.getElementById( 'eMessage' ).innerHTML = this.name + ' lost focus';
    }
    
    </script>
    <!--END OF THE EDITOR PART-->        
    
    
    <!--JAVASCRIPT DISPALY TRIP PRICING PERSONS-->
    <script>
    var display = {
    1: [1],
    2: [1, 2],
    3: [1, 2, 3],
    4: [1, 2, 3, 4],
    5: [1, 2, 3, 4, 5],
    11: [11],
    12: [12, 13],
    20: [20],
    22: [21, 25],
    23: [21, 22, 25],
    24: [21, 22, 23, 25],
    25: [21, 22, 23, 24, 25],
    31: [31],
    32: [31, 32],
    33: [31, 32, 33],
    34: [31, 32, 33, 34],
    35: [31, 32, 33, 34, 35],
    41: [41],
    42: [42],
    43: [43],
    51: [51],
    52: [52],
    61: [61],
    62: [62],
    71: [71],
    72: [72],
	81: [81],
    82: [82],
	91: [91],
    92: [91],
	93: [91],
    94: [91],
	95: [92],	   
    }
   	
	function selectChanged90() {
    var sel = document.getElementById("select90");
    for (var i = 91; i < 93; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }1
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
	
    function selectChanged0() {
    var sel = document.getElementById("select0");
    for (var i = 1; i < 6; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }	
	
	function selectChanged80() {
    var sel = document.getElementById("select80");
    for (var i = 81; i < 83; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }1
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
	
    function selectChanged50() {
    var sel = document.getElementById("select50");
    for (var i = 51; i < 53; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }1
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
    
    function selectChanged60() {
    var sel = document.getElementById("select60");
    for (var i = 61; i < 63; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
    
    function selectChanged70() {
    var sel = document.getElementById("select70");
    for (var i = 71; i < 73; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
    
    
    function selectChanged2() {
    var sel = document.getElementById("select2");
    for (var i = 11; i < 14; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
    
    function selectChanged3() {
    var sel = document.getElementById("select3");
    for (var i = 20; i < 26; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
    
    function selectChanged4() {
    var sel = document.getElementById("select4");
    for (var i = 31; i < 36; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
    
    function selectChanged5() {
    var sel = document.getElementById("select5");
    for (var i = 41; i < 44; i++) {
    document.getElementById("box" + i).classList.add("hidden");
    }
    display[sel.value].forEach(function(i) {
    document.getElementById("box" + i).classList.remove("hidden");
    });
    }
    
    </script>
    
    <style>
    .hidden {
    display: none
    }
    </style>
    
    <!--END OF DISPLAY TRIP PRICING PERSONS-->
    
    <!--PRICING, INSURANCE AND SERVICE FEES CALCULATIORS-->
    <script>
    function myFunction100() {
    var y = document.getElementById("snp").value;
    var z = document.getElementById("sfpp").value;
    var x = Number(y) * Number(z);
    document.getElementById("sgt").value = x;
    
    }
    </script>
    
    <script>
    function myFunction1000() {
    var yv = document.getElementById("snp0").value;
    var zv = document.getElementById("sfpp0").value;
    var xv = Number(yv) * Number(zv);
    document.getElementById("sgt0").value = xv;
    
    }
    </script>    
    
    <script>
    function myFunction201() {
    var y1 = document.getElementById("ppp1").value;
    var z1 = document.getElementById("nop1").value;
    var x1 = Number(y1) * Number(z1);
    document.getElementById("tp1").value = x1;
    }
    </script>
    <script>
    function myFunction202() {
    var y2 = document.getElementById("ppp2").value;
    var z2 = document.getElementById("nop2").value;
    var x2 = Number(y2) * Number(z2);
    document.getElementById("tp2").value = x2;
    }
    </script>
    <script>
    function myFunction203() {
    var y3 = document.getElementById("ppp3").value;
    var z3 = document.getElementById("nop3").value;
    var x3 = Number(y3) * Number(z3);
    document.getElementById("tp3").value = x3;
    }
    </script>
    <script>
    function myFunction204() {
    var y4 = document.getElementById("ppp4").value;
    var z4 = document.getElementById("nop4").value;
    var x4 = Number(y4) * Number(z4);
    document.getElementById("tp4").value = x4;
    }
    </script>
    <script>
    function myFunction205() {
    var y5 = document.getElementById("ppp5").value;
    var z5 = document.getElementById("nop5").value;
    var x5 = Number(y5) * Number(z5);
    document.getElementById("tp5").value = x5;
    }
    </script>
    <script>
    function myFunction207() {
    var y7 = document.getElementById("tp1").value;
    var z7 = document.getElementById("tp2").value;
    var a7 = document.getElementById("tp3").value;
    var b7 = document.getElementById("tp4").value;
    var c7 = document.getElementById("tp5").value;
    var x7 = Number(y7) + Number(z7) + Number(a7) + Number(b7) + Number(c7);
    document.getElementById("fp").value = x7;
    }
    </script>
    
    <!--<script>
    function myFunction208() {
    var y8 = document.getElementById("tp1").value;
    var z8 = document.getElementById("tp2").value;
    var a8 = document.getElementById("tp3").value;
    var b8 = document.getElementById("tp4").value;
    var c8 = document.getElementById("tp5").value;
    var x8 = Number(y8) + Number(z8) + Number(a8) + Number(b8) + Number(c8);

    document.getElementById("pdue1").value = x8;
    }
    </script>
    
    <script>
    function myFunction209() {
    var y88 = document.getElementById("tp1").value;
    var z88 = document.getElementById("tp2").value;
    var a88 = document.getElementById("tp3").value;
    var b88 = document.getElementById("tp4").value;
    var c88 = document.getElementById("tp5").value;
    var z9 = document.getElementById("pdue1").value;
    var x88 = Number(y88) + Number(z88) + Number(a88) + Number(b88) + Number(c88);
    var x9 = Number(x88) - Number(z9);
    document.getElementById("pdue2").value = x9;
    }
    </script>
    
    <script>
    function myFunction210() {
    var y88 = document.getElementById("tp1").value;
    var z88 = document.getElementById("tp2").value;
    var a88 = document.getElementById("tp3").value;
    var b88 = document.getElementById("tp4").value;
    var c88 = document.getElementById("tp5").value;
    var x88 = Number(y88) + Number(z88) + Number(a88) + Number(b88) + Number(c88);
    var z10 = document.getElementById("pdue1").value;
    var y10 = document.getElementById("pdue2").value;
    var x10 = Number(x88)- Number(z10) - Number(y10);
    document.getElementById("pdue3").value = x10;
    }
    </script>
    
    <script>
    function myFunction211() {
    var y88 = document.getElementById("tp1").value;
    var z88 = document.getElementById("tp2").value;
    var a88 = document.getElementById("tp3").value;
    var b88 = document.getElementById("tp4").value;
    var c88 = document.getElementById("tp5").value;
    var x88 = Number(y88) + Number(z88) + Number(a88) + Number(b88) + Number(c88);	
    var c11 = document.getElementById("pdue1").value;
    var z11 = document.getElementById("pdue2").value;
    var y11 = document.getElementById("pdue3").value;
    var x11 = Number(x88) - Number(c11) - Number(z11) - Number(y11);
    document.getElementById("pdue4").value = x11;
    }
    </script>
    
    <script>
    function myFunction212() {
    var y889 = document.getElementById("tp1").value;
    var z889 = document.getElementById("tp2").value;
    var a889 = document.getElementById("tp3").value;
    var b889 = document.getElementById("tp4").value;
    var c889 = document.getElementById("tp5").value;
    var x889 = Number(y889) + Number(z889) + Number(a889) + Number(b889) + Number(c889);	
    var c119 = document.getElementById("pdue1").value;
    var z119 = document.getElementById("pdue2").value;
    var y119 = document.getElementById("pdue3").value;
    var r119 = document.getElementById("pdue4").value;
    var x119 = Number(x889) - Number(c119) - Number(z119) - Number(y119) - Number(r119);
    document.getElementById("pdue5").value = x119;
    }
    </script>-->
    
    <script>
    function myFunction601() {
    var y = document.getElementById("inop1").value;
    var z = document.getElementById("ipp1").value;
    var x = Number(y) * Number(z);
    document.getElementById("ito1").value = x;
    
    }
    </script>
    
    <script>
    function myFunction602() {
    var y = document.getElementById("inop2").value;
    var z = document.getElementById("ipp2").value;
    var x = Number(y) * Number(z);
    document.getElementById("ito2").value = x;
    
    }
    </script>
    
    <script>
    function myFunction603() {
    var y = document.getElementById("inop3").value;
    var z = document.getElementById("ipp3").value;
    var x = Number(y) * Number(z);
    document.getElementById("ito3").value = x;
    
    }
    </script>
    
    <script>
    function myFunction604() {
    var y = document.getElementById("inop4").value;
    var z = document.getElementById("ipp4").value;
    var x = Number(y) * Number(z);
    document.getElementById("ito4").value = x;
    
    }
    </script>
    
    <script>
    function myFunction605() {
    var y = document.getElementById("inop5").value;
    var z = document.getElementById("ipp5").value;
    var x = Number(y) * Number(z);
    document.getElementById("ito5").value = x;
    
    }
    </script>
    
    <!--VALIDATE FILE SIZE-->
    <script>
    function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MiB
        if (FileSize > 2) {
            alert('File size exceeds 2 MiB');
           // $(file).val(''); //for clearing with Jquery
        } else {

        }
    }
	</script>
    
    
    <!--::CSS for printing-->
    <style>
    @media print {
    .collapse {
    display:block !important;
    }
    }
    .hidden {
    display: none
    }
    @media print {
    .col-xl-1,
    .col-xl-2,
    .col-xl-3,
    .col-xl-4,
    .col-xl-5,
    .col-xl-6,
    .col-xl-7,
    .col-xl-8,
    .col-xl-9,
    .col-xl-10,
    .col-xl-11,
    .col-xl-12 {
    float: left;
    }
    .col-xl-12 {
    width: 100%;
    }
    .col-xl-11 {
    width: 91.66666666666666%;
    }
    .col-xl-10 {
    width: 83.33333333333334%;
    }
    .col-xl-9 {
    width: 75%;
    }
    .col-xl-8 {
    width: 66.66666666666666%;
    }
    .col-xl-7 {
    width: 58.333333333333336%;
    }
    .col-xl-6 {
    width: 50%;
    }
    .col-xl-5 {
    width: 41.66666666666667%;
    }
    .col-xl-4 {
    width: 33.33333333333333%;
    }
    .col-xl-3 {
    width: 25%;
    }
    .col-xl-2 {
    width: 16.666666666666664%;
    }
    .col-xl-1 {
    width: 8.333333333333332%;
    }
    .col-xl-pull-12 {
    right: 100%;
    }
    .col-xl-pull-11 {
    right: 91.66666666666666%;
    }
    .col-xl-pull-10 {
    right: 83.33333333333334%;
    }
    .col-xl-pull-9 {
    right: 75%;
    }
    .col-xl-pull-8 {
    right: 66.66666666666666%;
    }
    .col-xl-pull-7 {
    right: 58.333333333333336%;
    }
    .col-xl-pull-6 {
    right: 50%;
    }
    .col-xl-pull-5 {
    right: 41.66666666666667%;
    }
    .col-xl-pull-4 {
    right: 33.33333333333333%;
    }
    .col-xl-pull-3 {
    right: 25%;
    }
    .col-xl-pull-2 {
    right: 16.666666666666664%;
    }
    .col-xl-pull-1 {
    right: 8.333333333333332%;
    }
    .col-xl-pull-0 {
    right: 0;
    }
    .col-xl-push-12 {
    left: 100%;
    }
    .col-xl-push-11 {
    left: 91.66666666666666%;
    }
    .col-xl-push-10 {
    left: 83.33333333333334%;
    }
    .col-xl-push-9 {
    left: 75%;
    }
    .col-xl-push-8 {
    left: 66.66666666666666%;
    }
    .col-xl-push-7 {
    left: 58.333333333333336%;
    }
    .col-xl-push-6 {
    left: 50%;
    }
    .col-xl-push-5 {
    left: 41.66666666666667%;
    }
    .col-xl-push-4 {
    left: 33.33333333333333%;
    }
    .col-xl-push-3 {
    left: 25%;
    }
    .col-xl-push-2 {
    left: 16.666666666666664%;
    }
    .col-xl-push-1 {
    left: 8.333333333333332%;
    }
    .col-xl-push-0 {
    left: 0;
    }
    .col-xl-offset-12 {
    margin-left: 100%;
    }
    .col-xl-offset-11 {
    margin-left: 91.66666666666666%;
    }
    .col-xl-offset-10 {
    margin-left: 83.33333333333334%;
    }
    .col-xl-offset-9 {
    margin-left: 75%;
    }
    .col-xl-offset-8 {
    margin-left: 66.66666666666666%;
    }
    .col-xl-offset-7 {
    margin-left: 58.333333333333336%;
    }
    .col-xl-offset-6 {
    margin-left: 50%;
    }
    .col-xl-offset-5 {
    margin-left: 41.66666666666667%;
    }
    .col-xl-offset-4 {
    margin-left: 33.33333333333333%;
    }
    .col-xl-offset-3 {
    margin-left: 25%;
    }
    .col-xl-offset-2 {
    margin-left: 16.666666666666664%;
    }
    .col-xl-offset-1 {
    margin-left: 8.333333333333332%;
    }
    .col-xl-offset-0 {
    margin-left: 0;
    }
    	}
	    
    @media print {
	
	.bg-light, input, textarea {background:#FFF !important}	
    
	#hideprint {
    visibility: hidden;
	display: none !important;
    }
    #formfooter {
    visibility: hidde !important;
	display: none !important;
    }
    #infoboxes {
    visibility: hidde !important;
	display: none !important;
    }	
    #kt_header {
    visibility: hidden !important;
	display: none !important;
    }	
    #kt_header_mobile {
    visibility: hidden !important;
	display: none !important;
    }	
    #kt_footer {
    visibility: hidden !important;
	display: none !important;
    }		
    #kt_body, #kt_body * {
    visibility: visible;
    }
    #kt_body {
    position: absolute;
    left: 0;
    top: 0;
    }
	
	body {
	background: none !important;
	padding: 0 !important;
	margin-top:-40px !important;
	}
	
	@page { 
	size: auto;
	margin: 20px !important;
	}
    }
    </style>  
    
    <!--IF EDIT MAKE bg-light back in white-->
    <?php if (!isset($_GET['allow'])) { ?>
    <style>
	.bg-light {background:#FFF !important}
	</style> 
    <?php } ?>  
    </head>
    <!--end::Head-->    
	
	<?php if ($dbcount > 0) { ?> 
    <!--begin::Body-->
    <body  id="kt_body" class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >

    <?php if ($_GET['results']==1) { ?>
    <!--begin::Modal-->
    <div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content border border-4">
    <div class="modal-header bg-success">
    <h3 class="mb-0 font-weight-bolder text-white">Booking Authorization Email Form Sent</h3>
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
    <i aria-hidden="true" class="ki ki-close text-light"></i>
    </a>
    </div>
    <div class="modal-body">
    <p class="lead">Your booking authorization email form has been sent to your client.<br>
    <br>
    To ensure that they receive it, send them an email letting them to know to look out for it and if they do not see the email in their inbox, they are to check their spam folder.</p>
    </div>
    <div class="modal-footer bg-light">
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="btn btn-warning text-uppercase font-weight-bolder px-5 py-3" data-dismiss="modal">Close</a>
    </div>
    </div>
    </div>
    </div>
    <!--end::Modal--> 	
    <?php } ?>
        
   <!--begin::Main-->
	<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header-mobile.php');?>
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">

<!--begin::Aside-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/aside.php');?>
<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				
<!--begin::Header-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/header.php');?>
<!--end::Header-->

				<!--begin::Content-->
				<div class="content  pt-0  d-flex flex-column flex-column-fluid bg-white" id="kt_content">

  <!--begin::Hero-->
<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center">
<div class=" container ">
<!--begin::title-->
<div class="row pl-10 pr-10 justify-content-center">
<div class="text-center pt-11 col-xl-12">
<h1 class="font-weight-boldest text-uppercase text-dark display-3"><?php echo $mood ?> Booking Authorization Email Form</h1>
<h2 class="text-dark-65 font-weight-bolder">

<?php if (isset($_GET['allow'])) { ?>
    Review your client's details and either move forward with the booking or edit the form and re-submit it to them for approval.
    <?php } else { ?>
    Edit the details in the sections listed below, add or remove sections and re-submit the email form to your client for their authorization.
    <?php } ?>
</h2>
</div>
</div>
<!--end::title-->
</div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<div class="container mt-10">
<form name="myFormNAME" class="form" action="booking-authorization-update.php" method="post" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $EmaiToEmail ?>" name="EmaiToEmail" />
<input type="hidden" value="<?php echo $EmaiToFullName ?>" name="EmaiToFullName" />
<input type="hidden" value="<?php echo $BusinessEmail ?>" name="BusinessEmail" />
<input type="hidden" value="<?php echo $BusinessPhone ?>" name="BusinessPhone" />
<input type="hidden" value="<?php echo $BusinessName ?>" name="BusinessName" />
<input type="hidden" value="<?php echo $BusinessPhone ?>" name="BusinessPhone" />
<input type="hidden" value="<?php echo $BusinessFullName ?>" name="BusinessFullName" />
<input type="hidden" value="<?php echo $BookUnique ?>" name="BookUnique" />
<input type="hidden" value="<?php echo $PBookID ?>" name="BookID" />

<div class="row mb-20">
<div class="col-xl-12">
<!--begin::Booking Authorization Form Accordion-->
<div class="accordion accordion-solid accordion-panel accordion-toggle-plus text-dark pb-10" id="baf">
<?php if (!isset($_GET['allow'])) { ?>
<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading2">
<div class="card-title collapse" data-toggle="collapse" data-target="#baf2" aria-expanded="false" aria-controls="baf2" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Section Selector</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf2" class="collapse show" aria-labelledby="baf-heading2" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">If you need to send additional sections to your customer, check the boxes you require, scroll down to that section and edit the details accordingly.</p>
<!--begin::Row-->
<div class="checkbox-list text-dark font-weight-bold">
	
<?php if ($ServiceAccepted=='Yes') $text11='none'; else $text11=''; ?>

<div style="display:<?php //echo $text11 ?>">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input <?php echo $myCheck1 ?> type="checkbox" name="Checkboxes1" id="myCheck1" onclick="myFunction1()">
<span></span>Service Fee Agreement</label>
<script>
function myFunction1() {
  var checkBox = document.getElementById("myCheck1");
  var text = document.getElementById("text1");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }

}
</script>
</div>
	

<?php 
if ( ((!isset($_GET['allow']) && ($TripAccepted =='No' || $TripAccepted =='Yes'))) || (isset($_GET['allow']) && (!empty($TripDetailsPDF) || !empty($TripDetails))))
$text2='block';
else
$text2='none';

//=======================================================================

if (($TripAccepted=='Yes')) $text12='none'; else $text12='';  
?>

<div style="display:<?php //echo $text12 ?>">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input <?php echo $myCheck2 ?> type="checkbox" name="Checkboxes2" id="myCheck2" onclick="myFunction2()">
<span></span>Trip Details</label>
<script>
function myFunction2() {
  var checkBox = document.getElementById("myCheck2");
  var text = document.getElementById("text2");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }

}
</script>
</div>

<?php if (($TripPricingAccepted=='Yes')) $text13='none'; else $text13=''; ?>
<div style="display:<?php echo $text13 ?>">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input <?php echo $myCheck3 ?> type="checkbox" name="Checkboxes3" id="myCheck3" onclick="myFunction3()">
<span></span>Trip Pricing & Payment Schedule</label>
<script>
function myFunction3() {
  var checkBox = document.getElementById("myCheck3");
  var text = document.getElementById("text3");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }

}
</script>
</div>


<?php if ($TermAccepted=='Yes') $text13='none'; else $text13=''; ?>
<div style="display:<?php echo $text13 ?>">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $myCheck4 ?> name="Checkboxes4" id="myCheck4" onclick="myFunction4()">
<span></span>Trip Terms &amp; Conditions</label>
<script>
function myFunction4() {
  var checkBox = document.getElementById("myCheck4");
  var text = document.getElementById("text4");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
 }
</script>
</div>


<?php if ($CancelAccepted=='Yes') $text14='none'; else $text14=''; ?>
<div style="display:<?php echo $text14 ?>">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input <?php echo $myCheck5 ?> type="checkbox" name="Checkboxes5" id="myCheck5" onclick="myFunction5()">
<span></span>Trip Cancellation Policy</label>
<script>
function myFunction5() {
  var checkBox = document.getElementById("myCheck5");
  var text = document.getElementById("text5");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
</div>

<?php //if ($InsuranceAccepted =='Yes' || $PurchaseInsurance=='No') $text15='none'; else $text15=''; ?>
<div style="display:<?php echo $text15 ?>">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input <?php echo $myCheck6 ?> type="checkbox" name="Checkboxes6" id="myCheck6" onclick="myFunction6()">
<span></span>Travel Insurance</label>
<script>
function myFunction6() {
  var checkBox = document.getElementById("myCheck6");
  var text = document.getElementById("text6");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }

}
</script>
</div>

<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input <?php echo $myCheck7 ?> type="checkbox" name="Checkboxes7" id="myCheck7" onclick="myFunction7()">
<span></span>Additional Documents &amp; URLs</label>	
<script>
function myFunction7() {
  var checkBox = document.getElementById("myCheck7");
  var text = document.getElementById("text7");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
 
}
</script>
</div>
<p class="mb-10 mt-10 font-weight-bolder">If you know your client(s) and already have a copy of their passport, and/or credit card (first party credit card only), you can choose to NOT request for those additional items by unchecking the boxes below.</p> 
<div class="checkbox-list text-dark font-weight-bold mb-5">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $myCheck177 ?> name="RequestTravellersPassport" id="myCheck177" value="Yes">
<span></span>Request All Travellers To Upload A Copy Of Their Passport.</label>


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $myCheck277 ?> name="RequestPrimaryTravellerCC" id="myCheck277"  value="Yes">
<span></span>Request Primary Traveller To Upload A Copy Of Their Credit Card (First Party).</label>
</div>
<!--end::Row-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading3">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf3" aria-expanded="false" aria-controls="baf3" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Email To</div>
</div>
</div>
<!--end::Header-->

<!--begin::Body-->
<div id="baf3" class="collapse" aria-labelledby="baf-heading3" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">This form can only be sent back to the same client. You can change the email subject in case you are sending new or updated details.</p>
<!--begin::Email Subject-->
<div class="form-group">
<label>Email Subject</label>
<input type="text" name="EmaiToSubject" class="form-control  form-control-lg" placeholder="Email Subject" value="<?php echo $EmaiToSubject ?>" />
</div>
<!--end::Email Subject-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<?php } ?>


<?php if (isset($_GET['allow'])) { ?>
<!--begin::Ribbon-->
<?php if ($PTravellerConsent1 =='Yes' && $PTravellerConsent2 =='Yes') { $app1=1; ?>	
<div class="ribbon ribbon-top mb-5">
<div class="ribbon-target bg-success font-weight-bolder text-uppercase text-uppercase" style="top: -2px; left: 29px;">Approved</div>
</div>
<?php } else { $napp1=1 ?>
<div class="ribbon ribbon-top mb-5">
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
</div>
<?php } ?>
<!--end::Ribbon-->
<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading4">
<div class="card-title collapse" data-toggle="collapse" data-target="#baf4" aria-expanded="true" aria-controls="baf4" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Primary Traveller</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf4" class="collapse show" aria-labelledby="baf-heading4" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">Please review the Primary Traveller's details and ensure that they match the details as per their passport. Their contact details can be submitted to the airline for notifications.</p>
<!--begin::Row--> 
<div class="row">
<!--begin::Primary Traveller Title-->
<div class="col-xl-3">
<div class="form-group">
<input type="hidden" value="<?php echo $BookUnique ?>" name="BookUnique" />
<label>Title</label>
<select class="form-control form-control-lg bg-light" name="PTravellerTitle">
<option value="<?php echo $PTravellerTitle ?>"><?php echo $PTravellerTitle ?></option>
</select>
</div>
</div>
<!--end::Primary Traveller Title-->
<!--begin::Primary Traveller First Name-->
<div class="col-xl-3">
<div class="form-group">
<label>First Name</label>
<input type="text" readonly name="PTravellerFName" value="<?php echo $PTravellerFName ?>" class="form-control  form-control-lg bg-light" placeholder="First Name" />
</div>
</div>
<!--end::Primary Traveller First Name-->
<!--begin::Primary Traveller Middle Name-->
<div class="col-xl-3">
<div class="form-group">
<label>Middle Name</label>
<input type="text" readonly value="<?php echo $PTravellerMName ?>" name="PTravellerLName" class="form-control  form-control-lg bg-light" placeholder="Middle Name" />
</div>
</div>
<!--end::Primary Traveller Middle Name-->
<!--begin::Primary Traveller Last Name-->
<div class="col-xl-3">
<div class="form-group">
<label>Last Name</label>
<input type="text" readonly value="<?php echo $PTravellerLName ?>" name="PTravellerLName" class="form-control  form-control-lg bg-light" placeholder="Last Name" />
</div>
</div>
<!--end::Primary Traveller Last Name-->
<!--begin::Primary Traveller DOB-->
<div class="col-xl-3">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" readonly value="<?php echo $PTravellerDOB ?>" name="PTravellerDOB" class="form-control form-control-lg bg-light" id="kt_datepicker_1_" placeholder="Select Date">
</div>
</div>
<!--end::Primary Traveller DOB-->
<!--begin::Primary Traveller Phone-->
<div class="col-xl-3">
<div class="form-group">
<label>Phone</label>
<input type="text" readonly value="<?php echo $PTravellerPhone ?>" name="PTravellerPhone" class="form-control form-control-lg bg-light" placeholder="Phone" />
</div>
</div>
<!--end::Primary Traveller Phone-->
<!--begin::Primary Traveller Email-->
<div class="col-xl-6">
<div class="form-group">
<label>Email</label>
<input type="text" readonly value="<?php echo $PTravellerEmail ?>" name="PTravellerEmail" class="form-control form-control-lg bg-light" placeholder="Email" />
</div>
</div>
<!--end::Primary Traveller Email-->
<!--begin::Primary Traveller Street-->
<div class="col-xl-6">
<div class="form-group">
<label>Home Address (Street)</label>
<input type="text" readonly value="<?php echo $PTravellerStreet ?>" name="PTravellerStreet" class="form-control form-control-lg bg-light" placeholder="Street Address" />
</div>
</div>
<!--end::Primary Traveller Street-->
<!--begin::Primary Traveller Unit-->
<div class="col-xl-3">
<div class="form-group">
<label>Unit / Suite / Apartment</label>
<input type="text" readonly value="<?php echo $PTravellerUnit ?>" name="PTravellerUnit" class="form-control form-control-lg bg-light" placeholder="Unit / Suite / Apartment" />
</div>
</div>
<!--end::Primary Traveller Unit-->
<!--begin::Primary Traveller City-->
<div class="col-xl-3">
<div class="form-group">
<label>City</label>
<input type="text" readonly name="PTravellerCity" value="<?php echo $PTravellerCity ?>" class="form-control form-control-lg bg-light" placeholder="City" />
</div>
</div>
<!--end::Primary Traveller City-->
<!--begin::Primary Traveller Province-->
<div class="col-xl-3">
<div class="form-group">
<label>Province/State</label>
<input type="text" readonly name="PTravellerProvince" value="<?php echo $PTravellerProvince ?>" class="form-control form-control-lg bg-light" placeholder="Province/State" />
</div>
</div>
<!--end::Primary Traveller Province-->
<!--begin::Primary Traveller Postal Code-->
<div class="col-xl-3">
<div class="form-group">
<label>Postal Code / Zip Code</label>
<input type="text" readonly name="PTravellerPostal" value="<?php echo $PTravellerPostal ?>" class="form-control form-control-lg bg-light" placeholder="Postal Code / Zip Code" />
</div>
</div>
<!--end::Primary Traveller Postal Code-->
<!--begin::Primary Traveller Country-->
<div class="col-xl-3">
<div class="form-group">
<label>Country</label>
<input type="text" readonly name="PTravellerCountry" value="<?php echo $PTravellerCountry ?>" class="form-control form-control-lg bg-light" placeholder="Country" />
</div>
</div>
<!--end::Primary Traveller Country-->
<!--begin::Primary Traveller Additional Travellers-->
<div class="col-xl-3">
<div class="form-group">

<label>Additional Travellers In The Party</label>
<select class="form-control form-control-lg bg-light" name="PTravellerParty" id="select1" onchange="selectChanged1()" <?php echo $ddowndisabled ?>> 
<option value="<?php echo $PTravellerParty ?>"><?php echo $PTravellerParty1 ?></option>
</select>
</div>
</div>
<!--end::Primary Traveller Additional Travellers-->
<!--begin::Primary Traveller Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea readonly name="PTravellerNotes" class="form-control form-control-lg bg-light" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $PTravellerNotes ?></textarea>
</div>
</div>
<!--end::Primary Traveller Notes-->
<?php if ($RequestTravellersPassport=='Yes') { ?>
<!--begin::Primary Traveller Passport Button-->
<div class="col-xl-12">
<a href="../img/agents/booking-authorization-email-form/<?php echo $PrimePassport ?>" title="Download Passport" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase mb-5 px-5 py-3" type="button" download>Download Passport</a>
</div>
<!--end::Primary Traveller Passport Button-->
<?php } ?>

<!--begin::Step 1 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" onclick="return false;"  <?php echo $PTravellerConsent1check ?> name="PTravellerConsent1" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I hearby certify that the details provided are correct as per my passport.</small></label>
</div>
<!--end::Step 1 - Agree Checkbox 1-->
<!--begin::Step 1 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" onclick="return false;"  <?php echo $PTravellerConsent2check ?> name="PTravellerConsent2" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that if the details provided are incorrect and my trip is booked, it can lead to an additional change fee ($).</small></label>
</div>
<!--end::Step 1 - Agree Checkbox 2-->
</div>
<!--end::Row-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<?php } ?>


<?php 
if ((!empty($QuoteNumberPersons) || !empty($BookingFeeNumberPersons))) 
{
$text199='';
} 
else 
{
$text199='none';
} 

?>

<div id="text1" style="display:<?php echo $text199 ?>">
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($BookingStatus ==1 || $BookingStatus ==2) { ?>
<?php } ?>
<?php if ($ServiceAccepted =='Yes') { $app2=1; ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($ServiceAccepted =='No' || $ServiceAccepted =='') { $napp2=1; ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->
<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading5">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf5" aria-expanded="false" aria-controls="baf5" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Service Fee Agreement (SFA)</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf5" class="collapse" aria-labelledby="baf-heading5" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder"><?php if (isset($_GET['allow'])) { ?>
    Please review the details provided.
    <?php } else { ?>
    Use Centre Holidays' SFA or provide your own custom SFA. If your SFA is in a PDF document, you can upload it. The quote fee or booking fee is required to be filled in.
    <?php } ?></p>
    
<?php if (!isset($_GET['allow'])) { ?>    
<div class="row">
<!--begin::SFA Type-->
<div class="col-xl-6">
<div class="form-group">
<label>Service Fee Agreement Type</label>
<select name="ServiceAgreementType" class="form-control form-control-lg" id="select2" onchange="selectChanged2()">

<?php if (!empty($ServiceAgreementType)) { ?>
<option value="<?php echo $ServiceAgreementTypeValue ?>"><?php echo $DServiceAgreementType ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>

<option value="11">Centre Holidays' Service Fee Agreement</option>
<option value="12">Custom Service Fee Agreement</option>																	
</select>
</div>
</div>
<!--end::SFA Type-->
<!--begin::Currency-->
<div class="col-xl-6">
<div class="form-group">
<label>Currency</label>
<select class="form-control form-control-lg" name="ServiceCurrency" id="ServiceCurrency">

<?php if (!empty($ServiceCurrency)) { ?>
<option value="<?php echo $ServiceCurrency ?>"><?php echo $ServiceCurrency ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>

<option value="CAD">Canadian Dollar (CAD)</option>
<option value="USD">American Dollar (USD)</option>																	
</select>
</div>
</div>
<!--end::Currency-->
</div>

<?php } ?>

<!--begin::CH SFA Text-->
<div class="<?php echo $box11 ?>" id="box11">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border mb-5" style="background-color:#f3f6f9;">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<p>In order to plan and arrange your trip, a <b>quote fee</b> and/or <b>booking fee</b> may be required by Centre Holidays Inc. These fees will include up to three personalized quotes or recommendations with options that meet or exceed expectations. These fees are non-refundable. Should you decide to cancel your trip or are unable to travel for any other reason, Centre Holidays Inc. will retain these fees.<br>
  <br>
  This Service Fee Agreement only applies to trip planning provided by Centre Holidays Inc. This Service Fee Agreement does not represent resorts, airlines or any other travel vendor's policies.
</p>
</div>
</div>
</div>
</div>
</div>
<!--end::CH SFA Text-->
<!--begin::Custom SFA Text-->
<?php if (!empty($ServiceDetails) && (isset($_GET['allow']))) { ?>
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border mb-5" style="background-color:#f3f6f9;">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<?php echo $ServiceDetails ?>
</div>
</div>
</div>
</div>
<!--end::Custom SFA Text-->
<?php } ?>

<?php if (!isset($_GET['allow'])) { ?>
<div class="<?php echo $box13 ?>" id="box13">
<div class="form-group">
<label>Description</label>
<textarea class="form-control form-control-lg" rows="3" id="editor1" name="ServiceDetails" placeholder="Service Fee Agreement Details">
<?php echo $ServiceDetails ?>
</textarea>
<script>
// Replace the <textarea id="editor1"> with an CKEditor instance.
CKEDITOR.replace( 'editor1', {
on: {
focus: onFocus,
blur: onBlur,
// Check for availability of corresponding plugins.
pluginsLoaded: function( evt ) {
var doc = CKEDITOR.document, ed = evt.editor;
if ( !ed.getCommand( 'bold' ) )
doc.getById( 'exec-bold' ).hide();
if ( !ed.getCommand( 'link' ) )
doc.getById( 'exec-link' ).hide();
}
}
});
</script>
</div>
</div>
<?php } ?>


<div class="row">
<!--begin::SFA - Number Of Persons-->
<div class="col-xl-4">
<div class="form-group">
<label>Quote Fee Number Of Persons</label>
<input onChange="myFunction100()" id="snp" type="text" name="QuoteNumberPersons" value="<?php echo $QuoteNumberPersons ?>" class="form-control form-control-lg bg-light" placeholder="Number Of Persons" <?php echo $Servicereadonly ?> />
</div>
</div>
<!--end::SFA - Number Of Persons-->
<!--begin::SFA - Fee PP-->
<div class="col-xl-4">
<div class="form-group">
<label>Quote Fee Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction100()" id="sfpp" name="QuoteFeePerPerson" value="<?php echo $QuoteFeePerPerson; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Amount" <?php echo $Servicereadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $ServiceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::SFA - Fee PP-->
<!--begin::SFA - Grand Total-->
<div class="col-xl-4">
<div class="form-group">
<label>Quote Fee Total</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php
$QuoteTotalFee=number_format($QuoteNumberPersons * $QuoteFeePerPerson, 2);
?>
<input id="sgt" name="QuoteTotalFee" value="<?php echo $QuoteTotalFee ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $ServiceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::SFA - Grand Total-->
<!--begin::SFA - Number Of Persons-->
<div class="col-xl-4">
<div class="form-group">
<label>Booking Fee Number Of Persons</label>
<input onChange="myFunction1000()" id="snp0" type="text" name="BookingFeeNumberPersons" value="<?php echo $BookingFeeNumberPersons ?>" class="form-control form-control-lg bg-light" placeholder="Number Of Persons" <?php echo $Servicereadonly ?> />
</div>
</div>
<!--end::SFA - Number Of Persons-->
<!--begin::SFA - Fee PP-->
<div class="col-xl-4">
<div class="form-group">
<label>Booking Fee Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction1000()" id="sfpp0" name="BookingFeePerPerson" value="<?php echo $BookingFeePerPerson; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Amount" <?php echo $Servicereadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $ServiceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::SFA - Fee PP-->
<!--begin::SFA - Grand Total-->
<div class="col-xl-4">
<div class="form-group">
<label>Booking Fee Total</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php
$BookingTotalFee=number_format($BookingFeeNumberPersons * $BookingFeePerPerson, 2);
?>
<input id="sgt0" name="BookingTotalFee" value="<?php echo $BookingTotalFee ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $ServiceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::SFA - Grand Total-->
<!--begin::SFA - Details-->
<div class="col-xl-12">
										
<?php if (!isset($_GET['allow'])) { ?>
<div class="<?php echo $box12 ?>" id="box12">
<div class="form-group">
<label>Upload Service Fee Agreement (PDF/JPG/JPEG/PNG)</label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="ServicePDF" />
<input type="hidden" value="<?php echo $ServicePDF ?>"  name="CServicePDF" />
</div>
</div>
</div>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a document, it will be replaced if you decide to upload a new document.</div>
</div>
</div>
<!--end::Important Alert-->
<?php } ?>

</div>
<!--end::SFA - Details-->


<?php if (!empty( $ServicePDF) && isset($_GET['allow'])) { ?>
<!--begin::SFA Document-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $ServicePDF ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase px-5 py-3" type="button" download>See Service Fee Agreement</a>
<input type="hidden" value="<?php echo $ServicePDF ?>" name="ServicePDF" />
</div>
<?php } ?>
<!--end::SFA Document-->


<?php if (isset($_GET['allow'])) { if ($ServiceAccepted=='Yes') { ?>
<!--begin::Step 2 - Agree Checkbox 1-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-outline-2x radio-success radio-lg">
<input checked type="radio" name="ServiceAccepted" value="Yes" id="myCheck736" onclick="myFunction736()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Service Fee Agreement.</small></label>
</div>
<!--end::Step 2 - Agree Checkbox 1-->
<?php } else { ?>
<!--begin::Step 2 - Agree Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-outline-2x radio-danger radio-lg">
<input checked type="radio" id="myCheck737" name="ServiceAccepted" value="No" onclick="myFunction737()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Service Fee Agreement.</small></label>
</div>
<!--end::Step 2 - Agree Checkbox 2-->
<!--begin::SFA - Reason-->
<div class="col-xl-12 mt-2" id="text737">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea readonly name="ServiceNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason" style="background-color:#f3f6f9;"><?php echo $ServiceNoReason ?></textarea>
</div>
</div>
<!--end::SFA - Reason-->
<?php } }  ?>
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
</div>





<?php if (isset($_GET['allow'])) { ?>


    <?php

    //Hiding the Covid-19 Waiver for now
    if(0) {  ?>
    <div>
        <!--begin::Ribbon-->
        <div class="ribbon ribbon-top mb-5">
            <?php if ($BookingStatus == 1 || $BookingStatus == 2) { ?>
            <?php } ?>
            <?php if ($CovidAccepted == 'Yes') {
                $app3 = 1; ?>
                <div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">
                    Approved
                </div>
            <?php } ?>
            <?php if ($CovidAccepted == 'No' || $CovidAccepted == '') {
                $napp3 = 1; ?>
                <div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">
                    Please Review
                </div>
            <?php } ?>
        </div>
        <!--end::Ribbon-->


        <!--begin::Item-->
        <div class="card border p-6">
            <!--begin::Header-->
            <div class="card-header" id="baf-heading6">
                <div class="card-title collapsed" data-toggle="collapse" data-target="#baf6" aria-expanded="false"
                     aria-controls="baf6" role="button">
                    <div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">COVID-19
                        Waiver
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div id="baf6" class="collapse" aria-labelledby="baf-heading6" data-parent="">
                <div class="card-body lead pb-0 pt-3">
                    <p class="font-weight-bolder">Please review the details provided.</p>
                    <div class="row mt-10">
                        <!--begin::COVID Waiver Text-->
                        <div class="col-xl-12">
                            <div class="card card-custom card-border mb-7" style="background-color:#f3f6f9;">
                                <div class="card-body lead pt-8 text-dark">
                                    <div class="card-scroll">
                                        <p>As the worldwide COVID-19 pandemic remains ongoing at this time, I
                                            acknowledge that for this reason, and other reasons not reasonably
                                            foreseeable at this time, these travel plans may be interrupted or canceled
                                            by the supplier that is providing them, a government entity or other third
                                            party over which Centre Holidays Inc. has no control. I further acknowledge
                                            that the supplier's own cancellation, re-booking and refund policies,
                                            subject to any applicable law that is now or may later be in effect, will
                                            govern my rights and remedies, including my right to receive a refund, in
                                            such an event. Moreover, I understand that should I elect to purchase travel
                                            insurance, the terms of the policy will dictate whether, and to what extent,
                                            coverage for any financial loss may exist under the circumstances. By
                                            signing below, I hereby agree to hold Centre Holidays Inc. harmless and
                                            release the agency from any and all liability for any damages, including but
                                            not limited to monetary losses, I may incur as a result of such interruption
                                            or cancellation of these travel plans.
                                            <br>
                                            <br>
                                            By signing this agreement, I acknowledge the contagious nature of COVID-19
                                            and voluntarily assume the risk that I may be exposed to or infected by
                                            COVID-19 while traveling. Such exposure or infection may result in personal
                                            injury, illness, permanent disability, and possible death. I voluntarily
                                            agree to assume all of the foregoing risks and accept sole responsibility
                                            for any injury to myself (including, but not limited to, personal injury,
                                            disability, and death), illness, damage, loss, claim, liability, or expense,
                                            of any kind, that I may experience or incur in connection with Centre
                                            Holidays Inc.
                                            <br>
                                            <br>
                                            As travel opens around the world, all destinations, airports, air carriers,
                                            hotels, restaurants, transfer companies, car rental companies, shops and
                                            excursions have established COVID-19 safety measures and precautions which
                                            may change from day to day. These safety measures may include, but are not
                                            limited to: curfews, attraction closings and reduced hours, size of group
                                            gatherings, social distancing requirements, health screenings,
                                            self-quarantine requirements and COVID test results. By signing this
                                            agreement, I accept ultimate responsibility for myself and my travelling
                                            party to have all the necessary provisions for travel (such as COVID test
                                            results, pre-travel questionnaires, etc.) Moreover, I understand that I
                                            should assume responsibility for the necessary documents (such as COVID test
                                            results, pre-travel questionnaires, etc.) considering COVID-19, in order to
                                            travel to my specific destination.
                                            <br>
                                            <br>
                                            By signing this agreement, I acknowledge that the signature provided below
                                            will serve as my digital signature if signed through a third-party website.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::COVID Waiver Text-->


                        <!--begin::COVID Waiver Full Name-->
                        <?php if (!empty($CovidConsentName) && $CovidAccepted != 'No') { ?>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Full Name (Primary Traveller)</label>
                                    <input type="text" readonly name="CovidConsentName"
                                           value="<?php echo $CovidConsentName ?>"
                                           class="form-control form-control-lg bg-light"
                                           placeholder="Full Name (Primary Traveller)"/>
                                </div>
                            </div>
                            <!--end::COVID Waiver Full Name-->

                            <!--begin::COVID Waiver Signature-->
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Signature (Primary Traveller)</label>
                                    <br/>
                                    <textarea id="sig-dataUrl" name="sig-dataUrl" rows="5"
                                              class="hidden"><?php echo $sigdataUrl ?></textarea>
                                    <?php if (!empty($sigdataUrl)) { ?>
                                        <img class="card card-custom card-border p-5" src="<?php echo $sigdataUrl ?>"
                                             alt="Signature"
                                             style="width:300px; height:auto; max-height:300px; background-color:#f3f6f9;">
                                    <?php } ?>
                                </div>
                            </div>
                            <!--end::COVID Waiver Signature-->
                        <?php } ?>

                        <!--begin::Step 3 - Agree Checkbox-->
                        <?php if ($CovidAccepted == 'Yes') { ?>
                            <div class="col-xl-12 mt-3 mb-5">
                                <label class="radio radio-outline radio-success radio-lg radio-outline-2x">
                                    <input type="radio" checked name="CovidAccepted" id="myCheck76600" value="Yes"
                                           onClick="myFunction76700()">
                                    <span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I
                                        agree to the COVID-19 Waiver.</small></label>
                            </div>
                        <?php } else { ?>
                            <!--begin::Step 3 - Do Not Agree Checkbox-->
                            <div class="col-xl-12 mt-3 mb-5">
                                <label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
                                    <input type="radio" checked id="myCheck747" name="CovidAccepted" value="No"
                                           onclick="myFunction747()">
                                    <span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I
                                        do not agree to the COVID-19 Waiver.</small></label>
                            </div>
                            <div class="col-xl-12 mt-2" id="text747">
                                <div class="form-group">
                                    <label>Please Provide A Reason</label>
                                    <textarea readonly name="CovidNoReason" class="form-control form-control-lg"
                                              rows="2" placeholder="Please Provide A Reason"
                                              style="background-color:#f3f6f9;"><?php echo $CovidNoReason ?></textarea>
                                </div>

                                <?php if ($CovidAccepted == 'No' && $FormCancelled != 'Yes') { ?>
                                    <div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">
                                        <div class="alert-icon"><i class="fas fa-exclamation"></i></div>
                                        <div class="alert-text lead">
                                            You can edit and re-send this booking authorization email form to your
                                            client to have them sign, and agree to the COVID-19 Waiver. You can also
                                            cancel this booking authorization email form completely if your client has
                                            decided to not sign the COVID-19 Waiver.
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if ($FormCancelled == 'Yes') { ?>
                                    <div class="alert alert-custom alert-danger mt-5 mb-5" role="alert">
                                        <div class="alert-icon"><i class="fas fa-exclamation"></i></div>
                                        <div class="alert-text lead">
                                            The trip has been cancelled as the client has decided to not sign the
                                            COVID-19 Waiver.
                                        </div>
                                    </div>
                                <?php } ?>


                            </div>
                            <!--end::COVID Waiver Reason-->
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Item-->
    </div>
    <?php }  ?>

<?php }  ?>

<!--START OF THE HIDDEN DIV BASED ON COVID ACCEPTANCE-->
<?php if (!isset($_GET['allow'])) {$bookingdivs='block';} ?>

<div style="display:<?php //echo $bookingdivs ?>">
<!--START OF THE HIDDEN DIV BASED ON COVID ACCEPTANCE-->



<div id="text2" style="display:<?php echo $text2 ?>">
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($BookingStatus ==1 || $BookingStatus ==2) { ?>
<?php } ?>
<?php if ($TripAccepted =='Yes') { $app4=1; ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($TripAccepted =='No' || $TripAccepted =='') { $napp4=1; ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->
<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading7">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf7" aria-expanded="false" aria-controls="baf7" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Details</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf7" class="collapse" aria-labelledby="baf-heading7" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder"><?php if (isset($_GET['allow'])) { ?>
    Please review the details provided.
    <?php } else { ?>
    Provide the details of the trip (except pricing) and any other pertinent details. You can also upload a PDF document containing all of the details.
    <?php } ?></p>

<?php if (!isset($_GET['allow']) || ($CheckSupplier=='checked')) { ?>

<!--begin::Row-->
<div class="row">
<!--begin::Supplier-->
<div class="col-xl-6">
<div class="form-group">
<label>Supplier</label>
<input name="Supplier" value="<?php echo $Supplier ?>" type="text" class="form-control  form-control-lg bg-light" placeholder="Supplier" />
</div>
</div>
<!--end::Supplier-->
<!--begin::Booking Number-->
<div class="col-xl-6">
<div class="form-group">
<label>Booking/Quote Number</label>
<input name="BookingNumber" value="<?php echo $BookingNumber ?>"  type="text" class="form-control  form-control-lg bg-light" placeholder="Booking/Quote Number" />
</div>
</div>
<!--end::Booking Number-->
</div>
<!--end::Row-->

<?php } ?>

<?php if (!isset($_GET['allow'])) { ?>
<!--begin::Display Supplier-->
<div class="checkbox-list mb-10 text-dark font-weight-bold">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $CheckSupplier ?> name="CheckSupplier" id="CheckSupplier" value="Yes">
<span></span>Display The Supplier And Booking/Quote Number To The Client.</label>
</div>
<!--end::Display Supplier-->
<?php } ?>

<div class="row">

<!--begin::Trip Details Text-->
<div class="col-xl-12">

<?php 
if (!isset($_GET['allow']))
$showTripDetails='hidden';
else
$showTripDetails='';

if (!empty($TripDetails))
{
?>
<div class="mt-2 <?php echo $showTripDetails ?>">
<div class="form-group">
<div class="card card-custom card-border mb-7" style="background-color:#f3f6f9;">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<?php echo $TripDetails ?>
</div>
</div>
</div>
</div>
</div>
<?php } ?>

<?php if (!isset($_GET['allow'])) { ?>
<div class="form-group">
<label>Description</label>
<textarea class="form-control form-control-lg" rows="7" id="editor2" name="TripDetails" placeholder="Trip Details">
<?php echo $TripDetails ?>
</textarea>
</div>
<script>
// Replace the <textarea id="editor1"> with an CKEditor instance.
CKEDITOR.replace( 'editor2', {
on: {
focus: onFocus,
blur: onBlur,
// Check for availability of corresponding plugins.
pluginsLoaded: function( evt ) {
var doc = CKEDITOR.document, ed = evt.editor;
if ( !ed.getCommand( 'bold' ) )
doc.getById( 'exec-bold' ).hide();
if ( !ed.getCommand( 'link' ) )
doc.getById( 'exec-link' ).hide();
}
}
});
</script>
<?php } ?>


<?php if (!isset($_GET['allow'])) { ?>
<!--begin::Upload Trip Details-->
<div class="form-group mt-7">
<label>Upload Trip Details (PDF/JPG/JPEG/PNG)</label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="ValidateSize(this)" value="" accept="image/jpeg,image/png,application/pdf" name="TripDetailsPDF" id="TripDetailsPDF" />
<input type="hidden" value="<?php echo $TripDetailsPDF ?>"  name="CTripDetailsPDF" />
</div>
</div>
</div>
<!--end::Upload Trip Details-->
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">If you previously uploaded a document, it will be replaced if you decide to upload a new document.</div>
</div>
<!--end::Important Alert-->
<?php } ?>

</div>
<!--end::Trip Details Text-->



<?php if (!empty( $TripDetailsPDF )) { ?>
<?php if (isset($_GET['allow'])) { ?>
<!--begin::Trip Details Document-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $TripDetailsPDF ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase px-5 py-3" type="button">See Trip Details</a>
</div>
<!--end::Trip Details Document-->
<?php } } ?>


<?php if (isset($_GET['allow'])) { ?>
<?php if ($TripAccepted=='Yes') { ?>
<!--begin::Step 4 - Agree Checkbox-->
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input checked type="radio" name="TripAccepted" id="myCheck766" value="Yes" onClick="myFunction767()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Trip Details.</small></label>
</div>
<!--end::Step 4 - Agree Checkbox-->
<?php } else { ?>
<!--begin::Step 4 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input checked type="radio" name="TripAccepted" id="myCheck767" value="No" onClick="myFunction767()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Trip Details.</small></label>
</div>
<!--end::Step 4 - Do Not Agree Checkbox-->
<!--begin::Trip Details Reason-->
<div class="col-xl-12 mt-2" id="text767">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea readonly name="TripNoReason" class="form-control form-control-lg bg-light" rows="2" placeholder="Please Provide A Reason"><?php echo $TripNoReason ?></textarea>
</div>
</div>
<!--end::Trip Details Reason-->
<?php } } ?>


</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
</div>



<?php
if ($TripPricingAccepted =='Yes' && (!isset($_GET['allow'])))
$text3='none';
elseif ($TripPricingOptions=='')
$text3='none';
else
$text3='';
?>

<div id="text3" style="display:<?php echo $text3 ?>">
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($BookingStatus ==1 || $BookingStatus ==2) { ?>
<?php } ?>
<?php if ($TripPricingAccepted =='Yes') { $app5=1; ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($TripPricingAccepted =='No' || $TripPricingAccepted =='') { $napp5=1; ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->
<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading8">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf8" aria-expanded="true" aria-controls="baf8" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Pricing &amp; Payment Schedule</div>
</div>
</div>
<!--end::Header-->

<!--begin::Body-->
<div id="baf8" class="collapse" aria-labelledby="baf-heading8" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder"><?php if (isset($_GET['allow'])) { ?>
    Please review the details provided.
    <?php } else { ?>
    Provide your client(s) with various trip pricing options or a final pricing if you have already them. You can also set a payment schedule or ask for payment in full.
    <?php } ?></p>
<!--begin::Row-->

<?php if (!isset($_GET['allow'])) { ?>

<!--begin::Row-->
<div class="row mt-10">
<!--begin::Currency-->
<div class="col-xl-4">
<div class="form-group">
<label>Currency</label>
<select class="form-control form-control-lg" name="TripPricingCurrency">
<?php if (!empty($TripPricingCurrency)) { ?>
<option value="CAD"><?php echo $TripPricingCurrency ?></option>
<?php } ?>
<option value="">Select</option>
<option value="CAD">CAD</option>
<option value="USD">USD</option>																	
</select>
</div>
</div>
<!--end::Currency-->
<!--begin::Number Of Pricing Options-->
<div class="col-xl-4">
<div class="form-group">
<label>Pricing Options</label>

<select class="form-control form-control-lg" name="TripPricingOptions" id="select0" onchange="selectChanged0()">
<?php if (!empty($TripPricingOptions)) { ?>
<option value="<?php echo $VTripPricingOptions ?>"><?php echo $TripPricingOptions ?></option>
<?php }  ?>
<option value="">Select</option>
<option value="1">1 Pricing Option</option>
<option value="2">2 Pricing Options</option>	
<option value="3">3 Pricing Options</option>	
<option value="4">4 Pricing Options</option>	
<option value="5">5 Pricing Options</option>																	
</select>

</div>
</div>
<!--end::Number Of Pricing Options-->
<!--begin::Payment Schedule-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Schedule</label>
<select name="TripPaymentSchedule" class="form-control  form-control-lg" id="select3" onchange="selectChanged3()">
<?php if (!empty($TripPaymentSchedule)) { ?>
<option value="<?php echo $VTripPaymentSchedule ?>"><?php echo $TripPaymentSchedule ?></option>
<?php } ?>
<option value="">Select</option>															
<option value="20">Full Payment</option>
<option value="22">2 Payments</option>
<option value="23">3 Payments</option>
<option value="24">4 Payments</option>
<option value="25">5 Payments</option>						
</select>
</div>
</div>
<!--end::Payment Schedule-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<?php } ?>




<?php 
//if ($PricePerPerson1 !=0.00 || $PricePerPerson2 !=0.00 || $PricePerPerson3 !=0.00 || $PricePerPerson4 !=0.00 || $PricePerPerson5 !=0.00)
{
?>
<div class="<?php echo $box1 ?>" id="box1">
<div class="row mt-10">
<!--begin::Pricing Option 1 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="PricingType1" <?php echo $ddowndisabled ?>>
<?php if (!empty($PricingType1)) { ?>
<option value="<?php echo $PricingType1 ?>" selected="selected"><?php echo $PricingType1 ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php }  ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 1 - Type-->
<!--begin::Pricing Option 1 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input onChange="myFunction201()" id="nop1" type="number" name="NumberOfPersons1" value="<?php echo $NumberOfPersons1 ?>" class="form-control form-control-lg bg-light" placeholder="Number Of Persons" <?php echo $Tripreadonly ?> />
</div>
</div>
<!--end::Pricing Option 1 - Persons-->
<!--begin::Pricing Option 1 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction201()" id="ppp1" name="PricePerPerson1" value="<?php echo $PricePerPerson1 ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Price Per Person" <?php echo $Tripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="tp1" name="TotalPrice1" value="<?php echo $TotalPrice1 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Total-->

<?php 
if ($Tripreadonly=='Yes' || (isset($_GET['allow']))) 
{ 
$tripreadonly='readonly';
$tripbackgd='bg-light';
}
else
{
$tripreadonly='';
$tripbackgd='';	
}
?>

<!--begin::Pricing Option 1 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="PricingDescription1" <?php echo $tripreadonly ?> class="form-control form-control-lg <?php echo $tripbackgd ?>" rows="2" placeholder="Room Type, Occupancy, Child's Age, Promotion, etc.">
<?php echo $PricingDescription1 ?>
</textarea>  
</div>
</div>
<!--end::Pricing Option 1 - Description-->

<?php if (isset($_GET['allow'])) { ?>
<!--begin::Pricing Option 1 - Checkbox 1-->
<div class="col-xl-12 mb-2 mt-3" style="display:<?php echo $PricingOptionDisplay ?>">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product7[]" <?php echo $chproduct17 ?> id="product17" value="<?php echo $PricePerPerson1 ?>" type="checkbox" onclick="return false;" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option and apply it to the payment schedule.<span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct17 ?> name="pricing17" value="<?php echo $PricePerPerson1 ?>" style="display:none">
<script>
function toggle17(source) {
checkboxes = document.getElementsByName('pricing17');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 1 - Checkbox 1-->



<!--begin::Pricing Option 1 - Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" <?php echo $chproduct1 ?> id="product1" value="<?php echo $TotalPrice1 ?>" type="checkbox" onclick="return false;" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct1 ?> name="pricing1" value="<?php echo $TotalPrice1 ?>" style="display:none">
<script>
function toggle1(source) {
checkboxes = document.getElementsByName('pricing1');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 1 - Checkbox 2-->

<?php } ?>

</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>

<div class="<?php echo $box2 ?>" id="box2">

<div class="row mt-10">
<!--begin::Pricing Option 2 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg bg-light" name="PricingType2" <?php echo $ddowndisabled ?>>
<?php if (!empty($PricingType2)) { ?>
<option value="<?php echo $PricingType2 ?>" selected="selected"><?php echo $PricingType2 ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php }  ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select></div>
</div>
<!--end::Pricing Option 2 - Type-->
<!--begin::Pricing Option 2 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input onChange="myFunction202()" id="nop2" type="number" name="NumberOfPersons2" value="<?php echo $NumberOfPersons2 ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" <?php echo $Tripreadonly ?> />
</div>
</div>
<!--end::Pricing Option 2 - Persons-->
<!--begin::Pricing Option 2 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction202()" id="ppp2" name="PricePerPerson2" value="<?php echo $PricePerPerson2 ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Price Per Person" <?php echo $Tripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Price PP-->
<!--begin::Pricing Option 2 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="tp2" name="TotalPrice2" value="<?php echo $TotalPrice2 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)">
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Total-->
<!--begin::Pricing Option 2 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="PricingDescription2" <?php echo $tripreadonly ?> class="form-control form-control-lg <?php echo $tripbackgd ?>" rows="2" placeholder="Room Type, Occupancy, Child's Age, Promotion, etc.">
<?php echo $PricingDescription2 ?>
</textarea> 
</div>
</div>
<!--end::Pricing Option 2 - Description-->

<?php if (isset($_GET['allow'])) { ?>
<!--begin::Pricing Option 2 - Checkbox 1-->
<div class="col-xl-12 mb-2 mt-3" style="display:<?php echo $PricingOptionDisplay ?>">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product7[]" <?php echo $chproduct27 ?> id="product27" value="<?php echo $PricePerPerson2 ?>" type="checkbox" onclick="return false;" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option and apply it to the payment schedule. <span class="text-danger">*</span></small></label>
<input type="checkbox" name="pricing27" <?php echo $chproduct27 ?> value="<?php echo $PricePerPerson2 ?>" style="display:none">
<script>
function toggle27(source) {
checkboxes = document.getElementsByName('pricing27');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 2 - Checkbox 1-->
<!--begin::Pricing Option 2 - Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" id="product2" <?php echo $chproduct2 ?> value="<?php echo $TotalPrice2 ?>" type="checkbox" onclick="return false;" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" name="pricing2" <?php echo $chproduct2 ?> value="<?php echo $TotalPrice2 ?>" style="display:none">
<script>
function toggle2(source) {
checkboxes = document.getElementsByName('pricing2');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 2 - Checkbox 2-->
<?php } ?>

</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>

<div class="<?php echo $box3 ?>" id="box3">

<div class="row mt-10">
<!--begin::Pricing Option 3 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg bg-light" name="PricingType3" <?php echo $ddowndisabled ?>>
<?php if (!empty($PricingType3)) { ?>
<option value="<?php echo $PricingType3 ?>" selected="selected"><?php echo $PricingType3 ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php }  ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select></div>
</div>
<!--end::Pricing Option 3 - Type-->
<!--begin::Pricing Option 3 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input onChange="myFunction203()" id="nop3" type="number" name="NumberOfPersons3" value="<?php echo $NumberOfPersons3 ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" <?php echo $Tripreadonly ?> />
</div>
</div>
<!--end::Pricing Option 3 - Persons-->
<!--begin::Pricing Option 3 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction203()" id="ppp3" name="PricePerPerson3" value="<?php echo $PricePerPerson3 ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Price Per Person" <?php echo $Tripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="tp3" name="TotalPrice3" value="<?php echo $TotalPrice3 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Total-->
<!--begin::Pricing Option 3 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="PricingDescription3" <?php echo $tripreadonly ?> class="form-control form-control-lg <?php echo $tripbackgd ?>" rows="2" placeholder="Room Type, Occupancy, Child's Age, Promotion, etc.">
<?php echo $PricingDescription3 ?>
</textarea> 
</div>
</div>
<!--end::Pricing Option 3 - Description-->

<?php if (isset($_GET['allow'])) { ?>
<!--begin::Pricing Option 3 - Checkbox 1-->
<div class="col-xl-12 mb-2 mt-3" style="display:<?php echo $PricingOptionDisplay ?>">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product7[]" id="product37" <?php echo $chproduct37 ?> value="<?php echo $PricePerPerson3 ?>" type="checkbox" onclick="return false;" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option and apply it to the payment schedule. <span class="text-danger">*</span></small></label>
<input type="checkbox" name="pricing37" <?php echo $chproduct37 ?> value="<?php echo $PricePerPerson3 ?>" style="display:none">
<script>
function toggle37(source) {
checkboxes = document.getElementsByName('pricing37');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 3 - Checkbox 1-->
<!--begin::Pricing Option 3 - Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" id="product3" <?php echo $chproduct3 ?>  value="<?php echo $TotalPrice3 ?>" type="checkbox" onclick="return false;" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" name="pricing3" <?php echo $chproduct3 ?> value="<?php echo $TotalPrice3 ?>" style="display:none">
<script>
function toggle3(source) {
checkboxes = document.getElementsByName('pricing3');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 3 - Checkbox 2-->
<?php } ?>

</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>

<div class="<?php echo $box4 ?>" id="box4">

<div class="row mt-10">
<!--begin::Pricing Option 4 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg bg-light" name="PricingType4" <?php echo $ddowndisabled ?>>
<?php if (!empty($PricingType4)) { ?>
<option value="<?php echo $PricingType4 ?>" selected="selected"><?php echo $PricingType4 ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php }  ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select></div>
</div>
<!--end::Pricing Option 4 - Type-->
<!--begin::Pricing Option 4 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input onChange="myFunction204()" id="nop4" type="number" name="NumberOfPersons4" value="<?php echo $NumberOfPersons4 ?>" class="form-control form-control-lg bg-light" placeholder="Number Of Persons" <?php echo $Tripreadonly ?> />
</div>
</div>
<!--end::Pricing Option 4 - Persons-->
<!--begin::Pricing Option 4 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction204()" id="ppp4" name="PricePerPerson4" value="<?php echo $PricePerPerson4 ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Price Per Person" <?php echo $Tripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Price PP-->
<!--begin::Pricing Option 4 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="tp4" name="TotalPrice4" value="<?php echo $TotalPrice4 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Total-->
<!--begin::Pricing Option 4 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="PricingDescription4" <?php echo $tripreadonly ?> class="form-control form-control-lg <?php echo $tripbackgd ?>" rows="2" placeholder="Room Type, Occupancy, Child's Age, Promotion, etc.">
<?php echo $PricingDescription4 ?>
</textarea> 
</div>
</div>
<!--end::Pricing Option 4 - Description-->

<?php if (isset($_GET['allow'])) { ?>
<!--begin::Pricing Option 4 - Checkbox 1-->
<div class="col-xl-12 mb-2 mt-3" style="display:<?php echo $PricingOptionDisplay ?>">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product7[]" <?php echo $chproduct47 ?> id="product47" value="<?php echo $PricePerPerson4 ?>" type="checkbox" onclick="return false;" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option and apply it to the payment schedule. <span class="text-danger">*</span></small></label>
<input type="checkbox" <?php echo $chproduct47 ?> name="pricing47" value="<?php echo $PricePerPerson4 ?>" style="display:none">
<script>
function toggle47(source) {
checkboxes = document.getElementsByName('pricing47');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 4 - Checkbox 1-->
<!--begin::Pricing Option 4 - Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" id="product4" <?php echo $chproduct4 ?> value="<?php echo $TotalPrice4 ?>" type="checkbox" onclick="return false;"/>
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" name="pricing4" <?php echo $chproduct4 ?> value="<?php echo $TotalPrice4 ?>" style="display:none">
<script>
function toggle4(source) {
checkboxes = document.getElementsByName('pricing4');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 4 - Checkbox 2-->
<?php } ?>

</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>


<div class="<?php echo $box5 ?>" id="box5">

<div class="row mt-10">
<!--begin::Pricing Option 5 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg bg-light" name="PricingType5" <?php echo $ddowndisabled ?>>
<?php if (!empty($PricingType5)) { ?>
<option value="<?php echo $PricingType5 ?>" selected="selected"><?php echo $PricingType5 ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php }  ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select></div>
</div>
<!--end::Pricing Option 5 - Type-->
<!--begin::Pricing Option 5 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input onChange="myFunction205()" id="nop5" type="number" name="NumberOfPersons5" value="<?php echo $NumberOfPersons5 ?>" class="form-control form-control-lg bg-light" placeholder="Number Of Persons" <?php echo $Tripreadonly ?> />
</div>
</div>
<!--end::Pricing Option 5 - Persons-->
<!--begin::Pricing Option 5 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction205()" id="ppp5" name="PricePerPerson5" value="<?php echo $PricePerPerson5 ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Price Per Person" <?php echo $Tripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Price PP-->
<!--begin::Pricing Option 5 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="tp5" name="TotalPrice5" value="<?php echo $TotalPrice5 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Total-->
<!--begin::Pricing Option 5 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="PricingDescription5" <?php echo $tripreadonly ?> class="form-control form-control-lg <?php echo $tripbackgd ?>" rows="2" placeholder="Room Type, Occupancy, Child's Age, Promotion, etc.">
<?php echo $PricingDescription5 ?>
</textarea> 
</div>
</div>
<!--end::Pricing Option 5 - Description-->

<?php if (isset($_GET['allow'])) { ?>
<!--begin::Pricing Option 5 - Checkbox 1-->
<div class="col-xl-12 mb-2 mt-3" style="display:<?php echo $PricingOptionDisplay ?>">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product7[]" id="product57" <?php echo $chproduct57 ?> value="<?php echo $PricePerPerson5 ?>" type="checkbox" onclick="return false;" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option and apply it to the payment schedule. <span class="text-danger">*</span></small></label>
<input type="checkbox" name="pricing57" <?php echo $chproduct57 ?> value="<?php echo $PricePerPerson5 ?>" style="display:none">
<script>
function toggle37(source) {
checkboxes = document.getElementsByName('pricing37');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>

</div>
<!--end::Pricing Option 5 - Checkbox 1-->
<!--begin::Pricing Option 5 - Checkbox 2-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input name="product[]" id="product5" <?php echo $chproduct5 ?> value="<?php echo $TotalPrice5 ?>" type="checkbox" onclick="return false;" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">By selecting this pricing option, I hereby certify that the details provided are correct. <span class="text-danger">*</span></small></label>
<input type="checkbox" name="pricing5" <?php echo $chproduct5 ?> value="<?php echo $TotalPrice5 ?>" style="display:none">
<script>
function toggle5(source) {
checkboxes = document.getElementsByName('pricing5');
for (var i = 0, n = checkboxes.length; i < n; i++) {
checkboxes[i].checked = source.checked;
}
}
</script>
</div>
<!--end::Pricing Option 5 - Checkbox 2-->
<?php } ?>

</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>

<?php } ?>

<div class="<?php echo $box20 ?>" id="box20">

<?php 

if (isset($_GET['allow'])) 
$Scheduleclass='col-xl-3';
else
$Scheduleclass='col-xl-6';

?>

<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule - Full Payment-->
<div class="<?php echo $Scheduleclass ?>">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="FullPayment" value="<?php echo $FullPayment; ?>" class="form-control form-control-lg" placeholder="Payment Type" style="background-color:#f3f6f9;" readonly />
</div>
</div>
<!--end::Pricing Schedule - Full Payment-->
<!--begin::Pricing Schedule - Due Date-->
<div class="<?php echo $Scheduleclass ?>">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" id="kt_datepicker_1" name="FullPaymentDate" value="<?php echo $FullPaymentDate; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule - Due Date-->
<?php if (isset($_GET['allow'])) { ?>
<!--begin::Pricing Schedule - Total Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Total Number Of Persons</label>
<input type="text" id="gresultdiv0" name="gresultdiv0" value="<?php echo $TotalPersons ?>" class="form-control form-control-lg bg-light" placeholder="Total Number Of Persons" readonly />
</div>
</div>
<!--end::Pricing Schedule - Total Number Of Persons-->
<!--begin::Pricing Schedule - Total Amount-->
<div class="col-xl-3">
<div class="form-group">
<label>Grand Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="TotalAmountDue" id="TotalAmountDue" value="<?php echo $TripGrandTotal ?>" class="form-control form-control-lg bg-light-success" placeholder="Grand Total"  <?php echo $Tripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule - Total Amount-->
<?php } ?>


</div>
<!--end::Row-->
</div>


<!--JAVASCRIPT FOR SCHEDUAL------------------------------->
<!--JAVASCRIPT FOR SCHEDUAL------------------------------->
<!--JAVASCRIPT FOR SCHEDUAL------------------------------->

<input type="hidden" value="<?php echo $NumberOfPersons1 ?>" id="firstNum1" name="firstNum1">
<input type="hidden" value="<?php echo $NumberOfPersons2 ?>" id="firstNum2" name="firstNum2">
<input type="hidden" value="<?php echo $NumberOfPersons3 ?>" id="firstNum3" name="firstNum3">
<input type="hidden" value="<?php echo $NumberOfPersons4 ?>" id="firstNum4" name="firstNum4">
<input type="hidden" value="<?php echo $NumberOfPersons5 ?>" id="firstNum5" name="firstNum5">

<input type="hidden" value="<?php echo $PaymentDue1; ?>" id="secondNum1" name="secondNum1">
<input type="hidden" value="<?php echo $PaymentDue2; ?>" id="secondNum2" name="secondNum2">
<input type="hidden" value="<?php echo $PaymentDue3; ?>" id="secondNum3" name="secondNum3">
<input type="hidden" value="<?php echo $PaymentDue4; ?>" id="secondNum4" name="secondNum4">
<input type="hidden" value="<?php echo $PaymentDue5; ?>" id="secondNum5" name="secondNum5">

<input type="hidden" value="<?php echo $PricePerPerson1*$NumberOfPersons1; ?>" id="ThirdNum1" name="ThirdNum1">
<input type="hidden" value="<?php echo $PricePerPerson2*$NumberOfPersons2; ?>" id="ThirdNum2" name="ThirdNum2">
<input type="hidden" value="<?php echo $PricePerPerson3*$NumberOfPersons3; ?>" id="ThirdNum3" name="ThirdNum3">
<input type="hidden" value="<?php echo $PricePerPerson4*$NumberOfPersons4; ?>" id="ThirdNum4" name="ThirdNum4">
<input type="hidden" value="<?php echo $PricePerPerson5*$NumberOfPersons5; ?>" id="ThirdNum5" name="ThirdNum5">



<script>
function fmultiply(){
	var lfckv10 = document.getElementById("product1").checked;
	var lfckv20 = document.getElementById("product2").checked;
	var lfckv30 = document.getElementById("product3").checked;	
	var lfckv40 = document.getElementById("product4").checked;
	var lfckv50 = document.getElementById("product5").checked;	
	
	num10 = document.getElementById("firstNum1").value;
	num20 = document.getElementById("firstNum2").value;
	num30 = document.getElementById("firstNum3").value;	
	num40 = document.getElementById("firstNum4").value;
	num50 = document.getElementById("firstNum5").value;
	
	if (lfckv10 == true) {	
	gresultdiv10=num10*1;		
	}
	if (lfckv10 == false) {	
	gresultdiv10 = 0;
	}
	
	if (lfckv20 == true) {	
	gresultdiv20=num20*1;		
	}
	if (lfckv20 == false) {	
	gresultdiv20 = 0;
	}
	
	if (lfckv30 == true) {	
	gresultdiv30=num30*1;		
	}
	if (lfckv30 == false) {	
	gresultdiv30 = 0;
	}
	
	if (lfckv40 == true) {	
	gresultdiv40=num40*1;		
	}
	if (lfckv40 == false) {	
	gresultdiv40 = 0;
	}
	
	if (lfckv50 == true) {	
	gresultdiv50=num50*1;		
	}
	if (lfckv50 == false) {	
	gresultdiv50 = 0;
	}				
	
	
	<?php if (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3']) && !empty($row['PricePerPerson4']) && !empty($row['PricePerPerson5'])) { ?>
	gresultdiv0=gresultdiv10+gresultdiv20+gresultdiv30+gresultdiv40+gresultdiv50;
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3']) && !empty($row['PricePerPerson4'])) { ?>
	gresultdiv0=gresultdiv10+gresultdiv20+gresultdiv30+gresultdiv40;
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3'])) { ?>
	gresultdiv0=gresultdiv10+gresultdiv20+gresultdiv30;	
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2'])) { ?>
	gresultdiv0=gresultdiv10+gresultdiv20;		
	<?php } elseif (!empty($row['PricePerPerson1'])) { ?>
	gresultdiv0=gresultdiv10;		
	<?php } ?>	


	document.getElementById("gresultdiv0").value = gresultdiv0; // Number of persons
	
}
</script>

<script>
function multiply(){
	var lfckv1 = document.getElementById("product17").checked;
	var lfckv2 = document.getElementById("product27").checked;
	var lfckv3 = document.getElementById("product37").checked;	
	var lfckv4 = document.getElementById("product47").checked;
	var lfckv5 = document.getElementById("product57").checked;				
	
	num1 = document.getElementById("firstNum1").value;
	num2 = document.getElementById("firstNum2").value;
	num3 = document.getElementById("firstNum3").value;	
	num4 = document.getElementById("firstNum4").value;
	num5 = document.getElementById("firstNum5").value;		
	
	snum1 = document.getElementById("secondNum1").value;
	snum2 = document.getElementById("secondNum2").value;
	snum3 = document.getElementById("secondNum3").value;
	snum4 = document.getElementById("secondNum4").value;
	snum5 = document.getElementById("secondNum5").value;
	
	tsnum1 = document.getElementById("ThirdNum1").value;
	tsnum2 = document.getElementById("ThirdNum2").value;
	tsnum3 = document.getElementById("ThirdNum3").value;
	tsnum4 = document.getElementById("ThirdNum4").value;
	tsnum5 = document.getElementById("ThirdNum5").value;				
	
	if (lfckv1 == true) {
	result11 = num1 * snum1;
	result12 =  num1 * snum2;	
	result13 =  num1 * snum3;	
	result14 =  num1 * snum4;	
	result15 =  num1 * snum5;	
	gresultdiv1=num1*1;	
	gresultba1=tsnum1*1;	
	}
	if (lfckv1 == false) {
	result11 = 0;
	result12 = 0;	
	result13 = 0;	
	result14 = 0;	
	result15 = 0;	
	gresultdiv1 = 0;
	gresultba1 = 0;
	}
	
	if (lfckv2 == true) {	
	result21 =  num2 * snum1;			
	result22 =  num2 * snum2;	
	result23 =  num2 * snum3;	
	result24 =  num2 * snum4;	
	result25 =  num2 * snum5;
	gresultdiv2=num2*1;
	gresultba2=tsnum2*1;			
	}
	if (lfckv2 == false) {	
	result21 = 0;			
	result22 = 0;	
	result23 = 0;	
	result24 = 0;	
	result25 = 0;		
	gresultdiv2 = 0;
	gresultba2 = 0;			
	}	
	
	if (lfckv3 == true) {
	result31 =  num3 * snum1;			
	result32 =  num3 * snum2;	
	result33 =  num3 * snum3;	
	result34 =  num3 * snum4;	
	result35 =  num3 * snum5;
	gresultdiv3=num3*1;	
	gresultba3=tsnum3*1;			
	}
	if (lfckv3 == false) {	
	result31 = 0;			
	result32 = 0;	
	result33 = 0;	
	result34 = 0;	
	result35 = 0;	
	gresultdiv3 = 0;
	gresultba3 = 0;			
	}
	
	if (lfckv4 == true) {
	result41 =  num4 * snum1;			
	result42 =  num4 * snum2;	
	result43 =  num4 * snum3;	
	result44 =  num4 * snum4;	
	result45 =  num4 * snum5;
	gresultdiv4=num4*1;	
	gresultba4=tsnum4*1;			
	}
	if (lfckv4 == false) {	
	result41 = 0;			
	result42 = 0;	
	result43 = 0;	
	result44 = 0;	
	result45 = 0;
	gresultdiv4 = 0;	
	gresultba4 = 0;			
	}
	
	if (lfckv5 == true) {
	result51 =  num5 * snum1;			
	result52 =  num5 * snum2;	
	result53 =  num5 * snum3;	
	result54 =  num5 * snum4;	
	result55 =  num5 * snum5;	
	gresultdiv5=num5*1;
	gresultba5=tsnum5*1;			
	}
	if (lfckv5 == false) {	
	result51 = 0;			
	result52 = 0;	
	result53 = 0;	
	result54 = 0;	
	result55 = 0;
	gresultdiv5 = 0;
	gresultba5 = 0;				
	}			
	
	result1=result11+result21+result31+result41+result51;
	result2=result12+result22+result32+result42+result52;
	result3=result13+result23+result33+result43+result53;
	result4=result14+result24+result34+result44+result54;
	result5=result15+result25+result35+result45+result55;
	
	<?php if (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3']) && !empty($row['PricePerPerson4']) && !empty($row['PricePerPerson5'])) { ?>
	gresult = result1+result2+result3+result4+result5;
	gresultdiv=gresultdiv1+gresultdiv2+gresultdiv3+gresultdiv4+gresultdiv5;
	gresultba=gresultba1+gresultba2+gresultba3+gresultba4+gresultba5;
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3']) && !empty($row['PricePerPerson4'])) { ?>
	gresult = result1+result2+result3+result4;
	gresultdiv=gresultdiv1+gresultdiv2+gresultdiv3+gresultdiv4;
	gresultba=gresultba1+gresultba2+gresultba3+gresultba4;	
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2']) && !empty($row['PricePerPerson3'])) { ?>
	gresult = result1+result2+result3;
	gresultdiv=gresultdiv1+gresultdiv2+gresultdiv3;
	gresultba=gresultba1+gresultba2+gresultba3;	
	<?php } elseif (!empty($row['PricePerPerson1']) && !empty($row['PricePerPerson2'])) { ?>
	gresult = result1+result2;
	gresultdiv=gresultdiv1+gresultdiv2;
	gresultba=gresultba1+gresultba2;		
	<?php } elseif (!empty($row['PricePerPerson1'])) { ?>
	gresult = result1;
	gresultdiv=gresultdiv1;
	gresultba=gresultba1;		
	<?php } ?>

	
	document.getElementById("gresult").value = gresult.toFixed(2);
	
	document.getElementById("gresultdiv").value = gresultdiv; // Number of persons
	document.getElementById("gresultba").value = gresultba.toFixed(2);// Grand total
	
	/*Total Balanace*/
	bgresultba=gresultba-gresult;
	/*Balanace per person*/
	averperperson= bgresultba/gresultdiv; 
	
	document.getElementById("bgresultba").value = bgresultba.toFixed(2);// Total Balanace
	document.getElementById("averperperson").value = averperperson.toFixed(2);// Balanace per person
	
	document.getElementById("result1").value = result1.toFixed(2);
	document.getElementById("result2").value = result2.toFixed(2);
	document.getElementById("result3").value = result3.toFixed(2);
	document.getElementById("result4").value = result4.toFixed(2);
	document.getElementById("result5").value = result5.toFixed(2);
	

		
}
</script>

<!--end JAVASCRIPT FOR SCHEDUAL------------------------------->
<!--end JAVASCRIPT FOR SCHEDUAL------------------------------->
<!--end JAVASCRIPT FOR SCHEDUAL------------------------------->






<div class="<?php echo $box21 ?>" id="box21">

<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 1 - Payment Type-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType1" value="<?php echo $PaymentType1; ?>" class="form-control form-control-lg" placeholder="Payment Type" style="background-color:#f3f6f9;" readonly />
</div>
</div>
<!--end::Pricing Schedule 1 - Payment Type-->
<!--begin::Pricing Schedule 1 - Due Date-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" id="kt_datepicker_1" name="PaymentDate1" value="<?php echo $PaymentDate1; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 1 - Due Date-->
<!--begin::Pricing Schedule 1 - Amount PP-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Amount Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue1" id="PaymentDue1" value="<?php echo $PaymentDue1; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Amount Due (Tax Inc.)"  <?php echo $Tripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 1 - Amount PP-->
<!--begin::Pricing Schedule 1 - Total-->
<div class="<?php echo $deposithide ?> <?php echo $depositclass ?>">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="result1" name="result1" value="<?php echo $result1 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 1 - Total-->
</div>
<!--end::Row-->
</div>


<div class="<?php echo $box22 ?>" id="box22">

<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 2 - Payment Type-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType2" value="<?php echo $PaymentType2; ?>" class="form-control form-control-lg" placeholder="Payment Type" style="background-color:#f3f6f9;" readonly />
</div>
</div>
<!--end::Pricing Schedule 2 - Payment Type-->
<!--begin::Pricing Schedule 2 - Due Date-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" id="kt_datepicker_1" name="PaymentDate2" value="<?php echo $PaymentDate2; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 2 - Due Date-->
<!--begin::Pricing Schedule 2 - Amount-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Amount Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue2" id="PaymentDue2" value="<?php echo $PaymentDue2; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Amount Due (Tax Inc.)"  <?php echo $Tripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 2 - Amount PP-->
<!--begin::Pricing Schedule 2 - Total-->
<div class="<?php echo $deposithide ?> <?php echo $depositclass ?>">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="result2" name="result2" value="<?php echo $result2 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 2 - Total-->
</div>
<!--end::Row-->
</div>


<div class="<?php echo $box23 ?>" id="box23">

<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 3 - Payment Type-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType3" value="<?php echo $PaymentType3; ?>" class="form-control form-control-lg" placeholder="Payment Type" style="background-color:#f3f6f9;" readonly />
</div>
</div>
<!--end::Pricing Schedule 3 - Payment Type-->
<!--begin::Pricing Schedule 3 - Due Date-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" id="kt_datepicker_1" name="PaymentDate3" value="<?php echo $PaymentDate3; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 3 - Due Date-->
<!--begin::Pricing Schedule 3 - Amount PP-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Amount Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue3" id="PaymentDue3" value="<?php echo $PaymentDue3; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Amount Due (Tax Inc.)"  <?php echo $Tripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 3 - Amount PP-->
<!--begin::Pricing Schedule 3 - Total-->
<div class="<?php echo $deposithide ?> <?php echo $depositclass ?>">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="result3" name="result3" value="<?php echo $result3 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 3 - Total-->
</div>
<!--end::Row-->
</div>
<div class="<?php echo $box24 ?>" id="box24">
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Schedule 4 - Payment Type-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType4" value="<?php echo $PaymentType4; ?>" class="form-control form-control-lg" placeholder="Payment Type" style="background-color:#f3f6f9;" readonly />
</div>
</div>
<!--end::Pricing Schedule 4 - Payment Type-->
<!--begin::Pricing Schedule 4 - Due Date-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" id="kt_datepicker_1" name="PaymentDate4" value="<?php echo $PaymentDate4; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 4 - Due Date-->
<!--begin::Pricing Schedule 4 - Amount PP-->
<div class="<?php echo $depositclass ?>">
<div class="form-group">
<label>Amount Per Person (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="PaymentDue4" id="PaymentDue4" value="<?php echo $PaymentDue4; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Amount Due (Tax Inc.)"  <?php echo $Tripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 4 - Amount PP-->
<!--begin::Pricing Schedule 4 - Total-->
<div class="<?php echo $deposithide ?> <?php echo $depositclass ?>">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="result4" name="result4" value="<?php echo $result4 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 4 - Total-->
</div>
<!--end::Row-->
</div>

<div class="<?php echo $box25 ?>" id="box25">

<!--begin::Row-->
<div class="row">
<script>
function subtrIt() {
var y = document.getElementById("total").value;
<?php if (!empty($PaymentDue1)) { ?>
var a = document.getElementById("PaymentDue1").value;
<?php } if (!empty($PaymentDue2)) { ?>
var b = document.getElementById("PaymentDue2").value;
<?php } if (!empty($PaymentDue3)) { ?>
var c = document.getElementById("PaymentDue3").value;
<?php } if (!empty($PaymentDue4)) { ?>
var d = document.getElementById("PaymentDue4").value;
<?php }  ?>
var x = Number(y) 
<?php if (!empty($PaymentDue1)) { ?>
- Number(a) 
<?php } if (!empty($PaymentDue2)) { ?>
- Number(b)
<?php } if (!empty($PaymentDue3)) { ?>
- Number(c)
<?php } if (!empty($PaymentDue4)) { ?>
- Number(d)
<?php }  ?>
;
document.getElementById("PaymentDue5").value = x;
}
</script>


<?php 
if (!isset($_GET['allow'])) 
$finalpaymentclass='col-xl-6';
else
$finalpaymentclass='col-xl-4';
?>
<!--begin::Pricing Schedule 5 - Payment Type-->
<div class="<?php echo $finalpaymentclass ?>">
<div class="form-group">
<label>Payment Type</label>
<input type="text" name="PaymentType5" value="Final Payment" class="form-control form-control-lg" placeholder="Payment Type" style="background-color:#f3f6f9;" readonly />
</div>
</div>
<!--end::Pricing Schedule 5 - Payment Type-->
<!--begin::Pricing Schedule 5 - Due Date-->
<div class="<?php echo $finalpaymentclass ?>">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" id="kt_datepicker_1" name="PaymentDate5" value="<?php echo $PaymentDate5; ?>" class="form-control form-control-lg bg-light" placeholder="Due Date (M/D/Y)" readonly />
</div>
</div>
<!--end::Pricing Schedule 5 - Due Date-->
<?php if (isset($_GET['allow'])) { ?>
<!--begin::Pricing Schedule 5 - Total Balance-->
<div class="col-xl-4">
<div class="form-group">
<label>Total Balance (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input class="form-control form-control-lg bg-light-success" type="text" id="bgresultba" name="bgresultba" value="<?php echo $TotalBalanace ?>" placeholder="Total Balance" readonly/>
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Schedule 5 - Total Balance-->
<?php } ?>

</div>
<!--end::Row-->

<?php if (!isset($_GET['allow'])) { ?>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5 mt-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">The balance amount for the final payment will be calculated once the client selects their pricing option(s).</div>
</div>
<!--end::Important Alert-->
<?php } ?>

</div>

<?php if (isset($_GET['allow'])) { ?>
<!--begin::Row-->
<div class="row">
<?php if ($TripPricingAccepted =='Yes') { ?>
<!--begin::Step 5 - Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input checked type="radio" id="myCheck226" name="TripPricingAccepted" value="Yes" onClick="myFunction226()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Trip Pricing and Payment Schedule.</small></label>
</div>
<!--end::Step 5 - Agree Checkbox-->
<?php } else { ?>
<!--begin::Step 5 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input checked type="radio" id="myCheck227" name="TripPricingAccepted" value="No" onClick="myFunction227()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Trip Pricing and Payment Schedule.</small></label>
</div>
<!--end::Step 5 - Do Not Agree Checkbox-->

<!--begin::Trip Pricing Reason-->
<div class="col-xl-12 mt-2" id="text227">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea readonly name="TripPricingNoReason" class="form-control form-control-lg bg-light" rows="2" placeholder="Please Provide A Reason"><?php echo $TripPricingNoReason ?></textarea>
</div>
</div>
<!--end::Trip Pricing Reason-->
<?php } ?>
</div>
<!--end::Row-->
<?php } ?>


</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
</div>


<?php if ( ((!isset($_GET['allow']) && $TermAccepted !='Yes')) || (isset($_GET['allow']))) { ?>

<div id="text4" style="display:<?php echo $text4 ?>">
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($BookingStatus ==1 || $BookingStatus ==2) { ?>
<?php } ?>
<?php if ($TermAccepted =='Yes') { $app6=1; ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($TermAccepted =='No' || $TermAccepted =='') { $napp6=1; ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->
<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading9">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf9" aria-expanded="false" aria-controls="baf9" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Terms &amp; Conditions (T&amp;C)</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf9" class="collapse" aria-labelledby="baf-heading9" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder"><?php if (isset($_GET['allow'])) { ?>
    Please review the details provided.
    <?php } else { ?>
    Select either Centre Holidays' T&amp;Cs based on the product you are booking or provide your own custom T&amp;Cs. If your T&amp;Cs are in a PDF document, you can upload it.
    <?php } ?></p>
<div class="row">
<?php if (!isset($_GET['allow'])) { ?>
<!--begin::Terms Document Options-->
<div class="col-xl-12">
<div class="form-group">
<label>Terms & Conditions Type</label>
<select class="form-control  form-control-lg" name="TermsType" id="select90" onChange="selectChanged90()">
<?php if (!empty($TermsType)) { ?>
<option value="<?php echo $TermsTypeValue ?>"><?php echo $DTermsType ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<option value="91">All-Inclusive Vacations</option>
<option value="93">Cruises</option>
<option value="94">Flights</option>
<option value="95">Custom Terms & Conditions</option>
</select>
</div>
</div>
<!--end::Terms Document Options-->
<?php } ?>


<!--Trip Terms & Conditions EDIT PART START-->
<!--Trip Terms & Conditions EDIT PART START-->
<!--Trip Terms & Conditions EDIT PART START-->
<?php
//if (!isset($_GET['allow']) && $TermsType=='Custom Terms and Conditions') { 		
?>
<!--begin::T&C Text-->

<?php if (!isset($_GET['allow'])) { ?>
<!--begin::CH T&C Important Details-->
<div class="<?php echo $box91 ?> col-xl-12" id="box91">
<div class="card card-custom card-border mb-7" style="background-color:#f3f6f9;">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>Centre Holidays' terms and conditions apply to all trips. They are a binding agreement between the travel advisor, traveller and Centre Holidays Inc.</p>
</div>
</div>
</div>
<div class="alert alert-custom alert-danger mb-5 mt-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">A PDF document containing Centre Holidays' Terms & Conditions will be provided to your client.</div>
</div>
</div>
<!--end::CH T&C Important Details-->


<div class="<?php echo $box92 ?> col-xl-12" id="box92">
<div>
<div class="form-group">
<label>Description</label>
<textarea class="form-control form-control-lg" id="editor3" name="TermsAndConditions" rows="10" placeholder="Description"><?php echo $TermsAndConditions ?></textarea>
		<script>
			// Replace the <textarea id="editor1"> with an CKEditor instance.
			CKEDITOR.replace( 'editor3', {
				on: {
					focus: onFocus,
					blur: onBlur,
					// Check for availability of corresponding plugins.
					pluginsLoaded: function( evt ) {
						var doc = CKEDITOR.document, ed = evt.editor;
						if ( !ed.getCommand( 'bold' ) )
							doc.getById( 'exec-bold' ).hide();
						if ( !ed.getCommand( 'link' ) )
							doc.getById( 'exec-link' ).hide();
					}
				}
			});
		</script>
</div>
</div>
<!--end::Trip Terms Text-->
<!--begin::Upload Terms Document-->
<div>
<div class="form-group">
<label>Upload Terms And Conditions (PDF/JPG/JPEG/PNG)</label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="TermsAndConditionsPDF" />
<input type="hidden" value="<?php echo $TermsAndConditionsPDF ?>"  name="CTermsAndConditionsPDF" />
</div>
</div>
</div>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">If you previously uploaded a document, it will be replaced if you decide to upload a new document.</div>
</div>
<!--end::Important Alert-->
</div>
</div>

<?php } ?>

<!--Trip Terms & Conditions EDIT PART END-->
<!--Trip Terms & Conditions EDIT PART END-->
<!--Trip Terms & Conditions EDIT PART END-->


<!--Trip Terms & Conditions PREVIEW PART START-->
<!--PREVIEW PART START-->
<!--PREVIEW PART START-->

<?php if ($TermsType=='Custom Terms and Conditions' && (isset($_GET['allow']))) { ?>
<div class="col-xl-12">
<div class="card card-custom card-border mb-7" style="background-color:#f3f6f9;">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<?php echo $TermsAndConditions ?>
</div>
</div>
</div>
</div>
<?php } ?>

<?php
if ($TermsType !='Custom Terms and Conditions' && (isset($_GET['allow']))) { ?>

<div class="col-xl-12">
<div class="card card-custom card-border mb-7" style="background-color:#f3f6f9;">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<p>Centre Holidays' terms and conditions apply to all trips. They are a binding agreement between the travel advisor, traveller and Centre Holidays Inc.</p>
</div>
</div>
</div>
</div>
<?php } ?>

<!--end::T&C Text-->

<?php
if ($TermsType=='Custom Terms and Conditions' && (isset($_GET['allow'])))
{
?>
<!--begin::Travel Advisor T&C-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $TermsAndConditionsPDF ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase px-5 py-3" type="button">See Trip Terms & Conditions</a>
</div>
<!--end::Travel Advisor T&C-->
<?php
}


if ($TermsType !='Custom Terms and Conditions' && (isset($_GET['allow'])))
{
?>
<!--begin::CH T&C-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $TermsType ?>.pdf" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase px-5 py-3" type="button">See Centre Holidays' Terms & Conditions</a>
</div>
<?php
}
?>
<!--end::CH T&C-->



<?php if (isset($_GET['allow'])) { ?>

<?php if ($TermAccepted =='Yes') { ?>
<!--begin::Step 6 - Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input checked type="radio" name="TermAccepted" value="Yes" id="myCheck776" onClick="myFunction776()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to all the Terms & Conditions.</small></label>
</div>
<!--end::Step 6 - Agree Checkbox-->
<?php } else { ?>
<!--begin::Step 6 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input checked type="radio" name="TermAccepted" value="No" id="myCheck777" onClick="myFunction777()">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to all the Terms & Conditions.</small></label>
</div>

<!--end::Step 6 - Do Not Agree Checkbox-->
<!--begin::T&C Reason-->
<div class="col-xl-12 mt-2" id="text777">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea readonly name="TermNoReason" class="form-control form-control-lg bg-light" rows="2" placeholder="Please Provide A Reason"><?php echo $TermNoReason ?></textarea>
</div>
</div>
<!--end::T&C Reason-->
<?php } } ?>
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
</div>

<?php } ?>
<!--Trip Terms & Conditions PREVIEW PART END-->
<!--PREVIEW PART END-->
<!--PREVIEW PART END-->




<?php if ( ((!isset($_GET['allow']) && $CancelAccepted !='Yes')) || (isset($_GET['allow']))) { ?>

<div id="text5" style="display:<?php echo $text5 ?>">
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($BookingStatus ==1 || $BookingStatus ==2) { ?>
<?php } ?>
<?php if ($CancelAccepted =='Yes') { $app7=1; ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($CancelAccepted =='No' || $CancelAccepted =='') { $napp7=1; ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->
<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading10">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf10" aria-expanded="false" aria-controls="baf10" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Cancellation Policy</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf10" class="collapse" aria-labelledby="baf-heading10" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder"><?php if (isset($_GET['allow'])) { ?>
    Please review the details provided.
    <?php } else { ?>
    Provide the cancellation policy for the trip or if the information is in a PDF document, you can upload it.
    <?php } ?></p>
<div class="row">
<?php 
if (!isset($_GET['allow']))
$showCancellationPolicy='none';
else
$showCancellationPolicy='block';
?>
<div class="col-xl-12" style="display:<?php echo $showCancellationPolicy ?>;">
<div class="form-group">
<div class="card card-custom card-border mb-7" style="background-color:#f3f6f9;">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<?php echo $CancellationPolicy ?>
</div>
</div>
</div>
</div>
</div>


<?php if (!isset($_GET['allow'])) { ?>
<!--begin::Cancellation Policy Text-->
<div class="col-xl-12">
<div class="card card-custom card-border mb-7">
<div class="card-body lead p-0 text-dark">
<div class="card-scroll">
<?php if (($CancelAccepted =='No' || $CancelAccepted =='') && (!isset($_GET['allow']))) { ?>	

<textarea class="form-control form-control-lg" id="editor4" name="CancellationPolicy" rows="10" placeholder="Cancellation Policy">
<?php echo $CancellationPolicy; ?>
</textarea>
<script>
// Replace the <textarea id="editor1"> with an CKEditor instance.
CKEDITOR.replace( 'editor4', {
on: {
focus: onFocus,
blur: onBlur,

// Check for availability of corresponding plugins.
pluginsLoaded: function( evt ) {
var doc = CKEDITOR.document, ed = evt.editor;
if ( !ed.getCommand( 'bold' ) )
doc.getById( 'exec-bold' ).hide();
if ( !ed.getCommand( 'link' ) )
doc.getById( 'exec-link' ).hide();
}
}
});
</script>


<!--begin::Upload Cancellation Policy-->
<div class="form-group mt-7">
<label>Upload Cancellation Policy (PDF/JPG/JPEG/PNG)</label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" value="<?php echo $CancellationPolicyPDF ?>" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="CancellationPolicyPDF" />
<input type="hidden" value="<?php echo $CancellationPolicyPDF ?>"  name="CCancellationPolicyPDF" />
</div>
</div>
</div>
<!--end::Upload Cancellation Policy-->
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-0" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a document, it will be replaced if you decide to upload a new document.</div>
</div>
<!--end::Important Alert-->
<?php } else {echo $CancellationPolicy;} ?>
</div>
</div>
</div>
</div>
<!--end::Cancellation Policy Text-->
<?php } ?>


<!--begin::Cancellation Policy Document-->
<?php

if (isset($_GET['allow'])) { 

if (!empty($CancellationPolicyPDF)) { ?>
<!--begin::CH T&C-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $CancellationPolicyPDF ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase px-5 py-3" type="button">See Cancellation Policy</a>
</div>
<!--end::CH T&C-->
<?php } } ?>
<!--end::Cancellation Policy Document-->
<?php 
if (isset($_GET['allow'])) { 
if ($CancelAccepted =='Yes') { ?>	
<!--begin::Step 7 - Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input checked type="radio" name="CancelAccepted" id="myCheck976" onClick="myFunction976()" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Cancellation Policy.</small></label>
</div>
<!--end::Step 7 - Agree Checkbox-->
<?php } else { ?>	
<!--begin::Step 7 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input checked type="radio" name="CancelAccepted" id="myCheck977" onClick="myFunction977()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Cancellation Policy.</small></label>
</div>
<!--end::Step 7 - Do Not Agree Checkbox-->
<!--begin::Cancellation Policy Reason-->
<div class="col-xl-12 mt-2" id="text977">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea readonly name="CancelNoReason" class="form-control form-control-lg bg-light" rows="2" placeholder="Please Provide A Reason"><?php echo $CancelNoReason ?></textarea>
</div>
</div>
<!--end::Cancellation Policy Reason-->
<?php } } ?>
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
</div>
<?php } ?>


<?php if (((isset($_GET['allow'])) || (($InsuranceAccepted =='Yes' || $PurchaseInsurance=='Yes')))) { ?>

<div  id="text6" style="display:<?php echo $text6 ?>">
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if ($BookingStatus ==1 || $BookingStatus ==2) { ?>
<?php } ?>
<?php if ($InsuranceAccepted =='Yes' || $PurchaseInsurance=='No') { $app8=1; ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if (($PurchaseInsurance=='Yes' || $PurchaseInsurance=='') && ($InsuranceAccepted =='No' || $InsuranceAccepted =='')) { $napp8=1; ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading11">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf11" aria-expanded="true" aria-controls="baf11" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Travel Insurance</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf11" class="collapse" aria-labelledby="baf-heading11" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">
	<?php if (isset($_GET['allow'])) { ?>
    Please review the details provided.
    <?php } else { ?>
    If you are permitted to sell travel insurance, provide your client(s) with various travel insurance pricing options. If you have additional travel insurance information in a PDF document, you can upload it.
    <?php } ?></p>
<!--begin::Row-->
<div class="row">
<!--begin::Travel Insurance Text-->
<div class="col-xl-12">
<div class="card card-custom card-border mb-7" style="background-color:#f3f6f9;">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
  <p>Purchasing travel insurance is highly recommended. You are covering yourself against unexpected and unforseen travel risks that occur both in your country/province of residence and in destination (including our of country and out of province trips), as outlined by the policy puchased such as; Cancellation (should you not be able to travel due to unexpected and unforseen covered reasons); Interruption (should your trip be interrupted due to unexpected and unforseen covered reasons); Baggage (lost, delayed or stolen) and Unexpected Medical Emergency costs abroad; along with protecting the financial investment you have made.
<br>
<br>
Without the benefits, as outlined in the insurance policy purchased, you can easily be out of pocket over thousands of dollars in additional expenses.
<br>
<br>
It is important to keep in mind:</p>
<ul>
<li>Provincial Health Insurance Plans cover none or minimal out of province and country emergency medical expenses. Please consult your Provincial Health Insurance Plan for further details.</li>
<li>Credit Card and Employer Group Benefits may provide limited and restrictive coverage.</li>
<li>Unforeseen and Unexpected Global Events that cause a cancellation and/or an interruption of travel plans may not result in a refund of monies paid for travel and appropriate travel insurance coverage is important in these areas.</li>
<li>Your policy's coverage is effective on the date of purchase of your travel start date, depending on the coverage.</li>
</ul>
</div>
</div>
</div>
</div>
<!--end::Travel Insurance Text-->
</div>
<!--end::Row-->



<!--begin::Row-->
<div class="row">

<?php
if (isset($_GET['allow']))
$providerclass='col-xl-12';
if (!isset($_GET['allow']))
$providerclass='col-xl-4';
?>

<?php if ($PurchaseInsurance=='Yes' && (!isset($_GET['allow'])) || !empty($InsuranceProvider)) { ?>
<!--begin::Travel Insurance Provider-->
<div class="<?php echo $providerclass ?>">
<div class="form-group">
<label>Travel Insurance Provider</label>
<select class="form-control  form-control-lg" name="InsuranceProvider" <?php echo $ddowndisabled ?>>
<?php if (!empty($InsuranceProvider)) { ?>
<option value="<?php echo $InsuranceProvider; ?>"><?php echo $InsuranceProvider; ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
																		
<option value="Blue Cross">Blue Cross</option>
<option value="Manulife">Manulife</option>
<option value="Other">Other</option>
</select>
</div>
</div>
<?php } ?>


<?php if (!isset($_GET['allow'])) { ?>
<div class="col-xl-4">
<!--begin::Input-->
<div class="form-group">
<label>Currency</label>
<select class="form-control form-control-lg" name="InsuranceCurrency">
<?php if (!empty($InsuranceCurrency)) { ?>
<option value="<?php echo $InsuranceCurrency ?>"><?php echo $InsuranceCurrency ?></option>
<?php } ?>
<option value="">Select</option>
<option value="CAD">CAD</option>
<option value="USD">USD</option>																	
</select>
</div>
<!--end::Input-->
</div>

<div class="col-xl-4">
<!--begin::Input-->
<div class="form-group">
<label>Pricing Options</label>
<select class="form-control form-control-lg" id="select4" name="InsurancePricing" onchange="selectChanged4()">
<?php if (!empty($InsurancePricing)) { ?>
<option value="<?php echo $VInsurancePricing ?>"><?php echo $InsurancePricing ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<option value="31">1 Pricing Option</option>
<option value="32">2 Pricing Options</option>	
<option value="33">3 Pricing Options</option>	
<option value="34">4 Pricing Options</option>	
<option value="35">5 Pricing Options</option>																	
</select>
</div>
<!--end::Input-->
</div>


<!--end::Travel Insurance Provider-->
<?php } ?>

</div>
<!--end::Row-->

<div class="<?php echo $box31 ?>" id="box31">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row-->
<div class="row">
<!--begin::Pricing Option 1 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="InsurancePersonType1" <?php echo $ddowndisabled ?>>
<?php if (!empty($InsurancePersonType1)) { ?>
<option value="<?php echo $InsurancePersonType1; ?>" ><?php echo $InsurancePersonType1; ?></option>
<?php } ?>
<option value="">Select</option>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 1 - Type-->
<!--begin::Pricing Option 1 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input id="inop1" onChange="myFunction601()" type="text" name="InsuranceNumberPersons1" value="<?php echo $InsuranceNumberPersons1; ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons" <?php echo $Inripreadonly ?> />
</div>
</div>
<!--end::Pricing Option 1 - Persons-->
<!--begin::Pricing Option 1 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input  onChange="myFunction601()" id="ipp1" name="InsurancePricePerPerson1" value="<?php echo $InsurancePricePerPerson1; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Price Per Person"  <?php echo $Inripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="ito1" name="InsuranceTotalPrice1" value="<?php echo $InsuranceTotalPrice1; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Total-->

<?php 
if ($InsuranceAccepted=='Yes' || (isset($_GET['allow']))) 
{ 
$insreadonly='readonly';
$insbackgd='bg-light';
}
else
{
$insreadonly='';
$insbackgd='';	
}
?> 

<!--begin::Pricing Option 1 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="InsuranceDescription1" <?php echo $insreadonly ?> class="form-control form-control-lg <?php echo $insbackgd ?>" rows="2" placeholder="Travel Insurance Plan">
<?php echo $InsuranceDescription1; ?>
</textarea>
</div>
</div>
<!--end::Pricing Option 1 - Description-->
<!--begin::Pricing Option 1 - Checkbox-->
<?php if (isset($_GET['allow'])) { ?>
<div class="col-xl-12 mt-3 mb-5">
<?php if (!empty($insurance1)) { ?>
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" checked onclick="return false" name="product77[]" value="<?php echo $InsuranceTotalPrice1; ?>" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
<?php } else { ?>
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" onclick="return false" name="product77[]" value="<?php echo $InsuranceTotalPrice1; ?>" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
<?php } ?>
</div>
<?php } ?>
<!--end::Pricing Option 1 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>

<div class="<?php echo $box32 ?>" id="box32">

<!--begin::Row-->
<div class="row">
<!--begin::Pricing Option 2 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="InsurancePersonType2" <?php echo $ddowndisabled ?>>
<?php if (!empty($InsurancePersonType2)) { ?>
<option value="<?php echo $InsurancePersonType2; ?>" ><?php echo $InsurancePersonType2; ?></option>
<?php } ?>
<option value="">Select</option>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 2 - Type-->
<!--begin::Pricing Option 2 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input id="inop2" onChange="myFunction602()" type="text" name="InsuranceNumberPersons2" value="<?php echo $InsuranceNumberPersons2; ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons"  <?php echo $Inripreadonly ?> />
</div>
</div>
<!--end::Pricing Option 2 - Persons-->
<!--begin::Pricing Option 2 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction602()" id="ipp2" name="InsurancePricePerPerson2" value="<?php echo $InsurancePricePerPerson2; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Price Per Person"  <?php echo $Inripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Price PP-->
<!--begin::Pricing Option 2 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="ito2" name="InsuranceTotalPrice2" value="<?php echo $InsuranceTotalPrice2; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Total-->
<!--begin::Pricing Option 2 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="InsuranceDescription2" <?php echo $insreadonly ?> class="form-control form-control-lg <?php echo $insbackgd ?>" rows="2" placeholder="Travel Insurance Plan">
<?php echo $InsuranceDescription2; ?>
</textarea>
</div>
</div>
<!--end::Pricing Option 2 - Description-->
<!--begin::Pricing Option 2 - Checkbox-->
<?php if (isset($_GET['allow'])) { ?>
<div class="col-xl-12 mt-3 mb-5">
<?php if (!empty($insurance2)) { ?>
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" checked onclick="return false"  name="product77[]" value="<?php echo $InsuranceTotalPrice2; ?>"/>
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
<?php } else { ?>
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" onclick="return false"  name="product77[]" value="<?php echo $InsuranceTotalPrice2; ?>"/>
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
<?php } ?>
</div>
<?php } ?>
<!--end::Pricing Option 2 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>

<div class="<?php echo $box33 ?>" id="box33">

<!--begin::Row-->
<div class="row">
<!--begin::Pricing Option 3 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="InsurancePersonType3" <?php echo $ddowndisabled ?>>
<?php if (!empty($InsurancePersonType3)) { ?>
<option value="<?php echo $InsurancePersonType3; ?>" ><?php echo $InsurancePersonType3; ?></option>
<?php } ?>
<option value="">Select</option>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 3 - Type-->
<!--begin::Pricing Option 3 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input id="inop3" onChange="myFunction603()" type="text" name="InsuranceNumberPersons3" value="<?php echo $InsuranceNumberPersons3; ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons"  <?php echo $Inripreadonly ?> />
</div>
</div>
<!--end::Pricing Option 3 - Persons-->
<!--begin::Pricing Option 3 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction603()" id="ipp3" name="InsurancePricePerPerson3" value="<?php echo $InsurancePricePerPerson3; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Price Per Person"  <?php echo $Inripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Price PP-->
<!--begin::Pricing Option 3 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="ito3" name="InsuranceTotalPrice3" value="<?php echo $InsuranceTotalPrice3; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Total-->
<!--begin::Pricing Option 3 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="InsuranceDescription3" <?php echo $insreadonly ?> class="form-control form-control-lg <?php echo $insbackgd ?>" rows="2" placeholder="Travel Insurance Plan">
<?php echo $InsuranceDescription3; ?>
</textarea> 
</div>
</div>
<!--end::Pricing Option 3 - Description-->
<!--begin::Pricing Option 3 - Checkbox-->
<?php if (isset($_GET['allow'])) { ?>
<div class="col-xl-12 mt-3 mb-5">
<?php if (!empty($insurance3)) { ?>
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" checked onclick="return false"  name="product77[]" value="<?php echo $InsuranceTotalPrice3; ?>" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
<?php } else { ?>
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" onclick="return false"  name="product77[]" value="<?php echo $InsuranceTotalPrice3; ?>" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
<?php } ?>
</div>
<?php } ?>
<!--end::Pricing Option 3 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>

<div class="<?php echo $box34 ?>" id="box34">

<!--begin::Row-->
<div class="row">
<!--begin::Pricing Option 4 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="InsurancePersonType4" <?php echo $ddowndisabled ?>>
<?php if (!empty($InsurancePersonType4)) { ?>
<option value="<?php echo $InsurancePersonType4; ?>" ><?php echo $InsurancePersonType4; ?></option>
<?php } ?>
<option value="">Select</option>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 4 - Type-->
<!--begin::Pricing Option 4 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input id="inop4" onChange="myFunction604()" type="text" name="InsuranceNumberPersons4" value="<?php echo $InsuranceNumberPersons4; ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons"  <?php echo $Inripreadonly ?> />
</div>
</div>
<!--end::Pricing Option 4 - Persons-->
<!--begin::Pricing Option 4 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction604()" id="ipp4" name="InsurancePricePerPerson4" value="<?php echo $InsurancePricePerPerson4; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Price Per Person"  <?php echo $Inripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Price PP-->
<!--begin::Pricing Option 4 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="ito4" name="InsuranceTotalPrice4" value="<?php echo $InsuranceTotalPrice4; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Total-->
<!--begin::Pricing Option 4 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="InsuranceDescription4" <?php echo $insreadonly ?> class="form-control form-control-lg <?php echo $insbackgd ?>" rows="2" placeholder="Travel Insurance Plan">
<?php echo $InsuranceDescription4; ?>
</textarea> 
</div>
</div>
<!--end::Pricing Option 4 - Description-->
<!--begin::Pricing Option 4 - Checkbox-->
<?php if (isset($_GET['allow'])) { ?>
<div class="col-xl-12 mt-3 mb-5">
<?php if (!empty($insurance4)) { ?>
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" checked onclick="return false"  name="product77[]" value="<?php echo $InsuranceTotalPrice4; ?>"/>
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
<?php } else { ?>
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" onclick="return false"  name="product77[]" value="<?php echo $InsuranceTotalPrice4; ?>"/>
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
<?php } ?>
</div>
<?php } ?>
<!--end::Pricing Option 4 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>

<div class="<?php echo $box35 ?>" id="box35">

<!--begin::Row-->
<div class="row">
<!--begin::Pricing Option 5 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="InsurancePersonType5" <?php echo $ddowndisabled ?>>
<?php if (!empty($InsurancePersonType5)) { ?>
<option value="<?php echo $InsurancePersonType5; ?>" ><?php echo $InsurancePersonType5; ?></option>
<?php } ?>
<option value="">Select</option>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 5 - Type-->
<!--begin::Pricing Option 5 - Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input id="inop5" onChange="myFunction605()" type="text" name="InsuranceNumberPersons5" value="<?php echo $InsuranceNumberPersons5; ?>" class="form-control  form-control-lg bg-light" placeholder="Number Of Persons"  <?php echo $Inripreadonly ?> />
</div>
</div>
<!--end::Pricing Option 5 - Persons-->
<!--begin::Pricing Option 5 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction605()" id="ipp5" name="InsurancePricePerPerson5" value="<?php echo $InsurancePricePerPerson5; ?>" type="text" class="form-control form-control-lg bg-light" placeholder="Price Per Person"  <?php echo $Inripreadonly ?> >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Price PP-->
<!--begin::Pricing Option 5 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="ito5" name="InsuranceTotalPrice5" value="<?php echo $InsuranceTotalPrice5; ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Total-->
<!--begin::Pricing Option 5 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="InsuranceDescription5" <?php echo $insreadonly ?> class="form-control form-control-lg <?php echo $insbackgd ?>" rows="2" placeholder="Travel Insurance Plan">
<?php echo $InsuranceDescription5; ?>
</textarea>
</div>
</div>
<!--end::Pricing Option 5 - Description-->
<!--begin::Pricing Option 5 - Checkbox-->
<?php if (isset($_GET['allow'])) { ?>
<div class="col-xl-12 mt-3 mb-5">
<?php if (!empty($insurance5)) { ?>
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" checked onclick="return false"  name="product77[]" value="<?php echo $InsuranceTotalPrice5; ?>" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
<?php } else { ?>
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input type="checkbox" onclick="return false"  name="product77[]" value="<?php echo $InsuranceTotalPrice5; ?>" />
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Select this pricing option.</small></label>
<?php } ?>
</div>
<?php } ?>
<!--end::Pricing Option 5 - Checkbox-->
</div>
<!--end::Row-->
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
<!--end::Separator-->
</div>


<div class="row">

<?php if (!isset($_GET['allow'])) { ?>
<!--begin::Upload Travel Insurance Document-->
<div class="col-xl-12 mb-7" id="box36">
<div class="form-group">
<label>Upload Insurance Document (PDF/JPG/JPEG/PNG)</label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<!--<h3 class="dropzone-msg-title">Drop PDF File Here Or Click To Upload</h3>-->
<input type="file" value="<?php echo $InsurancePDF ?>" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="InsurancePDF" />
<input type="hidden" value="<?php echo $InsurancePDF ?>"  name="CInsurancePDF" />
</div>
</div>
</div>
<!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-0" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a document, it will be replaced if you decide to upload a new document.</div>
</div>
<!--end::Important Alert-->
</div>
<!--end::Upload Travel Insurance Document-->
<?php } ?>


<?php if (!empty($InsurancePDF) && isset($_GET['allow'])) { ?>
<!--begin::Insurance Document-->
<div class="col-xl-12 mb-7">
<a href="../img/agents/booking-authorization-email-form/<?php echo $InsurancePDF; ?>" title="See Document" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase px-5 py-3" type="button" download>See Travel Insurance Document</a>
</div>
<!--end::Insurance Document-->
<?php } ?>


<?php if (isset($_GET['allow'])) { ?>

<?php if ($InsuranceAccepted =='Yes') { ?>	
<!--begin::Step 8 - Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input checked type="radio" onClick="myFunction444()" id="myCheck444" name="InsuranceAccepted" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I agree to the Travel Insurance details.</small></label>
</div>
<!--end::Step 8 - Agree Checkbox-->
<?php } ?>	

<?php if ($InsuranceAccepted =='No') { ?>	
<!--begin::Step 8 - Do Not Agree Checkbox-->
<div class="col-xl-12 mt-3 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input checked type="radio" name="InsuranceAccepted" id="myCheck445" onClick="myFunction445()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not agree to the Travel Insurance details.</small></label>
</div>
<!--end::Step 8 - Do Not Agree Checkbox-->
<?php } ?>	


<?php if ($PurchaseInsurance=='No') { ?>
<!--begin::Step 8 - Do Not Purchase Checkbox-->
<div class="col-xl-12 mt-3 mb-5 hidden">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input checked type="radio" name="PurchaseInsurance" id="myCheck446" onClick="myFunction446()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I do not wish to purchase any Travel Insurance.</small></label>
</div>
<!--end::Step 8 - Do Not Purchase Checkbox-->
<?php } if (!empty($InsuranceNoReason)) { ?> 
<!--begin::Travel Insurance Reason-->
<div class="col-xl-12 mt-2" id="box445">
<div class="form-group">
<label>Please Provide A Reason</label>
<textarea readonly name="InsuranceNoReason" class="form-control form-control-lg" rows="2" placeholder="Please Provide A Reason" style="background-color:#f3f6f9;"><?php echo $InsuranceNoReason ?></textarea>
</div>
</div>
<!--end::Travel Insurance Reason-->
<?php } } ?>


</div>
<!--end::Row-->


<?php  if (isset($_GET['allow'])) { ?>
<!--begin::Row-->
<div class="row">

<!--begin::Purchase Travel Insurance-->
<?php if ($PurchaseInsurance !='') { ?>
<div class="col-xl-12">
<label class="small">Would You Like To Purchase Travel Insurance?</label>
</div>

<?php if ($PurchaseInsurance=='Yes') { ?>
<!--begin::Step 8 - Send Insurance Quote-->
<div class="col-xl-12 mb-5">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input checked type="radio" onClick="myFunction4447()" id="myCheck4447"  name="PurchaseInsurance" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Yes, please send me a quote.</small></label>
</div>
<!--end::Step 8 - Send Insurance Quote-->
<?php } ?>


<?php if ($PurchaseInsurance=='No') { ?>
<!--end::Step 8 - Do Not Purchase Insurance-->
<div class="col-xl-12 mb-5">
<label class="radio radio-outline radio-danger radio-lg radio-outline-2x">
<input checked type="radio" name="PurchaseInsurance" id="myCheck4447" onClick="myFunction4447()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">No, I do not wish to purchase any Travel Insurance.</small></label>
</div>
<?php } ?>


<?php } ?>
<!--end::Purchase Travel Insurance-->


<?php if ($InsuranceWeaverConsent=='Yes' && $PurchaseInsurance !='Yes') { ?>
<!--begin::Travel Insurance Waiver-->
<div id="box446">
<div class="col-xl-12 mt-2">
<label>Travel Insurance Waiver</label>
<div class="card card-custom card-border bg-light mb-7">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>I decline to purchase travel insurance eventhough my travel advisor has offered and explained it to me.<br>
<br>
I, the undersigned, will not hold my travel advisor or the travel agency, responsible for any expenses incurred from any sources as a result of:</p>
<ul>
<li>My refusal to purchase travel insurance for the full value and duration of the trip.</li>
<li>Credit card insurance coverage:</li>
<ol>
<li>Restricted benefits, conditions an/or exclusions related to my credit card insurance, or</li>
<li>Insufficient protection offered by my credit card insurance, or</li>
<li>Non-existing coverage of my credit card insurance.</li>
</ol>
<li>Private or public health care coverage.</li>
<li>Any additional single supplement costs if my travelling companion is unable to travel and I still choose to travel.</li>
<li>Other additional costs if insurance is not purchased at the time of initial trip deposit; such as:</li>
<ol>
<li>Change in medical condition.</li>
<li>Increased supplier penalties.</li>
</ol>
<li>The unforeseen financial default or bankruptcy of the tour operator, cruise line or airline carrier from which I have purchased my travel arrangements.</li>
<li>A force majure event that causes a cancellation or disruption to my travel plans which may not result in a full refund of my non-refundable trip costs.</li>
</ul>
</div>
</div>
</div>
</div>
<!--end::Travel Insurance Waiver-->
<!--begin::Step 8 - Insurance Waiver Checkbox-->
<div class="col-xl-12 mt-3 mb-7">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input checked type="checkbox" onclick="return false;"  name="InsuranceWeaverConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that I have chosen to decline purchasing travel insurance for myself and any other travellers in my party. The signature I provide below will serve as my digital signature.</small></label>
</div>
<!--end::Step 8 - Insurance Waiver Checkbox-->
<!--begin::Insurance Waiver Primary Traveller Full Name-->
<div class="col-xl-12">
<div class="form-group">
<label>Full Name (Primary Traveller)</label>
<input type="text" readonly name="InsuranceWeaverConsentName" value="<?php echo $InsuranceWeaverConsentName ?>" class="form-control form-control-lg bg-light" placeholder="Full Name (Primary Traveller)" />
</div>
</div>
<!--end::Insurance Waiver Primary Traveller Full Name-->
<!--begin::Insurance Waiver Primary Traveller Signature-->
    <!--  Hiding this section for now as it is not working properly-->
    <?php if(0) { ?>
    <div class="col-xl-12">
        <div class="form-group">
            <label>Signature (Primary Traveller)</label>
            <br/>
            <textarea id="sig-dataUrl" name="sig-dataUrl1" rows="5" class="hidden">
<?php echo $sigdataUrl1 ?>
</textarea>
            <?php if (!empty($sigdataUrl1)) { ?>
                <img class="card card-custom card-border p-5" src="<?php echo $sigdataUrl1 ?>" alt="Signature"
                     style="width:300px; height:auto; max-height:300px; background-color:#f3f6f9;">
            <?php } ?>

        </div>
    </div>
    <?php } ?>


</div>
<!--end::Insurance Waiver Primary Traveller Signature-->
<?php } ?>

</div>
<!--end::Row-->

<?php } ?>


</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
</div>

<?php } ?>

<?php if ($PTravellerParty==1 || $PTravellerParty==2 || $PTravellerParty==3 || $PTravellerParty==4 || $PTravellerParty==5 || $PTravellerParty==6 || $PTravellerParty==7 || $PTravellerParty==8) { ?>

<?php if (isset($_GET['allow'])) { ?>

<?php if (!empty($PTravellerParty)){  ?>
<div>
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<?php if (($AddTravelConsent1 =='Yes' && $AddTravelConsent2 =='Yes')) { $app9=1; ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved
</div>
<?php } else { $napp9=1; ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>
<!--end::Ribbon-->
<!--begin::Item-->
<div class="card border p-6" id="box0"><!--begin::Header-->
<div class="card-header" id="baf-heading13">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf13" aria-expanded="true" aria-controls="baf13" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Additional Travellers In The Party</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf13" class="collapse" aria-labelledby="baf-heading13" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="font-weight-bolder">Review each additional traveller's details and download their passport if you requested for it.</p>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Additional Traveller 1 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 1 Title</label>
<select class="form-control  form-control-lg bg-light" name="AddTravelTitle1">
<option value="<?php echo $AddTravelTitle1 ?>"><?php echo $AddTravelTitle1 ?></option>
</select>
</div>
</div>
<!--end::Additional Traveller 1 Title-->
<!--begin::Additional Traveller 1 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 1 First Name</label>
<input readonly type="text" name="AddTravelFName1" value="<?php echo $AddTravelFName1 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 1 First Name" />
</div>
</div>
<!--end::Additional Traveller 1 First Name-->
<!--begin::Additional Traveller 1 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 1 Middle Name</label>
<input readonly type="text" name="AddTravelMName1" value="<?php echo $AddTravelMName1 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 1 Middle Name" />
</div>
</div>
<!--end::Additional Traveller 1 Middle Name-->
<!--begin::Additional Traveller 1 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 1 Last Name</label>
<input readonly type="text" name="AddTravelLName1" value="<?php echo $AddTravelLName1 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 1 Last Name" />
</div>
</div>
<!--end::Additional Traveller 1 Last Name-->
<!--begin::Additional Traveller 1 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" value="<?php echo $AddTravelDOB1 ?>" name="AddTravelDOB1" class="form-control form-control-lg bg-light" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 1 DOB-->
<!--begin::Additional Traveller 1 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea readonly name="AddTravelNotes1" class="form-control form-control-lg bg-light" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $AddTravelNotes1 ?></textarea>
</div>
</div>
<!--end::Additional Traveller 1 Notes-->
<?php if ($RequestTravellersPassport=='Yes') { ?>
<!--begin::Additional Traveller 1 Passport Button-->
<div class="col-xl-12">
<a href="../img/agents/booking-authorization-email-form/<?php echo $AddPassport1 ?>" title="Download Passport" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase mb-5 px-5 py-3" type="button" download>Download Passport</a>
</div>
<!--end::Additional Traveller 1 Passport Button-->
<?php } ?>
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-2 separator-border-3 mt-9"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->
<?php } ?>
<?php if ($PTravellerParty==2 || $PTravellerParty==3 || $PTravellerParty==4 || $PTravellerParty==5 || $PTravellerParty==6 || $PTravellerParty==7 || $PTravellerParty==8) { ?>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Additional Traveller 2 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 2 Title</label>
<select class="form-control  form-control-lg bg-light" name="AddTravelTitle2">
<option value="<?php echo $AddTravelTitle2 ?>"><?php echo $AddTravelTitle2 ?></option>
</select>
</div>
</div>
<!--end::Additional Traveller 2 Title-->
<!--begin::Additional Traveller 2 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 2 First Name</label>
<input readonly type="text" name="AddTravelFName2" value="<?php echo $AddTravelFName2 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 2 First Name" />
</div>
</div>
<!--end::Additional Traveller 2 First Name-->
<!--begin::Additional Traveller 2 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 2 Middle Name</label>
<input readonly type="text" name="AddTravelMName2" value="<?php echo $AddTravelMName2 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 2 Middle Name" />
</div>
</div>
<!--end::Additional Traveller 2 Middle Name-->
<!--begin::Additional Traveller 2 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 2 Last Name</label>
<input readonly type="text" name="AddTravelLName2" value="<?php echo $AddTravelLName2 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 2 Last Name" />
</div>
</div>
<!--end::Additional Traveller 2 Last Name-->
<!--begin::Additional Traveller 2 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" value="<?php echo $AddTravelDOB2 ?>" name="AddTravelDOB2" class="form-control form-control-lg bg-light" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 2 DOB-->
<!--begin::Additional Traveller 2 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea readonly name="AddTravelNotes2" class="form-control form-control-lg bg-light" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $AddTravelNotes2 ?></textarea>
</div>
</div>
<!--end::Additional Traveller 2 Notes-->

<?php if ($RequestTravellersPassport=='Yes') { ?>
<!--begin::Additional Traveller 2 Passport Button-->
<div class="col-xl-12">
<a href="../img/agents/booking-authorization-email-form/<?php echo $AddPassport2 ?>" title="Download Passport" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase mb-5 px-5 py-3" type="button" download>Download Passport</a>
</div>
<!--end::Additional Traveller 2 Passport Button-->
<?php } ?>

<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-2 separator-border-3 mt-9"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->
<?php } ?>
<?php if ($PTravellerParty==3 || $PTravellerParty==4 || $PTravellerParty==5 || $PTravellerParty==6 || $PTravellerParty==7 || $PTravellerParty==8) { ?>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Additional Traveller 3 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 3 Title</label>
<select class="form-control  form-control-lg bg-light" name="AddTravelTitle3">
<option value="<?php echo $AddTravelTitle3 ?>"><?php echo $AddTravelTitle3 ?></option>
</select>
</div>
</div>
<!--end::Additional Traveller 3 Title-->
<!--begin::Additional Traveller 3 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 3 First Name</label>
<input readonly type="text" name="AddTravelFName3" value="<?php echo $AddTravelFName3 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 3 First Name" />
</div>
</div>
<!--end::Additional Traveller 3 First Name-->
<!--begin::Additional Traveller 3 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 3 Middle Name</label>
<input readonly type="text" name="AddTravelMName3" value="<?php echo $AddTravelMName3 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 3 Middle Name" />
</div>
</div>
<!--end::Additional Traveller 3 Middle Name-->
<!--begin::Additional Traveller 3 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 3 Last Name</label>
<input readonly type="text" name="AddTravelLName3" value="<?php echo $AddTravelLName3 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 3 Last Name" />
</div>
</div>
<!--end::Additional Traveller 3 Last Name-->
<!--begin::Additional Traveller 3 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" value="<?php echo $AddTravelDOB3 ?>" name="AddTravelDOB3" class="form-control form-control-lg bg-light" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 3 DOB-->
<!--begin::Additional Traveller 3 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea readonly name="AddTravelNotes3" class="form-control form-control-lg bg-light" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $AddTravelNotes3 ?></textarea>
</div>
</div>
<!--end::Additional Traveller 3 Notes-->

<?php if ($RequestTravellersPassport=='Yes') { ?>
<!--begin::Additional Traveller 3 Passport Button-->
<div class="col-xl-12">
<a href="../img/agents/booking-authorization-email-form/<?php echo $AddPassport3 ?>" title="Download Passport" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase mb-5 px-5 py-3" type="button" download>Download Passport</a>
</div>
<!--end::Additional Traveller 3 Passport Button-->
<?php } ?>

<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-2 separator-border-3 mt-9"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->
<?php } ?>
<?php if ($PTravellerParty==4 || $PTravellerParty==5 || $PTravellerParty==6 || $PTravellerParty==7 || $PTravellerParty==8) { ?>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Additional Traveller 4 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 4 Title</label>
<select class="form-control  form-control-lg bg-light" name="AddTravelTitle4">
<option value="<?php echo $AddTravelTitle4 ?>"><?php echo $AddTravelTitle4 ?></option>
</select>
</div>
</div>
<!--end::Additional Traveller 4 Title-->
<!--begin::Additional Traveller 4 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 4 First Name</label>
<input readonly type="text" name="AddTravelFName4" value="<?php echo $AddTravelFName4 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 4 First Name" />
</div>
</div>
<!--end::Additional Traveller 4 First Name-->
<!--begin::Additional Traveller 4 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 4 Middle Name</label>
<input readonly type="text" name="AddTravelMName4" value="<?php echo $AddTravelMName4 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 4 Middle Name" />
</div>
</div>
<!--end::Additional Traveller 4 Middle Name-->
<!--begin::Additional Traveller 4 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 4 Last Name</label>
<input readonly type="text" name="AddTravelLName4" value="<?php echo $AddTravelLName4 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 4 Last Name" />
</div>
</div>
<!--end::Additional Traveller 4 Last Name-->
<!--begin::Additional Traveller 4 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" value="<?php echo $AddTravelDOB4 ?>" name="AddTravelDOB4" class="form-control form-control-lg bg-light" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 4 DOB-->
<!--begin::Additional Traveller 4 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea readonly name="AddTravelNotes4" class="form-control form-control-lg bg-light" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $AddTravelNotes4 ?></textarea>
</div>
</div>
<!--end::Additional Traveller 4 Notes-->

<?php if ($RequestTravellersPassport=='Yes') { ?>
<!--begin::Additional Traveller 4 Passport Button-->
<div class="col-xl-12">
<a href="../img/agents/booking-authorization-email-form/<?php echo $AddPassport4 ?>" title="Download Passport" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase mb-5 px-5 py-3" type="button" download>Download Passport</a>
</div>
<!--end::Additional Traveller 4 Passport Button-->
<?php } ?>

<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-2 separator-border-3 mt-9"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->
<?php } ?>
<?php if ($PTravellerParty==5 || $PTravellerParty==6 || $PTravellerParty==7 || $PTravellerParty==8) { ?>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Additional Traveller 5 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 5 Title</label>
<select class="form-control  form-control-lg bg-light" name="AddTravelTitle5">
<option value="<?php echo $AddTravelTitle5 ?>"><?php echo $AddTravelTitle5 ?></option>
</select>
</div>
</div>
<!--end::Additional Traveller 5 Title-->
<!--begin::Additional Traveller 5 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 5 First Name</label>
<input readonly type="text" name="AddTravelFName5" value="<?php echo $AddTravelFName5 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 5 First Name" />
</div>
</div>
<!--end::Additional Traveller 5 First Name-->
<!--begin::Additional Traveller 5 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 5 Middle Name</label>
<input readonly type="text" name="AddTravelMName5" value="<?php echo $AddTravelMName5 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 5 Middle Name" />
</div>
</div>
<!--end::Additional Traveller 5 Middle Name-->
<!--begin::Additional Traveller 5 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 5 Last Name</label>
<input readonly type="text" name="AddTravelLName5" value="<?php echo $AddTravelLName5 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 5 Last Name" />
</div>
</div>
<!--end::Additional Traveller 5 Last Name-->
<!--begin::Additional Traveller 5 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" value="<?php echo $AddTravelDOB5 ?>" name="AddTravelDOB5" class="form-control form-control-lg bg-light" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 5 DOB-->
<!--begin::Additional Traveller 5 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea readonly name="AddTravelNotes5" class="form-control form-control-lg bg-light" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $AddTravelNotes5 ?></textarea>
</div>
</div>
<!--end::Additional Traveller 5 Notes-->

<?php if ($RequestTravellersPassport=='Yes') { ?>
<!--begin::Additional Traveller 5 Passport Button-->
<div class="col-xl-12">
<a href="../img/agents/booking-authorization-email-form/<?php echo $AddPassport5 ?>" title="Download Passport" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase mb-5 px-5 py-3" type="button" download>Download Passport</a>
</div>
<!--end::Additional Traveller 5 Passport Button-->
<?php } ?>

<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-2 separator-border-3 mt-9"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->
<?php } ?>
<?php if ($PTravellerParty==6 || $PTravellerParty==7 || $PTravellerParty==8) { ?>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Additional Traveller 6 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 6 Title</label>
<select class="form-control  form-control-lg bg-light" name="AddTravelTitle6">
<option value="<?php echo $AddTravelTitle6 ?>"><?php echo $AddTravelTitle6 ?></option>
</select>
</div>
</div>
<!--end::Additional Traveller 6 Title-->
<!--begin::Additional Traveller 6 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 6 First Name</label>
<input readonly type="text" name="AddTravelFName6" value="<?php echo $AddTravelFName6 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 6 First Name" />
</div>
</div>
<!--end::Additional Traveller 6 First Name-->
<!--begin::Additional Traveller 6 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 6 Middle Name</label>
<input readonly type="text" name="AddTravelMName6" value="<?php echo $AddTravelMName6 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 6 Middle Name" />
</div>
</div>
<!--end::Additional Traveller 6 Middle Name-->
<!--begin::Additional Traveller 6 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 6 Last Name</label>
<input readonly type="text" name="AddTravelLName6" value="<?php echo $AddTravelLName6 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 6 Last Name" />
</div>
</div>
<!--end::Additional Traveller 6 Last Name-->
<!--begin::Additional Traveller 6 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" value="<?php echo $AddTravelDOB6 ?>" name="AddTravelDOB6" class="form-control form-control-lg bg-light" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 6 DOB-->
<!--begin::Additional Traveller 6 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea readonly name="AddTravelNotes6" class="form-control form-control-lg bg-light" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $AddTravelNotes6 ?></textarea>
</div>
</div>
<!--end::Additional Traveller 6 Notes-->

<?php if ($RequestTravellersPassport=='Yes') { ?>
<!--begin::Additional Traveller 6 Passport Button-->
<div class="col-xl-12">
<a href="../img/agents/booking-authorization-email-form/<?php echo $AddPassport6 ?>" title="Download Passport" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase mb-5 px-5 py-3" type="button" download>Download Passport</a>
</div>
<!--end::Additional Traveller 6 Passport Button-->
<?php } ?>

<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-2 separator-border-3 mt-9"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->
<?php } ?>
<?php if ($PTravellerParty==7 || $PTravellerParty==8) { ?>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Additional Traveller 7 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 7 Title</label>
<select class="form-control  form-control-lg bg-light" name="AddTravelTitle7">
<option value="<?php echo $AddTravelTitle7 ?>"><?php echo $AddTravelTitle7 ?></option>
</select>
</div>
</div>
<!--end::Additional Traveller 7 Title-->
<!--begin::Additional Traveller 7 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 7 First Name</label>
<input readonly type="text" name="AddTravelFName7" value="<?php echo $AddTravelFName7 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 7 First Name" />
</div>
</div>
<!--end::Additional Traveller 7 First Name-->
<!--begin::Additional Traveller 7 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 7 Middle Name</label>
<input readonly type="text" name="AddTravelMName7" value="<?php echo $AddTravelMName7 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 7 Middle Name" />
</div>
</div>
<!--end::Additional Traveller 7 Middle Name-->
<!--begin::Additional Traveller 7 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 7 Last Name</label>
<input readonly type="text" name="AddTravelLName7" value="<?php echo $AddTravelLName7 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 7 Last Name" />
</div>
</div>
<!--end::Additional Traveller 7 Last Name-->
<!--begin::Additional Traveller 7 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" value="<?php echo $AddTravelDOB7 ?>" name="AddTravelDOB7" class="form-control form-control-lg bg-light" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 7 DOB-->
<!--begin::Additional Traveller 7 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea readonly name="AddTravelNotes7" class="form-control form-control-lg bg-light" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $AddTravelNotes7 ?></textarea>
</div>
</div>
<!--end::Additional Traveller 7 Notes-->

<?php if ($RequestTravellersPassport=='Yes') { ?>
<!--begin::Additional Traveller 7 Passport Button-->
<div class="col-xl-12">
<a href="../img/agents/booking-authorization-email-form/<?php echo $AddPassport7 ?>" title="Download Passport" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase mb-5 px-5 py-3" type="button" download>Download Passport</a>
</div>
<!--end::Additional Traveller 7 Passport Button-->
<?php } ?>

<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-2 separator-border-3 mt-9"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->
<?php } ?>
<?php if ($PTravellerParty==8) { ?>
<!--begin::Row-->
<div class="row mt-10">
<!--begin::Additional Traveller 8 Title-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 8 Title</label>
<select class="form-control  form-control-lg bg-light" name="AddTravelTitle8">
<option value="<?php echo $AddTravelTitle8 ?>"><?php echo $AddTravelTitle8 ?></option>
</select>
</div>
</div>
<!--end::Additional Traveller 8 Title-->
<!--begin::Additional Traveller 8 First Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 8 First Name</label>
<input readonly type="text" name="AddTravelFName8" value="<?php echo $AddTravelFName8 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 8 First Name" />
</div>
</div>
<!--end::Additional Traveller 8 First Name-->
<!--begin::Additional Traveller 8 Middle Name-->
<div class="col-xl-4">
<div class="form-group">
<label>Traveller 8 Middle Name</label>
<input readonly type="text" name="AddTravelMName8" value="<?php echo $AddTravelMName8 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 8 Middle Name" />
</div>
</div>
<!--end::Additional Traveller 8 Middle Name-->
<!--begin::Additional Traveller 8 Last Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Traveller 8 Last Name</label>
<input readonly type="text" name="AddTravelLName8" value="<?php echo $AddTravelLName8 ?>" class="form-control  form-control-lg bg-light" placeholder="Traveller 8 Last Name" />
</div>
</div>
<!--end::Additional Traveller 8 Last Name-->
<!--begin::Additional Traveller 8 DOB-->
<div class="col-xl-6">
<div class="form-group">
<label>Date Of Birth (M/D/Y)</label>
<input type="text" value="<?php echo $AddTravelDOB8 ?>" name="AddTravelDOB8" class="form-control form-control-lg bg-light" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Additional Traveller 8 DOB-->
<!--begin::Additional Traveller 8 Notes-->
<div class="col-xl-12">
<div class="form-group">
<label>Notes Or Special Requests</label>
<textarea readonly name="AddTravelNotes8" class="form-control form-control-lg bg-light" rows="2" placeholder="Airplane Seating, Allergies, Other Requirements, Etc."><?php echo $AddTravelNotes8 ?></textarea>
</div>
</div>
<!--end::Additional Traveller 8 Notes-->

<?php if ($RequestTravellersPassport=='Yes') { ?>
<!--begin::Additional Traveller 8 Passport Button-->
<div class="col-xl-12">
<a href="../img/agents/booking-authorization-email-form/<?php echo $AddPassport8 ?>" title="Download Passport" target="_blank" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase mb-5 px-5 py-3" type="button" download>Download Passport</a>
</div>
<!--end::Additional Traveller 8 Passport Button-->
<?php } ?>

<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-2 separator-border-3 mt-9"></div>
</div>
<!--end::Separator-->
</div>
<!--end::Row-->
<?php } ?>
<!--begin::Row-->
<div class="row">
<!--begin::Step 10 - Agree Checkbox 1-->
<div class="col-xl-12 mt-7">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input <?php echo $AddTravelConsent11 ?> type="checkbox" onclick="return false;"  name="AddTravelConsent1">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I hearby certify that the details provided are correct as per each traveller's passport.</small></label>
</div>
<!--end::Step 10 - Agree Checkbox 1-->
<!--begin::Step 10 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input <?php echo $AddTravelConsent21 ?> type="checkbox" onclick="return false;" name="AddTravelConsent2">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that if the details provided are incorrect and my trip is booked, it can lead to an additional change fee ($) per traveller.</small></label>
</div>
<!--end::Step 10 - Agree Checkbox 2-->
</div>
<!--end::Row-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
</div>
<?php } } ?>



<div id="text7" style="display:<?php echo $text7 ?>">

<?php if (isset($_GET['allow'])) { ?>
<div class="ribbon ribbon-top mb-5">
<?php if ($BookingStatus ==1 || $BookingStatus ==2) { ?>
<?php } ?>
<?php if ($AdditionalConsent =='Yes') { $app10=1; ?>	
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
<?php } ?>
<?php if ($AdditionalConsent =='No' || $AdditionalConsent =='') { $napp10=1; ?>	
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
<?php } ?>
</div>

<?php } if (!isset($_GET['allow']) && ($AdditionalConsentCheck=='checked')) { ?>
<div class="ribbon ribbon-top mb-5"></div>
<?php } elseif (!isset($_GET['allow']) && ($AdditionalConsentCheck !='checked')) {  ?>
<div class="ribbon ribbon-top mb-5">
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
</div>
<?php } ?>

<!--end::Ribbon-->

<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading12">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf12" aria-expanded="true" aria-controls="baf12" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Additional Documents &amp; URLs</div>
</div>
</div>
<!--end::Header-->

<!--begin::Body-->
<div id="baf12" class="collapse" aria-labelledby="baf-heading12" data-parent="">
    <div class="card-body lead pb-0 pt-3">
    <p class="mb-10 font-weight-bolder">
    <?php if (isset($_GET['allow'])) { ?>
    The following document(s) and/or url(s) were sent to your client.
    <?php } else { ?>
    Provide additional documents you would like your client(s) to have or send them to a URL (website) if you would like them to review any additional information (suppliers' policies, COVID-19 information, resort information, excursions, etc.).
    <?php } ?></p>
    <!--begin::Table-->
    <div class="table-responsive lead">
    
    <?php
	$editdisplay='block';
	
	if ((!empty($AdditionalURL3) || !empty($AdditionalPDF3)) && (!empty($AdditionalURL2) || !empty($AdditionalPDF2)) && (!empty($AdditionalURL1) || !empty($AdditionalPDF1)))
	{
	$editdisplay='none';
	}
	?>
    
    
    
    <table class="table table-bordered mt-1 mb-5 text-dark">
    <thead class="thead-dark text-center align-middle text-uppercase">
    <tr>
    <?php if (!isset($_GET['allow'])) { ?>
    <th class="lead" scope="col" style="min-width: 100px">Document & URL Option</th>
    <?php } ?>
    <th class="lead" scope="col" style="min-width: 250px">Title</th>
    <th class="lead" style="min-width: 75px" scope="col">Action</th>
    <?php if (!isset($_GET['allow'])) { ?>
    <th class="lead" style="min-width: 75px; display:<?php echo $editdisplay ?>" scope="col">Add/Edit Options</th>
    <?php } ?>
    </tr>
    </thead>
    <tbody>
    
	
	<?php if (!empty($AdditionalTitle1) || !isset($_GET['allow'])) { ?>
    <tr>
    <?php if (!isset($_GET['allow'])) { ?>
    <td class="align-middle">Option 1</td>
    <?php } ?>
    <td class="align-middle"><?php echo $AdditionalTitle1 ?></td>
    <td class="text-center align-middle">
    <?php if (!empty($AdditionalURL1)) { ?>
    <a href="<?php echo $AdditionalURL1 ?>" title="See Website" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">See Website</a>
    <?php } 
    if (!empty($AdditionalPDF1)) { ?>
    <a href="../img/agents/booking-authorization-email-form/<?php echo $AdditionalPDF1 ?>" title="See Document" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" download>See Document</a>
    <?php } ?>
    </td>
    <?php if (!isset($_GET['allow'])) { ?>
    <td class="align-middle" style="display:<?php echo $editdisplay ?>" >
    <label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
    <input type="checkbox"<?php echo $myCheck91checked ?> name="Checkboxes91" value="Yes" id="myCheck91" onclick="myFunction91()">
    <span class="mr-2"></span><?php echo $ListAdditionalTitle1 ?></label>
    <script>
    function myFunction91() {
    var checkBox = document.getElementById("myCheck91");
    var text = document.getElementById("text91");
    if (checkBox.checked == true){
    text.style.display = "block";
    } else {
    text.style.display = "none";
    }
    }
    </script>
    </td>  
    <?php } ?> 
    </tr>
    <?php } ?>
    
    
    
    <?php if (!empty($AdditionalTitle2) || !isset($_GET['allow'])) { ?>
	<tr>
    <?php if (!isset($_GET['allow'])) { ?>
    <td class="align-middle">Option 2</td>
    <?php } ?>
    <td class="align-middle"><?php echo $AdditionalTitle2 ?></td>   
    <td class="text-center align-middle">
    <?php if (!empty($AdditionalURL2)) { ?>
    <a href="<?php echo $AdditionalURL2 ?>" title="See Website" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">See Website</a>
    <?php } 
    if (!empty($AdditionalPDF2)) { ?>
    <a href="../img/agents/booking-authorization-email-form/<?php echo $AdditionalPDF2 ?>" title="See Document" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" download>See Document</a>
    <?php } ?>
    </td>
    <?php if (!isset($_GET['allow'])) { ?>
    <td class="align-middle" style="display:<?php echo $editdisplay ?>" >
    <label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x" >
    <input type="checkbox"<?php echo $myCheck92checked ?> name="Checkboxes92" value="Yes" id="myCheck92" onclick="myFunction92()">
    <span class="mr-2"></span><?php echo $ListAdditionalTitle2 ?></label>
    <script>
    function myFunction92() {
    var checkBox = document.getElementById("myCheck92");
    var text = document.getElementById("text92");
    if (checkBox.checked == true){
    text.style.display = "block";
    } else {
    text.style.display = "none";
    }
    }
    </script>
    </td>  
    <?php } ?>
    </tr>    
    <?php } ?>
    <?php if (!empty($AdditionalTitle3) || !isset($_GET['allow'])) { ?>
    <tr>
    <?php if (!isset($_GET['allow'])) { ?>
    <td class="align-middle">Option 3</td>
    <?php } ?>
    <td class="align-middle"><?php echo $AdditionalTitle3 ?></td>

    <td class="text-center align-middle">
    <?php if (!empty($AdditionalURL3)) { ?>
    <a href="<?php echo $AdditionalURL3 ?>" title="See Website" target="_blank" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase">See Website</a>
    <?php } 
    if (!empty($AdditionalPDF3)) { ?>
    <a href="../img/agents/booking-authorization-email-form/<?php echo $AdditionalPDF3 ?>" title="See Document" class="btn btn-warning font-weight-bolder px-5 py-3 text-uppercase" download>See Document</a>
    <?php } ?>
    </td>
    <?php if (!isset($_GET['allow'])) { ?>
    <td class="align-middle" style="display:<?php echo $editdisplay ?>" >
    <label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
    <input type="checkbox"<?php echo $myCheck93checked ?> name="Checkboxes93" value="Yes" id="myCheck93" onclick="myFunction93()">
    <span class="mr-2"></span><?php echo $ListAdditionalTitle3 ?>...</label>
<!--	<script>
    function covid333() {
	if (confirm('Are you sure? This will remove all your previous additional documents for this option')) {
		var text = document.getElementById("text93");
		text.style.display = "block";
		document.getElementById("Checkboxes93").checked = true;
		} else {
		var text = document.getElementById("text93");	
		text.style.display = "none";	
		document.getElementById("Checkboxes93").checked = true;
		}	
    }
    </script>-->
	
	<script>
    function myFunction93() {
    var checkBox = document.getElementById("myCheck93");
    var text = document.getElementById("text93");
    if (checkBox.checked == true){
    text.style.display = "block";
    } else {
    text.style.display = "none";
    }
    }
    </script>
    </td>  
    <?php } ?>
    </tr>    
    <?php } ?>
    </tbody>
    </table>
    </div>
    <!--end::Table-->
    <div class="">
    <div id="text91" style="display:none">
    <!--begin::Separator-->
    <div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
    <!--end::Separator-->
    <!--begin::Row - Document URL Option 1-->
    <div class="row">
    <!--begin::Document URL Option 1 - Type-->
    <div class="col-xl-3">
    <div class="form-group">
    <label>Option 1 Type</label>
    <select class="form-control form-control-lg" name="AdditionalType1" id="select50" onchange="selectChanged50()">
    <?php if (!empty($AdditionalType1)) { ?>
    <option value="<?php echo $AdditionalType1 ?>"><?php echo $AdditionalTypeDesc1 ?></option>
    <?php } else { ?>
    <option value="" selected="selected">Select</option>
    <?php } ?>																	
    <option value="52">PDF/JPG/PNG Document</option>
    <option value="51">URL (Website Address)</option>
    </select>
    </div>
    </div>
    <!--end::Document URL Option 1 - Type-->
    <!--begin::Document URL Option 1 - Title-->
    <div class="col-xl-9">
    <div class="form-group">
    <label>Title</label>
    <input type="text" name="AdditionalTitle1" value="<?php echo $AdditionalTitle1 ?>" class="form-control  form-control-lg" placeholder="Title" />
    </div>
    </div>
    <!--end::Document URL Option 1 - Title-->
    <!--begin::Document URL Option 1 - URL-->
    <div class="col-xl-12 <?php echo $box51 ?>" id="box51">
    <div class="form-group">
    <label>URL (Website Address)</label>
    <input type="text" value="<?php echo $AdditionalURL1 ?>" name="AdditionalURL1" class="form-control  form-control-lg" placeholder="URL (Website Address)" />
    </div>
    </div>
    <!--end::Document URL Option 1 - URL-->
    <!--begin::Document URL Option 1 - Upload Document-->
    <div class="col-xl-12 <?php echo $box52 ?>" id="box52">
    <div class="form-group">
    <label>Upload Document (PDF/JPG/JPEG/PNG)</label>
    <div class="dropzone dropzone-default dropzone-warning">
    <div class="dropzone-msg dz-message needsclick">
    <input type="file" value="<?php echo $AdditionalPDF1 ?>" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="AdditionalPDF1" /> 
    </div>
    </div>
    </div>
    <!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a document, it will be replaced if you decide to upload a new document.</div>
</div>
<!--end::Important Alert-->
    </div>
    <!--end::Document URL Option 1 - Upload Document-->
    </div>
    <!--end::Row - Document URL Option 1-->
    </div>
     <div id="text92" style="display:none">
    <!--begin::Separator-->
    <div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
    <!--end::Separator-->
    <!--begin::Row - Document URL Option 2-->
    <div class="row">
    <!--begin::Document URL Option 2 - Type-->
    <div class="col-xl-3">
    <div class="form-group">
    <label>Option 2 Type</label>
    <select class="form-control form-control-lg" name="AdditionalType2" id="select60" onchange="selectChanged60()">
    <?php if (!empty($AdditionalType2)) { ?>
    <option value="<?php echo $AdditionalType2 ?>"><?php echo $AdditionalTypeDesc2 ?></option>
    <?php } else { ?>
    <option value="" selected="selected">Select</option>
    <?php } ?>																		
    <option value="62">PDF/JPG/PNG Document</option>
    <option value="61">URL (Website Address)</option>
    </select>
    </div>
    </div>
    <!--end::Document URL Option 2 - Type-->
    <!--begin::Document URL Option 2 - Title-->
    <div class="col-xl-9">
    <div class="form-group">
    <label>Title</label>
    <input type="text" value="<?php echo $AdditionalTitle2 ?>"  name="AdditionalTitle2" class="form-control  form-control-lg" placeholder="Title" />
    </div>
    </div>
    <!--end::Document URL Option 2 - Title-->
    <!--begin::Document URL Option 2 - URL-->
    <div class="col-xl-12 <?php echo $box61 ?>" id="box61">
    <div class="form-group">
    <label>URL (Website Address)</label>
    <input type="text" value="<?php echo $AdditionalURL2 ?>"  name="AdditionalURL2" class="form-control  form-control-lg" placeholder="URL (Website Address)" />
    </div>
    </div>
    <!--end::Document URL Option 2 - URL-->
    <!--begin::Document URL Option 2 - Upload Document-->
    <div class="col-xl-12 <?php echo $box62 ?>" id="box62">
    <div class="form-group">
    <label>Upload Document (PDF/JPG/JPEG/PNG)</label>
    <div class="dropzone dropzone-default dropzone-warning">
    <div class="dropzone-msg dz-message needsclick">
    <input type="file" value="<?php echo $AdditionalPDF2 ?>" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="AdditionalPDF2" /> 
    </div>
    </div>
    </div>
    <!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a document, it will be replaced if you decide to upload a new document.</div>
</div>
<!--end::Important Alert-->
    </div>
    <!--end::Document URL Option 2 - Upload Document-->
    </div>
    <!--end::Row - Document URL Option 2-->
    </div>  
    <div id="text93" style="display:none">
    <!--begin::Separator-->
    <div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
    <!--end::Separator-->
    <!--begin::Row - Document URL Option 3-->
    <div class="row">
    <!--begin::Document URL Option 3 - Type-->
    <div class="col-xl-3">
    <div class="form-group">
    <label>Option 3 Type</label>
    <select class="form-control form-control-lg" name="AdditionalType3" id="select70" onchange="selectChanged70()">
    <?php if (!empty($AdditionalType3)) { ?>
    <option value="<?php echo $AdditionalType3 ?>"><?php echo $AdditionalTypeDesc3 ?></option>
    <?php } else { ?>
    <option value="" selected="selected">Select</option>
    <?php } ?>																	
    <option value="72">PDF/JPG/PNG Document</option>
    <option value="71">URL (Website Address)</option>
    </select>
    </div>
    </div>
    <!--end::Document URL Option 3 - Type-->
    <!--begin::Document URL Option 3 - Title-->
    <div class="col-xl-9">
    <div class="form-group">
    <label>Title</label>
    <input type="text" value="<?php echo $AdditionalTitle3 ?>" name="AdditionalTitle3" class="form-control  form-control-lg" placeholder="Title" />
    </div>
    </div>
    <!--end::Document URL Option 3 - Title-->
    <!--begin::Document URL Option 3 - URL-->
    <div class="col-xl-12 <?php echo $box71 ?>" id="box71">
    <div class="form-group">
    <label>URL (Website Address)</label>
    <input type="text" value="<?php echo $AdditionalURL3 ?>" name="AdditionalURL3" class="form-control  form-control-lg" placeholder="URL (Website Address)" />
    </div>
    </div>
    <!--end::Document URL Option 3 - URL-->
    <!--begin::Document URL Option 3 - Upload Document-->
    <div class="col-xl-12 <?php echo $box72 ?>" id="box72">
    <div class="form-group">
    <label>Upload Document (PDF/JPG/JPEG/PNG)</label>
    <div class="dropzone dropzone-default dropzone-warning">
    <div class="dropzone-msg dz-message needsclick">
    <input type="file"  value="<?php echo $AdditionalPDF3 ?>" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="AdditionalPDF3" /> 
    </div>
    </div>
    </div>
    <!--begin::Important Alert-->
<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">If you previously uploaded a document, it will be replaced if you decide to upload a new document.</div>
</div>
<!--end::Important Alert-->
    </div>
    <!--end::Document URL Option 3 - Upload Document-->
    </div>
    <!--end::Row - Document URL Option 3-->
    </div>    
    </div>
    
<input type="hidden"name="CMAdditionalPDF1" value="<?php echo $AdditionalPDF1 ?>"   />
<input type="hidden" name="CMAdditionalTitle1" value="<?php echo $AdditionalTitle1 ?>"/>
<input type="hidden" name="CMAdditionalURL1" value="<?php echo $AdditionalURL1 ?>"/>
<input type="hidden"  name="CMAdditionalPDF2" value="<?php echo $AdditionalPDF2 ?>" />
<input type="hidden" name="CMAdditionalTitle2" value="<?php echo $AdditionalTitle2 ?>"/>
<input type="hidden" name="CMAdditionalURL2" value="<?php echo $AdditionalURL2 ?>"/>
<input type="hidden"  name="CMAdditionalPDF3" value="<?php echo $AdditionalPDF3 ?>" />
<input type="hidden" name="CMAdditionalTitle3" value="<?php echo $AdditionalTitle3 ?>"/>
<input type="hidden" name="CMAdditionalURL3" value="<?php echo $AdditionalURL3 ?>"/>
    
<?php if (isset($_GET['allow'])) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Step 9 - Checkbox 1-->
<div class="col-xl-12 mt-3 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input <?php echo $AdditionalConsentCheck ?> type="checkbox" onclick="return false;"  name="AdditionalConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I have reviewed the details provided.</small></label>
</div>
<!--end::Step 9 - Checkbox 1-->
</div>
<!--end::Row-->
<?php } ?>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
</div>

</div>
<?php if (isset($_GET['allow'])) { ?>

<?php //if ($QuoteTotalFee !='0' || $BookingTotalFee !='0' || $TripGrandTotal !='0' || $InsuranceGrandTotal !='0') 
{ ?>


<div>
<!--begin::Ribbon-->
<?php if (($DetailsCorrectConsent =='Yes') && (!empty($MethodOfPayment1) || !empty($MethodOfPayment2) || !empty($MethodOfPayment3) || !empty($MethodOfPayment4)) ) { $app11=1; ?>	
<div class="ribbon ribbon-top mb-5">
<div class="ribbon-target bg-success font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Approved</div>
</div>
<?php } else { $napp11=1; ?>
<div class="ribbon ribbon-top mb-5">
<div class="ribbon-target bg-danger font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Please Review</div>
</div>
<?php } ?>
<!--end::Ribbon-->
<!--begin::Item-->
<div class="card border p-6" onClick="grossIt()">
<!--begin::Header-->
<div class="card-header" id="baf-heading14">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf14" aria-expanded="true" aria-controls="baf14" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Payment</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf14" class="collapse" aria-labelledby="baf-heading14" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">Please review the pricing totals and all of the payment details provided.</p>
<!--begin::Row-->
<div class="row">
<!--begin::Quote Fee Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Quote Fee Grand Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php 
if (!empty($QuoteTotalFee)) 
$QuoteTotalFee=$QuoteTotalFee;
else
$QuoteTotalFee='0.00';
?>
<input name="QuoteTotalFee" id="sgt" value="<?php echo $QuoteTotalFee ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Quote Fee Grand Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $ServiceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Quote Fee Grand Total-->


<!--begin::Booking Fee Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Booking Fee Grand Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php 
if (!empty($BookingTotalFee)) 
$BookingTotalFee=$BookingTotalFee;
else
$BookingTotalFee='0.00';
?>
<input name="BookingTotalFee" id="sgt0" value="<?php echo $BookingTotalFee ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Booking Fee Grand Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $ServiceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Booking Fee Grand Total-->



<!--begin::Trip Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Trip Grand Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<?php if (empty($TripGrandTotal)) { ?>
<input value="0.00" name="total" id="total" onChange="totalIt()" class="form-control form-control-lg bg-light-success" placeholder="Trip Grand Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
<?php } else { ?>
<input value="<?php echo $TripGrandTotal ?>" name="TotalAmountDue3" id="TotalAmountDue3" onChange="totalIt2()" class="form-control form-control-lg bg-light-success" placeholder="Trip Grand Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $TripPricingCurrency ?></span>
</div>
<?php }  ?>
</div>																		
</div>
</div>
<!--end::Trip Grand Total-->




<!--begin::Travel Insurance Grand Total-->
<div class="col-xl-6">
<div class="form-group">
<label>Travel Insurance Grand Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>

<input name="InsuranceGrandTotal" id="igt" value="<?php echo $InsuranceGrandTotal ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Travel Insurance Grand Total (Tax Inc.)" readonly >
<div class="input-group-append">
<span class="input-group-text"><?php echo $InsuranceCurrency ?></span>
</div>
</div>																		
</div>
</div>
<!--end::Travel Insurance Grand Total-->
</div>
<!--end::Row-->
<?php if ($TripGrandTotal > 0) { ?>
<!--begin::Payment Schedule Alert-->
<div class="alert alert-custom alert-danger mt-2" role="alert"> <div class="alert-icon"> <i class="fas fa-exclamation"></i> </div>
<div class="alert-text lead">Payment(s) for the trip portion will be processed according to the dates mentioned in the payment schedule (see <b>Trip Pricing & Payment Schedule</b>).</div>
</div>
<!--end::Payment Schedule Alert-->
<?php } ?>

<script>
function grossIt() {
<?php if (empty($FullPaymentDate)) { ?>
var y1 = document.getElementById("total").value;
<?php } else { ?>
var m1 = document.getElementById("TotalAmountDue3").value;
<?php } ?>
var a1 = document.getElementById("sgt").value;
var b1 = document.getElementById("sgt0").value;
var v1 = document.getElementById("igt").value;
var x1 = 
<?php if (empty($FullPaymentDate)) { ?>
Number(y1) + 
<?php } else { ?>
Number(m1) + 
<?php } ?>
Number(a1) +
Number(b1) + 
Number(v1) ;
document.getElementById("ogt").value = x1.toFixed(2);
}
</script>
<input name="OverallGrandTotal" id="ogt" value="0.00" type="hidden" readonly >

<!--begin::Row-->
<div class="row">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mt-5 mb-9 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Method Of Payment-->
<div class="col-xl-12">
<div class="form-group mb-0">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<label>Method Of Payment (Select Up To 2)</label>
</div>
<div class="checkbox-list mb-5 text-dark font-weight-bold">

<?php if (!empty($MethodOfPayment1)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" name="MethodOfPayment"><span></span>Credit Card</label>

<?php } if (!empty($MethodOfPayment2)) { ?>

<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" name="MethodOfPayment"><span></span>Bank Deposit Into Centre Holidays' Account</label>

<?php } if (!empty($MethodOfPayment3)) { ?>

<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" name="MethodOfPayment"><span></span>Email Transfer</label>

<?php } if (!empty($MethodOfPayment4)) { ?>

<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly  type="checkbox" name="MethodOfPayment"><span></span>Trip Financing Through Uplift</label>

<?php } ?>

</div>
</div>
<!--end::Method Of Payment-->
</div>
<!--end::Row-->

<?php if (!empty($MethodOfPayment2)) { ?>

<!--begin::Row-->
<div class="row">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-8 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Bank Deposit Paying For-->
<div class="col-xl-12">
<div class="form-group mb-0">
<label>What Will You Be Paying For With Bank Deposit?</label>
</div>
<div class="checkbox-list mb-5 text-dark font-weight-bold">

<?php if (!empty($QuoteFee1)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Quote Fee">
<span></span>Quote Fee</label>

<?php } if (!empty($BookingFee1)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Booking Fee">
<span></span>Booking Fee</label>

<?php } if (!empty($TripFee1)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Trip">
<span></span>Trip</label>

<?php } if (!empty($TravelInsuranceFee1)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Travel Insurance">
<span></span>Travel Insurance</label>
<?php } ?>

</div>
</div>

<!--end::Bank Deposit Paying For-->

<?php if (!empty($MethodOfPayment2)) { ?>
<!--begin::Bank Deposit-->
<div class="col-xl-12" >
<div class="card card-custom card-border bg-light mb-8">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>Your client has been emailed the steps to make a bank deposit.</p>
</div>
</div>
</div>
</div>
<!--end::Bank Deposit-->
<?php } ?>

</div>
<!--end::Row-->

<?php } ?>



<?php if (!empty($MethodOfPayment3)) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-8 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::E-Transfer Paying For-->
<div class="col-xl-12">
<div class="form-group mb-0">
<label>What Will You Be Paying For With Email Transfer?</label>
</div>
<div class="checkbox-list mb-5 text-dark font-weight-bold">

<?php if (!empty($QuoteFee2)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Quote Fee">
<span></span>Quote Fee</label>

<?php } if (!empty($BookingFee2)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Booking Fee">
<span></span>Booking Fee</label>

<?php } if (!empty($TripFee2)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Trip">
<span></span>Trip</label>

<?php } if (!empty($TravelInsuranceFee2)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Travel Insurance">
<span></span>Travel Insurance</label>
<?php } ?>

</div>
</div>

<!--end::E-Transfer Paying For-->
<?php if (!empty($MethodOfPayment3)) { ?>
<!--begin::E-Transfer-->
<div class="col-xl-12" id="box23">
<div class="card card-custom card-border bg-light mb-8">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>Your client has been emailed the steps to make an email transfer.</p>
</div>
</div>
</div>
</div>
<!--end::E-Transfer-->
<?php } ?>

</div>
<!--end::Row-->
<?php } ?>


<?php if (!empty($MethodOfPayment4)) { ?>
<!--begin::Row-->
<div class="row">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-8 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Trip Financing Paying For-->
<div class="col-xl-12">
<div class="form-group mb-0">
<label>What Will You Be Paying For With Trip Financing?</label>
</div>

<div class="checkbox-list mb-5 text-dark font-weight-bold">

<?php if (!empty($QuoteFee3)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Quote Fee">
<span></span>Quote Fee</label>

<?php } if (!empty($BookingFee3)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Booking Fee">
<span></span>Booking Fee</label>

<?php } if (!empty($TripFee3)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Trip">
<span></span>Trip</label>

<?php } if (!empty($TravelInsuranceFee3)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Travel Insurance">
<span></span>Travel Insurance</label>
<?php } ?>

</div>

</div>

<?php if (!empty($MethodOfPayment4)) { ?>
<!--begin::Trip Financing-->
<div class="col-xl-12" id="box24">
<div class="card card-custom card-border bg-light mb-8">
  <div class="card-body lead pt-8 text-dark">
  <div class="card-scroll">
<p>Please contact your client to go over Uplift's trip financing process.</p>
</div>
</div>
</div>
</div>
<!--end::Trip Financing-->
<?php } ?>

</div>
<!--end::Row-->
<!--begin::Row-->
<?php } ?>


<!-----------------------------------STRAT OF CREDIT CARD AREA HIDDING------------------------>
<?php if (!empty($MethodOfPayment1)) { ?>
<div class="row">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-8 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Credit Card Paying For-->
<div class="col-xl-12 mb-10">
<div class="form-group mb-0">
<label>What Will You Be Paying For With Credit Card?</label>
</div>

<div class="checkbox-list mb-5 text-dark font-weight-bold">

<?php if (!empty($QuoteFee4)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Quote Fee">
<span></span>Quote Fee</label>

<?php } if (!empty($BookingFee4)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Booking Fee">
<span></span>Booking Fee</label>

<?php } if (!empty($TripFee4)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Trip">
<span></span>Trip</label>

<?php } if (!empty($TravelInsuranceFee4)) { ?>
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked readonly type="checkbox" value="Travel Insurance">
<span></span>Travel Insurance</label>
<?php } ?>

</div>
<!--begin::Credit Card Alert-->
<div class="alert alert-custom alert-danger mt-2" role="alert"> <div class="alert-icon"> <i class="fas fa-exclamation"></i> </div>
<div class="alert-text lead">If any of the checked items are to be processed in-house by head office, please notify your client which items will be and that there will be a transaction fee (added to the total) of 3.5% for VISA or Mastercard and 4% for AMEX. Access and fill in the Credit Card Merchant Form (see <b>Assets > Documents</b>), and submit it to head office.</div>
</div>
<!--end::Credit Card Alert-->

</div>
<!--end::Credit Card Paying For-->

<!--begin::Credit Card Owner-->
<div class="col-xl-3">
<div class="form-group">
<label>Credit Card Owner</label>
<select class="form-control  form-control-lg bg-light" id="select50" name="CCOwner" onChange="selectChanged50()">
<option value="<?php echo $CCOwner ?>"><?php echo $CCOwner ?></option>
</select>
</div>
</div>
<!--end::Credit Card Owner-->
<!--begin::Credit Card Type-->
<div class="col-xl-3">
<div class="form-group">

<label>Credit Card Type</label>
<select class="form-control  form-control-lg bg-light" name="CCType">
<option value="<?php echo $CCType ?>"><?php echo $CCType ?></option>
</select>
</div>
</div>
<!--end::Credit Card Type-->


<?php
//GP EDITED -- START
include_once($_SERVER['DOCUMENT_ROOT'] . '/admin/global-functions.php');

$CCNumber=decryptData($CCNumber);
$CCExpiry=decryptData($CCExpiry);
$CCVV=decryptData($CCVV);

//GP EDITED -- END
?>


<!--begin::Credit Card Name-->
<div class="col-xl-3">
<div class="form-group">
<label>Name On Credit Card</label>
<input type="text" name="CCName" readonly value="<?php echo $CCName ?>" class="form-control  form-control-lg bg-light" placeholder="Name On Credit Card" />
</div>
</div>
<!--end::Credit Card Name-->
<!--begin::Credit Card Number-->
<div class="col-xl-3">
<div class="form-group">
<label>Credit Card Number</label>
<input type="text" name="CCNumber" readonly value="<?php echo $CCNumber ?>" class="form-control form-control-lg bg-light" placeholder="Credit Card Number" />
</div>
</div>
<!--end::Credit Card Number-->
<!--begin::Expiry Date-->
<div class="col-xl-2">
<div class="form-group">
<label>Expiry Date (MM/YY)</label>
<input type="text" name="CCExpiry" readonly value="<?php echo $CCExpiry ?>" class="form-control form-control-lg bg-light" placeholder="Expiry Date" />
</div>
</div>
<!--end::Expiry Date-->
<!--begin::CVV Number-->
<div class="col-xl-2">
<div class="form-group">
<label>CVV Number</label>
<input type="text" name="CCVV" readonly value="<?php echo $CCVV ?>" class="form-control form-control-lg bg-light" placeholder="CVV Number" />
</div>
</div>
<!--end::CVV Number-->
<!--begin::Card Holder's Phone-->
<div class="col-xl-3">
<div class="form-group">
<label>Card Holder's Phone</label>
<input type="text" name="CCPhone" readonly value="<?php echo $CCPhone ?>" class="form-control form-control-lg bg-light" placeholder="Card Holder's Phone" />
</div>
</div>
<!--end::Card Holder's Phone-->
<!--begin::Primary Traveller Street-->
<div class="col-xl-5">
<div class="form-group">
<label>Card Holder's Email</label>
<input type="text" name="CCEmail" readonly value="<?php echo $CCEmail ?>" class="form-control form-control-lg bg-light" placeholder="Card Holder's Email" />
</div>
</div>
<!--end::Card Holder's Email-->
<!--begin::Step 11 - Agree Checkbox 1-->
<?php if ($CCAddressSame=='Yes') { ?>
<div class="col-xl-12 mt-3">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input checked type="radio" name="CCAddressSame" id="myCheck246" onClick="myFunction246()" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Credit card billing address is the same as the primary traveller's home address.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 1-->
<?php } if ($CCAddressSame=='No') { ?>
<!--begin::Step 11 - Agree Checkbox 2-->
<div class="col-xl-12 mt-5 mb-5">
<label class="radio radio-outline radio-success radio-lg radio-outline-2x">
<input checked type="radio" name="CCAddressSame" id="myCheck247" onClick="myFunction247()" value="No">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">Credit card billing address is a different address.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 2-->
<?php } ?>

</div>
<!--end::Row-->

<?php if ($CCAddressSame=='No') { ?>
<!--begin::Row-->
<div class="row mt-3">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-6 separator-border-3"></div>
</div>
<!--end::Separator-->
<!--begin::Billing Address (Street)-->
<div class="col-xl-9">
<div class="form-group">
<label>Billing Address (Street)</label>
<input type="text" name="CCAddress" value="<?php echo $CCAddress ?>" class="form-control form-control-lg bg-light" placeholder="Billing Address (Street)" />
</div>
</div>
<!--end::Billing Address (Street)-->
<!--begin::Billing Address Unit-->
<div class="col-xl-3">
<div class="form-group">
<label>Unit / Suite / Apartment</label>
<input type="text" name="CCUnit" value="<?php echo $CCUnit ?>" class="form-control form-control-lg bg-light" placeholder="Unit / Suite / Apartment" />
</div>
</div>
<!--end::Billing Address Unit-->
<!--begin::Billing Address City-->
<div class="col-xl-3">
<div class="form-group">
<label>City</label>
<input type="text" name="CCCity" value="<?php echo $CCCity ?>" class="form-control form-control-lg bg-light" placeholder="City" />
</div>
</div>
<!--end::Billing Address City-->
<!--begin::Billing Address Province-->
<div class="col-xl-3">
<div class="form-group">
<label>Province / State</label>
<input type="text" name="CCProvince" value="<?php echo $CCProvince ?>" class="form-control form-control-lg bg-light" placeholder="Province / State" />
</div>
</div>
<!--end::Billing Address Province-->
<!--begin::Billing Address Postal Code-->
<div class="col-xl-3">
<div class="form-group">
<label>Postal Code / Zip Code</label>
<input type="text" name="CCPostal" value="<?php echo $CCPostal ?>" class="form-control form-control-lg bg-light" placeholder="Postal Code / Zip Code" />
</div>
</div>
<!--end::Billing Address Postal Code-->
<!--begin::Billing Address Country-->
<div class="col-xl-3">
<div class="form-group">
<label>Country</label>
<input type="text" name="CCCountry" value="<?php echo $CCCountry ?>" class="form-control form-control-lg bg-light" placeholder="Country" />
</div>
</div>
<!--end::Billing Address Country-->
</div>
<!--end::Row-->

<?php } ?>




<div class="row">
<!--begin::First Party Credit Card Text-->
<div class="col-xl-12 mb-6 mt-1">
<div class="lead font-weight-bold hidden" id="box50" >
<!--begin::Separator-->
<div class="separator separator-dashed mb-6 separator-border-3"></div>
<!--end::Separator-->
<p>Please Upload A Photo Or Scan Of The Required Documentation.</p>
</div>
<!--end::First Party Credit Card Text-->
<!--begin::Third Party Credit Card Text-->
<div class="lead font-weight-bold hidden" id="box51">
<!--begin::Separator-->
<div class="separator separator-dashed mb-6 separator-border-3"></div>
<!--end::Separator-->
<p>Please Upload A Photo Or Scan Of The Required Documentation.</p>
</div>
</div>
</div>
<!--end::Third Party Credit Card Text-->
<div class="row">
<?php if ((!empty($CCFront))) { ?>
<!--begin::CC Front-->
<div class="<?php echo $cclayout ?>">
<div class="form-group">
<a href="../img/agents/booking-authorization-email-form/<?php echo $CCFront ?>" title="See Document" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase px-5 py-3" type="button" download>Credit Card Front</a>
</div>
</div>

<!--end::CC Front-->
<?php } ?>
<?php if ((!empty($CCBack))) { ?>
<!--begin::CC Back-->
<div class="<?php echo $cclayout ?>">
<div class="form-group">
<a href="../img/agents/booking-authorization-email-form/<?php echo $CCBack ?>" title="See Document" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase px-5 py-3" type="button" download>Credit Card Back</a>
</div>
</div>
<?php } ?>
<!--end::CC Back-->
<?php if (!empty($GovernmentID)) { ?>
<!--begin::Upload Government Issued ID-->
<div class="col-xl-4">
<div class="form-group">
<a href="../img/agents/booking-authorization-email-form/<?php echo $GovernmentID ?>" title="See Document" class="btn btn-warning btn-lg btn-block font-weight-bolder text-uppercase px-5 py-3" type="button" download>Government Issued ID</a>
</div>
</div>
<!--end::Upload Government Issued ID-->
<?php } ?>
</div>
<?php } ?>
<!-----------------------------------END OF CREDIT CARD AREA HIDDING------------------------>

<!--begin::Row-->
<div class="row">
<!--begin::Separator-->
<div class="col-xl-12">
<div class="separator separator-dashed mb-5 separator-border-3 mt-1"></div>
</div>
<!--end::Separator-->

<?php if (!empty($checked33)) { ?>
<!--begin::Step 11 - Agree Checkbox 3-->
<div class="col-xl-12 mt-3">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input readonly <?php echo $checked33 ?> type="checkbox" name="DetailsCorrectConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I hereby certify that the details I have provided are correct.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 3-->
<?php } ?>

<?php if (!empty($checked34)) { ?>
<!--begin::Step 11 - Agree Checkbox 4-->
<div class="col-xl-12 mt-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input readonly type="checkbox" <?php echo $checked34 ?> name="VerificationPurposesConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that if the card holder is not one of the travellers, they will be contacted for verification purposes.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 4-->
<?php } ?>

<?php if (!empty($checked35)) { ?>
<!--begin::Step 11 - Agree Checkbox 5-->
<div class="col-xl-12 mt-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input readonly type="checkbox" <?php echo $checked35 ?> name="CreditCardProcessConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that by providing my credit card details, it will not be processed automatically upon submission of this form.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 5-->
<?php } ?>

<?php if (!empty($checked88)) { ?>
<!--begin::Step 11 - Agree Checkbox 6-->
<div class="col-xl-12 mt-5 mb-5">
<label class="checkbox checkbox-outline checkbox-success checkbox-lg checkbox-outline-2x">
<input readonly type="checkbox" <?php echo $checked88 ?> name="AdditionalTravelConsent" value="Yes">
<span class="mr-3"></span><small class="font-size-lg text-dark font-weight-bold">I understand that if I choose to purchase additional travel options (seat selection, excursions, etc.), I will provide payment authorization to my travel advisor via email.</small></label>
</div>
<!--end::Step 11 - Agree Checkbox 6-->
<?php } ?>
</div>
<!--end::Row-->
</div>
<!--begin::Body-->
</div>
<!--end::Item-->
</div>

<?php }} ?>

<?php if (isset($_GET['allow'])) { ?>
<div>
<!--begin::Ribbon-->
<div class="ribbon ribbon-top mb-5">
<div class="ribbon-target bg-dark font-weight-bolder text-uppercase" style="top: -2px; left: 29px;">Form Tracking</div>
</div>
<!--end::Ribbon-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading15">
<div class="card-title collapsed" data-toggle="collapse" data-target="#baf15" aria-expanded="true" aria-controls="baf15" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">History</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf15" class="collapse" aria-labelledby="baf-heading15" data-parent="">
<div class="card-body pb-0 pt-3 lead">
<p class="mb-10 font-weight-bolder">This section shows the tracking history of the form for legal purposes.</p>
<ul>
<li>
<?php echo $BusinessFullName ?> (IP: <?php echo $BookingIP;  ?>) created and sent a booking authorization email form to <?php echo $EmaiToFullName ?> on <?php echo date('M d, Y @  h:i:s a',$BookingTime) ?>.
</li>
<li>
Booking authorization email form seen by <?php echo $EmaiToFullName ?> on <?php echo  date('M d, Y @  h:i:s a',$BookingTime2) ?>.
</li>
<?php if (!empty($PTravellerFName)) { ?>
<li>
Booking authorization email form sent by <?php echo $PTravellerFName.' '.$PTravellerLName; ?> (IP: <?php echo $BookingCIP ?>) to <?php echo $BusinessFullName ?> on <?php echo date('M d, Y @  h:i:s a',$BookingTime2) ?>.
</li>
<?php } ?>
<?php if (!empty($BookingTime3)) { ?>
<li>
Booking authorization email form was not approved by <?php echo $EmaiToFullName ?> in <?php echo date('M d, Y @  h:i:s a',$BookingTime3) ?>.
</li>
<?php } ?>
<?php if ($BookingStatus > 3) { ?>
<li>
Booking authorization email form approved by  <?php echo $EmaiToFullName.' in '.date('M d, Y @  h:i:s a',$BookingTime4) ?>.
</li>
<?php } ?>  

<?php if (!empty($BookingTime5)) { ?>
<li>
Booking authorization edited by the agent <?php echo $BusinessFullName ?> (IP: <?php echo $AgentPrevIP ?>) <?php echo ' in '.date('M d, Y @  h:i:s a',$BookingTime5) ?>.
</li>
<?php } ?>

<?php if (!empty($BookingTime6)) { ?>
<li>
Client <?php echo $EmaiToFullName.' reviewed the changes in '.date('M d, Y @  h:i:s a',$BookingTime6) ?>.
</li>
<?php } ?>

</ul>
</div>
</div>
<!--end::Body-->
</div>
</div>
<?php } ?>

<!--END OF THE HIDDEN DIV BASED ON COVID ACCEPTANCE-->
</div>
<!--END OF THE HIDDEN DIV BASED ON COVID ACCEPTANCE-->


<!--end::Booking Authorization Form Accordion-->
</div>
<!--BEGIN: EXTRA DIV ADDED IN TO MAKE THE SITE APPEAR CORRECTLY-->
<?php if (isset($_GET['allow'])) { ?>
    </div>
    <?php } else { ?>
    <?php } ?>
<!--END: EXTRA DIV ADDED IN TO MAKE THE SITE APPEAR CORRECTLY-->


<!--hideprint HIDE THE BOTTOM PART WHEN PRINTING-->
<!--HIDE THE BOTTOM PART WHEN PRINTING-->
<!--HIDE THE BOTTOM PART WHEN PRINTING-->

<div class="col-xl-12 d-flex flex-center" id="hideprint">

<?php
//=================ALGORTHEM AND LOGIC====================================================================
//napp section not approved app section approved, below calculation
$Tnapp=$napp1+$napp3+$napp4+$napp5+$napp6+$napp9+$napp11;
$Tapp=$app1+$app3+$app4+$app5+$app6+$app9+$app11;
$Tallapp=$Tnapp+$Tapp;
$OtherTallapp=$napp2+$napp8+$napp10+$napp7;
//CONDITION 1 ($Tnapp >= $Tapp) || ($Tallapp==8 && $Tnapp > 0)) && $FormCancelled !='Yes') condition to show edit form 
//all sections selected not approved minus Service Fee, Travel Insurance, Additional Docs & URL
//CONDITION 2 ($Tnapp >= $Tapp) || ($Tallapp==8 && $Tnapp > 0) hide or dsiplay the whoe section
//CONDITION 3 ($CovidAccepted =='No' && $FormCancelled !='Yes') hide display the cancel button
//=========================================================================================================
?>

<?php if (!isset($_GET['allow']) && ($BookingStatus !=1 || $BookingStatus !=2 || $BookingStatus !=4)) {?>

<input type="submit" value="Send Email Form"  onclick="DisplayFunction()" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mt-5" id="" title="Send Email Form" />
<?php } else { 

//====================hide/display class=========================
if (($Tnapp >= $Tapp) || ($Tallapp==8 && $Tnapp > 0) || ($OtherTallapp >0) && $FormCancelled !='Yes') { $printclass='mr-5'; } else { $printclass=''; } ?>

<button type="button" class="btn btn-outline-warning btn-light-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mt-5 <?php echo $printclass ?>" onclick="window.print();" title="Print Email Form">Print Email Form</button>

<?php 
if ((($Tnapp >= $Tapp) || ($Tallapp==8 && $Tnapp > 0) || ($OtherTallapp >0)) && $FormCancelled !='Yes') { ?>

<!--    HIDING THE EDIT BUTTON FOR NOW-->
<?php if (0) { ?>
<a href="<?php echo $_SERVER['PHP_SELF'] ?>?BookUnique=<?php echo $BookUnique ?>&BookID=<?php echo $_GET['BookID'] ?>" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mt-5" title="Edit Email Form">
Edit Email Form
</a>
<?php } ?>

<?php } ?>

<?php if ($CovidAccepted =='No' && $FormCancelled !='Yes') { ?>
<a href="booking-authorization-email-form-cancle.php?BookUnique=<?php echo $BookUnique ?>&BookID=<?php echo $_GET['BookID'] ?>" class="btn btn-danger font-weight-bolder px-7 py-5 ml-5 text-uppercase btn-lg mt-5" title="Cancel Email Form">Cancel Email Form</a>
<?php } ?>



<?php } ?>

</div>

<!--DIV ADDED DUE TO CLOSING BUG-->
</div>
<!--DIV ADDED DUE TO CLOSING BUG-->


<script>
function DisplayFunction() {
  var x = document.getElementById("HiddenDiv");
    x.style.display = "block";
}
</script>
<div class="row justify-content-center mb-10">
<div class="col-md-11">
<div class="spinner spinner-danger spinner-right" style="display:none" id="HiddenDiv">
<input class="form-control bg-light-danger font-weight-bolder h5 text-danger" value="Please Wait While Your Document(s) Upload. Do Not Close This Window!" readonly/>
</div>
</div>
</div>
<input type="hidden" value="<?php echo $_GET['BookID'] ?>" name="BookID" />
</form>
<!--DISABLE THE FORM IN CASE OF PREVIEW--->
<?php if ($_GET['allow']=='no' || $BookingStatus ==1 || $BookingStatus ==2 || $BookingStatus ==4) {?>
<script>
var f = document.forms['myFormNAME'];
for(var i=0,fLen=f.length;i<fLen;i++){
f.elements[i].readOnly = true;//As @oldergod noted, the "O" must be upper case
}
</script>
<?php } ?>


<!--begin::Footer Infoboxes-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer-infoboxes.php');?>
<!--end::Footer Infoboxes-->



</div>
<!--end::Section-->
</div>
<!--end::Content-->           
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer.php');?>
</div>
<!--END OF HIDING FOOTER------>				


                
                
                			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
<!--end::Main-->
<!--begin::Sticky Toolbar-->

<!--end::Sticky Toolbar-->
<!--begin::Global Theme Bundle(used by all pages)-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer-scripts.php');?>
<!--end::Global Theme Bundle-->
 </body>
<?php } else {echo "This form no longer exist, or you have no permission to view it.";}?>
 
<!--end::Body-->
</html>