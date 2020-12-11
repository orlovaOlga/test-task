# написать запрос, который бы выводил полное имя и баланс человека на данный момент
SELECT fullname,
       100 +
       (SELECT IFNULL(SUM(amount), 0) FROM transactions WHERE to_person_id = persons.id) -
       (SELECT IFNULL(SUM(amount), 0) FROM transactions WHERE from_person_id = persons.id) as balance
FROM persons;

# написать запрос, который бы выводил имя человека, который участвовал в передаче денег наибольшее количество раз

SELECT fullname FROM
    (SELECT fullname,
       (SELECT COUNT(*) FROM transactions WHERE from_person_id = persons.id OR to_person_id = persons.id) as countTransaction
       FROM persons) as t
ORDER BY countTransaction DESC
LIMIT 1;

# написать запрос, отражающий все транзакции, где передача денег осуществлялась между представителями одного города
SELECT *,
       (SELECT city_id FROM persons WHERE persons.id = transactions.to_person_id)   as city_to,
       (SELECT city_id FROM persons WHERE persons.id = transactions.from_person_id) as city_from
FROM transactions
HAVING city_from = city_to;