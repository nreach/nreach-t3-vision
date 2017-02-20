CREATE TABLE nreacht3_log (
uid int(11) NOT NULL auto_increment,

tstamp int(11) DEFAULT '0' NOT NULL,
json text NOT NULL,

PRIMARY KEY (uid)
);
