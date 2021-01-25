<?php
require('connection.php');
$sql1 = "SET ANSI_NULLS ON";
$stmt1 = sqlsrv_query( $conn, $sql1);
if( $stmt1 === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql2 = "SET QUOTED_IDENTIFIER ON";
$stmt2 = sqlsrv_query( $conn, $sql2);
if( $stmt2 === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql3 = "SET ANSI_PADDING ON";
$stmt3 = sqlsrv_query( $conn, $sql3);
if( $stmt3 === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql4 = "CREATE TABLE dimUsers(
	pbiuid int IDENTITY(1,1) NOT NULL,
	UserName varchar(200) NOT NULL,
	eMailId varchar(200) NOT NULL,
	UserId varchar(200) NOT NULL,
	Segment varchar(200) NOT NULL,
	PrimaryCategoryid  AS (case Segment when 'Institutions' then (1) when 'AH - Trade' then (2) when 'HH - Trade' then (3) when 'Contract Manufacturing' then (4) when 'Exports' then (5) else '0' end),
	Manager char(1) NOT NULL DEFAULT ('N'),
	isActive char(1) NOT NULL DEFAULT ('Y'),
 CONSTRAINT PK_USERS1 PRIMARY KEY CLUSTERED 
(
	eMailId ASC,
	Segment ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]";
$stmt4 = sqlsrv_query( $conn, $sql4);
if( $stmt4 === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql5 = "SET ANSI_PADDING OFF";
$stmt5 = sqlsrv_query( $conn, $sql5);
if( $stmt5 === false ) {
     die( print_r( sqlsrv_errors(), true));
}

$sql6 = "insert into dimUsers (UserName,eMailId,UserId,Segment,Manager,isActive) values ('Dr Anand Kumar','Anandkumar@indimmune.com','Anandkumar','Institutions','Y','Y') , ('Dr Anand Kumar','Anandkumar@indimmune.com','Anandkumar','AH - Trade','Y','Y') ,('Dr Anand Kumar','Anandkumar@indimmune.com','Anandkumar','HH - Trade','Y','Y') , ('Dr Anand Kumar','Anandkumar@indimmune.com','Anandkumar','Contract Manufacturing','Y','Y') , ('Dr Anand Kumar','Anandkumar@indimmune.com','Anandkumar','Exports','Y','Y') , ('Dr Prasanna Deshpande','pdeshpande@indimmune.com','pdeshpande','Institutions','Y','Y') , ('Dr Prasanna Deshpande','pdeshpande@indimmune.com','pdeshpande','AH - Trade','Y','Y') , ('Dr Prasanna Deshpande','pdeshpande@indimmune.com','pdeshpande','HH - Trade','Y','Y') , ('Dr Prasanna Deshpande','pdeshpande@indimmune.com','pdeshpande','Contract Manufacturing','Y','Y') , ('Dr Prasanna Deshpande','pdeshpande@indimmune.com','pdeshpande','Exports','Y','Y') , ('Prasad S','sprasad@indimmune.com','sprasad','Institutions','Y','Y') , ('Prasad S','sprasad@indimmune.com','sprasad','AH - Trade','Y','Y') , ('Prasad S','sprasad@indimmune.com','sprasad','HH - Trade','Y','Y') , ('Prasad S','sprasad@indimmune.com','sprasad','Contract Manufacturing','Y','Y') , ('Prasad S','sprasad@indimmune.com','sprasad','Exports','Y','Y') , ('Srinivasa Rao CH','chsrinivas@indimmune.com','chsrinivas','Institutions','Y','Y') , ('Srinivasa Rao CH','chsrinivas@indimmune.com','chsrinivas','AH - Trade','Y','Y') , ('Srinivasa Rao CH','chsrinivas@indimmune.com','chsrinivas','HH - Trade','Y','Y') , ('Srinivasa Rao CH','chsrinivas@indimmune.com','chsrinivas','Contract Manufacturing','Y','Y') , ('Srinivasa Rao CH','chsrinivas@indimmune.com','chsrinivas','Exports','Y','Y') , ('Sandeep CH','sandeep@indimmune.com','sandeepch','Institutions','Y','Y') , ('Sandeep CH','sandeep@indimmune.com','sandeepch','AH - Trade','Y','Y') , ('Sandeep CH','sandeep@indimmune.com','sandeepch','HH - Trade','Y','Y') , ('Sandeep CH','sandeep@indimmune.com','sandeepch','Contract Manufacturing','Y','Y') , ('Sandeep CH','sandeep@indimmune.com','sandeepch','Exports','Y','Y') , ('Murali Mohan','muralimohan@indimmune.com','muralimohan','Institutions','Y','Y') , ('Murali Mohan','muralimohan@indimmune.com','muralimohan','AH - Trade','Y','Y') , ('Murali Mohan','muralimohan@indimmune.com','muralimohan','HH - Trade','Y','Y') , ('Murali Mohan','muralimohan@indimmune.com','muralimohan','Contract Manufacturing','Y','N') , ('Murali Mohan','muralimohan@indimmune.com','muralimohan','Exports','Y','N') , ('Bhargav N S N','bhargav@indimmune.com','bhargav','Institutions','N','Y') , ('Sarthak Vasudeva','v.sarthak@indimmune.com','v.sarthak','Exports','N','Y') , ('Shakul Srivastava','s.shakul@indimmune.com','s.shakul','HH - Trade','N','Y') , ('Sobhan Babu','ssb@indimmune.com','ssb','AH - Trade','N','Y') , ('Ramabhupal G','ramabhupal.g@indimmune.com','ramabhupal.g','Contract Manufacturing','N','Y') , ('Pranaydyagam','pranaydyagam@indimmune.com','pranaydyagam','HH - Trade','N','Y')";
$stmt6 = sqlsrv_query( $conn, $sql6);
if( $stmt6 === false ) {
     die( print_r( sqlsrv_errors(), true));
}
?>