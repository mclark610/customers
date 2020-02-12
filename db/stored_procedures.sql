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

create procedure sales_monthly()
BEGIN
select
	    sum(amount) 'amount',
	    month(date_paid) 'month',
	    monthname(date_paid) 'month_name',
	    year(date_paid) 'year'
	from
	    transactions t
	 group by
	    year(date_paid),
	    month(date_paid);
END //

drop procedure if exists sales_yearly //

create procedure sales_yearly()
BEGIN
	select
	    sum(amount) 'amount',
	    year(date_paid) 'year'
	from
	    transactions t
	 group by
	    year(date_paid)
	 order by
	    year(date_paid) asc;
END


DELIMITER ;
