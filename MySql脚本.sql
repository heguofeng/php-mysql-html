-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-20 07:37:50
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bysj`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(2) NOT NULL,
  `dateline` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `author`, `description`, `content`, `category_id`, `dateline`) VALUES
(2, '冬季老人防寒保暖6个部位最关键', 'Ricardohe', '冬天天气寒冷，对老人而言，出门冷，在家也冷，因此，冬季如何养生如何保暖成了很多老年朋友最关心的问题。因为一不小心着凉了就有可能感冒发烧流鼻涕，各种麻烦的事情接踵而至，老年人的各个部位都需要做好保健工作。那么，冬季防寒保暖要注意哪些呢?', '<p style=\"text-indent:2em;\">\r\n	冬天天气寒冷，对老人而言，出门冷，在家也冷，因此，冬季如何养生如何保暖成了很多老年朋友最关心的问题。因为一不小心着凉了就有可能感冒发烧流鼻涕，各种麻烦的事情接踵而至，老年人的各个部位都需要做好保健工作。那么，冬季防寒保暖要注意哪些呢?\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	肺部——防肺寒喝热粥散寒\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	人的寿命长短与肺活量大小密切相关，肺活量的大小是衡量一个人健康状况和精力的标志之一。所以，老年养生，除了注重心、脑血管保健外，肺部也应作为重点。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	流鼻涕、咳嗽、头痛……风寒感冒是冬日最常见的毛病。症状较轻的，可以选用一些辛温解表、宣肺散寒的食材，清代《惠直堂经验方》中的神仙粥就不错。有歌云：“一把糯米煮成汤，七根葱白七片姜，熬熟兑入半杯醋，伤风感冒保安康”。温服后上床盖被，微热而出小汗。每日早、晚各1次，连服2天。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	头部——防头寒外出要戴帽子保暖\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	中医认为，“头是诸阳之会”，阳气最容易从头部走散掉，如同热水瓶塞盖子一样。如不注意头部保暖，很容易引发鼻炎、头痛、感冒、牙痛、三叉神经痛等病，甚至更严重的是易诱发脑血管疾患。因此，老人冬天戴一顶合适的帽子是必不可少的，尤其是在外出时。如果只注意身上穿得暖和，而不注意外出时戴帽子，不仅热能会从头部散发，而且又因屋内温度高于户外，还很容易受寒感冒。因此，外出应戴帽子，尤其晨练者更应多注意。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	脚部——防脚寒常做足浴\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	足浴跟热水洗脚不一样。足疗专家介绍，足浴要注意三点。第一是温度，水温最好40℃左右，水淹没踝关节处。第二是时间，每次浸泡20—30分钟，不时添加热水保持水温，泡后皮肤呈微红色为好。第三是按摩，泡足后擦干用手按摩足趾和脚掌心2—3分钟。\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	最后要注意的是，以上三点做完之后最好在半小时内就寝，保证足浴效果。另外，足浴不宜在饭后立即进行，糖尿病人浸泡水温不宜太高。凡烧伤、脓疱疮、水痘、麻疹、足部皮肤皲裂者及足部外伤者均不宜足浴。足浴后立即擦干双脚，注意足部保暖。足浴过程中如出现神志模糊、面色苍白、出冷汗等异常情况应立即停止并及时就诊。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"color:#E53333;\">背部——防背寒睡觉多穿防寒内衣</span>\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	中医认为，“背为阳中之阳”，为“阳脉之海”，是督脉循行之主干，总督人体阳气。老人如背部保暖不好，则风寒之邪通过背部经脉而侵入人体，损伤阳气，使阴阳平衡受到破坏，人体免疫功能下降，抗病能力减弱，引起旧病复发或病情加重。所以保持背部温暖，不仅可防感冒、固肾强腰，而且可防旧病复发、加重。因此，老年人冬季最好增添一件背心。以棉或丝绵为宜，保温隔寒性能好。夜间起床时应披衣防感冒。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<span style=\"color:#E53333;\">脖子——防颈寒戴围巾穿立领装</span>\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	冬是颈椎病高发的季节。颈部是人体的“要塞”，不但充满血管，还有很多重要的穴位，比如大椎穴、风池穴，以及延伸到肩部的肩井穴。穿立领装是个好办法，不但能挡住寒风，给脖子保暖，还能避免头颈部血管因受寒而收缩，对预防高血压病、心血管病、失眠等都有一定的好处。另外，一条得体的围巾、丝巾或者披肩，也能帮助保暖。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	鼻子——防鼻寒晨起冷水搓鼻\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	冬季鼻炎成了许多老人的大麻烦。“不妨以寒制寒!每天早上或者外出之前用冷水搓搓自己的鼻翼。”\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	每天早晚用冷水洗鼻有利于增强鼻黏膜的免疫力，是防治鼻炎的不错办法。用冷水洗鼻子时，顺便揉搓鼻翼可改善鼻黏膜的血液循环，有助缓解鼻塞、打喷嚏等过敏性鼻炎症状。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	老人在冬季如果把这六个部位给保护好了，那么就不会那么容易感冒和生病了，对于已经患有其他疾病的老人来说这样也能改善自己的疾病。\r\n</p>', 1, '2017-04-07 17:05:21'),
(4, '【糖尿病】老人糖尿病如何护理', '超级管理员', '无简介', '　1.密切观察血糖变化：了解病人有无感觉导常，注意检查足部皮肤。有无咳嗽咳痰，有无腹痛及排尿导常。\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	2.正确执行医嘱：准时（餐前、餐中、餐后）准量给予口服降糖药，并观察药物的作用与副作用。注射胰岛素时剂型、剂量、时间要准确，注意轮换注射部位。观察有无低血糖的表现。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	3.饮食护理：遵医嘱控制总热量，使病人了解饮食与治疗的关系。注意定时、定量、定餐、禁食各种甜食，遵守饮食规定。每周定期测量体重，了解饮食是否符合治疗标准。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	4.良好生活环境：保持室内通风，注意保暖，防止上呼吸道感染，做好基础护理，保持口腔卫生，坚持早晚刷牙，饭后漱口。保持皮肤及会阴清洁，避免皮肤感染。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	5.足部护理：每天检查足部一次，观察皮肤颜色温度以及足部神经感觉，足背的动脉搏动等情况。每晚用温水洗足，穿宽松柔软的鞋袜。修剪指甲勿损伤皮肤。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	6.低血糖反应及护理：教育患者及家属认识低血糖反应的表现，如心慌，头晕，出汗，面色苍白，饥饿等．如发生上述现象应立即进食糖类食物或饮料，嘱病人随时携带糖果以备低血糖时用。\r\n</p>', 1, '2017-04-08 12:16:48'),
(5, '【临终护理】呵护生命最后一站', '超级管理员', '什么是临终关怀？\r\n\r\n\r\n　　临终关怀（hospitalpice）是指对生存时间有限（6个月或更少）的患者进行适当的医疗及护理，以减轻其疾病的症状、延缓疾病发展的医疗护理。\r\n\r\n\r\n　　临终关怀的目标是什么？\r\n\r\n\r\n　　临终关怀目标是提高患者的生命质量，通过消除或减轻病痛与其他生理症状，排解心理问题和精神烦恐，令病人内心宁静地面对死亡。同时，临终关怀还能够帮助病患家人承担一些劳累与压力。', '什么是临终关怀？\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	临终关怀（hospitalpice）是指对生存时间有限（6个月或更少）的患者进行适当的医疗及护理，以减轻其疾病的症状、延缓疾病发展的医疗护理。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	临终关怀的目标是什么？\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	临终关怀目标是提高患者的生命质量，通过消除或减轻病痛与其他生理症状，排解心理问题和精神烦恐，令病人内心宁静地面对死亡。同时，临终关怀还能够帮助病患家人承担一些劳累与压力。\r\n</p>\r\n什么是临终关怀？\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	临终关怀（hospitalpice）是指对生存时间有限（6个月或更少）的患者进行适当的医疗及护理，以减轻其疾病的症状、延缓疾病发展的医疗护理。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	临终关怀的目标是什么？\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	临终关怀目标是提高患者的生命质量，通过消除或减轻病痛与其他生理症状，排解心理问题和精神烦恐，令病人内心宁静地面对死亡。同时，临终关怀还能够帮助病患家人承担一些劳累与压力。\r\n</p>\r\n什么是临终关怀？\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	临终关怀（hospitalpice）是指对生存时间有限（6个月或更少）的患者进行适当的医疗及护理，以减轻其疾病的症状、延缓疾病发展的医疗护理。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	临终关怀的目标是什么？\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	临终关怀目标是提高患者的生命质量，通过消除或减轻病痛与其他生理症状，排解心理问题和精神烦恐，令病人内心宁静地面对死亡。同时，临终关怀还能够帮助病患家人承担一些劳累与压力。\r\n</p>', 1, '2017-04-08 12:17:35'),
(6, '我的大学', '超级管理员', '我是麻瓜', '这个写点什么好呢，不知道。2017/4/8<img src=\"/bysjWeb/plugins/kindeditor/attached/image/20170408/20170408161701_79661.jpg\" alt=\"\" height=\"429\" width=\"433\" /><br />', 0, '2017-04-08 22:17:11'),
(7, '打扫打扫', '超级管理员', '大神', '大三的', 5, '2017-04-09 00:44:08'),
(8, '【饮食指导】老年人的饮食养生原则', '超级管理员', '    中老年人养生要多吃蔬菜、水果以及薯类。水果内的维生素和矿物质都远不如的新鲜的绿色蔬菜，不过水果富含葡萄糖、果糖、柠檬酸以及果胶等，还有膳食纤维，具有良好的养生保健效果。', '<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong><img src=\"http://www.360changshi.com/uploadfile/2017/0319/20170319111728294.jpg\" alt=\"\" /><br />\r\n</strong> \r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>老年人的饮食<a href=\"http://www.360changshi.com/jk/\" target=\"_blank\" class=\"keylink\">养生</a>原则</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	中老年人如果想要保持身体健康的花，就一定保持健康的心理状态，还要结合健康的<a href=\"http://www.360changshi.com/ys/\" target=\"_blank\" class=\"keylink\">饮食</a>搭配，规律进行锻炼。做好这些有益于身体养生，为健康加分。接下来来详细学习一些中老年人养生常识吧\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	食物多样，以谷类为主是中老年人养生必须要掌握的知识。不同的食物，其营养成份也不相同。每一种营养成份都是我们身体必需的物质，因此要合理搭配<a href=\"http://www.360changshi.com/ys/\" target=\"_blank\" class=\"keylink\">饮食</a>，营养均衡。而谷物的营养物质全面，碳水化合物丰富，可以为身体提供热量。\r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	中老年人养生要多吃蔬菜、水果以及薯类。水果内的维生素和矿物质都远不如的新鲜的绿色蔬菜，不过水果富含葡萄糖、果糖、柠檬酸以及果胶等，还有膳食纤维，具有良好的养生<a href=\"http://www.360changshi.com/bj/\" target=\"_blank\" class=\"keylink\">保健</a>效果。膳食纤维是一种多糖，很难被人体消化吸收，同时还是维生素、半维生素、木质素以及果胶的一种统称；在人体的肠道内被吸附后，可以加快肠道蠕动，避免致癌物质影响肠黏膜，有些防止消化道肿瘤<a href=\"http://www.360changshi.com/jk/yufang/\" target=\"_blank\" class=\"keylink\">疾病</a>。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	中老年人养生常识还有日常要多吃奶类食物、豆类，还有大豆制品等。奶类、豆类等这些食物都富含了优质的蛋白质、不饱和脂肪酸以及B族<a href=\"http://www.360changshi.com/ys/tags/wss315/\" target=\"_blank\" class=\"keylink\">维生素</a>等物质；而且它们钙的重要来源之一。中老年人特别容易发生缺钙，而老年人的饮食中钙的摄入会特别缺乏。\r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	中老年朋友还要多吃鱼禽蛋及瘦肉，而肥肉和荤油则要节制了。蛋白质可是生命活动的一种基础物质，可以让体液和酸碱维持平衡，还可以运载物质及传递遗传信息等。而上述食物都富含了优质蛋白质，值得老年人多吃。中老年人养生<a href=\"http://www.360changshi.com/\" target=\"_blank\" class=\"keylink\">常识</a>主要有这些。饮食要多样，以谷类为主；蔬菜、水果等要多吃；补充<a href=\"http://www.360changshi.com/ys/tags/dbz454/\" target=\"_blank\" class=\"keylink\">蛋白质</a>可以多吃奶类、豆类等；同时日常的食量还要和自身的体力活动协调，严格控制体重；饮食要清淡少<a href=\"http://www.360changshi.com/ys/tags/y150/\" target=\"_blank\" class=\"keylink\">盐</a>；不要酗酒。食物要保证清洁卫生。\r\n	</p>\r\n<br />', 2, '2017-04-09 10:51:44'),
(9, '【养生之道】老年人的养生保健常识', '超级管理员', '情绪对于人的健康影响起着决定性的作用。常见报导，积极乐观的患者康复的概率是比总是郁郁寡欢的患者的要高的。同理，保持积极乐观的情绪状态对老年人的健康有着重要意义。', '<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong><img src=\"http://www.360changshi.com/uploadfile/2017/0319/20170319101857112.jpg\" alt=\"老年人的养生保健常识\" /><br />\r\n</strong> \r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>老年人的<a href=\"http://www.360changshi.com/jk/\" target=\"_blank\" class=\"keylink\">养生</a>保健常识</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>1、“喝得适当”</strong> \r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	为什么把“喝”独立出来讲呢？首先在现代社会社交似乎离不开酒桌，我们这里强调的就是酒水的饮用。酒精对人体健康的负面作用是不可否认的，过量的饮酒让身体肾脏等各个方面的负担加重。不管是呕吐，还是宿醉都是最好的证明。因此，尤其对于中老年人来说，多喝水，少饮酒才是保健养生的正道。\r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>2、合理<a href=\"http://www.360changshi.com/ys/\" target=\"_blank\" class=\"keylink\">饮食</a></strong> \r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	世间万物讲究平衡以求发展，对于人体来说同样如此。平衡的<a href=\"http://www.360changshi.com/ys/\" target=\"_blank\" class=\"keylink\">饮食</a>搭配是保持健康的身体、保证<a href=\"http://www.360changshi.com/bj/\" target=\"_blank\" class=\"keylink\">保健</a>养生的重要方式。切忌暴饮暴食，最好少吃多餐，并且避免高脂肪食物的过量摄取，否则将打破人体的营养均衡，造成健康受损，出现其他不良的病症。\r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>3、加强人际交往，保持积极健康的情绪状态</strong> \r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	情绪对于人的健康影响起着决定性的作用。常见报导，积极乐观的患者康复的概率是比总是郁郁寡欢的患者的要高的。同理，保持积极乐观的情绪状态对老年人的健康有着重要意义。退休之后，老年人的活动圈子会变小，他们不需要工作，而这会造成他们的自我价值的质疑而时常郁郁寡欢。这时候加强人际关系，进行适当的社交行动，对于保持良好的情绪状态是非常重要的。\r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>4、远离烟</strong> \r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	人类健康危害中最让人忌讳的大凶器之一——烟，同样也是人们最习以为常的压力宣泄途径。现如今，但凡感到压力，尤其是男性总会习惯性地抽烟以宣泄。但是这对于健康<a href=\"http://www.360changshi.com/bj/\" target=\"_blank\" class=\"keylink\">保健</a>来说是非常不利的。尤其对老年人来说，吸烟将大大增加心脏病、癌症等严重病症发生的概率，使得寿命大大缩短。\r\n</p>', 2, '2017-04-09 10:53:12'),
(10, '【养生之道】老年人要如何养生呢？', '超级管理员', '    在不同的食物里面，会含有不同的营养，而且每一种营养都是人体绝对不能够缺少的。所以，老年人养生的时候一定要合理的进行食物的搭配，这样才能够让营养更加全面。', '<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong><img src=\"http://www.360changshi.com/uploadfile/2017/0318/20170318032124210.jpg\" alt=\"老年人要如何养生呢？\" /><br />\r\n</strong> \r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>老年人要如何<a href=\"http://www.360changshi.com/jk/\" target=\"_blank\" class=\"keylink\">养生</a>呢？</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	就老年人来说，养生是非常重要的一个环节，若是没有做好养生，很容易就会令老年人的健康得到损伤，甚至会引起非常严重的疾病，造成更大的危害。很多人不知道老年人养生保健常识有哪些，接下来我们就一起来看看老年人养生的方法吧！\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>1、调节情绪</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	就人的情绪来说，会通过大脑影响到人体的心理活动，还会影响到人体的生理活动。所以，只有保持良好的情绪，能够让人们的内分泌系统和消化吸入以及神经系统时刻都处在最好的状态下。要是老年人经常都处在不良的情绪里面，就会引起疾病，对健康带来很大的影响。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>2、适当多运动</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	在老年人进行适当的运动之后，能够起到抵抗寒冷的作用。尤其是患有心脑血管的老年人，千万不能够进行过量的运动，可以适当的进行一些晨练。同时，在运动的时候也要注意保暖。在冬天的时候，室内外的温差特别大，所以在出入的时候一定要多注意。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>3、保证营养充足的<a href=\"http://www.360changshi.com/ys/\" target=\"_blank\" class=\"keylink\">饮食</a></strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	在不同的食物里面，会含有不同的<a href=\"http://www.360changshi.com/ys/yingyang/\" target=\"_blank\" class=\"keylink\">营养</a>，而且每一种<a href=\"http://www.360changshi.com/ys/yingyang/\" target=\"_blank\" class=\"keylink\">营养</a>都是人体绝对不能够缺少的。所以，老年人养生的时候一定要合理的进行食物的搭配，这样才能够让营养更加全面。一般来说，谷物里面的营养更多，并含有很多的碳水化合物，也是人体能量绝不能少的。\r\n	</p>', 2, '2017-04-09 10:54:02'),
(11, '【强身健体】穴位按摩帮你预防老年痴呆', '超级管理员', '刺激委中穴：委中穴位于腘窝横纹中点，属足太阳膀胱经。其经脉循行可以从头顶入里联络于脑，刺激此部位，可直达脑府，使头脑清利，浑身舒爽。', '<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong><img src=\"http://www.360changshi.com/uploadfile/2017/0309/20170309070306234.jpg\" alt=\"穴位按摩帮你预防老年痴呆\" /><br />\r\n</strong> \r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>穴位按摩帮你预防老年痴呆</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	调查显示，我国北方60岁以上的老年人痴呆患病率为3.96%，经过对痴呆既往病史的研究，发现血管性痴呆占多数。在预防方面，除了要有良好的<a href=\"http://www.360changshi.com/sh/\" target=\"_blank\" class=\"keylink\">生活</a>方式外，下面介绍几组易学易掌握并可促进脑血循环的穴位供老年朋友按摩，可以预防老年痴呆。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>1、按摩四白穴</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	四白穴在下眼眶中点，直下约0.5cm凹陷处.此穴多气多血，刺激该穴对颅内供血作用最好。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>2、按摩双侧风池穴，翳风穴</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	风池穴在项部，枕骨之下，微低头，耳后高骨后一横指凹陷处。翳风穴在耳垂后凹陷处.此组穴可改善基底动脉供血情况。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>3、刺激委中穴</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	委中穴位于腘窝横纹中点，属足太阳膀胱经。其经脉循行可以从头顶入里联络于脑，刺激此部位，可直达脑府，使头脑清利，浑身舒爽。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>4、按摩印堂穴</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	印堂穴位于两眉头连线中点.该穴有改善脑血循环，活化脑细胞，增强记忆力的作用。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	以上诸穴，早晚各按一次，一次20分钟，可交替使用，每次任取一组，长期坚持，能有效预防老年痴呆，到耄耋之年，仍能耳聪目明，思维清晰，反映敏捷，大家不妨一试。\r\n</p>', 2, '2017-04-09 10:54:44'),
(12, '这些食物能帮助老人降低胆固醇', '超级管理员', '有人认为吃牡蛎、蛤肉、螃蟹对人体心脏血管系统有害，其实不然。华盛顿大学的研究证实，低脂肪的海鲜食品能', '<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong><img src=\"http://www.360changshi.com/uploadfile/2017/0309/20170309070040695.jpg\" alt=\"这些食物能帮助老人降低胆固醇\" /><br />\r\n</strong> \r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>这些食物能帮助老人降低胆固醇</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	血液中胆固醇含量增高易患冠心病及动脉硬化，早已为医学界所公认。一些人特别是老年人为了降低血中胆固醇，往往依赖于药物，殊不知，某些日常食物同样有降低胆固醇的作用。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>海鱼</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	海鱼中含有大量高级不饱和脂肪酸，可降低血中胆固醇含量。普查资料表明，冠心病患病率最低者，首推沿海渔区居民，这无疑和他们长期吃鱼有关。鱼油还能被人体中的酶分解成多种化学物质，在人体内能起止痛、消炎、抗高血压和抗凝血的作用。不过，只有<a href=\"http://www.360changshi.com/sh/\" target=\"_blank\" class=\"keylink\">生活</a>在温度较低的海水中的沙丁鱼、鲭鱼、鲑鱼、鲱鱼、马鲛鱼、大马哈鱼和金枪鱼等才含有这种能降胆固醇的鱼油。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>海鲜</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	有人认为吃牡蛎、蛤肉、螃蟹对人体心脏血管系统有害，其实不然。华盛顿大学的研究证实，低脂肪的海鲜食品能使人体血中“有害胆固醇”的含量降低9%左右。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>洋葱、大蒜</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	每天食用一个中等大小的洋葱，能使血中“有害胆固醇”转化成有益心脏的胆固醇，是防止心血管疾病的好办法。大蒜也可使血中胆固醇降低，使主动脉脂质沉着减少。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>香菇、木耳</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	据实验，香菇、木耳降胆固醇的作用比西药安妥明强10倍。但须注意，木耳的有效成分主要在水溶性部分；香菇的作用菌帽大于茎部。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>豆类</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	经常食用黄豆及其制品，可使血中胆固醇含量显著降低，这与豆类含有人体必需氨基酸有关。意大利的一项研究证明，黄豆的蛋白质确实能中和高脂肪<a href=\"http://www.360changshi.com/ys/\" target=\"_blank\" class=\"keylink\">饮食</a>的影响。医生发现，让志愿者每天进食一杯斑豆或青豆，可使体内胆固醇平均减少19%。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>植物油</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	植物油多含有不饱和脂肪酸，能降低血中胆固醇，尤以芝麻油、玉米油为佳，花生油、椰子油次之。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>冬瓜</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	冬瓜水分大、热量低，既能减肥又能降胆固醇，促进体内脂肪消耗。而体内积存的过量水分，因冬瓜利尿，也能消除。所以冬瓜对中老年肥胖者尤其有益。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>脱脂牛奶、酸乳酪</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	许多人担心喝了牛奶会增加血中胆固醇，其实这是没有科学根据的。近年来，医学家们认为牛奶本身虽含有一定的胆固醇，但又含有能降低胆固醇的乳清酸物质，这种物质摄入体内，便能有效抑制胆固醇的生物合成，其作用远远超过了由牛奶本身所带入人体内的胆固醇量。医学家发现，一个长期饮用脱脂牛奶或酸乳酪的人，其胆固醇含量比一般的患者少50%。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>苹果、葡萄</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	它们也含有令人惊奇的降胆固醇物质。在一次实验中。30位中年男女在一个月中每天吃两三只苹果，结果，80%的人的胆固醇降低，有一半人降低10%以上。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\"> <strong>茶叶</strong> \r\n</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	国外研究证实，饮茶能降低血中胆固醇和防止动脉粥样硬化。我国冠心病普查资料显示，茶区居民的血胆固醇含量和冠心病患病率都比较低；牧民虽以肉食为主，但因饮茶和运动的缘故，此类<a href=\"http://www.360changshi.com/jk/yufang/\" target=\"_blank\" class=\"keylink\">疾病</a>的发病率也较低。\r\n	</p>\r\n<p style=\"text-indent:2em;color:#333333;font-family:΢���ź�, \" font-size:15px;font-style:normal;font-weight:normal;text-align:left;background-color:#ffffff;\"=\"\">\r\n	此外，近年来科学家在<a href=\"http://www.360changshi.com/ys/tags/dm160/\" target=\"_blank\" class=\"keylink\">大麦</a>、<a href=\"http://www.360changshi.com/ys/tags/ym175/\" target=\"_blank\" class=\"keylink\">玉米</a>、胡萝卜、茄子、<a href=\"http://www.360changshi.com/ys/tags/zz533/\" target=\"_blank\" class=\"keylink\">橄榄</a>油等食物中亦发现了可以帮助降低胆固醇的化学物质。\r\n</p>', 2, '2017-04-09 10:55:23'),
(13, '关于养老院', '超级管理员', '', '<h3 class=\"RYDTitle02\" style=\"font-size:16px;color:#4C8E05;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;\">\r\n	生态养老 父母休假养老的最佳选择\r\n</h3>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	快乐养老院位于温州医科大学附属养老院，优越的地理位置，秀丽的田园风光，温馨的居住环境，便捷的交通，观青山苍翠，神清气爽，无不洋溢着浓郁的生活风情。更有星级单人间房、温馨双人房、功能齐全的多人医疗护理房等为您的入住提供不同的选择。\r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	完善的生活设施：房间内均配备有独立的卫生间和沐浴室，空调、电视、电话、多用餐台、写字台、休闲沙发等日常生活设施。在床头、卫生间和公共活动场所均有中央呼叫系统，随时可以呼叫服务人员。\r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<h3 class=\"RYDTitle02\" style=\"font-size:16px;color:#4C8E05;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;\">\r\n	优美的环境和完善的设施\r\n</h3>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	养老院应用国内外先进的管理、服务理念，集养老、医护为一体，既为生活自理老人提供休闲养老，又为因病或年迈而生活不能自理的老人提供医疗特别看护。养老院分为两个相对独立的区域：一、休闲居住区而；二、医疗看护区；每个区都拥有齐全的配套设施尽可能的为老人提供全方位的优质服务。\r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	专业的服务团队：养老院由行内资深院长全权负责管理，结合养老院规范与四川全新的养老管理、服务理念；养老院还配有经过严格培训的专业医护人员、心理专家、专业营养师、厨师、点心师等。\r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<h3 class=\"RYDTitle02\" style=\"font-size:16px;color:#4C8E05;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;\">\r\n	科学的膳食和丰富的精神生活\r\n</h3>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	养老院除为老人提供温馨的居住环境和细心的医疗呵护外，还为老人提供科学的营养膳食和多样化的文化娱乐设施，开展丰富多彩的文娱活动。培养老人的兴趣爱好，让每位老人享受充实的生活。<span style=\"line-height:1.5;\"></span>\r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	科学膳食：养老院食堂严格执行食品卫生标准，专业营养师精心制定营养食谱，品种丰富多样，即可包餐，也可单点。且其还设立清真食品等少数民族单灶，特别是对低糖、低盐、流质、鼻饲要求的老人制定个性化营业食谱方案。\r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	丰富的精神文化生活：这里有完备的康娱设施和文体休闲场所，包括：多功能影视厅、健身室、棋牌室、手工制作室、足浴房理发室等。\r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:24px;color:#337FE5;\"><em>联系地址：温州医科大学茶山校区</em></span> \r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:24px;color:#006600;\"><em>联系人：Ricardohe</em></span> \r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:24px;color:#FF9900;\"><em>联系电话：15888274549</em></span> \r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#454545;text-indent:28px;background-color:#FFFFFF;\">\r\n	<span style=\"font-size:32px;color:#FF9900;\"> </span><span style=\"font-size:32px;color:#FF9900;\"> </span><span style=\"font-size:32px;color:#FF9900;\"> </span><span style=\"font-size:32px;color:#FF9900;\"> </span><span style=\"font-size:32px;color:#FF9900;\"> </span><span style=\"font-size:32px;color:#FF9900;\"><em><span style=\"font-size:24px;\">664549</span></em><img src=\"/bysjWeb/plugins/kindeditor/attached/image/20170409/20170409064919_39003.jpg\" alt=\"\" title=\"\" align=\"\" height=\"394\" width=\"700\" /></span> \r\n</p>', 3, '2017-04-09 12:49:39'),
(14, '养老院服务特色', '超级管理员', '', '<ul>\r\n	<li>\r\n		<img alt=\"\" src=\"http://www.zgfhsz.com/upLoad/album/month_1701/201701111623512033.jpg\" title=\"\" align=\"left\" height=\"105\" width=\"145\" /> \r\n		<div>\r\n			<h4>\r\n				<span style=\"color:#009900;\">专业的服务管理团队</span>\r\n			</h4>\r\n由行内资深院长全权负责管理，结合养老机构管理规范与全新的养老管理、服务理念、方法接轨，配备富有经验的医护人员、心理专家、专业营养师、厨师、点心师等。所有服务人员均经过严格考核持证上岗。\r\n		</div>\r\n	</li>\r\n	<li>\r\n		<br />\r\n	</li>\r\n	<li>\r\n		<br />\r\n	</li>\r\n	<li>\r\n		<img alt=\"\" src=\"http://www.zgfhsz.com/upLoad/album/month_1701/201701111623204952.jpg\" title=\"\" align=\"left\" height=\"105\" width=\"145\" /> \r\n		<div>\r\n			<h4>\r\n				<span style=\"color:#009900;\">特色的医疗护理服务</span>\r\n			</h4>\r\n规范的内设医疗机构设有内科、外科、中医科，为老人提供给药、输液、注射、供氧、导尿、灌肠、鼻饲、褥疮等日常医疗护理；建立120联动机制；免费为老人建立健康档案，定期体检。进行疾病动态观察和健康监测，协助进行专家会诊。\r\n		</div>\r\n	</li>\r\n	<li>\r\n		<br />\r\n	</li>\r\n	<li>\r\n		<br />\r\n	</li>\r\n	<li>\r\n		<img alt=\"\" src=\"http://www.zgfhsz.com/upLoad/album/month_1701/201701111622434944.jpg\" title=\"\" align=\"left\" height=\"105\" width=\"145\" />\r\n	</li>\r\n	<li>\r\n		<strong><span style=\"color:#009900;\">有专业的康复方针</span></strong>\r\n		<div>\r\n			内设医疗机构配备了必要的医疗护理和医疗康复设备，随时进行血压、血糖监测，常见病、多发病院内即可完成诊疗。针灸、推拿、理疗等为老人康复提供帮助。完成对老人在明确诊断，确定治疗方案后的延续治疗。\r\n		</div>\r\n	</li>\r\n	<li>\r\n		<br />\r\n	</li>\r\n	<li>\r\n		<br />\r\n	</li>\r\n	<li>\r\n		<img alt=\"\" src=\"http://www.zgfhsz.com/upLoad/album/month_1701/201701111622158127.jpg\" title=\"\" align=\"left\" height=\"105\" width=\"145\" /> \r\n		<div>\r\n			<h4>\r\n				<span style=\"color:#009900;\">贴心的日常</span><span style=\"color:#009900;\">生活护理</span>\r\n			</h4>\r\n\"奉若父母，如同亲生”，对入住老人从健康教育与维护、心理疏导、户外活动、物质代管、购物助引、口腔护理、沐浴更衣、修剪指甲、端水喂饭、二便护理等，这些细小环节均建立了具体的服务标准和流程。24小时全天候服务，确保老人开心、家属放心。\r\n		</div>\r\n	</li>\r\n	<li>\r\n		<br />\r\n	</li>\r\n	<li>\r\n		<br />\r\n	</li>\r\n	<li>\r\n		<img alt=\"\" src=\"http://www.zgfhsz.com/upLoad/album/month_1701/201701111621595706.jpg\" title=\"\" align=\"left\" height=\"105\" width=\"145\" /> \r\n		<div>\r\n			<h4>\r\n				<span style=\"color:#009900;\">完善的生活设施</span>\r\n			</h4>\r\n房间内均配备有独立的卫生间和沐浴室，空调、电视、电话、多用餐台、写字台、休闲沙发等一应俱全。中央呼叫系统分布在床头、卫生间和公共活动场地，可随时呼叫服务人员，每个区域配备冰箱、微波炉供老人使用。\r\n		</div>\r\n	</li>\r\n</ul>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<br />\r\n</p>', 4, '2017-04-09 19:04:43'),
(15, '生活照料', '', '', '<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n	<strong>服务内容：</strong>护理员对入住老人从健康教育与维护、心理疏导、户外活动、物质代管、购物助引、口腔护理、沐浴更衣、修剪指甲、端水喂饭、个人卫生、房间打扫、如厕、用药提醒二便护理等；配置必要的康复理疗设备，提高入住老人生活质量。\r\n</p>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n	护理员提供24小时日常生活照料规范化流程，每天一共要进行22个护理流程，平均每35分钟就要为患者进行一项服务，全方位的生活照料保证患者享受洁净舒适的晚年生活。\r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<img src=\"http://www.zgfhsz.com/Templates/cn/images/fw18.jpg\" />\r\n</p>', 6, '2017-04-20 11:52:10'),
(16, '医疗护理', '', '', '<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n	<span>服务内容</span>\r\n</h3>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n	实行科学规范的医生三级查房制度、护士医疗护理制度；诊疗范围以传统医学、老年病、康复医学为特色，为住养老人提供常见病、多发病的检查和治疗，护士定期巡诊进行体温、脉搏、呼吸血压、体重指标检测。\r\n</p>\r\n<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n	<span>服务原则</span>\r\n</h3>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n	1）对病情稳定的患病老人提供相应的（药物管理、吸氧护理、观察体温、脉博、血压、口腔护理、伤口护理、鼻胃管护理、褥疮护理、造瘘护理、排泄护理、失禁护理、会阴护理、留置导尿管）的护理。<br />\r\n2）对偶患小毛小病的老人，经家属同意进行及时的常规治疗，并以医保结算。<br />\r\n3）及时对重病老人送医院救治。\r\n</p>\r\n<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n	<span>医疗紧急救护系统</span>\r\n</h3>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n	1）配有医护值班室、监控室，经验丰富的医生、护士24小时驻守，为长者的健康安全提供坚实的保障；<br />\r\n2）与就近的专业医保定点医院合作，并免费为入住老人建立120联动机制，设立绿色就诊通道，让发生急症的长者第一时间被发现并迅速就诊。\r\n</p>\r\n<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n	<span>全面医疗设施</span>\r\n</h3>\r\n<p style=\"text-align:center;\">\r\n	<img src=\"http://www.zgfhsz.com/upLoad/image/20170111/14841158896808988.jpg\" title=\"QQ截图20170111142438.jpg\" alt=\"QQ截图20170111142438.jpg\" />\r\n</p>', 7, '2017-04-20 11:52:50'),
(17, '喜欢打麻将', '', '', '<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n	<span>体育娱乐生活管理</span>\r\n</h3>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n	组织晨操，日常回春操保健舞，学习太极拳,院内健身器材齐备。<br />\r\n身体保健养生运动<br />\r\n老人兴趣培养计划<br />\r\n公益性敬老活动\r\n</p>', 8, '2017-04-20 11:53:31'),
(18, '健康管理', '', '', '<div class=\"singleRgiht\">\r\n	<div class=\"RYintroduction\">\r\n		<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n			<span>健康评估</span>\r\n		</h3>\r\n		<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n			长者入住伊始，我们就为其建立健康档案，实施健康评估，并且有医务人员定期对长者进行健康检查，提前发现健康问题，防范于未然。\r\n		</p>\r\n		<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n			<span>中医养生保康</span>\r\n		</h3>\r\n		<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n			引进中医的砭、针、灸、药、导引按跷五大中医保健疗法。不仅能对老人常见病多发病起到意想不到的疗效，它还有温经通络、消瘀散结、补中益气、预防疾病，延年益寿的功效。\r\n		</p>\r\n		<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n			<span>保健理疗</span>\r\n		</h3>\r\n		<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n			养老院专门配置了通过电流程序产生推、拿、敲、震颤等方式促进局部组织血液循环和淋巴回流达到镇痛、消炎、提高肌力，治疗神经损伤，促进肌肉运动及神经再生功能作用的中、低频脉冲康复治疗仪。\r\n		</p>\r\n		<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n			<span>康复训练</span>\r\n		</h3>\r\n		<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n			并与之配套，增设了理疗室、观察室及康复训练室，为有肢体功能障碍的脑梗后遗症患者恢复肢体运动及移动行走功能，为轻中度老年痴呆患者延缓衰退，适当恢复记忆和保持现有思维功能，创造了良好的基础条件，在我院预防保健治疗师的指导下，每周定期为需要康复的老人进行各种康复运动，充分满足了在院老人对康复训练、防病健身的需要。\r\n		</p>\r\n		<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n			<img src=\"/my-bysj/bysjWeb/plugins/kindeditor/attached/image/20170420/20170420055454_87634.jpg\" alt=\"\" title=\"\" align=\"\" height=\"394\" width=\"700\" />\r\n		</p>\r\n	</div>\r\n</div>', 9, '2017-04-20 11:55:17'),
(19, '营养膳食', '', '', '<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n	<span>营养需要</span>\r\n</h3>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n	在老人伙食方面，为确保老人一日三餐科学、合理，既要适合老人咀嚼，又要满足老人营养需要，院内配备了国家三级烹饪师、二级红案烹饪师及国家三级面点师各一名，力求做到配餐合理，品种齐全，营养丰富，大大提高了在院老人的伙食满意度。\r\n</p>\r\n<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n	<span>营养食疗</span>\r\n</h3>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n	护理院营养科针对每位入住患者的疾病特点和营养需求，特别是需流质饮食或鼻饲患者制定合理的饮食方案，同时对一般卧床患者制定配合治疗的食疗方案。\r\n</p>\r\n<h3 style=\"font-size:18px;font-weight:normal;font-family:微软雅黑;color:#454545;background:url(;\">\r\n	<span>进食护理</span>\r\n</h3>\r\n<p style=\"font-size:14px;font-family:arial, 宋体, sans-serif;color:#666666;background-color:#FFFFFF;\">\r\n	护理员按时照顾患者进食，保证患者吃饱吃好。必要时给以喂食，对吞咽困难者给以缓慢进食，以防噎食呛咳。\r\n</p>\r\n<p style=\"text-align:center;\">\r\n	<img src=\"http://www.zgfhsz.com/Templates/cn/images/fw17.jpg\" />\r\n</p>', 10, '2017-04-20 11:56:20'),
(20, '加入我们吧', 'Ricardohe', '', '<p style=\"text-indent:2em;\">\r\n	该养老院目前不招人。。。你们有需要，可以招他\r\n</p>\r\n<p style=\"text-indent:2em;\">\r\n	<img src=\"/my-bysj/bysjWeb/plugins/kindeditor/attached/image/20170420/20170420073253_89142.png\" alt=\"\" />\r\n</p>', 11, '2017-04-20 13:32:57');

-- --------------------------------------------------------

--
-- 表的结构 `art_category`
--

CREATE TABLE `art_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `art_category`
--

