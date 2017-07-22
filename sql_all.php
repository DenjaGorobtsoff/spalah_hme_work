<?php
SELECT * FROM player WHERE firstname LIKE 'а%' //1

SELECT * FROM player WHERE firstname LIKE '%ни%' //2

SELECT * FROM player WHERE firstname OR lastname LIKE '%с' //3

SELECT * FROM player WHERE is_captain = 1 //4

SELECT COUNT(player_id) FROM player WHERE position_id = 2 //5

SELECT COUNT(player_id) FROM player WHERE team_id = 1 AND position_id = 4 //6

SELECT * FROM player WHERE team_id = 6 AND position_id = 3 //7

SELECT * FROM stadium WHERE opacity >= 20000 //8

SELECT SUM(opacity) FROM stadium //9

SELECT COUNT(stadium_id) AS stadium_count,city_id
FROM stadium
GROUP BY city_id //10

SELECT AVG(opacity) FROM stadium  //11

SELECT name,opacity FROM `stadium`
WHERE city_id = (SELECT city_id FROM city WHERE name = 'Киев') AND city_id = (SELECT city_id FROM city WHERE name = 'Харьков')
OR opacity < 25000 //12

SELECT lastname,firstname FROM `player`
WHERE team_id = (SELECT team_id FROM team WHERE name = 'Шахтер Донецк')
ORDER BY lastname //13

SELECT * FROM stadium
ORDER BY opacity DESC //14

SELECT COUNT(city_id) FROM stadium
WHERE city_id > 1 //15

//------------------------------------------------------------------------------

SELECT a.name
FROM city a
INNER JOIN stadium z ON (a.city_id=z.city_id AND z.opacity>20000)//1



SELECT a.name
FROM stadium a
INNER JOIN city q ON (a.city_id=q.city_id AND q.name LIKE'%к%')//2

SELECT a.name, COUNT(a.name) AS countStad
FROM city a
INNER JOIN stadium q ON (a.city_id=q.city_id)
GROUP BY a.name
HAVING countStad>1//3

SELECT COUNT(p.player_id), t.name, s.name
FROM team t
INNER JOIN stadium s ON (t.city_id=s.city_id AND s.opacity<40000)
INNER JOIN player p ON (p.team_id=t.team_id AND p.position_id = 4 )
GROUP BY t.name//4

SELECT p.firstname, p.lastname, c.name
FROM player p
INNER JOIN team t ON (p.team_id=t.team_id AND p.position_id=3)
INNER JOIN city c ON (t.city_id=c.city_id AND c.name LIKE '%в%')//5

SELECT COUNT(DISTINCT(p.player_id)) AS pl,COUNT(DISTINCT(s.stadium_id)) AS countcity, t.name
FROM player p
INNER JOIN team t ON (p.team_id=t.team_id)
INNER JOIN stadium s ON (s.city_id=t.city_id)
GROUP BY s.city_id
HAVING (countcity)>1//6

SELECT CONCAT_WS( ' - ', p.firstname, m.title, t.name, c.name) AS info
FROM player p
INNER JOIN position m ON (m.position_id=p.position_id)
INNER JOIN team t ON (t.team_id=p.team_id)
INNER JOIN city c ON (t.city_id=c.city_id)
GROUP BY info//7

UPDATE position
SEt title = 'Форвард'
WHERE title = 'Нападающий'//8

UPDATE player
SEt firstname = 'Олександр'
WHERE firstname = 'Александр'//9

SELECT MIN(opacity) AS minimum, MAX(opacity) AS maximum, AVG (opacity), COUNT(stadium_id) AS countsdadim, COUNT(DISTINCT(city_id)) AS counttown
FROM stadium//10

