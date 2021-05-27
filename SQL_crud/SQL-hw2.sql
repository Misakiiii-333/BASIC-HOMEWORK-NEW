UPDATE agents
SET 
    COMMISSION = COMMISSION -.02
WHERE AGENT_CODE IN( 
    SELECT
        AGENT_CODE
    FROM
        customer
    WHERE PAYMENT_AMT IN(
        SELECT MIN(PAYMENT_AMT)
        FROM customer)
    );
        
