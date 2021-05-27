UPDATE agents
SET COMMISSION = COMMISSION +.02
WHERE AGENT_CODE IN (
    SELECT agents.AGENT_CODE
    FROM agents
    WHERE(
        SELECT 
            COUNT(customer.AGENT_CODE)
        FROM 
            customer
        WHERE 
            customer.AGENT_CODE = agents.AGENT_CODE
    ) >= 2
);
