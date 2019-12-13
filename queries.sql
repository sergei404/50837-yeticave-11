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
  (1, (NOW() - INTERVAL 1 DAY), '2014 Rossignol District Snowboard', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam', 'lot-1.jpg', 10999, (NOW() + INTERVAL 15 DAY), 1000, 1, null, 1),
  (null,(NOW() - INTERVAL 7 DAY),'DC Ply Mens 2016/2017 Snowboard','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam', 'lot-2.jpg', 159999, (NOW() + INTERVAL 12 DAY),2000,1,null,1),
  (null,NOW() ,'Крепления Union Contact Pro 2015 года размер L/XL', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam', 'lot-3.jpg', 8000, (NOW() + INTERVAL 14 DAY),500,1,null,2),
  (null, (NOW() - INTERVAL 1 DAY), 'Ботинки для сноуборда DC Mutiny Charocal', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam', 'lot-4.jpg',10999,(NOW() + INTERVAL 15 DAY), 1000, 2, null, 3),
  (null,(NOW() - INTERVAL 2 DAY),'Куртка для сноуборда DC Mutiny Charocal','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam', 'lot-5.jpg',7500,(NOW() + INTERVAL 13 DAY), 400, 2, null, 4),
  (null,(NOW() - INTERVAL 1 DAY),'Маска Oakley Canopy','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam nisi animi quia maiores ea beatae placeat maxime ipsam', 'lot-6.jpg', 5400, (NOW() + INTERVAL 15 DAY), 300, 2, null, 6);

INSERT INTO rates VALUES
  (1,(NOW()  -  INTERVAL 3 HOUR),11999,2,1),
  (null,NOW(),6000,1,6),
  (null,(NOW() - INTERVAL 1 DAY),4000,1,8);

 