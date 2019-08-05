delimiter //

drop procedure if exists sales_weekly //

create procedure sales_weekly( IN date_year varchar(4))
BEGIN
	select
	    sum(amount),
	    date_paid,
	    week(date_paid)
	from
	    transactions t
	WHERE
	    year(date_paid) = date_year
	 group by
	    week(date_paid);
END //

drop procedure if exists sales_monthly //

create procedure sales_monthly( IN date_year varchar(4))
BEGIN
	select
	    sum(amount),
	    date_paid,
	    month(date_paid)
	from
	    transactions t
	WHERE
	    year(date_paid) = date_year
	 group by
	    month(date_paid);
END //

DELIMITER ;
