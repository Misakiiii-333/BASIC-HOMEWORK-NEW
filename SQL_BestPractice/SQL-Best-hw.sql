SELECT 
    working_area, avg(commission) AS AVG_COMMISION,
    count(agent_name) AS COUNT_AGENT_NAME
FROM
    agents
HAVING 
    count(agent_name) < 3
GROUP BY
    working_area 
ORDER BY 
    AVG_COMMISION.COUNT_AGENT_NAME DESC;
