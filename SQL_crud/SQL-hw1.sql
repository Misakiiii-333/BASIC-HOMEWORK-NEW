CREATE TABLE new agents
SELECT agents.*
FROM agents,customer
WHERE 
    agents.WORKING_AREA = 'LONDON'
    customer.CUST_COUNTRY = 'UK'
    agents.AGENT_CODE = customer.AGENT_CODE;
// made PRIMARY KEY   
ALTER TABLE new _agents ADD PRIMARY KEY(AGENT_CODE);