DELIMITER $$
CREATE PROCEDURE `random_data`()
BEGIN
  DECLARE v_finished INTEGER     DEFAULT 0;
  
  MAIN_LOOP: LOOP
    IF v_finished = 10000 THEN
      LEAVE MAIN_LOOP;
	END IF;
    
    INSERT INTO transactions (date_created, amount,id)
    SELECT 
        TIMESTAMP('2015-04-30 14:53:27') - INTERVAL RAND() * 365 * 1 DAY,
        ROUND(7 + (RAND() * 25), 2),
	FLOOR(1 + RAND() * 10000);
 
    SET v_finished = v_finished + 1;
    
  END LOOP MAIN_LOOP;
end$$
DELIMITER ;
