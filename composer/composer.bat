@ECHO OFF 
SET SUBDIR=%~dp0
php %SUBDIR%composer.phar %* 
