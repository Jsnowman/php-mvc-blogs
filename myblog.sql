/*
Navicat MySQL Data Transfer

Source Server         : aaa
Source Server Version : 50709
Source Host           : 127.0.0.1:3306
Source Database       : myblog

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-11-28 13:49:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `count`
-- ----------------------------
DROP TABLE IF EXISTS `count`;
CREATE TABLE `count` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `count` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of count
-- ----------------------------
INSERT INTO `count` VALUES ('1', '51');

-- ----------------------------
-- Table structure for `diary`
-- ----------------------------
DROP TABLE IF EXISTS `diary`;
CREATE TABLE `diary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` varchar(200) NOT NULL,
  `time` varchar(20) NOT NULL DEFAULT '0',
  `sequence` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of diary
-- ----------------------------
INSERT INTO `diary` VALUES ('1', '步入大学', '终于进入了梦寐以求的野山鸡大学', '2013/9/1 10:48', '1');
INSERT INTO `diary` VALUES ('3', '第一行Hello Word', 'void main{ \r\n        printf(\'Hello Word\');\r\n      }', '2013/9/21 10:48', '2');
INSERT INTO `diary` VALUES ('4', '学习JavaWeb', '敲了两年的小黑框终于能看到点东西了!!!\r\n', '2014/4/30 13:48', '3');
INSERT INTO `diary` VALUES ('5', '第一个动态网站', '增删查改,样样精通', '2015/4/30 13:48', '4');
INSERT INTO `diary` VALUES ('6', '学习PHP', '世界上最好的语言', '2015/7/25 13:48', '5');
INSERT INTO `diary` VALUES ('7', '至今. . .', '依旧还是个菜鸟程序员', '2015/11/27 13:48', '6');

-- ----------------------------
-- Table structure for `essay`
-- ----------------------------
DROP TABLE IF EXISTS `essay`;
CREATE TABLE `essay` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `addtime` int(11) NOT NULL,
  `lookcount` int(11) NOT NULL DEFAULT '0',
  `ishome` int(2) NOT NULL DEFAULT '0' COMMENT '是否在首页',
  `isdel` int(2) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `dznum` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of essay
-- ----------------------------
INSERT INTO `essay` VALUES ('7', '滕王阁序', '	时维九月，序属三秋。潦水尽而寒潭清，烟光凝而暮山紫。俨骖騑于上路，访风景于崇阿。临帝子之长洲，得仙人之旧馆。层峦耸翠，上出重霄；飞阁流丹，下临无地。鹤汀凫渚，穷岛屿之萦回；桂殿兰宫，列冈峦之体势。\r\n	披绣闼，俯雕甍，山原旷其盈视，川泽纡其骇瞩。闾阎扑地，钟鸣鼎食之家；舸舰迷津，青雀黄龙之舳。云销雨霁，彩彻区明。落霞与孤鹜齐飞，秋水共长天一色。渔舟唱晚，响穷彭蠡之滨，雁阵惊寒，声断衡阳之浦。\r\n	遥吟俯畅，逸兴遄飞。爽籁发而清风生，纤歌凝而白云遏。睢园绿竹，气凌彭泽之樽；邺水朱华，光照临川之笔。四美具，二难并。穷睇眄于中天，极娱游于暇日。天高地迥，觉宇宙之无穷；兴尽悲来，识盈虚之有数。望长安于日下，目吴会于云间。地势极而南溟深，天柱高而北辰远。关山难越，谁悲失路之人；萍水相逢，尽是他乡之客。怀帝阍而不见，奉宣室以何年？\r\n	嗟乎！时运不齐，命途多舛。冯唐易老，李广难封。屈贾谊于长沙，非无圣主；窜梁鸿于海曲，岂乏明时？所赖君子安贫，达人知命。老当益壮，宁移白首之心？穷且益坚，不坠青云之志。酌贪泉而觉爽，处涸辙以犹欢。北海虽赊，扶摇可接；东隅已逝，桑榆非晚。孟尝高洁，空余报国之情；阮籍猖狂，岂效穷途之哭！\r\n	勃，三尺微命，一介书生。无路请缨，等终军之弱冠；有怀投笔，慕宗悫之长风。舍簪笏于百龄，奉晨昏于万里。非谢家之宝树，接孟氏之芳邻。他日趋庭，叨陪鲤对；今兹捧袂，喜托龙门。杨意不逢，抚凌云而自惜；钟期既遇，奏流水以何惭？\r\n	呜乎！胜地不常，盛筵难再；兰亭已矣，梓泽丘墟。临别赠言，幸承恩于伟饯；登高作赋，是所望于群公。敢竭鄙怀，恭疏短引；一言均赋，四韵俱成。请洒潘江，各倾陆海云尔：\r\n滕王高阁临江渚，佩玉鸣鸾罢歌舞。\r\n画栋朝飞南浦云，珠帘暮卷西山雨。\r\n闲云潭影日悠悠，物换星移几度秋。\r\n阁中帝子今何在？槛外长江空自流。', '1480136775', '57', '1', '0', '2');
INSERT INTO `essay` VALUES ('8', '静夜思', '# 静夜思\r\n床前明月光\r\n疑是地上霜', '1480136932', '24', '0', '0', '1');
INSERT INTO `essay` VALUES ('9', '啊', '|  你好 |北京   |\r\n| ------------ | ------------ |\r\n| 山东  | 河北  |\r\n|  烟台 |  天津 |\r\n', '1480137023', '1', '0', '1', '0');
INSERT INTO `essay` VALUES ('10', '函数', '```php\r\n function addEssay()\r\n   {\r\n       if (!isset($_SESSION[\'uid\']))\r\n       {\r\n           alertMes(\'\',\'/\'.XMM.\'/index/index\');\r\n       }\r\n       var_dump($_POST);\r\n       if(!isset($_POST)){\r\n           alertMes(\'\',\'/\'.XMM.\'/index/index\');\r\n       }\r\n       if(empty($_POST[\'title\'])){\r\n           alertMes(\'标题不能为空\',\'/\'.XMM.\'/admin/fbw\');\r\n       }\r\n\r\n       $data[\'title\'] = $_POST[\'title\'];\r\n       $data[\'content\'] = $_POST[\'content\'];\r\n       $data[\'addtime\'] = time();\r\n\r\n       $essay = Factory::getObj(\'essay\');\r\n       $essay->insert($data);\r\n       alertMes(\'发表成功\',\'/\'.XMM.\'/index/news\');\r\n\r\n   }\r\n```', '1480137744', '0', '0', '1', '0');
INSERT INTO `essay` VALUES ('6', '春江花月夜', '\r\n朝代：唐代\r\n作者：张若虚\r\n原文：\r\n1. 春江潮水连海平，海上明月共潮生。\r\n2. 滟滟随波千万里，何处春江无月明!\r\n3. 江流宛转绕芳甸，月照花林皆似霰;\r\n4. 空里流霜不觉飞，汀上白沙看不见。\r\n5. 江天一色无纤尘，皎皎空中孤月轮。\r\n6. 江畔何人初见月？江月何年初照人？\r\n7. 人生代代无穷已，江月年年望相似。\r\n8. 不知江月待何人，但见长江送流水。\r\n9. 白云一片去悠悠，青枫浦上不胜愁。\r\n10. 谁家今夜扁舟子？何处相思明月楼？\r\n11. 可怜楼上月徘徊，应照离人妆镜台。\r\n12. 玉户帘中卷不去，捣衣砧上拂还来。\r\n13. 此时相望不相闻，愿逐月华流照君。\r\n14. 鸿雁长飞光不度，鱼龙潜跃水成文。\r\n15. 昨夜闲潭梦落花，可怜春半不还家。\r\n16. 江水流春去欲尽，江潭落月复西斜。\r\n17. 斜月沉沉藏海雾，碣石潇湘无限路。\r\n18. 不知乘月几人归，落月摇情满江树。', '1480136623', '14', '1', '0', '0');
INSERT INTO `essay` VALUES ('11', '花月夜测试', '# 朝代：唐代 作者：张若虚 \r\n1. 春江潮水连海平，海上明月共潮生。 \r\n2. 滟滟随波千万里，何处春江无月明!\r\n3. 江流宛转绕芳甸，月照花林皆似霰; \r\n4. 空里流霜不觉飞，汀上白沙看不见。 \r\n5. 江天一色无纤尘，皎皎空中孤月轮。 \r\n6. 江畔何人初见月？江月何年初照人？ \r\n7. 人生代代无穷已，江月年年望相似。 \r\n8. 不知江月待何人，但见长江送流水。 \r\n9. 白云一片去悠悠，青枫浦上不胜愁。 \r\n10. 谁家今夜扁舟子？何处相思明月楼？ \r\n11. 可怜楼上月徘徊，应照离人妆镜台。 \r\n12. 玉户帘中卷不去，捣衣砧上拂还来。 \r\n13. 此时相望不相闻，愿逐月华流照君。 \r\n14. 鸿雁长飞光不度，鱼龙潜跃水成文。 \r\n15. 昨夜闲潭梦落花，可怜春半不还家。 \r\n16. 江水流春去欲尽，江潭落月复西斜。 \r\n17. 斜月沉沉藏海雾，碣石潇湘无限路。 \r\n18. 不知乘月几人归，落月摇情满江树。 \r\n', '1480297320', '9', '0', '0', '0');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'snowman', '79b172c3ee25af1e33a9844c6ec4a1c1');
