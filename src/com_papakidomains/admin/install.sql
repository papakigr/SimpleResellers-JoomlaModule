DROP TABLE IF EXISTS `#__papakidomains_tlds`;

CREATE TABLE `#__papakidomains_tlds` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `tld` VARCHAR(45) NOT NULL,
  `enabled` TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('gr',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('eu',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('com',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('net',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('org',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('info',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('mobi',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('com.gr',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('net.gr',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('edu.gr',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('org.gr',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('gov.gr',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('la',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('name',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('cc',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('ac',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('io',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('sh',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('tv',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('bz',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('ws',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('de',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('ms',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('gs',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('in',1);
INSERT INTO `#__papakidomains_tlds` (`tld`,`enabled`) VALUES ('fm',1);

