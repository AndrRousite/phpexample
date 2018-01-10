SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET TIME_ZONE = "+00:00";

-- 数据库 `tp_blog`
USE `tp_blog`;

CREATE TABLE IF NOT EXISTS `tp_article` (
  `id`      MEDIUMINT(9) NOT NULL AUTO_INCREMENT
  COMMENT '文章ID',
  `title`   VARCHAR(60)  NOT NULL
  COMMENT '文章标题',
  `author`  VARCHAR(60)  NOT NULL
  COMMENT '文章作者',
  `desc`    VARCHAR(255) NOT NULL
  COMMENT '文章简介',
  `keywords` VARCHAR(255) NOT NULL
  COMMENT '文章关键词',
  `content` TEXT         NOT NULL
  COMMENT '文章内容',
  `pic` VARCHAR(100) NOT NULL
  COMMENT '文章缩略图',
  `click`   INT(10)      NOT NULL DEFAULT '0'
  COMMENT '用户点击数',
  `state`   TINYINT(1)   NOT NULL DEFAULT '0'
  COMMENT '0:不推荐1：推荐',
  `time`    INT(11)      NOT NULL
  COMMENT '发布时间',
  `cateid`  MEDIUMINT(9) NOT NULL
  COMMENT '所属栏目',
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 8;

-- 插入文章数据

INSERT INTO `tp_article` (`id`, `title`, `author`, `desc`, `keywords`, `content`, `pic`, `click`, `state`, `time`, cateid)
VALUES
  (1, '测试1', '2', '4', '测试,文章', '<p>5<br/></p>', '', 11, 1, 1475145866, 1),
  (5, '测试文章3', '童年', '烧烤不管是男生还是女生都很热爱，而且是夏天冬天都适合的美食。如果你不想在外吃烤肉，那么你也可以在家自制哦。下面我们一起来看看在家如何自制烤肉吧。 ', '测试,文章',
      '<p>烧烤不管是男生还是女生都很热爱，而且是夏天冬天都适合的美食。如果你不想在外吃烤肉，那么你也可以在家自制哦。下面我们一起来看看在家如何自制烤肉吧。烧烤不管是男生还是女生都很热爱，而且是夏天冬天都适合的美食。如果你不想在外吃烤肉，那么你也可以在家自制哦。下面我们一起来看看在家如何自制烤肉吧。烧烤不管是男生还是女生都很热爱，而且是夏天冬天都适合的美食。如果你不想在外吃烤肉，那么你也可以在家自制哦。下面我们一起来看看在家如何自制烤肉吧。</p>',
      '/uploads/20161002\\753fd85d16974754dcf271d37d072d1e.png', 90, 1, 1475417556, 1),
  (4, '测试文章2', '童攀', '描述', '童年,测试', '<p>222<br/></p>', '/uploads/20160930\\fd338f8a40bc432d5febf54b0be24049.jpg', 5, 0,
      1475147467, 3),
  (6, '测试文章4', '童攀', '公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！ ', '童攀,Tp5',
      '<p>公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！公司聚餐是非常普遍的公司活动，那么公司部门聚餐通知怎么写呢？以下是小编提供的一些范文，供大家参考哦！</p>',
      '/uploads/20161002\\9fc03900ff44f8c7679ae0edfd673d67.png', 10, 0, 1475417603, 1),
  (7, '老爸过生日', 'Tp5', '父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ ', '老爸,生日',
      '<p>父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ <br/>父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ <br/>父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ <br/>父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ <br/>父亲过生日，肯定要送个爸爸平时用得着的东西，每次用的时候就能想到是你送的，那么老爸过生日送什么礼物好呢？ <br/></p>',
      '/uploads/20161002\\83c90d060801999ca5b497348f7771a9.png', 13, 0, 1475417731, 1);

-- 栏目表

CREATE TABLE IF NOT EXISTS `tp_cates` (
  `id`        MEDIUMINT(9) NOT NULL AUTO_INCREMENT
  COMMENT '栏目ID',
  `catename` VARCHAR(30)  NOT NULL
  COMMENT '栏目名称',
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 10;

-- 插入数据
INSERT INTO `tp_cates` (`id`, `catename`) VALUES
  (1, '美食'),
  (2, '健身'),
  (3, '养生'),
  (4, '服装'),
  (6, '生活'),
  (7, '娱乐'),
  (8, '婚嫁'),
  (9, '美容');

-- 链接
CREATE TABLE IF NOT EXISTS `tp_links` (
  `id`    MEDIUMINT(9) NOT NULL AUTO_INCREMENT
  COMMENT '链接ID',
  `title` VARCHAR(30)  NOT NULL
  COMMENT '链接标题',
  `url`   VARCHAR(60)  NOT NULL
  COMMENT '链接url',
  `desc`  VARCHAR(255) NOT NULL
  COMMENT '链接说明',
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 3;

-- 插入数据
INSERT INTO `tp_links` (`id`, `title`, `url`, `desc`) VALUES
  (1, '刘枫', 'http://letion.cn', '');

-- 标签
CREATE TABLE IF NOT EXISTS `tp_tags` (
  `id`       MEDIUMINT(9) NOT NULL AUTO_INCREMENT
  COMMENT '标签ID',
  `tagname` VARCHAR(30)  NOT NULL
  COMMENT '标签名称',
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  AUTO_INCREMENT = 5;

-- 插入数据
INSERT INTO `tp_tags` (`id`, `tagname`) VALUES
  (1, '趣事'),
  (2, '奇闻2'),
  (4, '测试');
