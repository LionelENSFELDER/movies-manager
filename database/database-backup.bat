SET JOUR=%date:~-10,2%
SET ANNEE=%date:~-4%
SET MOIS=%date:~-7,2%
SET HEURE=%time:~0,2%
SET MINUTE=%time:~3,2%
SET REPERTOIR=F:\UwAmp\www\movies\database
SET FICHIER=%REPERTOIR%\Sauvegarde_du_%JOUR%_%MOIS%_%ANNEE%_A_%HEURE%_%MINUTE%.sql
IF NOT exist "%REPERTOIR%" md "%REPERTOIR%"
F:\UwAmp\bin\database\mysql-5.7.11\bin\mysqldump -u root -p movies -h localhost  > %FICHIER%