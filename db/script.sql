create database dhshop;

drop table customers;

create table customers(
	id int not null auto_increment,
    first_name varchar(100) not null,
    last_name varchar(100) not null,
    email varchar(100) not null unique,
    password varchar(200) not null,
    birthdate date not null,
    phone varchar(20) not null,
    dni varchar(15) not null unique,
    address varchar(50) not null,    
    primary key (id)
);

create table carts(
	id int not null auto_increment,
    customer_id int not null,
    product_id int not null,
    quantity int not null,
    primary key (id),
    foreign key (customer_id) references customers(id),
    foreign key (product_id) references products(id)
);


create table products(
	id int not null auto_increment,
    name varchar(100) not null unique,
    price float not null,
    stock int not null,
    description text(500) not null,
    mark_id int not null,
    category_id int not null,
    foreign key (mark_id) references marks(id),
    foreign key (category_id) references categories(id),	
    primary key (id)
);

create table receipts(
	id int not null auto_increment,
    date datetime not null,
    customer_id int not null,
    primary key(id),
    foreign key (customer_id) references customers(id)
);

create table receiptsProducts(
	id int not null auto_increment,
    receipt_id int not null,
    product_id int not null,
    primary key(id),
    foreign key (receipt_id) references receipts(id),
    foreign key (product_id) references products(id)
);

create table newsletter(
	id int not null auto_increment,
    email varchar(100) not null unique,
    primary key(id)
);

create table admins(
	id int not null auto_increment,
	user varchar(15) not null,
    password varchar(200) not null,
    primary key(id)
);

create table marks(
	id int not null auto_increment,
	name varchar(50) not null,
    primary key(id)
);

create table categories(
	id int not null auto_increment,
	name varchar(50) not null,
    primary key(id)
);






insert into marks values(default, "Samsung");
insert into marks values(default, "Xiaomi");
insert into marks values(default, "Apple");
insert into marks values(default, "Huawei");
insert into marks values(default, "Motorola");
insert into marks values(default, "Sony");
insert into marks values(default, "Fiio");



insert into categories values(default, "Celulares");
insert into categories values(default, "Acessorios");
insert into categories values(default, "Auriculares inalámbricos");
insert into categories values(default, "Auriculares con cable");


insert into products values(default, "Xiaomi airdots", 2700.0, 100, "pequeños auriculares inalámbricos que cuentan con estuche que también sirve de cargador. Una buena alternativa a los Apple Airpods.", 7, 4);
insert into products values(default, "Fiio F3", 3600.0, 100, "Los FiiO F3 son los nuevos auriculares In-Ear con drivers de Grafeno, un nano material muy reciente con excelentes propiedades para la producción de sonido en alta fidelidad. Los F3 están construidos con la calidad que caracteriza a los productos FiiO y cuentan con un completo set de accesorios que normalmente puede encontrarse en auriculares que duplican y triplican su valor. Los F3 son IEMs que ofrecen excelente calidad de sonido, aislación del exterior y comodidad para una experiencia de sonido de alta definición que puede disfrutarse en todo momento y lugar.", 2, 3);
insert into products values(default, "Apple iPhone 11 Pro Dual SIM 256 GB Verde medianoche 4 GB RAM", 142000.0, 100, "¡El nuevo smartphone que lo tiene todo! Con este lanzamiento, Apple ha superado todos sus récords. Su diseño se destaca por sus líneas finas y distinguidas a partir de una sola hoja de vidrio resistente, combinada con aluminio de excelente calidad.", 3, 1);
insert into products values(default, "Samsung Buds", 10000.0, 150, "En la calle, en el colectivo o en la oficina, tené siempre a mano tus auriculares Samsung y ¡escapate de la rutina por un rato! Vas a poder disfrutar de la música que más te gusta y de tus podcasts favoritos cuando quieras y donde quieras.El formato perfecto para vos. Al ser in-ear, aíslan el ruido del exterior, mejoran la calidad del audio y son de tamaño pequeño para poder insertarse en tu oreja. Son ideales para acompañarte a la hora de hacer ejercicio mientras te sumergís en el mejor sonido envolvente.", 1, 3);
insert into products values(default, "Xiaomi Redmi Note 8 Dual SIM 64 GB", 20000.0, 200, 'El sistema operativo avanzado Android 9.0 Pie aprende tus hábitos para adaptarse a tu rutina y lograr la máxima eficiencia de tu equipo. Tu dispositivo tendrá la autonomía necesaria para reducir el consumo energético ajustando el brillo automáticamente y gestionando la batería de manera inteligente para que puedas priorizar el uso de tus aplicaciones habituales.
Con su pantalla IPS de 6.3", disfrutá de colores intensos y mayor nitidez en todos tus contenidos. Con su memoria interna de 64 GB siempre tendrás espacio para almacenar archivos y documentos importantes. Además, podrás guardar películas, series y videos para reproducirlos cuando quieras sin conexión. Si necesitas más, podrás agregar una tarjeta micro-SD, que te permitirá contar con 256 GB extras.
', 2, 1);

insert into admins values(default, "admin", "$2y$10$jBu7f75o4CEQwdiZamnHbOJEoLyZJI60UW1mwlgQ5I5CElSo43/oi");






























