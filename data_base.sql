select * from courses where title like '%101' and level like "%Intermédiaire%" order by title DESC;

select count(id),level from courses GROUP BY level;