CREATE TABLE %%PREFIX%%JLX_USER (
  USR_LOGIN VARCHAR2(50 CHAR) NOT NULL,
  USR_PASSWORD VARCHAR2(50 CHAR) NOT NULL,
  USR_EMAIL VARCHAR2(255 CHAR) DEFAULT NULL
);

ALTER TABLE ONLY %%PREFIX%%JLX_USER
    ADD CONSTRAINT JLX_USER_PKEY PRIMARY KEY (USR_LOGIN);