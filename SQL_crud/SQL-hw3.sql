SELECT 
    *
FROM 
    customer
    JOIN agents
    ON customer.AGENT_CODE = agents.AGENT_CODE
/*The 'customer' table who are in grade 3 */
WHERE customer.GRADE = 3 
    AND NOT customer.CUST_COUNTRY = 'India' --not belongs to the country India 
    AND customer.OPENING_AMT < 7000 --here deposited opening amount is less than 7000
    AND agents.COMMISSION < 0.12; --their agents should have earned a commission is less than 0.12%
