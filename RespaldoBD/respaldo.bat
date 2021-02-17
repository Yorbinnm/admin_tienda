
@echo off
set ano=%date:~-4,4%
set mes=%date:~-7,2%
set dia=%date:~-10,2%
set hora=%time:~0,2%
set min=%time:~3,2%
set seg=%time:~6,2%
C:\xampp\mysql\bin\mysqldump.exe -hlocalhost -uroot -pLemuria2018 lemuria > C:\xampp\htdocs\Lemuria\RespaldoBD\RespaldoBD_DIA(%dia%-%mes%-%ano%).sql

