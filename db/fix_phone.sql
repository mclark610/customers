-- --------------------------------------------------------------- --
-- fix_phone
--   Phone number had a bad format [888-7777-6666].
--   This sp fixes that.
--    
--   DELIMITER: needs to be changed from ';' to anything to allow
--              the stored procedure be entered into mysql as one
--              block of code instead of mysql entering one line of
--              the below code at a time.
-- --------------------------------------------------------------- --
DELIMITER $$

use customer_data $$

drop procedure if exists fix_phone $$

create procedure fix_phone() 
begin
  DECLARE v_finished INTEGER     DEFAULT 0;
  DECLARE v_dash1    INTEGER     DEFAULT 0;
  DECLARE v_dash2    INTEGER     DEFAULT 0;
  DECLARE v_phone    varchar(24) DEFAULT "";
  DECLARE v_ac       varchar(5)  DEFAULT "";
  DECLARE v_num1     varchar(5)  DEFAULT "";
  DECLARE v_num2     varchar(5)  DEFAULT "";
  DECLARE v_tnum     varchar(5)  DEFAULT "";
  
  DECLARE cur CURSOR FOR 
    select phone from customers where char_length(phone) > 12;
    
  DECLARE CONTINUE HANDLER
    FOR NOT FOUND SET v_finished = 1;
  
  OPEN cur;
  
  MAIN_LOOP: LOOP
    FETCH cur into v_phone;
    IF v_finished = 1 THEN
      LEAVE MAIN_LOOP;
	END IF;

    -- TEAR PHONE NUMBER DOWN
    -- '406-1043-1671**4**9**406*1043-*1043'
    SET v_dash1 = LOCATE('-',v_phone);
    SET v_ac    = LEFT(v_phone,v_dash1-1);
    
    SET v_dash2 = LOCATE('-',v_phone,v_dash1+1);
    SET v_num1  = MID(v_phone,v_dash1+1,v_dash2-v_dash1-1);
    -- REMOVE FIRST 2 CHARACTERS AND REPLACE WITH '9'
    SET v_num1 = CONCAT('9',RIGHT(v_num1,2));
    SET v_num2 = RIGHT(v_phone,length(v_phone)-v_dash2);
    
    UPDATE customers
      SET phone = CONCAT(v_ac,'-',v_num1,'-',v_num2)
	WHERE 
	  phone = v_phone;
      
    -- INSERT INTO log (note) values ( CONCAT(v_phone, '**',v_dash1,'**',v_dash2,'**',v_ac, '*' , v_num1 , '*' , v_num2));
    
  END LOOP MAIN_LOOP;
end $$

DELIMITER ;