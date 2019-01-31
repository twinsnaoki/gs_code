INSERT INTO gs_an_table(name, email, naiyou, indate)
VALUES
('渕上', 'test01@test.com', 'test1', sysdate())

-- :はバインド、接続するために必要なもの
INSERT INTO gs_an_table(name, email, naiyou, indate) VALUES (:name, :email, :naiyou, sysdate())

--SELECT文
SELECT * FROM gs_an_table 
WHERE name = '渕上'

SELECT * FROM gs_an_table 
WHERE id = 1

SELECT * FROM gs_an_table 
WHERE name LIKE '%木%'

SELECT * FROM gs_an_table 
ORDER BY indate DESC

SELECT * FROM gs_an_table 
ORDER BY indate DESC
LIMIT 3


--これをコピペするとすぐにデータベースを生成できる