


DELIMITER $$

CREATE PROCEDURE updateTime(IN appid int, IN Updatetime timestamp)
BEGIN
   INSERT INTO lastSeen(appid, lastseen) VALUES(appid,Updatetime) ON DUPLICATE KEY UPDATE lastseen=Updatetime ;
END 
DELIMITER ;