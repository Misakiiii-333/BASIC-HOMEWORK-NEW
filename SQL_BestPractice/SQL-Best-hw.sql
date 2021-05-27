SELECT 
    working_area, avg(commission) AS AVG_COMMISION,
    count(agent_name) AS COUNT_AGENT_NAME
FROM
    agents
GROUP BY
    working_area 
HAVING 
    COUNT_AGENT_NAME < 3

ORDER BY 
    AVG_COMMISION,COUNT_AGENT_NAME DESC;
