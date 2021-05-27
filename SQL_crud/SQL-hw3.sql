SELECT 
    *
FROM 
    customer
    JOIN agents
        ON customer.AGENT_CODE = agents.AGENT_CODE
WHERE customer.GRADE = 3
    AND NOT customer.CUST_COUNTRY = 'India'
    AND customer.OPENING_AMT < 7000 
    AND agents.COMMISSION < 0.12;
