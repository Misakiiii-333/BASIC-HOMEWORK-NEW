CREATE TABLE new_agents AS
/*Combine duplicate records into one.*/
SELECT DISTINCT 
    agents.* --I see all of the agents.
FROM 
    agents,customer
WHERE 
    agents.WORKING_AREA = 'LONDON'
AND 
    customer.CUST_COUNTRY = 'UK'
AND 
    agents.AGENT_CODE = customer.AGENT_CODE;
--added PRIMARY KEY
ALTER TABLE new _agents ADD PRIMARY KEY(AGENT_CODE);
