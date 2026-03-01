<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
    <meta charset="utf-8"/>
    <title>Booking Authorization Email Form - Agent Portal | Centre Holidays</title>
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( editor.getData() );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    Swal.fire( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    Swal.fire( 'The "IsDirty" status has been reset' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( editor.getData() );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor1;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    Swal.fire( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor1;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    Swal.fire( 'The "IsDirty" status has been reset' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( editor.getData() );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    Swal.fire( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    Swal.fire( 'The "IsDirty" status has been reset' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( editor.getData() );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor2;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    Swal.fire( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor2;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    Swal.fire( 'The "IsDirty" status has been reset' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( editor.getData() );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    Swal.fire( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    Swal.fire( 'The "IsDirty" status has been reset' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( editor.getData() );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    Swal.fire( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor3;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    Swal.fire( 'The "IsDirty" status has been reset' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( editor.getData() );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    Swal.fire( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    Swal.fire( 'The "IsDirty" status has been reset' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
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
    Swal.fire( editor.getData() );
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
    Swal.fire( 'You must be in WYSIWYG mode!' );
    }
    
    function CheckDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    // Checks whether the current editor contents present changes when compared
    // to the contents loaded into the editor at startup
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
    Swal.fire( editor.checkDirty() );
    }
    
    function ResetDirty() {
    // Get the editor instance that we want to interact with.
    var editor = CKEDITOR.instances.editor4;
    // Resets the "dirty state" of the editor (see CheckDirty())
    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
    editor.resetDirty();
    Swal.fire( 'The "IsDirty" status has been reset' );
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
    42: [41, 42],
    43: [41, 42, 43],
    51: [51],
    52: [52],
    61: [61],
    62: [62],
    71: [71],
    72: [72],
	81: [81],
    82: [82],
	83: [83],
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
    
	function selectChanged80() {
    var sel = document.getElementById("select80");
    for (var i = 81; i < 84; i++) {
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
    
    function selectChanged() {
    var sel = document.getElementById("select");
    for (var i = 1; i < 6; i++) {
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
        if (FileSize > 5) {
            Swal.fire('File size exceeds 5 MiB');
           // $(file).val(''); //for clearing with Jquery
        } else {

        }
    }
	</script>


    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"  >
   
    <?php if ($_GET['results']==1) { ?>
    <!--begin::Modal-->
    <div class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content border border-4">
    <div class="modal-header bg-success">
    <h2 class="mb-0 font-weight-boldest text-uppercase text-white">Booking Authorization Email Form Sent</h2>
    <a href="<?php echo $_SERVER['PHP_SELF'] ?>" type="button" class="close" data-dismiss="modal" aria-label="Close">
    <i aria-hidden="true" class="ki ki-close text-light"></i>
    </a>
    </div>
    <div class="modal-body">
    <p class="lead">Your booking authorization email form has been sent to your client(s) and a copy has also been emailed to you (check your inbox and spam folder).<br>
    <br>
    There are some companies that may automatically block the email from coming through. To ensure that your client receives the email form, you can notify them to check their inbox and spam folder while still forwarding them the copy you received.<br>
    <br>
    If you have any questions, please email <b>support@centreholidays.com</b>.
    </p>
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
									<h1 class="font-weight-boldest text-dark display-3 text-uppercase">Booking Authorization Email Form</h1>
									<h2 class="text-dark-65 font-weight-bolder">Quote or send final pricing, provide various details along with waivers, collect each traveller's details and documents, and get final authorization to book.</h2>				
            </div>
                                   </div>
          <!--end::title-->
          </div>
</div>
<!--end::Hero-->  
<!--begin::Section-->
<div class="container mt-10">
<form class="form" action="booking-authorization-insert2.php" method="post" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $_GET['BookID'] ?>" name="DelBookID" />

<div class="row mb-20">
<div class="col-xl-12">
<!--begin::Booking Authorization Form Accordion-->
<div class="accordion accordion-solid accordion-panel accordion-toggle-plus text-dark pb-10" id="baf">				<!--begin::Item-->
<div class="card border p-6"><!--begin::Header-->
<div class="card-header" id="baf-heading1">
<div class="card-title font-size-h2 font-weight-bolder text-warning" data-toggle="collapse" data-target="#baf1" aria-expanded="true" aria-controls="baf1" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Section Selector</div>
</div>
</div>
<!--end::Header->
<!--begin::Body-->
<div id="baf1" class="collapse show" aria-labelledby="baf-heading1" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">Select all the sections you will require and then proceed to the next section.</p>
<div class="checkbox-list mb-5 text-dark font-weight-bold">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $myCheck1 ?> name="Checkboxes1" id="myCheck1" onclick="myFunction1()">
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


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $Checkboxes2 ?> name="Checkboxes2" id="myCheck2" onclick="myFunction2()">
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


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $Checkboxes3 ?> name="Checkboxes3" id="myCheck3" onclick="myFunction3()">
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


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $myCheck5 ?> name="Checkboxes5" id="myCheck5" onclick="myFunction5()">
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


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $myCheck6 ?> name="Checkboxes6" id="myCheck6" onclick="myFunction6()">
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


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $myCheck7 ?> name="Checkboxes7" id="myCheck7" onclick="myFunction7()">
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
<div class="alert alert-custom alert-danger mb-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">Your client will automatically be provided a COVID-19 waiver to sign. If they do not sign the waiver, they will not be able to proceed with the rest of the booking authorization process.</div>
</div>
<div class="alert alert-custom alert-danger mb-12" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">If you do not send any travel insurance information, your client will be provided the option to request for a quote or sign a waiver declining to purchase travel insurance.</div>
</div>
<p class="mb-10 font-weight-bolder">If you know your client and already have a copy of their passport, and/or credit card (first party credit card only), you can choose to NOT request for those additional items by unchecking the boxes below.</p> 
<div class="checkbox-list text-dark font-weight-bold mb-5">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked type="checkbox" name="RequestTravellersPassport" id="myCheck177" value="Yes">
<span></span>Request All Travellers To Upload A Copy Of Their Passport.</label>


<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input checked type="checkbox" name="RequestPrimaryTravellerCC" id="myCheck277" value="Yes">
<span></span>Request Primary Traveller To Upload A Copy Of Their Credit Card (First Party).</label>
</div>
<div class="alert alert-custom alert-danger mb-5 mt-9" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">If an individual is NOT travelling and paying for any of the travellers with their credit card (third party), they will be required to upload a copy of their credit card and an additional piece of government issued ID. This is to avoid fraudulent bookings from taking place.</div>
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="card border p-6">
<!--begin::Header-->
<div class="card-header" id="baf-heading2">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf2" aria-expanded="false" aria-controls="baf2" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Email From</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf2" class="collapse" aria-labelledby="baf-heading2" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">This section contains your business information and it will let your client(s) know who the email is coming from and whom they can contact if they require any assistance. Though some of the fields are pre-filled, you can edit the displayed information.</p>
<!--begin::Row-->
<div class="row">
<!--begin::Travel Advisor Business Name-->
<div class="col-xl-6">
<div class="form-group">

<input type="hidden" name="AgentUniqID" value="<?php echo $AgentUniqID ?>" />
<input type="hidden" name="AgentID" value="<?php echo $AgentID ?>" />

<label>Business Name</label>
<?php
if (!empty($BusinessName))
$TagTitle1=$BusinessName;
else
$TagTitle1='Centre Holidays';
?>
<input type="text" name="BusinessName" value="<?php echo $TagTitle1 ?>" class="form-control form-control-lg" placeholder="Business Name" />
</div>
</div>
<!--end::Travel Advisor Business Name-->
<!--begin::Travel Advisor Full Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Full Name</label>
<input type="text" name="BusinessFullName" value="<?php echo $DisplayName ?>" class="form-control  form-control-lg" placeholder="Full Name" />
</div>
</div>
<!--end::Travel Advisor Business Name-->
<!--begin::Travel Advisor Phone-->
<div class="col-xl-6">
<div class="form-group">
<label>Phone</label>
<select class="form-control  form-control-lg" id="BusinessPhone" name="BusinessPhone">
<?php if (!empty($BusinessPhone)) { ?>
<option value="<?php echo $BusinessPhone ?>"><?php echo $BusinessPhone ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>

<?php if (!empty($BusinessNum)) { ?>
<option value="<?php echo $BusinessNum ?>"><?php echo $BusinessNum ?></option>
<?php } if (!empty($CellNum)) { ?>
<option value="<?php echo $CellNum ?>"><?php echo $CellNum ?></option>
<?php } if (!empty($TollFreeNum)) { ?>
<option value="<?php echo $TollFreeNum ?>"><?php echo $TollFreeNum ?></option>
<?php }  ?>
</select>
</div>
</div>
<!--end::Travel Advisor Phone-->
<!--begin::Travel Advisor Email-->
<div class="col-xl-6">
<div class="form-group">
<label>Email</label>

<select class="form-control  form-control-lg" id="BusinessEmail" name="BusinessEmail">
<?php if (!empty($BusinessPhone)) { ?>
<option value="<?php echo $BusinessEmail ?>"><?php echo $BusinessEmail ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<?php if (!empty($BusinessEmail)) { ?>
<option value="<?php echo $BusinessEmail ?>"><?php echo $BusinessEmail ?></option>
<?php } if (!empty($OtherEmail)) { ?>
<option value="<?php echo $OtherEmail ?>"><?php echo $OtherEmail ?></option>
<?php } ?>
</select>
</div>
</div>


<!--end::Travel Advisor Email-->
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
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf3" aria-expanded="false" aria-controls="baf3" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Email To</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf3" class="collapse" aria-labelledby="baf-heading3" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">Fill in your client's details or whomever will be in charge of reviewing this form and providing the required authorization. The email subject is pre-filled but can be edited to relate to the information you will be sending.</p>
<!--begin::Row-->
<div class="row">
<!--begin::Email To Type-->
<div class="col-xl-12">
<div class="form-group">
<label>Email Type</label>
<select class="form-control  form-control-lg" name="EmailToType" id="select80" onChange="selectChanged80()">
<?php if (!empty($EmailToType)) { ?>
<option value="<?php echo $EmailToTypeValue ?>"><?php echo $EmailToType ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<option value="81">Email A Single Person</option>
<option value="82">Email Multiple People</option>
<option value="83">Shareable Link</option>
</select>



</div>
</div>
<!--end::Email To Type-->
<!--begin::Email Subject-->
<div class="col-xl-12">
<div class="form-group">
<label>Email Subject</label>
<input type="text" value="<?php echo $EmaiToSubject ?>" name="EmaiToSubject" class="form-control  form-control-lg" placeholder="Email Subject" />
</div>
</div>
<!--end::Email Subject-->
</div>
<!--end::Row-->


<!--begin::Row-->
<div class="<?php echo $box81 ?>" id="box81">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<div class="row">
<!--begin::Client's Full Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Client's Full Name</label>
<input type="text" value="<?php echo $EmaiToFullName ?>"  name="EmaiToFullName1" id="EmaiToFullName1" class="form-control  form-control-lg" placeholder="Client's Full Name" />
</div>
</div>
<!--end::Client's Full Name-->
<!--begin::Client's Email-->
<div class="col-xl-6">
<div class="form-group">
<label>Client's Email</label>
<input type="email" value="<?php echo $EmaiToEmail ?>"  name="EmaiToEmail1" id="EmaiToEmail1" class="form-control  form-control-lg" placeholder="Client's Email" />
</div>
</div>
<!--end::Client's Email-->
</div>
</div>
<!--end::Row-->

<input type="hidden" value="<?php echo $_GET['GroupName'] ?>" name="DBGroupName" />
<input type="hidden" value="<?php echo $_GET['UGroupName'] ?>" name="DBUGroupName" />

<!--begin::Row-->
<div class="<?php echo $box82 ?>" id="box82">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<div class="row">
<!--begin::Group Or Trip Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Group Or Trip Name</label>
<input type="text" value="<?php echo $EmaiToFullName ?>" name="EmaiToFullName2" id="EmaiToFullName2" class="form-control  form-control-lg" placeholder="Group Or Trip Name" />
</div>
</div>
<!--end::Group Or Trip Name-->
<!--begin::Primary Client's Email-->
<div class="col-xl-6">
<div class="form-group">
<label>Primary Client's Email</label>
<input type="email" value="<?php echo $EmaiToEmail ?>" name="EmaiToEmail2" id="EmaiToEmail2" class="form-control  form-control-lg" placeholder="Primary Client's Email" />
</div>
</div>
<!--end::Primary Client's Email-->
<!--begin::Additional Emails-->
<div class="col-xl-12">
<div class="form-group">
<label>Additional Emails (Separate With Commas)</label>
<textarea name="EmailToBCC" id="EmailToBCC" class="form-control form-control-lg" rows="2" placeholder="Additional Emails (Separate With Commas)"><?php echo $EmailToBCC ?></textarea>
</div>
</div>
<!--end::Additional Emails-->
</div>
</div>
<!--end::Row-->


<!--begin::Row-->
<div class="<?php echo $box83 ?>" id="box83">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<div class="row">
<!--begin::Group Or Trip Name-->
<div class="col-xl-6">
<div class="form-group">
<label>Group Or Trip Name (Shareable Link)</label>
<input type="text" value="<?php echo $EmaiToFullName ?>" name="EmaiToFullName3" id="EmaiToFullName3" class="form-control  form-control-lg" placeholder="Group Or Trip Name" />

</div>
</div>
<!--end::Group Or Trip Name-->
<!--begin::Primary Client's Email-->
<div class="col-xl-6">
<div class="form-group">
<label>Primary Client's Email</label>
<input readonly type="email" value="<?php echo $EmaiToEmail ?>" name="EmaiToEmail3" id="EmaiToEmail3" class="form-control form-control-lg bg-light" placeholder="Primary Client's Email" />
</div>
</div>
<!--end::Primary Client's Email-->
<!--begin::Additional Emails-->
<div class="col-xl-12">
<div class="form-group">
<label>Additional Emails (Separate With Commas)</label>
<textarea readonly name="EmailToBCC3" id="EmailToBCC3" class="form-control form-control-lg bg-light" rows="2" placeholder="Additional Emails (Separate With Commas)"><?php echo $EmailToBCC ?></textarea>
</div>
</div>
<!--end::Additional Emails-->
</div>

<div class="alert alert-custom alert-danger mb-5" role="alert">													
<div class="alert-icon">										
<i class="fas fa-exclamation"></i>							
</div>
<div class="alert-text lead">URL will be created and they need to contact support@centreholidays.com once they have submitted the form.</div>
</div>

</div>
<!--End::Row-->

</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->

<!--begin::Item-->

<div class="card border p-6" id="text1" style="display:<?php echo $text1 ?>">
<!--begin::Header-->
<div class="card-header" id="baf-heading4">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf4" aria-expanded="false" aria-controls="baf4" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Service Fee Agreement (SFA)</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf4" class="collapse" aria-labelledby="baf-heading4" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">Use Centre Holidays' SFA or provide your own custom SFA. If your SFA is in a PDF document, you can upload it. The quote fee or booking fee is required to be filled in.</p>
<!--begin::Row-->
<div class="row">
<!--begin::SFA Type-->
<div class="col-xl-6">
<div class="form-group">
<label>Service Fee Agreement Type</label>
<select name="ServiceAgreementType" class="form-control form-control-lg" id="select2" onchange="selectChanged2()">

<?php if (!empty($ServiceAgreementType)) { ?>
<option value="<?php echo $ServiceAgreementTypeValue ?>"><?php echo $ServiceAgreementType ?></option>
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
<!--end::Row-->
<!--begin::CH SFA Text-->
<div class="<?php echo $box11 ?>" id="box11">
<div class="form-group">
<label>Description</label>
<div class="card card-custom card-border bg-light mb-5">
<div class="card-body lead pt-8 text-dark">
<div class="card-scroll">
<p>In order to plan and arrange your trip a <b>quote fee</b> and/or <b>booking fee</b> may be required by Centre Holidays Inc. These fees will include up to three personalized quotes or recommendations with options that meet or exceed expectations. These fees are non-refundable. Should you decide to cancel your trip or are unable to travel for any other reason, Centre Holidays Inc. will retain these fees.<br>
  <br>
  This Service Fee Agreement only applies to trip planning provided by Centre Holidays Inc. This Service Fee Agreement does not represent resorts, airlines or any other travel vendor's policies.
</p>
</div>
</div>
</div>
</div>
</div>
<!--end::CH SFA Text-->

<div class="<?php echo $box13 ?>" id="box13">
<!--begin::SFA Details-->
<div class="form-group">
<label>Description</label>
<textarea class="form-control form-control-lg" rows="3" id="editor1" name="ServiceDetails" placeholder="Description"><?php echo $ServiceDetails ?></textarea>
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
<!--end::SFA Details-->
</div>




<!--begin::Row-->
<div class="row">
<!--begin::Quote Number Of Persons-->
<div class="col-xl-4">
<div class="form-group">
<label>Quote Fee Number Of Persons</label>
<input onChange="myFunction100()" value="<?php echo $QuoteNumberPersons ?>" name="QuoteNumberPersons" id="snp" type="text" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Number Of Persons-->


<!--begin::Quote Fee Per Person-->
<div class="col-xl-4">
<div class="form-group">
<label>Quote Fee Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction100()" value="<?php echo $QuoteFeePerPerson ?>" name="QuoteFeePerPerson" id="sfpp" type="text" class="form-control form-control-lg" placeholder="Amount" >
</div>																		
</div>
</div>
<!--end::Quote Fee Per Person-->
<!--begin::Grand Total-->
<div class="col-xl-4">
<div class="form-group">
<label>Quote Fee Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="QuoteTotalFee" value="<?php echo $QuoteTotalFee ?>" id="sgt" type="text" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Grand Total-->
</div>
<!--end::Row-->


<!--begin::Row-->
<div class="row">
<!--begin::Quote Number Of Persons-->
<div class="col-xl-4">
<div class="form-group">
<label>Booking Fee Number Of Persons</label>
<input onChange="myFunction1000()" value="<?php echo $BookingFeeNumberPersons ?>" name="BookingFeeNumberPersons" id="snp0" type="text" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Number Of Persons-->
<!--begin::Quote Fee Per Person-->
<div class="col-xl-4">
<div class="form-group">
<label>Booking Fee Per Person</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction1000()" value="<?php echo $BookingFeePerPerson ?>" name="BookingFeePerPerson" id="sfpp0" type="text" class="form-control form-control-lg" placeholder="Amount" >
</div>																		
</div>
</div>
<!--end::Quote Fee Per Person-->
<!--begin::Grand Total-->
<div class="col-xl-4">
<div class="form-group">
<label>Booking Fee Total (Tax Inc.)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="BookingFeeTotal" value="<?php echo $BookingFeeTotal ?>" id="sgt0" type="text" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Grand Total-->
</div>
<!--end::Row-->



<!--begin::Hide Agent's SFA Details And Document Upload-->
<div class="<?php echo $box12 ?>" id="box12">

<!--begin::SFA Upload Document-->
<div class="form-group">
<label>Upload Service Fee Agreement (PDF/JPG/JPEG/PNG)</label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="ValidateSize(this)" value="" accept="image/jpeg,image/png,application/pdf" name="ServicePDF" />
</div>
</div>

<?php if (!empty($ServicePDF)){ ?>
<input type="hidden" name="ServicePDF1" value="<?php echo $ServicePDF ?>" />
<div class="alert alert-custom alert-danger mt-10" role="alert"> <div class="alert-icon"> <i class="fas fa-exclamation"></i> </div>
<div class="alert-text lead"> The document you originally uploaded is currently attached to this form. If you wish to upload a new document, please feel free to do so.</div>
</div>
<?php } ?>

</div>
<!--end::SFA Upload Document-->
</div>
<!--end::Hide Agent's SFA Details And Document Upload-->






</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="card border p-6" id="text2" style="display:<?php echo $text2 ?>">
<!--begin::Header-->
<div class="card-header" id="baf-heading5">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf5" aria-expanded="false" aria-controls="baf5" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Details</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf5" class="collapse" aria-labelledby="baf-heading5" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">Provide the details of the trip (except pricing) and any other pertinent details. You can also upload a PDF document containing all of the details.</p>
<!--begin::Row-->
<div class="row">
<!--begin::Supplier-->
<div class="col-xl-6">
<div class="form-group">
<label>Supplier</label>
<input name="Supplier" value="<?php echo $Supplier ?>" type="text" class="form-control  form-control-lg" placeholder="Supplier" />
</div>
</div>
<!--end::Supplier-->
<!--begin::Booking Number-->
<div class="col-xl-6">
<div class="form-group">
<label>Booking/Quote Number</label>
<input name="BookingNumber" value="<?php echo $BookingNumber ?>"  type="text" class="form-control  form-control-lg" placeholder="Booking/Quote Number" />
</div>
</div>
<!--end::Booking Number-->
</div>
<!--end::Row-->
<!--begin::Display Supplier-->
<div class="checkbox-list mb-10 text-dark font-weight-bold">
<label class="checkbox checkbox-outline checkbox-warning checkbox-lg checkbox-outline-2x">
<input type="checkbox" <?php echo $CheckSupplier ?> name="CheckSupplier" id="CheckSupplier" value="Yes">
<span></span>Display The Supplier And Booking/Quote Number To The Client.</label>
</div>
<!--end::Display Supplier-->
<!--begin::Trip Details Text-->
<div class="form-group">
<label>Trip Details</label>
<textarea class="form-control form-control-lg" rows="7" id="editor2" name="TripDetails" placeholder="Trip Details"><?php echo $TripDetails ?></textarea>
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
</div>
<!--end::Trip Details Text-->
<!--begin::Upload Trip Details-->
<div class="form-group">
<label>Upload Trip Details (PDF/JPG/JPEG/PNG)</label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="ValidateSize(this)" value="<?php echo $TripDetailsPDF ?>" accept="image/jpeg,image/png,application/pdf" name="TripDetailsPDF" id="TripDetailsPDF" />
</div>
</div>

<?php if (!empty($TripDetailsPDF)){ ?>
<input type="hidden" name="TripDetailsPDF1" value="<?php echo $TripDetailsPDF ?>" />
<div class="alert alert-custom alert-danger mt-10" role="alert"> <div class="alert-icon"> <i class="fas fa-exclamation"></i> </div>
<div class="alert-text lead">The document you originally uploaded is currently attached to this form. If you wish to upload a new document, please feel free to do so.</div>
</div>
<?php } ?>

</div>
<!--end::Upload Trip Details-->	
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="card border p-6" id="text3" style="display:<?php echo $text3 ?>">
<!--begin::Header-->
<div class="card-header" id="baf-heading6">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf6" aria-expanded="false" aria-controls="baf6" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Pricing & Payment Schedule</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf6" class="collapse" aria-labelledby="baf-heading6" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">Provide your client(s) with various trip pricing options or a final pricing if you have already quoted them. You can also set a payment schedule or ask for payment in full.</p>
<!--begin::Row-->
<div class="row">
<!--begin::Currency-->
<div class="col-xl-4">
<div class="form-group">
<label>Currency</label>
<select class="form-control form-control-lg" name="TripPricingCurrency" id="TripPricingCurrency">
<?php if (!empty($TripPricingCurrency)) { ?>
<option value="<?php echo $TripPricingCurrency ?>"><?php echo $TripPricingCurrency ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<option value="CAD">Canadian Dollar (CAD)</option>
<option value="USD">American Dollar (USD)</option>																	
</select>
</div>
</div>
<!--end::Currency-->
<!--begin::Number Of Pricing Options-->
<div class="col-xl-4">
<div class="form-group">
<label>Pricing Options</label>

<select class="form-control form-control-lg" name="TripPricingOptions" id="select" onchange="selectChanged()">

<?php if (!empty($TripPricingOptions)) { ?>
<option value="<?php echo $VTripPricingOptions ?>"><?php echo $TripPricingOptions ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>

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
<?php } else { ?>
<option value="">Select</option>	
<?php } ?>														
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
<!--begin::Pricing Sections And Totals-->
<div>
<!--begin::Pricing Option 1 Hidden With Separator-->
<div class="<?php echo $box1 ?>" id="box1">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Pricing Option 1-->
<div class="row">
<!--begin::Pricing Option 1 - Type Of Person-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="PricingType1">
<?php if (!empty($PricingType1)) { ?>
<option value="<?php echo $PricingType1 ?>" selected="selected"><?php echo $PricingType1 ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 1 - Type Of Person-->
<!--begin::Pricing Option 1 - Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input onChange="myFunction201()" value="<?php echo $NumberOfPersons1 ?>" name="nop1" id="nop1" type="text" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Pricing Option 1 - Number Of Persons-->
<!--begin::Pricing Option 1 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction201()" value="<?php echo $PricePerPerson1 ?>" name="ppp1" id="ppp1" type="text" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input name="tp1" id="tp1" value="<?php echo $TotalPrice1 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Total-->
<!--begin::Pricing Option 1 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="PricingDescription1" class="form-control form-control-lg" rows="2" placeholder="Room Type, Occupancy, Child's Age, Promotion, etc."><?php echo $PricingDescription1 ?></textarea>
</div>
</div>
<!--end::Pricing Option 1 - Description-->
</div>
<!--end::Row - Pricing Option 1-->
</div>
<!--end::Pricing Option 1 Hidden With Separator-->
<!--begin::Pricing Option 2 Hidden With Separator-->
<div class="<?php echo $box2 ?>" id="box2">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Pricing Option 2-->
<div class="row">
<!--begin::Pricing Option 2 - Type Of Person-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="PricingType2">
<?php if (!empty($PricingType2)) { ?>
<option value="<?php echo $PricingType2 ?>" selected="selected"><?php echo $PricingType2 ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 2 - Type Of Person-->
<!--begin::Pricing Option 2 - Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input onChange="myFunction202()" value="<?php echo $NumberOfPersons2 ?>" name="nop2" id="nop2" type="text" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Pricing Option 2 - Number Of Persons-->
<!--begin::Pricing Option 2 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction202()" value="<?php echo $PricePerPerson2 ?>" name="ppp2" id="ppp2" type="text" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Price PP-->
<!--begin::Pricing Option 2 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="tp2" name="tp2"  value="<?php echo $TotalPrice2 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Total-->
<!--begin::Pricing Option 2 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="PricingDescription2" class="form-control form-control-lg" rows="2" placeholder="Room Type, Occupancy, Child's Age, Promotion, etc."><?php echo $PricingDescription2 ?></textarea>
</div>
</div>
<!--end::Pricing Option 2 - Description-->
</div>
<!--end::Row - Pricing Option 2-->
</div>
<!--end::Pricing Option 2 Hidden With Separator-->
<!--begin::Pricing Option 3 Hidden With Separator-->
<div class="<?php echo $box3 ?>" id="box3">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Pricing Option 3-->
<div class="row">
<!--begin::Pricing Option 3 - Type Of Person-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="PricingType3">
<?php if (!empty($PricingType3)) { ?>
<option value="<?php echo $PricingType3 ?>" selected="selected"><?php echo $PricingType3 ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 3 - Type Of Person-->
<!--begin::Pricing Option 3 - Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input onChange="myFunction203()" value="<?php echo $NumberOfPersons3 ?>" name="nop3" id="nop3" type="text" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Pricing Option 3 - Number Of Persons-->
<!--begin::Pricing Option 3 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction203()" value="<?php echo $PricePerPerson3 ?>" name="ppp3" id="ppp3" type="text" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Price PP-->
<!--begin::Pricing Option 3 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="tp3" name="tp3" value="<?php echo $TotalPrice3 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		</div>
</div>
<!--end::Pricing Option 3 - Total-->
<!--begin::Pricing Option 3 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="PricingDescription3" class="form-control form-control-lg" rows="2" placeholder="Room Type, Occupancy, Child's Age, Promotion, etc."><?php echo $PricingDescription3 ?></textarea>
</div>
</div>
<!--end::Pricing Option 3 - Description-->
</div>
<!--end::Row - Pricing Option 3-->
</div>
<!--end::Pricing Option 3 Hidden With Separator-->
<!--begin::Pricing Option 4 Hidden With Separator-->
<div class="<?php echo $box4 ?>" id="box4">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Pricing Option 4-->
<div class="row">
<!--begin::Pricing Option 4 - Type Of Person-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="PricingType4">
<?php if (!empty($PricingType4)) { ?>
<option value="<?php echo $PricingType4 ?>" selected="selected"><?php echo $PricingType4 ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 4 - Type Of Person-->
<!--begin::Pricing Option 4 - Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input onChange="myFunction204()" value="<?php echo $NumberOfPersons4 ?>" name="nop4" id="nop4" type="text" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Pricing Option 4 - Number Of Persons-->
<!--begin::Pricing Option 4 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction204()" value="<?php echo $PricePerPerson4 ?>" name="ppp4" id="ppp4" type="text" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Price PP-->
<!--begin::Pricing Option 4 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input id="tp4" name="tp4" value="<?php echo $TotalPrice4 ?>" type="text" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Total-->
<!--begin::Pricing Option 4 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="PricingDescription4" class="form-control form-control-lg" rows="2" placeholder="Room Type, Occupancy, Child's Age, Promotion, etc."><?php echo $PricingDescription4 ?></textarea>
</div>
</div>
<!--end::Pricing Option 4 - Description-->
</div>
<!--end::Row - Pricing Option 4-->
</div>
<!--end::Pricing Option 4 Hidden With Separator-->
<!--begin::Pricing Option 5 Hidden With Separator-->
<div class="<?php echo $box5 ?>" id="box5">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Pricing Option 5-->
<div class="row">
<!--begin::Pricing Option 5 - Type Of Person-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="PricingType5">
<?php if (!empty($PricingType5)) { ?>
<option value="<?php echo $PricingType5 ?>" selected="selected"><?php echo $PricingType5 ?></option>
<?php } else { ?>
<option value="" selected="selected">Select</option>
<?php } ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 5 - Type Of Person-->
<!--begin::Pricing Option 5 - Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input onChange="myFunction205()" value="<?php echo $NumberOfPersons5 ?>" name="nop5" id="nop5" type="text" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Pricing Option 5 - Number Of Persons-->
<!--begin::Pricing Option 5 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction205()" value="<?php echo $PricePerPerson5 ?>" name="ppp5" id="ppp5" type="text" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Price PP-->
<!--begin::Pricing Option 5 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction207()" value="<?php echo $TotalPrice5 ?>" id="tp5" name="tp5" type="text" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Total-->
<!--begin::Pricing Option 5 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="PricingDescription5" class="form-control form-control-lg" rows="2" placeholder="Room Type, Occupancy, Child's Age, Promotion, etc."><?php echo $PricingDescription5 ?></textarea>
</div>
</div>
<!--end::Pricing Option 5 - Description-->
</div>
<!--end::Row - Pricing Option 5-->
</div>
<!--end::Pricing Option 5 Hidden With Separator-->
</div>
<!--end::Pricing Sections And Totals-->
<!--begin::Row - Full Payment-->
<div class="<?php echo $box20 ?>" id="box20">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<div class="row">
<div class="col-xl-12"><p class="mb-10 font-weight-bolder">Payment Schedule For Full Payment</p></div>
<!--begin::Full Payment - Payment Type-->
<div class="col-xl-6">
<div class="form-group">
<label>Payment Type</label>
<input type="text" class="form-control  form-control-lg bg-light" name="FullPayment" placeholder="Payment Type" value="Full Payment" readonly/>
</div>
</div>
<!--end::Full Payment - Payment Type-->
<!--begin::Full Payment - Due Date-->
<div class="col-xl-6">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input type="text" onChange="myFunction207()" value="<?php echo $FullPaymentDate ?>" name="FullPaymentDate" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Full Payment - Payment Type-->
</div>
</div>
<!--end::Row - Full Payment-->
<!--begin::Payment Schedule List-->
<div>
<!--begin::Row - Payment Schedule 1-->
<div class="<?php echo $box21 ?>" id="box21">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<div class="row">
<div class="col-xl-12"><p class="mb-10 font-weight-bolder">Payment Schedule For Multiple Payments</p></div>
<!--begin::Payment Schedule 1 - Payment Type-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Type</label>
<input type="text" class="form-control  form-control-lg bg-light" onChange="myFunction208()" name="PaymentType1" placeholder="Payment Type" value="Deposit" readonly/>
</div>
</div>
<!--end::Payment Schedule 1 - Payment Type-->
<!--begin::Payment Schedule 1 - Due Date-->
<div class="col-xl-4">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input name="PaymentDate1" value="<?php echo $PaymentDate1 ?>" type="text" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Payment Schedule 1 - Due Date-->
<!--begin::Payment Schedule 1 - Amount Due-->
<div class="col-xl-4">
<div class="form-group">
<label>Amount Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction209()" value="<?php echo $PaymentDue1 ?>" name="PaymentDue1" id="pdue1" type="text" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Payment Schedule 1 - Amount Due-->
</div>
</div>
<!--end::Row - Payment Schedule 1-->
<!--begin::Row - Payment Schedule 2-->
<div class="<?php echo $box22 ?>" id="box22">
<div class="row">
<!--begin::Payment Schedule 2 - Payment Type-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Type</label>
<input type="text" class="form-control  form-control-lg bg-light" onChange="myFunction209()" name="PaymentType2" placeholder="Payment Type" value="Payment 1" readonly/>
</div>
</div>
<!--end::Payment Schedule 2 - Payment Type-->
<!--begin::Payment Schedule 2 - Due Date-->
<div class="col-xl-4">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input name="PaymentDate2" value="<?php echo $PaymentDate2 ?>" type="text" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Payment Schedule 2 - Due Date-->
<!--begin::Payment Schedule 2 - Amount Due-->
<div class="col-xl-4">
<div class="form-group">
<label>Amount Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction210()" value="<?php echo $PaymentDue2 ?>" name="PaymentDue2" id="pdue2" type="text" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Payment Schedule 2 - Amount Due-->
</div>
</div>
<!--end::Row - Payment Schedule 2-->
<!--begin::Row - Payment Schedule 3-->
<div class="<?php echo $box23 ?>" id="box23">
<div class="row">
<!--begin::Payment Schedule 3 - Payment Type-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Type</label>
<input type="text" class="form-control  form-control-lg bg-light" onChange="myFunction210()" name="PaymentType3" placeholder="Payment Type" value="Payment 2" readonly/>
</div>
</div>
<!--end::Payment Schedule 3 - Payment Type-->
<!--begin::Payment Schedule 3 - Due Date-->
<div class="col-xl-4">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input name="PaymentDate3" value="<?php echo $PaymentDate3 ?>" type="text" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Payment Schedule 3 - Due Date-->
<!--begin::Payment Schedule 3 - Amount Due-->
<div class="col-xl-4">
<div class="form-group">
<label>Amount Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction211()" value="<?php echo $PaymentDue3 ?>" name="PaymentDue3" id="pdue3" type="text" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Payment Schedule 3 - Amount Due-->
</div>
</div>
<!--end::Row - Payment Schedule 3-->
<!--begin::Row - Payment Schedule 4-->
<div class="<?php echo $box24 ?>" id="box24">
<div class="row">
<!--begin::Payment Schedule 4 - Payment Type-->
<div class="col-xl-4">
<div class="form-group">
<label>Payment Type</label>
<input type="text" class="form-control  form-control-lg bg-light" onChange="myFunction211()" name="PaymentType4" placeholder="Payment Type" value="Payment 3" readonly/>
</div>
</div>
<!--end::Payment Schedule 4 - Payment Type-->
<!--begin::Payment Schedule 4 - Due Date-->
<div class="col-xl-4">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input name="PaymentDate4" value="<?php echo $PaymentDate4 ?>" type="text" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Payment Schedule 4 - Due Date-->
<!--begin::Payment Schedule 4 - Amount Due-->
<div class="col-xl-4">
<div class="form-group">
<label>Amount Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input onChange="myFunction212()" value="<?php echo $PaymentDue4 ?>" name="PaymentDue4" id="pdue4" type="text" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Payment Schedule 4 - Amount Due-->
</div>
</div>
<!--end::Row - Payment Schedule 4-->
<!--begin::Row - Payment Schedule 5-->
<div class="<?php echo $box25 ?>" id="box25">
<div class="row">
<!--begin::Payment Schedule 5 - Payment Type-->
<div class="col-xl-6">
<div class="form-group">
<label>Payment Type</label>
<input type="text" class="form-control  form-control-lg bg-light" onChange="myFunction212()" name="PaymentType5" placeholder="Payment Type" value="Final Payment" readonly/>
</div>
</div>
<!--end::Payment Schedule 5 - Payment Type-->
<!--begin::Payment Schedule 5 - Due Date-->
<div class="col-xl-6">
<div class="form-group">
<label>Due Date (M/D/Y)</label>
<input name="PaymentDate5" value="<?php echo $PaymentDate5 ?>" type="text" class="form-control form-control-lg" id="kt_datepicker_1" placeholder="Select Date" readonly>
</div>
</div>
<!--end::Payment Schedule 5 - Due Date-->
</div>
<!--begin::Final Payment Text-->
<div class="alert alert-custom alert-danger mb-5 mt-5" role="alert">													<div class="alert-icon">										<i class="fas fa-exclamation"></i>							</div>
<div class="alert-text lead">The balance amount for the final payment will be calculated once your client selects their pricing option(s).</div>
</div>
<!--end::Final Payment Text-->
</div>
<!--end::Row - Payment Schedule 5-->
</div>
<!--end::Payment Schedule List-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="card border p-6" id="text4" style="display:<?php echo $text4 ?>">
<!--begin::Header-->
<div class="card-header" id="baf-heading7">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf7" aria-expanded="false" aria-controls="baf7" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Terms & Conditions (T&amp;C)</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf7" class="collapse" aria-labelledby="baf-heading7" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">Select either Centre Holidays' T&amp;Cs based on the product you are booking or provide your own custom T&amp;Cs. If your T&amp;Cs are in a PDF document, you can upload it.</p>
<div class="row">
<!--begin::Terms Document Options-->
<div class="col-xl-12">
<div class="form-group">
<label>Terms & Conditions Type</label>
<select class="form-control  form-control-lg" name="TermsType" id="select90" onChange="selectChanged90()">
<?php if (!empty($TermsType)) { ?>
<option value="<?php echo $TermsTypeValue ?>"><?php echo $TermsType ?></option>
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
<!--begin::CH T&C Important Details-->
<div class="<?php echo $box91 ?> col-xl-12" id="box91">
<div class="card card-custom card-border bg-light mb-7">
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
<!--begin::Trip Terms Text-->
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
<input type="file" value="<?php echo $TermsAndConditionsPDF ?>" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="TermsAndConditionsPDF" />
</div>
</div>

<?php if (!empty($TermsAndConditionsPDF)){ ?>
<input type="hidden" name="TermsAndConditionsPDF1" value="<?php echo $TermsAndConditionsPDF ?>" />
<div class="alert alert-custom alert-danger mt-10" role="alert"> <div class="alert-icon"> <i class="fas fa-exclamation"></i> </div>
<div class="alert-text lead">The document you originally uploaded is currently attached to this form. If you wish to upload a new document, please feel free to do so.</div>
</div>
<?php } ?>

</div>
</div>
</div>
<!--end::Upload Terms Document-->
</div>
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="card border p-6" id="text5" style="display:<?php echo $text5 ?>">
<!--begin::Header-->
<div class="card-header" id="baf-heading8">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf8" aria-expanded="false" aria-controls="baf8" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Trip Cancellation Policy</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf8" class="collapse" aria-labelledby="baf-heading8" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">Provide the cancellation policy for the trip or if the information is in a PDF document, you can upload it.</p>
<!--begin::Cancellation Policy Text-->
<div class="form-group">
<label>Cancellation Policy</label>
<textarea class="form-control form-control-lg" id="editor4" name="CancellationPolicy" rows="10" placeholder="Cancellation Policy"><?php echo $CancellationPolicy ?></textarea>
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
        
</div>
<!--end::Cancellation Policy Text-->
<!--begin::Upload Cancellation Policy Document-->
<div class="form-group">
<label>Upload Cancellation Policy (PDF/JPG/JPEG/PNG)</label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" value="<?php echo $CancellationPolicyPDF ?>" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" id="CancellationPolicyPDF" name="CancellationPolicyPDF" />
</div>
</div>
</div>

<?php if (!empty($CancellationPolicyPDF)){ ?>
<input type="hidden" name="CancellationPolicyPDF1" value="<?php echo $CancellationPolicyPDF ?>" />
<div class="alert alert-custom alert-danger mt-10" role="alert"> <div class="alert-icon"> <i class="fas fa-exclamation"></i> </div>
<div class="alert-text lead">The document you originally uploaded is currently attached to this form. If you wish to upload a new document, please feel free to do so.</div>
</div>
<?php } ?>

<!--end::Upload Cancellation Policy Document-->	
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="card border p-6" id="text6" style="display:<?php echo $text6 ?>">
<!--begin::Header-->
<div class="card-header" id="baf-heading9">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf9" aria-expanded="false" aria-controls="baf9" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Travel Insurance</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf9" class="collapse" aria-labelledby="baf-heading9" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">If you are permitted to sell travel insurance, provide your client(s) with various travel insurance pricing options. If you have additional travel insurance information in a PDF document, you can upload it.</p>
<!--begin::Row-->
<div class="row">
<div class="col-xl-4">
<!--begin::Input-->
<div class="form-group">
<label>Insurance Provider</label>
<select class="form-control  form-control-lg" name="InsuranceProvider" id="InsuranceProvider">
<?php if (!empty($InsuranceProvider)) { ?>
<option value="<?php echo $InsuranceProvider ?>"><?php echo $InsuranceProvider ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
																		
<option value="Blue Cross">Blue Cross</option>
<option value="Manulife">Manulife</option>
<option value="Other">Other</option>
</select>
</div>
<!--end::Input-->
</div>
<div class="col-xl-4">
<!--begin::Input-->
<div class="form-group">
<label>Currency</label>
<select class="form-control form-control-lg" name="InsuranceCurrency" id="InsuranceCurrency">
<?php if (!empty($InsuranceCurrency)) { ?>
<option value="<?php echo $InsuranceCurrency ?>"><?php echo $InsuranceCurrency ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<option value="CAD">Canadian Dollar (CAD)</option>
<option value="USD">American Dollar (USD)</option>																	
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
</div>
<!--end::Row-->
<!--begin::Pricing Option 1 Hidden With Separator-->
<div class="<?php echo $box31 ?>" id="box31">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Pricing Option 1-->
<div class="row">
<!--begin::Pricing Option 1 - Type Of Person-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="InsurancePersonType1">

<?php if (!empty($InsurancePersonType1)) { ?>
<option value="<?php echo $InsurancePersonType1 ?>"><?php echo $InsurancePersonType1 ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>

<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 1 - Type Of Person-->
<!--begin::Pricing Option 1 - Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input id="inop1" value="<?php echo $InsuranceNumberPersons1 ?>" onChange="myFunction601()" type="text" name="InsuranceNumberPersons1" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Pricing Option 1 - Number Of Persons-->
<!--begin::Pricing Option 1 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input type="text" value="<?php echo $InsurancePricePerPerson1 ?>" onChange="myFunction601()" id="ipp1" name="InsurancePricePerPerson1" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Price PP-->
<!--begin::Pricing Option 1 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input type="text" id="ito1" value="<?php echo $InsuranceTotalPrice1 ?>" name="InsuranceTotalPrice1" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Pricing Option 1 - Total-->
<!--begin::Pricing Option 1 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="InsuranceDescription1" class="form-control form-control-lg" rows="2" placeholder="Travel Insurance Plan"><?php echo $InsuranceDescription1 ?></textarea>
</div>
</div>
<!--end::Pricing Option 1 - Description-->
</div>
<!--end::Row - Pricing Option 1-->
</div>
<!--end::Pricing Option 1 Hidden With Separator-->
<!--begin::Pricing Option 2 Hidden With Separator-->
<div class="<?php echo $box32 ?>" id="box32">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Pricing Option 2-->
<div class="row">
<!--begin::Pricing Option 2 - Type Of Person-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="InsurancePersonType2">
<?php if (!empty($InsurancePersonType2)) { ?>
<option value="<?php echo $InsurancePersonType2 ?>"><?php echo $InsurancePersonType2 ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 2 - Type Of Person-->
<!--begin::Pricing Option 2 - Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input  id="inop2" value="<?php echo $InsuranceNumberPersons2 ?>" onChange="myFunction602()" type="text" name="InsuranceNumberPersons2" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Pricing Option 2 - Number Of Persons-->
<!--begin::Pricing Option 2 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input type="text" id="ipp2" value="<?php echo $InsurancePricePerPerson2 ?>" onChange="myFunction602()" name="InsurancePricePerPerson2" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Price PP-->
<!--begin::Pricing Option 2 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input type="text" id="ito2" value="<?php echo $InsuranceTotalPrice2 ?>" name="InsuranceTotalPrice2" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Pricing Option 2 - Total-->
<!--begin::Pricing Option 2 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="InsuranceDescription2" class="form-control form-control-lg" rows="2" placeholder="Travel Insurance Plan"><?php echo $InsuranceDescription2 ?></textarea>
</div>
</div>
<!--end::Pricing Option 2 - Description-->
</div>
<!--end::Row - Pricing Option 2-->
</div>
<!--end::Pricing Option 2 Hidden With Separator-->
<!--begin::Pricing Option 3 Hidden With Separator-->
<div class="<?php echo $box33 ?>" id="box33">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Pricing Option 3-->
<div class="row">
<!--begin::Pricing Option 3 - Type Of Person-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="InsurancePersonType3">
<?php if (!empty($InsurancePersonType3)) { ?>
<option value="<?php echo $InsurancePersonType3 ?>"><?php echo $InsurancePersonType3 ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 3 - Type Of Person-->
<!--begin::Pricing Option 3 - Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" value="<?php echo $InsuranceNumberPersons3 ?>" id="inop3" onChange="myFunction603()" name="InsuranceNumberPersons3" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Pricing Option 3 - Number Of Persons-->
<!--begin::Pricing Option 3 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input type="text" id="ipp3" value="<?php echo $InsurancePricePerPerson3 ?>" onChange="myFunction603()" name="InsurancePricePerPerson3" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Price PP-->
<!--begin::Pricing Option 3 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input type="text" id="ito3" value="<?php echo $InsuranceTotalPrice3 ?>" name="InsuranceTotalPrice3" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Pricing Option 3 - Total-->
<!--begin::Pricing Option 3 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="InsuranceDescription3" class="form-control form-control-lg" rows="2" placeholder="Travel Insurance Plan"><?php echo $InsuranceDescription3 ?></textarea>
</div>
</div>
<!--end::Pricing Option 3 - Description-->
</div>
<!--end::Row - Pricing Option 3-->
</div>
<!--end::Pricing Option 3 Hidden With Separator-->
<!--begin::Pricing Option 4 Hidden With Separator-->
<div class="<?php echo $box34 ?>" id="box34">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Pricing Option 4-->
<div class="row">
<!--begin::Pricing Option 4 - Type Of Person-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="InsurancePersonType4">
<?php if (!empty($InsurancePersonType4)) { ?>
<option value="<?php echo $InsurancePersonType4 ?>"><?php echo $InsurancePersonType4 ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 4 - Type Of Person-->
<!--begin::Pricing Option 4 - Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text" value="<?php echo $InsuranceNumberPersons4 ?>" id="inop4" onChange="myFunction604()" name="InsuranceNumberPersons4" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Pricing Option 4 - Number Of Persons-->
<!--begin::Pricing Option 4 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input type="text" value="<?php echo $InsurancePricePerPerson4 ?>" id="ipp4" onChange="myFunction604()" name="InsurancePricePerPerson4" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Price PP-->
<!--begin::Pricing Option 4 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input type="text" id="ito4" value="<?php echo $InsuranceTotalPrice4 ?>" name="InsuranceTotalPrice4" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Pricing Option 4 - Total-->
<!--begin::Pricing Option 4 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="InsuranceDescription4" class="form-control form-control-lg" rows="2" placeholder="Travel Insurance Plan"><?php echo $InsuranceDescription4 ?></textarea>
</div>
</div>
<!--end::Pricing Option 4 - Description-->
</div>
<!--end::Row - Pricing Option 4-->
</div>
<!--end::Pricing Option 4 Hidden With Separator-->
<!--begin::Pricing Option 5 Hidden With Separator-->
<div class="<?php echo $box35 ?>" id="box35">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Pricing Option 5-->
<div class="row">
<!--begin::Pricing Option 5 - Type Of Person-->
<div class="col-xl-3">
<div class="form-group">
<label>Type Of Person</label>
<select class="form-control form-control-lg" name="InsurancePersonType5">
<?php if (!empty($InsurancePersonType5)) { ?>
<option value="<?php echo $InsurancePersonType5 ?>"><?php echo $InsurancePersonType5 ?></option>
<?php } else { ?>
<option value="">Select</option>
<?php } ?>
<option value="Adult">Adult</option>
<option value="Child">Child</option>
<option value="Infant">Infant</option>
<option value="Senior">Senior</option>																
</select>
</div>
</div>
<!--end::Pricing Option 5 - Type Of Person-->
<!--begin::Pricing Option 5 - Number Of Persons-->
<div class="col-xl-3">
<div class="form-group">
<label>Number Of Persons</label>
<input type="text"  id="inop5" value="<?php echo $InsuranceNumberPersons5 ?>" onChange="myFunction605()" name="InsuranceNumberPersons5" class="form-control  form-control-lg" placeholder="Number Of Persons" />
</div>
</div>
<!--end::Pricing Option 5 - Number Of Persons-->
<!--begin::Pricing Option 5 - Price PP-->
<div class="col-xl-3">
<div class="form-group">
<label>Price Per Person (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input type="text" value="<?php echo $InsurancePricePerPerson5 ?>" id="ipp5" onChange="myFunction605()" name="InsurancePricePerPerson5" class="form-control form-control-lg" placeholder="Amount">
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Price PP-->
<!--begin::Pricing Option 5 - Total-->
<div class="col-xl-3">
<div class="form-group">
<label>Total (Tax Included)</label>
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">$</span>
</div>
<input type="text" id="ito5" value="<?php echo $InsuranceTotalPrice5 ?>" name="InsuranceTotalPrice5" class="form-control form-control-lg bg-light-success" placeholder="Amount" readonly>
</div>																		
</div>
</div>
<!--end::Pricing Option 5 - Total-->
<!--begin::Pricing Option 5 - Description-->
<div class="col-xl-12">
<div class="form-group">
<label>Description</label>
<textarea name="InsuranceDescription5" class="form-control form-control-lg" rows="2" placeholder="Travel Insurance Plan"><?php echo $InsuranceDescription5 ?></textarea>
</div>
</div>
<!--end::Pricing Option 5 - Description-->
</div>
<!--end::Row - Pricing Option 5-->
</div>
<!--end::Pricing Option 5 Hidden With Separator-->
<!--begin::Upload Travel Insurance Document-->
<div class="form-group">
<label>Upload Insurance Document (PDF/JPG/JPEG/PNG)</label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<!--<h3 class="dropzone-msg-title">Drop PDF File Here Or Click To Upload</h3>-->
<input type="file" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="InsurancePDF" />
</div>
</div>

<?php if (!empty($InsurancePDF)){ ?>
<input type="hidden" name="InsurancePDF1" value="<?php echo $InsurancePDF ?>" />
<div class="alert alert-custom alert-danger mt-10" role="alert"> <div class="alert-icon"> <i class="fas fa-exclamation"></i> </div>
<div class="alert-text lead">The document you originally uploaded is currently attached to this form. If you wish to upload a new document, please feel free to do so.</div>
</div>
<?php } ?>

</div>
<!--end::Upload Travel Insurance Document-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
<!--begin::Item-->
<div class="card border p-6" id="text7" style="display:<?php echo $text7 ?>">
<!--begin::Header-->
<div class="card-header" id="baf-heading10">
<div class="card-title font-size-h2 font-weight-bolder text-warning collapsed" data-toggle="collapse" data-target="#baf10" aria-expanded="false" aria-controls="baf10" role="button">
<div class="card-label font-size-h2 font-weight-boldest text-uppercase text-warning">Additional Documents &amp; URLs</div>
</div>
</div>
<!--end::Header-->
<!--begin::Body-->
<div id="baf10" class="collapse" aria-labelledby="baf-heading10" data-parent="">
<div class="card-body lead pb-0 pt-3">
<p class="mb-10 font-weight-bolder">Provide additional documents you would like your client(s) to have or send them to a URL (website) if you would like them to review any additional information (suppliers' policies, COVID-19 information, resort information, excursions, etc.).</p>
<!--begin::Document & URL Options-->
<div class="form-group">
<label>Document & URL Options</label>
<select class="form-control form-control-lg" id="select5" onchange="selectChanged5()">
<?php if (!empty($Documentoptions)) { ?>
<option value="<?php echo $DocumentoptionsValue ?>"><?php echo $Documentoptions ?></option>	
<?php } else { ?>
<option value="">Select</option>
<?php }  ?>
<option value="41">1 Document & URL Option</option>																		
<option value="42">2 Document & URL Options</option>
<option value="43">3 Document & URL Options</option>
</select>
</div>
<!--end::Document & URL Options-->
<!--begin::Document Url Option 1 Hidden With Separator-->
<div class="<?php echo $box41 ?>" id="box41">
<!--begin::Separator-->
<div class="separator separator-dashed mt-12 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Document URL Option 1-->
<div class="row">
<!--begin::Document URL Option 1 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type</label>
<select class="form-control form-control-lg" id="select50" onchange="selectChanged50()" name="AdditionalType1">
<?php if (!empty($AdditionalTitle1)) { ?>
<option value="<?php echo $Doc1typeValue1 ?>"><?php echo $Doc1type1 ?></option>	
<?php } else { ?>
<option value="">Select</option>	
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
<input type="text" value="<?php echo $AdditionalTitle1 ?>" name="AdditionalTitle1" id="AdditionalTitle1" class="form-control  form-control-lg" placeholder="Title" />
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
<input type="file" value="<?php echo $AdditionalPDF1 ?>" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="AdditionalPDF1" id="AdditionalPDF1" /> 
</div>
</div>
</div>

<?php if (!empty($AdditionalPDF1)){ ?>
<input type="hidden" name="AdditionalPDF11" value="<?php echo $AdditionalPDF1 ?>" />
<div class="alert alert-custom alert-danger mt-10" role="alert"> <div class="alert-icon"> <i class="fas fa-exclamation"></i> </div>
<div class="alert-text lead">The document you originally uploaded is currently attached to this form. If you wish to upload a new document, please feel free to do so.</div>
</div>
<?php } ?>

</div>
<!--end::Document URL Option 1 - Upload Document-->
</div>
<!--end::Row - Document URL Option 1-->
</div>
<!--end::Document Url Option 1 Hidden With Separator-->
<!--begin::Document Url Option 2 Hidden With Separator-->
<div class="<?php echo $box42 ?>" id="box42">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Document URL Option 2-->
<div class="row">
<!--begin::Document URL Option 2 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type</label>
<select class="form-control form-control-lg" id="select60" onchange="selectChanged60()" name="AdditionalType2">
<?php if (!empty($AdditionalTitle2)) { ?>
<option value="<?php echo $Doc1typeValue2 ?>"><?php echo $Doc1type2 ?></option>	
<?php } else { ?>
<option value="">Select</option>	
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
<input type="text" value="<?php echo $AdditionalTitle2 ?>" name="AdditionalTitle2" class="form-control  form-control-lg" placeholder="Title" />
</div>
</div>
<!--end::Document URL Option 2 - Title-->
<!--begin::Document URL Option 2 - URL-->
<div class="col-xl-12 <?php echo $box61 ?>" id="box61">
<div class="form-group">
<label>URL (Website Address)</label>
<input type="text" value="<?php echo $AdditionalURL2 ?>" name="AdditionalURL2" class="form-control  form-control-lg" placeholder="URL (Website Address)" />
</div>
</div>
<!--end::Document URL Option 2 - URL-->
<!--begin::Document URL Option 2 - Upload Document-->
<div class="col-xl-12 <?php echo $box62 ?>" id="box62">
<div class="form-group">
<label>Upload Document (PDF/JPG/JPEG/PNG)</label>
<div class="dropzone dropzone-default dropzone-warning">
<div class="dropzone-msg dz-message needsclick">
<input type="file" onchange="ValidateSize(this)" value="<?php echo $AdditionalPDF2 ?>" accept="image/jpeg,image/png,application/pdf" name="AdditionalPDF2" /> 
</div>
</div>
</div>

<?php if (!empty($AdditionalPDF2)){ ?>
<input type="hidden" name="AdditionalPDF21" value="<?php echo $AdditionalPDF2 ?>" />
<div class="alert alert-custom alert-danger mt-10" role="alert"> <div class="alert-icon"> <i class="fas fa-exclamation"></i> </div>
<div class="alert-text lead">The document you originally uploaded is currently attached to this form. If you wish to upload a new document, please feel free to do so.</div>
</div>
<?php } ?>


</div>
<!--end::Document URL Option 2 - Upload Document-->
</div>
<!--end::Row - Document URL Option 2-->
</div>
<!--end::Document Url Option 2 Hidden With Separator-->
<!--begin::Document Url Option 3 Hidden With Separator-->
<div class="<?php echo $box43 ?>" id="box43">
<!--begin::Separator-->
<div class="separator separator-dashed mt-5 mb-10 separator-border-3"></div>
<!--end::Separator-->
<!--begin::Row - Document URL Option 3-->
<div class="row">
<!--begin::Document URL Option 3 - Type-->
<div class="col-xl-3">
<div class="form-group">
<label>Type</label>
<select class="form-control form-control-lg" id="select70" onchange="selectChanged70()" name="AdditionalType3">
<?php if (!empty($AdditionalTitle3)) { ?>
<option value="<?php echo $Doc1typeValue3 ?>"><?php echo $Doc1type3 ?></option>	
<?php } else { ?>
<option value="">Select</option>	
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
<input type="file" value="<?php echo $AdditionalPDF3 ?>" onchange="ValidateSize(this)" accept="image/jpeg,image/png,application/pdf" name="AdditionalPDF3" /> 
</div>
</div>
</div>

<?php if (!empty($AdditionalPDF3)){ ?>
<input type="hidden" name="AdditionalPDF31" value="<?php echo $AdditionalPDF3 ?>" />
<div class="alert alert-custom alert-danger mt-10" role="alert"> <div class="alert-icon"> <i class="fas fa-exclamation"></i> </div>
<div class="alert-text lead">The document you originally uploaded is currently attached to this form. If you wish to upload a new document, please feel free to do so.</div>
</div>
<?php } ?>

</div>
<!--end::Document URL Option 3 - Upload Document-->
</div>
<!--end::Row - Document URL Option 3-->
</div>
<!--end::Document Url Option 3 Hidden With Separator-->
</div>
</div>
<!--end::Body-->
</div>
<!--end::Item-->
			</div>
<!--end::Booking Authorization Form Accordion-->
</div>
<div class="col-xl-12 d-flex flex-center">


<!--JAVASCRIPT TO FORCE SELECTION--->
<!--JAVASCRIPT TO FORCE SELECTION--->
<!--JAVASCRIPT TO FORCE SELECTION--->
<script>
function myFunction1968(){	
//======================OPTION TO SELECT=======================================
 if ((document.getElementById('myCheck1').checked == false) 
	&& (document.getElementById('myCheck2').checked == false)
	&& (document.getElementById('myCheck3').checked == false)
	&& (document.getElementById('myCheck4').checked == false)
	&& (document.getElementById('myCheck5').checked == false)
	&& (document.getElementById('myCheck6').checked == false)
	&& (document.getElementById('myCheck7').checked == false)
 )	{
    Swal.fire("Section Selector", "Please Select At Least One Checkbox.");
	return false;
}
//===================EMAIL FROM============================================================

    var e=document.getElementById("BusinessPhone").value;//Swal.fire(e);
    if(e===""){
        Swal.fire("Email From", "Please Select A Phone Number.");
        return false;	
    }
    var e=document.getElementById("BusinessEmail").value;//Swal.fire(e);
    if(e===""){
        Swal.fire("Email From", "Please Select An Email Address.");
        return false;	
    }
	
//=================EMAIL TOP TYPE=============================================================

    var e=document.getElementById("select80").value;//Swal.fire(e);
    if(e===""){
        Swal.fire("Email To", "Please Select An Email Type.");
        return false;	
    }
	
//===================EMAIL TO==========================================================

    var e=document.getElementById("select80").value;//Swal.fire(e);
    if((e==="81") && (document.getElementById("EmaiToFullName1").value.length == 0)){
        Swal.fire("Email To", "Please Fill In Your Client's Full Name.");
        return false;	
    }
    if((e==="81") && (document.getElementById("EmaiToEmail1").value.length == 0)){
        Swal.fire("Email To", "Please Fill In Your Client's Email.");
        return false;	
    }		
	 if((e==="82") && (document.getElementById("EmaiToFullName2").value.length == 0)){
        Swal.fire("Email To", "Please Fill In The Group Or Trip Name.");
        return false;	
    }
	 if((e==="82") && (document.getElementById("EmaiToEmail2").value.length == 0)){
        Swal.fire("Email To", "Please Fill In The Primary Client's Email.");
        return false;	
    }
	 if((e==="82") && (document.getElementById("EmailToBCC").value.length == 0)){
        Swal.fire("Email To", "Please Fill In All Other Additional Emails.");
        return false;	
    }		


//=================================TYPE OF SFA============================================
var e1=document.getElementById("select2").value;//Select Type
    if(e1==="" && (document.getElementById('myCheck1').checked == true)){
        Swal.fire("Service Fee Agreement", "Please Select A Type Of Service Fee Agreement.");
        return false;	
    }
	
//=================================SFA CURRENCY============================================
var e2=document.getElementById("ServiceCurrency").value;//ServiceCurrency
    if(e2==="" && (document.getElementById('myCheck1').checked == true)){
        Swal.fire("Service Fee Agreement", "Please Select A Currency.");
        return false;	
    }
	
//======TRIP DETAILS=//trip details text area====//Trip Details PDF====================
/*var e3=document.getElementById("editor2").value;
var e4=document.getElementById("TripDetailsPDF").value;
    if((document.getElementById('myCheck2').checked == true)){
		
		if((e3==="") && (e4==="")){
        Swal.fire("Trip Details: Either the textarea needs to be filled in or a document uploaded.");
        return false;	
		
		}
    }*/
	
//=================================TRIP CURRENCY============================================
var e5=document.getElementById("TripPricingCurrency").value;//TripPricingCurrency
    if(e5==="" && (document.getElementById('myCheck3').checked == true)){
        Swal.fire("Trip Pricing", "Please Select A Currency.");
        return false;	
    }
	
//=================================TRIP PRICING=================================
var e6=document.getElementById("select").value;//Pricing Options
    if((e6==="") && (document.getElementById('myCheck3').checked == true)){
        Swal.fire("Trip Pricing", "Please Select A Pricing Option.");
        return false;	
    }
	
//=================================TRIP SCHEDULE=================================
var e7=document.getElementById("select3").value;//Payment Schedule 
    if((e7==="") && (document.getElementById('myCheck3').checked == true)){
        Swal.fire("Trip Schedule", "Please Select A Schedule Option.");
        return false;	
    }			

//=================================TRIP TERMS=================================
var e8=document.getElementById("select90").value;//Terms & Conditions Document Type
    if((e8==="") && (document.getElementById('myCheck4').checked == true)){
        Swal.fire("Trip Terms & Conditions", "Please Select A Terms & Conditions Document Type.");
        return false;	
    }		
	
//=================================TRIP CANCELLATION=================================
/*var e9=document.getElementById("editor4").value;//textarea 
var e10=document.getElementById("CancellationPolicyPDF").value;
    if((e9==="" && e10==="") && (document.getElementById('myCheck5').checked == true)){
        Swal.fire("Trip Cancellation: Either the textarea needs to be filled in or a document uploaded.");
        return false;
    }		
	*/

//=================================INSURANCE PRICING AND SCHEDULE=================================
var e13=document.getElementById("InsuranceProvider").value;//Provider
    if((e13==="") && (document.getElementById('myCheck6').checked == true)){
        Swal.fire("Insurance Provider","Please Select An Insurance Provider.");
        return false;	
    }

var e14=document.getElementById("InsuranceCurrency").value;//Currency
    if((e14==="") && (document.getElementById('myCheck6').checked == true)){
        Swal.fire("Insurance Currency","Please Select An Insurance Currency.");
        return false;	
    }
	

var e15=document.getElementById("select4").value;//Pricing Option
    if((e15==="") && (document.getElementById('myCheck6').checked == true)){
        Swal.fire("Insurance Pricing","Please Select An Insurance Pricing.");
        return false;	
    }	

//==============================ADDITIONAL DOCUMENTS===============================================
var e17=document.getElementById("select5").value;//Document & URL Options
    if((e17==="") && (document.getElementById('myCheck7').checked == true)){
        Swal.fire("Additional Documents & URLS","Please Select A Document & URL Option.");
        return false;	
    }
	
//==============================FIRST DOCUMNETS===============================================
    var e18=document.getElementById("select5").value;//Document & URL Options
	var e50=document.getElementById("select50").value;//Swal.fire(e);
	var e70=document.getElementById("AdditionalTitle1").value;//AdditionalTitle1
	var e71=document.getElementById("AdditionalURL1").value;//AdditionalURL1
	var e72=document.getElementById("AdditionalPDF1").value;//AdditionalPDF1
	if((e18==="41") && (document.getElementById('myCheck7').checked == true)){
		
    if(e50===""){
        Swal.fire("First Additional Documents & Urls: Type Options need to be selected.");
        return false;	
    	}
    if(e50==="51" && (e70==="" || e71==="")){
        Swal.fire("First Additional Documents & Urls: TITLE and Website address need to be filled in.");
        return false;	
    	}
   if(e50==="51" && (e70==="" || e72==="")){
        Swal.fire("First Additional Documents & Urls: TITLE and Document need to be uploaded.");
        return false;	
    	}				
	
		var x = document.getElementById("HiddenDiv");
		x.style.display = "block";
		return false;
	
	}
	
}
</script>

<!--END JAVASCRIPT TO FORCE SELECTION--->
<!--END JAVASCRIPT TO FORCE SELECTION--->
<!--END JAVASCRIPT TO FORCE SELECTION--->


<input type="submit" value="Send Email Form"  onclick="return myFunction1968()" class="btn btn-warning font-weight-bolder px-7 py-5 text-uppercase btn-lg mt-5" id="" title="Send Email Form" />
</div>
</div>
<!--<script>
function DisplayFunction() {
  var x = document.getElementById("HiddenDiv");
    x.style.display = "block";
	return false;
}
</script>-->
<div class="row justify-content-center mb-10">
<div class="col-md-11">
<div class="spinner spinner-danger spinner-right" style="display:none" id="HiddenDiv">
<input class="form-control bg-light-danger font-weight-bolder h5 text-danger" value="Please Wait While Your Document(s) Upload. Do Not Close This Window!" readonly/>
</div>
</div>
</div>
</form>
<!--begin::Footer Infoboxes-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer-infoboxes.php');?>
<!--end::Footer Infoboxes-->
</div>
<!--end::Section-->
				</div>
				<!--end::Content-->
                <?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer.php');?>
							</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
<!--end::Main-->
<!--begin::Sticky Toolbar-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/sticky-toolbar-booking-authorization-email-form.php');?>
<!--end::Sticky Toolbar-->
<!--begin::Global Theme Bundle(used by all pages)-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/agents/ssi/footer-scripts.php');?>
<!--end::Global Theme Bundle-->
            </body>
    <!--end::Body-->
</html>