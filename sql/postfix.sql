--
-- Selected TOC Entries:
--
\connect - postfix

--
-- TOC Entry ID 2 (OID 57634)
--
-- Name: admin Type: TABLE Owner: postfix
--

CREATE TABLE "admin" (
	"username" character varying(255) NOT NULL,
	"password" character varying(255) NOT NULL,
	"created" timestamp(13) with time zone DEFAULT '1999-04-23 01:05:06',
	"modified" timestamp(13) with time zone DEFAULT '1999-04-23 01:05:06',
	"active" boolean DEFAULT 't'::bool,
	"sysadmin" boolean DEFAULT 'f'::bool,
	Constraint "admin_key" Primary Key ("username")
);

--
-- TOC Entry ID 3 (OID 57637)
--
-- Name: alias Type: TABLE Owner: postfix
--

CREATE TABLE "alias" (
	"address" character varying(255) NOT NULL,
	"goto" text NOT NULL,
	"domain" character varying(255) NOT NULL,
	"created" timestamp(13) with time zone DEFAULT '1999-04-23 01:05:06',
	"modified" timestamp(13) with time zone DEFAULT '1999-04-23 01:05:06',
	"active" boolean DEFAULT 't'::bool,
	Constraint "alias_key" Primary Key ("address")
);

--
-- TOC Entry ID 4 (OID 57643)
--
-- Name: domain Type: TABLE Owner: postfix
--

CREATE TABLE "domain" (
	"domain" character varying(255) NOT NULL,
	"description" character varying(255) NOT NULL,
	"aliases" numeric(10,0) DEFAULT '0' NOT NULL,
	"mailboxes" numeric(10,0) DEFAULT '0' NOT NULL,
	"maxquota" numeric(10,0) DEFAULT '0' NOT NULL,
	"created" timestamp(13) with time zone DEFAULT '1999-04-23 01:05:06',
	"modified" timestamp(13) with time zone DEFAULT '1999-04-23 01:05:06',
	"active" boolean DEFAULT 't'::bool,
	Constraint "domain_key" Primary Key ("domain")
);

--
-- TOC Entry ID 5 (OID 57646)
--
-- Name: domain_admins Type: TABLE Owner: postfix
--

CREATE TABLE "domain_admins" (
	"username" character varying(255) NOT NULL,
	"domains" character varying(255) NOT NULL,
	"created" timestamp(13) with time zone DEFAULT '1999-04-23 01:05:06',
	"active" boolean DEFAULT 't'::bool,
	Constraint "domain_admins_key" Primary Key ("username")
);

--
-- TOC Entry ID 6 (OID 57649)
--
-- Name: mailbox Type: TABLE Owner: postfix
--

CREATE TABLE "mailbox" (
	"username" character varying(255) NOT NULL,
	"password" character varying(255) NOT NULL,
	"name" character varying(255) NOT NULL,
	"maildir" character varying(255) NOT NULL,
	"quota" numeric(10,0) DEFAULT '0' NOT NULL,
	"domain" character varying(255) NOT NULL,
	"created" timestamp(13) with time zone DEFAULT '1999-04-23 01:05:06',
	"modified" timestamp(13) with time zone DEFAULT '1999-04-23 01:05:06',
	"active" boolean DEFAULT 't'::bool,
	"home" character varying(255) DEFAULT '/var/spool/virtual/',
	"uid" numeric(3,0) DEFAULT 200,
	"gid" numeric(3,0) DEFAULT 200,
	Constraint "mailbox_key" Primary Key ("username")
);

--
-- TOC Entry ID 7 (OID 57652)
--
-- Name: vacation Type: TABLE Owner: postfix
--

CREATE TABLE "vacation" (
	"email" character varying(255) NOT NULL,
	"subject" character varying(255) NOT NULL,
	"body" text,
	"cache" text NOT NULL,
	"domain" character varying(255) NOT NULL,
	"created" timestamp(13) with time zone DEFAULT '1999-04-23 01:05:06',
	"active" boolean DEFAULT 't'::bool,
	Constraint "vacation_key" Primary Key ("email")
);
