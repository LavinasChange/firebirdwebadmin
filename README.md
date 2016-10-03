  FirebirdWebAdmin is a web frontend for the Firebird database server.

  By now it has the functionalities for
  
  o creating, deleting, modifying databases, tables, generators,
    views, triggers, domains, indices, stored procedures, udf's,
    exceptions, roles and database users

  o performing sql expressions on databases and display the results

  o import and export of data through files in the csv format

  o browsing through the contents of tables and views, watching them
    growing while typing in data

  o selecting data for deleting and editing while browsing tables

  o inserting, deleting, displaying the contents of blob fields

  o diplaying database metadata, browsing the firebird system tables

  o database backup and restore, database maintenance


  Some of the features are only available if the database- and the
  web-server are running on the same machine. The reason is that php
  have to call the Firebird tools (isql, gsec, gstat, etc.) to
  perform certain actions.




Documentation

  There is no documentation available yet, but if you are familiar
  with Firebird  you will have no troubles using
  FirebirdWebAdmin.

  For some basic configuration settings have a look to the file
  ./inc/configuration.inc.php befor you start the programm.

    Here is how to use and install on Ubuntu https://help.ubuntu.com/community/Firebird2.5

  Firebird documentation is located on this page http://www.firebirdsql.org/en/documentation/



Requirements

  This is the environment I'm using for the development. Other
  components are not or less tested. So if you got problems make sure
  you are not using older software components.

  php5.x with compiled in support for Firebird/InterBase and
  pcre (but any version >= 5.3.x should work)

  Firebird 2.x.x for Linux
        
  Apache 2.x or lighttpd or nginx

Copyright notice:

 (C) 2000,2001,2002,2003,2004 Lutz Brueckner <irie@gmx.de>
                              Kapellenstr. 1A
                              22117 Hamburg, Germany

  FirebirdWebAdmin is published under the terms of the GNU GPL v.2,
  please read the file LICENCE for details.

  This software is provided 'as-is', without any expressed or implied
  warranty.  In no event will the author be held liable for any 
  damages arising from the use of this software.
