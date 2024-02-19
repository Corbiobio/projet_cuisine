/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  19/02/2024 10:12:57                      */
/*==============================================================*/


drop table if exists ingredient_meal;

drop table if exists cart;

drop table if exists category_meal;

drop table if exists client;

drop table if exists diet_meal;

drop table if exists ingredient;

drop table if exists meal;

drop table if exists origin;

/*==============================================================*/
/* Table : ingredient_meal                                        */
/*==============================================================*/
create table ingredient_meal
(
   id_meal              varchar(255) not null,
   id_ingredient        varchar(255) not null,
   primary key (id_meal, id_ingredient)
) engine = "innoDB";

/*==============================================================*/
/* Table : cart                                                 */
/*==============================================================*/
create table cart
(
   id_meal              varchar(255) not null,
   id_client            varchar(255) not null,
   amount_meal          int,
   primary key (id_meal, id_client)
) engine = "innoDB";

/*==============================================================*/
/* Table : category_meal                                        */
/*==============================================================*/
create table category_meal
(
   id_category          varchar(255) not null,
   label_category       varchar(255),
   primary key (id_category)
) engine = "innoDB";

/*==============================================================*/
/* Table : client                                               */
/*==============================================================*/
create table client
(
   id_client            varchar(255) not null,
   mail_client          varchar(255),
   password_client      varchar(255),
   primary key (id_client)
) engine = "innoDB";

/*==============================================================*/
/* Table : diet_meal                                            */
/*==============================================================*/
create table diet_meal
(
   id_diet              varchar(255) not null,
   label_diet           varchar(255),
   primary key (id_diet)
) engine = "innoDB";

/*==============================================================*/
/* Table : ingredient                                           */
/*==============================================================*/
create table ingredient
(
   id_ingredient        varchar(255) not null,
   label_ingredient     varchar(255),
   primary key (id_ingredient)
) engine = "innoDB";

/*==============================================================*/
/* Table : meal                                                 */
/*==============================================================*/
create table meal
(
   id_meal              varchar(255) not null,
   id_origin            varchar(255) not null,
   id_diet              varchar(255) not null,
   id_category          varchar(255) not null,
   title_meal           varchar(255),
   price_meal           decimal,
   weight_meal          decimal,
   primary key (id_meal)
) engine = "innoDB";

/*==============================================================*/
/* Table : origin                                               */
/*==============================================================*/
create table origin
(
   id_origin            varchar(255) not null,
   label_origin         varchar(255),
   primary key (id_origin)
) engine = "innoDB";

alter table ingredient_meal add constraint FK_ingredient_meal foreign key (id_ingredient)
      references ingredient (id_ingredient) on delete CASCADE on update CASCADE;

alter table ingredient_meal add constraint FK_association_5 foreign key (id_meal)
      references meal (id_meal) on delete CASCADE on update CASCADE;

alter table cart add constraint FK_cart foreign key (id_client)
      references client (id_client) on delete CASCADE on update CASCADE;

alter table cart add constraint FK_cart2 foreign key (id_meal)
      references meal (id_meal) on delete CASCADE on update CASCADE;

alter table meal add constraint FK_association_1 foreign key (id_origin)
      references origin (id_origin) on delete CASCADE on update CASCADE;

alter table meal add constraint FK_association_2 foreign key (id_diet)
      references diet_meal (id_diet) on delete CASCADE on update CASCADE;

alter table meal add constraint FK_association_3 foreign key (id_category)
      references category_meal (id_category) on delete CASCADE on update CASCADE;

