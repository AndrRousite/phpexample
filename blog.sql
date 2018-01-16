SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET TIME_ZONE = "+00:00";

USE `tb_blog`;

-- 用户表
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id`        INT(10)              NOT NULL AUTO_INCREMENT
  COMMENT '用户ID',
  `username`  VARCHAR(20)          NOT NULL
  COMMENT '用户名称',
  `nickname`  VARCHAR(20) COMMENT '用户昵称',
  `pwd`       VARCHAR(32)          NOT NULL
  COMMENT '密码',
  `birthday`  DATE                 NOT NULL DEFAULT '0000-00-00'
  COMMENT '生日',
  `email`     VARCHAR(100)         NOT NULL
  COMMENT '邮箱',
  `city`      VARCHAR(100)         NOT NULL DEFAULT '火星'
  COMMENT '所在城市',
  `avatar`    VARCHAR(50)          NOT NULL
  COMMENT '用户头像',
  `sex`       ENUM ('0', '1', '2') NOT NULL DEFAULT '0'
  COMMENT '性别：0、1男、2女',
  `qq`        VARCHAR(20)          NOT NULL
  COMMENT 'qq',
  `homepage`  VARCHAR(100)         NOT NULL
  COMMENT '个人主页',
  `sign`      VARCHAR(200)         NOT NULL
  COMMENT '个性签名',
  `introduce` MEDIUMINT,
  `ip`        VARCHAR(20)          NOT NULL
  COMMENT 'ip地址',
  `regtime`   TIMESTAMP            NOT NULL DEFAULT 0
  COMMENT '注册时间',
  `status`    ENUM ('0', '1')      NOT NULL DEFAULT '0'
  COMMENT '用户状态：0启用、1注销',
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 2;

-- 好友表
CREATE TABLE IF NOT EXISTS `tb_friend` (
  `id`       INT(10)        NOT NULL AUTO_INCREMENT
  COMMENT 'ID',
  `username` VARCHAR(20)    NOT NULL,
  `nickname` VARCHAR(20),
  `sex`      ENUM ('0', '1', '2') NOT NULL DEFAULT '0',
  `birthday` DATE           NOT NULL DEFAULT '0000-00-00',
  `city`     VARCHAR(100)   NOT NULL DEFAULT '火星',
  `address`  VARCHAR(100),
  `postcode` VARCHAR(6)     NOT NULL,
  `email`    VARCHAR(100)   NOT NULL,
  `mobile`   VARCHAR(20)    NOT NULL,
  `qq`       VARCHAR(20)    NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 25;

-- 文章表
CREATE TABLE IF NOT EXISTS `tb_article` (
  `id`          INT(10)     NOT NULL AUTO_INCREMENT
  COMMENT '文章ID',
  `title`       VARCHAR(50) NOT NULL
  COMMENT '标题',
  `content`     TEXT        NOT NULL
  COMMENT '内容',
  `author`      VARCHAR(20) NOT NULL
  COMMENT '文章作者',
  `create_time` TIMESTAMP   NOT NULL DEFAULT 0
  COMMENT '发表时间',
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 32;

-- 文章评论表
CREATE TABLE IF NOT EXISTS `tb_comment` (
  `id`         INT(10)     NOT NULL AUTO_INCREMENT,
  `aid`        INT(10)     NOT NULL,
  `username`   VARCHAR(20) NOT NULL,
  `content`    TEXT        NOT NULL,
  `createtime` TIMESTAMP   NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 48;

-- 评论回复表
CREATE TABLE IF NOT EXISTS `tb_reply` (
  `id`         INT(10)     NOT NULL AUTO_INCREMENT,
  `cid`        INT(10)     NOT NULL,
  `c_username` VARCHAR(20) NOT NULL,
  `username`   VARCHAR(20) NOT NULL,
  `content`    TEXT        NOT NULL,
  `createtime` TIMESTAMP   NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 56;

-- 公告列表
CREATE TABLE IF NOT EXISTS `tb_notice` (
  `id`         INT(10)     NOT NULL AUTO_INCREMENT,
  `title`      VARCHAR(50) NOT NULL,
  `content`    TEXT        NOT NULL,
  `createtime` TIMESTAMP   NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 64;

-- 图片列表
CREATE TABLE IF NOT EXISTS `tb_image` (
  `id`     INT(10)       NOT NULL AUTO_INCREMENT,
  `name`   VARCHAR(30)   NOT NULL,
  `file`   VARCHAR(3600) NOT NULL
  COMMENT '保存图片元数据',
  `author` VARCHAR(20)   NOT NULL,
  `scsj`   TIMESTAMP     NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 124;