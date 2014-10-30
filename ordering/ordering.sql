CREATE DATABASE IF NOT EXISTS ordering default charset utf8 COLLATE utf8_general_ci; 

use ordering;

create table restaurant(
restaurant_id int(11) NOT NULL primary KEY auto_increment,
restaurant_name varchar(11) NOT NULL,
restaurant_address varchar(11) default NULL,
restaurant_tel varchar(11) default NULL,
restaurant_phone varchar(11) default NULL,
restaurant_qq varchar(11) default NULL,
restaurant_comment varchar(20) default NULL
);


create table category(
category_id int(11) NOT NULL primary KEY auto_increment,
category_name varchar(11) NOT NULL,
restaurant_id int(11) NOT NULL,
category_comment varchar(20) default NULL,
FOREIGN KEY (restaurant_id) REFERENCES  restaurant(restaurant_id)
);


create table food(
food_id int(11) NOT NULL primary KEY auto_increment,
food_name varchar(20) NOT NULL,
food_price1 int(11) NOT NULL,
food_price2 int(11) default NULL,
food_price3 int(11) default NULL,
category_id int(11) NOT NULL,
food_comment varchar(20) default NULL,
FOREIGN KEY (category_id) REFERENCES  category(category_id)
);

create table foodorder (
order_id int(11) NOT NULL primary KEY auto_increment,
order_sn varchar(20) NOT NULL,
customer varchar(11) not null,
food_id int(11) not null,
food_name varchar(10) NOT NULL,
food_price int(11) NOT NULL,
food_number int(11) NOT NULL,
food_sum_price int(11) NOT NULL,
order_time int(10) NOT NULL,
IP varchar(20) default null,
order_comment varchar(20) default NULL
);

#baoma
#insert baoma restaurant
insert into restaurant(restaurant_name,restaurant_address,restaurant_tel,restaurant_phone,restaurant_qq) values("葆马快餐","怡景大街258号","85547283","18320706682","956840049");

#insert baoma category
insert into category(category_name,restaurant_id)  values("星期一","1");
insert into category(category_name,restaurant_id)  values("星期二","1");
insert into category(category_name,restaurant_id)  values("星期三","1");
insert into category(category_name,restaurant_id)  values("星期四","1");
insert into category(category_name,restaurant_id)  values("星期五","1");
insert into category(category_name,restaurant_id)  values("星期六/星期日","1");
insert into category(category_name,restaurant_id)  values("每天供应系列","1");

#insert baoma food menu
insert into food(food_name,food_price1,category_id) values("青椒炒肉丝饭","10","1");
insert into food(food_name,food_price1,category_id) values("莲藕蒸肉饼饭","10","1");
insert into food(food_name,food_price1,category_id) values("豆角炒肉丝饭","10","1");
insert into food(food_name,food_price1,category_id) values("外婆菜炒肉饭","12","1");
insert into food(food_name,food_price1,category_id) values("牛肉炒滑蛋饭","12","1");
insert into food(food_name,food_price1,category_id) values("豆卜焖鱼腩饭","12","1");
insert into food(food_name,food_price1,category_id) values("蒜香鸡翅饭","13","1");
insert into food(food_name,food_price1,category_id) values("芥菜猪杂汤饭","13","1");
insert into food(food_name,food_price1,category_id) values("藕片猪杂汤饭","13","1");


insert into food(food_name,food_price1,category_id) values("银鱼煎蛋饼饭","10","2");
insert into food(food_name,food_price1,category_id) values("莲藕炒肉片饭","10","2");
insert into food(food_name,food_price1,category_id) values("鱼香茄子饭","10","2");
insert into food(food_name,food_price1,category_id) values("青椒辣子鸡饭","12","2");
insert into food(food_name,food_price1,category_id) values("菇趴日本豆腐饭","12","2");
insert into food(food_name,food_price1,category_id) values("酸菜东坡肉饭","12","2");
insert into food(food_name,food_price1,category_id) values("豉汁蒸排骨饭","13","2");
insert into food(food_name,food_price1,category_id) values("芥菜猪杂汤饭","13","2");
insert into food(food_name,food_price1,category_id) values("藕片猪杂汤饭","13","2");


insert into food(food_name,food_price1,category_id) values("梅菜蒸肉饼饭","10","3");
insert into food(food_name,food_price1,category_id) values("冬瓜炒肉片饭","10","3");
insert into food(food_name,food_price1,category_id) values("攸县香干饭","10","3");
insert into food(food_name,food_price1,category_id) values("支竹焖鱼腩饭","12","3");
insert into food(food_name,food_price1,category_id) values("香辣鸭饭","12","3");
insert into food(food_name,food_price1,category_id) values("莲藕焖猪手饭","12","3");
insert into food(food_name,food_price1,category_id) values("烧汁鲜鱿饭","13","3");
insert into food(food_name,food_price1,category_id) values("芥菜猪杂汤饭","13","3");
insert into food(food_name,food_price1,category_id) values("藕片猪杂汤饭","13","3");




