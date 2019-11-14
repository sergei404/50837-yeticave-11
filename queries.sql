INSERT INTO categories VALUES
  (1,'Доски и лыжи','boards'),
  (null,'Крепления','attachment'),
  (null,'Ботинки','boots'),
  (null,'Одежда','clothing'),
  (null,'Инструменты','tools'),
  (null,'Разное','other');

INSERT INTO users VALUES
 (1, (NOW() - INTERVAL 1 DAY), 'tree@gmail.com', 'Антон',
 '123456', '+79846783465'),
  (null, NOW(), 'second@mail.ru', 'Сергей', 'kvakazuabr', null);

INSERT INTO lots VALUES
  (1, (NOW() - INTERVAL 1 DAY), '2014 Rossignol District Snowboard', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam', 'img/lot-1.jpg', 10999, (NOW() + INTERVAL 5 DAY), 1000, 1, null, 1),
  (null,(NOW() - INTERVAL 7 DAY),'DC Ply Mens 2016/2017 Snowboard','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam','img/lot-2.jpg',159999,(NOW() + INTERVAL 2 DAY),2000,1,null,1),
  (null,NOW() ,'Крепления Union Contact Pro 2015 года размер L/XL','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam','img/lot-3.jpg',8000,(NOW() + INTERVAL 4 DAY),500,1,null,2),
  (null,(NOW() - INTERVAL 1 DAY),'Ботинки для сноуборда DC Mutiny Charocal','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam','img/lot-4.jpg',10999,(NOW() + INTERVAL 5 DAY),1000,2,null,3),
  (null,(NOW() - INTERVAL 2 DAY),'Куртка для сноуборда DC Mutiny Charocal','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam','img/lot-5.jpg',7500,(NOW() + INTERVAL 3 DAY),400,2,null,4),
  (null,(NOW() - INTERVAL 1 DAY),'Маска Oakley Canopy','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam','img/lot-6.jpg',5400,(NOW() + INTERVAL 5 DAY),300,2,null,6),
  (null,(NOW() - INTERVAL 7 DAY),'Маска Oakley ','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam','img/lot-8.jpg',8400,(NOW() - INTERVAL 2 DAY),500,2,null,6),
  (null,(NOW() - INTERVAL 6 DAY),'Tools','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam','img/lot-6.jpg',3400,(NOW() - INTERVAL 1 DAY),200,1,null,5);

INSERT INTO rates VALUES
  (1,(NOW()  -  INTERVAL 3 HOUR),11999,2,1),
  (null,NOW(),6000,1,6),
  (null,(NOW() - INTERVAL 1 DAY),4000,1,8);


-- получить все катигории
SELECT * FROM categories;
-- получить открытые лоты, лот должен включать название, стартовую цену, ссылку на изображение, текущую цену, название категории;
SELECT  l.title, l.starting_price, l.photo, r.sum, c.title 
FROM lots l 
JOIN rates r ON l.id = r.lot_id
JOIN categories c ON l.category_id = c.id
WHERE completion_date > NOW();

-- показать лот по его id, также название категории, к которой принадлежит лот
SELECT  l.*, c.title FROM  lots l
LEFT JOIN categories c ON l.category_id = c.id
WHERE l.id =1;

-- обновить название лота по его идентификатору
UPDATE lots SET title = 'joker07' WHERE id = 1;

-- получить список ставок для лота по его идентификатору с сортировкой по дате
SELECT l.id, r.* FROM  lots l
JOIN rates r ON l.id = r.lot_id
WHERE l.id = 6
ORDER BY r.date DESC;
 