INSERT INTO `art_category` (`id`, `category`) VALUES
(1, '专业护理'),
(2, '保健常识'),
(3, '关于养老院'),
(4, '服务特色'),
(5, '人才招聘'),
(6, '生活照料'),
(7, '医疗护理'),
(8, '娱乐活动'),
(9, '健康管理'),
(10, '营养膳食'),
(11, '人才招聘');

-- --------------------------------------------------------

--
-- 表的结构 `bed`
--

CREATE TABLE `bed` (
  `id` int(10) UNSIGNED NOT NULL,
  `bed_id` int(10) NOT NULL,
  `room_id` int(10) DEFAULT NULL,
  `floor_id` int(10) DEFAULT NULL,
  `building_id` varchar(10) DEFAULT NULL,
  `charge` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `is_used` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bed`
--

INSERT INTO `bed` (`id`, `bed_id`, `room_id`, `floor_id`, `building_id`, `charge`, `user_id`, `is_used`) VALUES
(1, 1, 101, 1, '1', 1950, NULL, 0),
(2, 2, 101, 1, '1', 1950, NULL, 0),
(3, 3, 101, 1, '1', 1950, NULL, 0),
(4, 4, 101, 1, '1', 1950, NULL, 0),
(5, 1, 102, 1, '1', 1950, NULL, 0),
(6, 2, 102, 1, '1', 1950, NULL, 0),
(7, 3, 102, 1, '1', 1950, NULL, 0),
(8, 4, 102, 1, '1', 1950, NULL, 0),
(9, 1, 103, 1, '1', 1950, NULL, 0),
(10, 2, 103, 1, '1', 1950, NULL, 0),
(11, 3, 103, 1, '1', 1950, NULL, 0),
(12, 4, 103, 1, '1', 1950, NULL, 0),
(13, 1, 201, 2, '1', 1950, NULL, 0),
(14, 2, 201, 2, '1', 1950, NULL, 0),
(15, 3, 201, 2, '1', 1950, NULL, 0),
(16, 4, 201, 2, '1', 1950, NULL, 0),
(17, 1, 202, 2, '1', 1950, 50, 1),
(18, 2, 202, 2, '1', 1950, NULL, 0),
(19, 3, 202, 2, '1', 1950, NULL, 0),
(20, 4, 202, 2, '1', 1950, 52, 1),
(21, 1, 203, 2, '1', 1950, NULL, 0),
(22, 2, 203, 2, '1', 1950, NULL, 0),
(23, 3, 203, 2, '1', 1950, NULL, 0),
(24, 4, 203, 2, '1', 1950, NULL, 0),
(25, 1, 301, 3, '1', 1950, NULL, 0),
(26, 2, 301, 3, '1', 1950, NULL, 0),
(27, 3, 301, 3, '1', 1950, NULL, 0),
(28, 4, 301, 3, '1', 1950, NULL, 0),
(29, 1, 302, 3, '1', 1950, NULL, 0),
(30, 2, 302, 3, '1', 1950, NULL, 0),
(31, 3, 302, 3, '1', 1950, NULL, 0),
(32, 4, 302, 3, '1', 1950, NULL, 0),
(33, 1, 303, 3, '1', 1950, NULL, 0),
(34, 2, 303, 3, '1', 1950, NULL, 0),
(35, 3, 303, 3, '1', 1950, NULL, 0),
(36, 4, 303, 3, '1', 1950, NULL, 0),
(37, 1, 401, 4, '1', 1950, NULL, 0),
(38, 2, 401, 4, '1', 1950, NULL, 0),
(39, 3, 401, 4, '1', 1950, NULL, 0),
(40, 4, 401, 4, '1', 1950, NULL, 0),
(41, 1, 402, 4, '1', 1950, NULL, 0),
(42, 2, 402, 4, '1', 1950, NULL, 0),
(43, 3, 402, 4, '1', 1950, NULL, 0),
(44, 4, 402, 4, '1', 1950, NULL, 0),
(45, 1, 403, 4, '1', 1950, NULL, 0),
(46, 2, 403, 4, '1', 1950, 53, 1),
(47, 3, 403, 4, '1', 1950, NULL, 0),
(48, 4, 403, 4, '1', 1950, NULL, 0),
(49, 1, 501, 5, '1', 1950, NULL, 0),
(50, 2, 501, 5, '1', 1950, NULL, 0),
(51, 3, 501, 5, '1', 1950, NULL, 0),
(52, 4, 501, 5, '1', 1950, NULL, 0),
(53, 1, 502, 5, '1', 1950, NULL, 0),
(54, 2, 502, 5, '1', 1950, NULL, 0),
(55, 3, 502, 5, '1', 1950, NULL, 0),
(56, 4, 502, 5, '1', 1950, NULL, 0),
(57, 1, 503, 5, '1', 1950, NULL, 0),
(58, 2, 503, 5, '1', 1950, NULL, 0),
(59, 3, 503, 5, '1', 1950, NULL, 0),
(60, 4, 503, 5, '1', 1950, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `d_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `department`
--

INSERT INTO `department` (`id`, `d_name`) VALUES
(7, '22'),
(9, 'gaga'),
(8, 'ok了'),
(10, '市场部'),
(4, '微微羞羞部门'),
(11, '打算打'),
(1, '护理部1'),
(5, '测试'),
(2, '维修部');

-- --------------------------------------------------------

--
-- 表的结构 `dic_hljb`
--

CREATE TABLE `dic_hljb` (
  `id` int(10) UNSIGNED NOT NULL,
  `hljb` varchar(20) NOT NULL,
  `hlbz` text,
  `hsf` int(10) DEFAULT NULL,
  `cwf` int(10) DEFAULT NULL,
  `hlf` int(10) DEFAULT NULL,
  `deposit` int(10) NOT NULL,
  `allCost` int(10) DEFAULT NULL,
  `bz` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dic_hljb`
--

INSERT INTO `dic_hljb` (`id`, `hljb`, `hlbz`, `hsf`, `cwf`, `hlf`, `deposit`, `allCost`, `bz`) VALUES
(1, '三级护理', '包吃住，洗衣服、床单，送开水', 580, 1950, 450, 666, 3646, '完全自理'),
(2, '二级护理', ' 含：三级护理服务。\n协助洗头、洗澡、洗脚、穿衣、送饭', 580, 1950, 1450, 777, 4757, '无备注'),
(3, '一级护理', '  含：二、三级护理服务。\n大小便协助，老年痴呆', 580, 1950, 2450, 888, 5868, '不能自理者'),
(4, '专门护理', '  含：一、二、三级护理服务。\n吃饭，大小便失禁', 580, 1950, 3450, 1000, 6980, '');

-- --------------------------------------------------------

--
-- 表的结构 `dic_hyzk`
--

CREATE TABLE `dic_hyzk` (
  `id` int(10) UNSIGNED NOT NULL,
  `hyzk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dic_hyzk`
--

INSERT INTO `dic_hyzk` (`id`, `hyzk`) VALUES
(4, '丧偶'),
(1, '已婚'),
(2, '未婚'),
(3, '离异');

-- --------------------------------------------------------

--
-- 表的结构 `dic_xlzk`
--

CREATE TABLE `dic_xlzk` (
  `id` int(10) UNSIGNED NOT NULL,
  `xlzk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dic_xlzk`
--

INSERT INTO `dic_xlzk` (`id`, `xlzk`) VALUES
(5, '专科'),
(3, '中职'),
(2, '初中'),
(8, '博士'),
(1, '小学'),
(6, '本科'),
(7, '硕士'),
(4, '高中');

-- --------------------------------------------------------

--
-- 表的结构 `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `sex` enum('男','女','保密') NOT NULL DEFAULT '保密',
  `phone` varchar(20) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `isJob` tinyint(1) DEFAULT '1',
  `isAdmin` tinyint(1) DEFAULT '0',
  `d_id` int(10) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `name`, `sex`, `phone`, `photo`, `isJob`, `isAdmin`, `d_id`, `createDate`) VALUES
(1, 'super', '1b3231655cebb7a1f783eddf27d254ca', '超级管理员', '男', '15888274549', '313dd6f2cfc47571c661db9795c91f7e.jpg', 1, 2, 2, '2017-04-16 08:30:35'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Ricardohe', '女', '13213131', '44e1962b72ff69ec621c6f72cd12e7b1.jpg', 1, 1, 1, '2017-04-16 08:30:35'),
(5, 'hgf', 'd187535d40b96a60387e8dff44b0c491', 'sdadasdasd', '男', '111', 'b1a2b1a5ef3d09cfc1a1cad8ccf730d1.png', 2, 0, 7, '2017-04-16 08:30:35'),
(6, 'king', 'b2086154f101464aab3328ba7e060deb', '呵呵呵呵呵', '女', '111', '39d39a8861a9090d4e281f5357109d5b.jpg', 1, 0, 4, '2017-04-16 08:30:35'),
(7, '11111111', 'b0baee9d279d34fa1dfd71aadb908c3f', '', '男', '11', '7db09325c0779d06976f65c50e8a6f21.png', 1, 0, 7, '2017-04-16 08:30:35'),
(8, '111', '698d51a19d8a121ce581499d7b701668', '', '男', '111', '813afb96d7615c053987844270518386.jpg', 1, 0, 7, '2017-04-16 08:30:35'),
(9, 'employee', 'fa5473530e4d1a5a1e1eb53d2fedb10c', '', '男', '231243123412', '12dff0310cfca8f0b50280858401b8fb.jpg', 1, 0, 7, '2017-04-16 08:30:35'),
(10, '2929292', 'bbd4137c75cb09cfaa03a994a4476c24', '', '男', '15888274549', '6366dbac880ebf247e119455447808a9.jpg', 1, 0, 2, '2017-04-16 08:31:34'),
(11, 'test', '098f6bcd4621d373cade4e832627b4f6', 'h', '男', '15888274549', 'be4fc9a54ab7127ffd376fe604ca6358.jpg', 2, 0, 4, '2017-04-20 03:00:03'),
(12, '1', 'c4ca4238a0b923820dcc509a6f75849b', '', '男', '1', '3f05e1aaac51693e89bee5a9c43c9af3.jpg', 1, 0, 1, '2017-04-20 03:07:05');

-- --------------------------------------------------------

--
-- 表的结构 `leavenote`
--

CREATE TABLE `leavenote` (
  `id` int(10) UNSIGNED NOT NULL,
  `startTime` date DEFAULT NULL,
  `finishTime` date DEFAULT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `pass` tinyint(1) DEFAULT '0',
  `e_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `leavenote`
--

INSERT INTO `leavenote` (`id`, `startTime`, `finishTime`, `reason`, `status`, `pass`, `e_id`) VALUES
(1, '2017-03-01', '2017-03-20', '111', 1, 0, 2),
(3, '2017-03-13', '2017-03-20', 'hi昂没想到', 1, 1, 2),
(4, '2017-03-06', '2017-03-20', '111', 1, 0, 2),
(6, '2017-03-15', '2017-03-20', '', 1, 0, 2),
(8, '0000-00-00', '0000-00-00', '', 1, 0, 2),
(9, '0000-00-00', '0000-00-00', '', 1, 0, 2),
(10, '0000-00-00', '0000-00-00', '', 1, 0, 2),
(11, '0000-00-00', '0000-00-00', '', 1, 0, 2),
(12, '0000-00-00', '0000-00-00', '', 1, 1, 2),
(13, '2017-02-28', '2017-02-28', ' ', 1, 0, 2),
(14, '0000-00-00', '0000-00-00', '', 1, 0, 2),
(15, '0000-00-00', '0000-00-00', '', 0, 0, 2),
(18, '0000-00-00', '0000-00-00', '', 0, 0, 2),
(19, '0000-00-00', '0000-00-00', '', 0, 0, 2),
(20, '0000-00-00', '0000-00-00', '', 0, 0, 2),
(21, '0000-00-00', '0000-00-00', '', 1, 1, 2),
(22, '0000-00-00', '0000-00-00', '', 1, 1, 2),
(23, '2017-03-01', '2017-03-02', '啊啊啊', 1, 1, 2),
(24, '2017-03-08', '2017-03-21', '我想回家了', 1, 0, 2),
(25, '2017-03-01', '2017-03-22', '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', 1, 1, 2),
(26, '2017-03-14', '2017-03-14', '阿打算打算的撒', 0, 0, 2),
(28, '2017-03-07', '2017-03-07', '11', 0, 0, 2),
(29, '2017-03-22', '2017-03-22', '11111111111111', 0, 0, 0),
(30, '2017-02-28', '2017-02-28', '111', 0, 0, 0),
(31, '2017-03-28', '2017-03-28', '222', 0, 0, 0),
(32, '2017-03-07', '2017-03-14', '111111', 1, 0, 1),
(33, '2017-03-08', '2017-03-08', '凄凄切切', 0, 0, 0),
(34, '2017-03-15', '2017-03-22', '11', 0, 0, 2),
(35, '2017-03-07', '2017-03-22', '我是大', 1, 1, 1),
(38, '2017-03-14', '2017-03-22', 'dsads', 0, 0, 5),
(39, '2017-03-07', '2017-03-15', '11', 1, 0, 1),
(41, '2017-03-15', '2017-03-15', '修改一次，吃饭', 0, 0, 6),
(42, '2017-03-15', '2017-03-15', '佛挡杀佛', 0, 0, 41),
(43, '2017-03-01', '2017-03-23', '哈哈哈哈', 0, 0, 41),
(44, '2017-03-21', '2017-03-21', '啊啊啊', 0, 0, 40),
(48, '2017-03-15', '2017-03-15', '12312', 0, 0, 12),
(49, '2017-03-14', '2017-03-22', '打扫打扫大所多撒大所', 0, 0, 14),
(50, '2017-03-15', '2017-03-15', '1111111111111111111', 0, 0, 14),
(51, '2017-03-08', '2017-03-08', '打算打打死', 0, 0, 15),
(52, '2017-03-09', '2017-03-09', '111111111111111', 0, 0, 16),
(53, '2017-03-14', '2017-03-14', '2222', 0, 0, 17),
(54, '2017-02-28', '2017-03-01', '打扫打扫', 0, 0, 1),
(55, '2017-03-15', '2017-03-16', '我肚子不舒服', 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `pay_records`
--

CREATE TABLE `pay_records` (
  `id` int(15) UNSIGNED NOT NULL,
  `pay_status` tinyint(1) DEFAULT '0',
  `user_id` int(10) DEFAULT NULL,
  `pay_time` datetime NOT NULL,
  `pay_money` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pay_records`
--

INSERT INTO `pay_records` (`id`, `pay_status`, `user_id`, `pay_time`, `pay_money`) VALUES
(10000025, 1, 52, '2017-04-18 03:50:53', 3646),
(10000029, 1, 50, '2017-04-18 12:42:10', 4757);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_username` varchar(32) DEFAULT NULL,
  `u_pwd` varchar(50) DEFAULT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `u_photo` varchar(50) DEFAULT NULL,
  `u_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_sex` enum('男','女','保密') NOT NULL DEFAULT '保密',
  `u_mz` varchar(20) DEFAULT NULL,
  `u_birth` date DEFAULT NULL,
  `u_hyzk` tinyint(1) DEFAULT NULL,
  `u_xlzk` tinyint(1) NOT NULL,
  `u_hljb` tinyint(1) NOT NULL,
  `u_sflx` tinyint(1) NOT NULL,
  `u_phone` varchar(20) NOT NULL,
  `u_bed` int(10) NOT NULL,
  `checkIn_date` date NOT NULL,
  `checkOut_date` date NOT NULL,
  `balance` int(10) NOT NULL,
  `pay_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `u_username`, `u_pwd`, `u_email`, `u_createDate`, `u_photo`, `u_name`, `u_sex`, `u_mz`, `u_birth`, `u_hyzk`, `u_xlzk`, `u_hljb`, `u_sflx`, `u_phone`, `u_bed`, `checkIn_date`, `checkOut_date`, `balance`, `pay_id`) VALUES
(50, '11', '6512bd43d9caa6e02c990b0a82652dca', '11111@qq.coim', '2017-04-18 15:10:31', 'd310c4dabb739ac34b62afe63a279660.jpg', '寒江雪', '男', '汉族', '2017-03-15', 1, 6, 2, 0, '158882745491', 17, '2017-04-06', '2017-04-16', 680893, 10000029),
(52, '123', '202cb962ac59075b964b07152d234b70', '', '2017-04-18 14:38:37', NULL, '小王', '男', '', '2017-04-26', 1, 1, 1, 0, '', 20, '2017-04-12', '0000-00-00', 2211284, 10000025),
(53, '11111', 'b0baee9d279d34fa1dfd71aadb908c3f', '', '2017-04-15 06:39:32', NULL, '高渐离', '男', '', '1980-01-17', 1, 5, 1, 0, '465646', 46, '0000-00-00', '0000-00-00', 0, 0),
(54, '我是Ricardohe', '202cb962ac59075b964b07152d234b70', '', '2017-04-16 09:15:35', NULL, 'Ricardohe', '男', '', '1980-01-16', 1, 1, 1, 0, '', 0, '0000-00-00', '2017-04-16', 0, 0),
(55, '12', 'c20ad4d76fe97759aa27a0c99bff6710', '', '2017-04-16 09:43:58', NULL, '法外狂徒', '男', '汉族', '1980-01-02', 1, 1, 1, 0, '', 0, '0000-00-00', '0000-00-00', 0, 0),
(56, '1234', '81dc9bdb52d04dc20036dbd8313ed055', '32927202@qq.com', '2017-04-17 19:43:47', NULL, '', '保密', NULL, NULL, NULL, 0, 4, 0, '', 0, '0000-00-00', '0000-00-00', 1100104, 10000022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `art_category`
--
ALTER TABLE `art_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`id`,`bed_id`),
  ADD KEY `bed_id` (`bed_id`) USING BTREE;

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `d_name` (`d_name`);

--
-- Indexes for table `dic_hljb`
--
ALTER TABLE `dic_hljb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hljb` (`hljb`);

--
-- Indexes for table `dic_hyzk`
--
ALTER TABLE `dic_hyzk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hyzk` (`hyzk`);

--
-- Indexes for table `dic_xlzk`
--
ALTER TABLE `dic_xlzk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `xlzk` (`xlzk`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `leavenote`
--
ALTER TABLE `leavenote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_records`
--
ALTER TABLE `pay_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `art_category`
--
ALTER TABLE `art_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `bed`
--
ALTER TABLE `bed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- 使用表AUTO_INCREMENT `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `dic_hljb`
--
ALTER TABLE `dic_hljb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `dic_hyzk`
--
ALTER TABLE `dic_hyzk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `dic_xlzk`
--
ALTER TABLE `dic_xlzk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `leavenote`
--
ALTER TABLE `leavenote`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- 使用表AUTO_INCREMENT `pay_records`
--
ALTER TABLE `pay_records`
  MODIFY `id` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000030;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
